<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nuevo Contacto</title>
</head>
<body>
    <h1>Agregar Nuevo Contacto</h1>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="POST">
        <label>Nombre:</label>
        <input type="text" name="nombre" required><br>
        <label>Email:</label>
        <input type="email" name="email" required><br>
        <label>Teléfono:</label>
        <input type="text" name="telefono"><br>
        <button type="submit">Guardar</button>
    </form>
</body>
</html>
