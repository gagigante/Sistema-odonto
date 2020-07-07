<?php
    require 'conexao.php';

    $idLogin = $_SESSION['idUsuario'];
    $comparacao = 0;


    $queryselectPass = "SELECT  count(tb07_data_consulta) AS quantSemAnt from tb07_consultas WHERE tb07_data_consulta BETWEEN TIMESTAMP(DATE_SUB(NOW(), INTERVAL 60 day)) AND TIMESTAMP(DATE_SUB(NOW(), INTERVAL 30 day));"; // SELECT DA SEMANA ANTERIOR
    $resultadoselectPass = $conexao->query($queryselectPass);

    if($resultadoselectPass->num_rows>0){
        while ($linha = $resultadoselectPass->fetch_assoc()){      
            $quantSemAnt = $linha["quantSemAnt"];        
        }
    }

    $queryselect = "SELECT tb07_data_consulta AS contagem from tb07_consultas WHERE tb07_data_consulta BETWEEN TIMESTAMP(DATE_SUB(NOW(), INTERVAL 30 day)) AND NOW();"; // SELECT DA SEMANA ATUAL
    $resultadoselect = $conexao->query($queryselect);

    if($resultadoselect->num_rows>0){
        while ($linha = $resultadoselect->fetch_assoc()){      
            $quantSem = $resultadoselect->num_rows;        
            $dadosBanco[] = 
                $linha["contagem"]                //Array com todos os registros do banco
            ;
        }
    

        $dataPhp[0] = date("Y-m-d"); // Posição número 0 recebe o dia atual
        for($i = 1; $i < 30; $i++){
            $dataPhp[$i] = 
                date("Y-m-d", strtotime("-".$i." day"))               // Recebe os 30 dias anteriores ao dia atual
            ;
        }


        for ($i=0; $i < 30; $i++) { 
            $dataIgual[$i] = 0; // Zera todas as posições de uma váriavel
        }

        for ($i=0; $i < 30; $i++) { 
            for ($j=0; $j < $resultadoselect->num_rows; $j++) { 
                if($dadosBanco[$j] == $dataPhp[$i]){ // Faz a igualdade dos registros do banco com as datas da semana
                    $dataIgual[$i] = 
                        1 + $dataIgual[$i]           // Vê quantos registro tem 
                    ;
                }
            }
        }

        if($quantSemAnt != 0 AND $quantSem != 0){ // Caso tenha algum registro nos 2 selects   
            
            if($quantSemAnt > $quantSem){
                $comparacao = -(($quantSemAnt - $quantSem)*100/$quantSem);

            }else{
                $comparacao = ($quantSem + 1 - $quantSemAnt)*100/$quantSemAnt;
                        

            }
        }elseif ($quantSemAnt == 0) { // Caso não tenha registro na semana anterior, aumento * 100
            $comparacao = $quantSem * 100;
        }elseif ($quantSem == 0) {
            $comparacao = $quantSemAnt * 100;
        }else{ // Caso não tenha registros
            $comparacao = 0;
        }

    }else{ // Caso não tenha nenhum registro
        for ($i=0; $i < 30; $i++) { 
            $dataIgual[$i] = 0; // Zera todas as posições de uma váriavel
        }
        $quantSem = 0;
    }


    $dados[] = [ //Array que manda os dados
        'select1' => [$dataIgual[0], $dataIgual[1], $dataIgual[2],$dataIgual[3],$dataIgual[4],$dataIgual[5],$dataIgual[6],$dataIgual[6],$dataIgual[7],$dataIgual[8],$dataIgual[9],$dataIgual[10],$dataIgual[11],$dataIgual[12],$dataIgual[13],$dataIgual[14],$dataIgual[15],$dataIgual[16],$dataIgual[17],$dataIgual[18],$dataIgual[19],$dataIgual[20],$dataIgual[21],$dataIgual[22],$dataIgual[23],$dataIgual[24],$dataIgual[25],$dataIgual[26],$dataIgual[27],$dataIgual[28],$dataIgual[29]],
        'select1Comp' => $comparacao,
        'select1Quant' => $quantSem                            
        // 'select2' => [1, 2, 3, 3, 3, 4, 4] 
        
            
    ];
        

    echo json_encode($dados);



?>