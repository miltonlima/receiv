<?php
class devedor
{
  public $conn;
  public $servername = 'localhost';
  public $username = 'root';
  public $password = '';
  public $dbname = 'receiv';

  function devedor()
  {
    $this->acessoBanco();
  }

  public function acessoBanco()
  {
    global $conn;
    $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
    $conn->set_charset('utf8');
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
  }

  public function cadastraDevedor()
  {
    if (!empty($_POST['devedor'])) {
      foreach ($_POST['devedor'] as $value) {
        if (empty($value)) {
          $input = 1;
        }
      }
      if (empty($input)) {
        $nome = $_POST['devedor'][0];
        $cpf = preg_replace('/[^0-9]/', '', $_POST['devedor'][1]);
        $nascimento = $_POST['devedor'][2];
        $endereco = $_POST['devedor'][3];
        $this->insereDevedor($nome, $cpf, $nascimento, $endereco);
        return true;
      } else {
        echo $this->msgAviso('warning', 'Preencha todos campos.');
        return false;
      }
    }
  }

  public function insereDevedor($nome, $cpf, $nascimento, $endereco)
  {
    global $conn;
    $data = date('Y-m-d', strtotime($nascimento));
    $sql = "insert into rcv_devedor (nome, cpf, data_nascimento, endereco) values('$nome', '$cpf', str_to_date('$nascimento','%d/%m/%Y'), '$endereco');";
    //echo $sql;
    if ($conn->query($sql) === TRUE) {
      echo $this->msgAviso('success', 'Cadastro de Devedor realizado com sucesso.');
    } else {
      echo $this->msgAviso('danger', 'Erro ao cadastrar.');
    }
  }

  public function atualizaDevedor()
  {
    global $conn;
    if (!empty($_GET['edit'])) {
      if (!empty($_POST['devedor'][0]) && !empty($_POST['devedor'][1]) && !empty($_POST['devedor'][2]) && !empty($_POST['devedor'][3])) {
        $sql = "update rcv_devedor set nome= '".$_POST['devedor'][0]."' where id = $_GET[edit];";
        if ($conn->query($sql) === TRUE) {
          echo $this->msgAviso('success', 'Atualização de Devedor realizado com sucesso.');
        } else {
          echo $this->msgAviso('danger', 'Erro ao cadastrar.');
        }
      }
    }
  }

  public function buscarDevedor($id)
  {
    //echo "atualizardevedor";
    global $conn;
    $sql = "select *, date_format(data_nascimento, '%d/%m/%Y') data_nascimento from rcv_devedor where id = $id limit 1;";
    $ors = $conn->query($sql);
    if ($ors->num_rows > 0) {
      return $ors->fetch_assoc();
    }
  }

  public function listaDevedores($e)
  {
    global $conn;
    $output = '';
    $sql = "select *,date_format(data_nascimento,'%d/%m/%Y') data_nascimento from rcv_devedor order by nome asc;";
    $ors = $conn->query($sql);
    if ($ors->num_rows > 0) {
      while ($row = $ors->fetch_assoc()) {
        if ($e == 'tabela') {
          $output .= "<tr>
                      <th scope='row'><a role='button' class='btn btn-light p-1' href='/receiv/?edit=$row[id]'>$row[id]</a></th>
                      <td><a role='button' class='btn btn-light p-1' href='/receiv/?edit=$row[id]'>$row[nome]</a></td>
                      <td><a role='button' class='btn btn-light p-1' href='/receiv/?edit=$row[id]'>$row[cpf]</a></td>
                      <td><a role='button' class='btn btn-light p-1' href='/receiv/?edit=$row[id]'>$row[data_nascimento]</a></td>
                    </tr>";
        } else {
          $output .= "<option value='$row[id]'>$row[cpf] - $row[nome]</option>";
        }
      }
    }
    echo $output;
  }

  public function msgAviso($a, $msg)
  {
    return "<div class='alert alert-$a alert-dismissible fade show mt-2' role='alert'>
              $msg
              <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
              </button>
            </div>";
  }

  public function cadastraDivida()
  {
    if (!empty($_POST['divida'])) {
      foreach ($_POST['divida'] as $value) {
        if (empty($value)) {
          $input = 1;
        }
      }
      if (empty($input)) {
        $iddevedor = $_POST['divida'][0];
        $descricao = $_POST['divida'][1];
        $valor = $_POST['divida'][2];
        $datavencimento = $_POST['divida'][3];
        $this->insereDivida($iddevedor, $descricao, $valor, $datavencimento);
        return true;
      } else {
        echo $this->msgAviso('warning', 'Preencha todos campos.');
        return false;
      }
    }
  }

  public function insereDivida($iddevedor, $descricao, $valor, $datavencimento)
  {
    global $conn;
    $preco = str_replace(",", ".", str_replace(".", "", $valor));
    $sql = "insert into rcv_divida (id_devedor, descricao_titulo, valor, data_vencimento, updated) values($iddevedor, '$descricao', '$preco', str_to_date('$datavencimento','%d/%m/%Y'), current_timestamp());";
    if ($conn->query($sql) === TRUE) {
      echo $this->msgAviso('success', 'Cadastro de Dívida realizado com sucesso.');
    } else {
      echo $this->msgAviso('danger', 'Erro ao cadastrar.' . $sql);
    }
  }

  public function listaDividas($e)
  {
    global $conn;
    $output = '';
    $sql = "select *, date_format(data_vencimento,'%d/%m/%Y') data_vencimento from rcv_divida di inner join rcv_devedor de on di.id_devedor = de.id order by di.updated desc;";
    $ors = $conn->query($sql);
    if ($ors->num_rows > 0) {
      while ($row = $ors->fetch_assoc()) {
        if ($e == 'tabela') {
          $valor = number_format($row['valor'], 2, ',', '.');
          $output .= "<tr>
                      <th scope='row'>$row[id]</th>
                      <td>$row[nome]</td>
                      <td>$valor</td>
                      <td>$row[data_vencimento]</td>
                    </tr>";
        } else {
          $output .= "<option value='$row[id]'>$row[cpf] - $row[nome]</option>";
        }
      }
    }
    echo $output;
  }

  public function cancelarEditar()
  {
    if (!empty($_GET['edit'])) {
      return "<a href='/receiv/' class='btn btn-secondary'>Cancelar</a>";
    }
  }
}
