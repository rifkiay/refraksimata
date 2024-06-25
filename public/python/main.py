import sys
import pickle
import numpy as np
import cv2
import matplotlib.pyplot as plt
import os
from skimage.feature import hog
from sklearn.metrics import accuracy_score

# Fungsi untuk ekstraksi HOG dari gambar
def extract_hog_features(img):
    # Hitung HOG dari gambar grayscale
    features, hog_image = hog(img, orientations=9, pixels_per_cell=(8, 8),
                              cells_per_block=(2, 2), visualize=True, block_norm='L2-Hys')
    return features, hog_image

# Fungsi untuk memuat model SVM dari file
def load_svm_model(model_path):
    with open(model_path, 'rb') as f:
        model = pickle.load(f)
    return model

# Fungsi untuk memprediksi label gambar menggunakan model SVM
def predict_with_svm(model, img):
    # Ubah gambar ke grayscale jika diperlukan
    if len(img.shape) > 2:
        gray = cv2.cvtColor(img, cv2.COLOR_BGR2GRAY)
    else:
        gray = img
    # Ekstraksi fitur HOG dari gambar
    features, _ = extract_hog_features(gray)
    # Lakukan prediksi menggunakan model SVM
    prediction = model.predict(features.reshape(1, -1))
    return prediction

if __name__ == "__main__":
    # Ambil path gambar dari command line argument
    image_path = sys.argv[1]
    patient_name = sys.argv[2]

    # Path ke file model SVM yang disimpan
    model_path = 'python/svm_model.pkl'

    # Load model SVM
    svm_model = load_svm_model(model_path)

    # Baca gambar
    img = cv2.imread(image_path)

    if img is None:
        print(f"Error: Failed to read image file '{image_path}'")
    else:
        # Lakukan prediksi menggunakan model SVM
        predicted_label = predict_with_svm(svm_model, img)
        print(f"Predicted Label: {predicted_label[0]}")

        plt.figure(figsize=(8, 3))

        # Tampilkan gambar asli
        plt.subplot(121)
        plt.imshow(cv2.cvtColor(img, cv2.COLOR_BGR2RGB))
        plt.title('Original Image')

        # Tampilkan HOG dari gambar grayscale
        gray = cv2.cvtColor(img, cv2.COLOR_BGR2GRAY)
        hog_features, hog_image = extract_hog_features(gray)

        plt.subplot(122)
        plt.imshow(hog_image, cmap='gray')
        plt.title('HOG Features')

        plt.tight_layout()

        # Simpan gambar HOG
        output_dir = os.path.join('storage', 'images', patient_name)
        os.makedirs(output_dir, exist_ok=True)
        hog_image_path = os.path.join(output_dir, f"hog_image_{patient_name}.svg")
        plt.savefig(hog_image_path)

        print(f"HOG Image Path: {hog_image_path}")
