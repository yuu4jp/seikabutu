<!--個人情報詳細ページ（マスターアカウントのみから入れる）編集ボタンあり-->
<x-app-layout>
        @if($user->image_url)
        <img class='face' src='{{$user->image_url}}'>
        @else
        <img class="face"  src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAJkAAACUCAMAAAC3HHtWAAAAMFBMVEXd3d3h4eGoqKilpaWrq6vY2NjJycnFxcWwsLDV1dWioqLNzc3S0tK3t7fAwMC8vLyGJiiNAAADp0lEQVR4nO2X23LbOgxFRYIX8Kr//9tuUI6tpFZa+Mw4PTNYD4ktUeISCED05rZ/FTPTY2Z6zEyPmekxMz1mpsfM9JiZHjPTY2Z6zEyPmekxMz1mpsfM9JiZHjPTY2Z6zEyPmekxMz1mpsfM9JiZHjPTY2Z6zEyPmekxMz1mpsfM9JiZHjPT8z81KxxucFyD3/kc383ldvI36sRA19Mb1S6mcsIW/B0WMS4/bubSBMOfGLEEbhqz//gUTy93jRZns9Y9jjxVk4XeSox/qxJL/IuMfW6WH1IVkKdegk9Mp0SbvONvX39dQ63w/JiZUTCFOYty5lU9cayBOFAGKmqHW+NFvkqoP5iNFmMbviNiw+V6MhtUEcHmMbGblQJ7Oip4i5Vg5inIl+BrPO5IkqUuEYaGGpxL1cPRv2iWjlIoRYqBA30yI0awYOY60YwxeZruYQalLuaexIz9XsUhEo2yxdnFkQuIz8W+N0NaFZTBdP1WpZ/NBuXDbBBLOCZUTzGDjHO7Z4nZRtzlLKLLR14us/XYL5jJfEj72gt3fmKWAstqbhvTSqlOvpzNBpYzDDFzrY4YPGqEJa5LCGYhpdReMmuIhg/IsR23+d2sY4H6YZbkqkLUz2aZWq9pxWzgXrv4B6SqY2RalFuiuvgqaN+alQ1p3aIErz0xS9H7Hu4x2wr5T2aF5u5jqNEhXqlPGushnMONqpgFNM2rAvijGTVJ/gszZNYeVp7tR+KEeDILSHu/b2KGq1d7lKFDbhGW2et5ltzeo3yYjyOfzCKqHmaZCP3J8THrwwwdoi2JnQaiIyuZq+8YejJ7JWZIIYc+5qWowrMKcDKRNDGmkNGHqd/NnJjhqXAlvgRpIG6vQ0ogzJb9bTVznlcl8H0/K4V35hmxbL+bSdvFnNJpC683RTrOxIqkL9JoG4ZAolWSu7bqi4tjvVXw0KmSfBwvdFrkmF99e/vYDp3NWpZzPR/PnPY931+cOUMvpWNDl7IMklMxZcnDNscKVMloGil3fczwrsRC5tZm+HglnM1uCXL/576c+vjuVv86jb0nl3Mv5Rl5VKWUlPePTQe9cev4fKaIrQOWMnyFr15ybzPbYsRGscevvM/reuPpWnjn1vqZwdXx1n/4B9/1y+Gnf4n+9PzXmJkeM9NjZnrMTI+Z6TEzPWamx8z0mJkeM9NjZnrMTI+Z6TEzPWamx8z0mJkeM9NjZnrMTI+Z6TEzPWamx8z0mJkeM9NjZnr+WbNf7TcagsKmq/kAAAAASUVORK5CYII=" alt='開けない'/>
        @endif        
        <div class="information">
            <h4>名前</h4>
            <h3>{{$user->name}}</h3>
            <h4>性別</h4>
            <h3>{{$user->sex}}</h3>
            <h4>年齢</h4>
            <h3>{{$user->age}}</h3>
        </div>
        <div class='info'>
            <h4>部署</h4>
            <h3>{{$user->departure}}</h3>
            <h4>資格等</h4>
            <h3>{{$user->training}}</h3>
        </div>
        <div class="open">
            @foreach ($user->tasks as $task)
            <button popovertarget='{{$task->id}}' popovertargetaction='show'><br><h1>　　　　{{$task->task}}　　　　<span class='status'>{{$task->status}}　　　　</span></h1></button>
            <div popover id='{{$task->id}}' class='task_modal'>
                <h3>{{$task->comment}}</h3>
                <img src="{{$task->pdf}}">
            <button popovertarget='{{$task->id}}' popovertargetaction='hidden'>閉じる</button>
            </div>
        @endforeach    
        </div>
        <div class="edit"><a href="/users/{{ $user->id }}/edit"><img id='circle2' src="https://ppdtp.com/wp-content/uploads/2019/06/beautiful-half-circle-3-500x500.png">編集</a></div>
        <div class="back"><a href="/master"><img id='circle' src="https://ppdtp.com/wp-content/uploads/2019/06/beautiful-half-circle-3-500x500.png">back</a></div>
        <style scoped>
        
        html,body{
            height: 100%;
        }
        
        body{
            background-color: white;
        }
        *{
            margiin: 0;
            padding: 0;
        }
        
        .face{
            position: relative;
            top: 45px;
            left: 30px;
            width: 150px;
            height: 210px;
        }
        
        .information{
            position: absolute;
            top: 130px;
            left: 230px;
        }
         .info{
             position: absolute;
             top: 130px;
             left: 450px;
         }
        .open{
            background-color: gray;
            position: absolute;
            top: 400px;
            left: 100px;
        }
        .back{
            position: fixed;
            top: 620px;
            left: 712px;
            z-index: 2;
        }
        .edit{
            position: fixed;
            top: 620px;
            left: 835px;
            z-index: 2;
        }
        
        #circle2{
            position: fixed;
            top: 580px;
            left: 800px;
            width: 100px;
            higth: 100px;
            z-index: -1;
        }
        
        a{
            color: black;
            text-decoration: none;
        }
        
        #circle{
            position: fixed;
            top: 580px;
            left: 680px;
            width: 100px;
            higth: 100px;
            z-index: -1;
        }
    
        
        </style>
</x-app-layout>