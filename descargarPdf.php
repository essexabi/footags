<?php
if(!empty($_GET['pdf'])){
    $pdf = basename($_GET['pdf']);
    $carpeta_uploads = $_SERVER['DOCUMENT_ROOT'] . '/footags/uploads/';
    if(!empty($pdf) && file_exists($carpeta_uploads)){
        // Define headers
        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$pdf");
        header("Content-Type: application/zip");
        header("Content-Transfer-Encoding: binary");
        
        // Read the file
        readfile($carpeta_uploads);
        exit;
    }else{
        echo 'El guión no se ha subido o ha sido borrado.';
    }
}