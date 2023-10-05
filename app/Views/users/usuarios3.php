<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<table class="table table-striped table-dark">
    <thead>
        <tr>
            <th>Usuario</th>
            <th>Contraseña</th>
            <th>Estado del usuario</th>
            <th>Nombre real</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($usuarios as $usuario): ?>
            <tr>
                <td align="center">
                    <?= $usuario['username']; ?>
                </td>

                <td align="center">
                    <?= $usuario['password']; ?>
                </td>

                <?php if ($usuario['status'] == 0): ?>
                    <td align="center"> Inactivo </td>
                <?php else: ?>
                    <td align="center"> Activo </td>
                <?php endif ?>
                
                <td align="center">
                    <?= $usuario['name'] . ' ' . $usuario['lastname'] ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>

    <tfoot>

    </tfoot>
</table>