<?php

class AlbumsController extends AppController
{
    /*
     * Funcion que nos retorna un arreglo con todos los albums del usuario. 
     * $variable lo obtenemos del valor que retorna el query del modelo album
     */
    public function listarAlbums($variable)
    {
        try{
            
            $this->loadModel("Album");
            $album = $this->Album->listarAlbums($variable);
            return $album;
            
        } catch (Exception $ex) {
            $this->log("Ocurrio un error al consultar la lista de albums");
        }
          
    }
    
    /*
     * Funcion que usamos para crear un nuevo album.
     *  $atributos lo obtenemos en el modelo album, funcion "agregarNuevoAlbum". 
     *  Los URL vienen de la funcion ajax de javascript
     */
    public function registrar() 
    {
        try{
            $atributos = array(
            0 => $this->params['url']['nombre'],
            1 => $this->params['url']['privacidad'],
            2 => $this->params['url']['fkUsers']);
                   
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
         
            
            } catch (Exception $ex) {
            
             $this->log("No se puedo crear el album nuevo");
            }
        
    }
    
    
    /* Con esta funcion el usuario puede eliminar un album.
     * El eliminarAlbum, funcion que se emplea en el modelo Album, nos retorna 
     * los valores con los que podremos realizar la eliminacion del mismo.
     * Los URL vienen de la funcion ajax de javascript
     */
    public function eliminarAlbum()
    {
        try{

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
        
            
            } catch (Exception $ex) {
                
                $this->log("Se produjo un error al eliminar el album requerido");

            }
    }
    
    /*
     * Funcion que nos retorna un arreglo con todo el contenido del album seleccionado. 
     * $variable - Representa el id del Album a listar
     */
    public function listarContenidoAlbum()
    {
        try
        {
            $variable = $this->params['url']['codigo'];
            $this->loadModel("Album");
            $ContenidoAlbum = $this->Album->listarContenidoAlbum($variable);
            $this->layout = 'ajax';            
            $this->set('contenidoAlbum', $ContenidoAlbum); 
            
        } 
        catch (Exception $ex) 
        {
            $this->log("Ocurrio un error al consultar el contenido del Album");
        }     
    }
    
    /*
     * Funcion que nos retorna un arreglo con todos los comentarios del album seleccionado. 
     * $variable - Representa el id del Album a listar para obtener sus comentarios
     */
    public function listarComentariosAlbum()
    {
        try
        {
            $variable = $this->params['url']['codigo'];
            $this->loadModel("Album");
            $ComentariosAlbum = $this->Album->listarComentariosAlbum($variable);
            $this->layout = 'ajax'; 
            $this->Session->write('commentarioooos', $ComentariosAlbum);     
            $this->set('comentariosAlbum', $ComentariosAlbum); 
            
        } 
        catch (Exception $ex) 
        {
            $this->log("Ocurrio un error al consultar el contenido del Album");
        }     
    }    
}

?>
