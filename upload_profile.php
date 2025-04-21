<?php
// Check if the file is uploaded
if (isset($_FILES['Select_file'])) {
    // Get the file details
    $file_name = $_FILES['Select_file']['name'];
    $file_size = $_FILES['Select_file']['size'];
    $file_type = $_FILES['Select_file']['type'];
    $file_tmp = $_FILES['Select_file']['tmp_name'];

    // Set upload directory
    $upload_dir = 'uploaded/';

    // Allowed image file types (MIME types)
    $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];

    // Check if the file is a valid image type
    if (in_array($file_type, $allowed_types)) {

        // Ensure the 'uploaded' directory exists, if not, create it
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);  // Create directory if it doesn't exist
        }

        // Check if the file size is within acceptable limits (e.g., 5MB max)
        if ($file_size <= 5 * 1024 * 1024) {  // 5MB max
            // Generate a unique file name to prevent overwriting
            $unique_file_name = uniqid() . '_' . $file_name;

            // Move the uploaded file to the 'uploaded' directory
            if (move_uploaded_file($file_tmp, $upload_dir . $unique_file_name)) {
                echo "Image uploaded successfully!";
                header('Location: index.php?file=' . $unique_file_name); // Redirect to index.php with the filename as query parameter
                exit;
            } else {
                echo "There was an error uploading the file.";
            }
        } else {
            echo "The file is too large. Maximum allowed size is 5MB.";
        }
    } else {
        echo "Invalid file type. Only JPG, PNG, and GIF files are allowed.";
    }
}
?>

<html lang="en">
<body>
    <h2>Upload Your Profile Image</h2>
    <form action="upload_profile.php" method="POST" enctype="multipart/form-data">
        <!-- Input for selecting an image file -->
        <input type="file" name="Select_file" accept="image/jpeg, image/png, image/gif" required /><br><br>
        <!-- Submit button -->
        <input type="submit" value="Upload Image" />
    </form>
</body>
</html>
