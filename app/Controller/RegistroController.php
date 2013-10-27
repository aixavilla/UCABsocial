<?php

class RegistroController extends AppController 
{
    public function index()
    {
        if(!isset($_SESSION['User']))
        {
            $this->redirect(array('controller' => 'Pages', 'action' => 'display'));           
        }          
        $this->layout='paginas';
        $arreglo = $this->params['url'];
        $this->loadModel('User');
        $userLogin = $this->User->find('first', array('conditions' => array('User.facebookid' => $arreglo['idUsuario'])));
        
        if (!isset($userLogin['User']['facebookid']))
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
       if(!isset($_SESSION['User']))
       {
            $this->redirect(array('controller' => 'Pages', 'action' => 'display'));           
       }        
    }     
    
   public function perfil()
   { 
       if(isset($_SESSION['User']))
       {
           $this->layout='paginas'; 
           $ses_user=$this->Session->read('User');
           $this->loadModel("User");
           $Usuario=$this->User->getUser($ses_user['id']);
           $this->Session->write('usernameConectado', $Usuario[0]['users']['username']);           
           $this->set('Usuariovista',$Usuario);
           
           App::import('Controller', 'Friends');
           $amigos = new FriendsController;
           $amigosvista = $amigos->listarAmigos($Usuario[0]['users']['id']); 
           //$this->set('AmigosVista', $amigosvista);
           
           $amigosFinal = array();
           foreach($amigosvista as $amigo)
           {
               if($amigo['friends']['fkUsers']== $Usuario[0]['users']['id'])
               {   
                    $amigosFinal[] = $amigo['friends']['fkUsers2'];
               } 
               else
               {
                   $amigosFinal[]=$amigo['friends']['fkUsers'];  
               }
            }
            $amigosGrafo = $this->amigosGrafo($amigosFinal);
            $this->Session->write('amigosG',$amigosGrafo); 
            $this->set('amigosGrafo2',$amigosGrafo);
            
           $solicitudesvista = $amigos->listarSolicitudes($Usuario[0]['users']['id']);
           
           $solicitudes = array();
           foreach($solicitudesvista as $solicitud)
           {
               if($solicitud['friends']['fkUsers']== $Usuario[0]['users']['id'])
               {   
                    $solicitudes[] = $amigo['friends']['fkUsers2'];
               } 
               else
               {
                   $solicitudes[]=$amigo['friends']['fkUsers'];  
               }
            }
            $solicitudesGrafo = $this->amigosGrafo($solicitudes);
            $this->set('solicitudesGrafo',$solicitudesGrafo);           
            
            $this->loadModel("User");
            $todosUsuario = $this->User->usuariosCompletos();
            $this->set('todos',$todosUsuario);
            
            $this->loadModel("Album");
            $albums = $this->Album->listarAlbums($Usuario[0]['users']['id']);
            $this->set('albums',$albums);            
       }          
       else 
       {
            $this->redirect(array('controller' => 'Pages', 'action' => 'display'));       
       }
    }
    
    public function formulario()
    { 
       if(isset($_SESSION['User']))
       { 
            $this->layout='paginas';             
       }         
       else
       {
            $this->redirect(array('controller' => 'Pages', 'action' => 'display'));            
       } 
    }     
    
    public function editarForm()
    { 
       if(isset($_SESSION['User']))
       { 
           $this->layout='paginas';   
           $ses_user = $this->Session->read('User');
           $this->loadModel("User");
           $Usuario = $this->User->getUser($ses_user['id']);
           $this->Session->write('perfileditar', $Usuario);
           $this->set('perfilEditar',$Usuario);            
       }         
       else
       {
            $this->redirect(array('controller' => 'Pages', 'action' => 'display'));            
       } 
    } 
    
    function auto_complete() 
    {
        $this->loadModel("User");  
        $terms = $this->User->getNombresUsuarios($this->params['url']['autoCompleteText']);       
 
        $variable = '';
        foreach($terms as $termino)
        {
            $variable = $variable.$termino['U']['nombre'].' '.$termino['U']['nombre2'].' '.$termino['U']['apellido'].' '.$termino['U']['apellido2'].'+'.$termino['U']['username']."*"; 
        }
        $respuesta = substr($variable, 0, -1);
        $friends = explode("*", $respuesta);
        $this->set('terms', $friends); 
        $this->layout = 'ajax';     
    }
    
    function amigos()
    {
        $this->layout='paginas';          
        $this->loadModel("User");  
        $terms = $this->User->getNombresUsuarios($this->params['url']['search']);       

        $this->set('friendsList', $terms);        
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
        $ses_user=$this->Session->read('User');
        $atributos = array(
            0 => $this->params['url']['nombre'],
            1 => $this->params['url']['nombreDos'],
            2 => $this->params['url']['apellido'],
            3 => $this->params['url']['apellidoDos'],
            4 => $this->params['url']['genero'],  
            5 => $new_date = date('Y-m-d',strtotime($this->params['url']['fecha'])),
            6 => $this->params['url']['username'],
            7 => $this->params['url']['correo'],   
            8 => $this->params['url']['ubicacion'],   
            9 => $ses_user['id']
        );
        
        $this->loadModel("User");  
        $consulta = $this->User->registrarUsuario($atributos);       
        if(isset($consulta[0]))
        {
            $response = $consulta[0][0]['MAX(ID)'];
        }
        else 
        {
            $response = 'Fallo';
        }
        $this->set('respuesta', $response);                 
        $this->layout = 'ajax'; 
        
    } 
    
    function editarUsuario() 
    {
        $ses_user=$this->Session->read('User');
        $atributos = array(
            0 => $this->params['url']['nombre'],
            1 => $this->params['url']['nombreDos'],
            2 => $this->params['url']['apellido'],
            3 => $this->params['url']['apellidoDos'],
            4 => $this->params['url']['genero'],  
            5 => $new_date = date('Y-m-d',strtotime($this->params['url']['fecha'])),
            6 => $this->params['url']['username'],
            7 => $this->params['url']['correo'],   
            8 => $this->params['url']['ubicacion'],   
            9 => $this->params['url']['descripcion'],
            10 => $this->params['url']['telefono'],
            11 => $this->params['url']['privacidad'],  
            12 => $this->params['url']['urlFacebook'],
            13 => $this->params['url']['urlTwitter'], 
            14 => $this->params['url']['urlLinkedin'],             
            15 => $this->params['url']['id']                
        );
        
        $this->loadModel("User");  
        $consulta = $this->User->editarUsuario($atributos);       
        if($consulta == 1)
        {
            $response = 1;
        }
        else 
        {
            $response = 'Fallo';
        }
        $this->set('respuesta', $response);                 
        $this->layout = 'ajax'; 
        
    } 
    
    public function amigosGrafo($arregloIdFriends)
    {         

        $amigosGrafo=array();
        $this->loadModel("User");
        foreach($arregloIdFriends as $amigos2)
        {
            $usuarioAmigo = $this->User->nombreAmigos($amigos2);
            $amigosGrafo []= $usuarioAmigo;
        }
        return $amigosGrafo;
    }    
}
?>