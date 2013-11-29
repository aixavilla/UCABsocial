<?php 

    if(isset($error))
    {
        header("Location: /UCABsocial/Home/error");
        exit;        
    }

  if(isset($terms)) 
  { 
    echo $this->Js->object($terms); 
  } 
?>