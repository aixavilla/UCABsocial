<?php
    App::uses('AppModel', 'Model');
    class Friend extends AppModel {
        public $name = 'Friend';

        public function listarAmigos($variable)
        {
            try
            {
                return $this->query("SELECT * FROM friends where ((fkUsers = ".$variable." OR  fkUsers2 = ".$variable.") and (friends.pendiente='si'));"); 
            }
            catch (Exception $excep)
            {
                $this->log("Se produjo un error tratando de obtener el listado de amigos del Usuario ".$variable."- La exccepcion es: "+$excep);
                throw new Exception('Error en el listar amigos');      
            }            
        }
        
        public function listarSolicitudes($variable)
        {
            try
            {
                return $this->query("SELECT * FROM friends where (fkUsers = ".$variable." OR  fkUsers2 = ".$variable.") and (friends.pendiente='no');");       
            }
            catch (Exception $excep)
            {
                $this->log("Se produjo un error tratando de obtener el listado de solicitudes de amista para el Usuario ".$variable."- La exccepcion es: "+$excep);
                throw new Exception('Error listando solicitudes de amistad');     
            }            
        } 
        
        public function enEspera($variable, $variable2)
        {
            try
            {
                $consulta = ($this->query("select id from friends where (((fkUsers = ".$variable." and  fkUsers2 = ".$variable2.") or (fkUsers2 = ".$variable." and  fkUsers = ".$variable2.")) AND (pendiente = 'no'));"));     
                return $consulta;
            }
            catch (Exception $excep)
            {
                $this->log("Se produjo un error tratando de obtener el listado de solicitudes pendientes de aprobacion para el Usuario ".$variable."- La exccepcion es: "+$excep);
                throw new Exception('Error obteniendo solicitudes en espera');      
            }             
        }         
        
        public function agregasAmigosGrafo($atributos)
        {
            try
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
            catch (Exception $excep)
            {
                $this->log("Se produjo un error tratando de insertar un amigo para el Usuario ".$atributos[0]."- La exccepcion es: "+$excep);
                throw new Exception('Error insertando amigo en la tabla friends');     
            }             
        }

       public function eliminarAmigo($variable,$variable2)
       {
            try
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
            catch (Exception $excep)
            {
                $this->log("Se produjo un error tratando de eliminar un amigo del Usuario ".$variable."- La exccepcion es: "+$excep);
                throw new Exception('Error al eliminar amigo');    
            }            
       }
       
        public function aceptarAmigos($atributos)
        {
            try
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
            catch (Exception $excep)
            {
                $this->log("Se produjo un error tratando de aceptar la de solicitud de amista para el Usuario ".$atributos[0]."- La exccepcion es: "+$excep);
                throw new Exception('Error aceptando una solicitud en el update');     
            }             
        }
        
        public function rechazarAmigos($atributos)
        {
            try
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
            catch (Exception $excep)
            {
                $this->log("Se produjo un error tratando de rechazar la solicitud de amista para el Usuario ".$atributos[0]."- La exccepcion es: "+$excep);
                throw new Exception('Error rechanzado la solicitud de amistad');    
            }             
        }              
    }
?>