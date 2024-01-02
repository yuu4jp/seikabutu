<!--平社員アカウントで入った場合に表示されるページ-->
<x-app-layout>
        <img class="image" {{--src="{{$user->image}}"--}} src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAJkAAACUCAMAAAC3HHtWAAAAMFBMVEXd3d3h4eGoqKilpaWrq6vY2NjJycnFxcWwsLDV1dWioqLNzc3S0tK3t7fAwMC8vLyGJiiNAAADp0lEQVR4nO2X23LbOgxFRYIX8Kr//9tuUI6tpFZa+Mw4PTNYD4ktUeISCED05rZ/FTPTY2Z6zEyPmekxMz1mpsfM9JiZHjPTY2Z6zEyPmekxMz1mpsfM9JiZHjPTY2Z6zEyPmekxMz1mpsfM9JiZHjPTY2Z6zEyPmekxMz1mpsfM9JiZHjPT8z81KxxucFyD3/kc383ldvI36sRA19Mb1S6mcsIW/B0WMS4/bubSBMOfGLEEbhqz//gUTy93jRZns9Y9jjxVk4XeSox/qxJL/IuMfW6WH1IVkKdegk9Mp0SbvONvX39dQ63w/JiZUTCFOYty5lU9cayBOFAGKmqHW+NFvkqoP5iNFmMbviNiw+V6MhtUEcHmMbGblQJ7Oip4i5Vg5inIl+BrPO5IkqUuEYaGGpxL1cPRv2iWjlIoRYqBA30yI0awYOY60YwxeZruYQalLuaexIz9XsUhEo2yxdnFkQuIz8W+N0NaFZTBdP1WpZ/NBuXDbBBLOCZUTzGDjHO7Z4nZRtzlLKLLR14us/XYL5jJfEj72gt3fmKWAstqbhvTSqlOvpzNBpYzDDFzrY4YPGqEJa5LCGYhpdReMmuIhg/IsR23+d2sY4H6YZbkqkLUz2aZWq9pxWzgXrv4B6SqY2RalFuiuvgqaN+alQ1p3aIErz0xS9H7Hu4x2wr5T2aF5u5jqNEhXqlPGushnMONqpgFNM2rAvijGTVJ/gszZNYeVp7tR+KEeDILSHu/b2KGq1d7lKFDbhGW2et5ltzeo3yYjyOfzCKqHmaZCP3J8THrwwwdoi2JnQaiIyuZq+8YejJ7JWZIIYc+5qWowrMKcDKRNDGmkNGHqd/NnJjhqXAlvgRpIG6vQ0ogzJb9bTVznlcl8H0/K4V35hmxbL+bSdvFnNJpC683RTrOxIqkL9JoG4ZAolWSu7bqi4tjvVXw0KmSfBwvdFrkmF99e/vYDp3NWpZzPR/PnPY931+cOUMvpWNDl7IMklMxZcnDNscKVMloGil3fczwrsRC5tZm+HglnM1uCXL/576c+vjuVv86jb0nl3Mv5Rl5VKWUlPePTQe9cev4fKaIrQOWMnyFr15ybzPbYsRGscevvM/reuPpWnjn1vqZwdXx1n/4B9/1y+Gnf4n+9PzXmJkeM9NjZnrMTI+Z6TEzPWamx8z0mJkeM9NjZnrMTI+Z6TEzPWamx8z0mJkeM9NjZnrMTI+Z6TEzPWamx8z0mJkeM9NjZnr+WbNf7TcagsKmq/kAAAAASUVORK5CYII="/>
        <div class="information">
            <h3>{{$user->name}}</h3>
            <h3>{{$user->sex}}</h3>
            <h3>{{$user->age}}</h3>
            <h3>{{$user->departure}}</h3>
        </div>
        {{--<div class='training' name='user[training_id]'>
            @foreach ($trainings as $training)
            <h3>{{$training->training}}</h3>
            @endforeach
        </div>--}}
        <div class="task_add">
            <h3>タスクの追加</h3>
            <button popovertarget='task_add' popovertargetaction='show'>追加する</button>
            <div popover id='task_add'>
                <form action='/users/task_create' method="POST">
                    @csrf
                    <input type='text' name='task[task]' placeholder='タスクの名前'/>
                    <input type='date' name='task[start_date]'>
                    <input type='date' name='task[end_date]'>
                    <input type="submit" value='保存'/>
                </form>
            </div>
        </div>
        <p class='open'>タスク一覧</p>
        {{--@foreach ($tasks as $task)
            <div class="task">
                <button popovertarget='task' popovertargetaction='show'>{{$task->task}}</button>
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
        @endforeach--}}
        <div class="carendar">
            <a href="calendars/calendar">カレンダー</a>
        </div>
</x-app-layout>