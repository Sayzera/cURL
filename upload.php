<?php 

    $extension = end( preg_split('/[.+?]/',$_FILES['myimage']['name']) );
    $imgName = 'files-'.uniqid();

    move_uploaded_file($_FILES['myimage']['tmp_name'], 'download/'.$imgName.'.'.$extension);