<?php
    require "conexao.php";
    
    $idLogin = $_SESSION['idUsuario'];

    $queryselect = "select * from tb01_paciente where tb01_idUsuario = '$idLogin' order by tb01_nome";
    $resultadoselect = $conexao->query($queryselect);

    if($resultadoselect->num_rows>0) { 

        echo    "<div class='table-responsive'>
                    <table class='table mb-0'>
                        <thead class='bg-light'>
                            <tr>
                                <th scope='col' class='border-0'>Foto</th>
                                <th scope='col' class='border-0'>Nome</th>
                                <th scope='col' class='border-0'>CPF</th>
                                <th scope='col' class='border-0'>Telefone</th>
                                <th scope='col' class='border-0'>E-mail</th>
                                <th scope='col' class='border-0'>Ações</th>        
                            </tr>
                        </thead>
                        <tbody>";

        while ($linha = $resultadoselect->fetch_assoc()){                
            // echo "<tr>";
            //     echo "<td>".$linha["tb02_produto"]."</td>";
            //     echo "<td>".$linha["tb02_quantidade"]."</td>";
            //     echo "<td>R$ ". str_replace(".",",", number_format($linha["tb02_preco"],2))."</td>";
            //     echo "<td>";
            //     echo "<button type='button' class='mb-2 btn btn-sm btn-success mr-1 view-modal' id='".$linha["tb02_idProduto"]."'
            //         data-id='".$linha["tb02_idProduto"]."'
            //         data-name='".$linha["tb02_produto"]."'
            //         data-price='".$linha["tb02_preco"]."'
            //         data-amount='".$linha["tb02_quantidade"]."'
            //         style='color: white'>Editar/Adicionar/Remover</button>";
            //     echo "</td>";
            // echo "</tr>";  

            if(empty($linha["tb01_imagem"])){
                $linha["tb01_imagem"] = "0.jpg";
            }
            echo "<tr> ";
            echo "<td><img class='user-avatar rounded-circle mr-2' src='assets/images/avatars/".$linha["tb01_imagem"]."' alt='User Avatar' width='50px'></td>";
            echo "<td>".$linha["tb01_nome"]. "</td>";
            echo "<td>".$linha["tb01_cpf"]. "</td>";
            echo "<td>".$linha["tb01_telefone"]."</td>";
            echo "<td>".$linha["tb01_email"] ."</td>";
            echo "<td><a href='patient-profile.php?id=".$linha["tb01_idpaciente"]."' class='mb-2 btn btn-sm btn-success mr-1' style='color: white'>Ver perfil</a></td>";
            echo "</tr>";
        }
        
        
        echo        "</tbody>
            </table>
    </div>";
        
    }else {
        echo "<div style='padding: 10px;' >";
        echo "<img style='width: 80%;' src='assets/images/empty-stock-placeholder.png' />";
        echo "<h5 style='margin-top: 15px;'>Ainda não há nada cadastrado no estoque</h5>";
        echo "</div>";
    }        
?>