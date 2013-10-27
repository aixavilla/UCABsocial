<?php

class AlbumsController extends AppController
{
    public function listarAlbums($variable)
    {
        $this->loadModel("Album");
        $album = $this->Album->listarAlbums($variable);
        return $album;  
    }
    
    
    public function registrar() 
    {
        $atributos = array(
            0 => $this->params['url']['nombre'],
            1 => $this->params['url']['privacidad'],
            2 => $this->params['url']['fkUsers'],
        );
        
        $this->loadModel("Album");  
        $consulta = $this->Album->agregarNuevoAlbum($atributos);
        if($consulta==0)
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
    
    
    public function eliminarAlbum()
    {
        $atributos = array(
            0 => $this->params['url']['fkUsers'],
            1 => $this->params['url']['nombre'],
            2 => $this->params['url']['id'],
        );
        
        $this->loadModel("Album");
        $amigo = $this->Album->eliminarAlbum($atributos[0],$atributos[1],$atributos[2]);
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
