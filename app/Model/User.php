    <?php

    App::uses('AppModel', 'Model');
    class User extends AppModel 
    {  
         public $name = 'User';

        public function getPerfil($variable)
        {
            return $this->query("SELECT * from users where username = '".$variable."';");
        }

        public function getUser($variable)
        {
            return $this->query("SELECT * from users where facebookid = ".$variable.";");
        }        
        
        public function validateUsername($variable)
        {
            return $this->query("SELECT id from users where username = '".$variable."';");
        } 
        
        public function nombreAmigos($variable)
        {
            return $this->query("select * from users where id =".$variable.";");
        }
        
        public function usuariosCompletos()
        {
            return $this->query("select * from users");
        }
        
        public function getNombresUsuarios($variable)
        {
            /*Busca los usuarios registrados en la red social segun un rango de campos especificos por el usuario registrado*/
        return $this->query("SELECT U.ID, U.nombre, U.nombre2, U.apellido, U.apellido2, U.username FROM Users U WHERE 
       (U.nombre LIKE '%".$variable."%' OR U.nombre2 LIKE '%".$variable."%' OR U.apellido LIKE '%".$variable."%' OR apellido2 LIKE '%".$variable."%');");
        }        
        
        public function registrarUsuario($atributos)
        {
            $this->query("INSERT INTO users (nombre, nombre2, apellido, apellido2, username, email, birthday, genero, ubicacion, privacidad, created, modified, facebookid, googleid) VALUES ('".$atributos[0]."','".$atributos[1]."','".$atributos[2]."','".$atributos[3]."','".$atributos[6]."','".$atributos[7]."','".$atributos[5]."','".$atributos[4]."','".$atributos[8]."', 'Público', NOW(), NULL,'".$atributos[9]."',NULL);");
            return $this->query("SELECT MAX(ID) FROM users;");       
        } 
        
        public function editarUsuario($atributos)
        {
            if($this->query("UPDATE users SET nombre='".$atributos[0]."', nombre2='".$atributos[1]."', apellido='".$atributos[2]."', apellido2='".$atributos[3]."', username='".$atributos[6]."', email='".$atributos[7]."', telefono='".$atributos[10]."', birthday='".$atributos[5]."', genero='".$atributos[4]."', descripcion='".$atributos[9]."', ubicacion='".$atributos[8]."', privacidad='".$atributos[11]."', modified=NOW(), urlFacebook='".$atributos[12]."', urlTwitter='".$atributos[13]."', urlLinkedin='".$atributos[14]."' WHERE id = ".$atributos[15].";"))
            {
                return 1;
            }
            else
            {
                return 0;
            }     
        }        
    }

    ?>