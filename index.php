<?php
require_once "View.php";
require_once "Api.php";

View::render('index.php', ['inbox' =>  Api::getThreads()]);