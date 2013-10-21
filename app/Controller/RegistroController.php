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

        if (is_null($prueba['facebookid']))
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
    
    public function find() {
      $this->Company->recursive = -1;
      if ($this->request->is('ajax')) {
        $this->autoRender = false;
        $results = $this->City->find('all', array(
          'fields' => array('City.name'),
          //remove the leading '%' if you want to restrict the matches more
          'conditions' => array('City.name LIKE ' => '%' . $this->request->query['q'] . '%')
        ));
        foreach($results as $result) {
          echo $result['City']['name'] . "\n";
        }

      } else {
            //if the form wasn't submitted with JavaScript
        //set a session variable with the search term in and redirect to index page
        $this->Session->write('city',$this->request->data['City']['name']);
        $this->redirect(array('action' => 'formulario'));
      }
    }    
}

?>
