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
    
    public function puente()
    { 
        
    }     
    
   public function perfil()
    { 
       $this->layout='paginas'; 
       
       if(isset($_SESSION['User']))
       {
           $ses_user=$this->Session->read('User');
           $this->loadModel("User");
           $Usuario=$this->User->getUser($ses_user['id']);
           $this->set('Usuariovista',$Usuario);
       }
    }
    
    public function formulario()
    { 
       $this->layout='paginas'; 
    } 
    
    function auto_complete() 
    {
        $this->loadModel("City");  
        $terms = $this->City->getLocations($this->params['url']['autoCompleteText']);       
 
        $variable = '';
        foreach($terms as $termino)
        {
            $variable = $variable.$termino['c']['Ciudad'].' - '.$termino['co']['Pais']."*"; 
        }
 
        $places = explode("*", $variable);
        $this->set('terms', $places); 
        $this->layout = 'ajax';     
    }     
    
    function validateUsername() 
    {
        $this->loadModel("User");  
        $consulta = $this->User->validateUsername($this->params['url']['username']);
        if(isset($consulta[0]))
        {
            $response = 1;
        }
        else 
        {
            $response = 0;
        }
        $this->set('respuesta', $response);                 
        $this->layout = 'ajax'; 
        
    }     
    
    function registrarUsuario() 
    {
        $atributos = array(
            0 => $this->params['url']['nombre'],
            1 => $this->params['url']['nombreDos'],
            2 => $this->params['url']['apellido'],
            3 => $this->params['url']['apellidoDos'],
            4 => $this->params['url']['genero'],  
            5 => $this->params['url']['fecha'],
            6 => $this->params['url']['username'],
            7 => $this->params['url']['correo'],   
            8 => $this->params['url']['ubicacion']              
        );
        
        $this->loadModel("User");  
        $consulta = $this->User->registrarUsuario($atributos);
        if(isset($consulta[0]))
        {
            $response = 1;
        }
        else 
        {
            $response = 0;
        }
        $this->set('respuesta', $response);                 
        $this->layout = 'ajax'; 
        
    }        
}
?>