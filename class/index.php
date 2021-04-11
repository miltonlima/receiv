<?php
class devedor
{
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
    if (!empty($_POST)) {
      foreach ($_POST['info'] as $key => $value) {
        //echo " $value ";
        if (empty($value)) {
          echo $this->msgAviso('warning', 'Preencha todos campos.');
          return false;
        }
      }
    } else {
      return false;
    }
  }
}
