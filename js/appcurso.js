$(document).ready(function() {
    obtenerCursos();

    function obtenerCursos() {
        $.ajax({
            url: 'academia/curso/listar-curso.php', 
            type: 'GET',
            success: function(response) {
                let cursos = JSON.parse(response);
                let plantilla = '';
                cursos.forEach(curso => {
                    plantilla += `
                    <tr cursoId="${curso.idcurso}">
                        <td>${curso.idcurso}</td>
                        <td>${curso.nombreCurso}</td>
                        <td>${curso.nivelCurso}</td>
                        <td>${curso.precio}</td>
                        <td>
                            <button class="editarCurso btn btn-info btn-block btn-sm">Editar</button>
                            <button class="eliminarCurso btn btn-danger btn-block btn-sm">Eliminar</button>
                        </td>                    
                    </tr>`;
                });
                $('#cursos').html(plantilla);
            }
        });
    }

    $('#curso-form').submit(function(e) {
        const postData = {
            nombreCurso: $('#nombreCurso').val(),
            nivelCurso: $('#nivelCurso').val(),
            precio: $('#precio').val(),
            idcurso: $('#cursoId').val()
        };

        let url = $('#cursoId').val() ? 'academia/curso/editar-curso.php' : 'academia/curso/agregar-curso.php';

        $.post(url, postData, function(response) {
            console.log(response);
            obtenerCursos();
            $('#curso-form').trigger('reset');
            $('#cursoId').val(''); 
        });

        e.preventDefault();
    });

    $(document).on('click', '.eliminarCurso', function() {
        if (confirm('¿Está seguro de querer eliminar este curso?')) {
            let elemento = $(this)[0].parentElement.parentElement;
            let id = $(elemento).attr('cursoId');
            $.post('academia/curso/eliminar-curso.php', { id }, function(response) {
                console.log(response); 
                obtenerCursos();
            });
        }
    });

    $(document).on('click', '.editarCurso', function() {
        let elemento = $(this)[0].parentElement.parentElement;
        let id = $(elemento).attr('cursoId');
        $.post('academia/curso/encontrar-curso.php', { id }, function(response) {
            const curso = JSON.parse(response);
            $('#nombreCurso').val(curso.nombreCurso);
            $('#nivelCurso').val(curso.nivelCurso);
            $('#precio').val(curso.precio);
            $('#cursoId').val(curso.idcurso);
        });
    });
});
