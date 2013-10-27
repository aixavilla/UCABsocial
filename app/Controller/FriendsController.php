<?php

class FriendsController extends AppController {
    
    public function listarAmigos($variable)
    {
        $this->loadModel("Friend");
        $Usuarios = $this->Friend->listarAmigos($variable);
        return $Usuarios;  
    }
    
    public function listarSolicitudes($variable)
    {
        $this->loadModel("Friend");
        $Solicitudes = $this->Friend->listarSolicitudes($variable);
        return $Solicitudes;  
    }    
    
    public function registrarAmigo() 
    {
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
        $amigo = $this->Friend->eliminarAmigo($atributos[0],$atributos[1]);
        if(isset($amigo))
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
