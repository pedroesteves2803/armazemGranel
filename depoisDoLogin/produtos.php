<?php

session_start();

include_once '../Banco.php';

if(isset($_POST['btn-adicionar'])){

    $nome           = $_POST['nomeProduto'];
    $valor          = $_POST['valor'];
    $quantidade  = $_POST['quantidade'];
    $tamanho  = $_POST['tamanho'];
    $pagina  = $_POST['pagina'];
    $img  = $_POST['img'];
    $tipo  = $_POST['tipo'];

    if(empty($quantidade)){
        if($pagina == "embalagem"){
            echo "<script type= text/javascript language= javascript>
                alert('Por favor, informe a quantidade ');
                    location.href='embalagens.php';
                </script>";
            }
            else if($pagina == "frutaG"){
                echo "<script type= text/javascript language= javascript>
                alert('Por favor, informe a quantidade ');
                location.href='frutasG.php';
                </script>";
            }
            else if($pagina == "frutaK"){
                echo "<script type= text/javascript language= javascript>
                alert('Por favor, informe a quantidade ');
                location.href='frutasK.php';
                </script>";
            }
            else if($pagina == "limpeza"){
                echo "<script type= text/javascript language= javascript>
                alert('Por favor, informe a quantidade ');
                location.href='limpeza.php';
                </script>";
            }
            else if($pagina == "hortalicasG"){
                echo "<script type= text/javascript language= javascript>
                alert('Por favor, informe a quantidade ');
                location.href='hortalicasG.php';
                </script>";
            }
            else if($pagina == "hortalicasK"){
                echo "<script type= text/javascript language= javascript>
                alert('Por favor, informe a quantidade ');
                location.href='hortalicasK.php';
                </script>";
            }
            else if($pagina == "chaG"){
                echo "<script type= text/javascript language= javascript>
                alert('Por favor, informe a quantidade ');
                location.href='chaG.php';
                </script>";
            }
            else if($pagina == "chaK"){
                echo "<script type= text/javascript language= javascript>
                alert('Por favor, informe a quantidade ');
                location.href='chaK.php';
                </script>";
            }
            else if($pagina == "graosG"){
                echo "<script type= text/javascript language= javascript>
                alert('Por favor, informe a quantidade ');
                location.href='graosG.php';
                </script>";
            }
            else if($pagina == "graosK"){
                echo "<script type= text/javascript language= javascript>
                alert('Por favor, informe a quantidade ');
                location.href='graosK.php';
                </script>";
            }
    }
    else{
           $id = $_SESSION['id'];

//  Insert na tebela
    $sql = "INSERT INTO tb_produtosUsuarios(img_produto, nome_produto, valor_produto, tamanho_produto, quantidade, tipo, id_usuario)
    VALUES('$img','$nome', '$valor', '$tamanho', '$quantidade', '$tipo', '$id')";
    $result = mysqli_query($con, $sql);
     

//  Verificar se houve sucesso na gravação
    if($result){
    //  Redirecionar para o index
        if($pagina == "embalagem"){
        echo "<script type= text/javascript language= javascript>
                location.href='embalagens.php';
            </script>";
        }
        else if($pagina == "frutaG"){
            echo "<script type= text/javascript language= javascript>
            location.href='frutasG.php';
            </script>";
        }
        else if($pagina == "frutaK"){
            echo "<script type= text/javascript language= javascript>
            location.href='frutasK.php';
            </script>";
        }
        else if($pagina == "limpeza"){
            echo "<script type= text/javascript language= javascript>
            location.href='limpeza.php';
            </script>";
        }
        else if($pagina == "hortalicasG"){
            echo "<script type= text/javascript language= javascript>
            location.href='hortalicasG.php';
            </script>";
        }
        else if($pagina == "hortalicasK"){
            echo "<script type= text/javascript language= javascript>
            location.href='hortalicasK.php';
            </script>";
        }
        else if($pagina == "chaG"){
            echo "<script type= text/javascript language= javascript>
            location.href='chaG.php';
            </script>";
        }
        else if($pagina == "chaK"){
            echo "<script type= text/javascript language= javascript>
            location.href='chaK.php';
            </script>";
        }
        else if($pagina == "graosG"){
            echo "<script type= text/javascript language= javascript>
            location.href='graosG.php';
            </script>";
        }
        else if($pagina == "graosK"){
            echo "<script type= text/javascript language= javascript>
            location.href='graosK.php';
            </script>";
        }
        
        
        // Salva os dados encontrados na sessão
        
          
    }else{

        if($pagina == "embalagem"){
            echo "<script type= text/javascript language= javascript>
                alert('erro ao salvar');
                    erro ao salvar
                    location.href='embalagens.php';
                </script>";
            }
            else if($pagina == "frutaG"){
                echo "<script type= text/javascript language= javascript>
                alert('erro ao salvar');
                location.href='frutasG.php';
                </script>";
            }
            else if($pagina == "frutaK"){
                echo "<script type= text/javascript language= javascript>
                alert('erro ao salvar');
                location.href='frutasK.php';
                </script>";
            }
            else if($pagina == "limpeza"){
                echo "<script type= text/javascript language= javascript>
                alert('erro ao salvar');
                location.href='limpeza.php';
                </script>";
            }
            else if($pagina == "hortalicasG"){
                echo "<script type= text/javascript language= javascript>
                alert('erro ao salvar');
                location.href='hortalicasG.php';
                </script>";
            }
            else if($pagina == "hortalicasK"){
                echo "<script type= text/javascript language= javascript>
                alert('erro ao salvar');
                location.href='hortalicasK.php';
                </script>";
            }
            else if($pagina == "chaG"){
                echo "<script type= text/javascript language= javascript>
                alert('erro ao salvar');
                location.href='hortalicasG.php';
                </script>";
            }
            else if($pagina == "chaK"){
                echo "<script type= text/javascript language= javascript>
                alert('erro ao salvar');
                location.href='hortalicasK.php';
                </script>";
            }
            else if($pagina == "graosG"){
                echo "<script type= text/javascript language= javascript>
                alert('erro ao salvar');
                location.href='hortalicasG.php';
                </script>";
            }
            else if($pagina == "graosK"){
                echo "<script type= text/javascript language= javascript>
                alert('erro ao salvar');
                location.href='hortalicasK.php';
                </script>";
            }
            // location.href='cadastro.html';;
    }
 
    }


}

?>


