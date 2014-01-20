<?php
App::uses('Notification', 'Model');
class AlbumTest extends CakeTestCase {

	public function setUp() {
		parent::setUp();
		// Load Album Model
		$this->Notification = ClassRegistry::init('Notification');
	}

	public function tearDown() {
		parent::tearDown();
	}

	public function testListarNotificaciones() {
            // Invocación al método
            $data = $this->Notification->listarNotificaciones(35); 
            // Test Assert
            $this->assertNotEmpty($data);   
	} 
       
}