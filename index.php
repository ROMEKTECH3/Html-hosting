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
        }
        button:hover { background: linear-gradient(135deg, #0066ff, #00ccff); }
        .url-box {
            background: rgba(255, 255, 255, 0.1);
            padding: 10px;
            border-radius: 5px;
            margin-top: 20px;
            font-size: 14px;
            display: none;
            align-items: center;
            justify-content: space-between;
            flex-direction: row;
        }
        .url-box a {
            color: #00ccff;
            text-decoration: none;
            font-weight: bold;
            flex-grow: 1;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .copy-btn {
            background-color: #00ccff;
            color: white;
            border: none;
            padding: 5px 10px;
            font-size: 12px;
            cursor: pointer;
            border-radius: 5px;
            font-weight: bold;
            margin-left: 10px;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Zaynix-XD Hosting</h2>
        <p>Upload Files & Get a Custom URL</p>
        <form id="upload-form" action="upload.php" method="post" enctype="multipart/form-data">
            <input type="text" name="folderName" placeholder="Enter Folder Name (optional)">
            <input type="file" name="uploadedFile[]" multiple required>
            <button type="submit">Upload</button>
        </form>

        <div id="upload-result" class="url-box">
            <a id="uploaded-url" href="#" target="_blank"></a>
            <button class="copy-btn" onclick="copyToClipboard()">Copy</button>
        </div>
    </div>

    <script>
        document.getElementById("upload-form").onsubmit = async function(event) {
            event.preventDefault();
            
            let formData = new FormData(this);
            let response = await fetch("upload.php", { method: "POST", body: formData });
            let result = await response.text();

            document.getElementById("upload-result").style.display = "flex";
            document.getElementById("uploaded-url").href = result;
            document.getElementById("uploaded-url").innerText = result;
        };

        function copyToClipboard() {
            let url = document.getElementById("uploaded-url").innerText;
            navigator.clipboard.writeText(url).then(() => {
                alert("Copied: " + url);
            });
        }
    </script>

</body>
</html>
