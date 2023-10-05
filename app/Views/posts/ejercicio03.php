<h1 align="center">03. Mostrar una tabla con el nombre completo del usuario, su email y teléfono
además del título del post con status 0.</h1>

<table border=1 align="center">
    <thead>
        <tr>
            <th>NOMBRE COMPLETO</th>
            <th>EMAIL</th>
            <th>TELÉFONO</th>
            <th>TÍTULO DEL POST</th>
            <th>STATUS</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($posts as $post): ?>
            <tr>
                <td align="center"><?= $post['nombreCompleto'] ?></td>
                <td align="center"><?= $post['website'] ?></td>
                <td align="center"><?= $post['phone'] ?></td>
                <td align="center"><?= $post['title'] ?></td>
                <td align="center"><?= $post['status'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>