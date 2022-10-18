document.getElementById("btnSubmit").addEventListener("click", () => {

    const formAuth = document.forms.formAuth;

    if (Validation.fieldRequired(formAuth)) {

        const request = new XMLHttpRequest();

        const username = document.getElementById("username").value;
        const password = document.getElementById("password").value;

        const params = `action=auth&username=${username}&password=${password}`;

        request.open("POST", "app/Action/Action.php", true);
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        request.onreadystatechange = () => {

            if (request.readyState == 4 && request.status == 200) {

                const response = JSON.parse(request.responseText);

                console.log(response);
            }

        }

        request.send(params);

    }

});