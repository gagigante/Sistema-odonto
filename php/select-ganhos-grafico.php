<?php
    require 'conexao.php';

    $idLogin = $_SESSION['idUsuario'];
    $dataHoje = date("j");


    // $queryselectPass = "SELECT  count(tb09_data) AS quantSemAnt from tb09_a WHERE tb09_data BETWEEN TIMESTAMP(DATE_SUB(NOW(), INTERVAL 60 day)) AND TIMESTAMP(DATE_SUB(NOW(), INTERVAL 30 day));"; // SELECT DA SEMANA ANTERIOR
    // $resultadoselectPass = $conexao->query($queryselectPass);

    // if($resultadoselectPass->num_rows>0){
    //     while ($linha = $resultadoselectPass->fetch_assoc()){      
    //         $quantSemAnt = $linha["quantSemAnt"];        
    //     }
    // }

    $queryselect = "SELECT * from tb13_movimentacoes_consulta WHERE tb13_data_pagamento BETWEEN TIMESTAMP(DATE_SUB(NOW(), INTERVAL 30 day)) AND NOW();"; // SELECT DA SEMANA ATUAL
    $resultadoselect = $conexao->query($queryselect);

    if($resultadoselect->num_rows>0){
        while ($linha = $resultadoselect->fetch_assoc()){      
            $quantSem = $resultadoselect->num_rows;        
            $dadosBancoData[] = 
                $linha["tb13_data_pagamento"]                //Array com todos os registros da data
            ;
            $dadosBancoNum[] = 
                $linha["tb13_valor"]                //Array com todos os registros do numero
            ;
        }    

        $dataPhp[0] = date("Y-m-d"); // Posição número 0 recebe o dia atual
        for($i = 1; $i < $dataHoje; $i++){
            $dataPhp[$i] = 
                date("Y-m-d", strtotime("-".$i." day"))               // Recebe os 6 dias anteriores ao dia atual
            ;
        }

        for ($i=0; $i <= $dataHoje; $i++) { 
            $dataIgual[$i] = 0; // Zera todas as posições de uma váriavel
        }


        for ($i=0; $i < $dataHoje; $i++) { 
            for ($j=0; $j < $resultadoselect->num_rows; $j++) { 
                if($dadosBancoData[$j] == $dataPhp[$i]){ // Faz a igualdade dos registros do banco com as datas da semana
                    $dataIgual[$i] = 
                        $dadosBancoNum[$j] + $dataIgual[$i]           // Vê quantos registro tem 
                    ;                                        
                }
                if($dataPhp[$i] == date("Y-m-01")){
                    $dataIgual[$dataHoje] = $dataIgual[$i];
                }
            }
        }       
        
        $reversedDataIgual = array_reverse($dataIgual); // Mostrar em ordem crescente 1...30

    }else{ // Caso não tenha nenhum registro
        for ($i=0; $i <= $dataHoje; $i++) { 
            $dataIgual[$i] = 0; // Zera todas as posições de uma váriavel
        }
        $quantSem = 0;
    }

    for ($i=0; $i <= $dataHoje; $i++) {  // Juntar os números em uma única váriavel
        if($i == 0){
           $dadosPhp = $dataIgual[$i]; 
        }else{

            $dadosPhp = $dadosPhp.",". $dataIgual[$i];    

        }     
    }
    $dadosPhpInt = array_reverse (array_map('intval', explode(',', $dadosPhp))); // Tratamento da váriavel
    $dataHojeInt = intval($dataHoje) + 1;


    $dados[] = [ //Array que manda os dados
        'select1' => $dadosPhpInt,
        'select1Quant' => $dataHojeInt

        // [$dataIgual[0], $dataIgual[1], $dataIgual[2],$dataIgual[3],$dataIgual[4],$dataIgual[5],$dataIgual[6],$dataIgual[6],$dataIgual[7],$dataIgual[8],$dataIgual[9],$dataIgual[10],$dataIgual[11],$dataIgual[12],$dataIgual[13],$dataIgual[14],$dataIgual[15],$dataIgual[16],$dataIgual[17],$dataIgual[18],$dataIgual[19],$dataIgual[20],$dataIgual[21],$dataIgual[22],$dataIgual[23],$dataIgual[24],$dataIgual[25],$dataIgual[26],$dataIgual[27],$dataIgual[28],$dataIgual[29]],
        // // 'select1Comp' => $comparacao,
        // // 'select1Quant' => $quantSem                            
        // // 'select2' => [1, 2, 3, 3, 3, 4, 4] 
        //  'select2' => [$reversedDataIgual[0], $reversedDataIgual[1], $reversedDataIgual[2],$reversedDataIgual[3],$reversedDataIgual[4],$reversedDataIgual[5],$reversedDataIgual[6],$reversedDataIgual[6],$reversedDataIgual[7],$reversedDataIgual[8],$reversedDataIgual[9],$reversedDataIgual[10],$reversedDataIgual[11],$reversedDataIgual[12],$reversedDataIgual[13],$reversedDataIgual[14],$reversedDataIgual[15],$reversedDataIgual[16],$reversedDataIgual[17],$reversedDataIgual[18],$reversedDataIgual[19],$reversedDataIgual[20],$reversedDataIgual[21],$reversedDataIgual[22],$reversedDataIgual[23],$reversedDataIgual[24],$reversedDataIgual[25],$reversedDataIgual[26],$reversedDataIgual[27],$reversedDataIgual[28],$reversedDataIgual[29]],
            
    ];


    echo json_encode($dados);



?>