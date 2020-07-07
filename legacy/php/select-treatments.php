<?php
    require "conexao.php";

    $idLogin = $_SESSION['idUsuario'];

    $query = "select * from tb03_tratamentos where tb03_id_usuario = '$idLogin' order by tb03_nome";

    $result = $conexao->query($query);

    if($result->num_rows>0) { 

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

        while ($linha = $result->fetch_assoc()){                
            echo "<tr>";
                echo "<td id='selectName' class='name-col-".$linha["tb03_id"]."'>".$linha["tb03_nome"]."</td>";
                echo "<td class='description-col-".$linha["tb03_id"]."'>".$linha["tb03_descricao"]."</td>";
                echo "<td>R$ ". str_replace(".",",", number_format($linha["tb03_preco"], 2))."</td>";
                echo "<td>";
                echo "<button type='button' class='mb-2 btn btn-sm btn-success mr-1 view-modal' id='".$linha["tb03_id"]."'
                    data-id='".$linha["tb03_id"]."'                    
                    data-price='".$linha["tb03_preco"]."'                    
                    style='color: white'>Editar</button>";
                echo "<button type='button' class='mb-2 btn btn-sm btn-danger mr-1 view-modal-delete' id='".$linha["tb03_id"]."'>Remover</button>";
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