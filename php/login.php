<?php
	
	include_once "conexao.php";

	$login = $_POST["email"];
	$senha = $_POST["senha"];
    $_SESSION["logado"] = 0;

	$queryselect = "select * from tb04_login";
    $resultadoselect = $conexao->query($queryselect);

    if($resultadoselect->num_rows>0) { 
    	while ($linha = $resultadoselect->fetch_assoc()){  

    		$loginbd = $linha["tb04_login"];
    		$senhabd = $linha["tb04_senha"];
            $idbd = $linha["tb04_idLogin"];    

            if($login == $loginbd && $senha == $senhabd){

                session_start();
                $_SESSION['login'] = $login;
                $_SESSION['senha'] = $senha;
                $_SESSION['idUsuario'] = $idbd;
                $_SESSION["logado"] = 1;
                header("Location:../index.php");
            }                
    	}
    }

   if($_SESSION["logado"] == 0){
        header("Location:../login.php");
   }