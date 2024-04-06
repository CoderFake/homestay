


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drag and Drop File Upload</title>
    <link rel="stylesheet" href="css/style.css">
    <?php require('inc/links.php');?>
</head>
<body>

    <div class="container">
        <div class="header-section">
            <h1>Upload Files</h1>
            <p>Upload files you want to share with your team members.</p>
            <p>PDF, Images & Videos are allowed.</p>
        </div>
        <div class="drop-section">
            <div class="cloud-icon">
                <img src="/images/icons/cloud.png" alt="cloud">
            </div>
            <p>Drag & Drop your files here</p>
            <p>OR</p>
            <button class="file-selector">Browse Files</button>
            <input type="file" class="file-selector-input" multiple>
        </div>
        <div class="list-section">
            <div class="list-title">Uploaded Files</div>
            <div class="list"></div>
        </div>
    </div>
    <?php require('inc/footer.php');?>
    <script src="js/script.js"></script>
</body>
</html>
