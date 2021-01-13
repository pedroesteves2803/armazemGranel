<?php

session_start();

include_once 'Banco.php';

if(isset($_POST['btn-entrar'])){
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $senhaCrip = md5($senha);

    if(empty($email) or empty($senha)){
        echo "<script type= text/javascript language= javascript>
                alert('Por favor, informe o email e senha');
                location.href='login.html';
            </script>";
    }
    else{ 

        
            //  Verificando usuário    

            $sql = "SELECT id_usuario, nome_usuario, email_usuario, telefone, senha_usuario FROM tb_usuario 
            WHERE email_usuario='$email' and senha_usuario='$senhaCrip'";
            // $lqs = "SELECT nome FROM teste WHERE email='$email' and senha='$senha' limit 1";
            $result = mysqli_query($con, $sql);
            $dados = mysqli_fetch_array($result);
            


        //  Cria-se uma sessão com o nome e usuarioNome
            if($dados){
                $nomeUsuario =  $dados['nome_usuario'];
                if($nomeUsuario != "admin"){

                    echo "<script type= text/javascript language= javascript>
                    alert('Bem vindo '$nomeUsuario'!!');                    
                    </script>"; 
                    header('location: depoisDoLogin/index.html');
                    $_SESSION['id'] =  $dados['id_usuario'];   
                    $_SESSION['telefone'] =  $dados['telefone'];
                    $_SESSION['nome'] =  $dados['nome_usuario']; 


                }
                else{
                    echo "<script type= text/javascript language= javascript>
                    alert('Bem vindo administrador !!');
                    location.href='depoisDoLogin/areaAdmin.php';
                    </script>";
                }

               
            } else{
                echo "<script type= text/javascript language= javascript>
                        alert('Usuário/Senha incorretos ou não existem');
                        location.href='login.html';
                        </script>";
            }
        }
}

?>
