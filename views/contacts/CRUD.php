<div class="content">
    <div class="content_resize">
        <div class="mainbar">
            <div class="article">

                <h2><span>RUD</span></h2>
                <table border="1px">

                    <?php while ($contacts = $query->fetch()) { ?>
                        <tr>
                            <td><?php echo $contacts['id']; ?></td>
                            <td><?php echo $contacts['name']; ?></td>
                            <td><?php echo $contacts['email']; ?></td>
                            <td><?php echo $change->CheckXSS($change->resizeString($contacts['message'], 200)); ?></td>
                            <td><?php echo date("H:i:s d.m.Y", $contacts['time']); ?></td>
                            <td>
                                <a href="/<?php echo $_SERVER['REQUEST_URI']; ?>/view/<?php echo $contacts['id']; ?>">Просмтотреть</a>
                                <a href="/<?php echo $_SERVER['REQUEST_URI']; ?>/update/<?php echo $contacts['id']; ?>">Изменить</a>
                                <a href="/<?php echo $_SERVER['REQUEST_URI']; ?>/delete/<?php echo $contacts['id']; ?>">Удалить</a>

                            </td>
                        </tr>
                    <?php } ?>
                </table>

                <?php echo $pagination; ?>

            </div>
        </div>

