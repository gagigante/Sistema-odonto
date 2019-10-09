<?php
    include_once "conexao.php";

    $queryselect = "select * from estoque order by produto";
    $resultadoselect = $conexao->query($queryselect);

    if($resultadoselect->num_rows>0) { 

        echo    "<div class='table-responsive'>
                    <table class='table mb-0'>
                        <thead class='bg-light'>
                            <tr>
                                <th scope='col' class='border-0'>Produto</th>
                                <th scope='col' class='border-0'>Quantidade</th>
                                <th scope='col' class='border-0'>Preço unitário</th>
                                <th scope='col' class='border-0'>Ações</th>
                            </tr>
                        </thead>
                        <tbody>";

        while ($linha = $resultadoselect->fetch_assoc()){                
            echo "<tr>";
                echo "<td>".$linha["produto"]."</td>";
                echo "<td>".$linha["quantidade"]."</td>";
                echo "<td>".$linha["preco"]."</td>";
                echo "<td>";
                echo "<button type='button' class='mb-2 btn btn-sm btn-success mr-1 view-modal' id='".$linha["idproduto"]."'
                    data-id='".$linha["idproduto"]."'
                    data-name='".$linha["produto"]."'
                    data-price='".$linha["preco"]."'
                    data-amount='".$linha["quantidade"]."'
                    style='color: white'>Editar/Adicionar/Remover</button>";
                echo "</td>";
            echo "</tr>";  
        }
    }else {
        echo "<div>";
        echo "<img src='assets/images/empty-stock-placeholder.png' />";
        echo "<h5 style='margin-top: 15px;'>Ainda não há nada cadastrado no estoque</h5>";
        echo "</div>";
    }        

    echo        "</tbody>
            </table>
    </div>";

?>