# チャレンジャーが集うポジティブSNS『チャレコ』

## 1.アプリ概要
### (1)開発目的
* チャレンジは人生を豊かにする
* しかし、身近な人が自分のチャレンジを応援してくれるとは限らない(中には批判する人もいる)
* チャレンジャー同士が互いを高め合え、自己成長を実感できるプラットフォームを作りたかった

### (2)コンセプト
* チャレンジ特化型SNS
* チャレンジャー同士が互いを高め合える
* 自己成長を実感できる

(アプリ名の『チャレコ』は、Challenge Records(挑戦の記録)から名付けました)

### (3)特徴
* 自身のチャレンジを投稿 / 閲覧できる
* 他ユーザーのチャレンジを閲覧 / 応援できる
* チャレンジ中のチャレンジ / 過去のチャレンジを管理できる

### (4)URL
https://chalreco.net/

## 2.画面
### (1)ホーム
<img width="1440" alt="home" src="https://github.com/yamamoto117/chalreco/assets/99392507/04ae0d7f-d5cb-4846-b962-b1a98bf8db53">

### (2)検索
<img width="1440" alt="search" src="https://github.com/yamamoto117/chalreco/assets/99392507/8299000a-a297-42dc-9c8a-e48eec84887f">

### (3)マイページ
<img width="1440" alt="user" src="https://github.com/yamamoto117/chalreco/assets/99392507/911d5c4e-8f24-4f84-8f11-4221eab36177">

### (4)投稿ページ
<img width="1440" alt="post" src="https://github.com/yamamoto117/chalreco/assets/99392507/85e24e54-6c9a-4e6b-be99-79f3d9d2c5b1">

## 3.機能一覧
### (1)メイン機能
* チャレンジ投稿(テキスト / 画像)
* チャレンジ閲覧
  * 注目のチャレンジ / フォロー中のユーザーのチャレンジ
  * 検索(投稿 / ユーザー)
* チャレンジ応援(いいね)
* チャレンジ管理(チャレンジ中のチャレンジ / 過去のチャレンジ)
* フォロー

### (2)認証機能
* ユーザー登録
* ログイン / ログアウト
* ゲストログイン
* プロフィール編集
* 退会

## 4.使用技術
### (1)フロントエンド
* HTML
* CSS
* JavaScript
* Tailwind CSS 3.3.3
* Vue.js 2.7.14

### (2)バックエンド
* PHP 8.0.30
* Laravel 8.83.27
* MySQL 8.0.34
* Composer 2.6.5
* Node.js 16.20.2 / npm 8.19.4

### (3)インフラ
* Docker 20.10.21 / docker-compose 2.13.0 (開発環境)
* AWS (EC2/ALB/ACM/S3//RDS/Route53/VPC/EIP/IAM/CloudWatch)
* nginx 1.22.1

### (4)その他
* Git 2.40.1 / GitHub
* Visual Studio Code
* macOS

## 5.インフラ構成図
![infra](https://github.com/yamamoto117/chalreco/assets/99392507/4c519975-a81a-42f0-b5fa-e71dca95fdb5)

## 6.ER図
![er](https://github.com/yamamoto117/chalreco/assets/99392507/59f990c5-3fd3-4576-8662-cefc14137d01)
