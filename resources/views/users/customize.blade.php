<!--個人情報詳細ページ（マスターアカウントのみから入れる）編集ボタンあり-->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <div class="image" img={{$user->image}}></div>
        <div class="information">
            <div class='name'>
                <h3>{{$user->name}}</h3>
            </div>
            <div class='sex' >
                <h3>{{$user->sex}}</h3>
            </div>
            <div class='age' >
                <h3>{{$user->age}}</h3>
            </div>
            <div class='departure'>
                <h3>{{$user->departure}}</h3>
            </div>
        </div>
        @foreach ($trainings as $training)
            <div class='training'>
                <h3>{{$training->training}}</h3>
            </div>
        @endforeach
        @foreach ($tasks as $task)
            <div class="task">
                <h3>{{$task->task}}</h3>
            </div>
            <div class="stastus">
                <h3></h3>
            </div>
        @endforeach
        <div class="edit"><a href="/users/{{ $user->id }}/edit">編集</a></div>
        <div class="back"><a href="/users/master">back</a></div>
    </body>
</html>