<?php 
require_once('../../config.php');
header('Content-type: application/pdf');
header('Content-Length: ' . filesize($_GET['path']));
@readfile(base_app.$_GET['path']);
?>