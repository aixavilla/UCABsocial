<?php

class ComentsController extends AppController
{

     /* Con esta funcion el usuario puede eliminar un comentario.
     * El eliminarComentario, funcion que se emplea en el modelo Coment, nos retorna 
     * los valores con los que podremos realizar la eliminacion del mismo.
     * Los URL vienen de la funcion ajax de javascript
     */
    public function eliminarComentario()
    {
        try{
            $atributos = array(
                0 => $this->params['url']['codigo']
            );

            $this->loadModel("Coment");
            $this->loadModel("Notification");
            $notificacion = $this->Notification->eliminarNotificaciones($atributos[0]);            
            $coment = $this->Coment->eliminarComentario($atributos[0]);
            if(isset($coment))
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
                
                $this->log("Se produjo un error al eliminar el comentario requerido");

            }
    }
    
     /* Con esta funcion el usuario puede agregar un comentario.
     * El agregarComentario, funcion que se emplea en el modelo Coment, nos retorna 
     * tru si se agrego de forma correcta, false en caso contrario.
     * Los URL vienen de la funcion ajax de javascript
     */
    public function agregarComentario()
    {
        try
        {
            $atributos = array(
                0 => $this->params['url']['comentario'],
                1 => $this->params['url']['fkAlbums'],
                2 => $this->params['url']['fkUsers']                
            );

            $this->loadModel("User");
            $amigo = $this->User->nombreAmigos($atributos[2]);            
            if($this->params['url']['comentario'] == "LIKE")
            {
                $mensaje = $amigo[0]['users']['nombre']." ".$amigo[0]['users']['apellido']." le gusta tu album";
            }
            else 
            {
                $mensaje = $amigo[0]['users']['nombre']." ".$amigo[0]['users']['apellido']." ha comentado tu album";
            }            
            
            $this->loadModel("Coment");
            $coment = $this->Coment->agregarComentario($atributos);
            if($coment==0)
            {
                $lastComent = $this->Coment->ultimoComentario();
                $atributosNotificacion = array(
                    0 => $mensaje,
                    1 => "comentario",
                    2 => $lastComent[0][0]['MAX(id)'],  
                    3 => $this->params['url']['fkAlbums']                  
                );       
                
                $this->loadModel("Notification");
                $notificacion = $this->Notification->agregarNotificacion($atributosNotificacion);                
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

            $this->log("Se produjo un error al agregar el comentario requerido");

        }
    }    
}
