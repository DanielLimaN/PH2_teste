      <div class="wraper">
        <div class="row">
          <div class="col-sm-12">
              <section class="panel">

                  <header class="panel-heading">
                            <h3>Produtos cadastrados</h3>
                  </header>
                  <div class="panel-body">
                  <table class="table table-striped table-responsive">
                    <thead>
                        <tr>
                            <th><a href="?orderby=codigo">#</a></th>
                            <th><a href="?orderby=nome">Nome</a></th>
                            <th class="hidden-xs"><a href="?orderby=descricao">Descrição</a></th>
                            <th class="hidden-xs">Cor</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($produtos as $produto): ?>
                        <tr>
                            <td><?= htmlentities($produto->codigo); ?></td>
                            <td><?= htmlentities($produto->nome); ?></td>
                            <td class="hidden-xs"><?= htmlentities($produto->descricao); ?></td>
                            <td class="hidden-xs"><span class="label" style="background-color:<?= htmlentities($produto->cor); ?>"><?= htmlentities($produto->cor); ?></span></td>
                            <td>
                              <a type="button" href="/index.php?acao=alter&id=<?= $produto->id; ?>" id="btnactions" class="btn btn-warning btn-xs">Alterar</a>
                              <button type="button" onclick="exclusao(<?=$produto->id ?>)" data-toggle="modal" data-action="/index.php?acao=delete&id=<?=$produto->id ?>" data-target="#modalExclusao" id="btnactions" class="btn btn-danger btn-xs">Excluir</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </section>
          </div>
        </div>
      </div>
