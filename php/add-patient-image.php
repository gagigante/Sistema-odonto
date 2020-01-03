<?php
    require "conexao.php";
    
    $idLogin = $_SESSION['idUsuario'];

    $image[] = $_POST[0];
    
    // echo $image[0];


    // $imagem = $_FILES['photo']['name'];
	// $imagemtemp = $_FILES['photo']['tmp_name'];
	// $imageHash = md5(date("d/m/y H:i:s"));

	// $imageNameWithHash = $imageHash . $imagem; 
	
	// $tamanho['tamanho'] = 1024*1024*100;

	// if ($tamanho['tamanho'] < $_FILES['photo']['size']){
	// 	echo 
	// 		"<script type=\"text/javascript\">
	// 			alert(\"Arquivo excede o tamanho máximo.\");
	// 		</script>
	// 		";
	// }

	// if(empty($imagem)){

	// 	$queryInsereCadastro = "INSERT INTO tb01_paciente (tb01_nome, tb01_rg, tb01_cpf, tb01_telefone, tb01_email, tb01_data, tb01_proficao, tb01_endereco, tb01_idUsuario) VALUES ('$nome', '$rg', '$cpf', '$tel', '$email', '$data', '$proficao', '$endereco', '$idLogin')";
	// 	$resultadoInsereCadastro = mysqli_query($conexao, $queryInsereCadastro);

	// }

?>