<?php
require_once 'acoes/AcoesDb.php';
require_once 'acoes/Validacao.php';
class ProdutosModel {

  private $acoes  = null;
  private $conn   = null;

  /**
  * Função para abrir a conexão com o banco de dados
  * Autor : Daniel Lima <daniel.lima.nascimento@gmail.com>
  */
  private function abrirConexao() {
    $this->conn = new mysqli("localhost", "root", "cotangentelima123", "teste_ph2");
    if ($this->conn->connect_errno) {
      throw new Exception("Falha ao conectar com o BD! Motivo: ". $conn->connect_errno);
    }
    else {
      $this->acoes = new AcoesDb($this->conn);
    }
  }
  /**
  * Função para Fechar a conexão
  * Autor : Daniel Lima <daniel.lima.nascimento@gmail.com>
  */
  private function fecharConexao() {
    $this->conn->close();
  }
  /**
  * Função para buscar todos os produtos
  * Autor : Daniel Lima <daniel.lima.nascimento@gmail.com>
  */
  public function buscaTodosOsProdutos($order) {
    try {
      $this->abrirConexao();
      $res = $this->acoes->todosProdutos($order);
      $this->fecharConexao();
      return $res;
    } catch (Exception $e) {
      $this->fecharConexao();
      throw $e;
    }
  }
  /**
  * Função para buscar um produto por id
  * Autor : Daniel Lima <daniel.lima.nascimento@gmail.com>
  */
  public function buscaProdutoPorId($id) {
    try {
      $this->abrirConexao();
      $res = $this->acoes->produtoPorId($id);
      $this->fecharConexao();
      return $res;
    } catch (Exception $e) {
      $this->fecharConexao();
      throw $e;
    }
  }

  /**
  * Função para validar os dados inseridos no form
  * Autor : Daniel Lima <daniel.lima.nascimento@gmail.com>
  */
  private function validacao($codigo, $nome, $descricao, $composicao, $conteudo_embalagem, $cor) {
    $errors = array();

    if (!isset($codigo) || empty($codigo))
      $errors[] = 'Código do produto é obrigatório';
    if (isset($codigo) && strlen($codigo) > 11)
      $errors[] = 'O código do produto deve ser menor ou igual a 11 caracteres';
    if (!isset($nome) || empty($nome))
      $errors[] = 'Nome do produto é obrigatório';
    if (isset($nome) && strlen($nome) > 100)
        $errors[] = 'O nome do produto deve ser menor ou igual a 100 caracteres';
    if (!isset($descricao) || empty($descricao))
      $errors[] = 'Descrição do produto é obrigatório';
    if (!isset($composicao) || empty($composicao))
      $errors[] = 'Composição do produto é obrigatório';
    if (!isset($conteudo_embalagem) || empty($conteudo_embalagem))
      $errors[] = 'Conteúdo da embalagem do produto é obrigatório';


    if (empty($errors))
      return;

    throw new Validacao($errors);
  }

  /**
  * Função para cadastrar novos produtos
  * Autor : Daniel Lima <daniel.lima.nascimento@gmail.com>
  */
  public function novoProduto($codigo, $nome, $descricao, $composicao, $conteudo_embalagem, $cor) {
    try {
      $this->abrirConexao();
      $this->validacao($codigo, $nome, $descricao, $composicao, $conteudo_embalagem, $cor);
      $res = $this->acoes->cadastra($codigo, $nome, $descricao, $composicao, $conteudo_embalagem, $cor);
      $this->fecharConexao();
      return $res;
    } catch (Exception $e) {
      $this->fecharConexao();
      throw $e;
    }
  }
  /**
  * Função para alterar produtos
  * Autor : Daniel Lima <daniel.lima.nascimento@gmail.com>
  */
  public function alteraProduto($codigo, $nome, $descricao, $composicao, $conteudo_embalagem, $cor, $id) {
    try {
      $this->abrirConexao();
      $this->validacao($codigo, $nome, $descricao, $composicao, $conteudo_embalagem, $cor);
      $res = $this->acoes->altera($codigo, $nome, $descricao, $composicao, $conteudo_embalagem, $cor, $id);
      $this->fecharConexao();
      return $res;
    } catch (Exception $e) {
      $this->fecharConexao();
      throw $e;
    }
  }
  /**
  * Função para excluir produtos
  * Autor : Daniel Lima <daniel.lima.nascimento@gmail.com>
  */
  public function excluirProduto($id) {
    try {
      $this->abrirConexao();
      $res = $this->acoes->exclui($id);
      $this->fecharConexao();
    } catch (Exception $e) {
      $this->fecharConexao();
      throw $e;
    }
  }

}
