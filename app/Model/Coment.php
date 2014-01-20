<?php
App::uses('AppModel', 'Model');
class Coment extends AppModel
{
    public $name = 'Coment';
    
    public function eliminarComentario($idComentario)
    {
        try
        {
            $this->query("delete from coments where id = ".$idComentario.";");   
        }
        catch (Exception $excep)
        {
            $this->log("Se produjo un error eliminado el comentario ".$idComentario."en el sistema - La exccepcion es: "+$excep->getMessage());
            throw new Exception('Error en el eliminar comentario');     
        }            
    }     

    public function agregarComentario($valores)
    {
        try
        {
                if( $this->query("INSERT INTO coments (descripcion, created, fkUsers, fkAlbums) VALUES ('".$valores[0]."', NOW(), ".$valores[2].", ".$valores[1].");"))
                {
                    return 1;
                }
                else{
                    return 0;
                }                       
        }
        catch (Exception $excep)
        {
            $this->log("Se produjo un error agregando el comentario en el sistema - La exccepcion es: "+$excep->getMessage());
            throw new Exception('Error en el agregar comentario');     
        }            
    } 
    
    public function ultimoComentario()
    {
        try
        {
            return $this->query("SELECT MAX(id) FROM coments");   
        }
        catch (Exception $excep)
        {
            $this->log("Se produjo un error consultando el ultimo comentario insertado - La exccepcion es: "+$excep->getMessage());
            throw new Exception('Error en el consultar ultimo comentario');     
        }         
    }
}
