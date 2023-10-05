<h1>05. Mostrar una tabla con los siguientes datos: cantidad total de usuarios
registrados, cantidad total de posts, cantidad total de comentarios, cantidad
total de categorias</h1>

<table border=1 align="center">
    <thead>
        <tr>
            <th>USUARIOS</th>
            <th>PUBLICACIONES</th>
            <th>COMENTARIOS</th>
            <th>CATEGORIAS</th>
        </tr>
    </thead>

    <tbody>
            <tr>
                <td align="center"><?=$totalUsers[0]['count(*)'] ?></td>
                <td align="center"><?=$totalPosts[0]['count(*)'] ?></td>
                <td align="center"><?=$totalComments[0]['count(*)'] ?></td>
                <td align="center"><?=$totalCategories[0]['count(*)'] ?></td>
            </tr>
    </tbody>
</table>