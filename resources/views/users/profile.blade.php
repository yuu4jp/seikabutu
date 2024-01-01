<!--平社員アカウントで入った場合に表示されるページ-->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <h1>マイページ</h1>
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
        </div>
        <div class='training' name='user[training_id]'>
            @foreach ($trainings as $training)
            <h3>{{$training->training}}</h3>
            @endforeach
        </div>
        @foreach ($tasks as $task)
            <div class="task">
                <button popovertaget='task' popovertargetaction='show'>{{$task->task}}</button>
                <div popover id='task'>
                    <form action='/users' method='POST'>
                        @csrf
                        <textarea name='task[comment]'></textarea>
                        <input type="file" name='task[pdf]' accept='image/jpeg,image/png,image/pdf'>
                        <input type='submit' value='保存'/>
                    </form>
                        <button popovertarget='task' popovertargetaction='hidden'>閉じる</button>
                </div>
            </div>
            <div class="stastus">
                
            </div>
        @endforeach
        <div class="carendar">
            <a href="calendars/calendar">カレンダー</a>
        </div>
    </body>
</html>