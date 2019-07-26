<script>
$(document).ready(function () {
    var base_url = "<?php echo base_url(); ?>";

    $(".btn-view-usuario").on("click", function(){
        //Obtiene el id que esta en el atributo value
        var id = $(this).val();
        $.ajax({
            url: base_url + "administrador/usuarios/view_usuario/" + id,
            type: "POST",
            success:function(resp){
                $("#modal-usuario .modal-body").html(resp);
                //alert(resp);
            }
        });
    });
	
    $(".btn-delete-usuario").on("click", function(){
        //Obtiene el id que esta en el atributo value
        var id = $(this).val();
        if (confirm('Realmente deseas eliminar al usuario ?')){
            $.ajax({
                url: base_url + "administrador/usuarios/delete_usuario/" + id,
                type: "POST",
                success:function(resp){
                    alert(resp);
                    // redirijo sin poderse devolver
                    window.location.replace(base_url + "administrador/usuarios");
                }
            });
        }
    });

    $('#tabla_usuarios').DataTable({
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "No se encontraron resultados en su busqueda",
            "searchPlaceholder": "Buscar registros",
            "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
            "infoEmpty": "No existen registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "search": "Buscar:",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
        }
    });
	$('.sidebar-menu').tree();
});
</script>