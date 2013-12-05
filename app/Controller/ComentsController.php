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
        
            
            } catch (Exception $ex) {
                
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
        try{
            $atributos = array(
                0 => $this->params['url']['comentario'],
                1 => $this->params['url']['fkAlbums'],
                2 => $this->params['url']['fkUsers']                
            );

            $this->loadModel("Coment");
            $coment = $this->Coment->agregarComentario($atributos);
            if($coment==0)
            {
                $response = 1;
            }
            else 
            {
                $response = 0;
            }
            $this->set('respuesta', $response);                 
            $this->layout = 'ajax';
        
            
            } catch (Exception $ex) {
                
                $this->log("Se produjo un error al agregar el comentario requerido");

            }
    }    
    
}
