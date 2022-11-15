<h1>User Home</h1>
{{ Auth::user()->role }}
<br>
<form action="{{ route('logout') }}" method="POST">
    @csrf
    <input type="submit" value="Logout">
</form>
