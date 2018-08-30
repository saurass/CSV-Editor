<?php
require_once "./Classes/ActionCsv.php";
$id = $_POST['id'];
$action = $_POST['action'];
$actionCsv = new ActionCsv('test');
$actionCsv->decideAction($id, $action);
?>