<?php
 App::uses('AppModel', 'Model');
    class Album extends AppModel {
        public $name = 'Album';
    
        public function listarAlbums($variable)
        {
            return $this->query("SELECT * FROM albums where (fkUsers = ".$variable.");");       
        }
        
        
        public function agregarNuevoAlbum($atributos)
        {
          if($this->query("INSERT INTO albums (created, nombre, privacidad, fkUsers) VALUES (NOW(), '".$atributos[0]."', '".$atributos[1]."',".$atributos[2].");"))
          {
              return 1;
          }
          else
          {
             return 0;      
          }
        }
        
   


        public function eliminarAlbum($idUser,$nameAlbum,$idAlbum)
        {
            $this->query("delete from albums where ((fkUsers = ".$idUser.") and  (nombre = '".$nameAlbum."') and (id = ".$idAlbum."));");       
        }
                
    }
                
?>
