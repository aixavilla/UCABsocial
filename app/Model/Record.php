<?php

class Record  extends AppModel{
    var $name = 'Record';
    
    public function agregarNuevoRecord($atributos)
        { 
            try
            {  $agrego = 0;
                for ( $i=0; $i < count($atributos); $i++ ){
                    $idRecordAgregado = 0;

                    // asi es como creo que se deberia hacer aunq no se xq no funciona 
                    /*    $datos = array("Records"=> array (
                                "id" => NULL,
                                "descripcion" => NULL,
                                "url" => $atributos[$i][0],
                                "status" => NULL,
                                "modified" => NULL
                                ));
                        $this->create();
                        $this->save($datos);

                    $idRecordAgregado = $this->getLastInsertId();

                    $datosH = array("Historics"=> array (
                                "fkAlbums" => $atributos[$i][1],
                                "fkRecords" => $idRecordAgregado
                                ));
                    $this->Historic = ClassRegistry::init('Historic');
                    $this->Historic->create();
                    $this->Historic->save($datosH);*/

                    if($this->query("INSERT INTO records VALUES(NULL,NULL,'".$atributos[$i][0]."',NULL,NOW(),NULL);"))
                    {
                        $idRecordAgregado = 6;

                    }
                    else{
                        return 0;
                    }

                    if ($idRecordAgregado != 0){
                    	if($this->query("INSERT INTO historics VALUES(NOW(),NULL,'".$atributos[$i][1]."','".$idRecordAgregado."');")){
                            //$agrego++;
                            return 1;
                        }
                        else{
                        	return 0;
                        }
                    }
                }
                //if($agrego==count($atributos))
                  //  return 1;
            }
            catch (Exception $excep)
            {
                $this->log("Se produjo un error registrando el record en el sistema - La exccepcion es: ");
                throw new Exception('Error agregando nuevos albums');    
            }
        }  
        
        
        public function agregarRecord($atributos)
        {    
            try
            {
                if($this->query("INSERT INTO records (descripcion, url, status, created) VALUES ('".$atributos[1]."', '".$atributos[0]."', 'Activo', NOW());"))
                {                   
                    return 1;                   
                }
                else
                {
                    return 0;
                }
            }
            catch (Exception $excep)
            {
                $this->log("Se produjo un error registrando el contenido en el album - La exccepcion es: "+$excep->getMessage());
                throw new Exception('Error agregando nuevos albums');    
            }        
        } 
        
        public function maximoRecord()
        {  
            try
            {
                return $this->query("SELECT MAX(id) FROM records;");
            }
            catch (Exception $excep)
            {
                $this->log("Se produjo un error tratando de obtener el maximo Record Insertado - La exccepcion es: "+$excep->getMessage());
                throw new Exception('Error obteniendo los datos del maximo record insertado');     
            }        
        }        
    
}

?>
