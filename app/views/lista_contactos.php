<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Contactos</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>css/style.css">

</head>
<body>
    <h1>Lista de Contactos</h1>
    <a href="/agenda_contactos/contacto/nuevo">Agregar Nuevo Contacto</a>
    <table border="1">
        <tr>
            <th>Nombre</th>
            <th>Email</th>
            <th>Teléfono</th>
            <th>Dirección</th>
            <th>Fecha</th>
        </tr>
        <?php foreach ($data as $contacto): ?>
        <tr>
            <td><?= htmlspecialchars($contacto->nombre) ?></td>
            <td><?= htmlspecialchars($contacto->email) ?></td>
            <td><?= htmlspecialchars($contacto->telefono) ?></td>
            <td><?= htmlspecialchars($contacto->direccion) ?></td>
            <td><?= htmlspecialchars($contacto->fecha_creacion) ?></td>


            <td>
                <a href="/agenda_contactos/contacto/editar/<?= $contacto->contacto_id ?>">Editar</a>
                <a href="/agenda_contactos/contacto/eliminar/<?= $contacto->contacto_id ?>">Eliminar</a>

</td>

            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
