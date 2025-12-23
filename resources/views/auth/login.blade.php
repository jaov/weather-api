<div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Very little is needed to make a happy life. - Marcus Aurelius -->
    <h3>Login form</h3>
    <form action="/login" method="post">
        @csrf
        <label for="email">Correo</label>
        <input name="email" type="email" placeholder="Correo"/>
        <label for="password">Contraseña</label>
        <input name="password" type="password" placeholder="Contraseña">
        <button type="submit">Submit</button> <br>
        <p>¿No tiene una cuenta? <a href="/register">Regístrese</a></p>
    </form>
</div>
