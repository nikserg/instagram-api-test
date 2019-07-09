<?php
require_once "Lib.php";
require_once "Api.php";

Lib::render('index.php', ['inbox' =>  Api::getThreads()]);