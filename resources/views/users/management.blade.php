<!--管理者アカウントでログインした場合に表示されるページ-->
<x-app-layout>
        @foreach ($users as $user)
        <div class="member">
            <div class="face" img='{{$user->image}}' value='https://thumb.ac-illust.com/73/7387030e5a5600726e5309496353969a_t.jpeg'></div>
            <div class='name'>
                <h3>{{$user->name}}</h3>
            </div>
            <a href="/users/{{$user->id}}/employee">詳細</a>
        </div>
        @endforeach
        <div class="carendar">
            <a href="carendars/carendar">カレンダー</a>
        </div>
</x-app-layout>