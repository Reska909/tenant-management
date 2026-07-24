export function openModal(modal) {

    window.scrollTo({
        top: 0,
        behavior: "smooth"
    });

    document.body.classList.add("overflow-hidden");

    modal.classList.remove("hidden");
    modal.classList.add("flex");
}

export function closeModal(modal) {

    document.body.classList.remove("overflow-hidden");

    modal.classList.remove("flex");
    modal.classList.add("hidden");
}