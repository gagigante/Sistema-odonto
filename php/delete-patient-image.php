<?php
	require "conexao.php";

	$imageId = $_POST['imageId'];

    $querySelect = "SELECT tb10_imagem FROM tb10_imagens_paciente WHERE tb10_id = $imageId";
    $result = $conexao->query($querySelect);

    while ($dados = $result->fetch_assoc()) {            
        $imageName = $dados['tb10_imagem'];                      
    }    

    unlink('../assets/images/patients-images/' . $imageName);

	$queryDelete = "DELETE FROM tb10_imagens_paciente WHERE tb10_id = $imageId";
	$result = $conexao->query($queryDelete);

?>