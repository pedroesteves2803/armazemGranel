<?php

session_start();

include_once '../Banco.php';

if(isset($_POST['btn-enviar'])){

        

        $id = $_SESSION['id'];
        $result2 = mysqli_query($con,"SELECT * FROM tb_produtosUsuarios WHERE id_usuario =$id");
        $Total = 0;
        
          while($dados = mysqli_fetch_array($result2)){
          $idProduto    = $dados['id_produto'];
          $nomeProduto    = $dados['nome_produto'];
          $valorProduto  = $dados['valor_produto'];
          $quantidadeProduto  = $dados['quantidade'];
          $img  = $dados['img_produto'];
          $tipo  = $dados['tipo'];

//  Insert na tebela
            $sql = "INSERT INTO tb_produtosUsuariosConfirmado(img_produto, nome_produto, valor_produto, quantidade, tipo, id_usuario)
            VALUES('$img','$nomeProduto', '$valorProduto', '$quantidadeProduto', '$tipo', '$id')";
            $result = mysqli_query($con, $sql);

            $nomeUsuario = $_SESSION['nome'];
            $telefoneUsuario = $_SESSION['telefone'];
            // echo $nomeUsuario;
            // echo $telefoneUsuario;

            $result3 = mysqli_query($con, "DELETE FROM tb_produtosUsuarios WHERE id_usuario = $id");

          }
          

//  Verificar se houve sucesso na gravação
    if($result){
    //  Redirecionar para o index

        // Salva os dados encontrados na sessão
        
          
    }else{
        echo "<script type= text/javascript language= javascript>
                alert('Error ao Salvar');                
            </script>";
            // location.href='cadastro.html';;
    }
 
    }
    else if(isset($_POST['btn-excluir'])){
        $id = $_SESSION['id'];
        $result2 = mysqli_query($con,"SELECT * FROM tb_produtosUsuarios WHERE id_usuario =$id");
        $dados2 = mysqli_fetch_array($result2);
        $idProduto2    = $dados2['id_produto'];
        $result = mysqli_query($con, "DELETE FROM tb_produtosUsuarios WHERE id_usuario = $id and id_produto = $idProduto2");

        if($result){
            //  Redirecionar para o index
                echo "<script type= text/javascript language= javascript>
                        location.href='carrinho.php';
                    </script>";
        
                
                // Salva os dados encontrados na sessão
                
                  
            }else{
                echo "<script type= text/javascript language= javascript>
                        alert('Error ao excluir');
                        location.href='carrinho.php';                        
                    </script>";
                    // location.href='cadastro.html';;
            }
    }

    
    require_once('src/PHPMailer.php');
    require_once('src/SMTP.php');
    require_once('src/Exception.php');
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    $mail = new PHPMailer(true);
    
    try {
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'enviarcodigogranel@gmail.com';
        $mail->Password = 'armazem123';
        $mail->Port = 587;
    
        $mail->setFrom('enviarcodigogranel@gmail.com');
        $mail->addAddress('armazemgranel@gmail.com');

        $mail->isHTML(true);
        $mail->Subject = "Pedido de $nomeUsuario";
        $mail->Body = "Nome:  $nomeUsuario <br> Telefone : $telefoneUsuario <br> Codigo do carrinho: $id";
        // $mail->AltBody = 'Chegou o email teste do Andre :3';
    
        if($mail->send()) {
            echo "<script type= text/javascript language= javascript>
            alert('Aguarde a resposta de algum atende pelo celular');
            location.href='carrinho.php';
            </script>";
        } else {
            echo "<script type= text/javascript language= javascript>
            alert('Ocorreu um error... E-mail não enviado');
            location.href='carrinho.php';
            </script>";
        }
    } catch (Exception $e) {
        echo "<script type= text/javascript language= javascript>
            alert('Error ao tentar enviar email...');
            location.href='carrinho.php';
            </script>";
    }


?>


