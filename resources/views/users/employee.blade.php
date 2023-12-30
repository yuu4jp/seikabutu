<!--個人情報詳細ページ（管理アカウントのみから入れる）編集ボタンなし-->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
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
                <button popovertarget='task' popovertargetaction='show'>{{$task->task}}</button>
                <div popover id='task'>
                    <h3>{{$task->comment}}</h3>
                    <div img="{{$task->pdf}}"></div>
                <button popovertarget='task' popovertargetaction='hidden'>閉じる</button>
                </div>
            </div>
            <div class="stastus">
                <h3></h3>
            </div>
        @endforeach
    </body>
</html>