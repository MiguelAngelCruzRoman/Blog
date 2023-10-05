<h1 align="center">02. Mostrar una tabla con el nombre del post y el nombre completo del autor de
la última categoría registrada en la base de datos.</h1>

<table border=1 align="center">
    <thead>
        <tr>
            <th>POST</th>
            <th>AUTOR</th>
            <th>CATEGORÍA</th>
            <th>FECHA DE CREACIÓN</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($posts as $post): ?>
            <tr>
                <td><?= $post['title'] ?></td>
                <td><?= $post['nombreCompleto'] ?></td>
                <td><?= $post['category'] ?></td>
                <td><?= $post['created_at'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>