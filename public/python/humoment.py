import os
import cv2
import pickle
import numpy as np
import matplotlib.pyplot as plt
from sklearn.svm import SVC

def load_images_and_compute_hu(folder_path):
    images = []
    labels = []
    hu_moments = []

    files = os.listdir(folder_path)
    for file in files:
        if file.endswith('.jpg') or file.endswith('.jpeg') or file.endswith('.png'):
            image_path = os.path.join(folder_path, file)
            img = cv2.imread(image_path, cv2.IMREAD_GRAYSCALE)  # Read image as grayscale
            images.append(img)
            # Compute Hu moments
            moments = cv2.moments(img)
            hu = cv2.HuMoments(moments).flatten()

            # Log scale hu moments
            for i in range(0, 7):
                hu[i] = -1 * np.sign(hu[i]) * np.log10(abs(hu[i]) if hu[i] != 0 else 1e-30)

            hu_moments.append(hu)

            # Get the filename without extension as label
            filename = os.path.splitext(file)[0]
            labels.append(filename)  # Use filename without extension as label

    return images, labels, hu_moments

def predict_with_svm(svm_model, hu_moments):
    X = np.array(hu_moments, dtype=np.float32).reshape(1, -1)  # Reshape to (1, 7) for single prediction
    predicted_label = svm_model.predict(X)
    return predicted_label

def display_images_and_hu_moments(images, hu_moments, y_pred, patient_name, output_dir, num_images=5):
    os.makedirs(output_dir, exist_ok=True)

    for i in range(min(num_images, len(images))):
        img = images[i]
        hu = hu_moments[i]

        plt.figure(figsize=(6, 4))  # Adjust figure size as needed
        plt.imshow(img, cmap='gray')
        plt.title(f"Hu Moments: {', '.join(map(lambda x: f'{x:.2f}', hu))}")
        plt.axis('off')

        # Save the plotted image
        save_path = os.path.join(output_dir, f"huimage.svg")
        plt.savefig(save_path, dpi=200)  # Adjust dpi as needed
        plt.close()

    print(f"Predicted images saved in {output_dir}/")

def main(image_path, patient_name):
    # Extract folder path from image_path
    default_folder = os.path.join("storage/images", patient_name)
    folder_path = default_folder

    images, labels, hu_moments = load_images_and_compute_hu(folder_path)

    if not images:
        print(f"No images found in {default_folder}.")
    else:
        # Load SVM model from file
        model_filename = 'python/humoment.pkl'
        if not os.path.exists(model_filename):
            print(f"SVM model file '{model_filename}' not found.")
        else:
            with open(model_filename, 'rb') as model_file:
                svm_model = pickle.load(model_file)

            # Compute Hu moments for the provided image
            img = cv2.imread(image_path, cv2.IMREAD_GRAYSCALE)
            moments = cv2.moments(img)
            hu = cv2.HuMoments(moments).flatten()

            # Log scale hu moments
            for i in range(0, 7):
                hu[i] = -1 * np.sign(hu[i]) * np.log10(abs(hu[i]) if hu[i] != 0 else 1e-30)

            # Predict using the loaded SVM model
            predictedLabelHu = predict_with_svm(svm_model, [hu])
            print(f"Predicted Label: {predictedLabelHu[0]}")

            # Display images with predicted labels and save them
            output_dir = os.path.join("storage/images", patient_name)
            display_images_and_hu_moments(images, hu_moments, predictedLabelHu, patient_name, output_dir)

            # Print the predicted label and Hu moments path for PHP retrieval
            print(f"Hu Moments Path: {output_dir}/huimage.svg")


if __name__ == "__main__":
    import sys
    if len(sys.argv) < 3:
        print("Usage: python humoment.py <image_path> <patient_name>")
        sys.exit(1)

    image_path = sys.argv[1]
    patient_name = sys.argv[2]
    img = cv2.imread(image_path)

    main(image_path, patient_name)
