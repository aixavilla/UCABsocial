<?php
 App::uses('AppModel', 'Model');
    class Album extends AppModel {
        public $name = 'Album';
    
        
        public function listarAlbums($variable)
        {
            try
            {
                return $this->query("SELECT * FROM albums where (fkUsers = ".$variable.");");
            }
            catch (Exception $ex)
            {
                $this->log("Se produjo un error consultando los albums con el valor ".$variable." - La excepcion es: "+$ex->getMessage());
                throw new Exception('Error en el listar albums');
            }
          
        }
        
        public function listarImagenesAlbums($albums)
        {
            try
            {
                $data[] = array();
                foreach ($albums as $objAlbum)
                {
                    $imagenDestacada = $this->query("SELECT R.* FROM records R, historics H WHERE (H.fkAlbums = ".$objAlbum['albums']['id'].") AND (H.fkRecords = R.id) LIMIT 1;");
                    if(isset($imagenDestacada[0]['R']['url']))
                    {
                        $data[] = $imagenDestacada[0]['R']['url'];
                    }
                    else 
                    {
                        $data[] = "No hay imagen";
                    }
                }
                
                return $data;
            }
            catch (Exception $ex)
            {
                $this->log("Se produjo un error consultando las imagenes destacadas de los albums - La excepcion es: "+$ex->getMessage());
                throw new Exception('Error en el listar albums');
            }
        }        
        
        public function agregarNuevoAlbum($atributos)
        {
            try
            {
                if($this->query("INSERT INTO albums (created, nombre, privacidad, fkUsers) VALUES (NOW(), '".$atributos[0]."', '".$atributos[1]."',".$atributos[2].");"))
                {
                    return 1;
                }
                else{
                    return 0;
                }
            }
            catch (Exception $excep)
            {
                $this->log("Se produjo un error registrando el album ".$atributos[1]."en el sistema - La exccepcion es: "+$excep->getMessage());
                throw new Exception('Error agregando nuevos albums');    
            }
        }

        public function eliminarAlbum($idAlbum)
        {
            try
            {
                $this->query("delete from albums where id = ".$idAlbum.";");   
            }
            catch (Exception $excep)
            {
                $this->log("Se produjo un error eliminado el album ".$idAlbum."en el sistema - La exccepcion es: "+$excep->getMessage());
                throw new Exception('Error en el eliminar album');     
            }            
        }  
        
        public function listarContenidoAlbum($variable)
        {
            try
            {
                return $this->query("SELECT R.*, H.* FROM records R, historics H WHERE (H.fkAlbums = ".$variable.") AND (H.fkRecords = R.id);");
            }
            catch (Exception $ex)
            {
                $this->log("Se produjo un error consultando los registros del album con el valor ".$variable." - La excepcion es: "+$ex->getMessage());
                throw new Exception('Error al listar el contenido del album');
            }
        } 
        
        public function listarComentariosAlbum($variable)
        {
            try
            {
                return $this->query("SELECT C.*, U.* FROM coments C, users U WHERE (C.fkAlbums = ".$variable.") AND (C.descripcion <> 'LIKE') AND (C.descripcion <> 'UNLIKE') AND (C.fkUsers = U.id) ORDER BY C.id ASC;");
            }
            catch (Exception $ex)
            {
                $this->log("Se produjo un error consultando los comentarios del album con el valor ".$variable." - La excepcion es: "+$ex->getMessage());
                throw new Exception('Error al listar el contenido del album');
            }
          
        } 
        
        public function listarLikesAlbum($variable)
        {
            try
            {
                return $this->query("SELECT C.*, U.* FROM coments C, users U WHERE (C.fkAlbums = ".$variable.") AND (C.fkUsers = U.id) AND (C.descripcion = 'LIKE') ORDER BY C.id ASC;");
            }
            catch (Exception $ex)
            {
                $this->log("Se produjo un error consultando los likes del album con el valor ".$variable." - La excepcion es: "+$ex->getMessage());
                throw new Exception('Error al listar likes del album');
            }
        }
        
        public function listarLikesAlbumUsuario($variableAlbum, $variableUsuario)
        {
            try
            {
                return $this->query("SELECT C.*, U.* FROM coments C, users U WHERE (C.fkAlbums = ".$variableAlbum.") AND (C.fkUsers = ".$variableUsuario.") AND (C.fkUsers = U.id) AND (C.descripcion = 'LIKE') ORDER BY C.id ASC;");
            }
            catch (Exception $ex)
            {
                $this->log("Se produjo un error consultando si el usuario le ha dado like al album con el valor ".$variableAlbum." - La excepcion es: "+$ex->getMessage());
                throw new Exception('Error al listar likes del album');
            }
        } 
        
        public function procesarUnlike($variableAlbum, $variableUser, $variableValor)
        {
            try
            {
                return $this->query("UPDATE coments SET descripcion = '".$variableValor."' WHERE (fkAlbums = ".$variableAlbum.") AND (fkUsers = ".$variableUser.");");
            }
            catch (Exception $ex)
            {
                $this->log("Ocurrio un error al marcar unlike del Album - La excepcion es: "+$ex->getMessage());
                throw new Exception('Error al tildar unlike del album');
            }
        }
        
        public function insertarLike($variableAlbum, $variableUser, $variableValor)
        {
            try
            {
                return $this->query("INSERT INTO coments (descripcion, created, fkUsers, fkAlbums) VALUES ('".$variableValor."', NOW(), ".$variableUser.", ".$variableAlbum.");");
            }
            catch (Exception $ex)
            {
                $this->log("Ocurrio un error al marcar like del Album - La excepcion es: "+$ex->getMessage());
                throw new Exception('Error al tildar like del album');
            }
        }  
        
        public function listarContenidoAmigos($amigos)
        {
            try
            {
                $data[] = array();               
                foreach ($amigos as $objAmigo)
                {
                    $contenidoAmigo = $this->query("SELECT A.*, U.* FROM users U, Albums A WHERE (A.fkUsers = ".$objAmigo[0]['users']['id'].") AND (U.id = ".$objAmigo[0]['users']['id'].") ;");
                    if(isset($contenidoAmigo[0]['A']['id']))
                    {
                        $data[] = $contenidoAmigo;
                    }
                }
                
                return $data;
            }
            catch (Exception $ex)
            {
                $this->log("Se produjo un error consultando las imagenes destacadas de los albums - La excepcion es: "+$ex->getMessage());
                throw new Exception('Error en el listar albums');
            }
        }        
    }                
?>
