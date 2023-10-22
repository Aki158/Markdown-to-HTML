import markdown
import sys

def main(argv):
    input = argv[1]
    htmlConverter(input)

# markdownをhtmlに変換する
def htmlConverter(input):
    # extension_configsパラメータに渡す辞書
    config = {
        'codehilite':{
            'noclasses': True,
        }
    }
    print(markdown.markdown(input,extensions=['extra','codehilite','sane_lists','toc', 'fenced_code'], extension_configs=config))


if __name__ == '__main__':
    main(sys.argv)