<div class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            <h3><?= htmlentities($title) ?></h3>
                        </header>
                        <div class="panel-body">

                          <?php
                          if ($errors) {
                              echo '<div class="alert alert-warning">';
                              echo '<ul class="errors">';
                              foreach ($errors as $key => $error) {
                                  echo '<li>'.htmlentities($error).'</li>';
                              }
                              echo '</ul>';
                              echo '</div>';
                          }
                          ?>

                            <form role="form" method="POST" action="">
                                <div class="form-group col-lg-4">
                                    <label for="codigo">Código:</label>
                                    <input type="text" id="codigo" class="form-control" name="codigo" value="<?= htmlentities($codigo) ?>" placeholder="Código do produto">
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="nome">Nome:</label><br/>
                                    <input type="text" class="form-control" id="nome" name="nome" value="<?= htmlentities($nome) ?>" placeholder="Nome">
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="nome">Cor:</label><br/>
                                    <input type="text" class="form-control"  id="cor" name="cor" value="<?= htmlentities($cor) ?>"  placeholder="Cor : #FFFFF"/>


                                </div>
                                <div class="form-group col-lg-12">
                                    <label for="nome">Descrição:</label><br/>
                                    <textarea name="descricao" id="descricao" rows="8"  class="form-control col-lg-12"   placeholder="Descrição"><?= htmlentities($descricao) ?></textarea>

                                </div>

                                <div class="form-group col-lg-12">
                                    <label for="nome">Composição:</label><br/>
                                    <textarea name="composicao" id="composicao" rows="8" class="form-control col-lg-12"   placeholder="Composição"><?= htmlentities($composicao) ?></textarea>

                                </div>



                                <div class="form-group col-lg-12">
                                    <label for="nome">Conteúdo da embalagem:</label><br/>
                                    <textarea name="conteudo_embalagem" id="conteudo_embalagem" rows="8" class="form-control  col-lg-12"   placeholder="Conteúdo da embalagem"><?= htmlentities($conteudo_embalagem) ?></textarea>

                                </div>




                                <input type="hidden" name="alteracao" value="<?= $_GET['acao'] == 'alter' ? 1 : 0 ?>">
                                <input type="hidden" name="id" value="<?= htmlentities($id) ?>">
                                <input type="hidden" name="submeteu" value="1" />
                                <div class="form-group col-lg-12">
                                <button type="submit" class="btn btn-info">Salvar</button>
                                <a type="button" href="/index.php" class="btn btn-danger">Voltar</a>
                              </div>
                            </form>

                        </div>
                    </section>
                </div>
</div>
