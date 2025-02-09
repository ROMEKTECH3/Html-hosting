<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['uploadedFile'])) {
    $uploadDir = __DIR__ . '/uploads/';  // Ensure this folder exists
    $allowedExtensions = ['html', 'css', 'js', 'php', 'json', 'py', 'md', 'txt', 'xml', 'license'];

    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);  // Create the uploads folder if it doesn't exist
    }

    $fileLinks = [];
    foreach ($_FILES['uploadedFile']['name'] as $key => $fileName) {
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
        
        if (!in_array(strtolower($fileExtension), $allowedExtensions)) {
            continue;
        }

        $newFileName = uniqid() . "_" . basename($fileName);  // Unique filename
        $uploadedFile = $uploadDir . $newFileName;

        if (move_uploaded_file($_FILES['uploadedFile']['tmp_name'][$key], $uploadedFile)) {
            // Generate accessible URL
            $fileLinks[] = "http://" . $_SERVER['HTTP_HOST'] . "/uploads/" . $newFileName;
        }
    }

    if (!empty($fileLinks)) {
        echo implode(" ", $fileLinks);  // Return space-separated file URLs
    } else {
        echo "No valid files uploaded.";
    }
}
?>
