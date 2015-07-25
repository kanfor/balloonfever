<?php
header('Access-Control-Allow-Origin: *');

$host="db584874358.db.1and1.com"; // Host name, en 1and1 no es localhost 
$username="dbo584874358"; // Mysql username 
$password="idiota123A"; // Mysql password 
$db_name="db584874358"; // Database name 
$tbl_name="scores"; // Table name

// Conectarse al super servidor y seleccionar la tabla scores
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

// Obtener los datos
$sql="SELECT * FROM scores ORDER BY score DESC LIMIT 10";
$result=mysql_query($sql);

// LLenamos la matriz con los datos
while($rows=mysql_fetch_array($result)){
    $rows['nam'] . "|" . $rows['score'] . "|";
}

$nombre1 = mysql_query("SELECT * FROM scores ORDER BY score LIMIT 55,1");
echo $nombre1;

// Obtenemos el valor pasado al PHP con ?
$getName = $_GET['name'];
$getScore = $_GET['score'];
echo $rows[0][0];
// Pintamos el dato que le pidamos
switch ($getName) {
    case '1':
        echo "Pepe Primero";
        break;
    case '2':
        echo "Pepe Segundo";
        break;
    default:
        echo "No has pedido dato";
        breal;
}

// Cerrar la conexion
mysql_close();
?>