<?php
include __DIR__ . '/vendor/autoload.php';

$docs = <<<DOC
# Hi,欢迎使用中文转拼音服务

## API 地址

```
http://string2pinyin.sinaapp.com/?str=中文
```

## 参数

- `api` - 需要使用的 API 名称，可选：`convert/permlink/abbr/sentence/name`,具体请参考：https://github.com/overtrue/pinyin
- `option` 选项，对应 API 的第二个参数，具体请参考对应的 API：https://github.com/overtrue/pinyin

## 响应

正确：

```json
{
    status: "T",
    str: "中文转拼音服务",
    result: ["zhong","wen","zhuan","pin","yin","fu","wu"],
}
```

失败：

```json
{
    status: "F",
    error: "错误的请求,参数str不能为空。",
    doc: "http://string2pinyin.sinaapp.com/doc.html"
}
```

## 说明

- 本项目基于 [overtrue/pinyin](https://github.com/overtrue/pinyin) 完成
- 作者：[@overtrue](https://github.com/overtrue)
- 微博：[@安正超](http://weibo.com/44294631)
DOC;

$parser = new Parsedown();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>中文转拼音API - by overtrue</title>
    <meta name="keyword" content="Pinyin,汉字转拼音,中文转拼音, PHP,overtrue,安正超">
    <mata name="description" content="overtrue/pinyin - 基于CC-CEDICT词典的中文转拼音工具, 更准确的PHP汉字转拼音解决方案。 ">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/vendor/prism.css">
</head>
<body>
    <div class="wrapper">
        <div class="docs">
            <?= $parser->text($docs) ?>
        </div>

        <script src="/assets/vendor/prism.js"></script>
        <script>
            fixScale = function(doc) {

                var addEvent = 'addEventListener',
                    type = 'gesturestart',
                    qsa = 'querySelectorAll',
                    scales = [1, 1],
                    meta = qsa in doc ? doc[qsa]('meta[name=viewport]') : [];

                function fix() {
                    meta.content = 'width=device-width,minimum-scale=' + scales[0] + ',maximum-scale=' + scales[1];
                    doc.removeEventListener(type, fix, true);
                }

                if ((meta = meta[meta.length - 1]) && addEvent in doc) {
                    fix();
                    scales = [.25, 1.6];
                    doc[addEvent](type, fix, true);
                }

            };
            fixScale();

            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

            ga('create', 'UA-56482120-1', 'auto');
            ga('send', 'pageview');
        </script>
    </div>
</body>
</html>