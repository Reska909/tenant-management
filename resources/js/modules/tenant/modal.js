import {

    openModal,

    closeModal,

    resetForm,

    focusFirstInput

} from "./helper";

/*
|--------------------------------------------------------------------------
| TENANT MODAL
|--------------------------------------------------------------------------
|
| Mengatur:
| - Modal Tambah Tenant
| - Modal Edit Tenant
| - Reset Form
| - Close Modal
| - Backdrop Click
| - ESC
|
*/

document.addEventListener("DOMContentLoaded", () => {

    /* ==========================================================
     | MODAL TAMBAH
     ========================================================== */

    const modalTambah = document.getElementById("modalTenant");

    const btnTambah = document.getElementById("btnTambahTenant");

    const btnBatal = document.getElementById("btnBatal");

    const btnClose = document.getElementById("btnCloseModal");

    function bukaTambah() {

        if (!modalTambah) return;

        openModal(modalTambah);

    }

    function tutupTambah() {

        if (!modalTambah) return;

        closeModal(modalTambah);

    }

    if (btnTambah) {

        btnTambah.addEventListener("click", bukaTambah);

    }

    if (btnBatal) {

        btnBatal.addEventListener("click", tutupTambah);

    }

    if (btnClose) {

        btnClose.addEventListener("click", tutupTambah);

    }



    /* ==========================================================
     | MODAL EDIT
     ========================================================== */

    const modalEdit = document.getElementById("modalEditTenant");

    const btnCloseEdit = document.getElementById("btnCloseEdit");

    const btnCancelEdit = document.getElementById("btnCancelEdit");

    function bukaEdit() {

        if (!modalEdit) return;

        modalEdit.classList.remove("hidden");

        modalEdit.classList.add("flex");

    }

    function tutupEdit() {

        if (!modalEdit) return;

        modalEdit.classList.remove("flex");

        modalEdit.classList.add("hidden");

    }

    if (btnCloseEdit) {

        btnCloseEdit.addEventListener("click", tutupEdit);

    }

    if (btnCancelEdit) {

        btnCancelEdit.addEventListener("click", tutupEdit);

    }



    /* ==========================================================
     | RESET FORM TAMBAH
     ========================================================== */

    if (modalTambah) {

        modalTambah.addEventListener("transitionend", () => {

            if (modalTambah.classList.contains("hidden")) {

                const form = modalTambah.querySelector("form");

                if (form) {

                    resetForm(form);

                }

            }

        });

    }



    /* ==========================================================
     | BACKDROP CLICK
     ========================================================== */

    if (modalTambah) {

        modalTambah.addEventListener("click", function (e) {

            if (e.target === modalTambah) {

                tutupTambah();

            }

        });

    }

    if (modalEdit) {

        modalEdit.addEventListener("click", function (e) {

            if (e.target === modalEdit) {

                tutupEdit();

            }

        });

    }



    /* ==========================================================
     | ESC KEY
     ========================================================== */

    document.addEventListener("keydown", function (e) {

        if (e.key === "Escape") {

            tutupTambah();

            tutupEdit();

        }

    });

});