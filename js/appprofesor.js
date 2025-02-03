$(document).ready(function() {
    obtenerProfesores();

    function obtenerProfesores() {
        $.ajax({
            url: 'academia/profesor/listar-profesor.php', 
            type: 'GET',
            success: function(response) {
                let profesores = JSON.parse(response);
                let plantilla = '';
                profesores.forEach(profesor => {
                    plantilla += `
                    <tr profesorId="${profesor.idprofesor}">
                        <td>${profesor.idprofesor}</td>
                        <td>${profesor.nombre}</td>
                        <td>${profesor.apellido}</td>
                        <td>${profesor.telefono}</td>
                        <td>${profesor.fechaNacimiento}</td>
                        <td>${profesor.sexo}</td>
                        <td>
                            <button class="editarProfesor btn btn-info btn-sm">Editar</button>
                            <button class="eliminarProfesor btn btn-danger btn-sm">Eliminar</button>
                        </td>                    
                    </tr>`;
                });
                $('#profesores').html(plantilla);
            }
        });
    }

    $('#profesor-form').submit(function(e) {
        const postData = {
            nombre: $('#nombre').val(),
            apellido: $('#apellido').val(),
            telefono: $('#telefono').val(),
            fechaNacimiento: $('#fechaNacimiento').val(),
            sexo: $('#sexo').val(),
            idprofesor: $('#profesorId').val()
        };

        let url = $('#profesorId').val() ? 'academia/profesor/editar-profesor.php' : 'academia/profesor/agregar-profesor.php';

        $.post(url, postData, function(response) {
            console.log(response); 
            obtenerProfesores();
            $('#profesor-form').trigger('reset');
            $('#profesorId').val(''); 
        });

        e.preventDefault();
    });

    $(document).on('click', '.eliminarProfesor', function() {
        if (confirm('¿Está seguro de querer eliminar este profesor?')) {
            let elemento = $(this)[0].parentElement.parentElement;
            let id = $(elemento).attr('profesorId');
            $.post('academia/profesor/eliminar-profesor.php', { id }, function(response) {
                console.log(response); 
                obtenerProfesores();
            });
        }
    });

    $(document).on('click', '.editarProfesor', function() {
        let elemento = $(this)[0].parentElement.parentElement;
        let id = $(elemento).attr('profesorId');
        $.post('academia/profesor/encontrar-profesor.php', { id }, function(response) {
            const profesor = JSON.parse(response);
            $('#nombre').val(profesor.nombre);
            $('#apellido').val(profesor.apellido);
            $('#telefono').val(profesor.telefono);
            $('#fechaNacimiento').val(profesor.fechaNacimiento);
            $('#sexo').val(profesor.sexo);
            $('#profesorId').val(profesor.idprofesor);
        });
    });
});
