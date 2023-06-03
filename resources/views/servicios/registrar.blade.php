<div>
    <!-- Registrar un servicio realizado -->
    <h1>Registrar servicio realizado</h1>
    <form action="/" method="POST">
        @csrf
        <label>Descripción:</label>
        <input type="text" name="descripcion"><br>
        <label>Comentarios:</label>
        <input type="text" name="comentarios"><br>
        <br>
        <button type="submit">Guardar</button>
    </form>
</div>
