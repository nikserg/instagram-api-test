<?php
require_once "View.php";
require_once "Api.php";

$id = $_GET['id'];
if (!$id) {
    throw  new HttpException('Не передан ID треда', 404);
}

$thread = Api::getThread($id);
View::render('chat.php', ['thread' => $thread->getThread()]);