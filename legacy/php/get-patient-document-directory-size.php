<?php
    require 'conexao.php';

    $idLogin = $_SESSION['idUsuario'];
    $patient_id = $_POST['patient_id'];
    $bytestotal = 0;

    //Se a pasta documents nao existir
    if(!file_exists("../assets/documents")) {
        mkdir("../assets/documents");  
    }

    //Se a pasta patients-documents nao existir
    if(!file_exists("../assets/documents/patients-documents")) {
        mkdir("../assets/documents/patients-documents");  
    }

    if(!file_exists("../assets/documents/patients-documents/".$idLogin)) {
        mkdir("../assets/documents/patients-documents/".$idLogin);  
    }
 
    if(!file_exists("../assets/documents/patients-documents/".$idLogin.'/'.$patient_id)) {        
        mkdir("../assets/documents/patients-documents/".$idLogin.'/'.$patient_id);  
    }

    foreach(new RecursiveIteratorIterator(new RecursiveDirectoryIterator("../assets/documents/patients-documents/".$idLogin, FilesystemIterator::SKIP_DOTS)) as $object){
        $bytestotal += $object->getSize();
    }
    
    echo $bytestotal/1000000;
?>