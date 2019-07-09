<?php
require_once "Lib.php";

Lib::instagram()->direct->getInbox();
Lib::render('index.php');