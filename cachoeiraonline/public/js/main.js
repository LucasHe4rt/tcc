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

function ratingEdit(id) {

    fetch(`/dashboard/ratings/edit/${id}`).then(function (response) {

        response.json().then(function (data) {

            // console.log(data);

            $(`#editUsers_id option[value=${data.users_id}]` ).attr('selected','selected');
            $(`#editEstablishments_id option[value=${data.establishments_id}]` ).attr('selected','selected');

           $("#editDescription").val(data.description);

           const estrela5 = $("#editStar5");
           const estrela4 = $("#editStar4");
           const estrela3 = $("#editStar3");
           const estrela2 = $("#editStar2");
           const estrela1 = $("#editStar1");

           if(estrela5.val() == data.ratings){

               estrela5.attr('checked','checked');

           }else if (estrela4.val() == data.ratings){

               estrela4.attr('checked','checked');

           }else if(estrela3.val() == data.ratings){

               estrela3.attr('checked','checked');

           }else if(estrela2.val() == data.ratigs){

               estrela2.attr('checked','checked');

           }else{

               estrela1.attr('checked','checked')

           }

            document.getElementById("ratingModalLabel").innerText = `Editar avaliação de ${data.user_name}`;
            document.editRatingForm.action = `/dashboard/ratings/update/${id}`;

        })

    })

}

