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
<script src="https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.20.0/min/vs/loader.min.js"></script>
    <script>
            const hashmap = {
                editor_content: "",
                display_format: "Preview",
                highlight_sw: "Highlight: ON"
            };

            require.config({ paths: { "vs": "https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.20.0/min/vs" }});
            require(["vs/editor/editor.main"], function() {
                window.editor = monaco.editor.create(document.getElementById("editor"), {
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
                    language: "markdown"
                });

                // ロードされるとエディターの文字列をHTMLにレンダリングしボックスに表示させる
                window.addEventListener("load", (event) => {
                    render();
                });

                // エディターが編集されるとHTMLにレンダリングしボックスに反映される
                document.getElementById("editor").addEventListener("keyup", function() {
                    render();
                });
            });

            function click_preview(){
                hashmap.display_format = "Preview";
                render();
            }

            function click_html(){
                hashmap.display_format = "HTML";
                render();
            }

            function click_highlight(){
                var highlight_button = document.getElementById("highlight_button").innerHTML;
                if(highlight_button === "Highlight: ON"){
                    document.getElementById("highlight_button").innerHTML = "Highlight: OFF";
                }
                else{
                    document.getElementById("highlight_button").innerHTML = "Highlight: ON";
                }
                hashmap.highlight_sw = document.getElementById("highlight_button").innerHTML;
                render();
            }

            function click_download(){
                // download用にボタンを設定してHTMLにレンダリングする
                hashmap.display_format = "Preview";
                document.getElementById("highlight_button").innerHTML = "Highlight: ON";
                hashmap.highlight_sw = document.getElementById("highlight_button").innerHTML;
                render();

                const htmlContent = document.getElementById("display_area").innerHTML;
                const blob = new Blob([htmlContent], { type: "text/html" });
                const link = document.createElement("a");
                link.href = URL.createObjectURL(blob);
                link.download = "converted.html";
                link.click();
            }
            
            function render() {
                hashmap.editor_content = editor.getValue();

                fetch("render.php", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify(hashmap)
                })
                .then(response => response.text())
                .then(data => {
                    document.getElementById("display_area").innerHTML = data;
                })
                .catch(error => {
                    console.error("Error:", error);
                });
            }
    </script>

    <div class="flex-container">
        <div class="row">
            <div class="flex-item">
                <div id="editor" style="width:800px;height:600px;border:1px solid grey"></div>
            </div>
        </div>
        <div class="row">
            <div class="flex-item">
                <div class="scroll-box">
                    <button class="margin" id="preview_button" type="button" name="Preview" onclick="click_preview();">Preview</button>
                    <button class="margin" id="html_button" type="button" name="HTML" onclick="click_html();">HTML</button>
                    <button class="margin" id="highlight_button" type="button" name="Highlight" onclick="click_highlight();">Highlight: ON</button>
                    <button class="margin" id="download_button" type="button" name="Download" onclick="click_download();">Download</button>
                    <div id="display_area"></div>
                </div>
            </div>
        </div>
    </div>
</body>

