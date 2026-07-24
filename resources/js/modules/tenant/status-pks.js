/*
|--------------------------------------------------------------------------
| STATUS PKS
|--------------------------------------------------------------------------
|
| Mengatur tampil/sembunyi form kontrak
| pada Tambah Tenant dan Edit Tenant.
|
*/

document.addEventListener("DOMContentLoaded", () => {

    /* ==========================================================
     | STATUS PKS TAMBAH
     ========================================================== */

    const statusTambah = document.getElementById("statusPKS");

    const formPKS = document.getElementById("formPKS");

    function cekStatusTambah() {

        if (!statusTambah || !formPKS) return;

        if (statusTambah.value === "Sudah") {

            formPKS.classList.remove("hidden");

        } else {

            formPKS.classList.add("hidden");

        }

    }

    if (statusTambah) {

        cekStatusTambah();

        statusTambah.addEventListener("change", cekStatusTambah);

    }

    /* ==========================================================
     | STATUS PKS EDIT
     ========================================================== */

    const editStatus = document.getElementById("edit_status_pks");

    const editFormPKS = document.getElementById("editFormPKS");

    function cekStatusEdit() {

        if (!editStatus || !editFormPKS) return;

        if (editStatus.value === "Sudah") {

            editFormPKS.classList.remove("hidden");

        } else {

            editFormPKS.classList.add("hidden");

        }

    }

    if (editStatus) {

        cekStatusEdit();

        editStatus.addEventListener("change", cekStatusEdit);

    }

});