# チャレンジャーが集うポジティブSNS『チャレコ』

![chalreco](https://github.com/yamamoto117/chalreco/assets/99392507/31a7bafe-3c1c-490e-93cf-f344b83c189e)

## 1.アプリ概要
### (1)開発目的
* チャレンジは人生を彩り、心を豊かにする
* しかし、身近な人が自分のチャレンジを肯定してくれるとは限らない(中には批判する人もいる)
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

## 2.主な機能

<table>
	<tr>
		<th style="text-align: center">チャレンジ投稿</th>
		<th style="text-align: center">チャレンジ閲覧(検索)</th>
	</tr>
	<tr>
		<td><img alt="post" src="https://github.com/yamamoto117/chalreco/assets/99392507/deabb995-5771-42ea-a48f-4e96cc971625"></td>
		<td><img alt="view" src="https://github.com/yamamoto117/chalreco/assets/99392507/e73736ce-c220-49ba-a54f-f3ab28252dfe"></td>
  </tr>
</table>

<table>
	<tr>
		<th style="text-align: center">チャレンジ応援</th>
		<th style="text-align: center">チャレンジ管理</th>
	</tr>
	<tr>
		<td><img alt="good" src="https://github.com/yamamoto117/chalreco/assets/99392507/9398556c-0611-4a21-a561-7301809e01bb"></td>
		<td><img alt="management" src="https://github.com/yamamoto117/chalreco/assets/99392507/b29a1cb3-bed4-4230-9ed4-e6d3ec909d7c"></td>
  </tr>
</table>

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
