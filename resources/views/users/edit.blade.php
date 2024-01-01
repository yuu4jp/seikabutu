<!--個人情報編集のみ（新規作成は別ページ-->）
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
    <h1 class="title">編集画面</h1>
        <div class="content">
            <form action="/users/{{ $user->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class='content_name'>
                    <h2>名前</h2>
                    <input type='text' name='user[name]' value="{{ $user->name }}">
                </div>               
                <div class='content__sex'>
                    <h2>性別</h2>
                    <input type='text' name='user[sex]' value="{{ $user->sex }}">
                </div>
                <div class="age">
                    <h2>年齢</h2>
                    <input type='text' name='user[age]' value="{{ $user->age}}">
                </div>
                <div class='departure'>
                    <h2>部署</h2>
                    <input type="text" name='user[departure]' value='{{ $user->departre}}'>
                </div>
                <div class='image'>
                    <h2>写真</h2>
                    <input type="image" name='user[image]' value='{{ $user->image}}'>
                </div>
                <div class='training'>
                    <h2>資格等</h2>
                    <input type="image" name='training[training]'>
                </div>
                <input type="submit" value="保存">
            </form>
        </div>
    </body>
</html>