<form method="POST" enctype="multipart/form-data">
    <input type="file" name="image">
    <input type="submit" name="sbmt" value="Post">
</form>
<?php

    if(isset($_FILES['image'])) {
        $ch = curl_init();
        $cfile = new CURLFile($_FILES['image']['tmp_name'] , $_FILES['image']['type'] , $_FILES['image']['name']);
        // gönderilecek veri adi ve dosyası 
        $data = array('myimage' => $cfile);

        curl_setopt($ch , CURLOPT_URL , 'http://localhost/crul/upload.php');
        curl_setopt($ch , CURLOPT_POST , true );
        curl_setopt($ch , CURLOPT_POSTFIELDS , $data);

        $response = curl_exec($ch);

        if($response == true) {
            echo 'file posted';
        } else {
            echo 'file not posted' . curl_error($ch);
        }
        curl_close($ch);

    }

?>