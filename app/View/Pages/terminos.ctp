<?php

    if(isset($error))
    {
        header("Location: /UCABsocial/Home/error");
        exit;        
    }

?>

<center>
    <div class="navbar navbar-inverse" style="width: 99.5%;">          
        <ul class="nav navbar-nav navbar-left"> 
          <li>
            <img src="<?php echo $this->webroot; ?>img/logoo.png" width="250" height="120">           
          </li>
        </ul>
    </div>
    
    <div style="clear: both;"></div>
    
    <h3>Terminos y Condiciones - <b>UCABsocial</b></h3>
    <div style="clear: both;"></div>  
    <div style="width: 800px; height: 600px;">
        <iframe src="../files/TermsConditionsUCABsocial.pdf" width="800px" height="600px" frameborder="1"></iframe>        
    </div>   
    
</center>

