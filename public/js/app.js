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
