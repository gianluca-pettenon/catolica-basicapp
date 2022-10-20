const Modal = {

    show: (element) => {

        const instanceModal = new bootstrap.Modal(document.getElementById(element), {});

        return instanceModal.show();

    },

    hide: (element) => {

        const instanceModal = new bootstrap.Modal(document.getElementById(element), {});

        return instanceModal.hide();
    }

}

const Validation = {

    fieldRequired: (objectForm) => {

        for (let field of objectForm) {

            if (document.getElementById(field.name) && document.getElementById(field.name).hasAttribute("required")) {

                if (document.getElementById(field.name).value == "") {
                    Message.toast(`O campo ${field.name} é obrigatório.`);
                    return false;
                }

            }

        }

        return true;

    }

}

const Config = {

    toast: () => {
        return {
            duration: 2000,
            style: {
                main: {
                    background: "#ffc107",
                    color: "#fff",
                },
            },
        };
    },

}

const Message = {

    toast: (message) => {
        return iqwerty.toast.toast(message, Config.toast());
    },

}