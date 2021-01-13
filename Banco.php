<?php 

$servidor ='localhost';
$username  ='root';
$senha    = '';
$banco    = 'granel';



// criar uma variável para verificar a conexão
$con = mysqli_connect($servidor, $username, $senha, $banco);

//testar a verificação da conexão

if(!$con){
	echo 'Erro na conexão';
}

 ?>