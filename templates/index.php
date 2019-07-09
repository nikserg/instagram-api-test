<?php
/** @var \InstagramAPI\Response\DirectInboxResponse $inbox  */
?>
<table class="messages">
    <tr>
        <th>Пользователь</th>
        <th>Дата последнего сообщения</th>
        <th>Последнее сообщение</th>
        <th></th>
    </tr>
    <?php

    foreach ($inbox->getInbox()->getThreads() as $thread) {
        ?>
        <tr>
            <td>
                <table>
                    <?php foreach ($thread->getUsers() as $user) {
                        ?>
                        <tr>
                            <td><img class="userpic" src="<?php echo $user->getProfilePicUrl(); ?>"/></td><td><?php echo $user->getUsername(); ?></td>
                        </tr>
                        <?php
                    } ?>
                </table>
            </td>
            <td>
                <?php
                echo View::renderTimestamp($thread->getLastPermanentItem()->getTimestamp());
                ?>
            </td>
            <td>
                <?php
                    $item = $thread->getLastPermanentItem();
                    include "item.php";
                ?>
            </td>
            <td>
                <a href="/chat.php?id=<?php echo $thread->getThreadId(); ?>">Открыть</a>
            </td>
        </tr>
        <?php
    }
    ?>
</table>