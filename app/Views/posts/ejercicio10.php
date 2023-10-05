<h1 align="center">10. En una tabla, mostrar el último post escrito por cada mujer menor de 30
años y el primer post escrito por cada hombre mayor de 16 años</h1>

<table border=1 align="center">
    <thead>
        <tr>
            <th>USERNAME</th>
            <th>GÉNERO DEL USUARIO</th>
            <th>FECHA DE NACIMIENTO</th>
            <th>ID DE POSTS</th>
            <th>TITULO DEL POSTS</th>
            <th>CONTENIDO DEL POSTS</th>
            <th>FECHA DE CREACIÓN DEL POSTS</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($postsM as $pM): ?>
            <tr>
                <td><?= $pM['username'] ?></td>
                <td><?= $pM['gender'] ?></td>
                <td><?= $pM['birthday'] ?></td>
                <td><?= $pM['ultimoPost'] ?></td>
                <?php foreach ($posts as $p): ?>
                    <?php if($p['id'] == $pM['ultimoPost']):?>
                        <td><?= $p['title'] ?></td>
                        <td><?= $p['content'] ?></td>
                        <td><?= $p['created_at'] ?></td>
                    <?php endif;?>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>

        <?php foreach ($postsH as $pH): ?>
            <tr>
                <td><?= $pH['username'] ?></td>
                <td><?= $pH['gender'] ?></td>
                <td><?= $pH['birthday'] ?></td>
                <td><?= $pH['primerPost'] ?></td>
                <?php foreach ($posts as $p): ?>
                    <?php if($p['id'] == $pH['primerPost']):?>
                        <td><?= $p['title'] ?></td>
                        <td><?= $p['content'] ?></td>
                        <td><?= $p['created_at'] ?></td>
                    <?php endif;?>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>