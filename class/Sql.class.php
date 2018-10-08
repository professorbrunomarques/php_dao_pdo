<?php

/**
 * Classe responsável por controlar o acesso ao banco de dados DAO
 * (DATA ACCESS OBJECT).
 *
 * @author bruno
 */
class Sql extends PDO {

    private $conn;

    public function __construct() {
        $this->conn = new PDO("mysql:host=localhost;dbname=aulasphp;charset=UTF8", "aluno", "123456");
    }
    /**
     * Executa uma query SQL
     * 
     * @param string $rawQuery = Query bruta sem tratamento que será tratada.
     * @param array $params = Dados que serão enviados.
     * 
     * @return PDOstatement Retorna um objeto do tipo PDOstatement após ser executado.
     */
    public function query($rawQuery, $params = array()) {
        $stmt = $this->conn->prepare($rawQuery);
        $this->setParams($stmt, $params);
        $stmt->execute();
        return $stmt;
    }

    /**
     * Executa uma consulta a uma tabela no banco de dados
     * 
     * @param string $rawQuery = Query bruta sem tratamento que será tratada.
     * @param array $params = Dados que serão enviados.
     * @return array Com o resultado da consulta onde o Indice do array será o campo da tabela de dados.
     */
    public function select($rawQuery, $params = array()): array {
        $stmt = $this->query($rawQuery, $params);
        if ($stmt->errorInfo()[2] != NULL) {
            return $stmt->errorInfo();
        } else {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
    
    /*     * *****************************************************************************    
      //    Métodos privados - serão usados apenas nessa classe
      /*******************************************************************************

      /**
     * Faz o bindParam dos dados
     * 
     * @param type $statement = Objeto do tipo PDOstatement criado pela função <b>query</b>.
     * @param type $parameters = Parametros que serão feitos os binds (ligações) com um valor.
     */

    private function setParams($statement, $parameters = array()) {
        foreach ($parameters as $key => $value) {
            $this->setParam($statement, $key, $value);
        }
    }

    /**
     * Função auxiliar do metodo <b>setParams</b>
     * Executa o bindParam no objeto <b>$statement</b>
     * 
     * @param type $statement = Objeto do tipo PDOstatement criado pela função <b>query</b>.
     * @param type $campo = Nome do campo
     * @param type $valor = valor do campo
     */
    private function setParam($statement, $campo, $valor) {
        $statement->bindParam($campo, $valor);
    }

}
