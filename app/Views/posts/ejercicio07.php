<h1 align="center">07. Mostrar una tabla con los siguientes datos: Cantidad de posts escritos por
mujeres en el año 2022, cantidad de posts escritos por hombres en el 2022,
cantidad de posts escritos por mujeres en el 2023, cantidad de posts escritos
por hombres en el 2023. Si la cantidad de posts escritos por mujeres es
menor en el 2023 en comparación con el año 2022 entonces mostrar la celda
en color rojo con texto blanco. En contraste, si la cantidad del año 2023 es
superior a la del 2022 entonces colorear de verde con texto blanco. Si la
cantidad de posts escritas en el año 2022 es igual al año 2023 entonces no
modificar su formato y estilo. Aplican las mismas condiciones de formato
para los posts escritos por hombres.</h1>

<table border=1 align="center">
    <thead>
        <tr>
            <th>AÑO</th>
            <th>POSTS DE MUJERES</th>
            <th>POSTS DE HOMBRES</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <th align="center">2022</th>

            <?php foreach ($postsMujer2022 as $pM22):?>
                <td align="center"><?= $pM22['count(*)'] ?></td>
            <?php endforeach; ?>

            <?php foreach ($postsHombre2022 as $pH22):?>
                <td align="center"><?= $pH22['count(*)'] ?></td>
            <?php endforeach; ?>
        
        </tr>   
        <tr>
            <th align="center">2023</th>

            <?php foreach ($postsMujer2023 as $pM23):?>
                <?php if(($postsMujer2022[0]['count(*)'])>$pM23['count(*)']):?>
                <td align="center" style="background-color:red; color:white"><?= $pM23['count(*)'] ?></td>
                <?php elseif(($postsMujer2022[0]['count(*)'])<$pM23['count(*)']):?>
                    <td align="center"  style="background-color:green; color:white"><?= $pM23['count(*)'] ?></td>
                <?php else:?>
                    <td align="center"><?= $pM23['count(*)'] ?></td>
                    <?php endif;?>
            <?php endforeach; ?>

            <?php foreach ($postsHombre2023 as $pH23):?>
                <?php if(($postsHombre2022[0]['count(*)'])>$pH23['count(*)']):?>
                <td align="center" style="background-color:red; color:white"><?= $pM23['count(*)'] ?></td>
                <?php elseif(($postsHombre2022[0]['count(*)'])<$pH23['count(*)']):?>
                    <td align="center"  style="background-color:green; color:white"><?= $pH23['count(*)'] ?></td>
                <?php else:?>
                    <td align="center"><?= $pH23['count(*)'] ?></td>
                    <?php endif;?>

            <?php endforeach; ?>
        </tr>
    </tbody>
</table>