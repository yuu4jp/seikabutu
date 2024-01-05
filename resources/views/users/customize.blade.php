<!--個人情報詳細ページ（マスターアカウントのみから入れる）編集ボタンあり-->
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
            <div class="training">
                <h3>{{$user->training}}</h3>
            </div>
        </div>
        @foreach ($tasks as $task)
            <div class="task">
                <h3>{{$task->task}}</h3>
            </div>
            <div class="stastus">
                <h3>ステータス</h3>
            </div>
        @endforeach
        <div class="edit"><a href="/users/{{ $user->id }}/edit">編集</a></div>
        <div class="back"><a href="/master">back</a></div>
</x-app-layout>