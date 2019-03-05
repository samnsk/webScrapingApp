# webScrapingApp

## 初期設定
### .env
```
$ cp webScrapingApp/.env.default ./.env
```
.env内の記述をご自身の環境に合わせてください

### cronファイルの生成、読み込み
crontab読み込み用ファイルを生成
```
$ webScrapingApp/app/Console/cake cron
```
以下のファイルが生成されます
```
$ webScrapingApp/app/cron/cron 
```
crontabにへ読み込む
```
$ crontab < webScrapingApp/app/cron/cron
```


