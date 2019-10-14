<?php
    require "conexao.php";

    $queryselect = "select * from tb03_tratamentos order by tb03_nome";
    $resultadoselect = $conexao->query($queryselect);

    if($resultadoselect->num_rows>0) { 

        echo    "<div class='table-responsive'>
                    <table class='table mb-0'>
                        <thead class='bg-light'>
                            <tr>
                                <th scope='col' class='border-0'>Tratamento</th>
                                <th scope='col' class='border-0'>Descrição</th>
                                <th scope='col' class='border-0'>Preço</th>
                                <th scope='col' class='border-0'>Ações</th>
                            </tr>
                        </thead>
                        <tbody>";

        while ($linha = $resultadoselect->fetch_assoc()){                
            echo "<tr>";
                echo "<td>".$linha["tb03_nome"]."</td>";
                echo "<td>".$linha["tb03_descricao"]."</td>";
                echo "<td>R$ ". str_replace(".",",", number_format($linha["tb03_preco"],2))."</td>";
                echo "<td>";
                echo "<button type='button' class='mb-2 btn btn-sm btn-success mr-1 view-modal' id='".$linha["tb03_id"]."'
                    data-id='".$linha["tb03_id"]."'
                    data-name='".$linha["tb03_nome"]."'
                    data-price='".$linha["tb03_preco"]."'
                    data-description='".$linha["tb03_descricao"]."'
                    style='color: white'>Editar/Adicionar/Remover</button>";
                echo "</td>";
            echo "</tr>";  
        }
        
        
        echo        "</tbody>
            </table>
    </div>";
        
    }else {
        echo "<div style='padding: 10px;' >";
        echo "<img style='width: 80%;' src='assets/images/empty-treatments-placeholder.png' />";
        echo "<h5 style='margin-top: 15px;'>Ainda não há nada cadastrado no catálogo</h5>";
        echo "</div>";
    }        


?>