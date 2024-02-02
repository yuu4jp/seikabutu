<!--個人情報詳細ページ（管理アカウントのみから入れる）編集ボタンなし-->
<x-app-layout>
    <div>
        <div class="bg-fixed" style="background-image: url('https://kuju-kogen.jp/wp-content/uploads/2017/05/M1490003.jpg')"><h1 class="pt-[100px] border-y-[3px]">　　詳細ページ</h1></div>
        @if($user->image_url)
        <img class='relative top-[20px] left-[290px] w-44 h-52 md:mr-20 lg:mr-28 xl:mr-36' src='{{$user->image_url}}'>
        @else
        <img class="relative top-[20px] left-[290px] w-44 h-52 md:mr-20 lg:mr-28 xl:mr-36" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAJkAAACUCAMAAAC3HHtWAAAAMFBMVEXd3d3h4eGoqKilpaWrq6vY2NjJycnFxcWwsLDV1dWioqLNzc3S0tK3t7fAwMC8vLyGJiiNAAADp0lEQVR4nO2X23LbOgxFRYIX8Kr//9tuUI6tpFZa+Mw4PTNYD4ktUeISCED05rZ/FTPTY2Z6zEyPmekxMz1mpsfM9JiZHjPTY2Z6zEyPmekxMz1mpsfM9JiZHjPTY2Z6zEyPmekxMz1mpsfM9JiZHjPTY2Z6zEyPmekxMz1mpsfM9JiZHjPT8z81KxxucFyD3/kc383ldvI36sRA19Mb1S6mcsIW/B0WMS4/bubSBMOfGLEEbhqz//gUTy93jRZns9Y9jjxVk4XeSox/qxJL/IuMfW6WH1IVkKdegk9Mp0SbvONvX39dQ63w/JiZUTCFOYty5lU9cayBOFAGKmqHW+NFvkqoP5iNFmMbviNiw+V6MhtUEcHmMbGblQJ7Oip4i5Vg5inIl+BrPO5IkqUuEYaGGpxL1cPRv2iWjlIoRYqBA30yI0awYOY60YwxeZruYQalLuaexIz9XsUhEo2yxdnFkQuIz8W+N0NaFZTBdP1WpZ/NBuXDbBBLOCZUTzGDjHO7Z4nZRtzlLKLLR14us/XYL5jJfEj72gt3fmKWAstqbhvTSqlOvpzNBpYzDDFzrY4YPGqEJa5LCGYhpdReMmuIhg/IsR23+d2sY4H6YZbkqkLUz2aZWq9pxWzgXrv4B6SqY2RalFuiuvgqaN+alQ1p3aIErz0xS9H7Hu4x2wr5T2aF5u5jqNEhXqlPGushnMONqpgFNM2rAvijGTVJ/gszZNYeVp7tR+KEeDILSHu/b2KGq1d7lKFDbhGW2et5ltzeo3yYjyOfzCKqHmaZCP3J8THrwwwdoi2JnQaiIyuZq+8YejJ7JWZIIYc+5qWowrMKcDKRNDGmkNGHqd/NnJjhqXAlvgRpIG6vQ0ogzJb9bTVznlcl8H0/K4V35hmxbL+bSdvFnNJpC683RTrOxIqkL9JoG4ZAolWSu7bqi4tjvVXw0KmSfBwvdFrkmF99e/vYDp3NWpZzPR/PnPY931+cOUMvpWNDl7IMklMxZcnDNscKVMloGil3fczwrsRC5tZm+HglnM1uCXL/576c+vjuVv86jb0nl3Mv5Rl5VKWUlPePTQe9cev4fKaIrQOWMnyFr15ybzPbYsRGscevvM/reuPpWnjn1vqZwdXx1n/4B9/1y+Gnf4n+9PzXmJkeM9NjZnrMTI+Z6TEzPWamx8z0mJkeM9NjZnrMTI+Z6TEzPWamx8z0mJkeM9NjZnrMTI+Z6TEzPWamx8z0mJkeM9NjZnr+WbNf7TcagsKmq/kAAAAASUVORK5CYII=" alt='開けない'/>
        @endif
        <div class="absolute top-[230px] left-[500px] flex flex-wrap justify-left m-[10px] pt-[10px] pr-[100px] pb-[10px] pl-[30px] divide-solid border-[3px] rounded-lg border-black">
            <div class="md:w-32 lg:w-64 xl:w-80">
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
        <div class="bg-slate-400 absolute top-[500px] left-[300px] w-40 md:w-1/3 xl:w-1/2 px-5 py-7 rounded-lg flex flex-wrap">
            @foreach ($user->tasks as $task)
            <button popovertarget='{{$task->id}}' popovertargetaction='show'><br><h1>　{{$task->task}}　<span class='border-4 rounded border-black p-1'>{{$task->status}}</span></h1></button>
            <div popover id='{{$task->id}}' class='task_modal'>
                <h3>{{$task->comment}}</h3>
                <a target='_blank' href='/storage/{{$task->pdf}}'>アップロードファイルの確認</a>
                <button popovertarget='{{$task->id}}' popovertargetaction='hidden'>閉じる</button>
            </div>
            @endforeach    
        </div>
        
        <div class="back"><a href="/management">back</a></div>
        <img id='circle' src="https://ppdtp.com/wp-content/uploads/2019/06/beautiful-half-circle-3-500x500.png">
    </div>  
    <style scoped>
    .back{
        position: fixed;
        bottom: 56px;
        right: 93px;
        z-index: 20;
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
        z-index: 10;
    }
    
    .status{
         border: solid 3px;
         padding: 5px;
    }
    </style>
</x-app-layout>