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

        <label for="name">Name:</label>
        <input type="text" name="name" id="name" placeholder="Name"/><br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" placeholder="Email"/><br>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" placeholder="Password"/><br>

        <label for="password_confirmation">Confirm Password:</label>
        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm password"/><br>

        <button type="submit">Register</button>
    </form>
</div>
