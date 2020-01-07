<?php
	require "conexao.php";

	$docId = $_POST['docId'];

    $querySelect = "SELECT tb11_documento FROM tb11_documentos_paciente WHERE tb11_id = $docId";
    $result = $conexao->query($querySelect);

    while ($dados = $result->fetch_assoc()) {            
        $docName = $dados['tb11_documento'];                      
    }    

    unlink('../assets/documents/patients-documents/' . $docName);

	$queryDelete = "DELETE FROM tb11_documentos_paciente WHERE tb11_id = $docId";
	$result = $conexao->query($queryDelete);

?>