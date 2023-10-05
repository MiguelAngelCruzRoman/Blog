<h1 align="center">04. Mostrar una tabla con el username, nombre completo del usuario, el email y
una columna con el género (hombre/mujer) de todos los posts creados en el
año 2022</h1>

<table border=1 align="center">
    <thead>
        <tr>
            <th>USERNAME</th>
            <th>NOMBRE REAL</th>
            <th>EMAIL</th>
            <th>GÉNERO</th>
            <th>FECHA DE CREACIÓN</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($posts as $post): ?>
            <tr>
                <td align="center"><?= $post['username'] ?></td>
                <td align="center"><?= $post['nombreCompleto'] ?></td>
                <td align="center"><?= $post['website'] ?></td>                
                <?php if ($post['gender'] == "f"): ?>
                <td align="center">Mujer</td>
                <?php else: ?>
                <td align="center">Hombre</td>
                <?php endif; ?>
                <td align="center"><?= $post['created_at'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>