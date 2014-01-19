<?php
App::uses('Record', 'Model');
class RecordTest extends CakeTestCase {

	public function setUp() {
		parent::setUp();
		// Load Record Model
		$this->Record = ClassRegistry::init('Record');
	}

	public function tearDown() {
		parent::tearDown();
	}
         
	public function testRegistrarRecord() {
            // Invocación al método 
            $atributos = array(
                0 => "URL DE LA IMAGEN",
                1 => "DESCRIPCION DE LA IMAGEN",
                2 => 5                
            );   

            $coment = $this->Record->agregarRecord($atributos);           

            // Test Assert
            $this->assertEqual($coment, 0);
	}            
}