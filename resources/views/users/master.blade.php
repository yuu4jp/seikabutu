<!--マスターアカウントでログインした場合に表示されるページ-->
<x-app-layout>
        <div>
            @foreach ($users as $user)
        <div class="member">
            <div class="face" img={{$user->image}}></div>
            <div class='name'>
                <h3>{{$user->name}}</h3>
            </div>
            <a href="/users/{{$user->id}}">詳細</a>
        </div>
        @endforeach
        </div>
        <div class='add'>
            <a class="add" href="/users/add">追加</a>
        </div>
</x-app-layout>