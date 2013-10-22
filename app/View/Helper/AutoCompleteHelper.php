<?php

    class AutoCompleteHelper extends AppHelper { 
        var $helpers = array('Html','Form'); 
         
        public $update='autoCompleteDiv'; 
        public $scriptPath = 'views/helpers/auto_complete.js'; 
        private $jsIncluded = false; 
         
        function input($name, $options) { 
            #-- Identify the div to show the results 
            $baseOptions = array( 
                'update'=>$this->update, 
                'label'=>false, 
                'autoCompleteText'=>1, 
            ); 
            $options = array_replace($baseOptions,$options); 
            $html = ''; 
             
            #-- Add the javascript 
            if(!$this->jsIncluded) { 
                $html .= $this->Html->script($this->scriptPath,array('inline'=>true)); 
            } 
            $this->jsIncluded=true; 
             
            #-- Return the html 
            $html .= $this->Form->input( $name, $options ); 
            $html .= $this->Html->div('','',array('id'=>$options['update'],'class'=>'autoCompleteDiv')); 
            //debug($options['update']); 
            return $html; 
        } 
    } 
