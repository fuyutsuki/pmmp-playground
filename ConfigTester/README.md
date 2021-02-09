# ConfigTester

Configのちょっとした説明をするだけのプラグイン。

## 動作

`PluginBase::onLoad()` 時に、data.jsonに書き込みを行います。
今ファイルがどういう状態なのかは、以下の`var_dump`関数を使うとpmmpのコンソールに出力されます。

```php
var_dump($data->getAll());
```