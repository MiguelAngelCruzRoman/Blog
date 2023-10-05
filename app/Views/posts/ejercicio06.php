<h1 align="center">06. Mostrar una tabla con los siguientes datos: cantidad total de posts por
categoría, cantidad total de posts escritos por autor</h1>

<table border=1 align="center">
    <thead>
        <tr>
        <th>POSTS ESCRITOS POR CATEGORÍA</th>
        <th>POSTS ESCRITOS POR AUTOR</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td align="center">
                <?php foreach ($postsPorCategoria as $ppc):?>
                <?= $ppc['category'].': '.$ppc['ppc'].'<br>' ?>
                <?php endforeach; ?>
            </td>
            <td align="center">
                <?php foreach ($postPorAutor as $ppa):?>
                <?= $ppa['username'].': '.$ppa['ppa'].'<br>' ?>
                <?php endforeach; ?>
            </td>
        </tr>
    </tbody>
</table>