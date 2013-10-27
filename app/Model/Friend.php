<?php
    App::uses('AppModel', 'Model');
    class Friend extends AppModel {
        public $name = 'Friend';

        public function listarAmigos($variable)
        {
            return $this->query("SELECT * FROM friends where (fkUsers = ".$variable." OR  fkUsers2 = ".$variable.") and (friends.pendiente='si');");       
        }
        
        public function listarSolicitudes($variable)
        {
            return $this->query("SELECT * FROM friends where (fkUsers = ".$variable." OR  fkUsers2 = ".$variable.") and (friends.pendiente='on');");       
        }        
        
        public function agregasAmigosGrafo($atributos)
        {
          if($this->query("INSERT INTO friends (created, fkUsers, fkUsers2, pendiente) VALUES (NOW(), ".$atributos[0].",".$atributos[1].",'no');"))
          {
              return 1;
            }
           else
            {
             return 0;      
            }
        }

        public function eliminarAmigo($variable,$variable2)
        {
            $this->query("delete from friends where (fkUsers = ".$variable." and  fkUsers2 = ".$variable2.") or (fkUsers2 = ".$variable." and  fkUsers = ".$variable2.");");       
        }
        
    }
?>