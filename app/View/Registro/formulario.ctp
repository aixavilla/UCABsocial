<?php
    $this->log($_SESSION['lugares']);
    $locations = $_SESSION['lugares'];
    $ses_user=$this->Session->read('User');
    
    if(isset($ses_user['first_name']))
    {
        $primerNombre = $ses_user['first_name'];        
    }
    else 
    {
        $primerNombre = '';
    }
    
    if(isset($ses_user['middle_name']))
    {
        $segundoNombre = $ses_user['middle_name'];        
    }
    else 
    {
        $segundoNombre = '';
    }
    
    if(isset($ses_user['last_name']))
    {
        $apellido = $ses_user['last_name'];    
        $apellidos = explode(" ", $apellido);
        $primerApellido = $apellidos[0];
        
        if(isset($apellidos[1]))
        {
            $segundoApellido = $apellidos[1];
        }
        else
        {
            $segundoApellido = '';
        }
    }
    else 
    {
        $primerApellido = '';
        $segundoApellido = '';        
    }
    
    if(isset($ses_user['gender']))
    {
        if($ses_user['gender'] == 'male')
        {    
            $genero = 2;
        }
        else 
        {
            $genero = 1;
        }
    }
    else 
    {
        $genero = 0;
    }
    
    if(isset($ses_user['birthday']))
    {
        $fechaNacimientoPrevia = $ses_user['birthday'];
        $fechaNacimiento = date("d-m-Y", strtotime($fechaNacimientoPrevia));        
    }
    else 
    {
        $fechaNacimiento = '';
    } 
    
    if(isset($ses_user['email']))
    {
        $email = $ses_user['email'];        
    }
    else 
    {
        $email = '';
    }    
       
?>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script type="text/javascript">
    
    (function( $ ) {
        $.widget( "custom.combobox", {
          _create: function() {
            this.wrapper = $( "<span>" )
              .addClass( "custom-combobox" )
              .insertAfter( this.element );

            this.element.hide();
            this._createAutocomplete();
            this._createShowAllButton();
          },

          _createAutocomplete: function() {
            var selected = this.element.children( ":selected" ),
              value = selected.val() ? selected.text() : "";

            this.input = $( "<input>" )
              .appendTo( this.wrapper )
              .val( value )
              .attr( "title", "" )
              .addClass( "custom-combobox-input ui-widget ui-widget-content ui-state-default ui-corner-left" )
              .autocomplete({
                delay: 0,
                minLength: 0,
                source: $.proxy( this, "_source" )
              })
              .tooltip({
                tooltipClass: "ui-state-highlight"
              });

            this._on( this.input, {
              autocompleteselect: function( event, ui ) {
                ui.item.option.selected = true;
                this._trigger( "select", event, {
                  item: ui.item.option
                });
              },

              autocompletechange: "_removeIfInvalid"
            });
          },

          _createShowAllButton: function() {
            var input = this.input,
              wasOpen = false;

            $( "<a>" )
              .attr( "tabIndex", -1 )
              .attr( "title", "Mostrar todos los elementos" )
              .tooltip()
              .appendTo( this.wrapper )

              .removeClass( "ui-corner-all" )
              .addClass( "custom-combobox-toggle ui-corner-right" )
              .mousedown(function() {
                wasOpen = input.autocomplete( "widget" ).is( ":visible" );
              })
              .click(function() {
                input.focus();

                // Close if already visible
                if ( wasOpen ) {
                  return;
                }

                // Pass empty string as value to search for, displaying all results
                input.autocomplete( "search", "" );
              });
          },

          _source: function( request, response ) {
            var matcher = new RegExp( $.ui.autocomplete.escapeRegex(request.term), "i" );
            response( this.element.children( "option" ).map(function() {
              var text = $( this ).text();
              if ( this.value && ( !request.term || matcher.test(text) ) )
                return {
                  label: text,
                  value: text,
                  option: this
                };
            }) );
          },

          _removeIfInvalid: function( event, ui ) {

            // Selected an item, nothing to do
            if ( ui.item ) {
              return;
            }

            // Search for a match (case-insensitive)
            var value = this.input.val(),
              valueLowerCase = value.toLowerCase(),
              valid = false;
            this.element.children( "option" ).each(function() {
              if ( $( this ).text().toLowerCase() === valueLowerCase ) {
                this.selected = valid = true;
                return false;
              }
            });

            // Found a match, nothing to do
            if ( valid ) {
              return;
            }

            // Remove invalid value
            this.input
              .val( "" )
              .attr( "title", value + " no produjo resultados de busqueda" )
              .tooltip( "open" );
            this.element.val( "" );
            this._delay(function() {
              this.input.tooltip( "close" ).attr( "title", "" );
            }, 2500 );
            this.input.data( "ui-autocomplete" ).term = "";
          },

          _destroy: function() {
            this.wrapper.remove();
            this.element.show();
          }
        });
      })( jQuery );    
    
    $(document).ready(function() {
        
        var valor = "<?php echo $genero; ?>";
        $('#ddlGenero').val(valor);

        $('.filter-option pull-left').html("BASURA");
          
        $("#txtFechaNacimiento").datepicker({
              changeMonth: true,
              changeYear: true,
              yearRange: "-100:+0",
              dateFormat: 'dd-mm-yy'              
         });    

        $( "#combobox" ).combobox();
        $( "#toggle" ).click(function() {
          $( "#combobox" ).toggle();
        });        
        
    });    
       
</script>

<div class="navbar navbar-inverse" style="width: 100%;">          
    <ul class="nav navbar-nav navbar-left">
      <li>
        <img src="<?php echo $this->webroot; ?>img/logoo.png" width="250" height="120">           
      </li>
    </ul>
</div>

<div id="formRegistro" style="text-align: center;" >
    <center>
        <form>
            <table>
                <tr>
                    <td>
                        <div style="padding: 1em 3em; margin: 1em 25%; ">
                            <div style="float: left;">
                                <label><b>Nombre:</b></label>
                            </div>
                            <div class="form-group" style="float: left; width: 300px; padding-left: 8px;">
                                <input id="txtNombre" type="text" value="<?php echo $primerNombre ?>" class="form-control" />
                            </div>              
                        </div>                
                    </td>
                    <td>
                        <div style="padding: 1em 3em; margin: 1em 25%; ">
                            <div style="float: left;">
                                <label><b>Segundo Nombre:</b></label>
                            </div>
                            <div class="form-group" style="float: left; width: 300px; padding-left: 8px;">
                                <input id="txtNombreDos" type="text" value="<?php echo $segundoNombre ?>" class="form-control" />
                            </div>              
                        </div>                
                    </td>
                </tr>
                <tr>
                    <td>
                        <div style="padding: 1em 3em; margin: 1em 25%; ">
                            <div style="float: left;">
                                <label><b>Apellido:</b></label>
                            </div>
                            <div class="form-group" style="float: left; width: 300px; padding-left: 8px;">
                                <input id="txtApellido" type="text" value="<?php echo $primerApellido ?>" class="form-control" />
                            </div>              
                        </div>                
                    </td>
                    <td>
                        <div style="padding: 1em 3em; margin: 1em 25%; ">
                            <div style="float: left;">
                                <label><b>Segundo Apellido:</b></label>
                            </div>
                            <div class="form-group" style="float: left; width: 300px; padding-left: 8px;">
                                <input id="txtApellidoDos" type="text" value="<?php echo $segundoApellido ?>" class="form-control" />
                            </div>              
                        </div>                 
                    </td>
                </tr>
                <tr>
                    <td>
                        <div style="padding: 1em 3em; margin: 1em 25%; ">                       
                            <div style="float: left;">
                                <label><b>Género:</b></label>
                            </div>                        
                            <div class="col-md-3" style="float: left; width: 300px;">
                              <select id="ddlGenero" name="herolist" value="Seleccione" class="select-block">
                                <option value="0">Seleccione</option>
                                <option value="1">Femenino</option>
                                <option value="2">Masculino</option>
                              </select>
                            </div>  
                        </div>                             
                    </td>
                    <td>
                        <div style="padding: 1em 3em; margin: 1em 25%; ">
                            <div style="float: left;">
                                <label><b>Fecha de Nacimiento:</b></label>
                            </div>
                            <div class="form-group" style="float: left; width: 300px; padding-left: 8px;">
                                <input id="txtFechaNacimiento" type="text" value="<?php echo $fechaNacimiento ?>" readonly="readonly" class="form-control" />
                            </div>              
                        </div>                 
                    </td>
                </tr>
                <tr>
                    <td>
                        <div style="padding: 1em 3em; margin: 1em 25%; ">
                            <div style="float: left;">
                                <label><b>Username:</b></label>
                            </div>
                            <div class="form-group" style="float: left; width: 300px; padding-left: 8px;">
                                <input id="txtUsername" type="text" value="" class="form-control" />
                            </div>              
                        </div>                    
                    </td>
                    <td>
                        <div style="padding: 1em 3em; margin: 1em 25%; ">
                            <div style="float: left;">
                                <label><b>Email:</b></label>
                            </div>
                            <div class="form-group" style="float: left; width: 300px; padding-left: 8px;">
                                <input id="txtEmail" type="text" value="<?php echo $email ?>" class="form-control" />
                            </div>              
                        </div>                 
                    </td>
                </tr>
                <tr>
                    <td>
                        <div style="padding: 1em 3em; margin: 1em 25%; ">
                            <div style="float: left;">
                                <label><b>Ubicación:</b></label>
                            </div>
                            <div class="col-md-3" style="float: left; width: 450px;">
                                <select id="combobox">
                                    <?php 
                                        foreach ($locations as $city)
                                        {
                                            echo '<option value="'.$city['c']['Codigo'].'">'.$city['c']['Ciudad'].' - '.$city['co']['Pais'].'</option>';
                                        }
                                    ?>
                                </select>
                             </div>              
                        </div>                 
                    </td>                    
                </tr>
            </table>
        </form>            
    </center>        
</div>

<div style="clear: both;"></div>