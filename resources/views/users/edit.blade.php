<!--個人情報編集のみ（新規作成は別ページ-->）
<x-app-layout>
    <h1 class="title">編集画面</h1>
        <div class="content">
            <form action="/users/{{ $user->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class='content_name'>
                    <h2>名前</h2>
                    <input type='text' name='user[name]' value="{{$user->name}}">
                    <p class="name__error" style="color:red">{{ $errors->first('user.name') }}</p>
                </div>               
                <div class='content__sex'>
                    <h2>性別</h2>
                    <input type='text' name='user[sex]' value="{{$user->sex}}">
                    <p class="sex__error" style="color:red">{{ $errors->first('user.sex') }}</p>
                </div>
                <div class="age">
                    <h2>年齢</h2>
                    <input type='text' name='user[age]' value="{{$user->age}}">
                    <p class="sex__error" style="color:red">{{ $errors->first('user.age') }}</p>
                </div>
                <div class='departure'>
                    <h2>部署</h2>
                    <input type="text" name='user[departure]' value="{{ $user->departure}}">
                    <p class="sex__error" style="color:red">{{ $errors->first('user.departure') }}</p>
                </div>
                <div class='image'>
                    <h2>写真</h2>
                    <input type='file' name='image'>
                </div>
                <div class='training'>
                    <h2>資格等</h2>
                    <input type="text" name='user[training]'value='{{$user->training}}' placeholder='資格１,資格２,資格３'>
                </div>
                <input type="submit" value="保存">
            </form>
            <form action='/users/delete/{{$user->id}}' id="form_{{$user->id}}" method="post">
                @csrf
                @method('DELETE')
                <button type='button' onclick="deleteUser({{$user->id}})">削除</button>
            </form>
        </div>
        <script>
        function deleteUser(id) {
            'use strict'
    
            if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                document.getElementById(`form_${id}`).submit();
            }
        }
        </script>
         <div class="back"><a href="/users/master">back</a></div>
</x-app-layout>