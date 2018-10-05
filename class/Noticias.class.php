<?php
/**
 * Description of Noticias
 *
 * @author bruno
 */
class Noticias {
    
    private $id;
    private $titulo_noticia;
    private $url_noticia;
    private $data_noticia;
    private $autor_noticia;
    private $texto_noticia;
    private $cat_id_noticia;
    private $foto_destaque_noticia;
    
    public function __toString() {
        return json_encode(array(
            "id"=> $this->getId_noticia(),
            "titulo_noticia"=> $this->getTitulo_noticia(),
            "url_noticia"=> $this->getUrl_noticia(),
            "data_noticia"=> $this->getData_noticia()->format("d/m/Y H:i:s"),
            "autor_noticia"=> $this->getAutor_noticia(),
            "texto_noticia"=> $this->getTexto_noticia(),
            "cat_id_noticia"=> $this->getCat_id_noticia(),
            "foto_destaque_noticia"=> $this->getFoto_destaque_noticia()
        ));
    }
    
    public function noticiaByid($id) {
        $sql = new Sql();
        
        $resultados = $sql->select("SELECT * FROM noticias WHERE id = :ID",array(
            ":ID"=>$id
        ));
        
        if(count($resultados)>0):
            $linha = $resultados[0];
            $this->setId_noticia($linha["id"]);
            $this->setAutor_noticia($linha["autor_noticia"]);
            $this->setCat_id_noticia($linha["cat_id_noticia"]);
            $this->setFoto_destaque_noticia($linha["foto_destaque_noticia"]);
            $this->setTexto_noticia($linha["texto_noticia"]);
            $this->setTitulo_noticia($linha["titulo_noticia"]);
            $this->setUrl_noticia($linha["url_noticia"]);
            $this->setData_noticia(new DateTime($linha["data_noticia"]));
            
        endif;
    }
    
    public static function listarNoticias() {
        $sql = new Sql();
        return $sql->select("SELECT * FROM noticias ORDER BY id");
    }
    
    public static function buscar($valor) {
        $sql = new Sql();
        return $sql->select("SELECT * FROM noticias WHERE titulo_noticia LIKE :PALAVRA OR texto_noticia LIKE :PALAVRA ORDER BY id DESC", array(
            ":PALAVRA"=>"%$valor%"
        ));
        
    }
    
//    Métodos gets - serão usados para retornar os dados
    
    function getId_noticia(){
        return $this->id;
    }
    function getTitulo_noticia() {
        return $this->titulo_noticia;
    }

    function getUrl_noticia() {
        return $this->url_noticia;
    }

    function getData_noticia() {
        return $this->data_noticia;
    }

    function getAutor_noticia() {
        return $this->autor_noticia;
    }

    function getTexto_noticia() {
        return $this->texto_noticia;
    }

    function getCat_id_noticia() {
        return $this->cat_id_noticia;
    }

    function getFoto_destaque_noticia() {
        return $this->foto_destaque_noticia;
    }
    
/*******************************************************************************/    
//    Métodos privados - serão usados apenas nessa classe
/*******************************************************************************/
   
    
    private function setId_noticia($id){
        $this->id = $id;
    }
    private function setTitulo_noticia($titulo_noticia) {
        $this->titulo_noticia = $titulo_noticia;
    }

    private function setUrl_noticia($url_noticia) {
        $this->url_noticia = $url_noticia;
    }

    private function setData_noticia($data_noticia) {
        $this->data_noticia = $data_noticia;
    }

    private function setAutor_noticia($autor_noticia) {
        $this->autor_noticia = $autor_noticia;
    }

    private function setTexto_noticia($texto_noticia) {
        $this->texto_noticia = $texto_noticia;
    }

    private function setCat_id_noticia($cat_id_noticia) {
        $this->cat_id_noticia = $cat_id_noticia;
    }

    private function setFoto_destaque_noticia($foto_destaque_noticia) {
        $this->foto_destaque_noticia = $foto_destaque_noticia;
    }
    
}
