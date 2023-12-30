<!--新しい人追加画面（マスターのページからのみ入れる）-->
<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <form action="/posts" method="POST">
            @csrf
            <div class='name'>
                <h3>名前</h3>
                <input type="text" name='user[name]'>
            </div>
            <div class='sex' >
                <h3>性別</h3>
                <input type='text' name='user[sex]'>
            </div>
            <div class='age' >
                <h3>年齢</h3>
                <input type='number' name='user[age]'>
            </div>
            <div class='departure'>
                <h3>部署</h3>
                <input type='text' name='user[departure]'>
            </div>
            <div class='password'>
                <h3>パスワード</h3>
                <input type='password' name='user[password]'>
            </div>
            <div class='employee_id'>
                <h3>社員番号</h3>
                <input type='text' name='user[employee_id]'>
            </div>
            <div class='master'>
                <h3>管理アカウント</h3>
                <input type='text' name='user[master]'>
            </div>
            <div class='image'>
                <h3>写真</h3>
                <input type='file' accept='image/png, image/ipeg' name='user[image]'>
            </div>
            <input type="submit" value="保存"/>
        </form>
        <div class="back">[<a href="/">back</a>]</div>
    </body>
</html>