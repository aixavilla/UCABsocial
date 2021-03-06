<?php

    if(isset($error))
    {
        header("Location: /UCABsocial/Home/error");
        exit;        
    }

    if(isset($Usuariovista[0]['users']['id']))
    {
        $idUserP = $Usuariovista[0]['users']['id'];  
    }
    else 
    {
        $idUserP = '';
    }
   
    if(isset($Usuariovista[0]['users']['nombre']))
    {
        $primernombre = $Usuariovista[0]['users']['nombre'];        
    }
    else 
    {
        $primernombre = '';
    }

    if(isset($Usuariovista[0]['users']['nombre2']))
    {
        $segundonombre = $Usuariovista[0]['users']['nombre2'];        
    }
    else 
    {
        $segundonombre = '';
    }

    if(isset($Usuariovista[0]['users']['apellido']))
    {
        $primerapellido = $Usuariovista[0]['users']['apellido'];        
    }
    else 
    {
        $primerapellido = '';
    }

    if(isset($Usuariovista[0]['users']['apellido2']))
    {
        $segundoapellido = $Usuariovista[0]['users']['apellido2'];        
    }
    else 
    {
        $segundoapellido = '';
    }

    if(isset($Usuariovista[0]['users']['username']))
    {
        $usernameUsuario = $Usuariovista[0]['users']['username'];        
    }
    else 
    {
        $usernameUsuario = '';
    }

    if(isset($Usuariovista[0]['users']['email']))
    {
        $emailUsuario = $Usuariovista[0]['users']['email'];        
    }
    else 
    {
        $emailUsuario = '';
    }

    if(isset($Usuariovista[0]['users']['birthday']))
    {
        $fechaNacimiento = date("d/m/Y", strtotime($Usuariovista[0]['users']['birthday']));        
    }
    else 
    {
        $fechaNacimiento = '';
    }

    if(isset($Usuariovista[0]['users']['descripcion']))
    {
        $descripcion = $Usuariovista[0]['users']['descripcion'];
    }
    else 
    {
        $descripcion = '';
    }    
    
    if(isset($Usuariovista[0]['users']['genero']))
    {
        $sexo = $Usuariovista[0]['users']['genero'];
    }
    else 
    {
        $sexo = '';
    }

    if(isset($Usuariovista[0]['users']['ubicacion']))
    {
        $ubicacionUsuario = $Usuariovista[0]['users']['ubicacion'];
    }
    else 
    {
        $ubicacionUsuario = '';
    }
    
    if(isset($Usuariovista[0]['users']['telefono']))
    {
        $telefonoUsuario = $Usuariovista[0]['users']['telefono'];
    }
    else 
    {
        $telefonoUsuario = '';
    }    

    if(isset($Usuariovista[0]['users']['foto']))
    {
        $imagen = $Usuariovista[0]['users']['foto'];        
    }
    else 
    {
        $imagen = '';
    }    
    
    if(isset($Usuariovista[0]['users']['urlFacebook']))
    {
        $urlFacebook = $Usuariovista[0]['users']['urlFacebook'];
    }
    else 
    {
        $urlFacebook = '';
    }    

    if(isset($Usuariovista[0]['users']['urlTwitter']))
    {
        $urlTwitter = $Usuariovista[0]['users']['urlTwitter'];
    }
    else 
    {
        $urlTwitter = '';
    }    
    
    if(isset($Usuariovista[0]['users']['urlLinkedin']))
    {
        $urlLinkedin = $Usuariovista[0]['users']['urlLinkedin'];
    }
    else 
    {
        $urlLinkedin = '';
    }   
    
    if(isset($Usuariovista[0]['users']['privacidad']))
    {
        $privacidadUsuario = $Usuariovista[0]['users']['privacidad'];
    }
    else 
    {
        $privacidadUsuario = '';
    }       
    
    $logout = $this->Session->read('logout'); 
    
    echo $this->Html->script('validCampoFranz');
    //echo $this->Html->script('ajax');
     
?>

<style>
        .dropdown {
                position:relative;
        }
        .dropdown-toggle {
                display:inline-block;
                text-decoration:none;
                -webkit-border-radius:3px;
                -moz-border-radius:3px;
                border-radius:3px;
        }
        .dropdown.open .dropdown-toggle {
                background-color:#ECF0F1;
        }
        .dropdown-menu {
                position:absolute;
                top:100%;
                left:-300%;
                display:none;
                float:right;
                min-width:150px;
                padding:10px 0;
                margin:10px 0 0;
                list-style:none;
                background-color:#ffffff;
                -webkit-background-clip:padding-box;
                -moz-background-clip:padding;
                background-clip:padding-box;
                -webkit-border-radius:3px;
                -moz-border-radius:3px;
                border-radius:3px;
        }
        .dropdown-menu li a {
                display:block;
                padding:10px 20px;
                white-space:nowrap;
                text-decoration:none;
                color:#333333;
        }
        .dropdown-menu li a:hover,.dropdown-menu li a:focus {
                text-decoration:none;
                background-color:#fde8e3;
        }
        .open {
                z-index:1000;
        }
        .open>.dropdown-menu {
                display:block;
        }  
        
        .gradientBoxesWithOuterShadows { 
            padding: 20px;
            background-color: white; 

            /* outer shadows  (note the rgba is red, green, blue, alpha) */
            -webkit-box-shadow: 0px 0px 12px rgba(0, 0, 0, 0.4); 
            -moz-box-shadow: 0px 1px 6px rgba(23, 69, 88, .5);

            /* rounded corners */
            -webkit-border-radius: 12px;
            -moz-border-radius: 7px; 
            border-radius: 7px;

            /* gradients */
            background: -webkit-gradient(linear, left top, left bottom, 
            color-stop(0%, white), color-stop(15%, white), color-stop(100%, #D7E9F5)); 
            background: -moz-linear-gradient(top, white 0%, white 55%, #D5E4F3 130%); 
        }      
        
        .autoCompleteDiv    { 
             position: absolute; 
             border: 1px solid #888; 
             margin: 0px; 
             padding: 2px; 
             display: none; 
             background: white; 
        } 
        .autoCompleteDiv a:hover { 
            background: none; 
            background-color: darkblue; 
            color: white; 
            font-weight: normal; 
        } 
        .autoCompleteDiv a { 
            background: none; 
            background-color: white; 
            color: black; 
            text-decoration: none; 
            padding: 2px; 
            margin: 0px; 
            display: block; 
        } 
        
        select#ddlPrivacidadAlbum {
        -webkit-appearance: button;
        -webkit-border-radius: 2px;
        -webkit-box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.1);
        -webkit-padding-end: 20px;
        -webkit-padding-start: 2px;
        -webkit-user-select: none;
        background-image: url(../img/icon-selectbox.png), -webkit-linear-gradient(#1ABC9C, #1ABC9C 40%, #1ABC9C);
        background-position: 97% center;
        background-repeat: no-repeat;
        border: 1px solid #AAA;
        color: #ffff;
        font-size: inherit;
        overflow: hidden;
        padding: 8px;
        text-overflow: ellipsis;
        white-space: nowrap;
        width: 290px;
        } 
        
        select#ddlPrivacidadAlbumVideo {
        -webkit-appearance: button;
        -webkit-border-radius: 2px;
        -webkit-box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.1);
        -webkit-padding-end: 20px;
        -webkit-padding-start: 2px;
        -webkit-user-select: none;
        background-image: url(../img/icon-selectbox.png), -webkit-linear-gradient(#1ABC9C, #1ABC9C 40%, #1ABC9C);
        background-position: 97% center;
        background-repeat: no-repeat;
        border: 1px solid #AAA;
        color: #ffff;
        font-size: inherit;
        overflow: hidden;
        padding: 8px;
        text-overflow: ellipsis;
        white-space: nowrap;
        width: 290px;
        } 
        
        select#ddlPrivacidadAlbumMusica {
        -webkit-appearance: button;
        -webkit-border-radius: 2px;
        -webkit-box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.1);
        -webkit-padding-end: 20px;
        -webkit-padding-start: 2px;
        -webkit-user-select: none;
        background-image: url(../img/icon-selectbox.png), -webkit-linear-gradient(#1ABC9C, #1ABC9C 40%, #1ABC9C);
        background-position: 97% center;
        background-repeat: no-repeat;
        border: 1px solid #AAA;
        color: #ffff;
        font-size: inherit;
        overflow: hidden;
        padding: 8px;
        text-overflow: ellipsis;
        white-space: nowrap;
        width: 290px;
        }        
        
        .notification-bubble {
            height: 18px;
            width: 18px;
            background: #f56c7e url(../images/notification-bg-clear.png) no-repeat center center scroll;
            background-image: none\9;
            position: absolute;
            right: 5px;
            top: -10px;
            color: #fff;
            text-shadow: 1px 1px 0 rgba(0, 0, 0, .2);
            text-align: center;
            font-size: 9px;
            line-height: 18px;
            box-shadow: inset 0 0 0 1px rgba(0, 0, 0, .17), 0 1px 1px rgba(0, 0, 0, .2);
            -moz-box-shadow: inset 0 0 0 1px rgba(0, 0, 0, .17), 0 1px 1px rgba(0, 0, 0, .2);
            -webkit-box-shadow: inset 0 0 0 1px rgba(0, 0, 0, .17), 0 1px 1px rgba(0, 0, 0, .2);
            border-radius: 9px;
            font-weight: bold;
            cursor: pointer;
            display: none;
        }
        
        #ytvideo,
        #ytvideo2 {
            float: left;
        }

        .yt_holder {
            background: #f3f3f3;
            padding: 10px;
            border: 1px solid #e3e3e3;
                margin-bottom:15px;
                min-height: 350px;
        }
        
        ul#demo2 {
            float: left;
            margin: 0;
            padding: 0;
        }

        .demo2 li {
            list-style-type: none;
            display:block;
            background: #f1f1f1;
            float: left;
            margin-bottom: 5px;
            padding:2px;
        }

        .demo2 li img {
            width: 120px;
            float: left;
            border: 1px solid #999;
        }

        .demo2 li a {
            font-weight: bold;
            text-decoration: none;
            display: block;
            color: #000;
        }

        .currentvideo {
                background: #e6e6e6;
        }      
        
        //EMPIEZA
        #sform { width: 450px; margin: 0 auto; margin-top: 25px; margin-bottom: 35px; }
        #sform #s { 
        padding: 10px 11px; 
        padding-left: 60px;
        color: #999; 
        width: 450px; 
        border: 1px solid #ddd; 
        font-size: 22px; 
        /* icon source: http://modmyi.com/forums/iphone-4-new-skins-themes-launches/723225-buuf-iphone-4-a-398.html#post6275581 */
        background: url('../img/instacam.png') 6px 7px no-repeat;
        transition: box-shadow 0.15s linear 0s, color 0.15s linear 0s;
        -webkit-transition: box-shadow 0.25s linear 0s, color 0.15s linear 0s;
        -moz-transition: box-shadow 0.25s linear 0s, color 0.15s linear 0s;
        -o-transition: box-shadow 0.25s linear 0s, color 0.15s linear 0s;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1) inset;
        -moz-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1) inset;
        -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1) inset; 
        font-family: Optima, Segoe, "Segoe UI", Candara, Calibri, Arial, sans-serif; 
        }
        #sform #s:focus { 
        color: #767676;
        border-color: #c5d7ee;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1) inset, 0 0 8px rgba(170, 200, 240, 0.9);
        -moz-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1) inset, 0 0 8px rgba(170, 200, 240, 0.9);
        -webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1) inset, 0 0 8px rgba(170, 200, 240, 0.9);
        }

        #sform #s.loading { 
                background: url('../img/loader.gif') 10px 7px no-repeat;
        }

        #photos { margin-left: 100px; text-align: center; }
        #photos .p { float: left; width: 170px; display: inline-block; position: relative; margin-right: 20px; margin-bottom: 12px; }

        #photos .p img { border-radius: 4px; -webkit-border-radius: 4px; -moz-border-radius: 4px; }

        #photos .p .fullsize { width: 32px; height: 32px; display: block; margin-left: 70px; margin-bottom: 5px; }   
        
        //EMPIEZA        
        #sformvideo { width: 450px; margin: 0 auto; margin-top: 25px; margin-bottom: 35px; }
        #sformvideo #searchField { 
        padding: 10px 11px; 
        padding-left: 60px;
        color: #999; 
        width: 450px; 
        border: 1px solid #ddd; 
        font-size: 22px; 
        /* icon source: http://modmyi.com/forums/iphone-4-new-skins-themes-launches/723225-buuf-iphone-4-a-398.html#post6275581 */
        background: url('../img/youtube.gif') 6px 7px no-repeat;
        transition: box-shadow 0.15s linear 0s, color 0.15s linear 0s;
        -webkit-transition: box-shadow 0.25s linear 0s, color 0.15s linear 0s;
        -moz-transition: box-shadow 0.25s linear 0s, color 0.15s linear 0s;
        -o-transition: box-shadow 0.25s linear 0s, color 0.15s linear 0s;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1) inset;
        -moz-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1) inset;
        -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1) inset; 
        font-family: Optima, Segoe, "Segoe UI", Candara, Calibri, Arial, sans-serif; 
        }
        #sformvideo #searchField:focus { 
        color: #767676;
        border-color: #c5d7ee;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1) inset, 0 0 8px rgba(170, 200, 240, 0.9);
        -moz-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1) inset, 0 0 8px rgba(170, 200, 240, 0.9);
        -webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1) inset, 0 0 8px rgba(170, 200, 240, 0.9);
        }

        #sformvideo #searchField.loading { 
                background: url('../img/loader.gif') 10px 7px no-repeat;
        }
        
        //EMPIEZA - Musica        
        #sformmusica { width: 450px; margin: 0 auto; margin-top: 25px; margin-bottom: 35px; }
        #sformmusica #searchFieldMusica { 
        padding: 10px 11px; 
        padding-left: 60px;
        color: #999; 
        width: 450px; 
        border: 1px solid #ddd; 
        font-size: 22px; 
        /* icon source: http://modmyi.com/forums/iphone-4-new-skins-themes-launches/723225-buuf-iphone-4-a-398.html#post6275581 */
        background: url('../img/soundcloud.png') 6px 7px no-repeat;
        transition: box-shadow 0.15s linear 0s, color 0.15s linear 0s;
        -webkit-transition: box-shadow 0.25s linear 0s, color 0.15s linear 0s;
        -moz-transition: box-shadow 0.25s linear 0s, color 0.15s linear 0s;
        -o-transition: box-shadow 0.25s linear 0s, color 0.15s linear 0s;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1) inset;
        -moz-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1) inset;
        -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1) inset; 
        font-family: Optima, Segoe, "Segoe UI", Candara, Calibri, Arial, sans-serif; 
        }
        #sformmusica #searchFieldMusica:focus { 
        color: #767676;
        border-color: #c5d7ee;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1) inset, 0 0 8px rgba(170, 200, 240, 0.9);
        -moz-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1) inset, 0 0 8px rgba(170, 200, 240, 0.9);
        -webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1) inset, 0 0 8px rgba(170, 200, 240, 0.9);
        }

        #sformmusica #searchFieldMusica.loading { 
                background: url('../img/loader.gif') 10px 7px no-repeat;
        }        
        
</style>
<script>
    
    function AceptarSolicitud(amigo) 
    {
        var valor = "<?php echo $idUserP; ?>";         
          
        $.ajax({
                url:   '/UCABsocial/Friends/aceptarAmigo?fkUsers='+valor+"&fkUsers2="+amigo,
                type:  'post',
                success:  function (response) {
                    var resultado = response;
                    if(resultado.indexOf("0") != -1)
                    {   
                        $("#spanMensajeDialogo").html('Solicitud de amistad aceptada'); 
                        $("#dialog-mensajes").dialog("open"); 
                    }
                    else
                    {                                                              
                        $("#spanMensajeDialogo").html('Se ha producido un problema al procesar el registro, por favor intentelo nuevamente');                      
                        $("#dialog-mensajes").dialog("open");
                    }                            
                }
        });            
    }    
    
    function RechazarSolicitud(amigo) 
    {
        var valor = "<?php echo $idUserP; ?>";         
          
        $.ajax({
                url:   '/UCABsocial/Friends/rechazarAmigo?fkUsers='+valor+"&fkUsers2="+amigo,
                type:  'post',
                success:  function (response) {
                    var resultado = response;
                    if(resultado.indexOf("0") != -1)
                    {  
                        $("#spanMensajeDialogo").html('Solicitud de amistad ignorada');                        
                        $("#dialog-mensajes").dialog("open"); 
                    }
                    else
                    {                                                              
                        $("#spanMensajeDialogo").html('Se ha producido un problema al procesar el registro, por favor intentelo nuevamente');                             
                        $("#dialog-mensajes").dialog("open");
                    }                            
                }
        });            
    }    
    
    function GuardarImagenAlbum() 
    {
        var valorFoto = $("#txtUrlFoto").val();
        var valorDescripcion = $("#txtDescripcionFoto").val();
        var valorAlbum = $("#txtIdAlbum").val();        
        
        $.ajax({
                url:   '/UCABsocial/Records/guardarFotos?urlFoto='+valorFoto+'&descripcion='+valorDescripcion+'&fkAlbums='+valorAlbum,
                type:  'post',
                success:  function (response) {
                    var resultado = response;
                    if(resultado.indexOf("0") != -1)
                    {  
                        $("#spanMensajeDialogoInstagram").html('Se añadió la imagen al album de manera exitosa');                        
                        $("#dialog-info-instagram").dialog("open"); 
                    }
                    else
                    {                                                              
                        $("#spanMensajeDialogoInstagram").html('Se ha producido un problema al procesar el registro, por favor intentelo nuevamente');                             
                        $("#dialog-info-instagram").dialog("open");
                    }                            
                }
        });            
    } 
    
    function GuardarVideoAlbum() 
    {
        var valorVideo = $("#txtUrlVideo").val();
        var valorDescripcion = $("#txtDescripcionVideo").val();
        var valorAlbum = $("#txtIdAlbumVideo").val();        
        
        $.ajax({
                url:   '/UCABsocial/Records/guardarVideos?urlVideo='+valorVideo+'&descripcion='+valorDescripcion+'&fkAlbums='+valorAlbum,
                type:  'post',
                success:  function (response) {
                    var resultado = response;
                    if(resultado.indexOf("0") != -1)
                    {  
                        $("#spanMensajeDialogoYoutube").html('Se añadió el vídeo al album de manera exitosa');                        
                        $("#dialog-info-youtube").dialog("open"); 
                    }
                    else
                    {                                                              
                        $("#spanMensajeDialogoYoutube").html('Se ha producido un problema al procesar el registro, por favor intentelo nuevamente');                             
                        $("#dialog-info-youtube").dialog("open");
                    }                            
                }
        });            
    }
    
    function GuardarMusicaAlbum() 
    {
        var valorMusica = $("#txtUrlMusica").val();
        var valorDescripcion = $("#txtDescripcionMusica").val();
        var valorAlbum = $("#txtIdAlbumMusica").val();        
        
        $.ajax({
                url:   '/UCABsocial/Records/guardarMusica?urlMusica='+valorMusica+'&descripcion='+valorDescripcion+'&fkAlbums='+valorAlbum,
                type:  'post',
                success:  function (response) {
                    var resultado = response;
                    if(resultado.indexOf("0") != -1)
                    {  
                        $("#spanMensajeDialogoSoundcloud").html('Se añadió la canción al album de manera exitosa');                        
                        $("#dialog-info-soundcloud").dialog("open"); 
                    }
                    else
                    {                                                              
                        $("#spanMensajeDialogoSoundcloud").html('Se ha producido un problema al procesar el registro, por favor intentelo nuevamente');                             
                        $("#dialog-info-soundcloud").dialog("open");
                    }                            
                }
        });            
    }    
    
    function BuscarPorTag()
    {
        if($("#s").val() != "")
        {
            $("#photos").empty(); 
            $("#s").addClass("loading");
            var tagSearch = $("#s").val();

            $.ajax({
                    url:   'https://api.instagram.com/v1/tags/'+tagSearch+'/media/recent?client_id=d10b95cf56094bca8b841734baadc367',
                    type:  'post',
                    contentType: "jsonp",
                    dataType: 'jsonp',                    
                    success:  function (response) {
                        $("#s").removeClass("loading");
                        $.each(response.data, function(index, item) {
                                var ncode = "<div class='p'><a href='Javascript:AbrirDialogoGuardarFoto(\""+item.images.standard_resolution.url+"\");'><img src='../img/full-image.png' alt='fullsize'></a> <a href='"+item.images.standard_resolution.url+"' target='_blank'><img src='"+item.images.standard_resolution.url+"' width='150' heigth='150'></a></div>";
                                $("#photos").append(ncode);
                        });                   
                    },
                    error: function(xhr, type, exception) { 
                            $("#s").removeClass("loading");
                            $("#photos").html("Error: " + type); 
                    }                    
            });
        }
    }   
    
    function BuscarVideoPorTag()
    {
        if($("#searchField").val() != "")
        {
            $("#videos").empty();             
            $("#searchField").addClass("loading");
            var tagSearch = $("#searchField").val();

            $.ajax({
                    url:   'http://gdata.youtube.com/feeds/api/videos?q='+tagSearch+'&alt=json',
                    type:  'post',
                    contentType: "jsonp",
                    dataType: 'jsonp',                    
                    success:  function (response) {
                        $("#searchField").removeClass("loading");
                        $.each(response.feed.entry, function(index, item) {
                            var pos = item.link[0].href.indexOf("&feature");
                            var enlace = item.link[0].href.substring(0,pos);
                            var posV = enlace.indexOf("v=");                            
                            var enlaceNew = enlace.substring(posV+2);
                            var enlaceFinal = "http://youtube.com/v/"+enlaceNew;
                            
                            var ncode = "<div style='padding-top:5px;'><embed width='320' height='180' src='"+enlaceFinal+"' type='application/x-shockwave-flash'><embed>  <a href='Javascript:AbrirDialogoGuardarVideo(\""+enlace+"\");'><img src='../img/full-image.png' alt='fullsize'></a> </div>";
                            $("#videos").append(ncode);
                        });                   
                    },
                    error: function(xhr, type, exception) { 
                            $("#searchField").removeClass("loading");
                            $("#videos").html("Error: " + type); 
                    }                    
            });
        }
    }     
    
    function BuscarMusicaPorTag()
    {
        if($("#searchFieldMusica").val() != "")
        {
            $("#canciones").empty();             
            $("#searchFieldMusica").addClass("loading");
            var tagSearch = $("#searchFieldMusica").val();

            $.ajax({
                    url:   'http://api.soundcloud.com/tracks.json?client_id=0b18852cbcb5a6e478a40b3de856f318&q='+tagSearch+'&limit=15',
                    type:  'post',
                    contentType: "jsonp",
                    dataType: 'jsonp',                    
                    success:  function (response) {
                        $("#searchFieldMusica").removeClass("loading");
                        $.each(response, function(index, item) {                                                     
                            var ncode = "<table style='width:350px; border:1px solid black; font-size:8pt;'><tr><td><img src='"+item.user.avatar_url+"' width='80' height='80'/></td><td><table><tr><td><b>Título:</b>"+item.title+"</td></tr><tr><td><b>Género:</b>"+item.genre+"</td></tr></table></td><td><center><a href='Javascript:AbrirDialogoGuardarMusica(\""+item.permalink_url+"\");'><img src='../img/full-image.png' alt='fullsize'></a></center></td></tr></table>";                            
                            $("#canciones").append(ncode);
                        });                   
                    },
                    error: function(xhr, type, exception) { 
                            $("#searchFieldMusic").removeClass("loading");
                            $("#canciones").html("Error: " + type); 
                    }                    
            });
        }
    }    
    
    function AbrirDialogo()
    {
        $("#txtNombreAlbum").val("");
        $("#dialog-agregar").dialog("open");                                                                             
    }
    
    function AbrirDialogoVideo()
    {
        $("#txtNombreAlbumVideo").val("");
        $("#dialog-agregar-video").dialog("open");                                                                             
    }
    
    function AbrirDialogoMusica()
    {
        $("#txtNombreAlbumMusica").val("");
        $("#dialog-agregar-musica").dialog("open");                                                                             
    }    
    
    function AbrirDialogoEditarAlbum(idAlbum)
    {
        $("#txtIdAlbum").val(idAlbum);      
        $.ajax({
                url:   '/UCABsocial/Albums/listarContenidoAlbum?codigo='+idAlbum,
                type:  'post',
                success:  function (response) {
                    $("#divContenidoAlbum").html(response);
                    $("#carousel").infiniteCarousel({});                    
                }
        });
        
        $.ajax({
                url:   '/UCABsocial/Albums/listarComentariosAlbum?codigo='+idAlbum,
                type:  'post',
                success:  function (response) {
                    $("#divComentarios").html(response);                    
                }
        });  
        
        var idUser = "<?php echo $idUserP; ?>"; 
        
        $.ajax({
                url:   '/UCABsocial/Albums/listarLikesAlbum?codigo='+idAlbum,
                type:  'post',
                success:  function (response) {
                    $("#divLikes").html(response);                    
                }
        });
        
        $.ajax({
                url:   '/UCABsocial/Albums/listarLikesAlbumUsuario?codigo='+idAlbum+'&user='+idUser,
                type:  'post',
                success:  function (response) {
                    $("#divImagenLikes").html(response);                    
                }
        });        
        
        $("#dialog-editar").dialog("open");                                                                             
    }
    
    function AbrirDialogoEditarAlbumVideo(idAlbum)
    {
        $("#txtIdAlbumVideo").val(idAlbum);      
        $.ajax({
                url:   '/UCABsocial/Albums/listarContenidoAlbumVideo?codigo='+idAlbum,
                type:  'post',
                success:  function (response) {
                    $("#divContenidoAlbumVideo").html(response);
                    $("ul.demo2").ytplaylist({addThumbs:true, autoPlay: false, holderId: 'ytvideo'}); 
                    //$("ul.demo2").ytplaylist();                    
                }
        });
        
        $.ajax({
                url:   '/UCABsocial/Albums/listarComentariosAlbumVideo?codigo='+idAlbum,
                type:  'post',
                success:  function (response) {
                    $("#divComentariosVideo").html(response);                    
                }
        });  
        
        var idUser = "<?php echo $idUserP; ?>"; 
        
        $.ajax({
                url:   '/UCABsocial/Albums/listarLikesAlbum?codigo='+idAlbum,
                type:  'post',
                success:  function (response) {
                    $("#divLikesVideo").html(response);                    
                }
        });
        
        $.ajax({
                url:   '/UCABsocial/Albums/listarLikesAlbumUsuarioVideo?codigo='+idAlbum+'&user='+idUser,
                type:  'post',
                success:  function (response) {
                    $("#divImagenLikesVideo").html(response);                    
                }
        });        
        
        $("#dialog-editar-video").dialog("open");                                                                             
    }    
    
    function AbrirDialogoEditarAlbumMusica(idAlbum)
    {
        $("#txtIdAlbumMusica").val(idAlbum);      
        $.ajax({
                url:   '/UCABsocial/Albums/listarContenidoAlbumMusica?codigo='+idAlbum,
                type:  'post',
                success:  function (response) {
                    $("#divContenidoAlbumMusica").html(response);
                    //$("#carousel").infiniteCarousel({});                    
                }
        });
        
        $.ajax({
                url:   '/UCABsocial/Albums/listarComentariosAlbumMusica?codigo='+idAlbum,
                type:  'post',
                success:  function (response) {
                    $("#divComentariosMusica").html(response);                    
                }
        });  
        
        var idUser = "<?php echo $idUserP; ?>"; 
        
        $.ajax({
                url:   '/UCABsocial/Albums/listarLikesAlbum?codigo='+idAlbum,
                type:  'post',
                success:  function (response) {
                    $("#divLikesMusica").html(response);                    
                }
        });
        
        $.ajax({
                url:   '/UCABsocial/Albums/listarLikesAlbumUsuarioMusica?codigo='+idAlbum+'&user='+idUser,
                type:  'post',
                success:  function (response) {
                    $("#divImagenLikesMusica").html(response);                    
                }
        });        
        
        $("#dialog-editar-musica").dialog("open");                                                                             
    }     
    
    function RecargarLikes(idAlbum, idUser)
    { 
        $.ajax({
                url:   '/UCABsocial/Albums/listarLikesAlbum?codigo='+idAlbum,
                type:  'post',
                success:  function (response) {
                    $("#divLikes").html(response);                    
                }
        });
        
        $.ajax({
                url:   '/UCABsocial/Albums/listarLikesAlbumUsuario?codigo='+idAlbum+'&user='+idUser,
                type:  'post',
                success:  function (response) {
                    $("#divImagenLikes").html(response);                    
                }
        });         
    }   
    
    function RecargarLikesVideo(idAlbum, idUser)
    { 
        $.ajax({
                url:   '/UCABsocial/Albums/listarLikesAlbum?codigo='+idAlbum,
                type:  'post',
                success:  function (response) {
                    $("#divLikesVideo").html(response);                    
                }
        });
        
        $.ajax({
                url:   '/UCABsocial/Albums/listarLikesAlbumUsuario?codigo='+idAlbum+'&user='+idUser,
                type:  'post',
                success:  function (response) {
                    $("#divImagenLikesVideo").html(response);                    
                }
        });         
    }    
    
    function RecargarLikesMusica(idAlbum, idUser)
    { 
        $.ajax({
                url:   '/UCABsocial/Albums/listarLikesAlbum?codigo='+idAlbum,
                type:  'post',
                success:  function (response) {
                    $("#divLikesMusica").html(response);                    
                }
        });
        
        $.ajax({
                url:   '/UCABsocial/Albums/listarLikesAlbumUsuario?codigo='+idAlbum+'&user='+idUser,
                type:  'post',
                success:  function (response) {
                    $("#divImagenLikesMusica").html(response);                    
                }
        });         
    }    
    
    function Like()
    {
        var idAlbum = $("#txtIdAlbum").val();
        var idUser = "<?php echo $idUserP; ?>";
        var valor = "LIKE";
        $.ajax({
                url:   '/UCABsocial/Albums/insertarLike?codigo='+idAlbum+'&user='+idUser+'&valor='+valor,
                type:  'post',
                success:  function (response) {
                    RecargarLikes(idAlbum, idUser);                   
                }
        });                                                                              
    }
    
    function LikeVideo()
    {
        var idAlbum = $("#txtIdAlbumVideo").val();
        var idUser = "<?php echo $idUserP; ?>";
        var valor = "LIKE";
        $.ajax({
                url:   '/UCABsocial/Albums/insertarLike?codigo='+idAlbum+'&user='+idUser+'&valor='+valor,
                type:  'post',
                success:  function (response) {
                    RecargarLikesVideo(idAlbum, idUser);                   
                }
        });                                                                              
    }    
    
    function LikeMusica()
    {
        var idAlbum = $("#txtIdAlbumMusica").val();
        var idUser = "<?php echo $idUserP; ?>";
        var valor = "LIKE";
        $.ajax({
                url:   '/UCABsocial/Albums/insertarLike?codigo='+idAlbum+'&user='+idUser+'&valor='+valor,
                type:  'post',
                success:  function (response) {
                    RecargarLikesMusica(idAlbum, idUser);                   
                }
        });                                                                              
    }    
    
    function Unlike()
    {
        var idAlbum = $("#txtIdAlbum").val();
        var idUser = "<?php echo $idUserP; ?>";
        var valor = "UNLIKE";
        $.ajax({
                url:   '/UCABsocial/Albums/procesarUnlike?codigo='+idAlbum+'&user='+idUser+'&valor='+valor,
                type:  'post',
                success:  function (response) {
                    RecargarLikes(idAlbum, idUser);                   
                }
        });                                                                              
    }  
    
    function UnlikeVideo()
    {
        var idAlbum = $("#txtIdAlbumVideo").val();
        var idUser = "<?php echo $idUserP; ?>";
        var valor = "UNLIKE";
        $.ajax({
                url:   '/UCABsocial/Albums/procesarUnlike?codigo='+idAlbum+'&user='+idUser+'&valor='+valor,
                type:  'post',
                success:  function (response) {
                    RecargarLikesVideo(idAlbum, idUser);                   
                }
        });                                                                              
    }     

    function UnlikeMusica()
    {
        var idAlbum = $("#txtIdAlbumMusica").val();
        var idUser = "<?php echo $idUserP; ?>";
        var valor = "UNLIKE";
        $.ajax({
                url:   '/UCABsocial/Albums/procesarUnlike?codigo='+idAlbum+'&user='+idUser+'&valor='+valor,
                type:  'post',
                success:  function (response) {
                    RecargarLikesMusica(idAlbum, idUser);                   
                }
        });                                                                              
    }

    function RecargarComentarios()
    {
        $("#txtComentario").val("");
        var idAlbum = $("#txtIdAlbum").val();
        $.ajax({
                url:   '/UCABsocial/Albums/listarComentariosAlbum?codigo='+idAlbum,
                type:  'post',
                success:  function (response) {
                    $("#divComentarios").html(response);                    
                }
        });                                                                              
    }
    
    function RecargarComentariosVideo()
    {
        $("#txtComentarioVideo").val("");
        var idAlbum = $("#txtIdAlbumVideo").val();
        $.ajax({
                url:   '/UCABsocial/Albums/listarComentariosAlbumVideo?codigo='+idAlbum,
                type:  'post',
                success:  function (response) {
                    $("#divComentariosVideo").html(response);                    
                }
        });                                                                              
    }
    
    function RecargarComentariosMusica()
    {
        $("#txtComentarioMusica").val("");
        var idAlbum = $("#txtIdAlbumMusica").val();
        $.ajax({
                url:   '/UCABsocial/Albums/listarComentariosAlbumMusica?codigo='+idAlbum,
                type:  'post',
                success:  function (response) {
                    $("#divComentariosMusica").html(response);                    
                }
        });                                                                              
    }    

    function RecargarContenido()
    {
        $("#txtDescripcionFoto").val("");
        var idAlbum = $("#txtIdAlbum").val();
        $.ajax({
                url:   '/UCABsocial/Albums/listarContenidoAlbum?codigo='+idAlbum,
                type:  'post',
                success:  function (response) {
                    $("#divContenidoAlbum").html(response);
                    $("#carousel").infiniteCarousel({});                    
                }
        });                                                                              
    }
    
    function RecargarContenidoVideo()
    {
        $("#txtDescripcionVideo").val("");
        var idAlbum = $("#txtIdAlbumVideo").val();
        $.ajax({
                url:   '/UCABsocial/Albums/listarContenidoAlbumVideo?codigo='+idAlbum,
                type:  'post',
                success:  function (response) {
                    $("#divContenidoAlbumVideo").html(response);
                    $("ul.demo2").ytplaylist({addThumbs:true, autoPlay: false, holderId: 'ytvideo'}); 
                    //$("ul.demo2").ytplaylist();                    
                }
        });                                                                              
    }
    
    function RecargarContenidoMusica()
    {
        $("#txtDescripcionMusica").val("");
        var idAlbum = $("#txtIdAlbumMusica").val();
        $.ajax({
                url:   '/UCABsocial/Albums/listarContenidoAlbumMusica?codigo='+idAlbum,
                type:  'post',
                success:  function (response) {
                    $("#divContenidoAlbumMusica").html(response);
                    //$("#carousel").infiniteCarousel({});                    
                }
        });                                                                              
    }    

    function AbrirDialogoEliminar(idAlbum)
    {
        $("#txtAlbumEliminar").val(idAlbum); 
        $("#dialog-eliminar").dialog("open");                                                                             
    }   
    
    function AbrirDialogoInstagram()
    {
        $("#dialog-agregar-contenido").dialog("open");                                                                             
    }  
    
    function AbrirDialogoYoutube()
    {
        $("#dialog-agregar-contenido-video").dialog("open");                                                                             
    } 
    
    function AbrirDialogoSoundCloud()
    {
        $("#dialog-agregar-contenido-musica").dialog("open");                                                                             
    }     
    
    function AbrirDialogoGuardarFoto(urlFoto)
    {
         $("#txtUrlFoto").val(urlFoto);        
        $("#dialog-guardar-foto").dialog("open");                                                                             
    }
    
    function AbrirDialogoGuardarVideo(urlVideo)
    {
         $("#txtUrlVideo").val(urlVideo);        
        $("#dialog-guardar-video").dialog("open");                                                                             
    }    
    
    function AbrirDialogoGuardarMusica(urlMusica)
    {
         $("#txtUrlMusica").val(urlMusica);        
        $("#dialog-guardar-musica").dialog("open");                                                                             
    }      
    
    function AbrirDialogoEliminarComentario(idComentario)
    {
        $("#txtComentarioEliminar").val(idComentario); 
        $("#dialog-eliminar-comentario").dialog("open");                                                                             
    }
    
    function AbrirDialogoEliminarComentarioVideo(idComentario)
    {
        $("#txtComentarioEliminarVideo").val(idComentario); 
        $("#dialog-eliminar-comentario-video").dialog("open");                                                                             
    }    
    
    function AbrirDialogoEliminarComentarioMusica(idComentario)
    {
        $("#txtComentarioEliminarMusica").val(idComentario); 
        $("#dialog-eliminar-comentario-musica").dialog("open");                                                                             
    }     
    
    function AbrirDialogoAgregarComentarios()
    {
        if($("#txtComentario").val() != "")
        {
            $("#dialog-agregar-comentarios").dialog("open");                                                                             
        }
    }   
    
    function AbrirDialogoAgregarComentariosVideo()
    {
        if($("#txtComentarioVideo").val() != "")
        {
            $("#dialog-agregar-comentarios-video").dialog("open");                                                                             
        }
    }     
    
    function AbrirDialogoAgregarComentariosMusica()
    {
        if($("#txtComentarioMusica").val() != "")
        {
            $("#dialog-agregar-comentarios-musica").dialog("open");                                                                             
        }
    }     
    
    function AgregarComentarios()
    {
        if($("#txtComentario").val() != "")
        {
            var comentario = $("#txtComentario").val();
            var idAlbum = $("#txtIdAlbum").val();
            var fkUsuario = "<?php echo $idUserP; ?>"; 

            $.ajax({
                    url:   '/UCABsocial/Coments/agregarComentario?comentario='+comentario+'&fkAlbums='+idAlbum+'&fkUsers='+fkUsuario,
                    type:  'post',
                    success:  function (response) {
                        $("#spanMensajeDialogoInfoComentarios").html('Se ha agregado exitosamente el comentario');                          
                        $("#dialog-info-comentarios").dialog("open");                                        
                    }
            }); 
        }
    }    
    
    function AgregarComentariosVideo()
    {
        if($("#txtComentarioVideo").val() != "")
        {
            var comentario = $("#txtComentarioVideo").val();
            var idAlbum = $("#txtIdAlbumVideo").val();
            var fkUsuario = "<?php echo $idUserP; ?>"; 

            $.ajax({
                    url:   '/UCABsocial/Coments/agregarComentario?comentario='+comentario+'&fkAlbums='+idAlbum+'&fkUsers='+fkUsuario,
                    type:  'post',
                    success:  function (response) {
                        $("#spanMensajeDialogoInfoComentariosVideo").html('Se ha agregado exitosamente el comentario');                          
                        $("#dialog-info-comentarios-video").dialog("open");                                        
                    }
            }); 
        }
    } 
    
    function AgregarComentariosMusica()
    {
        if($("#txtComentarioMusica").val() != "")
        {
            var comentario = $("#txtComentarioMusica").val();
            var idAlbum = $("#txtIdAlbumMusica").val();
            var fkUsuario = "<?php echo $idUserP; ?>"; 

            $.ajax({
                    url:   '/UCABsocial/Coments/agregarComentario?comentario='+comentario+'&fkAlbums='+idAlbum+'&fkUsers='+fkUsuario,
                    type:  'post',
                    success:  function (response) {
                        $("#spanMensajeDialogoInfoComentariosMusica").html('Se ha agregado exitosamente el comentario');                          
                        $("#dialog-info-comentarios-musica").dialog("open");                                        
                    }
            }); 
        }
    }    
    
    function AgregarAlbum() 
    {
        
        if($("#txtNombreAlbum").val() == "")
        {
            var today = new Date();
            var nombreAlbum = "Album (" + today + ")";
        }
         
        var valor = "<?php echo $idUserP; ?>";         
        var tipoAlbum = "Foto";          
        $.ajax({
                url:   '/UCABsocial/Albums/registrar?nombre='+$("#txtNombreAlbum").val()+'&privacidad='+$("#ddlPrivacidadAlbum option:selected").text()+"&fkUsers="+valor+"&tipo="+tipoAlbum,
                type:  'post',
                success:  function (response) {
                    var resultado = response;
                    if(resultado.indexOf("Fallo") != -1)
                    {                        
                        $("#spanMensajeDialogoInfo").html('Se ha producido un problema al procesar el registro, por favor intentelo nuevamente'); 
                        $("#dialog-info").dialog("open"); 
                    }
                    else
                    {                                                              
                        $("#spanMensajeDialogoInfo").html('Se ha registrado exitosamente el nuevo Album')                            
                        $("#dialog-info").dialog("open"); 
                    }                            
                }
        });            
    }
    
    function AgregarAlbumVideo() 
    {
        
        if($("#txtNombreAlbumVideo").val() == "")
        {
            var today = new Date();
            var nombreAlbum = "Album (" + today + ")";
        }
         
        var valor = "<?php echo $idUserP; ?>";         
        var tipoAlbum = "Video";          
        $.ajax({
                url:   '/UCABsocial/Albums/registrar?nombre='+$("#txtNombreAlbumVideo").val()+'&privacidad='+$("#ddlPrivacidadAlbumVideo option:selected").text()+"&fkUsers="+valor+"&tipo="+tipoAlbum,
                type:  'post',
                success:  function (response) {
                    var resultado = response;
                    if(resultado.indexOf("Fallo") != -1)
                    {                        
                        $("#spanMensajeDialogoInfo").html('Se ha producido un problema al procesar el registro, por favor intentelo nuevamente'); 
                        $("#dialog-info").dialog("open"); 
                    }
                    else
                    {                                                              
                        $("#spanMensajeDialogoInfo").html('Se ha registrado exitosamente el nuevo Album')                            
                        $("#dialog-info").dialog("open"); 
                    }                            
                }
        });            
    }    
    
    function AgregarAlbumMusica() 
    {
        
        if($("#txtNombreAlbumMusica").val() == "")
        {
            var today = new Date();
            var nombreAlbum = "Album (" + today + ")";
        }
         
        var valor = "<?php echo $idUserP; ?>";         
        var tipoAlbum = "Musica";          
        $.ajax({
                url:   '/UCABsocial/Albums/registrar?nombre='+$("#txtNombreAlbumMusica").val()+'&privacidad='+$("#ddlPrivacidadAlbumMusica option:selected").text()+"&fkUsers="+valor+"&tipo="+tipoAlbum,
                type:  'post',
                success:  function (response) {
                    var resultado = response;
                    if(resultado.indexOf("Fallo") != -1)
                    {                        
                        $("#spanMensajeDialogoInfo").html('Se ha producido un problema al procesar el registro, por favor intentelo nuevamente'); 
                        $("#dialog-info").dialog("open"); 
                    }
                    else
                    {                                                              
                        $("#spanMensajeDialogoInfo").html('Se ha registrado exitosamente el nuevo Album')                            
                        $("#dialog-info").dialog("open"); 
                    }                            
                }
        });            
    }    
    
    function EliminarAlbum() 
    {
        var valor = $("#txtAlbumEliminar").val();    
          
        $.ajax({
                url:   '/UCABsocial/Albums/eliminarAlbum?album='+valor,
                type:  'post',
                success:  function (response) {
                    var resultado = response;
                    if(resultado.indexOf("Fallo") != -1)
                    {                        
                        $("#spanMensajeDialogoInfo").html('Se ha producido un problema al procesar el registro, por favor intentelo nuevamente'); 
                        $("#dialog-info").dialog("open"); 
                    }
                    else
                    {                                                              
                        $("#spanMensajeDialogoInfo").html('Se ha eliminado exitosamente el nuevo Album');                        
                        $("#dialog-info").dialog("open"); 
                    }                            
                }
        });            
    }
    
    function EliminarAlbumVideo() 
    {
        var valor = $("#txtAlbumEliminarVideo").val();    
          
        $.ajax({
                url:   '/UCABsocial/Albums/eliminarAlbum?album='+valor,
                type:  'post',
                success:  function (response) {
                    var resultado = response;
                    if(resultado.indexOf("Fallo") != -1)
                    {                        
                        $("#spanMensajeDialogoInfo").html('Se ha producido un problema al procesar el registro, por favor intentelo nuevamente'); 
                        $("#dialog-info").dialog("open"); 
                    }
                    else
                    {                                                              
                        $("#spanMensajeDialogoInfoVideo").html('Se ha eliminado exitosamente el nuevo Album');                        
                        $("#dialog-info").dialog("open"); 
                    }                            
                }
        });            
    }   
    
    function EliminarAlbumMusica() 
    {
        var valor = $("#txtAlbumEliminarMusica").val();    
          
        $.ajax({
                url:   '/UCABsocial/Albums/eliminarAlbum?album='+valor,
                type:  'post',
                success:  function (response) {
                    var resultado = response;
                    if(resultado.indexOf("Fallo") != -1)
                    {                        
                        $("#spanMensajeDialogoInfo").html('Se ha producido un problema al procesar el registro, por favor intentelo nuevamente'); 
                        $("#dialog-info").dialog("open"); 
                    }
                    else
                    {                                                              
                        $("#spanMensajeDialogoInfoVideo").html('Se ha eliminado exitosamente el nuevo Album');                        
                        $("#dialog-info").dialog("open"); 
                    }                            
                }
        });            
    }    
    
    function EliminarComentario() 
    {
        var valor = $("#txtComentarioEliminar").val();    
          
        $.ajax({
                url:   '/UCABsocial/Coments/eliminarComentario?codigo='+valor,
                type:  'post',
                success:  function (response) {
                    var resultado = response;
                    if(resultado.indexOf("Fallo") != -1)
                    {                        
                        $("#spanMensajeDialogoInfo").html('Se ha producido un problema intentando eliminar el comentario, por favor intentelo nuevamente'); 
                        $("#dialog-info").dialog("open"); 
                    }
                    else
                    {                                                              
                        $("#spanMensajeDialogoInfoComentarios").html('Se ha eliminado exitosamente el comentario');                          
                        $("#dialog-info-comentarios").dialog("open"); 
                    }                            
                }
        });            
    }   
    
    function EliminarComentarioVideo() 
    {
        var valor = $("#txtComentarioEliminarVideo").val();    
          
        $.ajax({
                url:   '/UCABsocial/Coments/eliminarComentario?codigo='+valor,
                type:  'post',
                success:  function (response) {
                    var resultado = response;
                    if(resultado.indexOf("Fallo") != -1)
                    {                        
                        $("#spanMensajeDialogoInfo").html('Se ha producido un problema intentando eliminar el comentario, por favor intentelo nuevamente'); 
                        $("#dialog-info").dialog("open"); 
                    }
                    else
                    {                                                              
                        $("#spanMensajeDialogoInfoComentariosVideo").html('Se ha eliminado exitosamente el comentario');                          
                        $("#dialog-info-comentarios-video").dialog("open"); 
                    }                            
                }
        });            
    }    
    
    function EliminarComentarioMusica() 
    {
        var valor = $("#txtComentarioEliminarMusica").val();    
          
        $.ajax({
                url:   '/UCABsocial/Coments/eliminarComentario?codigo='+valor,
                type:  'post',
                success:  function (response) {
                    var resultado = response;
                    if(resultado.indexOf("Fallo") != -1)
                    {                        
                        $("#spanMensajeDialogoInfo").html('Se ha producido un problema intentando eliminar el comentario, por favor intentelo nuevamente'); 
                        $("#dialog-info").dialog("open"); 
                    }
                    else
                    {                                                              
                        $("#spanMensajeDialogoInfoComentariosMusica").html('Se ha eliminado exitosamente el comentario');                          
                        $("#dialog-info-comentarios-musica").dialog("open"); 
                    }                            
                }
        });            
    }
    
  $(function() {

        $('#s').validCampoFranz('abcdefghijklmnñopqrstuvwxyzáéiou0123456789'); 
        $('#txtComentario').validCampoFranz('abcdefghijklmnñopqrstuvwxyzáéiou0123456789-_.@,;:¿?¡! $'); 
        $('#txtDescripcionFoto').validCampoFranz('abcdefghijklmnñopqrstuvwxyzáéiou0123456789-_.@,;:¿?¡! $');         
      
        var username = "<?php echo $usernameUsuario; ?>";
        $("#usernameConectado").val(username);        
      
        $("#locations").addClass("todo-search-field"); 
        $('#locations').attr('placeholder', 'Buscar personas');
        $('#locations').css('width', '650px');
      
        $( "#accordion" ).accordion({
           heightStyle: "content"
         });

        $("#togglePerfil").click(function() {
                $(".dropdown").removeClass("open");            
                $("#dropdownPerfil").toggleClass("open");
        });
        $('html').click(function() {
                $(".dropdown").removeClass("open");
        });
        $('#dropdownPerfil').click(function(event){
                event.stopPropagation();
        }); 
        
        $("#toggleNotificaciones").click(function() {
                $(".dropdown").removeClass("open");            
                $("#dropdownNotificaciones").toggleClass("open");
        });

        $('#dropdownNotificaciones').click(function(event){
                event.stopPropagation();
        }); 
        
        $("#toggleSolicitudes").click(function() {
                $(".dropdown").removeClass("open");            
                $("#dropdownSolicitudes").toggleClass("open");
        });

        $('#dropdownSolicitudes').click(function(event){
                event.stopPropagation();
        }); 
        
        $( "#dialog-agregar" ).dialog({
          modal: true,
          autoOpen: false, 
          width: 600,
          height: 300,  
          closeOnEscape: false,
          open: function(event, ui) { $(".ui-dialog-titlebar-close").hide(); },          
          buttons: {
            Agregar: function() {
              $(this).dialog( "close" );
              AgregarAlbum();
            },
            Cancelar: function() {
              $(this).dialog( "close" );
            }            
          }
        });    
        
        $( "#dialog-agregar-video" ).dialog({
          modal: true,
          autoOpen: false, 
          width: 600,
          height: 300,  
          closeOnEscape: false,
          open: function(event, ui) { $(".ui-dialog-titlebar-close").hide(); },          
          buttons: {
            Agregar: function() {
              $(this).dialog( "close" );
              AgregarAlbumVideo();
            },
            Cancelar: function() {
              $(this).dialog( "close" );
            }            
          }
        });          
        
        $( "#dialog-agregar-musica" ).dialog({
          modal: true,
          autoOpen: false, 
          width: 600,
          height: 300,  
          closeOnEscape: false,
          open: function(event, ui) { $(".ui-dialog-titlebar-close").hide(); },          
          buttons: {
            Agregar: function() {
              $(this).dialog( "close" );
              AgregarAlbumMusica();
            },
            Cancelar: function() {
              $(this).dialog( "close" );
            }            
          }
        });          
        
        $( "#dialog-eliminar" ).dialog({
          modal: true,
          autoOpen: false, 
          width: 600,
          height: 300,  
          closeOnEscape: false,
          open: function(event, ui) { $(".ui-dialog-titlebar-close").hide(); },          
          buttons: {
            Eliminar: function() {
              $(this).dialog( "close" );
              EliminarAlbum();
            },
            Cancelar: function() {
              $(this).dialog( "close" );
            }            
          }
        });  
        
        $( "#dialog-eliminar-video" ).dialog({
          modal: true,
          autoOpen: false, 
          width: 600,
          height: 300,  
          closeOnEscape: false,
          open: function(event, ui) { $(".ui-dialog-titlebar-close").hide(); },          
          buttons: {
            Eliminar: function() {
              $(this).dialog( "close" );
              EliminarAlbumVideo();
            },
            Cancelar: function() {
              $(this).dialog( "close" );
            }            
          }
        });    
        
        $( "#dialog-eliminar-musica" ).dialog({
          modal: true,
          autoOpen: false, 
          width: 600,
          height: 300,  
          closeOnEscape: false,
          open: function(event, ui) { $(".ui-dialog-titlebar-close").hide(); },          
          buttons: {
            Eliminar: function() {
              $(this).dialog( "close" );
              EliminarAlbumMusica();
            },
            Cancelar: function() {
              $(this).dialog( "close" );
            }            
          }
        });         
        
        $( "#dialog-agregar-comentarios" ).dialog({
          modal: true,
          autoOpen: false, 
          width: 600,
          height: 300, 
          closeOnEscape: false,
          open: function(event, ui) { $(".ui-dialog-titlebar-close").hide(); },          
          buttons: {
            Agregar: function() {
              $(this).dialog( "close" );
              AgregarComentarios();
            },
            Cancelar: function() {
              $(this).dialog( "close" );
            }            
          }
        });     
        
        $( "#dialog-agregar-comentarios-video" ).dialog({
          modal: true,
          autoOpen: false, 
          width: 600,
          height: 300, 
          closeOnEscape: false,
          open: function(event, ui) { $(".ui-dialog-titlebar-close").hide(); },          
          buttons: {
            Agregar: function() {
              $(this).dialog( "close" );
              AgregarComentariosVideo();
            },
            Cancelar: function() {
              $(this).dialog( "close" );
            }            
          }
        });        
          
        $( "#dialog-agregar-comentarios-musica" ).dialog({
          modal: true,
          autoOpen: false, 
          width: 600,
          height: 300, 
          closeOnEscape: false,
          open: function(event, ui) { $(".ui-dialog-titlebar-close").hide(); },          
          buttons: {
            Agregar: function() {
              $(this).dialog( "close" );
              AgregarComentariosMusica();
            },
            Cancelar: function() {
              $(this).dialog( "close" );
            }            
          }
        });   
        
        $( "#dialog-mensajes" ).dialog({
          modal: true,
          autoOpen: false, 
          width: 600,
          height: 300, 
          closeOnEscape: false,
          open: function(event, ui) { $(".ui-dialog-titlebar-close").hide(); },          
          buttons: {
            Agregar: function() {
              $(this).dialog( "close" );
              location.reload();
            }
          }
        }); 
        
        $( "#dialog-info" ).dialog({
          modal: true,
          autoOpen: false, 
          width: 600,
          height: 300, 
          closeOnEscape: false,
          open: function(event, ui) { $(".ui-dialog-titlebar-close").hide(); },          
          buttons: {
            Aceptar: function() {
              $(this).dialog( "close" );
              location.reload();
            }
          }
        }); 
        
        $( "#dialog-info-comentarios" ).dialog({
          modal: true,
          autoOpen: false, 
          width: 600,
          height: 300,  
          closeOnEscape: false,
          open: function(event, ui) { $(".ui-dialog-titlebar-close").hide(); },          
          buttons: {
            Aceptar: function() {
              $(this).dialog( "close" );
              RecargarComentarios();
            }
          }
        }); 
        
        $( "#dialog-info-comentarios-video" ).dialog({
          modal: true,
          autoOpen: false, 
          width: 600,
          height: 300,  
          closeOnEscape: false,
          open: function(event, ui) { $(".ui-dialog-titlebar-close").hide(); },          
          buttons: {
            Aceptar: function() {
              $(this).dialog( "close" );
              RecargarComentariosVideo();
            }
          }
        }); 
        
        $( "#dialog-info-comentarios-musica" ).dialog({
          modal: true,
          autoOpen: false, 
          width: 600,
          height: 300,  
          closeOnEscape: false,
          open: function(event, ui) { $(".ui-dialog-titlebar-close").hide(); },          
          buttons: {
            Aceptar: function() {
              $(this).dialog( "close" );
              RecargarComentariosMusica();
            }
          }
        });         
        
        $( "#dialog-editar" ).dialog({
          modal: true,
          autoOpen: false, 
          closeOnEscape: false, 
          open: function(event, ui) { $(".ui-dialog-titlebar-close").hide(); },          
          width: 1000,
          height: 700,              
          buttons: {
            Cerrar: function() {
              $(this).dialog( "close" );
            }            
          }
        });  
        
        $( "#dialog-editar-video" ).dialog({
          modal: true,
          autoOpen: false, 
          closeOnEscape: false, 
          open: function(event, ui) { $(".ui-dialog-titlebar-close").hide(); },          
          width: 1000,
          height: 700,              
          buttons: {
            Cerrar: function() {
              $(this).dialog( "close" );
            }            
          }
        });         
        
        $( "#dialog-editar-musica" ).dialog({
          modal: true,
          autoOpen: false, 
          closeOnEscape: false, 
          open: function(event, ui) { $(".ui-dialog-titlebar-close").hide(); },          
          width: 1000,
          height: 700,              
          buttons: {
            Cerrar: function() {
              $(this).dialog( "close" );
            }            
          }
        });        
        
        $( "#dialog-eliminar-comentario" ).dialog({
          modal: true,
          autoOpen: false, 
          width: 600,
          height: 300, 
          closeOnEscape: false,
          open: function(event, ui) { $(".ui-dialog-titlebar-close").hide(); },          
          buttons: {
            Eliminar: function() {
              $(this).dialog( "close" );
              EliminarComentario();
            },
            Cancelar: function() {
              $(this).dialog( "close" );
            }            
          }
        });
        
        $( "#dialog-eliminar-comentario-video" ).dialog({
          modal: true,
          autoOpen: false, 
          width: 600,
          height: 300, 
          closeOnEscape: false,
          open: function(event, ui) { $(".ui-dialog-titlebar-close").hide(); },          
          buttons: {
            Eliminar: function() {
              $(this).dialog( "close" );
              EliminarComentarioVideo();
            },
            Cancelar: function() {
              $(this).dialog( "close" );
            }            
          }
        });        
        
        $( "#dialog-eliminar-comentario-musica" ).dialog({
          modal: true,
          autoOpen: false, 
          width: 600,
          height: 300, 
          closeOnEscape: false,
          open: function(event, ui) { $(".ui-dialog-titlebar-close").hide(); },          
          buttons: {
            Eliminar: function() {
              $(this).dialog( "close" );
              EliminarComentarioMusica();
            },
            Cancelar: function() {
              $(this).dialog( "close" );
            }            
          }
        });        

        $( "#dialog-agregar-contenido" ).dialog({
          modal: true,
          autoOpen: false, 
          width: 700,
          height: 700,
          closeOnEscape: false,
          open: function(event, ui) { $(".ui-dialog-titlebar-close").hide(); },          
          buttons: {
            Listo: function() {
              $(this).dialog( "close" );
              $("#s").val("");
              $("#photos").empty();            
            }            
          }          
        });
        
        $( "#dialog-agregar-contenido-video" ).dialog({
          modal: true,
          autoOpen: false, 
          width: 700,
          height: 700,
          closeOnEscape: false,
          open: function(event, ui) { $(".ui-dialog-titlebar-close").hide(); },          
          buttons: {
            Listo: function() {
              $(this).dialog( "close" );
              $("#searchField").val("");
              $("#videos").empty();            
            }            
          }          
        });        
        
        $( "#dialog-agregar-contenido-musica" ).dialog({
          modal: true,
          autoOpen: false, 
          width: 700,
          height: 700,
          closeOnEscape: false,
          open: function(event, ui) { $(".ui-dialog-titlebar-close").hide(); },          
          buttons: {
            Listo: function() {
              $(this).dialog( "close" );
              $("#searchFieldMusica").val("");
              $("#canciones").empty();            
            }            
          }          
        });        
        
        $( "#dialog-guardar-foto" ).dialog({
          modal: true,
          autoOpen: false, 
          closeOnEscape: false,     
          width: 500,
          height: 300, 
          open: function(event, ui) { $(".ui-dialog-titlebar-close").hide(); },          
          buttons: {
            Guardar: function() {
              $(this).dialog( "close" );
              GuardarImagenAlbum();
            },              
            Cancelar: function() {
              $(this).dialog( "close" );
            }            
          }
        }); 
        
        $( "#dialog-guardar-video" ).dialog({
          modal: true,
          autoOpen: false, 
          closeOnEscape: false,     
          width: 500,
          height: 300, 
          open: function(event, ui) { $(".ui-dialog-titlebar-close").hide(); },          
          buttons: {
            Guardar: function() {
              $(this).dialog( "close" );
              GuardarVideoAlbum();
            },              
            Cancelar: function() {
              $(this).dialog( "close" );
            }            
          }
        });         
        
        $( "#dialog-guardar-musica" ).dialog({
          modal: true,
          autoOpen: false, 
          closeOnEscape: false,     
          width: 500,
          height: 300, 
          open: function(event, ui) { $(".ui-dialog-titlebar-close").hide(); },          
          buttons: {
            Guardar: function() {
              $(this).dialog( "close" );
              GuardarMusicaAlbum();
            },              
            Cancelar: function() {
              $(this).dialog( "close" );
            }            
          }
        });          
        
        $( "#dialog-info-instagram" ).dialog({
          modal: true,
          autoOpen: false, 
          width: 600,
          height: 300, 
          closeOnEscape: false,
          open: function(event, ui) { $(".ui-dialog-titlebar-close").hide(); },          
          buttons: {
            Aceptar: function() {
              $(this).dialog( "close" );
              RecargarContenido();
            }
          }
        }); 
        
        $( "#dialog-info-youtube" ).dialog({
          modal: true,
          autoOpen: false, 
          width: 600,
          height: 300, 
          closeOnEscape: false,
          open: function(event, ui) { $(".ui-dialog-titlebar-close").hide(); },          
          buttons: {
            Aceptar: function() {
              $(this).dialog( "close" );
              RecargarContenidoVideo();
            }
          }
        }); 
        
        $( "#dialog-info-soundcloud" ).dialog({
          modal: true,
          autoOpen: false, 
          width: 600,
          height: 300, 
          closeOnEscape: false,
          open: function(event, ui) { $(".ui-dialog-titlebar-close").hide(); },          
          buttons: {
            Aceptar: function() {
              $(this).dialog( "close" );
              RecargarContenidoMusica();
            }
          }
        });           

  });
  </script>

  <center>
    <div class="navbar navbar-inverse" style="width: 99.5%;">          
        <ul class="nav navbar-nav navbar-left" style='padding-right:100px'>
          <li>
            <img src="<?php echo $this->webroot; ?>img/logoo.png" width="230" height="90"> 
          </li> 
        </ul>
        <div class="todo-search" style="width:700px; float:left ; margin-top:35px; height:50px; padding-top: 10px">
<!--            <input class="todo-search-field" type="search" value="" placeholder="Buscar personas"  />-->
<!--            <input name="data[locations]" update="autoCompleteDiv" autocompletetext="1" autocompleteurl="/UCABsocial/Registro/auto_complete" autocompleterequestitem="autoCompleteText" type="text" id="locations">-->
                <?php  
                    echo $this->AutoComplete->input( 
                        'locations', 
                        array( 
                            'autoCompleteUrl'=>$this->Html->url(  
                                array( 
                                    'controller'=>'Registro', 
                                    'action'=>'auto_complete', 
                                ) 
                            ), 
                            'autoCompleteRequestItem'=>'autoCompleteText', 
                        ) 
                    ); 
                ?>            
        </div>
        <div id="dropdownPerfil" class="dropdown" style="color: #1ABC9C; font-size:25pt; float:right; margin-top:35px;margin-right: 18px">
                <a id="togglePerfil" class="dropdown-toggle" href="#"><span class="fui-gear" ></span></a>
                <ul class="dropdown-menu" style="border: 1px solid black;">
		    <li><a href="/UCABsocial/Registro/editarForm">Editar Perfil</a></li>
		    <li><a href="<?php echo $logout; ?>">Salir</a></li>
		</ul>
	</div>
        <a href="#"><span style="color: #ECF0F1; font-size:15pt; float:right; margin-top:45px;margin-right: 15px"> <img src="<?php echo $imagen; ?>" width="25" height="25"/>  <?php echo $usernameUsuario; ?></span></a>        
        <div id="dropdownNotificaciones" class="dropdown" style="color: #1ABC9C; font-size:25pt; float:right; margin-top:35px;margin-right: 20px">
            <?php  
                if(count($notificaciones)>0)
                {
                    echo '<span class="notification-bubble" title="Notifications" style="background-color: rgb(245, 108, 126); display: inline;">'.count($notificaciones).'</span>';
                }
            ?>                 
            <a id="toggleNotificaciones" class="dropdown-toggle" href="#"><span class="fui-mail" ></span></a>
                <ul class="dropdown-menu" style="border: 1px solid black; width: 300px;">
                    <?php 
                        if(count($notificaciones)>0)
                        {
                            foreach($notificaciones as $objNotificacion)
                            {
                                echo "<li><table border='1' style='border: 1px solid black;'><tr><td style='padding-top: .5em; padding-bottom: .5em;'><a href='javascript:MarcarComoLeida(".$objNotificacion['N']['id'].");'><img src='".$objNotificacion['U']['foto']."' width='40' heigth='40' />".$objNotificacion['N']['mensaje']."</a></td></tr></table></li>";
                            }
                        }
                        else 
                        {
                            echo "<li><table><tr><td style='padding-top: .5em; padding-bottom: .5em;'>No existen notificaciones</td></tr></table></li>";
                        }
                    ?>
		</ul>                
	</div>   
        <div id="dropdownSolicitudes" class="dropdown" style="color: #1ABC9C; font-size:25pt; float:right; margin-top:35px;margin-right: 30px">
                <?php  
                    if(count($solicitudesGrafo)>0)
                    {
                        echo '<span class="notification-bubble" title="Notifications" style="background-color: rgb(245, 108, 126); display: inline;">'.count($solicitudesGrafo).'</span>';
                    }
                ?>                         
                <a id="toggleSolicitudes" class="dropdown-toggle" href="#"><span class="fui-user" ></span></a>
                <ul class="dropdown-menu" style="border: 1px solid black; width: 300px;">
                    <?php 
                        if(count($solicitudesGrafo)>0)
                        {
                            foreach($solicitudesGrafo as $solicitud)
                            {
                                echo "<li><table border='1' style='border: 1px solid black;'><tr><td style='padding-top: .5em; padding-bottom: .5em;'><div style='border: 1px solid black; width:41px; heigth:41px;'><img src='".$solicitud[0]['users']['foto']."' width='40' heigth='40' /></div></td><td style='padding-left: 5px; padding-top: .5em; padding-bottom: .5em;'><a href='/UCABsocial/Perfil/index?user=".$solicitud[0]['users']['username']."'>".$solicitud[0]['users']['nombre']." ".$solicitud[0]['users']['apellido']."<a></td></tr><tr><td><a id='btnAceptar' class='btn btn-info btn-lg btn-primary' href='javascript:AceptarSolicitud(".$solicitud[0]['users']['id'].");'>Aceptar</a></td><td><a id='btnAceptar' class='btn btn-info btn-lg btn-danger' href='javascript:RechazarSolicitud(".$solicitud[0]['users']['id'].");'>Rechazar</a></td></tr></table></li>";
                            }
                        }
                        else 
                        {
                            echo "<li><table><tr><td style='padding-top: .5em; padding-bottom: .5em;'>No existen solicitudes pendientes</td></tr></table></li>";
                        }
                    ?> 
		</ul>                
	</div>         
    </div>
</center>   
  
  <table cellspacing="1" cellpadding="20" style="margin-left: 7%;">
  <tr>
      <td>
          <div id="divFoto" style="border: 1px solid black; width: 150px; height: 150px; float: left;">
              <img src="<?php echo $imagen; ?>" width="148" height="148"/>
          </div>
      </td>
      <td>
          <h3 align="center"><?php echo $primernombre.' '.$segundonombre.' '.$primerapellido.' '.$segundoapellido;?></h3> 
          <br/>
          <h6><blockquote><?php echo $descripcion; ?></blockquote></h6>                
      </td>
  </tr>
</table>
    
<br/>  
<center>
    <table style="width:90%; border-spacing:0; border-collapse:collapse;">
        <tr>
            <td style="width:25%">
                <div>
                    <div style="padding-top:30px" class="gradientBoxesWithOuterShadows">
                        <span style="font-size: 17pt"> <img src='../img/friends.png'/> &nbsp;&nbsp; <b>Amigos</b></span><br/>
                        <table>
                            <?php 
                                if(count($amigosGrafo2)>0)
                                {
                                    foreach($amigosGrafo2 as $amigosCompletos2)
                                    {
                                        echo "<tr><td style='padding-top: .5em; padding-bottom: .5em;'><div style='border: 1px solid black;'><a href='/UCABsocial/Perfil/index?user=".$amigosCompletos2[0]['users']['username']."'><img src='".$amigosCompletos2[0]['users']['foto']."' width='60' heigth='60' /></a></div></td><td style='padding-left: 5px; padding-top: .5em; padding-bottom: .5em;'><a href='/UCABsocial/Perfil/index?user=".$amigosCompletos2[0]['users']['username']."'>".$amigosCompletos2[0]['users']['nombre']." ".$amigosCompletos2[0]['users']['apellido']."<a></td></tr>";
                                    }
                                }
                                else 
                                {
                                    echo "<tr><td style='padding-top: .5em; padding-bottom: .5em;'>No tienes amigos</td></tr>";
                                }
                            ?>
                        </table>                            
                    </div>
                    <br/>
                    <div style="padding-top:30px" class="gradientBoxesWithOuterShadows">
                        <table>
                            <tr>
                                <td>
                                    <span style="font-size: 17pt"><img src='../img/profile.png'/> &nbsp;&nbsp; <b>Información</b></span><br/>
                                    <br>                                   
                                    <span style="font-size: 12pt; padding-top: 10px;">Sexo:<a style="color:#1ABC9C; font-size: 12pt; font-family: sans-serif"> <?php echo $sexo; ?> </a></span><br>                                                                                                          
                                    <div style="clear: both; padding-top: 2px; padding-bottom: 2px;"></div>                                    
                                    <span style="font-size: 12pt;">Fecha de Cumpleaños:<a style="color:#1ABC9C; font-size: 12pt; font-family: sans-serif"> <?php echo $fechaNacimiento; ?> </a></span><br>                                  
                                    <div style="clear: both; padding-top: 2px; padding-bottom: 2px;"></div>                                    
                                    <span style="font-size: 12pt;">Vive en:<a style="color:#1ABC9C; font-size: 12pt; font-family: sans-serif"> <?php echo $ubicacionUsuario; ?> </a>  </span>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div style="clear: both;"></div>
                    <div style="clear: both;"></div> 
                    <br/>
                    <div style="padding-top:30px" class="gradientBoxesWithOuterShadows">
                        <table>
                            <tr>
                                <td>
                                    <span style="font-size: 17pt"> <img src='../img/contact.png'/> &nbsp;&nbsp; <b>Información de Contacto</b></span><br/>
                                    <br>
                                    <?php if($emailUsuario != '') { ?>
                                    <span style="font-size: 12pt">Email:<a style="color:#1ABC9C; font-size: 12pt; font-family: sans-serif"> <?php echo $emailUsuario; ?> </a></span><br>                                    
                                    <?php } ?>
                                    <div style="clear: both; padding-top: 2px; padding-bottom: 2px;"></div>
                                    <?php if($telefonoUsuario != '') { ?>
                                    <span style="font-size: 12pt">Teléfono:<a style="color:#1ABC9C; font-size: 12pt; font-family: sans-serif"> <?php echo $telefonoUsuario; ?> </a></span><br>
                                    <?php } ?>                                    
                                    <div style="clear: both; padding-top: 3px; padding-bottom: 2px;"></div>
                                    <?php if($urlFacebook != '') { ?>                                    
                                    <a href="<?php echo $urlFacebook; ?>"><img src="<?php echo $this->webroot; ?>img/facebook.png" /></a>  
                                    <?php } ?>                                       
                                    <?php if($urlTwitter != '') { ?> 
                                    <a href="<?php echo $urlTwitter; ?>"><img src="<?php echo $this->webroot; ?>img/twitter.png" /></a>
                                    <?php } ?> 
                                    <?php if($urlLinkedin != '') { ?>                                     
                                    <a href="<?php echo $urlLinkedin; ?>"><img src="<?php echo $this->webroot; ?>img/linkedin.png" /></a>
                                    <?php } ?>                                     
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div style="clear: both;"></div>
                    <div style="clear: both;"></div> 
                    <br/>                    
                </div>
            </td>
            <td style="width:55%; vertical-align: top; padding-left: 20px; ">
                <div style="padding-left: 2%;" class="gradientBoxesWithOuterShadows">
                    <span style="font-size: 17pt"> <img src='../img/media.jpg'/> &nbsp;&nbsp; <b>Contenido Multimedia</b></span>
                    <div id="accordion" style="margin-left:1%;padding-top:10px;">
                        <h3 style="color: #1ABC9C"> <span class="fui-photo"></span>&nbsp;&nbsp; FOTOS</h3>
                        <div>
                            <a style="float: right; width: 170px;" class="btn btn-large btn-block btn-primary" href="Javascript:AbrirDialogo();"> <span class="fui-photo"></span> Agregar Album </a>
                            <br/><br/>
                            <table>
                                <?php 
                                    if(count($albums)>0)
                                    {
                                        $cont = 1;
                                        foreach($albums as $album)
                                        {
                                            if($imagenesAlbums[$cont] == "No hay imagen")
                                            {
                                                echo "<tr><td style='padding-top: .5em; padding-bottom: .5em;'><div><img src='../img/photo-album.png' width='60' heigth='40' /></div></td></tr><tr><td style='padding-left: 5px; padding-top: .5em; padding-bottom: .5em;'><a href='javascript:AbrirDialogoEditarAlbum(".$album['albums']['id'].")'>".$album['albums']['nombre']." </a><a href='javascript:AbrirDialogoEliminar(".$album['albums']['id'].");'><span class='fui-cross'></span></a></td></tr>";                                                
                                            }
                                            else 
                                            {
                                                echo "<tr><td style='padding-top: .5em; padding-bottom: .5em;'><div style='position:relative'><img src='".$imagenesAlbums[$cont]."' width='60' heigth='60' /><div style='position:absolute; top:0; left:0;'><img border='0' src='../img/cintillo.png' width='60' heigth='60' /></div></div></td></tr><tr><td style='padding-left: 5px; padding-top: .5em; padding-bottom: .5em;'><a href='javascript:AbrirDialogoEditarAlbum(".$album['albums']['id'].")'>".$album['albums']['nombre']." </a><a href='javascript:AbrirDialogoEliminar(".$album['albums']['id'].");'><span class='fui-cross'></span></a></td></tr>";                                                
                                            }
                                            
                                            $cont = $cont + 1;
                                        }
                                    }
                                    else
                                    {
                                        echo "<tr><td style='padding-top: .5em; padding-bottom: .5em;'>No existen Albums</td></tr>";
                                    }
                                ?>
                            </table>
                        </div>
                        <h3 style="color: #1ABC9C"> <span class="fui-video"></span>&nbsp;&nbsp; VÍDEOS</h3>
                        <div>
                            <a style="float: right; width: 170px;" class="btn btn-large btn-block btn-primary" href="Javascript:AbrirDialogoVideo();"> <span class="fui-video"></span> Agregar Album </a>
                            <br/><br/>
                            <table>
                                <?php 
                                    if(count($albumsVideo)>0)
                                    {
                                        foreach($albumsVideo as $album)
                                        {
                                            echo "<tr><td style='padding-top: .5em; padding-bottom: .5em;'><div><img src='../img/videoAlbum.png' width='60' heigth='40' /></div></td></tr><tr><td style='padding-left: 5px; padding-top: .5em; padding-bottom: .5em;'><a href='javascript:AbrirDialogoEditarAlbumVideo(".$album['albums']['id'].")'>".$album['albums']['nombre']." </a><a href='javascript:AbrirDialogoEliminar(".$album['albums']['id'].");'><span class='fui-cross'></span></a></td></tr>";                                                
                                        }
                                    }
                                    else
                                    {
                                        echo "<tr><td style='padding-top: .5em; padding-bottom: .5em;'>No existen Albums</td></tr>";
                                    }
                                ?>
                            </table>
                        </div>
                        <h3 style="color:#1ABC9C"> <span class="fui-volume"></span>&nbsp;&nbsp; MÚSICA</h3>
                        <div>
                            <a style="float: right; width: 170px;" class="btn btn-large btn-block btn-primary" href="Javascript:AbrirDialogoMusica();"> <span class="fui-volume"></span> Agregar Album </a>
                            <br/><br/>
                            <table>
                                <?php 
                                    if(count($albumsMusica)>0)
                                    {
                                        foreach($albumsMusica as $album)
                                        {
                                            echo "<tr><td style='padding-top: .5em; padding-bottom: .5em;'><div><img src='../img/musicaAlbum.png' width='60' heigth='40' /></div></td></tr><tr><td style='padding-left: 5px; padding-top: .5em; padding-bottom: .5em;'><a href='javascript:AbrirDialogoEditarAlbumMusica(".$album['albums']['id'].")'>".$album['albums']['nombre']." </a><a href='javascript:AbrirDialogoEliminar(".$album['albums']['id'].");'><span class='fui-cross'></span></a></td></tr>";                                                
                                        }
                                    }
                                    else
                                    {
                                        echo "<tr><td style='padding-top: .5em; padding-bottom: .5em;'>No existen Albums</td></tr>";
                                    }
                                ?>
                            </table>
                        </div>
                        <h3 style="color:#1ABC9C"> <span class="fui-cmd"></span>&nbsp;&nbsp; PUBLICACIONES DE MIS AMIGOS</h3>
                        <div>
                            <table>
                                <?php 
                                    if(count($contenidoAmigos)>0)
                                    {
                                        foreach($contenidoAmigos as $objContenidoAmigo)
                                        {
                                            if(isset($objContenidoAmigo[0]))
                                            {
                                                if($objContenidoAmigo[0]['U']['id'] != "")
                                                {
                                                    $bandera = false;
                                                    $imagenesAmigos = "";
                                                    $date = new DateTime($objContenidoAmigo[0]['A']['created']);                                                    
                                                    $detallesAmigos = "<tr><td style='padding-top: .5em; padding-bottom: .5em;'><div><a href='/UCABsocial/Perfil/index?user=".$objContenidoAmigo[0]['U']['username']."'><img src='".$objContenidoAmigo[0]['U']['foto']."' width='30' heigth='30' /></a></div></td><td><a href='/UCABsocial/Perfil/index?user=".$objContenidoAmigo[0]['U']['username']."'><b>"." ".$objContenidoAmigo[0]['U']['nombre']."  ".$objContenidoAmigo[0]['U']['apellido']."</b></a> publicó el Album <td style='padding-left: 5px; padding-top: .5em; padding-bottom: .5em;'><a href='/UCABsocial/Perfil/index?user=".$objContenidoAmigo[0]['U']['username']."'>".$objContenidoAmigo[0]['A']['nombre']." </a><span style='font-size:8pt;'><b>".$date->format('F j, Y')."</b></span></td></tr>";                                                
                                                    foreach($imagenesAlbumsAmigos as $objImagenesAmigos)
                                                    {
                                                        if(isset($objImagenesAmigos['H']))
                                                        {
                                                            if($objContenidoAmigo[0]['A']['id'] == $objImagenesAmigos['H']['fkAlbums'])
                                                            {
                                                                $bandera = true;
                                                                $imagenesAmigos = $imagenesAmigos. "<img src='".$objImagenesAmigos['R']['url']."' width='80' heigth='80'/>&nbsp;";
                                                            }
                                                        }
                                                    }
                                                    if($bandera)
                                                    {
                                                        echo $detallesAmigos."<tr><td><div>".$imagenesAmigos."</div></td></tr>";
                                                    }
                                                    else
                                                    {
                                                        echo $detallesAmigos;
                                                    }
                                                }
                                            }
                                        }
                                    }
                                    else
                                    {
                                        echo "<tr><td style='padding-top: .5em; padding-bottom: .5em;'>No existe contenido para mostrar</td></tr>";
                                    }
                                ?>
                            </table>
                        </div>                        
                    </div>
                </div>                    
            </td>
        </tr>
    </table>
  </center>
 
<div id="dialog-agregar" title="Agregar Album">
    <div>                
        <div style="float: left; width: 50%">
            <label><b>Nombre del Album:</b></label>
        </div> 
        <div style="float: left; width: 50%">
            <input id="txtNombreAlbum" type="text" value="" class="form-control" />
        </div>
    </div>
    <div style="clear: both;"></div>
    <br/>
    <div style="clear: both;"></div> 
    <div style="padding-top: 5px;">                    
        <div style="float: left; width: 50%">
            <label><b>Privacidad del Album:</b></label>
        </div> 
        <div style="float: left; width: 50%">
            <select id="ddlPrivacidadAlbum" style="width: 100%;">
                <option value="1">Público</option>
                <option value="2">Privado</option>
            </select>
        </div>
    </div>
</div>
<div id="dialog-agregar-video" title="Agregar Album Vídeo">
    <div>                
        <div style="float: left; width: 50%">
            <label><b>Nombre del Album:</b></label>
        </div> 
        <div style="float: left; width: 50%">
            <input id="txtNombreAlbumVideo" type="text" value="" class="form-control" />
        </div>
    </div>
    <div style="clear: both;"></div>
    <br/>
    <div style="clear: both;"></div> 
    <div style="padding-top: 5px;">                    
        <div style="float: left; width: 50%">
            <label><b>Privacidad del Album:</b></label>
        </div> 
        <div style="float: left; width: 50%">
            <select id="ddlPrivacidadAlbumVideo" style="width: 100%;">
                <option value="1">Público</option>
                <option value="2">Privado</option>
            </select>
        </div>
    </div>
</div>
<div id="dialog-agregar-musica" title="Agregar Album Música">
    <div>                
        <div style="float: left; width: 50%">
            <label><b>Nombre del Album:</b></label>
        </div> 
        <div style="float: left; width: 50%">
            <input id="txtNombreAlbumMusica" type="text" value="" class="form-control" />
        </div>
    </div>
    <div style="clear: both;"></div>
    <br/>
    <div style="clear: both;"></div> 
    <div style="padding-top: 5px;">                    
        <div style="float: left; width: 50%">
            <label><b>Privacidad del Album:</b></label>
        </div> 
        <div style="float: left; width: 50%">
            <select id="ddlPrivacidadAlbumMusica" style="width: 100%;">
                <option value="1">Público</option>
                <option value="2">Privado</option>
            </select>
        </div>
    </div>
</div>
<div id="dialog-mensajes" title="Solicitudes de Amistad">
  <p>
    <input id="redirectUrl" type="hidden" value=""/>
    <span id="spanMensajeDialogo"></span>
  </p>
</div>
<div id="dialog-info" title="UCABsocial - Albums">
  <p>
    <input id="redirectUrlInfo" type="hidden" value=""/>
    <span id="spanMensajeDialogoInfo"></span>
  </p>
</div>
<div id="dialog-info-comentarios" title="UCABsocial - Comentarios">
  <p>
    <input id="redirectUrlInfo" type="hidden" value=""/>
    <span id="spanMensajeDialogoInfoComentarios"></span>
  </p>
</div>
<div id="dialog-info-comentarios-video" title="UCABsocial - Comentarios">
  <p>
    <input id="redirectUrlInfo" type="hidden" value=""/>
    <span id="spanMensajeDialogoInfoComentariosVideo"></span>
  </p>
</div>
<div id="dialog-info-comentarios-musica" title="UCABsocial - Comentarios">
  <p>
    <input id="redirectUrlInfo" type="hidden" value=""/>
    <span id="spanMensajeDialogoInfoComentariosMusica"></span>
  </p>
</div>
<div id="dialog-eliminar" title="Eliminar Album">
  <p>
    <input id="txtAlbumEliminar" type="hidden" value=""/>
    <span id="spanMensajeDialogoInfoEliminar">¿Realmente desea eliminar este album?</span>
  </p>
</div>

<div id="dialog-agregar-comentarios" title="Agregar Comentarios">
  <p>
    <span id="spanMensajeDialogoAgregarComentarios">¿Realmente desea agregar este comentario?</span>
  </p>
</div>

<div id="dialog-agregar-comentarios-video" title="Agregar Comentarios">
  <p>
    <span id="spanMensajeDialogoAgregarComentarios">¿Realmente desea agregar este comentario?</span>
  </p>
</div>

<div id="dialog-agregar-comentarios-musica" title="Agregar Comentarios">
  <p>
    <span id="spanMensajeDialogoAgregarComentarios">¿Realmente desea agregar este comentario?</span>
  </p>
</div>

<div id="dialog-editar" title="Configuración del Album">
    <input id="txtIdAlbum" type="hidden" value=""/>
    <div class="gradientBoxesWithOuterShadows">
        <h6 style="float: left;">Contenido</h6>  
        <a style="float: right; width: 210px; height: 33px;" class="btn btn-large btn-block btn-primary" href="Javascript:AbrirDialogoInstagram();"> <span class="fui-photo"></span> Agregar Contenido </a>        
        <div style="clear: both;"></div><div style="clear: both;"></div><div style="clear: both;"></div>
        <br/>        
        <div id="divContenidoAlbum" class="jcarousel" style="padding-top: 18px;">
            
        </div>
    </div> 
    <br/>
    <div class="gradientBoxesWithOuterShadows" style="height: auto;">
        <h6 style="float: left;">Comentarios</h6> <div id="divLikes" style="float: right;"></div>&nbsp;&nbsp; <div id="divImagenLikes" style="float: right;"></div>
        <div style="clear: both;"></div><div style="clear: both;"></div><div style="clear: both;"></div>
        <br/>
        <div id="divComentarios" class="gradientBoxesWithOuterShadows" style="padding-top: 18px;">
            
        </div>
        <div style="clear: both;"></div>
        <br/>
        <div>
            <div style='padding:5px; border-style: solid; border-width: 1px;'>
                <img src="<?php echo $imagen; ?>" width='45' height='45' />
                <textarea id="txtComentario" placeholder="Introduzca un comentario" style="width: 94%; resize: none;"></textarea>
            </div>
        </div>
        <br/>
        <a style="float: right; width: 210px; height: 33px;" class="btn btn-large btn-block btn-primary" href="Javascript:AbrirDialogoAgregarComentarios();"> <span class="fui-new"></span> Agregar Comentario </a>
        <div style="clear: both;"></div>
        <div style="clear: both;"></div>        
    </div>
</div>

<div id="dialog-eliminar-comentario" title="Eliminar Comentario">
  <p>
    <input id="txtComentarioEliminar" type="hidden" value=""/>
    <span id="spanMensajeDialogoInfoEliminar">¿Realmente desea eliminar este comentario?</span>
  </p>
</div>

<div id="dialog-eliminar-comentario-video" title="Eliminar Comentario">
  <p>
    <input id="txtComentarioEliminarVideo" type="hidden" value=""/>
    <span id="spanMensajeDialogoInfoEliminarVideo">¿Realmente desea eliminar este comentario?</span>
  </p>
</div>

<div id="dialog-eliminar-comentario-musica" title="Eliminar Comentario">
  <p>
    <input id="txtComentarioEliminarMusica" type="hidden" value=""/>
    <span id="spanMensajeDialogoInfoEliminarMusica">¿Realmente desea eliminar este comentario?</span>
  </p>
</div>

<div id="dialog-agregar-contenido" title="Instagram">   
    <section id="sform">
        <small style="font-size: 8pt;"><b>Nota</b>: No se permiten espacios ni signos de puntuación. La búsqueda está limitada a un(1) tag.</small>
        <div style="clear: both;"></div>
        <br/>
        <div style="clear: both;"></div>         
        <input type="text" id="s" name="s" class="sfield" placeholder="Introduzca un tag..." autocomplete="off">
        <div style="clear: both;"></div>
        <br/>
        <div style="clear: both;"></div> 
        <a style="float: right; width: 120px; height: 33px;" class="btn btn-large btn-block btn-primary" href="Javascript:BuscarPorTag();"> <span class="fui-search"></span>Buscar</a>            
    </section>
    <div style="clear: both;"></div>
    <br/>
    <div style="border-top: #000 1px solid;"></div>
    <div style="clear: both;"></div>
    <br/>
    <div style="clear: both;"></div>    
    <center>
        <section id="photos"></section>    
    </center>    
</div>

<div id="dialog-agregar-contenido-video" title="Youtube">   
    <section id="sformvideo">
        <small style="font-size: 8pt;"><b>Nota</b>: No se permiten signos de puntuación.</small>
        <div style="clear: both;"></div>
        <br/>
        <div style="clear: both;"></div>         
        <input type="text" id="searchField" name="searchField" class="sfield" placeholder="Introduzca un tag..." autocomplete="off">
        <div style="clear: both;"></div>
        <br/>
        <div style="clear: both;"></div> 
        <a style="float: right; width: 120px; height: 33px;" class="btn btn-large btn-block btn-primary" href="Javascript:BuscarVideoPorTag();"> <span class="fui-search"></span>Buscar</a>            
    </section>
    <div style="clear: both;"></div>
    <br/>
    <div style="border-top: #000 1px solid;"></div>
    <div style="clear: both;"></div>
    <br/>
    <div style="clear: both;"></div>    
    <center>
        <section id="videos"></section>    
    </center>    
</div>

<div id="dialog-agregar-contenido-musica" title="Soundcloud">   
    <section id="sformmusica">
        <small style="font-size: 8pt;"><b>Nota</b>: No se permiten signos de puntuación.</small>
        <div style="clear: both;"></div>
        <br/>
        <div style="clear: both;"></div>         
        <input type="text" id="searchFieldMusica" name="searchFieldMusica" class="sfield" placeholder="Introduzca un tag..." autocomplete="off">
        <div style="clear: both;"></div>
        <br/>
        <div style="clear: both;"></div> 
        <a style="float: right; width: 120px; height: 33px;" class="btn btn-large btn-block btn-primary" href="Javascript:BuscarMusicaPorTag();"> <span class="fui-search"></span>Buscar</a>            
    </section>
    <div style="clear: both;"></div>
    <br/>
    <div style="border-top: #000 1px solid;"></div>
    <div style="clear: both;"></div>
    <br/>
    <div style="clear: both;"></div>    
    <center>
        <section id="canciones"></section>    
    </center>    
</div>

<div id="dialog-guardar-foto" title="Agregar Foto al Album">
  <p>
    <input id="txtUrlFoto" type="hidden" value=""/>
    <textarea id="txtDescripcionFoto" placeholder="Introduzca una descripción para la imagen" style="width: 99%; resize: none;"></textarea>
  </p>
</div>

<div id="dialog-guardar-video" title="Agregar Vídeo al Album">
  <p>
    <input id="txtUrlVideo" type="hidden" value=""/>
    <textarea id="txtDescripcionVideo" placeholder="Introduzca una descripción para el vídeo" style="width: 99%; resize: none;"></textarea>
  </p>
</div>

<div id="dialog-guardar-musica" title="Agregar Canción al Album">
  <p>
    <input id="txtUrlMusica" type="hidden" value=""/>
    <textarea id="txtDescripcionMusica" placeholder="Introduzca una descripción para la canción" style="width: 99%; resize: none;"></textarea>
  </p>
</div>

<div id="dialog-info-instagram" title="Confirmación - Instagram">
  <p>
    <span id="spanMensajeDialogoInstagram"></span>
  </p>
</div>

<div id="dialog-info-youtube" title="Confirmación - Youtube">
  <p>
    <span id="spanMensajeDialogoYoutube"></span>
  </p>
</div>

<div id="dialog-info-soundcloud" title="Confirmación - Soundcloud">
  <p>
    <span id="spanMensajeDialogoSoundcloud"></span>
  </p>
</div>

<div id="dialog-editar-video" title="Configuración del Album de Video">
    <input id="txtIdAlbumVideo" type="hidden" value=""/>
    <div class="gradientBoxesWithOuterShadows">
        <h6 style="float: left;">Contenido</h6>  
        <a style="float: right; width: 210px; height: 33px;" class="btn btn-large btn-block btn-primary" href="Javascript:AbrirDialogoYoutube();"> <span class="fui-video"></span> Agregar Contenido </a>        
        <div style="clear: both;"></div><div style="clear: both;"></div><div style="clear: both;"></div>
        <br/>        
        <div id="divContenidoAlbumVideo" style="padding-top: 18px; width: auto;">
            
        </div>
    </div> 
    <br/>
    <div class="gradientBoxesWithOuterShadows" style="height: auto;">
        <h6 style="float: left;">Comentarios</h6> <div id="divLikesVideo" style="float: right;"></div>&nbsp;&nbsp; <div id="divImagenLikesVideo" style="float: right;"></div>
        <div style="clear: both;"></div><div style="clear: both;"></div><div style="clear: both;"></div>
        <br/>
        <div id="divComentariosVideo" class="gradientBoxesWithOuterShadows" style="padding-top: 18px;">
            
        </div>
        <div style="clear: both;"></div>
        <br/>
        <div>
            <div style='padding:5px; border-style: solid; border-width: 1px;'>
                <img src="<?php echo $imagen; ?>" width='45' height='45' />
                <textarea id="txtComentarioVideo" placeholder="Introduzca un comentario" style="width: 94%; resize: none;"></textarea>
            </div>
        </div>
        <br/>
        <a style="float: right; width: 210px; height: 33px;" class="btn btn-large btn-block btn-primary" href="Javascript:AbrirDialogoAgregarComentariosVideo();"> <span class="fui-new"></span> Agregar Comentario </a>
        <div style="clear: both;"></div>
        <div style="clear: both;"></div>        
    </div>
</div>

<div id="dialog-editar-musica" title="Configuración del Album de Musica">
    <input id="txtIdAlbumMusica" type="hidden" value=""/>
    <div class="gradientBoxesWithOuterShadows">
        <h6 style="float: left;">Contenido</h6>  
        <a style="float: right; width: 210px; height: 33px;" class="btn btn-large btn-block btn-primary" href="Javascript:AbrirDialogoSoundCloud();"> <span class="fui-volume"></span> Agregar Contenido </a>        
        <div style="clear: both;"></div><div style="clear: both;"></div><div style="clear: both;"></div>
        <br/>        
        <div id="divContenidoAlbumMusica" class="jcarousel" style="padding-top: 18px;">
            
        </div>
    </div> 
    <br/>
    <div class="gradientBoxesWithOuterShadows" style="height: auto;">
        <h6 style="float: left;">Comentarios</h6> <div id="divLikesMusica" style="float: right;"></div>&nbsp;&nbsp; <div id="divImagenLikesMusica" style="float: right;"></div>
        <div style="clear: both;"></div><div style="clear: both;"></div><div style="clear: both;"></div>
        <br/>
        <div id="divComentariosMusica" class="gradientBoxesWithOuterShadows" style="padding-top: 18px;">
            
        </div>
        <div style="clear: both;"></div>
        <br/>
        <div>
            <div style='padding:5px; border-style: solid; border-width: 1px;'>
                <img src="<?php echo $imagen; ?>" width='45' height='45' />
                <textarea id="txtComentarioMusica" placeholder="Introduzca un comentario" style="width: 94%; resize: none;"></textarea>
            </div>
        </div>
        <br/>
        <a style="float: right; width: 210px; height: 33px;" class="btn btn-large btn-block btn-primary" href="Javascript:AbrirDialogoAgregarComentariosMusica();"> <span class="fui-new"></span> Agregar Comentario </a>
        <div style="clear: both;"></div>
        <div style="clear: both;"></div>        
    </div>
</div>