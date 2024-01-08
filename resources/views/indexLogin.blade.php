<h2> um teste </h2>
<br>
<form action="POST">
    @csrf
    <label for="email">Email:</label>
    <input type="text" name="email" id="email">
    <br>
    <label for="password">Senha:</label>
    <input type="password" name="password" id="password">
    <br>
    <button type="submit">Entrar</button>
</form>
<a href="{{ url ('/user') }}">Registrar</a>
<br>