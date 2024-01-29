<!--新しい人追加画面（マスターのページからのみ入れる）-->
<!DOCTYPE HTML>
<x-app-layout>
        <form method="POST" action='/users/create' enctype="multipart/form-data">
            @csrf
            <div class='name'>
                <h3>名前</h3>
                <input type="text" name='name' value="{{ old('name') }}"/>
                <p class="name__error" style="color:red">{{ $errors->first('name') }}</p>
            </div>
            <div class='email'>
                <h3>メール</h3>
                <input type='email' name='email' value="{{ old('email') }}"/>
                <p class="email__error" style="color:red">{{ $errors->first('email') }}</p>
            </div>
            <div class='sex' >
                <h3>性別</h3>
                <input type='text' name='sex' value="{{ old('sex') }}"/>
                <p class="sex__error" style="color:red">{{ $errors->first('sex') }}</p>
            </div>
            <div class='age' >
                <h3>年齢</h3>
                <input type='number' name='age' value="{{ old('age') }}"/>
                <p class="age__error" style="color:red">{{ $errors->first('age') }}</p>
            </div>
            <div class='departure'>
                <h3>部署</h3>
                <input type='text' name='departure' value="{{ old('departure') }}"/>
                <p class="departure__error" style="color:red">{{ $errors->first('departure') }}</p>
            </div>
            <div class='password'>
                <h3>パスワード</h3>
                <input type='password' name='password' value="{{ old('password') }}"/>
                <p class="user__error" style="color:red">{{ $errors->first('password') }}</p>
            </div>
            <div class='master'>
                <h3>管理者ランク</h3>
                <select name='master' value="{{ old('master') }}"/>
                    <option value=0>master</option>
                    <option value=1>management</option>
                    <option value=2 selected>shine</option>
                </select>
                <p class="master__error" style="color:red">{{ $errors->first('master') }}</p>
            </div>
            <div class="training">
                <h3>資格等</h3>
                <input type="text" name='training' value="{{old('training')}}" placeholder='資格１,資格２,資格３'>
            </div>
            <div class='image'>
                <h3>写真</h3>
                <input type='file' name='image' value="{{ old('image') }}"/>
            </div>
            <input type="submit" value="create"/>
        </form>
        <div class="back"><a href="/users/master">back</a></div>
</x-app-layout>