<?php
App::uses('Friend', 'Model');
class FriendTest extends CakeTestCase {

	public function setUp() {
		parent::setUp();
		// Load Friend Model
		$this->Friend = ClassRegistry::init('Friend');
	}

	public function tearDown() {
		parent::tearDown();
	}
         
	public function testListarAmigos() {
            // Invocación al método
            $data = $this->Friend->listarAmigos(35); 
            // Test Assert
            $this->assertNotEmpty($data);       
	} 
            
	public function testListarSolicitudes() {
            // Invocación al método
            $data = $this->Friend->listarSolicitudes(35); 
            // Test Assert
            $this->assertEmpty($data);       
	}        

        public function testRegistrarAmigos() {
            // Invocación al método 
            $atributos = array(
                0 => 35,
                1 => 38                
            );

            $coment = $this->Friend->agregasAmigosGrafo($atributos);        

            // Test Assert
            $this->assertEqual($coment, 0);
	} 
        
	public function testEliminarAmigos() {
            // Invocación al método 
            $atributos = array(
                0 => 35,
                1 => 38                
            ); 
            $consulta = $this->Friend->eliminarAmigo($atributos[0],$atributos[1]);           

            // Test Assert
            $this->assertEqual($consulta, 0);
	}                  
}