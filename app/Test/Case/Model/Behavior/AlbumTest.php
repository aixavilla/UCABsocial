<?php
App::uses('Album', 'Model');
class AlbumTest extends CakeTestCase {

	public function setUp() {
		parent::setUp();
		// Load Album Model
		$this->Album = ClassRegistry::init('Album');
	}

	public function tearDown() {
		parent::tearDown();
	}
        
	public function testListarAlbums() {
            // Invocación al método
            $data = $this->Album->listarAlbums(35, 'Foto'); 
            // Test Assert
            $this->assertNotEmpty($data);   
	} 

	public function testRegistrarAlbum() {
            // Invocación al método 
            $atributos = array(
            0 => "NombreAlbumNuevo",
            1 => 0,
            2 => 35,
            3 => 'Foto');
            $consulta = $this->Album->agregarNuevoAlbum($atributos);            

            // Test Assert
            $this->assertEqual($consulta, 0);
	}   
        
	public function testEliminarAlbum() {
            // Invocación al método 
            $consulta = $this->Album->eliminarAlbum(28);            

            // Test Assert
            $this->assertEqual($consulta, 0);
	}  
        
	public function testListarContenidoAlbum() {
            // Invocación al método
            $data = $this->Album->listarContenidoAlbum(5); 
            // Test Assert
            $this->assertNotEmpty($data);       
	}        
        
        public function testListarComentariosAlbum() {
            // Invocación al método
            $data = $this->Album->listarComentariosAlbum(5); 
            // Test Assert
            $this->assertNotEmpty($data);       
	}
      
        public function testListarLikesAlbum() {
            // Invocación al método
            $data = $this->Album->listarLikesAlbum(5); 
            // Test Assert
            $this->assertNotEmpty($data);       
	}        
}