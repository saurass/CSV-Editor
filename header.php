<?php
include_once __DIR__."\Classes\ShowCsv.php";
$showCsv = new ShowCsv('test');
$results=json_decode($showCsv->OpenCsv());