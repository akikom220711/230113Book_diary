# Book diary
- 読書記録サービス<br><br>
![top page](/public/img_readme/top.gif)

## 作成した目的
- 簡便な読書記録作成できるアプリがあると便利であると思ったため。<br><br>

## アプリケーションURL
https://github.com/akikom220711/230113Book_diary<br><br>

## 使用技術（実行環境）
- Windows 10
- Laravel 8.X
- PHP 8.1.6
- XAMPP 8.1.10
- Apache 2.4.53
- mySQL 15.1
<br><br>

## 環境構築
1. git cloneでリポジトリをダウンロードする。

2. ダウンロードしたディレクトリをC:\xampp\htdocsに移動する。

3. XAMPPのApacheとmySQLを起動する。

3. mySQL（MariaDB）内に「bookdiary」という名前のデータベースを作成する。

4. CLIでダウンロードしたディレクトリまで移動し、「php artisan migrate」を入力して実行する。
(マイグレーション)

5. テストデータを使用する場合には「php artisan db:seed」を入力して実行する。
（シーディング）

6. 「php artisan serve」を入力し、Webサーバーを起動する。

7. [http://127.0.0.1:8000/](http://127.0.0.1:8000/)にアクセスすることでアプリを実行することができる。

### テスト用アカウント
シーディングを行うと自動的に登録されるアカウント
- name: aaa, email: aaa@example.com, password: aaaaaaaaa, 登録テーブル: users
- name: bbb, email: bbb@example.com, password: bbbbbbbbb, 登録テーブル: users
<br><br>

# 機能一覧
- 会員登録機能<br>
ゲストでページを閲覧している際にメニューの「新規登録」から選択可能。<br>
また、ユーザー登録の際にメールアドレスの認証も行うことができる。<br><br>

- ユーザー認証機能（ログイン・ログアウト）<br>
ログイン：ゲストでページを閲覧している際にメニューの「ログイン」から選択可能<br>
ログアウト：ユーザー権限でページを閲覧している際にメニューの「ログアウト」から選択可能<br><br>

- 読書記録一覧表示機能<br>
カレンダー上に登録された読書記録を表示することができる。<br><br>

- 読書記録詳細表示機能<br>
カレンダー上の読書記録を選択することで、選択した書籍の詳細情報を閲覧することができる。<br><br>

- 読書記録登録機能<br>
カレンダー上の日付を選択することで、選択した日付を読了日とする読書記録を作成することができる。<br><br>

- 読書記録編集機能<br>
詳細表示ページの「修正」ボタンをクリックすると編集ページに移動する。<br>
編集ページで詳細情報の内容を修正することができる。<br><br>

- 読書記録削除機能<br>
詳細表示ページの「削除」ボタンをクリックすることで読書記録を削除することができる。<br><br>

- 読書記録検索機能<br>
ゲストでページを閲覧している際にメニューの「検索」から選択可能。<br>
書名とジャンルから検索を行うことができる。<br><br>

- つんどく（未読本）一覧・登録・削除機能<br>
ゲストでページを閲覧している際にメニューの「つんどく」を選択することで一覧表示を見ることができる。<br>
つんどくページの「登録する」ボタンから新規登録、「削除」ボタンから該当書籍を削除することができる。<br><br>

- 色設定機能<br>
ジャンルごとに色を変えてカレンダー上に読書記録を表示することができる。<br>
ジャンルごとの色指定はメニューの「設定」から行うことができる。<br><br>

## テーブル設計
- users table<br>
ユーザー登録用テーブル。<br>
![users table image](/public/img_readme/users_table.gif)

- books table<br>
読了済み書籍登録用テーブル。<br>
![books table image](/public/img_readme/books_table.gif)

- unread books table<br>
未読書籍登録用テーブル<br>
![unread books table image](/public/img_readme/unread_books_table.gif)

- category table<br>
書籍ジャンル登録用テーブル<br>
![categories table image](/public/img_readme/categories_table.gif)





