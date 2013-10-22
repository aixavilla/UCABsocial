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
       $this->loadModel("City");
       $resultado = $this->City->getLocations();
       $this->Session->write('lugares',$resultado);
    }   
}

?>
