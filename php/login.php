<?php	
	require "conexao.php";

    $usuario = mysqli_real_escape_string($conexao, trim($_POST["user"]));
    $senha = mysqli_real_escape_string($conexao, trim($_POST["password"]));	
    $_SESSION["logado"] = 0;

	$queryselect = "SELECT * FROM tb04_usuarios WHERE tb04_usuario = '$usuario' AND tb04_senha = MD5('$senha')";
    $resultadoselect = $conexao->query($queryselect);

    if($resultadoselect->num_rows>0) { 
        while ($linha = $resultadoselect->fetch_assoc()) {  
            $_SESSION['login'] = $linha['tb04_usuario'];
            //$_SESSION['senha'] = $linha['tb04_senha'];
            $_SESSION['idUsuario'] = $linha['tb04_id'];
            $_SESSION["logado"] = 1;  
            echo 'login success';
            // header("Location:../index.php");
        }
    } else {
        echo 'login error';
    }
?>
