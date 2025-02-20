<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Contactos</title>
</head>
<body>
    <h1>Lista de Contactos</h1>
    <a href="/nuevo">Agregar Nuevo Contacto</a>
    <table border="1">
        <tr>
            <th>Nombre</th>
            <th>Email</th>
            <th>Teléfono</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($contactos as $contacto): ?>
        <tr>
            <td><?= htmlspecialchars($contacto['nombre']) ?></td>
            <td><?= htmlspecialchars($contacto['email']) ?></td>
            <td><?= htmlspecialchars($contacto['telefono']) ?></td>
            <td>
                <a href="/editar/<?= $contacto['id'] ?>">Editar</a> |
                <a href="/eliminar/<?= $contacto['id'] ?>">Eliminar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
