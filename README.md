# PHP サンプルプログラム

## How to use

### docker を使っている場合

```
$ docker compose up -d
```

で立ち上げた後、 http://localhost:8030/init/init.php で初期化

### XAMPP など使っている場合

config.php の $serverhost、$username、$passwordなどの接続情報を変更<br>
htdocs直下に置かない場合は $topPath も変更すること<br>

http://localhost/init/init.php で初期化
