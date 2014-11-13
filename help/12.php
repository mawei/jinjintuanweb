<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');

$page = Table::Fetch('page', '12');
$pagetitle = '玩转' . 
include template('12');
