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