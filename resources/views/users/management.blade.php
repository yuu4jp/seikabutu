<!--管理者アカウントでログインした場合に表示されるページ-->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        @foreach ($users as $user)
        <div class="member">
            <div class="face" img={{$user->image}}></div>
            <div class='name'>
                <h3>{{$user->name}}</h3>
            </div>
            <!--<div class='sex' >
                <h3>{{$user->sex}}</h3>
            </div>
            <div class='age' >
                <h3>{{$user->age}}</h3>
            </div>
            <div class='departure'>
                <h3>{{$user->departure}}</h3>
            </div>-->
            <a href="/users/{{$user->id}}/show">詳細</a>
        </div>
        @endforeach
        <div class="paginate">
            {{$->links()}}
        </div>
        <div class="carendar">
            <a href="carendars/carendar">カレンダー</a>
        </div>
    </body>
</html>