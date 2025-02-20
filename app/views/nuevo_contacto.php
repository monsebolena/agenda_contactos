<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nuevo Contacto</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>css/style.css">

</head>
<body>
    <h1>Agregar Nuevo Contacto</h1>
    
    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>

    <form method="POST" action="/agenda_contactos/contacto/nuevo">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required><br><br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br><br>

        <label for="telefono">Teléfono:</label>
        <input type="text" name="telefono" id="telefono" required><br><br>

        <label for="telefono">Dirección:</label>
        <input type="text" name="direccion" id="direccion" required><br><br>

        <button type="submit">Guardar Contacto</button>
    </form>

    <br>
    <a href="/agenda_contactos">Volver a la lista de contactos</a>
</body>
</html>
