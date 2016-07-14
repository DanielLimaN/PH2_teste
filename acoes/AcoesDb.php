<?php

/**
* Classe auxiliar para realizar as ações do banco de dados
* Autor : Daniel Lima <daniel.lima.nascimento@gmail.com>
*/

class AcoesDb {
    private $conn = null;

    /**
    * Construtor recebe a conexão passada em ProdutosModel
    * Autor : Daniel Lima <daniel.lima.nascimento@gmail.com>
    */
    function __construct($conexao) {
       $this->conn = $conexao;
    }

    /**
    * Função para recuperar todos os produtos do cadastrados no banco de dados
    * Autor : Daniel Lima <daniel.lima.nascimento@gmail.com>
    */
    public function todosProdutos($order) {
        if (!isset($order)) {
            $order = "nome";
        }

        $order      =  $this->conn->real_escape_string($order);
        $result     = $this->conn->query("SELECT * FROM produtos ORDER BY $order ASC");

        $produtos   = array();
        while (($obj =$result->fetch_object()) != NULL) {
            $produtos[] = $obj;
        }
        $result->close();
        return $produtos;
    }
    /**
    * Função para buscar produtos por id
    * Autor : Daniel Lima <daniel.lima.nascimento@gmail.com>
    */
    public function produtoPorId($id) {
        $id   = $this->conn->real_escape_string($id);
        $result  = $this->conn->query("SELECT * FROM produtos WHERE id=$id");
        return $result->fetch_object();
    }
    /**
    * Função para cadastrar produtos
    * Autor : Daniel Lima <daniel.lima.nascimento@gmail.com>
    */
    public function cadastra($codigo, $nome, $descricao, $composicao, $conteudo, $cor) {

        $codigoProduto            = ($codigo != null) ? "'".$this->conn->real_escape_string($codigo)."'" : 'null';
        $nomeProduto              = ($nome != null) ? "'".$this->conn->real_escape_string($nome)."'" : 'null';
        $descricaoProduto         = ($descricao != null) ? "'".$this->conn->real_escape_string($descricao)."'" : 'null';
        $composicaoProduto        = ($composicao != null) ? "'".$this->conn->real_escape_string($composicao)."'" : 'null';
        $conteudoEmbalagemProduto = ($conteudo != null) ? "'".$this->conn->real_escape_string($conteudo)."'" : 'null';
        $corProduto               = ($cor != null) ? "'".$this->conn->real_escape_string($cor)."'" : 'null';

        $this->conn->query("INSERT INTO produtos (codigo, nome, descricao, composicao, conteudo_embalagem, cor) VALUES ($codigoProduto, $nomeProduto, $descricaoProduto, $composicaoProduto, $conteudoEmbalagemProduto, $corProduto)");
        return $this->conn->insert_id;
    }
    /**
    * Função para alterar produtos
    * Autor : Daniel Lima <daniel.lima.nascimento@gmail.com>
    */
    public function altera($codigo, $nome, $descricao, $composicao, $conteudo, $cor, $id) {
      $codigoProduto            = ($codigo != null) ? "'".$this->conn->real_escape_string($codigo)."'" : 'null';
      $nomeProduto              = ($nome != null) ? "'".$this->conn->real_escape_string($nome)."'" : 'null';
      $descricaoProduto         = ($descricao != null) ? "'".$this->conn->real_escape_string($descricao)."'" : 'null';
      $composicaoProduto        = ($composicao != null) ? "'".$this->conn->real_escape_string($composicao)."'" : 'null';
      $conteudoEmbalagemProduto = ($conteudo != null) ? "'".$this->conn->real_escape_string($conteudo)."'" : 'null';
      $corProduto               = ($cor != null) ? "'".$this->conn->real_escape_string($cor)."'" : 'null';

      $this->conn->query("UPDATE  produtos SET codigo=$codigoProduto, nome=$nomeProduto, descricao=$descricaoProduto, composicao=$composicaoProduto, conteudo_embalagem=$conteudoEmbalagemProduto, cor=$corProduto WHERE id=$id");
      return $this->conn->insert_id;
    }
    /**
    * Função para excluir produtos
    * Autor : Daniel Lima <daniel.lima.nascimento@gmail.com>
    */
    public function exclui($id) {
        $id = $this->conn->real_escape_string($id);
        $this->conn->query("DELETE FROM produtos WHERE id=$id");
    }

}

?>
