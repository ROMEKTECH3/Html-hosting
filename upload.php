<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['uploadedFile'])) {
    $uploadBaseDir = 'uploads/'; 
    $allowedExtensions = ['html', 'css', 'js', 'php', 'txt'];

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
            echo "<div class='url-box'>❌ Error: Only HTML, CSS, JS, PHP & TXT files are allowed.</div>";
            continue;
        }

        $uploadedFile = $uploadDir . basename($fileName);

        if (move_uploaded_file($_FILES['uploadedFile']['tmp_name'][$key], $uploadedFile)) {
            $uploadedFiles[] = $fileName;
        } else {
            echo "<div class='url-box'>❌ Error uploading file: $fileName</div>";
        }
    }

    if (!empty($uploadedFiles)) {
        $folderURL = "https://" . $_SERVER['HTTP_HOST'] . "/uploads/$customName/";
        echo "<script>
                document.getElementById('upload-result').innerHTML = 
                `<div class='url-box'>
                    <a href='$folderURL' target='_blank'>$folderURL</a> 
                    <button class='copy-btn' onclick='copyToClipboard(\"$folderURL\")'>Copy</button>
                </div>`;
              </script>";
    }
}
?>
