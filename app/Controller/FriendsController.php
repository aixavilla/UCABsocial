<?php

class FriendsController extends AppController {
    
    /*
     * Funcion que nos permite listar los amigos de un usuario en particular
     * con el this->loadModel hacemos una llamada al modelo friend para obtener el valor de 
     * $variable en la funcion listarAmigos (model)
     */
    public function listarAmigos($variable)
    {
        try{
            $this->loadModel("Friend");
            $Usuarios = $this->Friend->listarAmigos($variable);
            return $Usuarios;
        } catch (Exception $ex) {
            $this->log("");
        }
          
    }

    public function enEspera($variable, $variable2)
    {
       /*Funcion que nos permite verificar si es un amigo pendiente de aceptar*/
        $this->loadModel("Friend");
        $enEspera = $this->Friend->enEspera($variable, $variable2);
        return $enEspera;  
    }     
    
    public function listarSolicitudes($variable)
    {
       /*Funcion que nos permite listar las solicitudes de amigos de un usuario en particular
         con el this->loadModel hacemos una llamada al modelo friend para obtener el valor de 
         $variable en la funcion listarSolicitudes (model)*/
        $this->loadModel("Friend");
        $Solicitudes = $this->Friend->listarSolicitudes($variable);
        return $Solicitudes;  
    }    
    
    public function registrarAmigo() 
    {
        /*Funcion que nos permite registrar un amigo a un usuario en particular
         con el this->loadModel hacemos una llamada al modelo friend para obtener el valor de 
         $atributos en la funcion agregarAmigosGrafo (model), los URL vienen de la funcion ajax de javascript*/
        $atributos = array(
            0 => $this->params['url']['fkUsers'],
            1 => $this->params['url']['fkUsers2'],              
        );
        
        $this->loadModel("Friend");  
        $consulta = $this->Friend->agregasAmigosGrafo($atributos);
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

    public function eliminarAmigoGrafo()
   {
       $atributos = array(
           0 => $this->params['url']['fkUsers'],
           1 => $this->params['url']['fkUsers2'],              
       );
       
       $this->loadModel("Friends");
       
       $consulta = $this->Friend->eliminarAmigo($atributos[0],$atributos[1]);
       if($consulta != 1)
       {
           $response = 1;
           echo ("amistad eliminada");
           }
       else 
       {
           $response = 0;
           echo ("amistad no existe");
       }
       $this->set('respuesta', $response);                 
       $this->layout = 'ajax';
       
    }
    
    public function aceptarAmigo() 
    {
        /*Funcion que nos permite aceptar como amigo a un usuario en particular
         con el this->loadModel hacemos una llamada al modelo friend para obtener el valor de 
         $atributos en la funcion aceptarAmigos (model), los URL vienen de la funcion ajax de javascript*/
        $atributos = array(
            0 => $this->params['url']['fkUsers'],
            1 => $this->params['url']['fkUsers2'],              
        );
        
        $this->loadModel("Friend");  
        $consulta = $this->Friend->aceptarAmigos($atributos);
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
    
    public function rechazarAmigo() 
    {
        /*Funcion que nos permite rechazar la solicitud de amistad de un usuario en particular
         con el this->loadModel hacemos una llamada al modelo friend para obtener el valor de 
         $atributos en la funcion rechazarAmigos (model), los URL vienen de la funcion ajax de javascript*/
        $atributos = array(
            0 => $this->params['url']['fkUsers'],
            1 => $this->params['url']['fkUsers2'],              
        );
        
        $this->loadModel("Friend");  
        $consulta = $this->Friend->rechazarAmigos($atributos);
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
