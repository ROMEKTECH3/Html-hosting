<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['uploadedFile'])) {
    $uploadBaseDir = 'uploads/'; // Main folder
    $allowedExtensions = ['html', 'css', 'js', 'php', 'txt'];

    // 🟢 User-defined folder name (or auto-generate random name)
    $customName = isset($_POST['folderName']) ? preg_replace('/[^a-zA-Z0-9-_]/', '', $_POST['folderName']) : '';
    if (empty($customName)) {
        $customName = substr(md5(uniqid()), 0, 8); // Default random name
    }

    $uploadDir = $uploadBaseDir . $customName . '/';

    // Create folder if not exists
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
            $hostedURL = "https://" . $_SERVER['HTTP_HOST'] . "/uploads/$customName/" . $fileName;
            $uploadedFiles[] = "<div class='url-box'><a href='$hostedURL' target='_blank'>$hostedURL</a> <button onclick='copyToClipboard(\"$hostedURL\")'>Copy</button></div>";
        } else {
            echo "<div class='url-box'>❌ Error uploading file: $fileName</div>";
        }
    }

    // Display uploaded file links
    if (!empty($uploadedFiles)) {
        echo implode("", $uploadedFiles);
    }
}
?>

<script>
    function copyToClipboard(url) {
        navigator.clipboard.writeText(url).then(() => {
            alert("Copied: " + url);
        }).catch(err => {
            console.error('Error copying link: ', err);
        });
    }
</script>
