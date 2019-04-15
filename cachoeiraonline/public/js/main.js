$(document).ready(function () {



});

function adminEdit(id) {

        fetch(`/dashboard/admin/edit/${id}`).then(function (response) {

            response.json().then(function (data) {

                const {id, username} = data;

                $("#editUsername").val(username);
                document.getElementById("adminModalLabel").innerText = `Editar usuário ${username}`;
                document.adminForm.action = `/dashboard/admin/update/${id}`;


            })

        })

}

function establishmentEdit(id) {

    fetch(`/dashboard/establishments/edit/${id}`).then(function (response) {

        response.json().then(function (data) {

            const { id, name, cnpj, address, description, user_id, type_id} = data;

            $(`#editUser_id option[value=${user_id}]`).attr('selected','selected');
            $(`#editType_id option[value=${type_id}]`).attr('selected','selected');
            $("#editName").val(name);
            $("#editCnpj").val(cnpj);
            $("#editAddress").val(address);
            $("#editDescription").val(description);

            document.getElementById("editEstablishmentModalLabel").innerText = `Editar ${name}`;
            document.establishmentForm.action = `/dashboard/establishments/update/${id}`;

        })

    })

}

function phoneEstabEdit(id) {

    fetch(`/dashboard/phoneEstab/edit/${id}`).then(function (response) {

        response.json().then(function (data) {

            const { id, number, establishmentName, establishment_id} = data;

            $(`#editEstablishment_id option[value=${establishment_id}]` ).attr('selected','selected');
            $("#editNumber").val(number);

            document.getElementById("editPhonesEstabModalLabel").innerText = `Editar telefone de  ${establishmentName}`;
            document.editPhoneEstabForm.action = `/dashboard/phoneEstab/update/${id}`;

        })

    })

}

function userEdit(id) {

    fetch(`/dashboard/users/edit/${id}`).then(function (response) {

        response.json().then(function (data) {

            const {id, name, email, cpf} = data;

            $("#editName").val(name);
            $("#editEmail").val(email);
            $("#editCpf").val(cpf);

            document.getElementById("editUserModalLabel").innerText = `Editar ${name}`;
            document.editUserForm.action = `/dashboard/users/update/${id}`;

        })

    })

}

function phoneUserEdit(id) {

    fetch(`/dashboard/phoneUsers/edit/${id}`).then(function (response) {

        response.json().then(function (data) {

            const {id, name, number, user_id} = data;

            $(`#editUser_id option[value=${user_id}]` ).attr('selected','selected');
            $("#editNumberUser").val(number);

            document.getElementById("editphoneUserModalLabel").innerText = `Editar telefone de ${name}`;
            document.editPhoneUsersForm.action = `/dashboard/phoneUsers/update/${id}`;

        })

    })

}

function typeEdit(id) {

    fetch(`/dashboard/types/edit/${id}`).then(function (response) {

        response.json().then(function (data) {

            const {name} = data;

            $("#editNameType").val(name);

            document.getElementById("editTypeModalLabel").innerText = `Editar ${name}`;
            document.editTypeForm.action = `/dashboard/types/update/${id}`;

        })

    })

}

function ratingEdit(id) {

    fetch(`/dashboard/ratings/edit/${id}`).then(function (response) {

        response.json().then(function (data) {

            const {ratings, description, user_id, establishment_id, user_name } = data;

            $(`#editUser_id option[value=${user_id}]` ).attr('selected','selected');
            $(`#editEstablishment_id option[value=${establishment_id}]` ).attr('selected','selected');

           $("#editDescription").val(description);

           const estrela5 = $("#editStar5");
           const estrela4 = $("#editStar4");
           const estrela3 = $("#editStar3");
           const estrela2 = $("#editStar2");
           const estrela1 = $("#editStar1");

           if(estrela5.val() == ratings){

               estrela5.attr('checked','checked');

           }else if (estrela4.val() == ratings){

               estrela4.attr('checked','checked');

           }else if(estrela3.val() == ratings){

               estrela3.attr('checked','checked');

           }else if(estrela2.val() == ratings){

               estrela2.attr('checked','checked');

           }else{

               estrela1.attr('checked','checked')

           }

            document.getElementById("ratingModalLabel").innerText = `Editar avaliação de ${user_name}`;
            document.editRatingForm.action = `/dashboard/ratings/update/${id}`;

        })

    })

}

function addPhoto(id) {

    fetch(`/dashboard/establishments/photos/${id}`).then(function (response) {

        response.json().then(function (data) {

            document.addPhotoForm.action = `/dashboard/establishments/photos/${id}`;

        })

    })

}

