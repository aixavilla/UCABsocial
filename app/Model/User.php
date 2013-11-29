    <?php

    App::uses('AppModel', 'Model');
    class User extends AppModel 
    {  
         public $name = 'User';

        public function getPerfil($variable)
        {
            try
            {
                return $this->query("SELECT * from users where username = '".$variable."';");
            }
            catch (Exception $excep)
            {
                $this->log("Se produjo un error tratando de obtener los datos del perfil del Usuario ".$variable."- La exccepcion es: "+$excep->getMessage());
                throw new Exception('Error obteniendo los datos del perfil');      
            }             
        }

        public function getUser($variable)
        {
            try
            {
                return $this->query("SELECT * from users where facebookid = ".$variable.";");
            }
            catch (Exception $excep)
            {
                $this->log("Se produjo un error tratando de obtener la informacion del Usuario ".$variable."- La exccepcion es: "+$excep->getMessage());
                throw new Exception('Error obteniendo los datos del usuario');     
            }             
        }        
        
        public function validateUsername($variable)
        {
            try
            {
                return $this->query("SELECT id from users where username = '".$variable."';");
            }
            catch (Exception $excep)
            {
                $this->log("Se produjo un error tratando de validar la existencia del nombre de usuario ".$variable."- La exccepcion es: "+$excep->getMessage());
                throw new Exception('Error validando el nombre de usuario');      
            }             
        } 
        
        public function nombreAmigos($variable)
        {
            try
            {
                return $this->query("select * from users where id =".$variable.";");
            }
            catch (Exception $excep)
            {
                $this->log("Se produjo un error tratando de obtener los datos de los amigos del Usuario ".$variable."- La exccepcion es: "+$excep->getMessage());
                throw new Exception('Error obteniendo los ndatos de los amigos');      
            }             
        }
        
        public function usuariosCompletos()
        {
            try
            {
                return $this->query("select * from users");
            }
            catch (Exception $excep)
            {
                $this->log("Se produjo un error tratando de obtener el listado de solicitudes de amista para el Usuario ".$variable."- La exccepcion es: "+$excep->getMessage());
                throw new Exception('Error obteniendo el listado de usuarios de la red social');     
            }             
        }
        
        public function getNombresUsuarios($variable)
        {
            try
            {
                /*Busca los usuarios registrados en la red social segun un rango de campos especificos por el usuario registrado*/
                return $this->query("SELECT U.ID, U.nombre, U.nombre2, U.apellido, U.apellido2, U.username, U.foto FROM users U WHERE 
               (U.nombre LIKE '%".$variable."%' OR U.nombre2 LIKE '%".$variable."%' OR U.apellido LIKE '%".$variable."%' OR apellido2 LIKE '%".$variable."%');");
            }
            catch (Exception $excep)
            {
                $this->log("Se produjo un error tratando de obtener los nombres y apellidos del Usuario ".$variable."- La exccepcion es: "+$excep->getMessage());
                throw new Exception('Error obteniendo los nombres y apellidos del usuario');      
            }             
        }        
        
        public function registrarUsuario($atributos)
        {
            try
            {
                $this->query("INSERT INTO users (nombre, nombre2, apellido, apellido2, username, email, birthday, genero, ubicacion, privacidad, created, modified, facebookid, googleid, foto, urlFacebook) VALUES ('".$atributos[0]."','".$atributos[1]."','".$atributos[2]."','".$atributos[3]."','".$atributos[6]."','".$atributos[7]."','".$atributos[5]."','".$atributos[4]."','".$atributos[8]."', 'Público', NOW(), NULL,'".$atributos[9]."',NULL, '".$atributos[10]."', '".$atributos[11]."');");
                return $this->query("SELECT MAX(ID) FROM users;");   
            }
            catch (Exception $excep)
            {
                $this->log("Se produjo un error tratando de registrar al Usuario ".$atributos[1]."- La exccepcion es: "+$excep->getMessage());
                throw new Exception('Error registrando al usuario');      
            }             
        } 
        
        public function editarUsuario($atributos)
        {
            try
            {
                $valor = $this->query("UPDATE users SET nombre='".$atributos[0]."', nombre2='".$atributos[1]."', apellido='".$atributos[2]."', apellido2='".$atributos[3]."', username='".$atributos[6]."', email='".$atributos[7]."', telefono='".$atributos[10]."', birthday='".$atributos[5]."', genero='".$atributos[4]."', descripcion='".$atributos[9]."', ubicacion='".$atributos[8]."', privacidad='".$atributos[11]."', modified=NOW(), urlFacebook='".$atributos[12]."', urlTwitter='".$atributos[13]."', urlLinkedin='".$atributos[14]."' WHERE id = ".$atributos[15].";");              
                return $valor;
            }
            catch (Exception $excep)
            {
                $this->log("Se produjo un error tratando de editar el perfil del Usuario ".$atributos[1]."- La exccepcion es: "+$excep->getMessage());
                throw new Exception('Error editando el perfil del usuario');      
            }             
         
        }        
    }
?>