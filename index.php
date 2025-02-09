<!DOCTYPE html><html lang="en">
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
        .url-box {
            background: rgba(255, 255, 255, 0.1);
            padding: 10px;
            border-radius: 5px;
            margin-top: 20px;
            display: none;
            flex-direction: column;
        }
        .url-box a {
            color: #00ccff;
            text-decoration: none;
            font-weight: bold;
            word-wrap: break-word;
        }
        .copy-btn {
            background-color: #00ccff;
            color: white;
            padding: 5px 10px;
            font-size: 12px;
            cursor: pointer;
            border-radius: 5px;
            margin-top: 10px;
        }
    </style>
</head>
<body><div class="container">
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

<div class="footer">
    <a href="https://wa.me/your-whatsapp-channel-link" target="_blank">
        <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp">
    </a>
    <p>MADE BY <span style="color: red;">❤</span> ROMEK-XD</p>
</div>

<script>
    document.getElementById("upload-form").onsubmit = async function(event) {
        event.preventDefault();
        
        let formData = new FormData(this);
        let response = await fetch("upload.php", { method: "POST", body: formData });
        let result = await response.text();

        document.getElementById("upload-result").style.display = "block";
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