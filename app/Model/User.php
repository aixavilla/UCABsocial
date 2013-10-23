<?php

App::uses('AppModel', 'Model');
class User extends AppModel {  
     public $name = 'User';
     
    public function getUser($variable)
    {
        return $this->query("SELECT * from users where facebookid = ".$variable.";");
    }
     
}

?>
