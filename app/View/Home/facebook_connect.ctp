<?php


?>
<script type="text/javascript">
        //opener.location.href = '/UCABsocial/index.php';
    //window.close();
</script>

<div class="navbar navbar-inverse" style="width: 500px;">          
    <ul class="nav navbar-nav navbar-left">
      <li>
        <img src="<?php echo $this->webroot; ?>img/logoo.png" width="250" height="120">           
      </li>
    </ul>
</div><!--/.nav -->

<center>
    <?php
        $ses_user=$this->Session->read('User');
        $logout=$this->Session->read('logout');

        if(!$this->Session->check('User') && empty($ses_user))   
        {
            echo $this->Html->image('facebook.png',array('id'=>'facebook','style'=>'cursor:pointer;float:left;margin-left:550px;'));
        }  
        else
        {
            echo '<div><div style="float: left; width:25%;"><img src="https://graph.facebook.com/'. $ses_user['id'] .'/picture" width="40" height="40"/></div>';
            echo '<div style="float: left; width:75%; text-align: left;"><h4>Hola! '.$ses_user['name'].'</h4><br/><span>Bienvenido a la Red Social Ucabista, ya puedes <br/>compartir tu contenido Multimedia favorito</span></div></div>';
          
            echo '<div style="clear:both"></div><div style="padding-top:25px;"><h4>Un último paso</h4><br/><span>Para completar tu registro por favor acepta nuestros terminos y condiciones</span></div>';
//         echo '<a href="'.$logout.'">Logout</a>';

        }
    ?>
</center>