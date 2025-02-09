<!DOCTYPE html>
<html lang="en">
<head>
    <title>Zaynix-XD Hosting</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Fast & Secure File Hosting">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Poppins', sans-serif; background: #1b1b1b; color: white; text-align: center; padding: 20px; }
        .container { width: 90%; max-width: 500px; background: rgba(255,255,255,0.1); padding: 20px; border-radius: 10px; margin: auto; }
        input, button { width: 100%; margin: 10px 0; padding: 10px; border-radius: 5px; }
        button { background: #00ccff; color: white; font-weight: bold; cursor: pointer; }
        .url-box { background: rgba(0,0,0,0.6); padding: 10px; margin-top: 10px; border-radius: 5px; }
        .url-box a { color: #00ccff; }
    </style>
</head>
<body>

    <div class="container">
        <h2>Zaynix-XD Hosting</h2>
        <p>Upload Files & Get a Custom URL</p>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <input type="text" name="folderName" placeholder="Enter Folder Name (optional)">
            <input type="file" name="uploadedFile[]" multiple required>
            <button type="submit">Upload</button>
        </form>
    </div>

</body>
</html>
