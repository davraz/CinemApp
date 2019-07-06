
function get_aforo() {
    // clear container
    $("#content").empty();

    $(".reserved").each(function( i ) {
        //console.log( $(this).text() );
        
        // add html content
        $("#content").append("<div>" + $(this).text() + "</div>"); 
    });
}

function save_aforo() {

    $(".reserved").each(function( i ) {
        $.post( "/reservarFunciones/reserva", { '_token': $('meta[name=csrf-token]').attr('content'), 
                silla_id: $(this).attr('data-chair'), 
                usuario: $("#usuario").attr('data-codigo') }).done(function( data ) {
                alert( "Data Loaded: " + data );
        });
    });

}

$( document ).ready(function() {
    
        $("#sala .chair").click(function() {
            if ( $(this).hasClass('reserved') ) {
                $(this).removeClass('reserved');
            } else {
                $(this).addClass('reserved');
            }
            get_aforo();
        });

});