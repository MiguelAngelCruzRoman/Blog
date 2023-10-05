<h1 align="center">09. En una tabla, mostrar el título del post, contenido del post y el nombre de la
categoria de todos los usuarios cuyo perfil sea administrador.</h1>

<table border=1 align="center">
    <thead>
        <tr>
            <th>TÍTULO</th>
            <th>CONTENIDO</th>
            <th>CATEGORÍA</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($posts as $post): ?>
            <?php if($post['profile']=="admin"):?>
                <tr>
                    <td><?= $post['title'] ?></td>
                    <td><?= $post['content'] ?></td>
                    <td><?= $post['category'] ?></td>
                </tr>
            <?php endif;?>
        <?php endforeach; ?>
    </tbody>
</table>