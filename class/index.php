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
}
