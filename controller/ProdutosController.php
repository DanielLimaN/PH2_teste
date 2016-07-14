	<?php

require_once 'model/ProdutosModel.php';

class ProdutosController {

    private $produtosmodel = null;

    public function __construct() {
        $this->produtosmodel = new ProdutosModel();
    }

    public function redirect($location) {
        header('Location: '.$location);
    }
		/**
    * Função para tratar as requisições do navegador(ações : listar, cadastrar, alterar, excluir)
    * Autor : Daniel Lima <daniel.lima.nascimento@gmail.com>
    */
    public function trataRequisicao() {
        $acao = isset($_GET['acao']) ? $_GET['acao'] : null;

        try {
            if (!$acao || $acao == 'list') {
                $this->listarProdutos();
            } elseif ($acao == 'new') {
                $this->salvarProduto();
            }
            elseif ($acao == 'alter') {
                $this->salvarProduto(1);
            }
            elseif ( $acao == 'delete' ) {
                $this->deletarProduto();
            } else {
                $this->showError("Pagina não encontrada", "A pagina que executa esta ação não foi encontrada!");
            }
        } catch ( Exception $e )
						if (count($e->getErrors())) {
							$this->salvarProduto(0, $e->getErrors());
						}
						else {
								$this->showError("Erro: ", $e->getMessage());
						}
        }
    }
		/**
    * Função para listar produtos
    * Autor : Daniel Lima <daniel.lima.nascimento@gmail.com>
    */
    public function listarProdutos() {
        $orderby = isset($_GET['orderby']) ? $_GET['orderby'] : null;
        $produtos = $this->produtosmodel->buscaTodosOsProdutos($orderby);

				include 'view/layouts/header.php';
				include 'view/modais/exclusao.php';
        include 'view/produtos.php';
				include 'view/layouts/footer.php';
    }
		/**
		* Função para salvar produtos
		* Autor : Daniel Lima <daniel.lima.nascimento@gmail.com>
		*/
    public function salvarProduto($alteracao = 0, $errors = array()) {
				$id = isset($_GET['id'])?$_GET['id']:null;
        if($alteracao) {
					$title = 'Alterar produto';
          $produto = $this->produtosmodel->buscaProdutoPorId($id);
          $codigo = $produto->codigo;
          $nome = $produto->nome;
          $descricao = $produto->descricao;
          $composicao = $produto->composicao;
          $conteudo_embalagem = $produto->conteudo_embalagem;
          $cor = $produto->cor;
        }
        else {
					$title = 'Adicionar novo produto';
          $codigo = '';
          $nome = '';
          $descricao = '';
          $composicao = '';
          $conteudo_embalagem = '';
          $cor = '';
        }
				if (count($errors)) {
					$errors = $errors;
					if ($alteracao) {
						$produto = $this->produtosmodel->buscaProdutoPorId($id);
						$codigo = $produto->codigo;
	          $nome = $produto->nome;
	          $descricao = $produto->descricao;
	          $composicao = $produto->composicao;
	          $conteudo_embalagem = $produto->conteudo_embalagem;
	          $cor = $produto->cor;
					}
					else {
						$codigo = '';
	          $nome = '';
	          $descricao = '';
	          $composicao = '';
	          $conteudo_embalagem = '';
	          $cor = '';
					}
				}
        else
					$this->actionPage($_POST,$id);

				include 'view/layouts/header.php';
        include 'view/cadastro_produto.php';
				include 'view/layouts/footer.php';
    }

		/**
    * Função para auxiliar o salvamento dos produtos
    * Autor : Daniel Lima <daniel.lima.nascimento@gmail.com>
    */
		public function actionPage($post , $id = 0) {
			if (isset($post['submeteu'])) {
					$codigo                 = isset($post['codigo']) ? $post['codigo'] :  null;
					$nome                   = isset($post['nome']) ? $post['nome']  : null;
					$descricao              = isset($post['descricao']) ? $post['descricao'] : null;
					$composicao             = isset($post['composicao']) ? $post['composicao'] : null;
					$conteudo_embalagem     = isset($post['conteudo_embalagem']) ? $post['conteudo_embalagem'] : null;
					$cor                    = isset($post['cor']) ? $post['cor'] : null;

					try {
							if ($post['alteracao']) {
								$this->produtosmodel->alteraProduto($codigo, $nome, $descricao, $composicao, $conteudo_embalagem, $cor,$id);
								$this->redirect('index.php?msg=s');
							}
							else {
								$this->produtosmodel->novoProduto($codigo, $nome, $descricao, $composicao, $conteudo_embalagem, $cor);
								$this->redirect('index.php?msg=s');
							}

							return;
					}
					catch (ValidationException $e) {
						$errors = $e->getErrors();
					}

			}
		}
		/**
    * Função para apagar produtos
    * Autor : Daniel Lima <daniel.lima.nascimento@gmail.com>
    */
    public function deletarProduto() {
        $id = isset($_GET['id'])?$_GET['id']:null;
        if (!$id) {
            throw new Exception('Internal error.');
        }
        $this->produtosmodel->excluirProduto($id);
        $this->redirect('index.php?msg=s');
    }


		/**
    * Função para mostrar erros para o usuário
    * Autor : Daniel Lima <daniel.lima.nascimento@gmail.com>
    */
    public function showError($title, $message) {
				include 'view/layouts/header.php';
        include 'view/erro.php';
				include 'view/layouts/footer.php';
    }

}
?>
