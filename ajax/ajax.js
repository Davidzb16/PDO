

$("#nombre_registro").change(function(){

    //console.log( $("#nombre_registro").val() ); se hace para ver que info trae
    var nombre = $("#nombre_registro").val();
    var datos = new FormData();
    datos.append("nombre", nombre);

    $.ajax({
        url: "ajax/ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        before: function (){ 
            
        },
        success: function(respuesta){

            console.log(respuesta);
            if(respuesta == "1" || respuesta === 1){
                $("#nombre_registro").val("");
                $("#nombre_registro").select();
                document.querySelector("div[for='mensaje_error']").innerHTML = "El nombre de usuario ya existe";
            }else{
                document.querySelector("div[for='mensaje_error']").innerHTML = "";
            }

        },
        error:  function(respuesta){

            console.log("ocurrio un error: " + respuesta);
            
        },
        complete: function(){

        }

    });

});

$("#email_registro").change(function(){

    //console.log( $("#nombre_registro").val() ); se hace para ver que info trae
    var email = $("#email_registro").val();
    var datos = new FormData();
    datos.append("email", email);

    $.ajax({
        url: "ajax/ajax.php",
        method: "POST",
        data: datos,
        cache: true,
        contentType: false,
        processData: false,
        before: function (){ 
            
        },
        success: function(respuesta){

            console.log(respuesta);
            if(respuesta == "1" || respuesta === 1){
                $("#email_registro").val("");
                $("#email_registro").select();
                document.querySelector("div[for='mensaje_error']").innerHTML = "El email ingresado ya existe";
            }else{
                document.querySelector("div[for='mensaje_error']").innerHTML = "";
            }

        },
        error:  function(respuesta){

            console.log("ocurrio un error: " + respuesta);
            
        },
        complete: function(){

        }

    });

});

// subir archivo

function subir_archivo(){
var input_fie = $("#archivo")[0];
var file = input_fie.files[0];
    if ((typeof file === "object") && (file != null) ) {
        var data = new FormData();
        data.append("file", file);

        $.ajax({
            url: "ajax/ajax.php",
            method: "POST",
            data: data,
            cache: true,
            contentType: false,
            processData: false,
            before: function (){ 
                console.log("Subiendo archivo");
            },
            success: function(respuesta){
                
                console.log(respuesta);

              if (respuesta == "300") {
                  console.log("Archivo no permitido");
              } else if (respuesta == "301") {
                console.log("Archivo muy grande");
              }else if (respuesta == "302") {
                console.log("Falló al subir archivo");
              }else if (respuesta == "303") {
                console.log("Archivo vacío");

            }else {
                $("#archivo_subido").val(respuesta);
            }
    
            },
            error:  function(respuesta){
    
                console.log("ocurrio un error: " + respuesta);
                
            },
            complete: function(){
                console.log("Archivo Subido");
            }
    
        }); //termina ajax



    } // termina if

} // termina funcion