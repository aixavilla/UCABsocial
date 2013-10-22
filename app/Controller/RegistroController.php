<?php

class RegistroController extends AppController 
{
 
    public function index()
    {
        $this->layout='paginas';
        $arreglo = $this->params['url'];
        $this->loadModel('User');
        $this->set('users' , $this->User->find('first', array('conditions' => array('User.facebookid' => $arreglo['idUsuario']))));
        $prueba = $this->User->find('first', array('conditions' => array('User.facebookid' => $arreglo['idUsuario'])));

        if (!isset($prueba['facebookid']))
        {
            $this->redirect(array('action' => 'formulario'));
        }
        else 
        {
             $this->redirect(array('action' => 'perfil'));
        }
    }
    
    public function perfil()
    { 
       $this->layout='paginas'; 
    }
    
    public function formulario()
    { 
       $this->layout='paginas'; 
    } 
    
    function auto_complete() 
    {
        $this->loadModel("City");  
        $terms = $this->City->getLocations($this->params['url']['autoCompleteText']);       
    
        $this->Session->write('queryS',$terms);
        
        $variable = '';
        foreach($terms as $termino)
        {
            $variable = $variable.$termino['c']['Ciudad'].' - '.$termino['co']['Pais']."*"; 
        }
 
        $places = explode("*", $variable);
        $this->set('terms', $places); 
        $this->layout = 'ajax';     
    }     
    
}

?>
