<!--管理者アカウントでログインした場合に表示されるページ-->
<x-app-layout>
        <div class='user'>
            @foreach ($users as $user)
            <div class='name'>
                @if($user->image_url)
                <img class='face' src='{{$user->image_url}}'>
                @else
                <img class="face"  src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAJkAAACUCAMAAAC3HHtWAAAAMFBMVEXd3d3h4eGoqKilpaWrq6vY2NjJycnFxcWwsLDV1dWioqLNzc3S0tK3t7fAwMC8vLyGJiiNAAADp0lEQVR4nO2X23LbOgxFRYIX8Kr//9tuUI6tpFZa+Mw4PTNYD4ktUeISCED05rZ/FTPTY2Z6zEyPmekxMz1mpsfM9JiZHjPTY2Z6zEyPmekxMz1mpsfM9JiZHjPTY2Z6zEyPmekxMz1mpsfM9JiZHjPTY2Z6zEyPmekxMz1mpsfM9JiZHjPT8z81KxxucFyD3/kc383ldvI36sRA19Mb1S6mcsIW/B0WMS4/bubSBMOfGLEEbhqz//gUTy93jRZns9Y9jjxVk4XeSox/qxJL/IuMfW6WH1IVkKdegk9Mp0SbvONvX39dQ63w/JiZUTCFOYty5lU9cayBOFAGKmqHW+NFvkqoP5iNFmMbviNiw+V6MhtUEcHmMbGblQJ7Oip4i5Vg5inIl+BrPO5IkqUuEYaGGpxL1cPRv2iWjlIoRYqBA30yI0awYOY60YwxeZruYQalLuaexIz9XsUhEo2yxdnFkQuIz8W+N0NaFZTBdP1WpZ/NBuXDbBBLOCZUTzGDjHO7Z4nZRtzlLKLLR14us/XYL5jJfEj72gt3fmKWAstqbhvTSqlOvpzNBpYzDDFzrY4YPGqEJa5LCGYhpdReMmuIhg/IsR23+d2sY4H6YZbkqkLUz2aZWq9pxWzgXrv4B6SqY2RalFuiuvgqaN+alQ1p3aIErz0xS9H7Hu4x2wr5T2aF5u5jqNEhXqlPGushnMONqpgFNM2rAvijGTVJ/gszZNYeVp7tR+KEeDILSHu/b2KGq1d7lKFDbhGW2et5ltzeo3yYjyOfzCKqHmaZCP3J8THrwwwdoi2JnQaiIyuZq+8YejJ7JWZIIYc+5qWowrMKcDKRNDGmkNGHqd/NnJjhqXAlvgRpIG6vQ0ogzJb9bTVznlcl8H0/K4V35hmxbL+bSdvFnNJpC683RTrOxIqkL9JoG4ZAolWSu7bqi4tjvVXw0KmSfBwvdFrkmF99e/vYDp3NWpZzPR/PnPY931+cOUMvpWNDl7IMklMxZcnDNscKVMloGil3fczwrsRC5tZm+HglnM1uCXL/576c+vjuVv86jb0nl3Mv5Rl5VKWUlPePTQe9cev4fKaIrQOWMnyFr15ybzPbYsRGscevvM/reuPpWnjn1vqZwdXx1n/4B9/1y+Gnf4n+9PzXmJkeM9NjZnrMTI+Z6TEzPWamx8z0mJkeM9NjZnrMTI+Z6TEzPWamx8z0mJkeM9NjZnrMTI+Z6TEzPWamx8z0mJkeM9NjZnr+WbNf7TcagsKmq/kAAAAASUVORK5CYII=" alt='開けない'/>
                @endif
                <h3>{{$user->name}}</h3>
                <a href="/users/{{$user->id}}/employee">詳細</a>
            </div>
            @endforeach
        </div>
        <div class="task_add">
            <h3>タスクの追加</h3>
            <button popovertarget='task_add' popovertargetaction='show'>追加する</button>
            <div popover id='task_add'>
                <form action='/users/task_store' method="POST">
                    @csrf
                    <input type='text' name='task[task]' placeholder='タスクの名前'/>
                    <input type='date' name='task[start_date]'>
                    <input type='date' name='task[end_date]'>
                    <h3>タスクを行う人</h3>
                    @foreach($users as $user)
                    <label>
                        <input type="checkbox" name='user_id[]' value="{{$user->id}}" >{{$user->name}}</input>
                    </label>
                    @endforeach
                    <input type="submit" value='保存'/>
                </form>
            </div>
        </div>
        <div class="carendar">
            <a href="carendars/carendar"><img id='circle' src="https://ppdtp.com/wp-content/uploads/2019/06/beautiful-half-circle-3-500x500.png">カレンダー</a>
        </div>
        
        <style scoped>
        
        .user{
            background-color: white;
            display: flex;
            flex-wrap: wrap;
            padding: 10px 10px;
            margin: 20px;
            -webkit-justify-content: space-around;
            border: solid 3px;/*線*/
            border-radius: 10px;/*角の丸み*/
        }
        
        .name{
            display: block;
        }
        
        .face{
            width: 150px;
            height: 210px;
        }
        
        .task_add{
            position: relative;
            top: 30px;
            left: 50px;
            padding: 5px;
            width: fit-content;
            border: solid 3px;/*線*/
            border-radius: 10px;/*角の丸み*/
        }
        
        .carendar{
            position: fixed;
            bottom: 56px;
            right: 80px;
            z-index: 2;
        }
        
        a{
            color: black;
            text-decoration: none;
        }
        
        #circle{
            position: fixed;
            bottom: 20px;
            right: 60px;
            width: 100px;
            higth: 100px;
            z-index: -1;
        }
        </style>
</x-app-layout>