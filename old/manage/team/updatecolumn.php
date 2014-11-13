<?php
require_once(dirname(__FILE__) . '/SyncTeam.php');

$syncTeam = new SyncTeam();
if(isset($_GET['action']))
{
	$syncTeam->getColumns();die();
}

$id = $_GET['id'];
$is_sortfilter_field = isset($_GET['is_sortfilter_field'])?$_GET['is_sortfilter_field'] : 0;
$is_search_field = isset($_GET['is_search_field'])?$_GET['is_search_field'] : 0;
$is_index_field = isset($_GET['is_index_field'])? $_GET['is_index_field'] : 0;
$is_unique_field = isset($_GET['is_unique_field']) ? $_GET['is_unique_field'] : 0;

$syncTeam->updateColumn($id, $is_sortfilter_field, $is_search_field, $is_index_field, $is_unique_field);
