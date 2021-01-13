<?php

session_start();

include_once 'Banco.php';

if(isset($_POST['btn-cadastro'])){
    $nome           = $_POST['nome'];
    $email          = $_POST['email'];
    $telefone          = $_POST['telefone'];
    $senhaOriginal  = $_POST['senha'];
    $cripSenha      = md5($senhaOriginal); //  Criptografar senha:
    $confirmaSenha  = $_POST['confirmar'];

    if(empty($nome) or empty($email) or empty($telefone) or empty($senhaOriginal) or empty($confirmaSenha)){
        echo "<script type= text/javascript language= javascript>
                alert('Por favor, informe todos os campos ');
                location.href='cadastro.html';
            </script>";

    } else if($senhaOriginal != $confirmaSenha){
        echo "<script type= text/javascript language= javascript>
                alert('Senhas diferente');
                location.href='cadastro.html';
            </script>";
    } 

//  Insert na tebela
    $sql = "INSERT INTO tb_usuario(nome_usuario, email_usuario, telefone, senha_usuario, senhaOriginal_usuario)
    VALUES('$nome', '$email', '$telefone', '$cripSenha', '$senhaOriginal')";
     $result = mysqli_query($con, $sql);
     

//  Verificar se houve sucesso na gravação
    if($result){
    //  Redirecionar para o index
        echo "<script type= text/javascript language= javascript>
                alert('Usuario cadastrado com sucesso!!!');
                location.href='login.html';
            </script>";

        
        // Salva os dados encontrados na sessão
        $_SESSION['idALT']    = $result['id_usuario'];
        $_SESSION['nome']     = $result['nome_usuario'];        
        $_SESSION['email']    = $result['email_usuario'];
        $_SESSION['telefone']    = $result['telefone'];
        
          
    }else{
        echo "<script type= text/javascript language= javascript>
                alert('Error no cadastro');
                
            </script>";
            // location.href='cadastro.html';;
    }

}

?>


