<?php
	require "conexao.php";

    $idLogin = $_SESSION['idUsuario'];
    $docId = $_POST['docId'];
    $patient_id = $_POST['patient_id'];

    $querySelect = "SELECT tb11_documento FROM tb11_documentos_paciente WHERE tb11_id = $docId";
    $result = $conexao->query($querySelect);

    while ($dados = $result->fetch_assoc()) {            
        $docName = $dados['tb11_documento'];                      
    }    

    unlink('../assets/documents/patients-documents/'.$idLogin.'/'.$patient_id.'/'.$docName);

	$queryDelete = "DELETE FROM tb11_documentos_paciente WHERE tb11_id = $docId";
	$result = $conexao->query($queryDelete);

?>