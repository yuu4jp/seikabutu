<!--新しい人追加画面（マスターのページからのみ入れる）-->
<!DOCTYPE HTML>
<x-app-layout>
        <form method="POST" action='/users/create'>
            @csrf
            <div class='name'>
                <h3>名前</h3>
                <input type="text" name='name'>
            </div>
            <div class='email'>
                <h3>メール</h3>
                <input type='email' name='email'>
            </div>
            <div class='sex' >
                <h3>性別</h3>
                <input type='text' name='sex'>
            </div>
            <div class='age' >
                <h3>年齢</h3>
                <input type='number' name='age'>
            </div>
            <div class='departure'>
                <h3>部署</h3>
                <input type='text' name='departure'>
            </div>
            <div class='password'>
                <h3>パスワード</h3>
                <input type='password' name='password'>
            </div>
            <div class='master'>
                <h3>管理アカウント</h3>
                <select name='master'>
                    <option value=0>master</option>
                    <option value=1>management</option>
                    <option value=2>shine</option>
                </select>
            </div>
            <div class='image'>
                <h3>写真</h3>
                <input type='file' accept='image/png, image/ipeg' name='image'>
            </div>
            <input type="submit" value="create"/>
        </form>
        <div class="back"><a href="/user/master">back</a></div>
</x-app-layout>