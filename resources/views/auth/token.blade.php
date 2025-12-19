<div>
    <!-- Let all your things have their places; let each part of your business have its time. - Benjamin Franklin -->
    <form action="/tokens/create" method="post">
        @csrf
        <label for="token_name">Token name:</label>
        <input type="text" name="token_name" placeholder="Token name" required><br>
        <button type="submit">Generate Api Key</button>
    </form>
</div>
