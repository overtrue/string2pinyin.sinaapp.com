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
