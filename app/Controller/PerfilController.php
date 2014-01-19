<?php

class PerfilController extends AppController{

    /*
     * Funcion que nos permite observar el index de los amigos de un usuario con el
     * App::import('Controller', 'Friends') hacemos una referencia a la clase index
     */
    public function index()
    {
        try{
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

               if($perfilEnSession['User']['username'] == $arreglo['user'])
               {
                    $this->redirect(array('controller' => 'Registro', 'action' => 'perfil'));                
               }
               $esAmigo = 'no';
               $porAprobar = 'no';
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

                $enEspera = $amigos->enEspera($Usuario[0]['users']['id'], $perfilEnSession['User']['id']);
                $this->Session->write('porAprobar',$enEspera);
                if(isset($enEspera[0]))
                {
                    if(count($enEspera) >= 0)
                    {
                        if($enEspera[0]['friends']['id'] != 0)
                        {
                            $porAprobar = 'si';
                        }
                    }
                }
                $this->set('pendienteAprobacion',$porAprobar);

               $solicitudesvista = $amigos->listarSolicitudes($perfilEnSession['User']['id']);

               $solicitudes = array();
               foreach($solicitudesvista as $solicitud)
               {
                   if($solicitud['friends']['fkUsers']== $perfilEnSession['User']['id'])
                   {   
                        $solicitudes[] = $solicitud['friends']['fkUsers2'];
                   } 
                }
                $solicitudesGrafo = $this->amigosGrafo($solicitudes);
                $this->set('solicitudesGrafo',$solicitudesGrafo);              

                $todosUsuario = $this->User->usuariosCompletos();
                $this->set('todos',$todosUsuario);    

                $this->loadModel("Album");
                $albums = $this->Album->listarAlbums($Usuario[0]['users']['id'], 'Foto');
                $this->set('albums',$albums);   
                
                $imagenesAlbums = $this->Album->listarImagenesAlbums($albums);                 
                $this->set('imagenesAlbums',$imagenesAlbums);                 
           }          
           else 
           {
                $this->redirect(array('controller' => 'Pages', 'action' => 'display'));       
           }
        }catch(Exception $ex){
            $this->log("Error al visualizar el perfil de un usuario seleccionado");
            $this->set('error',"error");            
        }
    } 
    
    /*
     * Funcion que nos retorna un arreglo ($amigosGrafo[]),con los id de un usuario en especifico
     * haciendo una referencia al modelo User a la funcion nombreAmigos
     */
    public function amigosGrafo($arregloIdFriends)
    {
        try{
        $amigosGrafo=array();
        $this->loadModel("User");
        foreach($arregloIdFriends as $amigos2)
        {
            $usuarioAmigo = $this->User->nombreAmigos($amigos2);
            $amigosGrafo []= $usuarioAmigo;
        }
        return $amigosGrafo;
        }catch(Exception $ex){
            $this->log("Error al consultar los amigos del grafo");
        }
    }
    
    public function album() 
    {
        $this->layout='paginas'; 
        $arreglo = $this->params['url'];    
        $this->loadModel("Album");           
        $fotos = $this->Album->listarContenidoAlbum($arreglo['code']);        
    }    
}

?>
