<?php

class AlbumsController extends AppController
{
    /*
     * Funcion que nos retorna un arreglo con todos los albums del usuario. 
     * $variable lo obtenemos del valor que retorna el query del modelo album
     */
    public function listarAlbums($variable, $tipoAlbum)
    {
        try{
            
            $this->loadModel("Album");
            $album = $this->Album->listarAlbums($variable, $tipoAlbum);
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
            2 => $this->params['url']['fkUsers'],
            3 => $this->params['url']['tipo']);
                   
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
     * Funcion que nos retorna un arreglo con todo el contenido del album seleccionado. 
     * $variable - Representa el id del Album a listar
     */
    public function listarContenidoAlbumVideo()
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
            $this->set('comentariosAlbum', $ComentariosAlbum); 
            
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
    public function listarComentariosAlbumOtro()
    {
        try
        {
            $variable = $this->params['url']['codigo'];
            $this->loadModel("Album");
            $ComentariosAlbum = $this->Album->listarComentariosAlbum($variable);
            $this->layout = 'ajax';      
            $this->set('comentariosAlbum', $ComentariosAlbum); 
            
        } 
        catch (Exception $ex) 
        {
            $this->log("Ocurrio un error al consultar el contenido del Album");
        }     
    }  
    
    public function obtenerInstagramFeed()
    {
        header('Content-type: application/json');
        $this->layout = 'ajax'; 
        $client = "d10b95cf56094bca8b841734baadc367";
        $query = $this->params['url']['q'];
        $clnum = mt_rand(1,3);

        $api = "https://api.instagram.com/v1/tags/".$query."/media/recent?client_id=".$client;
        $url = "http://". $_SERVER["SERVER_NAME"]."/UCABsocial/Albums/obtenerInstagramFeed?q=".$query;
                
        if(function_exists('curl_init')) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL,$url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); 
            $output = curl_exec($ch);
            echo curl_error($ch);
            curl_close($ch);
            $respuesta = $output;
        } else{
            $respuesta = file_get_contents($url);
        }        
        $response = $respuesta;
        $images = array();

        if($response){
                foreach(json_decode($response)->data as $item){		
                $src = $item->images->standard_resolution->url;
                $thumb = $item->images->thumbnail->url;
                        $url = $item->link;

                $images[] = array(
                "src" => htmlspecialchars($src),
                "thumb" => htmlspecialchars($thumb),
                "url" => htmlspecialchars($url)
                );

            }
        }
        $this->set('instagramFeed', str_replace('\\/', '/', json_encode($images))); 
        //print_r(str_replace('\\/', '/', json_encode($images)));
        //die();        
    }  
    
        public function get_curl($url) {
            if(function_exists('curl_init')) {
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL,$url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_HEADER, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); 
                $output = curl_exec($ch);
                echo curl_error($ch);
                curl_close($ch);
                return $output;
            } else{
                return file_get_contents($url);
            }
        }
        
    /*
     * Funcion que nos retorna un arreglo con todos los albums del usuario. 
     * $variable lo obtenemos del valor que retorna el query del modelo album
     */
    public function listarLikesAlbum()
    {
        try
        {
            $variableAlbum = $this->params['url']['codigo'];          
            $this->loadModel("Album");
            $likesAlbum = $this->Album->listarLikesAlbum($variableAlbum);
            $this->layout = 'ajax';    
            $this->set('likesAlbum', $likesAlbum); 
            
        } catch (Exception $ex) {
            $this->log("Ocurrio un error al consultar la lista de likes del album");
        }    
    } 
    
    public function listarLikesAlbumUsuario()
    {
        try
        {
            $variableAlbum = $this->params['url']['codigo'];
            $variableUsuario = $this->params['url']['user'];            
            $this->loadModel("Album");
            $likesAlbum = $this->Album->listarLikesAlbumUsuario($variableAlbum, $variableUsuario);
            $this->layout = 'ajax';    
            $this->set('likesAlbum', $likesAlbum); 
            
        } catch (Exception $ex) {
            $this->log("Ocurrio un error al consultar de si un usario ha dado like al album");
        }    
    } 
    
        public function listarLikesAlbumUsuarioVideo()
    {
        try
        {
            $variableAlbum = $this->params['url']['codigo'];
            $variableUsuario = $this->params['url']['user'];            
            $this->loadModel("Album");
            $likesAlbum = $this->Album->listarLikesAlbumUsuario($variableAlbum, $variableUsuario);
            $this->layout = 'ajax';    
            $this->set('likesAlbum', $likesAlbum); 
            
        } catch (Exception $ex) {
            $this->log("Ocurrio un error al consultar de si un usario ha dado like al album");
        }    
    }
    
    public function listarLikesAlbumUsuarioMusica()
    {
        try
        {
            $variableAlbum = $this->params['url']['codigo'];
            $variableUsuario = $this->params['url']['user'];            
            $this->loadModel("Album");
            $likesAlbum = $this->Album->listarLikesAlbumUsuario($variableAlbum, $variableUsuario);
            $this->layout = 'ajax';    
            $this->set('likesAlbum', $likesAlbum); 
            
        } catch (Exception $ex) {
            $this->log("Ocurrio un error al consultar de si un usario ha dado like al album");
        }    
    }    
    
    public function procesarUnlike()
    {
        try
        {
            $variableAlbum = $this->params['url']['codigo'];
            $variableUsuario = $this->params['url']['user']; 
            $variableValor = $this->params['url']['valor'];
            $this->loadModel("Album");
            $respuesta = $this->Album->procesarUnlike($variableAlbum, $variableUsuario, $variableValor);
            $this->layout = 'ajax';    
            $this->set('respuesta', $respuesta); 
            
        } catch (Exception $ex) {
            $this->log("Ocurrio un error al marcar like/unlike del Album");
        }        
    }
    
    public function insertarLike()
    {
        try
        {
            $variableAlbum = $this->params['url']['codigo'];
            $variableUsuario = $this->params['url']['user']; 
            $variableValor = $this->params['url']['valor'];
            $this->loadModel("Album");
            $respuesta = $this->Album->insertarLike($variableAlbum, $variableUsuario, $variableValor);
            $this->layout = 'ajax';    
            $this->set('respuesta', $respuesta); 
            
        } catch (Exception $ex) {
            $this->log("Ocurrio un error al marcar like/unlike del Album");
        }        
    }    
}

?>
