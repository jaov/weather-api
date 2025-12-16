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
        <label for="email">Email</label>
        <input name="email" type="email" placeholder="Email"/>
        <label for="password">Password</label>
        <input name="password" type="password" placeholder="Password">
        <button type="submit">Submit</button>
    </form>
</div>
