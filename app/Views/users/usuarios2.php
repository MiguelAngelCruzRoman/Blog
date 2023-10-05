<table border=1 align="center">
    <thead>
        <tr>
            <th bgcolor="#00FF00">Usuario</th>
            <th bgcolor="#00FF00">Contraseña</th>
            <th bgcolor="#00FF00">Estado del usuario</th>
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
            </tr>
        <?php endforeach; ?>
    </tbody>

    <tfoot>
        <tr>
            <th>USUARIO</th>
            <th>CONTRASEÑA</th>
            <th>ESTADO DEL USUARIO</th>
        </tr>
    </tfoot>
</table>