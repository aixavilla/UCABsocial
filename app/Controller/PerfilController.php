<?php

class PerfilController extends AppController{

    public function index()
    {
        /*Funcion que nos permite observar el index de los amigos de un usuario con el
         App::import('Controller', 'Friends') hacemos una referencia a la clase index*/
       if(isset($_SESSION['User']))
       {
           $this->layout='paginas'; 
           $arreglo = $this->params['url'];
           $this->loadModel("User");           
           $Usuario = $this->User->getPerfil($arreglo['user']);
           $this->set('Usuariovista',$Usuario);
           
           App::import('Controller', 'Friends');
           $amigos = new FriendsController;
           $amigosvista = $amigos->listarAmigos($Usuario[0]['users']['id']); 
           
           $perfilEnSession = $this->Session->read('chequeo');
           $esAmigo = 'no';
           $amigosFinal = array();
           foreach($amigosvista as $amigo)
           {
               if($amigo['friends']['fkUsers']== $Usuario[0]['users']['id'])
               {   
                    $amigosFinal[] = $amigo['friends']['fkUsers2'];
               } 
               else
               {
                   $amigosFinal[] = $amigo['friends']['fkUsers'];  
               }
               
               if(($amigo['friends']['fkUsers2'] == $perfilEnSession['User']['id']) || ($amigo['friends']['fkUsers'] == $perfilEnSession['User']['id']))
               {
                   $esAmigo = 'si';
               }
            }
            $this->set('esAmigo',$esAmigo);
            $amigosGrafo = $this->amigosGrafo($amigosFinal);
            $this->Session->write('amigosG',$amigosGrafo); 
            $this->set('amigosGrafo2',$amigosGrafo);
            
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
    
    public function amigosGrafo($arregloIdFriends)
    {       
        /*Funcion que nos retorna un arreglo ($amigosGrafo[]),con los id de un usuario en especifico
         haciendo una referencia al modelo User a la funcion nombreAmigos*/
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
