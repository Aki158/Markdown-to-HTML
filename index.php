<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/style.css">
    <title>MDtoHTML</title>
</head>
<body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.20.0/min/vs/loader.min.js"></script>
    <script src="public/js/app.js"></script>

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
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

