<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>MDtoHTML</title>
    <style>
        p {
            margin-bottom: 0;
        }

        .editor-box {
            height: 600px;
            border: 1px solid grey
        }

        .scroll-box {
            height: 600px;
            border: 1px solid grey;
            overflow-y: scroll;
        }

        .text-black {
            color:black;
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

                // ロードされるとエディターの文字列をHTMLにレンダリングしdisplay_code_areaに表示させる
                window.addEventListener("load", (event) => {
                    render();
                });

                function debounce(func, wait) {
                    var timeout;
                    return function(...args) {
                        clearTimeout(timeout);
                        timeout = setTimeout(() => func.apply(this, args), wait);
                    };
                }

                // エディタの変更を監視し、debounce関数を使用して呼び出しを遅延させる
                editor.getModel().onDidChangeContent(debounce(render, 300));
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

                const htmlContent = document.getElementById("display_code_area").innerHTML;
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
                    document.getElementById("display_code_area").innerHTML = data;
                })
                .catch(error => {
                    console.error("Error:", error);
                });
            }
    </script>

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

