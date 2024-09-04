function load(){
    $.ajax({
        url: '/CRUDUsers/app/controllers/users/obtener_usuarios.php',
        method: 'GET',
        dataType: 'json',
        success: function(data) {
            var tableBody = $('#userTableBody');
            tableBody.empty();
            let dataHTML = data.map(function(element){
                element = {...element, ...{edit:"<a href='/CRUDUsers/resources/templates/users/update_user.php?id=" + element.id + "'>&#x270f;</a>"}}
                element = {...element, ...{delete:"<i class=\"fas fa-trash\" onclick=\"deleteUser("+element.id+")\"></li>"}}
                return element;
            });
            $('#usersTable').DataTable( {
                data: dataHTML,
                columns: [
                    { data: 'id' },
                    { data: 'username' },
                    { data: 'email' },
                    { data: 'cellphone' },
                    { data: 'role' },
                    { data: 'join_date' },
                    { data: 'salary' },
                    { data: 'edit' },
                    { data: 'delete' }
                ],
                language: {
                    processing:     "Traitement en cours...",
                    search:         "Buscador:",
                    lengthMenu:     "Mostrar _MENU_ entradas",
                    info:           "Mostrando de _START_ a _END_ de _TOTAL_ entradas",
                    infoEmpty:      "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
                    infoFiltered:   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                    infoPostFix:    "",
                    loadingRecords: "Chargement en cours...",
                    zeroRecords:    "Aucun &eacute;l&eacute;ment &agrave; afficher",
                    emptyTable:     "Aucune donnée disponible dans le tableau",
                    paginate: {
                        first:      "Primero",
                        previous:   "Previo",
                        next:       "Siguiente",
                        last:       "Último"
                    },
                    aria: {
                        sortAscending:  ": activer pour trier la colonne par ordre croissant",
                        sortDescending: ": activer pour trier la colonne par ordre décroissant"
                    }
                }
            } );
        },
        error: function(jqXHR, textStatus, errorThrown) {
            window.location.href = '/CRUDUsers/resources/templates/login/login.php';
        }
    });
}

function loadDataUser(userId){
    $.ajax({
        url: '/CRUDUsers/app/controllers/users/obtener_usuario.php',
        type: 'GET',
        data: { id: userId },
        success: function(response) {
            const usuario = JSON.parse(response);
            $('#id').val(usuario.id);
            $('#email').val(usuario.email);
            $('#cellphone').val(usuario.cellphone);
            $('#join_date').val(usuario.join_date);
            $('#gender').val(usuario.gender);
            $('#role').val(usuario.role);
            $('#salary').val(usuario.salary);
        },
        error: function() {
            $('#mensaje').text('Error al cargar los datos del usuario.').css('color', 'red');
        }
    });
}

function deleteUser(userId){
    $.ajax({
        url: '/CRUDUsers/app/controllers/users/eliminar_usuario.php',
        type: 'GET',
        data: { id: userId },
        success: function(response) {
            console.log(response)
            window.location.href = '/CRUDUsers/index.php';
        },
        error: function() {
            $('#mensaje').text('Error al cargar los datos del usuario.').css('color', 'red');
        }
    });
}

$(document).ready(function() {
    $('#createUserForm').on('submit', function(event) {
        event.preventDefault(); 
        const password = $('#password').val();
        const confirmPassword = $('#confirmPassword').val();
        const mensaje = $('#mensaje');

        if (password === confirmPassword) {
            
            const formData = {
                username: $('#username').val(),
                password: $('#password').val(),
                email: $('#email').val(),
                cellphone: $('#cellphone').val(),
                gender: $('#gender').val(),
                role: $('#role').val(),
                salary: $('#salary').val()
            }

            $.ajax({
                url: '/CRUDUsers/app/controllers/users/agregar_usuario.php',
                type: 'POST',
                data: formData,
                success: function(response) {
                    window.location.replace('/CRUDUsers/index.php');
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    if (jqXHR.status === 401) {
                        window.location.href = '/CRUDUsers/resources/templates/login/login.php'; // Redirigir a la página de inicio de sesión
                    } else {
                        console.error('Error al obtener los usuarios:', textStatus, errorThrown);
                    }
                }
            });
            return false
        } else {
            mensaje.text('Las contraseñas no coinciden.').css('color', 'red');
        }
    });

    $('#editarForm').on('submit', function(event) {
        event.preventDefault(); // Evita el envío del formulario

        const formData = {
            id: $('#id').val(),
            password: $('#password').val(),
            email: $('#email').val(),
            cellphone: $('#cellphone').val(),
            join_date: $('#join_date').val(),
            gender: $('#gender').val(),
            role: $('#role').val(),
            salary: $('#salary').val()
        };

        $.ajax({
            url: '/CRUDUsers/app/controllers/users/editar_usuario.php',
            type: 'POST',
            data: formData,
            success: function(response) {
                console.log(response)
                window.location.href = '/CRUDUsers/index.php';
            },
            error: function() {
                $('#mensaje').text('Error al actualizar el usuario.').css('color', 'red');
            }
        });
    });
})
