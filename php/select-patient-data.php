<?php
    require 'conexao.php';

    $idLogin = $_SESSION['idUsuario'];
    $patient_id = $_POST['patient_id'];

    $dados = array();

    $queryselect = "select * from tb01_pacientes where tb01_id = '$patient_id' and tb01_id_usuario = '$idLogin'";
    $resultadoselect = $conexao->query($queryselect);

    if($resultadoselect->num_rows>0){
        while ($linha = $resultadoselect->fetch_assoc()){   

            $data = str_replace("-", "/", $linha["tb01_data_nascimento"]);
            $conv_data = date('d/m/Y', strtotime($data));

            $dados[] = [
                'nome' => $linha['tb01_nome'], 
                'rg' => $linha['tb01_rg'], 
                'cpf' => $linha['tb01_cpf'], 
                'telefone' => $linha['tb01_telefone'],
                'email' => $linha['tb01_email'],
                'data' => $conv_data,
                'imagem' => $linha['tb01_imagem'],
                'profissao' => $linha['tb01_profissao'],
                'endereco' => $linha['tb01_endereco']
            ];
        }
    }   
    
    echo json_encode($dados);
?>
