<?php

class AlbumsControllerTestClass extends PHPUnit_Framework_TestCase
{
        
        public function prueba()
        {
            $request = $this->get('/albums/insertar_like');
            // Because returnResponse() has been set to true, we can grab 
            // the response object this way, and not worry about it being 
            // autosmitted: 
            $response = $this->front->dispatch($request); 

            // Now you can test! 
            $this->assertFalse($response->isException()); // no exceptions! 

            // test that content contains certain strings 
            $this->assertContains('index page', $response->getBody()); 
        }
}
