<h1 align="center">08. Mostrar una tabla con un resumen de las cantidades de posts escritos por
categoría y otro resumen de posts escritos por autor. Resaltar con un color
distinto el valor más alto y el más bajo en ambos resumenes.</h1>

<h4 align="center">[Color salmón: valor mínimo, Color verde: valor máximo]</h4>
<table border=1 align="center">
    <thead>
        <tr>
        <th>POSTS ESCRITOS POR CATEGORÍA</th>
        <th>POSTS ESCRITOS POR AUTOR</th>
        </tr>
    </thead>

    <tbody>
    <?php $maxC=0;$minC=0;foreach ($postsPorCategoria as $ppc):?>
                <?php if($minC==0) $minC =$ppc['ppc']?>
                <?php if($minC>$ppc['ppc']) $minC =$ppc['ppc']?>
                <?php if($maxC<$ppc['ppc']) $maxC =$ppc['ppc']?>
    <?php endforeach;?>

    <?php $maxA=0;$minA=0;foreach ($postPorAutor as $ppa):?>
                <?php if($minA==0) $minA =$ppa['ppa']?>
                <?php if($minA>$ppa['ppa']) $minA =$ppa['ppa']?>
                <?php if($maxA<$ppa['ppa']) $maxA =$ppa['ppa']?>
    <?php endforeach;?>
        <tr>
            <td align="center">
                <?php foreach ($postsPorCategoria as $ppc):?>
                    <?php if($ppc['ppc']==$maxC):?>
                        <font color="green"><?= $ppc['category'].': '.$ppc['ppc'].'<br>' ?></font>
                    <?php elseif($ppc['ppc']==$minC):?>
                        <font color="salmon"><?= $ppc['category'].': '.$ppc['ppc'].'<br>' ?></font>
                    <?php else:?>
                        <?= $ppc['category'].': '.$ppc['ppc'].'<br>' ?>
                    <?php endif;?>
                <?php endforeach; ?>
            </td>
            
            <td align="center">
                <?php foreach ($postPorAutor as $ppa):?>
                    <?php if($ppa['ppa']==$maxA):?>
                        <font color="green"><?= $ppa['username'].': '.$ppa['ppa'].'<br>' ?></font>
                    <?php elseif($ppa['ppa']==$minA):?>
                        <font color="salmon"><?= $ppa['username'].': '.$ppa['ppa'].'<br>' ?></font>
                    <?php else:?>
                        <?= $ppa['username'].': '.$ppa['ppa'].'<br>' ?>
                    <?php endif;?>
                <?php endforeach; ?>
            </td>
        </tr>
        
    </tbody>
</table>