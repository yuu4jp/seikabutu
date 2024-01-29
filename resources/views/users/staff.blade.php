<!--平社員アカウントで入った場合に表示されるページ-->
<x-app-layout>
    <div>
        <div class="bg-fixed" style="background-image: url('https://kuju-kogen.jp/wp-content/uploads/2017/05/M1490003.jpg')"><h1 class="pt-[100px] border-y-[3px]">マイページ</h1></div>
        @if($user->image_url)
        <img class='relative top-[20px] left-[290px]' src='{{$user->image_url}}' width="150px" height="210px">
        @else
        <img class="relative top-[20px] left-[190px]" width="150" height="210" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAJkAAACUCAMAAAC3HHtWAAAAMFBMVEXd3d3h4eGoqKilpaWrq6vY2NjJycnFxcWwsLDV1dWioqLNzc3S0tK3t7fAwMC8vLyGJiiNAAADp0lEQVR4nO2X23LbOgxFRYIX8Kr//9tuUI6tpFZa+Mw4PTNYD4ktUeISCED05rZ/FTPTY2Z6zEyPmekxMz1mpsfM9JiZHjPTY2Z6zEyPmekxMz1mpsfM9JiZHjPTY2Z6zEyPmekxMz1mpsfM9JiZHjPTY2Z6zEyPmekxMz1mpsfM9JiZHjPT8z81KxxucFyD3/kc383ldvI36sRA19Mb1S6mcsIW/B0WMS4/bubSBMOfGLEEbhqz//gUTy93jRZns9Y9jjxVk4XeSox/qxJL/IuMfW6WH1IVkKdegk9Mp0SbvONvX39dQ63w/JiZUTCFOYty5lU9cayBOFAGKmqHW+NFvkqoP5iNFmMbviNiw+V6MhtUEcHmMbGblQJ7Oip4i5Vg5inIl+BrPO5IkqUuEYaGGpxL1cPRv2iWjlIoRYqBA30yI0awYOY60YwxeZruYQalLuaexIz9XsUhEo2yxdnFkQuIz8W+N0NaFZTBdP1WpZ/NBuXDbBBLOCZUTzGDjHO7Z4nZRtzlLKLLR14us/XYL5jJfEj72gt3fmKWAstqbhvTSqlOvpzNBpYzDDFzrY4YPGqEJa5LCGYhpdReMmuIhg/IsR23+d2sY4H6YZbkqkLUz2aZWq9pxWzgXrv4B6SqY2RalFuiuvgqaN+alQ1p3aIErz0xS9H7Hu4x2wr5T2aF5u5jqNEhXqlPGushnMONqpgFNM2rAvijGTVJ/gszZNYeVp7tR+KEeDILSHu/b2KGq1d7lKFDbhGW2et5ltzeo3yYjyOfzCKqHmaZCP3J8THrwwwdoi2JnQaiIyuZq+8YejJ7JWZIIYc+5qWowrMKcDKRNDGmkNGHqd/NnJjhqXAlvgRpIG6vQ0ogzJb9bTVznlcl8H0/K4V35hmxbL+bSdvFnNJpC683RTrOxIqkL9JoG4ZAolWSu7bqi4tjvVXw0KmSfBwvdFrkmF99e/vYDp3NWpZzPR/PnPY931+cOUMvpWNDl7IMklMxZcnDNscKVMloGil3fczwrsRC5tZm+HglnM1uCXL/576c+vjuVv86jb0nl3Mv5Rl5VKWUlPePTQe9cev4fKaIrQOWMnyFr15ybzPbYsRGscevvM/reuPpWnjn1vqZwdXx1n/4B9/1y+Gnf4n+9PzXmJkeM9NjZnrMTI+Z6TEzPWamx8z0mJkeM9NjZnrMTI+Z6TEzPWamx8z0mJkeM9NjZnrMTI+Z6TEzPWamx8z0mJkeM9NjZnr+WbNf7TcagsKmq/kAAAAASUVORK5CYII=" alt='開けない'/>
        @endif
        <div class="absolute top-[230px] left-[500px] flex flex-wrap justify-left m-[10px] pt-[10px] pr-[100px] pb-[10px] pl-[30px] divide-solid border-[3px] rounded-lg">
            <div class="sm:mr-[100px] md:mr-[300px]">
                <h4>名前</h4>
                <h3>{{$user->name}}</h3>
                <h4>性別</h4>
                <h3>{{$user->sex}}</h3>
                <h4>年齢</h4>
                <h3>{{$user->age}}</h3>
            </div>
            <div>
                <h4>部署</h4>
                <h3>{{$user->departure}}</h3>
                <h4>資格等</h4>
                <h3>{{$user->training}}</h3>
            </div>
        </div>
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
        <div class='open'>
        @foreach ($user->tasks as $task)
            <button popovertarget='{{$task->id}}' popovertargetaction='show'><h2 class="button">{{$task->task}}　　<span class='status'>{{$task->status}}</span></h2></button>
            <div popover id='{{$task->id}}' class='task_modal'>
                <form action='/users/task_create/{{$task->id}}' method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <h3>{{$task->task}}</h3>
                    <textarea name='task[comment]' >{{$task->comment}}</textarea>
                    <input type="file" name='pdf' value={{$user->pdf}}>
                    <select class='select' name='task[status]'>
                        <option value="開始前">開始前</option>
                        <option value="作業中">作業中</option>
                        <option value="終了">終了</option>
                    </select>
                    <input type='submit' value='保存'/>
                </form>
                
                <form action="/users/show/{{$task->id}}/delete" id="form_{{$task->id}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type='button' onclick="deleteTask({{$task->id}})">削除</button>
                </form>
                <button popovertarget='{{$task->id}}' popovertargetaction='hidden'>閉じる</button>
            </div>
        @endforeach
        </div>
        <a class='carendar' href="/calendar"><img class='fixed bottom-[20px] right-[60px]' width="100px" height="100px" src="https://ppdtp.com/wp-content/uploads/2019/06/beautiful-half-circle-3-500x500.png">カレンダー</a>
    </div>
    <script>
    function deleteTask(id) {
        'use strict'

        if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
            document.getElementById(`form_${id}`).submit();
        }
    }
    </script>
    
    <style scoped>
    
    .information{
        position: absolute;
        top: 230px;
        left: 500px;
        display: flex;
        flex-wrap: wrap;
        justify-content: left;
        margin: 10px;
        padding: 10px 100px 10px 30px;
        border: solid 3px;/*線*/
        border-radius: 10px;/*角の丸み*/
        
    }
    
    .info1{
        margin-right: 300px;
    }
    
    
    .task_add{
        position: absolute;
        top: 500px;
        left: 180px;
        padding: 5px;
        border: solid 3px;/*線*/
        border-radius: 10px;/*角の丸み*/
    }
    
    .open{
        background-color: gray;
        position: absolute;
        top: 500px;
        left: 300px;
        margin: 30px 300px 30px 30px;
        padding: 20px;
        border-radius: 10px;
    }
    
    .button{
        margin-right: 80px;
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
    
    .status{
         border: solid 3px;
         padding: 5px;
    }
    </style>
</x-app-layout>