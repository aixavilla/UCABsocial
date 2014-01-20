<?php
App::uses('AppModel', 'Model');
class Notification extends AppModel
{
    public $name = 'Notification';
    
    public function agregarNotificacion($valores)
    {
        try
        {
                if( $this->query("INSERT INTO notifications (mensaje, tipo, created, fkComents, fkAlbums) VALUES ('".$valores[0]."', '".$valores[1]."', NOW(), ".$valores[2].", ".$valores[3].");"))
                {
                    return 1;
                }
                else{
                    return 0;
                }                       
        }
        catch (Exception $excep)
        {
            $this->log("Se produjo un error agregando la notificacion en el sistema - La exccepcion es: "+$excep->getMessage());
            throw new Exception('Error en el agregar notificación');     
        }            
    }
    
    public function eliminarNotificaciones($idComentario)
    {
        try
        {
                if( $this->query("DELETE FROM notifications WHERE fkComents = ".$idComentario.");"))               
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
            $this->log("Se produjo un error agregando la notificacion en el sistema - La exccepcion es: "+$excep->getMessage());
            throw new Exception('Error en el agregar notificación');     
        }            
    }     
}
