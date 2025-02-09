<!DOCTYPE html>
<html lang="en">
<head>
    <title>Zaynix-XD Hosting</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="description" content="Zaynix-XD Hosting - Fast & Secure File Hosting">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Poppins', sans-serif; background: linear-gradient(135deg, #0f0c29, #302b63, #24243e); height: 100vh; display: flex; flex-direction: column; align-items: center; justify-content: center; color: white; text-align: center; }
        .banner { background: rgba(0, 0, 0, 0.6); padding: 20px; width: 100%; font-size: 28px; font-weight: bold; text-transform: uppercase; border-bottom: 3px solid #00ccff; }
        .container { width: 90%; max-width: 500px; background: rgba(0, 0, 0, 0.8); padding: 25px; border-radius: 10px; box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.6); border: 2px solid #00ccff; }
        input[type="file"], input[type="submit"] { margin: 10px 0; padding: 12px; width: 100%; border-radius: 5px; border: none; font-size: 16px; }
        input[type="submit"] { background: linear-gradient(135deg, #00ccff, #0066ff); color: white; font-weight: bold; cursor: pointer; transition: 0.3s; }
        input[type="submit"]:hover { background: linear-gradient(135deg, #0066ff, #00ccff); }
        .hosted-url-box { background: rgba(255, 255, 255, 0.1); padding: 15px; border-radius: 5px; margin-top: 20px; font-size: 14px; word-wrap: break-word; display: flex; align-items: center; justify-content: space-between; }
        .hosted-url-box a { color: #00ccff; text-decoration: none; font-weight: bold; }
        .copy-btn { background-color: #00ccff; color: white; border: none; padding: 5px 10px; font-size: 12px; cursor: pointer; border-radius: 5px; font-weight: bold; transition: 0.3s; }
        .copy-btn:hover { background-color: #008f72; }
        .watermark { font-size: 12px; color: #aaa; margin-top: 20px; }
        .custom-btn { background-color: #ff4500; color: white; border: none; padding: 10px 20px; font-size: 14px; cursor: pointer; border-radius: 5px; font-weight: bold; margin-top: 10px; transition: 0.3s; }
        .custom-btn:hover { background-color: #ff6347; }
        @media (max-width: 600px) { .container { padding: 15px; } .banner { font-size: 22px; } .watermark { font-size: 10px; } }
    </style>
</head>
<body>
    <div class="banner">
        Zaynix-XD Hosting
        <span>Fast & Secure File Hosting</span>
    </div>
    <div class="container">
        <form method="post" enctype="multipart/form-data">
            <input type="file" name="uploadedFile[]" multiple>
            <input type="submit" value="Upload">
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['uploadedFile'])) {
            $uploadDir = 'uploads/';
            $allowedExtensions = ['html', 'css', 'js', 'php'];

            foreach ($_FILES['uploadedFile']['name'] as $key => $fileName) {
                $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
                
                if (!in_array(strtolower($fileExtension), $allowedExtensions)) {
                    echo "<div class='hosted-url-box'>❌ Error: Only HTML, CSS, JS, and PHP files are allowed.</div>";
                    continue;
                }

                if (!file_exists($uploadDir) && !is_dir($uploadDir)) {
                    mkdir($uploadDir);
                }

                $uploadedFile = $uploadDir . basename($fileName);

                if (move_uploaded_file($_FILES['uploadedFile']['tmp_name'][$key], $uploadedFile)) {
                    $hostedURL = "http://".$_SERVER['HTTP_HOST']."/".$uploadedFile;
                    echo "<div class='hosted-url-box'>
                            <a href='".$hostedURL."' target='_blank'>".$hostedURL."</a>
                            <button class='copy-btn' onclick='copyToClipboard(\"".$hostedURL."\")'>Copy</button>
                          </div>";
                } else {
                    echo "<div class='hosted-url-box'>❌ Error uploading file: ".$fileName."</div>";
                }
            }
        }
        ?>

        <div class="watermark">Hosted on: <?php echo $_SERVER['HTTP_HOST']; ?></div>
    </div>

    <center>
        <a href="https://t.me/ROMEKTRICKS">
            <button class="custom-btn">Made by ROMEK-XD</button>
        </a>
    </center>

    <script>
        function copyToClipboard(url) {
            navigator.clipboard.writeText(url).then(() => {
                alert("Copied: " + url);
            }).catch(err => {
                console.error('Error copying link: ', err);
            });
        }
    </script>

</body>
</html>
