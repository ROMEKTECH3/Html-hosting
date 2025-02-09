<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['uploadedFile'])) {
    $uploadDir = 'uploads/';
    $allowedExtensions = ['html', 'css', 'js', 'php', 'json', 'py', 'md', 'txt', 'xml', 'license'];

    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $fileLinks = [];
    foreach ($_FILES['uploadedFile']['name'] as $key => $fileName) {
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
        
        if (!in_array(strtolower($fileExtension), $allowedExtensions)) {
            continue;
        }

        $uploadedFile = $uploadDir . uniqid() . "_" . basename($fileName);
        if (move_uploaded_file($_FILES['uploadedFile']['tmp_name'][$key], $uploadedFile)) {
            $fileLinks[] = "http://".$_SERVER['HTTP_HOST']."/".$uploadedFile;
        }
    }

    if (!empty($fileLinks)) {
        echo implode(" ", $fileLinks);
    }
}
?>
