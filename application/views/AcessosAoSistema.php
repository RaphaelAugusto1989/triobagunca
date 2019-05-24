

<?php

$IpRemote = getenv("LOCAL_ADDR"); // obtém o IP do usuário

echo "IP REMOTO: " .$IpRemote."<br>"; // imprimi o número IP


$IpLocal = $_SERVER["REMOTE_ADDR"]; //Pego o IP
//echo $_SERVER["REMOTE_ADDR"];

//$IpLocal2 = inet_ntop($_SERVER['REMOTE_ADDR']);

echo "IP DA OPERADORA: " .$IpLocal."<br>"; // imprimi o número IP
//echo "IP DA MAQUINA: " .$IpLocal2."<br>"; // imprimi o número IP

$host = gethostbyaddr($IpLocal); //pego o host

echo "NOME DO COMPUTADOR: ".$host."<br>";


echo '<hr>';


?>
