<?php
App::uses('Historic', 'Model');
class HistoricTest extends CakeTestCase {

	public function setUp() {
		parent::setUp();
		// Load Historic Model
		$this->Historic = ClassRegistry::init('Historic');
	}

	public function tearDown() {
		parent::tearDown();
	}
         
	public function testRegistrarHistoric() {
            // Invocación al método 
            $atributos = array(
                0 => 5,
                1 => 1             
            );

            $coment = $this->Historic->agregarHistoric($atributos[0], $atributos[1]);           

            // Test Assert
            $this->assertEqual($coment, 0);
	}            
}