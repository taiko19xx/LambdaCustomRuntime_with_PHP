# LambdaCustomRuntime_with_PHP 
「PHPでゼロからはじめるAWS Lambda Custom Runtime」で使用している各種スクリプトなどを格納しているリポジトリです。実際の利用方法については書籍を参照してください。

書籍は次の場所で販売中（販売していました）です。

* 技術書典6
* BOOTH（https://morinomiyakono.booth.pm/items/1303123）

## 動作環境
次の環境で動作確認しています。

* Windows 10 Pro （Build 1809）
* Docker for Windows 18.09.2
* AWS CLI 1.16.101
* SAM CLI 0.10.0

## 構造
各フォルダと章の対応表は次のとおりです。

| フォルダ                | 対応章                                                    | 中身                                 |
| ----------------------- | --------------------------------------------------------- | ------------------------------------ |
| Part3/mcrypt            | 第3章 応用して使ってみよう - 3.6 拡張を追加してみる       | build.shとphp.ini                    |
| Part3/mongodb           | 第3章 応用して使ってみよう - 3.6 拡張を追加してみる       | build.shとphp.ini                    |
| Part3/php56             | 第3章 応用して使ってみよう - 3.7 PHP5.6をビルドする       | buildphp56.shとphp.5.ini             |
| Part4                   | 第4章 コマンドでデプロイしよう                            | index.phpとSAMテンプレート           |
| Part5/slim3-app         | 第5章 フレームワークを使ってみよう - 5.2 Slim Framework 3 | index.phpとSAMテンプレート           |
| Part5/codeigniter-app   | 第5章 フレームワークを使ってみよう - 5.3 CodeIgniter      | Hello.phpとSAMテンプレート           |
| Part5/cake3-app         | 第5章 フレームワークを使ってみよう - 5.4 CakePHP3         | HelloController.phpとSAMテンプレート |
| Part5/yii-app           | 第5章 フレームワークを使ってみよう - 5.5 Yii Framework    | HelloController.phpとSAMテンプレート |
| Part5/laravel-app       | 第5章 フレームワークを使ってみよう - 5.6 Laravel          | Web.phpとSAMテンプレート             |
| Part5/phalcon-app/layer | 第5章 フレームワークを使ってみよう - 5.7 Phalcon          | build.shとphp.ini                    |
| Part5/phalcon-app/app   | 同上                                                      | index.phpとSAMテンプレート           |

ファイル名は、本文内「リストx.x （ファイル名）」のファイル名部分に対応しています。

## ライセンス
MIT License