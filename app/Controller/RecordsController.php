<?php

class RecordsController extends AppController
{    
    /*
     * Funcion que usamos para crear un nuevo record.
     *  Los URL vienen de la funcion ajax de javascript
     */
    public function guardarFotos() 
    {
        try
        {
            $atributos = array(
                0 => $this->params['url']['urlFoto'],
                1 => $this->params['url']['descripcion'],
                2 => $this->params['url']['fkAlbums']                
            );     
            
            $this->loadModel("Record"); 
            $consulta = $this->Record->agregarRecord($atributos);
            $idRecordAgregado = $this->Record->maximoRecord(); 
            
            $this->loadModel("Historic"); 
            $valorAlbum = $atributos[2];           
            $consultaHisto = $this->Historic->agregarHistoric($valorAlbum, $idRecordAgregado[0][0]['MAX(id)']);            
            
            if(($consulta == 1) && ($consultaHisto == 1))
            {
                $response = 1;
            }
            else 
            {
                $response = 0;
            }

            $this->set('respuesta', $response);                 
            $this->layout = 'ajax';            
        } 
        catch (Exception $ex) {
            
             $this->log("No se puedo crear el record nuevo");
        }
    }

    public function buscar_fotos(){

    }  
    
    public function guardarVideos() 
    {
        try
        {
            $atributos = array(
                0 => $this->params['url']['urlVideo'],
                1 => $this->params['url']['descripcion'],
                2 => $this->params['url']['fkAlbums']                
            );     
            
            $this->loadModel("Record"); 
            $consulta = $this->Record->agregarRecord($atributos);
            $idRecordAgregado = $this->Record->maximoRecord(); 
            
            $this->loadModel("Historic"); 
            $valorAlbum = $atributos[2];           
            $consultaHisto = $this->Historic->agregarHistoric($valorAlbum, $idRecordAgregado[0][0]['MAX(id)']);            
            
            if(($consulta == 1) && ($consultaHisto == 1))
            {
                $response = 1;
            }
            else 
            {
                $response = 0;
            }

            $this->set('respuesta', $response);                 
            $this->layout = 'ajax';            
        } 
        catch (Exception $ex) {
            
             $this->log("No se puedo crear el record nuevo");
        }
    }    
    
    
    public function guardarMusica() 
    {
        try
        {
            $atributos = array(
                0 => $this->params['url']['urlMusica'],
                1 => $this->params['url']['descripcion'],
                2 => $this->params['url']['fkAlbums']                
            );     
            
            $this->loadModel("Record"); 
            $consulta = $this->Record->agregarRecord($atributos);
            $idRecordAgregado = $this->Record->maximoRecord(); 
            
            $this->loadModel("Historic"); 
            $valorAlbum = $atributos[2];           
            $consultaHisto = $this->Historic->agregarHistoric($valorAlbum, $idRecordAgregado[0][0]['MAX(id)']);            
            
            if(($consulta == 1) && ($consultaHisto == 1))
            {
                $response = 1;
            }
            else 
            {
                $response = 0;
            }

            $this->set('respuesta', $response);                 
            $this->layout = 'ajax';            
        } 
        catch (Exception $ex) {
            
             $this->log("No se puedo crear el record nuevo");
        }
    }     
}

?>