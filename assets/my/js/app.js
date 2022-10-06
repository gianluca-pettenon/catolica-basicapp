document.getElementById("btnClear").addEventListener("click", () => {
    document.getElementById("formUser").reset();
});

document.getElementById("btnSubmit").addEventListener("click", () => {

    const formUser = document.forms.formUser;

    for (let field of formUser) {

        if (document.getElementById(field.name) && document.getElementById(field.name).hasAttribute("required")) {

            if (document.getElementById(field.name).value == "") {
                Message.toast(`O campo ${field.name} é obrigatório.`);
                return;
            }

        }

    }

    document.getElementById("formUser").submit();

});

const deleteRegister = (id) => {

    const request = new XMLHttpRequest();

    const params = `action=delete&id=${id}`;

    request.open("POST", "app/Action/Action.php", true);
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.send(params);

    location.reload();

}

const editRegister = (id) => {

    const request = new XMLHttpRequest();

    const params = `action=fetch&id=${id}`;

    request.open("POST", "app/Action/Action.php", true);
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    request.onreadystatechange = () => {

        if (request.readyState == 4 && request.status == 200) {

            const userData = JSON.parse(request.responseText);

            document.getElementById("action").value = "update";
            document.getElementById("id").value = id;

            document.getElementById("name").value = userData.name;
            document.getElementById("mail").value = userData.mail;
            document.getElementById("birthday").value = userData.birthday;
            document.getElementById("state").value = userData.state;
            document.getElementById("address").value = userData.address;
            document.querySelector(`input[name=genre][value=${userData.genre}]`).checked = true;
            document.querySelector(`input[name=creditcard][value=${userData.creditcard}]`).checked = true;

            Modal.show("userModal");
        }

    }

    request.send(params);
}
