<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Contacto</title>
</head>
<body>
    <h1>Editar Contacto</h1>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="POST">
        <label>Nombre:</label>
        <input type="text" name="nombre" value="<?= htmlspecialchars($contacto['nombre']) ?>" required><br>
        <label>Email:</label>
        <input type="email" name="email" value="<?= htmlspecialchars($contacto['email']) ?>" required><br>
        <label>Teléfono:</label>
        <input type="text" name="telefono" value="<?= htmlspecialchars($contacto['telefono']) ?>"><br>
        <button type="submit">Actualizar</button>
    </form>
</body>
</html>
