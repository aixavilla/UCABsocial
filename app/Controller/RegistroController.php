<?php

class RegistroController extends AppController 
{
    /* Funcion que valida si ya estas registrado para enviar a la pagina de perfil,
     * de no estar registrado el usuario nos redirige a formulario
     */
    public function index()
    {
        try{
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
        }catch(Exception $ex){
            $this->log("Error al cargar el perfil de usuario o el formulario para unirse a la red social");
            $this->set('error',"error");
        }
    }
    
    /*
     * Funcion que nos permite redireccionar 
     */
    public function puente()
    { 
       try{
            if(!isset($_SESSION['User']))
            {
                $this->redirect(array('controller' => 'Pages', 'action' => 'display'));           
            }        
         }catch(Exception $ex){
             $this->log("Error al realizar redireccionamiento");
             $this->set('error',"error");
         }
    }
       
    /*
     * $_SEESSION evaluamos una variable de seccion y con el isset verificamos que esta variable este 
     * inicializada y no sea nula para poder cargar los datos del perfil de usuario
     */
    public function perfil()
    {
        try
        {
            if(isset($_SESSION['User']))
            {
                $this->layout='paginas'; 
                $ses_user=$this->Session->read('User');
                $this->loadModel("User");
                $Usuario=$this->User->getUser($ses_user['id']);
                $this->Session->write('usernameConectado', $Usuario[0]['users']['username']);           
                $this->set('Usuariovista',$Usuario);
              /* Una vez el usuario este autenticado cargamos los amigos del mismo, desde el controlador Friends*/
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
                 /*Cargar solicitudes de nuevas amistades del usuario registrado, creando luego de recorrer el arreglo $solicitudvista,
                  *  un arreglo final $solicitudesGrafo con todas las solcitudes validadas*/
                $solicitudesvista = $amigos->listarSolicitudes($Usuario[0]['users']['id']);

                $solicitudes = array();
                foreach($solicitudesvista as $solicitud)
                {
                    if($solicitud['friends']['fkUsers']== $Usuario[0]['users']['id'])
                    {   
                         $solicitudes[] = $solicitud['friends']['fkUsers2'];
                    } 
                 }
                 $solicitudesGrafo = $this->amigosGrafo($solicitudes);
                 $this->set('solicitudesGrafo',$solicitudesGrafo);           
                 
                 $this->loadModel("User");
                 $todosUsuario = $this->User->usuariosCompletos();
                 $this->set('todos',$todosUsuario);

                 $this->loadModel("Notification");
                 $notificacionesList = $this->Notification->listado($Usuario[0]['users']['id']);
                 $this->Session->write('asd', $notificacionesList);
                 $this->set('notificaciones',$notificacionesList);                   

                 $this->loadModel("Album");
                 $albums = $this->Album->listarAlbums($Usuario[0]['users']['id'], 'Foto');
                 $this->set('albums',$albums);
                 
                 $albumsVideo = $this->Album->listarAlbums($Usuario[0]['users']['id'], 'Video');
                 $this->set('albumsVideo',$albumsVideo); 
                 
                 $albumsMusica = $this->Album->listarAlbums($Usuario[0]['users']['id'], 'Musica');
                 $this->set('albumsMusica',$albumsMusica);                 
                 
                 $imagenesAlbums = $this->Album->listarImagenesAlbums($albums);                
                 $this->set('imagenesAlbums',$imagenesAlbums);
                 
                 $contenidoAmigos = $this->Album->listarContenidoAmigos($amigosGrafo);            
                 $this->set('contenidoAmigos',$contenidoAmigos);

                 $data[] = array();
                 foreach($contenidoAmigos as $objContenidoAmigo)
                 {
                     if(isset($objContenidoAmigo[0]))
                     {
                         $resultRecords = $this->Album->listarContenidoAlbum($objContenidoAmigo[0]['A']['id']);
                         foreach ($resultRecords as $objRecords)
                         {                    
                             if(isset($objRecords['R']['url']))
                             {
                                 $data[] = $objRecords;
                             } 
                         }
                     }
                 }                
                 $this->set('imagenesAlbumsAmigos',$data);                  
                 
            }          
            else 
            {
                 $this->redirect(array('controller' => 'Pages', 'action' => 'display'));       
            }
        }
        catch(Exception $ex)
        {
            $this->log("Error al mostrar el perfil");
            //$this->set('error',"error");           
        }
     }
    
    /* 
     * Muestra todos los campos que se necesitan para registrar los usuarios en la base de datos
     */
    public function formulario()
    { 
       try{
        if(isset($_SESSION['User']))
        { 
            $this->layout='paginas';             
        }        
        else
        {
            $this->redirect(array('controller' => 'Pages', 'action' => 'display'));            
        } 
       }catch(Exception $ex){
           $this->log("Error al cargar el formulario de nuevo ingreso a la red social");
           $this->set('error',"error");           
       }
    }     
    
    /*
     * Funcion que nos permite al usuario editar los datos de su perfil, 
     * invocando la funcion getuser del modelo User
     */
    public function editarForm()
    { 
        try{
           if(isset($_SESSION['User']))
           { 
               $this->layout='paginas';   
               $ses_user = $this->Session->read('User');
               $this->loadModel("User");
               $Usuario = $this->User->getUser($ses_user['id']);
               $this->Session->write('perfileditar', $Usuario);
               $this->set('perfilEditar',$Usuario); 

               App::import('Controller', 'Friends');
               $amigos = new FriendsController;
               $solicitudesvista = $amigos->listarSolicitudes($Usuario[0]['users']['id']);

               $solicitudes = array();
               foreach($solicitudesvista as $solicitud)
               {
                   if($solicitud['friends']['fkUsers']== $Usuario[0]['users']['id'])
                   {   
                        $solicitudes[] = $solicitud['friends']['fkUsers2'];
                   } 
                }
                $solicitudesGrafo = $this->amigosGrafo($solicitudes);
                $this->set('solicitudesGrafo',$solicitudesGrafo);             
           }         
           else
           {
                $this->redirect(array('controller' => 'Pages', 'action' => 'display'));            
           }
        }catch(Exception $ex){
            $this->log("Error al editar el perfil del usuario");
            $this->set('error',"error");            
        }
    } 
    
    /* 
     * Funcion que nos permite en el buscador listar todos los usuarios, 
     * usando ajax para los url a la hora de hacer click en el nombre 
     * de un amigo y se nos redirija al perfil del mismo
     */
    function auto_complete() 
    {
        try{
            $this->loadModel("User");  
            $terms = $this->User->getNombresUsuarios($this->params['url']['autoCompleteText']);       

            $variable = '';
            foreach($terms as $termino)
            {
                $variable = $variable.$termino['U']['nombre'].' '.$termino['U']['nombre2'].' '.$termino['U']['apellido'].' '.$termino['U']['apellido2'].'+'.$termino['U']['username'].'+'.$termino['U']['foto']."*"; 
            }
            $respuesta = substr($variable, 0, -1);
            $friends = explode("*", $respuesta);
            $this->set('terms', $friends); 
            $this->layout = 'ajax';     
        }catch(Exception $ex){
            $this->log("Se produjo un error al intentar mostar los usuarios registrados en la red social");
           $this->set('error',"error");            
        }
    }
    
    /*
     * Invocando al modelo User obtenemos otra lista de los restultados del auto_complete
     */
    function amigos()
    {
        try{
            $this->layout='paginas';          
            $this->loadModel("User");  
            $terms = $this->User->getNombresUsuarios($this->params['url']['search']);       

            $this->set('friendsList', $terms);        
        }catch(Exception $ex){
            $this->log("Error al consultar los usuarios en la red social mediante el buscador");
            $this->set('error',"error");
        }
    }
       
    /*
     * Se valida el username del usuario invocando en el modelo User la funcion validateUsername, 
     * permitiendonos ver si ese username se encuentra disponible, o ya pertenece a otro usuario
     */
    function validateUsername() 
    {
        try{
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
        }catch(Exception $ex){
            $this->log("Error al intentar verificar si el username colocado por el usuario es valido");
            $this->set('error',"error");            
        }
        
    }     
    
    /*
     * Funcion que se encarga de registar un nuevo usuario en la red social
     */
    function registrarUsuario() 
    {
      try{
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
            9 => $ses_user['id'],
            10 => $this->params['url']['foto'],
            11 => $this->params['url']['link']            
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
      }catch(Exception $ex)
      {
          $this->log("Error al intentar realizar el registro de un nuevo usuario");
          //$this->set('error',"error");          
      }
    } 
    
    /*
     * Funcion para editar los datos del usuario
     */
    function editarUsuario() 
    {
        try{
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
            $this->Session->write('editValue', $consulta);
            if($consulta)
            {
                $response = 1;
            }
            else 
            {
                $response = 'Fallo';
            }
            $this->set('respuesta', $response);                 
            $this->layout = 'ajax'; 
        }catch(Exception $ex)
        {
            $this->log("Error producido al realizar un cambio en los datos del usuario");
            $this->set('error',"error");             
        }
        
    } 
    
    /*
     * Retorna un arreglo de amigos de un usuario en especifico $amigosgrafo[]
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
            $this->lod("Se produjo un error al cargar los amigos de el usuario registrado actualmente");           
        }
    }        
}
?>