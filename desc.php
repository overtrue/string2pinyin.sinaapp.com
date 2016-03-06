<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>中文转拼音服务 - by overtrue</title>
    <style>
        body, html {
            height: 100%;
            width: 100%;
        }

        body, h1, h2, h3, h4, h5, h6 {
            font-family: "Helvetica Neue",Helvetica,"Noto Sans","ff-tisa-web-pro-1","ff-tisa-web-pro-2","Lucida Grande","Hiragino Sans GB", "Microsoft YaHei", "WenQuanYi Micro Hei", sans-serif;
        }

        code {
            padding: 2px 4px;
            font-family: Monaco, Consolas, "Liberation Mono", Menlo, Courier, monospace;
            color: #6f6f6f;
            border: 1px solid #eee;
            border-radius: 8px;
            background: #efefef;
        }

        ul li {line-height: 1.8em;}

        pre {
            padding:10px;
            border: 1px solid #eee;
            border-radius: 8px;
            background: #fefefe;
        }

        #json {
            white-space: pre;
            font-family: monospace;
            white-space: normal !important;
        }

        #json ul {
            list-style-type: none;
            padding: 0px;
            margin: 0px 0px 0px 26px;
        }

        #json li {
            position: relative;
        }

        .hoverable {
            transition: background-color .2s ease-out 0s;
            -webkit-transition: background-color .2s ease-out 0s;
            display: inline-block;
        }

        .hovered {
            transition-delay: .2s;
            -webkit-transition-delay: .2s;
        }

        .selected {
            outline-style: solid;
            outline-width: 1px;
            outline-style: dotted;
        }

        .collapsed>.collapsible {
            display: none;
        }

        .ellipsis {
            display: none;
        }
        .property {
          font-weight: bold;
        }

        .type-null {
          color: gray;
        }

        .type-boolean {
          color: firebrick;
        }

        .type-number {
          color: blue;
        }

        .type-string {
          color: green;
        }

        .callback-function {
          color: gray;
        }

        .ellipsis:after {
          content: " … ";
        }

        .collapsible {
          margin-left: 2em;
        }

        .hoverable {
          padding-top: 1px;
          padding-bottom: 1px;
          padding-left: 2px;
          padding-right: 2px;
          border-radius: 2px;
        }

        .hovered {
          background-color: rgba(235, 238, 249, 1);
        }
    </style>
</head>
<body>
    <h1>Hi,欢迎使用中文转拼音服务</h1>
    <div class="desc">
        <h2>参数说明：</h2>
        <ul>
            <li><code>str</code> - * 中文内容</li>
            <li><code>delimiter</code> - 分隔符，默认为一个空格<code>' '</code></li>
            <li><code>traditional</code> - 使用繁体, 默认:<code>0</code></li>
            <li><code>accent</code> - 是否输出音调，默认:<code>1</code></li>
            <li><code>letter</code> - 只输出首字母，或者直接使用 <code>Pinyin::letter($string)</code></li>
            <li><code>only_chinese</code>只保留 <code>$string</code> 中中文部分, 默认:<code>0</code> </li>
        </ul>
        <h2>返回格式：</h2>
        <pre>
            <div id="json">
                {
                <span class="ellipsis"></span>
                <ul class="obj collapsible">
                    <li>
                        <div class="hoverable">
                            <span class="property">str</span>:<span class="type-string">"中文转拼音服务"</span>,
                        </div>
                    </li>
                    <li>
                        <div class="hoverable">
                            <span class="property">pinyin</span>:<span class="type-string">"zhōng wén zhuǎn pīn yīn fú wù"</span>,
                        </div>
                    </li>
                    <li>
                        <div class="hoverable">
                            <span class="property">setting</span>:
                            <div class="collapser"></div>
                            {
                            <span class="ellipsis"></span>
                            <ul class="obj collapsible">
                                <li>
                                    <div class="hoverable">
                                        <span class="property">accent</span>:<span class="type-boolean">true</span>,
                                    </div>
                                </li>
                                <li>
                                    <div class="hoverable">
                                        <span class="property">delimiter</span>:
                                        <span class="type-string">" "</span>,
                                    </div>
                                </li>
                                <li>
                                    <div class="hoverable">
                                        <span class="property">traditional</span>:<span class="type-boolean">false</span>,
                                    </div>
                                </li>
                                <li>
                                    <div class="hoverable">
                                        <span class="property">letter</span>:<span class="type-boolean">false</span>,
                                    </div>
                                </li>
                                <li>
                                    <div class="hoverable">
                                        <span class="property">only_chinese</span>:<span class="type-boolean">false</span>
                                    </div>
                                </li>
                            </ul>
                            }
                        </div>
                    </li>
                </ul>
                }
            </div>
        </pre>
        <h2>说明：</h2>
        <ul>
            <li>本项目基于<a href="https://github.com/overtrue/pinyin">overtrue/pinyin</a>完成</li>
            <li>作者：<a href="https://github.com/overtrue" target="_blank">@overtrue</a></li>
            <li>微博：<a href="http://weibo.com/joychaocc" target="_blank">@安正超</a></li>
        </ul>
    </div>
    <?php include __DIR__ . '/footer.php'; ?>
</body>
</html>