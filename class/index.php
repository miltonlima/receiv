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
    $sql = "insert into rcv_devedor (nome, cpf, data_nascimento, endereco) values('$nome', '$cpf', '$data', '$endereco');";
    //echo $sql;
    if ($conn->query($sql) === TRUE) {
      echo $this->msgAviso('success', 'Cadastro realizado com sucesso.');
    } else {
      echo $this->msgAviso('danger', 'Erro ao cadastrar.');
    }
  }

  public function listaDevedores($e)
  {
    global $conn;
    $output = '';
    $sql = "select * from rcv_devedor;";
    $ors = $conn->query($sql);
    if ($ors->num_rows > 0) {
      while ($row = $ors->fetch_assoc()) {
        if ($e == 'tabela') {
          $output .= "<tr>
                      <th scope='row'>$row[id]</th>
                      <td>$row[nome]</td>
                      <td>$row[cpf]</td>
                      <td>$row[data_nascimento]</td>
                    </tr>";
        } else {
          $output .= "<option value='1'>$row[cpf] - $row[nome]</option>";
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
}
