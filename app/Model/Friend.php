<?php
    App::uses('AppModel', 'Model');
    class Friend extends AppModel {
        public $name = 'Friend';

        public function listarAmigos($variable)
        {
            return $this->query("SELECT * FROM friends where ((fkUsers = ".$variable." OR  fkUsers2 = ".$variable.") and (friends.pendiente='si'));");       
        }
        
        public function listarSolicitudes($variable)
        {
            return $this->query("SELECT * FROM friends where (fkUsers = ".$variable." OR  fkUsers2 = ".$variable.") and (friends.pendiente='no');");       
        } 
        
        public function enEspera($variable, $variable2)
        {
           $consulta = ($this->query("select id from friends where (((fkUsers = ".$variable." and  fkUsers2 = ".$variable2.") or (fkUsers2 = ".$variable." and  fkUsers = ".$variable2.")) AND (pendiente = 'no'));"));     
           
           return $consulta;
        }         
        
        public function agregasAmigosGrafo($atributos)
        {
            $consultaFriends = $this->query("INSERT INTO friends (created, fkUsers, fkUsers2, pendiente) VALUES (NOW(), ".$atributos[0].",".$atributos[1].",'no');"); 
            
            if(!empty($consultaFriends))
            {
                return $consultaFriends;
            }
            else
            {
                 return 0;      
            }
        }

       public function eliminarAmigo($variable,$variable2)
       {
           $consulta = ($this->query("select id from friends where ((fkUsers = ".$variable." and  fkUsers2 = ".$variable2.") or (fkUsers2 = ".$variable." and  fkUsers = ".$variable2."));"));
           
           if(isset($consulta[0]['friends']['id']))
           {
               $this->query("delete from friends where (fkUsers = ".$variable." and  fkUsers2 = ".$variable2.") or (fkUsers2 = ".$variable." and  fkUsers = ".$variable2.");");
           }
           else
           {
               return 1;
           }
       }
       
        public function aceptarAmigos($atributos)
        {
            $consultaFriends = $this->query("UPDATE friends SET pendiente = 'si' WHERE fkUsers = ".$atributos[0]." AND fkUsers2 = ".$atributos[1].";"); 
            
            if(!empty($consultaFriends))
            {
                return $consultaFriends;
            }
            else
            {
                 return 0;      
            }
        }
        
        public function rechazarAmigos($atributos)
        {
            $consultaFriends = $this->query("DELETE from friends WHERE fkUsers = ".$atributos[0]." AND fkUsers2 = ".$atributos[1].";"); 
            
            if(!empty($consultaFriends))
            {
                return $consultaFriends;
            }
            else
            {
                 return 0;      
            }
        }        
        
    }
?>