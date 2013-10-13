<?php
    //$this->log($_SESSION['Usuario']);
    //$this->log($_SESSION['Google']);
?>
<html>
    <head>
            <meta charset="utf-8">
            <title>.:: UCABsocial ::.</title>
            <link rel="stylesheet" href="Source">        
            <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Varela+Round">
            <!--[if lt IE 9]>
                    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
            <![endif]-->
            <script type="text/javascript">
                $(document).ready(function(){
                    $('#facebook').click(function(e){
                        $.oauthpopup({
                            path: 'Home/login',
                            width:600,
                            height:300,
                            callback: function(){
                                //window.location.reload();
                            }
                        });
                        e.preventDefault();
                    });                   
                });
            </script>            
    </head>
    <body>
        <div class="container" style="padding-top: 80px;"> 
            
        <div class="login">
          <div class="login-screen">
            <div class="login-icon">
              <img src="img/login/smile.png" alt="UCABsocial" />
              <h4>Bienvenido a <small>UCABsocial</small></h4>
            </div>

              <div class="login-form">
                <div class="form-group">
                  <input type="text" class="form-control login-field" value="" placeholder="Username" id="login-name" />
                  <label class="login-field-icon fui-user" for="login-name"></label>
                </div>

                <div class="form-group">
                  <input type="password" class="form-control login-field" value="" placeholder="Contraseña" id="login-pass" />
                  <label class="login-field-icon fui-lock" for="login-pass"></label>
                </div>

                <a class="btn btn-primary btn-lg btn-block" href="#">Entrar</a>
                <a id="facebook" class="btn btn-info btn-lg btn-block">Entrar con Facebook</a>
                <a id="google" class="btn btn-danger btn-lg btn-block" href="Home/google_login">Entrar con Google+</a>              
                <a class="login-link" href="#"><b>¿Olvidaste tu contraseña?</b></a>
              </div>
          </div>
        </div>          
            
            <?php
$ses_user=$this->Session->read('User');
$logout=$this->Session->read('logout');

if(!$this->Session->check('User') && empty($ses_user))   {
echo $this->Html->image('facebook.png',array('id'=>'facebook','style'=>'cursor:pointer;float:left;margin-left:550px;'));
 }  else{
 
 echo '<img src="https://graph.facebook.com/'. $ses_user['id'] .'/picture" width="30" height="30"/><div>'.$ses_user['name'].'</div>';
    echo '<a href="'.$logout.'">Logout</a>';
 
}
    ?>
            
    </div>           
    </body>	
</html>