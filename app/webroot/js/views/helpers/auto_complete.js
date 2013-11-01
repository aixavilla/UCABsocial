$(document).ready(function(){ 

    // Get a ref to the update div, set minWidth to the text item 
    $('input[autoCompleteText]').each(function(){ 
         
        var updateDiv = '#'+$(this).attr('update'); 
        $(updateDiv).css('minWidth',$(this).width()); 
        $(updateDiv).css('height','auto'); 
        $(updateDiv).css('overflow','auto');         
        var autoCompleteRequestItem = $(this).attr('autoCompleteRequestItem'); 
        // Add a function to key up 
        $(this).bind('keyup', function(event){ 
            // On escape key, hide the suggestions 
            if(event.keyCode==27) { 
                $(updateDiv).hide(); 
            }else if($(this).val().length>0) { 
                // If a request is in process, return 
                if ( $(this).data('autoCompleteBusy') ) { 
                    return; 
                } 
                // Don't send a request if we just did it 
                var lastVal = $(this).data('lastAutoComplete'); 
                if(lastVal!=$(this).val()) { 
                    // Set busy flag 
                    $(this).data('autoCompleteBusy',true); 
                    // Record the search term 
                    $(this).data('lastAutoComplete',$(this).val()); 
                    // Call the function and get a JSON object 
                    $.getJSON($(this).attr('autoCompleteUrl'), 
                        autoCompleteRequestItem+"="+$(this).val(), 
                        function(itemList) { 
                          if(itemList !== null) { 
                            populateAutoComplete(itemList,updateDiv); 
                          } else { 
                            $(updateDiv).hide(); 
                          } 
                        } 
                    ); 
                    // Remove busy flag 
                    $(this).data('autoCompleteBusy',false); 
                }else{ 
                    $(updateDiv).show(); 
                } 
            }else{ 
                $(updateDiv).hide(); 
            } 
        });
        
        $(updateDiv).focusout(function(){
          $(this).hide();
        });
    });
     
    function populateAutoComplete(itemList,updateDiv) {   
        var tag = updateDiv.substring(1); 
        // Build a list of links from the terms, set href equal to the term 
        var options = '<table>'; 
        $.each(itemList, function(index, name) { 
              var arrStr = name.split(/[+]/);
              //alert(arrStr[2]);
              if(!arrStr[2].indexOf("https://") !== -1)
              {
                options += "<tr><td style='padding-top: .5em; padding-bottom: .5em;'><div style='border: 1px solid black;'><img src='"+arrStr[2]+"' width='60' heigth='60' /></div></td><td style='padding-left: 5px; padding-top: .5em; padding-bottom: .5em;'><a autoCompleteItem='"+tag+"' href='/UCABsocial/Perfil/index?user="+arrStr[1]+"'>"+arrStr[0]+"<a></td></tr>";
              }
              if(arrStr[2]===null)
              {
                options += "<tr><td style='padding-top: .5em; padding-bottom: .5em;'><img src='../img/loading.gif' /></td></tr>";
              }
              //options += '<a autoCompleteItem='+tag+' href="'+name+'" >' +  name + '</a>'; 
            });
            options += '</table>';
            var valor = $('#locations').val();
            options += '<center><a href="/UCABsocial/Registro/amigos?search='+valor+'">Ver más resultados<a></center>';
        // Show them or hide div if nothing to show 
        if(options!=''){ 
            $(updateDiv).html(options); 
            $(updateDiv).show(); 
        } else { 
            $(updateDiv).hide(); 
        } 
        // Attach a function to click to transfer value to the text box  
    } 
}); 