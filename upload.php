<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['uploadedFile'])) {
    $uploadBaseDir = 'uploads/'; 
    $allowedExtensions = ['html', 'css', 'js', 'php', 'json', 'py', 'md', 'txt', 'license', 'xml'];

    // Folder name logic
    $customName = isset($_POST['folderName']) ? preg_replace('/[^a-zA-Z0-9-_]/', '', $_POST['folderName']) : '';
    if (empty($customName)) {
        $customName = substr(md5(uniqid()), 0, 8); 
    }

    $uploadDir = $uploadBaseDir . $customName . '/';

    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $uploadedFiles = [];
    foreach ($_FILES['uploadedFile']['name'] as $key => $fileName) {
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

        if (!in_array(strtolower($fileExtension), $allowedExtensions)) {
            echo "<script>alert('❌ Only allowed file types: HTML, CSS, JS, PHP, JSON, PY, MD, TXT, LICENSE, XML');</script>";
            continue;
        }

        $newFileName = uniqid() . "_" . basename($fileName);
        $uploadedFile = $uploadDir . $newFileName;

        if (move_uploaded_file($_FILES['uploadedFile']['tmp_name'][$key], $uploadedFile)) {
            $uploadedFiles[] = $newFileName;
        }
    }

    if (!empty($uploadedFiles)) {
        $folderURL = "https://" . $_SERVER['HTTP_HOST'] . "/uploads/$customName/";
        echo "<script>
                document.getElementById('upload-result').style.display = 'block';
                document.getElementById('uploaded-url').href = '$folderURL';
                document.getElementById('uploaded-url').innerText = '$folderURL';
              </script>";
    } else {
        echo "<script>alert('❌ No valid files uploaded.');</script>";
    }
}
?>