<?php 

    if(isset($error))
    {
        header("Location: /UCABsocial/Home/error");
        exit;        
    }

  if(isset($respuesta)) { 
    echo $this->Js->object($respuesta); 
  } 
?>