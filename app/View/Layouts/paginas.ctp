<?php
    $cakeDescription = '.:: UCABsocial ::.';
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>
	</title>
        <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />   
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
         <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
         <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>        
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('bootstrap');                 
		echo $this->Html->css('flat-ui'); 
		echo $this->Html->css('demo'); 
                
                echo $this->Html->script('jquery.ui.touch-punch.min');
                echo $this->Html->script('bootstrap.min');
                echo $this->Html->script('bootstrap-select');
                echo $this->Html->script('bootstrap-switch');
                echo $this->Html->script('flatui-checkbox');                
                echo $this->Html->script('flatui-radio');                
                echo $this->Html->script('jquery.tagsinput');
                echo $this->Html->script('jquery.placeholder');
                echo $this->Html->script('jquery.stacktable');
                echo $this->Html->script('application'); 
                echo $this->Html->script('oauthpopup');
                echo $this->Html->script('jquery.infinitecarousel3');                
                
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
    <![endif]-->    
</head>
<body>
    <div id="container">
            <div id="content" style="padding-top: 3px;">

                    <?php echo $this->Session->flash(); ?>

                    <?php echo $this->fetch('content'); ?>
            </div>
            <div id="footer" style="text-align: center; padding-top: 25px;">
                <h7 style="font-weight: bold; padding-top: 5px;"> UCABsocial® - Copyright - 2013 </h7>
            </div>
    </div>
</body>
</html>