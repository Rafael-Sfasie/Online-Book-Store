<?php 

function upload_file($files, $allowed_exs, $path){
    $fileName = $files['name'];
    $fileTmpName = $files['tmp_name'];
    $fileError = $files['error'];

    if($fileError === 0){
        $file_ex = pathinfo($fileName, PATHINFO_EXTENSION);
        $file_ex_lc = strtolower($file_ex);

        if(in_array($file_ex_lc, $allowed_exs)){
            $new_file_name = uniqid("", true).'.'.$file_ex_lc;
            $file_upload_path = '../descarcate/'.'/'.$new_file_name;
            move_uploaded_file($fileTmpName ,$file_upload_path);
            $sm['status'] = 'success';
            $sm['data'] = $new_file_name;

            return $sm;
            
        } else {
            $em['status'] = 'error';
            $em['data'] = "Nu se opt adauga fisiere de acest tip";
            return $em;
        }

    }else{
        $em['status'] = 'error';
        $em['data'] = 'Eroare in timpul incarcarii !';

        return $em;
    }
}
?>