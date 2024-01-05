<?php
include './App/model/FilesModel.php';

if(!empty(get_list_files())){
    $files = get_list_files();
}

include './App/views/files.php'; 
?>