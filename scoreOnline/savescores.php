
<?php


$db = "db584874358";//Your database name
$dbu = "dbo584874358";//Your database username
$dbp = "idiota123A";//Your database users' password
$host = "db584874358.db.1and1.com";//MySQL server - usually localhost, pero en 1and1 es otro

$dblink = mysql_connect($host,$dbu,$dbp);
$seldb = mysql_select_db($db);

//El isset comprueba que no es NULL
if(isset($_GET['name']) && isset($_GET['score'])){

     //Lightly sanitize the GET's to prevent SQL injections and possible XSS attacks
     
     //Con 'strip_tags' eliminamos de la obtención de datos cualquier dato que esté en PHP o HTML
     //Es útil porque evita que se pueda obtener información fundamental del servidor
     //Borrando los datos PHP y HTML eliminamos información crítica del servidor
     //'mysql_real_escape_string' también se hace por seguridad
    
     //El $__GET obtiene el valor pasado con ?name=PEPE&score=2938
     $name = strip_tags(mysql_real_escape_string($_GET['name'])); //'name' es el TAG que le pasamos con un valor
     $score = strip_tags(mysql_real_escape_string($_GET['score']));
     //Deprecated
     //$sql = mysql_query("INSERT INTO `$db`.`scores` (`id`,`name`,`score`) VALUES ('','$name','$score');");
     
     $sql = "INSERT INTO `$db`.`scores` (`id`, `nam`, `score`) VALUES (NULL, '$name', '$score')";

     
     if (mysql_query($sql)) {
     
          //The query returned true - now do whatever you like here.
          echo 'Your score was saved. Congrats!';
          
     }else{
     
          //The query returned false - you might want to put some sort of error reporting here. Even logging the error to a text file is fine.
          echo 'There was a problem saving your score. Please try again later.';
          echo "Error: " . $sql . "<br>" . mysqli_error($dblink);
     }
     
}else{
     echo 'Your name or score wasnt passed in the request. Make sure you add ?name=NAME_HERE&score=1337 to the tags.';
}

mysql_close($dblink);//Close off the MySQL connection to save resources.
?>