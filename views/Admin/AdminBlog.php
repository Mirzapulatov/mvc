<?php
if ($protect) { //protect from user ?>
    <div class="content">
    <div class="content_resize">
    <div class="mainbar">
        <div class="article">
            <?php switch ($case) { //View blog records
                default:
                    ?>

                    break;
                case 'create': // Create blog record ?>

                    <?php break;
                case 'update': // update blog record  ?>

                    break;
                case 'delete': //delete blog record ?>

                    <?php

            } ?>

<?php } ?>