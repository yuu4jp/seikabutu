<!--新しい人追加画面（マスターのページからのみ入れる）-->
<!DOCTYPE HTML>
<x-app-layout>
        <form method="POST" action='/users/create'>
            @csrf
            <div class='name'>
                <h3>名前</h3>
                <input type="text" name='user[name]' value="{{ old('user.name') }}"/>
                <p class="name__error" style="color:red">{{ $errors->first('user.name') }}</p>
            </div>
            <div class='email'>
                <h3>メール</h3>
                <input type='email' name='user[email]' value="{{ old('user.email') }}"/>
                <p class="email__error" style="color:red">{{ $errors->first('user.email') }}</p>
            </div>
            <div class='sex' >
                <h3>性別</h3>
                <input type='text' name='user[sex]' value="{{ old('user.sex') }}"/>
                <p class="sex__error" style="color:red">{{ $errors->first('user.sex') }}</p>
            </div>
            <div class='age' >
                <h3>年齢</h3>
                <input type='number' name='user[age]' value="{{ old('user.age') }}"/>
                <p class="age__error" style="color:red">{{ $errors->first('user.age') }}</p>
            </div>
            <div class='departure'>
                <h3>部署</h3>
                <input type='text' name='user[departure]' value="{{ old('userdeparture') }}"/>
                <p class="departure__error" style="color:red">{{ $errors->first('user.departure') }}</p>
            </div>
            <div class='password'>
                <h3>パスワード</h3>
                <input type='password' name='user[password]' value="{{ old('user.password') }}"/>
                <p class="user__error" style="color:red">{{ $errors->first('user.password') }}</p>
            </div>
            <div class='master'>
                <h3>管理者ランク</h3>
                <select name='user[master]' value="{{ old( 'user.master') }}"/>
                    <option value=0>master</option>
                    <option value=1>management</option>
                    <option value=2>shine</option>
                </select>
                <p class="master__error" style="color:red">{{ $errors->first('user.master') }}</p>
            </div>
            <div class="training">
                <h3>資格等</h3>
                <input type="text" name='user[training]' value="{{old('user.training')}}" placeholder='資格１,資格２,資格３'>
            </div>
            <div class='image'>
                <h3>写真</h3>
                <input type='file' accept='image/png, image/ipeg' name='user[image]' value="{{ old('user.image') }}"/>
            </div>
            <input type="submit" value="create"/>
        </form>
        <div class="back"><a href="/users/master">back</a></div>
</x-app-layout>