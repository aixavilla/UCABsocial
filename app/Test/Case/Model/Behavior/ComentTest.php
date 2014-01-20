<?php
App::uses('Coment', 'Model');
class ComentTest extends CakeTestCase {

	public function setUp() {
		parent::setUp();
		// Load Coment Model
		$this->Coment = ClassRegistry::init('Coment');
	}

	public function tearDown() {
		parent::tearDown();
	}
         
	public function testRegistrarComent() {
            // Invocación al método 
            $atributos = array(
                0 => "Comentario",
                1 => 5,
                2 => 35                
            );

            $coment = $this->Coment->agregarComentario($atributos);           

            // Test Assert
            $this->assertEqual($coment, 0);
	} 
        
	public function testEliminarComent() {
            // Invocación al método 
            $consulta = $this->Coment->eliminarComentario(22);            

            // Test Assert
            $this->assertEqual($consulta, 0);
	}            
}