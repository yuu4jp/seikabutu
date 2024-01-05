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
                        <input type="checkbox" name='users_array[]'　value="{{$user->id}}" >{{$user->name}}</input>
                    </label>
                    @endforeach
                    <input type="submit" value='保存'/>
                </form>
            </div>
        </div>
        <div class="carendar">
            <a href="carendars/carendar">カレンダー</a>
        </div>
</x-app-layout>