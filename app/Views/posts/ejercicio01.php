<h1 align="center">01. Mostrar una tabla con el id del posts, el nombre de la categoría, el nombre
    del usuario de los posts publicados en el año 2023</h1>

<table border=1 align="center">
    <thead>
        <tr>
            <th>POSTS ID</th>
            <th>CATEGORÍA</th>
            <th>PUBLICACIÓN</th>
            <th>USERNAME</th>
            <th>PUBLICACIÓN</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($posts as $post): ?>
            <tr>
                <td><?= $post['id'] ?></td>
                <td><?= $post['category'] ?></td>
                <td><?= $post['title'] ?></td>
                <td><?= $post['id'] ?></td>
                <td><?= $post['created_at'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>