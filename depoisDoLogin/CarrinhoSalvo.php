<?php

session_start();

include_once '../Banco.php';

if(isset($_POST['btn-adicionar'])){

    $nome           = $_POST['nomeProduto'];
    $valor          = $_POST['valor'];
    $quantidade  = $_POST['quantidade'];
    $img  = $_POST['img'];
    $tipo  = $_POST['tipo'];

           $id = $_SESSION['id'];

//  Insert na tebela
    $sql = "INSERT INTO tb_produtosUsuarios(img_produto, nome_produto, valor_produto, quantidade, tipo, id_usuario)
    VALUES('$img','$nome', '$valor', '$quantidade', '$tipo', '$id')";
    $result = mysqli_query($con, $sql);
     

//  Verificar se houve sucesso na gravação
    if($result){
    //  Redirecionar para o index
        echo "<script type= text/javascript language= javascript>
                alert('Adicionado ao carrinho!!!');
                location.href='frutasG.php';
            </script>";

        
        // Salva os dados encontrados na sessão
        
          
    }else{
        echo "<script type= text/javascript language= javascript>
                alert('Error no cadastro');
                
                
            </script>";
            // location.href='cadastro.html';;
    }
 
    }

?>


