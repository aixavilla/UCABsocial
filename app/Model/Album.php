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
                return $this->query("SELECT R.* FROM records R, historics H WHERE (H.fkAlbums = ".$variable.") AND (H.fkRecords = R.id);");
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
                return $this->query("SELECT C.*, U.* FROM coments C, users U WHERE (C.fkAlbums = ".$variable.") AND (C.fkUsers = U.id);");
            }
            catch (Exception $ex)
            {
                $this->log("Se produjo un error consultando los comentarios del album con el valor ".$variable." - La excepcion es: "+$ex->getMessage());
                throw new Exception('Error al listar el contenido del album');
            }
          
        }         
    }                
?>
