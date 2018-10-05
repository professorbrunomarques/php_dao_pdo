<?php
require_once './Config.php';

$sql = new Sql();

$noticias = $sql->select("SELECT * FROM noticias");

echo json_encode($noticias);
