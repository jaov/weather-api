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

    <!-- We must ship. - Taylor Otwell -->
    <form action="/register" method="post">
        @csrf

        <label for="name">Nombre:</label>
        <input type="text" name="name" id="name" placeholder="Nombre"/><br>

        <label for="email">Correo:</label>
        <input type="email" name="email" id="email" placeholder="Correo"/><br>

        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password" placeholder="Contraseña"/><br>

        <label for="password_confirmation">Confirmar Correo:</label>
        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirmar Correo"/><br>

        <button type="submit">Registrar</button>
    </form>
</div>
