/*
|--------------------------------------------------------------------------
| DELETE TENANT
|--------------------------------------------------------------------------
|
| Konfirmasi password
| Verifikasi password
| SweetAlert
| Hapus tenant ke Recycle Bin
|
*/

document.addEventListener("DOMContentLoaded", () => {

    document.querySelectorAll(".btnDelete").forEach(button => {

        button.addEventListener("click", async function (e) {

            e.preventDefault();

            const id = this.dataset.id;

            const nama = this.dataset.nama;

            /*
            ======================================================
            PASSWORD
            ======================================================
            */

            const { value: password } = await Swal.fire({

                title: "Konfirmasi Password",

                html: `
                    <p>
                        Masukkan password akun Anda
                        untuk melanjutkan.
                    </p>
                `,

                input: "password",

                inputPlaceholder: "Masukkan Password",

                inputAttributes: {

                    autocomplete: "current-password"

                },

                icon: "warning",

                showCancelButton: true,

                confirmButtonText: "Lanjut",

                cancelButtonText: "Batal",

                confirmButtonColor: "#2563eb",

                cancelButtonColor: "#6b7280",

                inputValidator: (value) => {

                    if (!value) {

                        return "Password wajib diisi.";

                    }

                }

            });

            if (!password) return;

            /*
            ======================================================
            VERIFY PASSWORD
            ======================================================
            */

            const response = await fetch("/verify-password", {

                method: "POST",

                headers: {

                    "Content-Type": "application/json",

                    "X-CSRF-TOKEN":
                        document.querySelector(
                            'meta[name="csrf-token"]'
                        ).content

                },

                body: JSON.stringify({

                    password: password

                })

            });

            const resultPassword = await response.json();

            if (!resultPassword.valid) {

                await Swal.fire({

                    icon: "error",

                    title: "Password Salah",

                    text: "Password yang Anda masukkan salah.",

                    confirmButtonColor: "#dc2626"

                });

                return;

            }

            /*
            ======================================================
            KONFIRMASI DELETE
            ======================================================
            */

            const result = await Swal.fire({

                title: "Hapus Tenant?",

                html: `
                    <b>${nama}</b>

                    <br><br>

                    Data akan dipindahkan
                    ke <b>Recycle Bin</b>.
                `,

                icon: "warning",

                showCancelButton: true,

                confirmButtonText: "Ya, Hapus",

                cancelButtonText: "Batal",

                confirmButtonColor: "#dc2626",

                cancelButtonColor: "#6b7280"

            });

            if (!result.isConfirmed) {

                return;

            }

            /*
            ======================================================
            SUBMIT
            ======================================================
            */

            const form = document.createElement("form");

            form.method = "POST";

            form.action = `/tenants/${id}`;

            form.innerHTML = `

                <input
                    type="hidden"
                    name="_token"
                    value="${document.querySelector('meta[name="csrf-token"]').content}">

                <input
                    type="hidden"
                    name="_method"
                    value="DELETE">

                <input
                    type="hidden"
                    name="password"
                    value="${password}">

            `;

            document.body.appendChild(form);

            form.submit();

        });

    });

});