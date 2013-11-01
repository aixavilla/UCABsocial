<?php

class AlbumsController extends AppController
{
    public function listarAlbums($variable)
    {
        /*Funcion que nos retorna un arreglo con todos los albums del usuario. 
        $variable lo obtenemos del valor que retorna el query del modelo album*/
        $this->loadModel("Album");
        $album = $this->Album->listarAlbums($variable);
        return $album;  
    }
    
    
    public function registrar() 
    {
        /*Funcion que usamos para crear un nuevo album.
        $atributos lo obtenemos en el modelo album, funcion "agregarNuevoAlbum". 
         * Los URL vienen de la funcion ajax de javascript*/
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
        /*Con esta funcion el usuario puede eliminar un album.
        El eliminarAlbum, funcion que se emplea en el modelo Album, nos retorna 
         * los valores con los que podremos realizar la eliminacion del mismo.
         Los URL vienen de la funcion ajax de javascript*/
        
        $atributos = array(
            0 => $this->params['url']['album']
        );
        
        $this->loadModel("Album");
        $album = $this->Album->eliminarAlbum($atributos[0]);
        if(isset($album))
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
