<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/style.css">
    <title>MDtoHTML</title>
</head>
<body>
    <div class="d-flex">
        <div id="editor" class="editor-box col my-2 px-0"></div>
        <div id="display_area" class="col my-2 px-0 scroll-box">
            <button id="preview_button" class="m-1" type="button" name="Preview" onclick="click_preview();">Preview</button>
            <button id="html_button" class="m-1" type="button" name="HTML" onclick="click_html();">HTML</button>
            <button id="highlight_button" class="m-1" type="button" name="Highlight" onclick="click_highlight();">Highlight: ON</button>
            <button id="download_button" class="m-1" type="button" name="Download" onclick="click_download();">Download</button>
            <div id="display_code_area"></div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.20.0/min/vs/loader.min.js"></script>
    <script src="public/js/app.js"></script>
</body>
