<?php
function Conectarse() {
    if (!($link = mysql_connect('localhost', 'root', ''))) {
        die("error al conectar");
    } else {
        mysql_select_db("abc", $link);
        return $link;
    }
}
function conexion_pdo(){
    $db = new PDO("mysql:host=localhost;dbname=abc", "root", "");
    return $db;
}


$mysqli = new mysqli("localhost", "root", "", "abc");
  if ($mysqli->connect_errno) {
    echo "Falló la conexión a MySQL";
}
else{
 // echo"Conectado a MySQL";
}

?>
