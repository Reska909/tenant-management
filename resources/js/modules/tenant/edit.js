/*
|--------------------------------------------------------------------------
| EDIT TENANT
|--------------------------------------------------------------------------
|
| Mengambil data tenant dari server,
| mengisi form edit,
| lalu membuka modal edit.
|
*/

document.addEventListener("DOMContentLoaded", () => {

    const modalEdit = document.getElementById("modalEditTenant");

    const formEdit = document.getElementById("formEditTenant");

    function bukaEdit() {

        if (!modalEdit) return;

        modalEdit.classList.remove("hidden");

        modalEdit.classList.add("flex");

    }

    document.querySelectorAll(".btnEdit").forEach(button => {

        button.addEventListener("click", async function () {

            try {

                const id = this.dataset.id;

                const response = await fetch(`/tenants/${id}`);

                if (!response.ok) {

                    throw new Error("Gagal mengambil data tenant.");

                }

                const data = await response.json();

                if (formEdit) {

                    formEdit.action = `/tenants/${id}`;

                }

                document.getElementById("edit_nama_tenant").value =
                    data.nama_tenant ?? "";

                document.getElementById("edit_nama_pic").value =
                    data.nama_pic ?? "";

                document.getElementById("edit_no_hp_pic").value =
                    data.no_hp_pic ?? "";

                document.getElementById("edit_instansi").value =
                    data.instansi ?? "";

                document.getElementById("edit_jenis_layanan").value =
                    data.jenis_layanan ?? "";

                document.getElementById("edit_status_pks").value =
                    data.status_pks ?? "";

                document.getElementById("edit_nomor_kontrak").value =
                    data.nomor_kontrak ?? "";

                document.getElementById("edit_tanggal_pks").value =
                    data.tanggal_pks ?? "";

                document.getElementById("edit_masa_mulai").value =
                    data.masa_mulai ?? "";

                document.getElementById("edit_masa_berakhir").value =
                    data.masa_berakhir ?? "";

                document.getElementById("edit_lokasi_ruangan").value =
                    data.lokasi_ruangan ?? "";

                document.getElementById("edit_rak").value =
                    data.rak ?? "";

                /*
                Refresh status PKS
                */

                document
                    .getElementById("edit_status_pks")
                    .dispatchEvent(new Event("change"));

                bukaEdit();

            } catch (error) {

                console.error(error);

                Swal.fire({

                    icon: "error",

                    title: "Gagal",

                    text: "Data tenant tidak dapat dimuat.",

                    confirmButtonColor: "#dc2626"

                });

            }

        });

    });

});