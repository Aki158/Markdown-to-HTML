<?php

// コードベースのファイルのオートロード
spl_autoload_extensions(".php"); 
spl_autoload_register();

// composerの依存関係のオートロード
require_once 'vendor/autoload.php';

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>MDtoHTML</title>
    <style>
        .scroll-box {
            width: 800px;
            height: 600px;
            overflow-y: scroll;
            border: 1px solid grey;
        }

        .flex-container {
            display: flex;
        }

        .flex-item {
            flex: 1;
            margin: 10px;
        }

        .margin {
            margin: 5px;
        }
    </style>
</head>
<body>
    <div class="flex-container">
        <div class="row">
            <div class="flex-item">
                <div id="editor" style="width:800px;height:600px;border:1px solid grey"></div>
            </div>
        </div>
        <div class="row">
            <div class="flex-item">
                <div class="scroll-box">
                    <form id="myForm" action="index.php" method="post">
                        <button class="margin" type="submit" name="Preview">Preview</button>
                        <button class="margin" type="submit" name="HTML">HTML</button>
                        <button class="margin" type="submit" name="Highlight">Highlight: ON</button>
                        <button class="margin" type="submit" name="Download">Download</button>
                    </form>
                    <div id="display_area"></div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.20.0/min/vs/loader.min.js"></script>
    <script>
            require.config({ paths: { 'vs': 'https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.20.0/min/vs' }});
            require(['vs/editor/editor.main'], function() {
                var editor = monaco.editor.create(document.getElementById('editor'), {
                    value:  "# 見出し1\n" + 
                            "## 見出し2\n\n" +
                            "[Recursion](https://recursionist.io/)\n\n\n" +
                            "- リスト1\n" +
                            "\t- リスト1_1\n" +
                            "\t\t- リスト1_1_1\n" +
                            "\t\t- リスト1_1_2\n" +
                            "\t- リスト1_2\n" +
                            "- リスト2\n" +
                            "- リスト3\n\n\n" +
                            "```diff\n" +
                            "- gen 'rubocop', require: false\n" +
                            "+ gen 'rubocop'\n" +
                            "```\n\n" +
                            "```py\n" +
                            "def scope_test():\n" +
                            "\tdef do_local():\n" +
                            '\t\tspam = "local spam"\n\n' +
                            "scope_test()\n" +
                            'print("In global scope:", spam)\n' +
                            "```\n",
                    language: 'markdown'
                }); 

                // ロードされるとエディターの文字列をHTMLにレンダリングしボックスに表示させる
                window.addEventListener("load", (event) => {
                    render();
                });

                // エディターが編集されるとHTMLにレンダリングしボックスに反映される
                document.getElementById('editor').addEventListener('keyup', function() {
                    render();
                });

                function render() {
                    var editor_content = editor.getValue();
                    
                    fetch('render.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                        },
                        body: 'editor_content=' + encodeURIComponent(editor_content)
                    })
                    .then(response => response.text())
                    .then(data => {
                        console.log(data);
                        document.getElementById("display_area").innerHTML = data;
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
                }
        });
    </script>
</body>

