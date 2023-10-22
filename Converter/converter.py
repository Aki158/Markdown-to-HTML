import json
import markdown
import sys

def main(argv):
    hashmap_json = argv[1]
    hashmap = json.loads(hashmap_json)
    editor_content = hashmap["editor_content"]
    highlight_sw = hashmap["highlight_sw"]

    htmlConverter(editor_content, highlight_sw)

# markdownをhtmlに変換する
def htmlConverter(editor_content, highlight_sw):
    config = {
        "codehilite":{
            "noclasses": True,
        }
    }

    if highlight_sw == "Highlight: ON":
        print(markdown.markdown(editor_content,extensions=["extra", "codehilite", "sane_lists", "toc", "fenced_code"], extension_configs=config))
    else:
        print(markdown.markdown(editor_content,extensions=["extra", "codehilite", "sane_lists", "toc", "fenced_code"]))


if __name__ == "__main__":
    main(sys.argv)