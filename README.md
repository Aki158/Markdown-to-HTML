# Markdown-to-HTML

## 🌱概要
オンラインでエディタに記述したMarkdownをHTMLへ変換できるサービス

## 🏠URL
https://markdown-to-html.aki158-website.blog

## ✨デモ
![output](https://github.com/Aki158/Markdown-to-HTML/assets/119317071/44a08cf1-a80d-4741-9f0e-9841d78fe2c8)

## 📝説明
このサービスは、ユーザーがエディタに記述したMarkdownをHTMLへ変換できるサービスです。

Markdownは、簡単な記法を使って書式付きの文書を作成することができます。

Webエンジニアやwebデザイナーなどのコンテンツクリエーターは、Markdownで文書を作成することがあります。

このサービスでは、文書作成時にMarkdownを使用しアウトプットとしてHTMLに変換させたい!という場面に使えるサービスです。

基本的な機能として、Markdownの記述/テキストボックスの表示/3種類の表示切り替え/ダウンロードができます。

Markdownの記述からダウンロードまで全てオンラインで完結することができます。

エディタにMarkdownを記述すると、リアルタイムでテキストボックスにHTMLが表示されます。

表示の切り替えは、下記の3種類から選択できます。

機能の詳細は、[機能一覧](#機能一覧)を確認してください。

- Preview
- HTML
- Hightlight

また、このサービスは、下記プロジェクトで作成したツールの拡張版になります。

[Markdown-to-HTML-Converter](https://github.com/Aki158/Markdown-to-HTML-Converter)

### 補足
#### 用語集
[説明](#説明)で登場する用語について補足します。

用語の意味がわからない時は、下記表を確認してください。

| 用語 | 意味 |
| ------- | ------- |
| Markdown | 簡単な記法で読みやすく、HTMLなどの他の形式に変換できることを目的としたテキストベースの軽量マークアップ言語です。 |
| HTML | Webページを作成するための標準的なマークアップ言語です。<br>テキスト、画像、リンク、フォームなどのWebコンテンツをブラウザに表示する際に必要となる指示を提供しています。 |
| エディタ | テキストやコードなどを作成、編集、表示するためのソフトウェアのことです。<br>このサービスでは、ページの左側にある先頭の行に「# 見出し1」と記載してある入力欄のことです。 |
| テキストボックス | テキストを入力、表示するために設けられた長方形の領域のことです。<br>このサービスでは、ページの右側にある「3種類の表示切り替えとダウンロードボタン」がある表示欄のことです。 |
| コードブロック | プログラムのソースコードやコマンドラインの入力などを、文書内で特別なフォーマットで表示するための方法です。<br>テキストベースのドキュメント（技術的なドキュメントやプログラミング関連の資料）で使用され、読者に対して特定のコードやコマンドを分かりやすく示すために使われます。 |

#### Markdownの記述方法について
下記記事にわかりやすく一覧でまとめてありました。

不明な点がある場合は、確認してください。

[Markdown記法一覧](https://qiita.com/oreo/items/82183bfbaac69971917f#:~:text=Markdown%EF%BC%88%E3%83%9E%E3%83%BC%E3%82%AF%E3%83%80%E3%82%A6%E3%83%B3%EF%BC%89%E3%81%AF%E3%80%81,%E3%82%82%E9%96%8B%E7%99%BA%E3%81%95%E3%82%8C%E3%81%A6%E3%81%84%E3%82%8B%E3%80%82)

#### HTMLについて
下記ドキュメントに基本的な情報がわかりやすく記載してありました。

不明な点がある場合は、確認してください。

[HTML の基本](https://developer.mozilla.org/ja/docs/Learn/Getting_started_with_the_web/HTML_basics)

## 🚀使用方法
1. [URL](#URL)にアクセスする
2. エディタにMarkdownを記述する
3. テキストボックスを確認する
4. テキストボックスが期待している表示になっているか確認する
5. Download ボタンをクリックする

## 🙋使用例
一通りの手順のイメージは[デモ](#デモ)を参考にしてください。

1. [URL](#URL)にアクセスする
2. エディタにMarkdownを記述する。<br>今回は、「- リスト4」を追記します。
3. テキストボックスを確認する。<br>エディタにMarkdownを記述すると、リアルタイムでテキストボックスにHTMLが表示されます。<br>HTMLやハイライトを切り替えたくなった場合は、表示切り替えボタンをクリックして切り替えてみてください。
4. テキストボックスが期待している表示になっているか確認する。<br>期待している表示になっていない場合は、手順2.に戻ってみてください。
5. 記述が完了したのでDownloadボタンをクリックする

## 💾使用技術
<table>
<tr>
  <th>カテゴリ</th>
  <th>技術スタック</th>
</tr>
<tr>
  <td rowspan=5>フロントエンド</td>
  <td>HTML</td>
</tr>
<tr>
  <td>CSS</td>
</tr>
<tr>
  <td>JavaScript</td>
</tr>
<tr>
  <td>フレームワーク : Bootstrap</td>
</tr>
<tr>
  <td>ライブラリ(コードエディタ) : Monaco Editor</td>
</tr>
<tr>
  <td rowspan=2>バックエンド</td>
  <td>PHP</td>
</tr>
<tr>
  <td>Python</td>
</tr>
<tr>
  <td rowspan=4>インフラ</td>
  <td>Amazon EC2</td>
</tr>
<tr>
  <td>Nginx</td>
</tr>
<tr>
  <td>Ubuntu</td>
</tr>
<tr>
  <td>VirtualBox</td>
</tr>
<tr>
  <td rowspan=3>その他</td>
  <td>Git</td>
</tr>
<tr>
  <td>Github</td>
</tr>
<tr>
  <td>SSL/TLS証明書取得、更新、暗号化 : Certbot</td>
</tr>
</table>

## 👀機能一覧
![image](https://github.com/Aki158/Markdown-to-HTML/assets/119317071/c8c0e36a-87de-441c-8027-ca9f840b88a6)

| 機能 | 内容 |
| ------- | ------- |
| エディタ | Markdownを記述できます。 |
| テキストボックス | エディタにMarkdownを記述すると、リアルタイムで表示されます。 |
| Preview | テキストボックスにレンダリングされたHTMLを表示します。 |
| HTML | テキストボックスにHTMLを表示します。 |
| Hightlight | コードブロックのHightlightをON/OFFで切り替えます。 |
| Download | ボタンクリック時のエディタに表示されている文字列をHTMLとして、ユーザーのPCにダウンロードします。<br>ファイルは「converted.html」というファイル名でダウンロードされます。 |

## 📮今後の実装したいもの
- [ ] 作成したMarkdownをオンラインで保存する
- [ ] 保存したMarkdownを見返せる

## 📑参考文献
### 公式ドキュメント
- [Monaco Editor](https://microsoft.github.io/monaco-editor/)
- [Bootstrap](https://getbootstrap.jp/)
- [PHPマニュアル](https://www.php.net/manual/ja/index.php#index)

### 参考にしたサイト
- [Markdown記法一覧](https://qiita.com/oreo/items/82183bfbaac69971917f#:~:text=Markdown%EF%BC%88%E3%83%9E%E3%83%BC%E3%82%AF%E3%83%80%E3%82%A6%E3%83%B3%EF%BC%89%E3%81%AF%E3%80%81,%E3%82%82%E9%96%8B%E7%99%BA%E3%81%95%E3%82%8C%E3%81%A6%E3%81%84%E3%82%8B%E3%80%82)
- [HTML の基本](https://developer.mozilla.org/ja/docs/Learn/Getting_started_with_the_web/HTML_basics)
