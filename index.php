<?php
include "class/index.php";
$rcv = new devedor();
?>
<!doctype html>
<html lang="pt">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

  <title>Receiv</title>
</head>

<body>
  <div class="container py-2">
    <h3>Receiv</h3>
    <div class="row">
      <div class="col border py-3">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="devedor-tab" data-toggle="tab" href="#devedor" role="tab" aria-controls="devedor" aria-selected="true">Devedores</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#divida" role="tab" aria-controls="divida" aria-selected="false">Dívidas</a>
          </li>
        </ul>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="devedor" role="tabpanel" aria-labelledby="devedor-tab">
            <?php
            $rcv->cadastraDevedor();
            $rcv->cadastraDivida();
            ?>
            <form method="post">
              <div class="row pt-2">
                <div class="col-sm-12 col-md-6">
                  <div class="form-group">
                    <label>Nome do devedor</label>
                    <input type="text" class="form-control" name="devedor[]" id="devedor[]" aria-describedby="nome" placeholder="Nome do devedor">
                    <small id="nome" class="form-text text-muted">Nome do devedor.</small>
                  </div>
                </div>
                <div class="col-sm-12 col-md-6">
                  <div class="form-group">
                    <label>CPF</label>
                    <input type="text" class="form-control cpf" name="devedor[]" id="devedor[]" aria-describedby="nome" placeholder="CPF">
                    <small id="nome" class="form-text text-muted">CPF</small>
                  </div>
                </div>
                <div class="col-sm-12 col-md-6">
                  <div class="form-group">
                    <label>Data de Nascimento</label>
                    <input type="text" class="form-control data" name="devedor[]" id="devedor[]" aria-describedby="nome" placeholder="Data de Nascimento">
                    <small id="nome" class="form-text text-muted">Data de Nascimento</small>
                  </div>
                </div>
                <div class="col-sm-12 col-md-6">
                  <div class="form-group">
                    <label>Endereço</label>
                    <input type="text" class="form-control" name="devedor[]" id="devedor[]" aria-describedby="nome" placeholder="Endereço">
                    <small id="nome" class="form-text text-muted">Endereço</small>
                  </div>
                </div>
                <div class="col-sm-12 col-md-12">
                  <button type="submit" class="btn btn-primary float-right">Salvar</button>
                </div>
              </div>
            </form>
            <div class="row">
              <div class="col-sm-12 col-md-12">
                <h5>Lista de Devedores</h5>
                <div class="table-responsive">
                  <table class="table">
                    <caption>Lista de usuários</caption>
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">CPF</th>
                        <th scope="col">Nascimento</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $rcv->listaDevedores('tabela'); ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="divida" role="tabpanel" aria-labelledby="divida-tab">
            <form method="post">
              <div class="row pt-2">
                <div class="col-sm-12 col-md-6">
                  <div class="form-group">
                    <label>Buscar devedor</label>
                    <select name="divida[]" id="divida[]" class="custom-select" size="3">
                      <?php $rcv->listaDevedores('select'); ?>
                    </select>
                    <small id="nome" class="form-text text-muted">Nome do devedor.</small>
                  </div>
                </div>
                <div class="col-sm-12 col-md-6">
                  <div class="form-group">
                    <label>Descrição do Título</label>
                    <input type="text" class="form-control" name="divida[]" id="divida[]" aria-describedby="nome" placeholder="Descrição do Título">
                    <small id="nome" class="form-text text-muted">Descrição do Título</small>
                  </div>
                </div>
                <div class="col-sm-12 col-md-6">
                  <div class="form-group">
                    <label>Valor</label>
                    <input type="text" class="form-control valor" name="divida[]" id="divida[]" aria-describedby="nome" placeholder="Valor">
                    <small id="nome" class="form-text text-muted">Valor</small>
                  </div>
                </div>
                <div class="col-sm-12 col-md-6">
                  <div class="form-group">
                    <label>Data de Vencimento</label>
                    <input type="text" class="form-control data" name="divida[]" id="divida[]" aria-describedby="nome" placeholder="Data de Vencimento">
                    <small id="nome" class="form-text text-muted">Data de Vencimento</small>
                  </div>
                </div>
                <div class="col-sm-12 col-md-12">
                  <button type="submit" class="btn btn-primary float-right">Salvar</button>
                </div>
              </div>
            </form>
            <div class="row">
              <div class="col-sm-12 col-md-12">
                <h5>Lista de Dívidas</h5>
                <div class="table-responsive">
                  <table class="table">
                    <caption>Lista de dívidas</caption>
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Devedor</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Vencimento</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $rcv->listaDividas('tabela'); ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="js/jquery-3.5.1.min.js"></script>
  <script src="js/jquery.mask.js" type="text/javascript"></script>
  <script src="bootstrap/assets/js/vendor/popper.min.js"></script>
  <script src="bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="js/script.js"></script>
</body>

</html>