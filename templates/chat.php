<?php
/** @var \InstagramAPI\Response\Model\DirectThread $thread  */
?>
<table class="messages table">
    <tr>
        <th>ID пользователя</th>
        <th>Дата сообщения</th>
        <th>Сообщение</th>
    </tr>
    <?php

    foreach($thread->getItems() as $item) {
        ?>
        <tr>
            <td><?php echo $item->getUserId(); ?></td>
            <td><?php echo Lib::renderTimestamp($item->getTimestamp()); ?></td>
            <td>
                <?php include "item.php"; ?>
            </td>
        </tr>
    <?php } ?>
</table>