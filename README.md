# 開発環境

- Laravel 8.29.0
- PHP 7.3.25
- MySQL 8.0.16

# 使い方

## Spotify for Developers

- https://developer.spotify.com/dashboard/login
- アプリを作成
- `Redirect URLs` は `ドメイン/result/` にする
    - たとえばローカルだったら `http://localhost/result/` にする

## ジャンルを取得する

- `ドメイン/genre/` にアクセスして `genres` テーブルにレコードを追加しておく
    - たとえばローカルだったら `http://localhost/genre/create/` にアクセスする

## .env 設定

- YOUR_CLIENT_ID
- YOUR_CLIENT_SECRET
- YOUR_REDIRECT_URI

## 開発メモ

```sh
php artisan migrate
composer install
npm i
npm run dev
```

### Laravel UI

- https://github.com/laravel/ui

```sh
composer require laravel/ui
```

```sh
npm i
npm i vue bootstrap
php artisan ui vue --auth
php artisan migrate
npm run dev
```

こけたら `node_modules` と `package-lock.json` を削除して `npm i` からやり直す

### Guzzle HTTP

- https://github.com/guzzle/guzzle

```sh
composer require guzzlehttp/guzzle
```

### Spotify Web API PHP

- https://github.com/jwilsson/spotify-web-api-php

```sh
composer require jwilsson/spotify-web-api-php
```

### laravel-enum

- https://github.com/BenSampo/laravel-enum

```sh
composer require bensampo/laravel-enum
```

### LaravelCollective

- https://github.com/LaravelCollective/docs

```sh
composer require "laravelcollective/html"
```
