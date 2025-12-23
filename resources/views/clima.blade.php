<div>
    <!-- It is quality rather than quantity that matters. - Lucius Annaeus Seneca -->
    <form action="/clima" method="post">
        @csrf
        <label for="ciudad">Ciudad</label>
        <input name="ciudad" type=text placeholder="Nueva York"/>
        <button type="submit">Buscar</button>
    </form>
</div>
