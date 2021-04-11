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
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Devedores</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Dívidas</a>
          </li>
        </ul>
        <div class="tab-content" id="myTabContent">

          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <form method="post" name="frmpost">
              <div class="row">
                <div class="col-sm-12 col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nome do devedor</label>
                    <input type="text" class="form-control" name="info[]" id="info[]" aria-describedby="nome" placeholder="Nome do devedor">
                    <small id="nome" class="form-text text-muted">Nome do devedor.</small>
                  </div>
                </div>
                <div class="col-sm-12 col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">CPF</label>
                    <input type="text" class="form-control" name="info[]" id="info[]" aria-describedby="nome" placeholder="CPF">
                    <small id="nome" class="form-text text-muted">CPF</small>
                  </div>
                </div>
                <div class="col-sm-12 col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Data de Nascimento</label>
                    <input type="text" class="form-control" name="info[]" id="info[]" aria-describedby="nome" placeholder="Data de Nascimento">
                    <small id="nome" class="form-text text-muted">Data de Nascimento</small>
                  </div>
                </div>
                <div class="col-sm-12 col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Endereço</label>
                    <input type="text" class="form-control" name="info[]" id="info[]" aria-describedby="nome" placeholder="Endereço">
                    <small id="nome" class="form-text text-muted">Endereço</small>
                  </div>
                </div>
                <div class="col-sm-12 col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Descrição do Título</label>
                    <input type="text" class="form-control" name="info[]" id="info[]" aria-describedby="nome" placeholder="Descrição do Título">
                    <small id="nome" class="form-text text-muted">Descrição do Título</small>
                  </div>
                </div>
                <div class="col-sm-12 col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Valor</label>
                    <input type="text" class="form-control" name="info[]" id="info[]" aria-describedby="nome" placeholder="Valor">
                    <small id="nome" class="form-text text-muted">Valor</small>
                  </div>
                </div>
                <div class="col-sm-12 col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Data de Vencimento</label>
                    <input type="text" class="form-control" name="info[]" id="info[]" aria-describedby="nome" placeholder="Data de Vencimento">
                    <small id="nome" class="form-text text-muted">Data de Vencimento</small>
                  </div>
                </div>
                <div class="col-sm-12 col-md-12">
                  <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
              </div>
            </form>
          </div>
          <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
        </div>
      </div>
    </div>
  </div>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="js/jquery-3.5.1.min.js"></script>
  <script src="bootstrap/assets/js/vendor/popper.min.js"></script>
  <script src="bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="js/script.js"></script>
</body>

</html>