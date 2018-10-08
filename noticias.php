<?php
include_once './Config.php';

//$noticias = new Noticias();
//$noticias->noticiaByid(3);

//$noticias = Noticias::listarNoticias();
//echo json_encode($noticias);

$noticia = Noticias::buscar("Mussum");
if(count($noticia)>0){
echo json_encode($noticia);
}else{
    echo "A consulta resultou 0 registros.";
}