// all modals - .modal, #modal-[NAME]
// all modal openers - .modal-opener, .modal-opener-[NAME]
// close button - .modal_closer (must be inside modal)

const html = document.querySelector("html");
const modalOpeners = document.querySelectorAll(".modal-opener");
const modals = document.querySelectorAll(".modal");

if (modalOpeners?.length > 0 && modals?.length > 0) {
    modalOpeners.forEach((modalOpener) => {
        // get modal-opener modal id
        const modalOpenerClass = Array.from(modalOpener.classList)?.find(
            (className) => className.startsWith("modal-opener-")
        );
        const modalId = modalOpenerClass?.split("-")[2];

        const modal = Array.from(modals).find(
            (modal) => modal?.id === `modal-${modalId}`
        );

        if (modal) {
            // close
            const modalCloseButton = modal.querySelector(".modal_closer");
            if (modalCloseButton) {
                modalCloseButton.addEventListener("click", () => {
                    modal.classList.remove("modal-active");
                    html.classList.remove("noscroll");
                });
            }

            // open
            modalOpener.addEventListener("click", () => {
                modal.classList.add("modal-active");
                html.classList.add("noscroll");
            });

            // close on click of modal overlay
            modal.addEventListener("click", (e) => {
                if (e.target === modal) {
                    modal.classList.remove("modal-active");
                    html.classList.remove("noscroll");
                }
            });
        }
    });
}
