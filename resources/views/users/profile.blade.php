<!--平社員アカウントで入った場合に表示されるページ-->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <div class="image" img={{$user->image}}>
            
        </div>
        <div class="information">
            <h3>{{$user->name}}</h3>
            <h3>{{$user->sex}}</h3>
            <h3>{{$user->age}}</h3>
            <h3>{{$user->departure}}</h3>
            <h3>{{$training->training}}</h3>
        </div>
        @foreach ($tasks as $task)
            <div class="task">
                <h3>{{$task->task}}</h3>
            </div>
            <div class="stastus">
                <h3></h3>
            </div>
        @endforeach
        <div class="carendar">
            <a href="calendars/calendar">カレンダー</a>
        </div>
    </body>
</html>