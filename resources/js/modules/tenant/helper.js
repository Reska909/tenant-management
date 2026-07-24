/*
|--------------------------------------------------------------------------
| TENANT HELPER
|--------------------------------------------------------------------------
|
| Helper umum untuk module Tenant.
| Digunakan agar function tidak ditulis berulang.
|
*/

/**
 * Ambil CSRF Token
 */
export function csrfToken() {

    return document
        .querySelector('meta[name="csrf-token"]')
        ?.getAttribute("content");

}

/**
 * Buka Modal
 */
export function openModal(modal) {

    if (!modal) return;

    modal.classList.remove("hidden");

    modal.classList.add("flex");

}

/**
 * Tutup Modal
 */
export function closeModal(modal) {

    if (!modal) return;

    modal.classList.remove("flex");

    modal.classList.add("hidden");

}

/**
 * Reset Form
 */
export function resetForm(form) {

    if (!form) return;

    form.reset();

}

/**
 * Fokus Input Pertama
 */
export function focusFirstInput(form) {

    if (!form) return;

    const input = form.querySelector("input, select, textarea");

    if (input) {

        input.focus();

    }

}

/**
 * SweetAlert Success
 */
export function success(message) {

    Swal.fire({

        icon: "success",

        title: "Berhasil",

        text: message,

        confirmButtonColor: "#2563eb"

    });

}

/**
 * SweetAlert Error
 */
export function error(message) {

    Swal.fire({

        icon: "error",

        title: "Gagal",

        text: message,

        confirmButtonColor: "#dc2626"

    });

}