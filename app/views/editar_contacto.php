<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Contacto</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>css/style.css">

</head>
<body>
    <h1>Editar Contacto</h1>


    <!-- Verifica si el contacto está disponible -->
    <?php if (isset($data)): ?>
        <form action="/agenda_contactos/contacto/editar/<?= $data->contacto_id ?>" method="POST">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="<?= htmlspecialchars($data->nombre) ?>" required>
            <br><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?= htmlspecialchars($data->email) ?>" required>
            <br><br>

            <label for="telefono">Teléfono:</label>
            <input type="text" id="telefono" name="telefono" value="<?= htmlspecialchars($data->telefono) ?>" required>
            <br><br>

            <button type="submit">Guardar cambios</button>
        </form>
    <?php else: ?>
        <p>El contacto no existe o no se ha podido encontrar.</p>
    <?php endif; ?>

    <br><br>
    <a href="/agenda_contactos">Volver a la lista de contactos</a>
</body>
</html>
