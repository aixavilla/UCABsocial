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
                $this->Session->write('validaaate',$consulta);
        $this->set('respuesta', $consulta);                 
        $this->layout = 'ajax'; 
        
    }     
    
}

?>
