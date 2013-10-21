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
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('bootstrap');                 
		echo $this->Html->css('flat-ui'); 
		echo $this->Html->css('demo');                 
                echo $this->Html->script('jquery-1.8.3.min');
                echo $this->Html->script('jquery-ui-1.10.3.custom.min');
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
                <h7 style="font-weight: bold; padding-top: 25px;"> Copyright UCAB </h7>
            </div>
    </div>
</body>
</html>
