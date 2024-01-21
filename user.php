<?php
    $Nome=$_POST["Nome"];
    $Password=$_POST["Password"];
    if(!$Nome || !$Password )
    {
    echo "Campos em falta. Volte atrás e tente novamente.";
    exit;
    }
    include 'connect.php';

        // Verifica se o botão "CriarConta" foi pressionado
        if (isset($_POST['acao']) && $_POST['acao'] === 'CriarConta') {
            $ProcuraInsert = "SELECT * FROM User WHERE nome = '" . $Nome . "'";
            $ResultProcura = mysqli_query($liga, $ProcuraInsert);
            $RegistoInsert = mysqli_fetch_assoc($ResultProcura);

            if ($RegistoInsert) {
                header("Location: user.html?erro2=1");
            }
            else {
                $insertquery = "INSERT INTO User VALUES ('" . $Nome . "', '" . $Password . "')";
                $Insert = mysqli_query($liga, $insertquery);
                header("Location: user.html?mensagem=1");
             }
        }                                                                      
        // Verifica se o botão "Login" foi pressionado     
        elseif (isset($_POST['acao']) && $_POST['acao'] === 'Login') {
          
            $procura = "SELECT * FROM User WHERE nome = '" . $Nome . "' AND password = '" . $Password . "'";
            $result = mysqli_query($liga, $procura);
            $registo = mysqli_fetch_assoc($result);
    
            if ($registo) {
                session_start();
                $_SESSION['Nome'] = $Nome;
                header("Location: configurador.php");
            } else {
                header("Location: user.html?erro=1");
            }
        }
    
?>