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

            //console.log(data);

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

function phoneEstabEdit(id) {

    fetch(`/dashboard/phoneEstab/edit/${id}`).then(function (response) {

        response.json().then(function (data) {

            $("#editNumber").val(data.number);

            document.getElementById("editPhonesEstabModalLabel").innerText = `Editar telefone de  ${data.establishmentName}`;
            document.editPhoneEstabForm.action = `/dashboard/phoneEstab/update/${data.id}`;

        })

    })

}

function userEdit(id) {

    fetch(`/dashboard/users/edit/${id}`).then(function (response) {

        response.json().then(function (data) {

            $("#editName").val(data.name);
            $("#editEmail").val(data.email);
            $("#editCpf").val(data.cpf);

            document.getElementById("editUserModalLabel").innerText = `Editar ${data.name}`;
            document.editUserForm.action = `/dashboard/users/update/${data.id}`;

        })

    })

}

function phoneUserEdit(id) {

    fetch(`/dashboard/phoneUsers/edit/${id}`).then(function (response) {

        response.json().then(function (data) {

            $("#editNumberUser").val(data.number);

            document.getElementById("editphoneUserModalLabel").innerText = `Editar telefone de ${data.name}`;
            document.editPhoneUsersForm.action = `/dashboard/phoneUsers/update/${id}`;

        })

    })

}

function typeEdit(id) {

    fetch(`/dashboard/types/edit/${id}`).then(function (response) {

        response.json().then(function (data) {

            $("#editNameType").val(data.name);

            document.getElementById("editTypeModalLabel").innerText = `Editar ${data.name}`;
            document.editTypeForm.action = `/dashboard/types/update/${id}`;

        })

    })

}

