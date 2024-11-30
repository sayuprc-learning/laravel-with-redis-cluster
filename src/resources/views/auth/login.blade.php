<form action="{{ route('login.handle') }}" method="post">
    @csrf
    メールアドレス: <input type="email" name="email">
    <input type="submit" value="ログイン">
</form>
