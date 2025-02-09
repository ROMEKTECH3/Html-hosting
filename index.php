<!DOCTYPE html>
<html lang="en">
<head>
    <title>Zaynix-XD Hosting</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Fast & Secure File Hosting">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { 
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #0f0c29, #302b63, #24243e);
            color: white;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            position: relative;
        }
        .social-icons {
            position: absolute;
            top: 20px;
            right: 20px;
            display: flex;
            gap: 10px;
        }
        .social-icons a img {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            transition: 0.3s;
        }
        .social-icons a img:hover { transform: scale(1.1); }
        .container { 
            width: 90%; max-width: 500px;
            background: rgba(0, 0, 0, 0.8);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.6);
        }
        input, button { 
            width: 100%;
            margin: 10px 0;
            padding: 12px;
            border-radius: 5px;
            font-size: 16px;
        }
        button {
            background: linear-gradient(135deg, #00ccff, #0066ff);
            color: white;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }
        button:hover { background: linear-gradient(135deg, #0066ff, #00ccff); }
        .url-box {
            background: rgba(255, 255, 255, 0.1);
            padding: 15px;
            border-radius: 5px;
            margin-top: 20px;
            font-size: 14px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .url-box a {
            color: #00ccff;
            text-decoration: none;
            font-weight: bold;
            flex: 1;
            word-break: break-word;
        }
        .copy-btn {
            background-color: #00ccff;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 5px;
            font-weight: bold;
        }
        .footer {
            margin-top: 20px;
            font-size: 12px;
            color: #aaa;
        }
        .visitor-counter {
            font-size: 14px;
            margin-top: 10px;
            color: #ffcc00;
        }
    </style>
</head>
<body>

    <div class="social-icons">
        <a href="https://whatsapp.com/channel/0029VakaPzeD38CV78dbGf0e" target="_blank">
            <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp">
        </a>
        <a href="https://t.me/your_channel" target="_blank">
            <img src="https://upload.wikimedia.org/wikipedia/commons/8/82/Telegram_logo.svg" alt="Telegram">
        </a>
        <a href="https://youtube.com/your_channel" target="_blank">
            <img src="https://upload.wikimedia.org/wikipedia/commons/b/b8/YouTube_logo.png" alt="YouTube">
        </a>
        <a href="https://github.com/your_profile" target="_blank">
            <img src="https://upload.wikimedia.org/wikipedia/commons/9/91/Octicons-mark-github.svg" alt="GitHub">
        </a>
    </div>

    <div class="container">
        <h2>Zaynix-XD Hosting</h2>
        <p>Upload Files & Get a Custom URL</p>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <input type="text" name="folderName" placeholder="Enter Folder Name (optional)">
            <input type="file" name="uploadedFile[]" multiple required>
            <button type="submit">Upload</button>
        </form>

        <div id="upload-result"></div>  <!-- URL yaha aayega -->

        <div class="visitor-counter">
            <?php
                $file = "visitors.txt";

                if (!file_exists($file)) {
                    file_put_contents($file, "0");
                }

                $count = (int)file_get_contents($file);
                $count++;
                file_put_contents($file, $count);

                echo "Visitors: " . $count;
            ?>
        </div>
    </div>

    <div class="footer">Made by ROMEK-XD</div>

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
