import sys
import numpy as np
import cv2

def calculate_texture_parameters(image_path):
    # Baca gambar
    image = cv2.imread(image_path, cv2.IMREAD_GRAYSCALE)
    if image is None:
        raise ValueError("Gambar tidak ditemukan atau tidak bisa dibaca.")

    # Hitung histogram
    hist = cv2.calcHist([image], [0], None, [256], [0, 256])
    hist = hist / hist.sum()  # Normalisasi histogram

    # Hitung Mean
    mean = np.sum([i * hist[i] for i in range(256)])

    # Hitung Variance dan Standard Deviation
    variance = np.sum([(i - mean) ** 2 * hist[i] for i in range(256)])
    std_dev = np.sqrt(variance)

    # Hitung Smoothness
    smoothness = 1 - (1 / (1 + variance))

    # Hitung Uniformity
    uniformity = np.sum([p ** 2 for p in hist])

    # Hitung Entropy
    entropy = -np.sum([p * np.log2(p + np.finfo(float).eps) for p in hist])

    return mean, std_dev, smoothness, uniformity, entropy

if __name__ == "__main__":
    if len(sys.argv) != 3:
        print("Usage: python humoment.py <image_path> <patient_name>")
        sys.exit(1)

    image_path = sys.argv[1]
    patient_name = sys.argv[2]

    try:
        mean, std_dev, smoothness, uniformity, entropy = calculate_texture_parameters(image_path)
        print(f"Mean: {mean}")
        print(f"Standard Deviation: {std_dev}")
        print(f"Smoothness: {smoothness}")
        print(f"Uniformity: {uniformity}")
        print(f"Entropy: {entropy}")
    except Exception as e:
        print(f"Error: {e}")
