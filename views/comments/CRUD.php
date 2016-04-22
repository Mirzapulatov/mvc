<div class="content">
    <div class="content_resize">
        <div class="mainbar">
            <div class="article">

                <a href="/admin">Admin Panel</a><br/>
                <a href="/<?php echo $_SERVER['REQUEST_URI']; ?>/create">Создать комментарий</a><br/>
                <h2><span>CRUD</span></h2>
                <table border="1px">
                    <?php
                    if (!$query->rowCount()) { ?>
                        Комментарии отсутствуют
                    <?php }
                    while ($blogComments = $query->fetch()) { ?>
                        <tr>
                            <td><?php echo $blogComments['id']; ?></td>
                            <td><?php echo $change->CheckXSS($change->resizeString($blogComments['name'], 20)); ?></td>
                            <td><?php echo $change->CheckXSS($change->resizeString($blogComments['message'], 50)); ?></td>
                            <td><?php echo date("H:i:s d.m.Y", $blogComments['time']); ?></td>
                            <td>
                                <a href="/<?php echo $_SERVER['REQUEST_URI']; ?>/update/<?php echo $blogComments['id']; ?>">Edit</a>
                                <a href="/<?php echo $_SERVER['REQUEST_URI']; ?>/delete/<?php echo $blogComments['id']; ?>">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
                <?php echo $pagination; ?>
            </div>
        </div>
    </div>
</div>

