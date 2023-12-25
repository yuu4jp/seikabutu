<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <div>
            @foreach ($users as $user)
        <div class="member">
            <div class="face" img={{$user->image}}></div>
            <h3>{{$user->name}}</h3>
            <h3>{{$user->sex}}</h3>
            <h3>{{$user->age}}</h3>
            <h3>{{$user->departure}}</h3>
            <h3>{{$training->training}}</h3>
            <a href="/users/{{$user->id}}/edit">編集</a>
        </div>
        @endforeach
        </div>
        <div class="paginate">
            {{$->links()}}
        </div>
        <div>
            <a class="add" href="">追加</a>
        </div>
    </body>
</html>