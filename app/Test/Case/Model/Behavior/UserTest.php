<?php
App::uses('User', 'Model');
class RUserTest extends CakeTestCase {

	public function setUp() {
		parent::setUp();
		// Load User Model
		$this->User = ClassRegistry::init('User');
	}

	public function tearDown() {
		parent::tearDown();
	}
         
	public function testgetPerfil() {
            // Invocación al método
            $data = $this->User->getPerfil('username'); 
            // Test Assert
            $this->assertNotEmpty($data);       
	}            

	public function testgetUser() {
            // Invocación al método
            $data = $this->User->getUser('834755194'); 
            // Test Assert
            $this->assertNotEmpty($data);       
	}        
        
	public function testValidateUsername() {
            // Invocación al método
            $data = $this->User->validateUsername('username'); 
            // Test Assert
            $this->assertNotEmpty($data);       
	}          

	public function testNombreUsuario() {
            // Invocación al método
            $data = $this->User->nombreAmigos(35); 
            // Test Assert
            $this->assertNotEmpty($data);       
	}          
        
	public function testUsuariosCompletos() {
            // Invocación al método
            $data = $this->User->usuariosCompletos(); 
            // Test Assert
            $this->assertNotEmpty($data);       
	}          
        
	public function testNombresDeUsuariosBuscador() {
            // Invocación al método
            $data = $this->User->getNombresUsuarios('nombre'); 
            // Test Assert
            $this->assertNotEmpty($data);       
	} 
        
	public function testRegistrarUsuario() {
            // Invocación al método 
            $atributos = array(
                0 => 'nombre uno',
                1 => 'nombre dos',
                2 => 'apellido uno',
                3 => 'apellido dos',
                4 => 'genero',  
                5 => 'fecha',
                6 => 'username',
                7 => 'email',   
                8 => 'Venezuela',   
                9 => '4839534',
                10 => 'url de la foto',
                11 => 'enlace del usuario'            
            );
  
            $consulta = $this->User->registrarUsuario($atributos);             

            // Test Assert
            $this->assertNotNull($consulta);
	}         
       
	public function testEditarUsuario() {
            // Invocación al método 
            $atributos = array(
                0 => 'nombre uno',
                1 => 'nombre dos',
                2 => 'apellido uno',
                3 => 'apellido dos',
                4 => 'genero',  
                5 => 'fecha',
                6 => 'username',
                7 => 'email',   
                8 => 'Venezuela', 
                9 => 'descripcion',
                10 => 'telefono',
                11 => 'privacidad',  
                12 => 'urlFacebook',
                13 => 'urlTwitter', 
                14 => 'urlLinkedin',             
                15 => 1              
            );
 
            $consulta = $this->User->editarUsuario($atributos);               

            // Test Assert
            $this->assertNotNull($consulta);
	}         
}