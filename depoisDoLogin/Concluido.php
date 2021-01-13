<?php

session_start();

include_once '../Banco.php';

    if(isset($_POST['btn-enviar'])){

    
        $id = $_SESSION['idConcluido'];

        $result = mysqli_query($con, "DELETE FROM tb_produtosUsuariosConfirmado WHERE id_usuario = $id");

        if($result){
            //  Redirecionar para o index
                echo "<script type= text/javascript language= javascript>                        
                        location.href='areaAdmin.php';
                    </script>";
        
                
                // Salva os dados encontrados na sessão
                
                  
            }else{
                echo "<script type= text/javascript language= javascript>
                        alert('Error ao excluir');
                        location.href='areaAdmin.php';                        
                    </script>";
                    // location.href='cadastro.html';;
            }
    }
?>