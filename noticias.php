<?php
include_once './Config.php';

//$noticias = new Noticias();
//$noticias->noticiaByid(3);

$noticia = Noticias::buscar("Mussum");
echo json_encode($noticia);