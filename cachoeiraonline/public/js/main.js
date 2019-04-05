$(document).ready(function () {



});


function adminEdit(id) {

        fetch(`/dashboard/admin/edit/${id}`).then(function (response) {

            response.json().then(function (data) {

                $("#editUsername").val(data.username);
                document.getElementById("adminModalLabel").innerText = `Editar usuário ${data.username}`;
                document.adminForm.action = `/dashboard/admin/update/${data.id}`;

              //  console.log(data.username)

            })

        })

}

function establishmentEdit(id) {

    fetch(`/dashboard/establishments/edit/${id}`).then(function (response) {

        response.json().then(function (data) {

            console.log(data);

            $("#editName").val(data.name);
            $("#editCnpj").val(data.cnpj);
            $("#editAddress").val(data.address);
            $("#editDescription").val(data.description);
            // $("").val(data.);
            // $("").val(data.);

            document.getElementById("editEstablishmentModalLabel").innerText = `Editar ${data.name}`;
            document.establishmentForm.action = `/dashboard/establishments/update/${data.id}`;

        })

    })

}

