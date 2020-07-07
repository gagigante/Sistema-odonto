<?php
    require "conexao.php";
    
    $idLogin = $_SESSION['idUsuario'];

    $query = "select * from tb02_estoque where tb02_id_usuario = '$idLogin' order by tb02_produto LIMIT 8";
    $result = $conexao->query($query);

    if($result->num_rows>0) { 
        while ($linha = $result->fetch_assoc()){                
            echo"<li class='list-group-item d-flex px-3'>
                    <span class='text-semibold text-fiord-blue'>".$linha["tb02_produto"]."</span>
                    <span class='ml-auto text-right text-semibold text-reagent-gray'>".$linha["tb02_quantidade"]."</span>
                </li>";
        } 
    }else {
        echo "<div style='padding: 10px;' >";
        echo "<img style='width: 80%; margin-left: 15px;' src='assets/images/empty-stock-placeholder.png' />";
        echo "<h5 style='margin-top: 15px; margin-left: 15px;'>Ainda não há nada cadastrado no estoque</h5>";
        echo "</div>";
    }       
    

?>