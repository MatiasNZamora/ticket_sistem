
function init(){
    $("#ticket_form").on("submit", function(e){
        guardaryeditar(e);	
    });
}

$(document).ready(function() {
    $('#tick_descrip').summernote({
        height: 150,
        lang: "es-ES",
        callbacks: {
            onImageUpload: function(image) {
                console.log("Image detect...");
                myimagetreat(image[0]);
            },
            onPaste: function (e) {
                console.log("Text detect...");
            }
        }
    });

    $.post("../../controller/categoria.php?op=combo",function(data, status){
        $('#cat_id').html(data);
    });

});

function guardaryeditar(e){
    e.preventDefault(); // para que no se dispare varias veces el boton
    
    var formData = new FormData($("#ticket_form")[0]);

    if ($('#tick_descrip').summernote('isEmpty') || $('#tick_titulo').val()==''){
        swal("Oops!", "Complete los campos vacios", "warning");
    }else{
        $.ajax({
            url: "../../controller/ticket.php?op=insert",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(datos){  
                $('#tick_titulo').val('');
                $('#tick_descrip').summernote('reset');
                swal("Correcto!", "Ticket Registrado", "success");
            }  
        }); 
        
    }
};

init();