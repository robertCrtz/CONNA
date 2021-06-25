$(document).ready(function(){   
    $('#example').dataTable({
        "language":{
            "lengthMenu": "Mostrar _MENU_ registros",
            "sSearch": "Buscar",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(Filtrado de un total de _MAX_ registros)",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior",
            },
            "sProcessing": "Procesando...",
        }
    });
});
(function($) {
    "use strict";
    // Add active state to sidbar nav links
    var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
        $("#layoutSidenav_nav .sb-sidenav a.nav-link").each(function() {
            if (this.href === path) {
                $(this).addClass("active");
            }
        });

    // Toggle the side navigation
    $("#sidebarToggle").on("click", function(e) {
        e.preventDefault();
        $("body").toggleClass("sb-sidenav-toggled");
    });
})(jQuery);

$(document).ready(function (){
    $('#busqueda').keyup(function (){
        var resultado = new RegExp($(this).val());
        $('.busquedatabla tr').hide();
        $('.busquedatabla tr').filter(function (){
            return resultado.test($(this).text());
        }).show();
    })
});

function MostrarAlerta(){
    Swal.fire(
        'Good job',
        'Clicked the button',
        'success'
    );
}