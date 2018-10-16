<?php 
    class download  {
        
        protected function clearUrl($url){
            if(isset($url)) {
                if(!empty($url)) {
                   return htmlspecialchars($url);
                }
            }
        }

        protected function isUrl($url){
            if(isset($url)) {
                $url = $this->clearUrl($url);
                return $url;
            }
        }

        protected function returnExtension($url){
            $extension = @end(preg_split('/[.+?]/' , $url));
            return $extension;
            
        }

        public function downloadFile($url){
            if(isset($url)) { 
                if(!empty($url)) {
                $extension = $this->returnExtension($url);
                $url       = $this->isUrl($url);
    
                // CRUL 
                $cr = curl_init();
                curl_setopt($cr  ,  CURLOPT_URL , $url); // işlem yapılacak url 
                curl_setopt($cr  ,  CURLOPT_RETURNTRANSFER , true);
                curl_setopt($cr  ,  CURLOPT_SSL_VERIFYPEER , true);
                $curl = curl_exec($cr);
                curl_close($cr); 

                $id = md5(uniqid());
                $file = fopen("download/$id.".$extension , 'w+');
                if(fputs($file , $curl)) {
                    echo 'dosya eklendi';
                }
 
                
            }
         

        }

        }

    }

      $obj = new download();
    
    ?>
        <form method="POST">
            <input type="text" name="search">
            <input type="submit" name="btn" value="downloadFile">
        </form>

        <?php

            if($_POST) {
                $obj->downloadFile($_POST['search']);
            }
        
        ?>