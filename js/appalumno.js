$(document).ready(function() {
    obtenerAlumnos();

    function obtenerAlumnos() {
        $.ajax({
            url: 'academia/alumno/listar-alumno.php', 
            type: 'GET',
            success: function(response) {
                let alumnos = JSON.parse(response);
                let plantilla = '';
                alumnos.forEach(alumno => {
                    plantilla += `
                    <tr alumnoId="${alumno.idalumno}">
                        <td>${alumno.idalumno}</td>
                        <td>${alumno.nombre}</td>
                        <td>${alumno.apellido}</td>
                        <td>${alumno.numero}</td>
                        <td>${alumno.fechaNacimiento}</td>
                        <td>${alumno.sexo}</td>
                        <td>
                            <button class="editarAlumno btn btn-info btn-sm">Editar</button>
                            <button class="eliminarAlumno btn btn-danger btn-sm">Eliminar</button>
                        </td>                    
                    </tr>`;
                });
                $('#alumnos').html(plantilla);
            }
        });
    }

    $('#alumno-form').submit(function(e) {
        const postData = {
            nombre: $('#nombre').val(),
            apellido: $('#apellido').val(),
            numero: $('#numero').val(),
            fechaNacimiento: $('#fechaNacimiento').val(),
            sexo: $('#sexo').val(),
            idalumno: $('#alumnoId').val()
        };

        let url = $('#alumnoId').val() ? 'academia/alumno/editar-alumno.php' : 'academia/alumno/agregar-alumno.php';

        $.post(url, postData, function(response) {
            console.log(response); 
            obtenerAlumnos();
            $('#alumno-form').trigger('reset');
            $('#alumnoId').val(''); 
        });

        e.preventDefault();
    });

    $(document).on('click', '.eliminarAlumno', function() {
        if (confirm('¿Está seguro de querer eliminar este alumno?')) {
            let elemento = $(this)[0].parentElement.parentElement;
            let id = $(elemento).attr('alumnoId');
            $.post('academia/alumno/eliminar-alumno.php', { id }, function(response) {
                console.log(response); 
                obtenerAlumnos();
            });
        }
    });

    $(document).on('click', '.editarAlumno', function() {
        let elemento = $(this)[0].parentElement.parentElement;
        let id = $(elemento).attr('alumnoId');
        $.post('academia/alumno/encontrar-alumno.php', { id }, function(response) {
            const alumno = JSON.parse(response);
            $('#nombre').val(alumno.nombre);
            $('#apellido').val(alumno.apellido);
            $('#numero').val(alumno.numero);
            $('#fechaNacimiento').val(alumno.fechaNacimiento);
            $('#sexo').val(alumno.sexo);
            $('#alumnoId').val(alumno.idalumno);
        });
    });
});
