export async function verifyDelete(title, text) {

    const { value: password } = await Swal.fire({

        title,

        text,

        input: "password",

        inputPlaceholder: "Masukkan password",

        inputAttributes: {
            autocapitalize: "off",
            autocomplete: "current-password"
        },

        icon: "warning",

        showCancelButton: true,

        confirmButtonText: "Lanjut",

        cancelButtonText: "Batal",

        confirmButtonColor: "#2563eb"

    });

    if (!password) {

        return null;

    }

    const confirm = await Swal.fire({

        title: "Yakin?",

        text: "Data akan dipindahkan ke Recycle Bin.",

        icon: "question",

        showCancelButton: true,

        confirmButtonColor: "#dc2626",

        cancelButtonColor: "#6b7280",

        confirmButtonText: "Ya, Hapus"

    });

    if (!confirm.isConfirmed) {

        return null;

    }

    return password;

}