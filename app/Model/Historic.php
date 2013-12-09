<?php
App::uses('AppModel', 'Model');
class Historic  extends AppModel{
    var $name = 'Historic';

        public function agregarHistoric($valorAlbum, $idRecordAgregado)
        {    
            try
            {
                if($this->query("INSERT INTO historics (created, fkAlbums, fkRecords) VALUES(NOW(),".$valorAlbum.",".$idRecordAgregado.");"))
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
                $this->log("Se produjo un error registrando el contenido en el histórico del album - La exccepcion es: "+$excep->getMessage());
                throw new Exception('Error agregando nuevo histórico de un album');    
            }        
        }     
    
}

?>
