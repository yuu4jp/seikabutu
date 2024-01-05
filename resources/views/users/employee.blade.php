<!--個人情報詳細ページ（管理アカウントのみから入れる）編集ボタンなし-->
<x-app-layout>
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
            <div class='training'>
                <h3>{{$user->training}}</h3>
            </div>
        </div>
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
        <div class="back"><a href="/management">back</a></div>
</x-app-layout>