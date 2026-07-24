document.addEventListener("DOMContentLoaded", () => {

    /*
    |--------------------------------------------------------------------------
    | MODAL TAMBAH USER
    |--------------------------------------------------------------------------
    */

    const modalTambah = document.getElementById("modalTambahUser");

    const btnTambah = document.getElementById("btnTambahUser");

    const btnCloseTambah = document.getElementById("closeTambahUser");

    const btnBatalTambah = document.getElementById("batalTambahUser");

    if(btnTambah){

        btnTambah.onclick=()=>{

            modalTambah.classList.remove("hidden");

            modalTambah.classList.add("flex");

        }

    }

    function closeTambah(){

        modalTambah.classList.add("hidden");

        modalTambah.classList.remove("flex");

    }

    btnCloseTambah?.addEventListener("click",closeTambah);

    btnBatalTambah?.addEventListener("click",closeTambah);

    modalTambah?.addEventListener("click",(e)=>{

        if(e.target===modalTambah){

            closeTambah();

        }

    });



/*
|--------------------------------------------------------------------------
| MODAL EDIT USER
|--------------------------------------------------------------------------
*/

const modalEdit = document.getElementById("modalEditUser");

const modalEditContent =
document.getElementById("modalEditUserContent");

const formEdit = document.getElementById("formEditUser");

const btnCloseEdit =
document.getElementById("btnCloseEditUser");

const btnBatalEdit =
document.getElementById("btnCancelEditUser");

function closeEdit(){

    modalEditContent.classList.add("scale-95");

    modalEditContent.classList.add("opacity-0");

    setTimeout(()=>{

        modalEdit.classList.add("hidden");

        modalEdit.classList.remove("flex");

    },250);

}

btnCloseEdit?.addEventListener("click",closeEdit);

btnBatalEdit?.addEventListener("click",closeEdit);

modalEdit?.addEventListener("click",(e)=>{

    if(e.target===modalEdit){

        closeEdit();

    }

});

document.querySelectorAll(".btnEditUser").forEach(button=>{

    button.addEventListener("click",()=>{

        formEdit.action="/users/"+button.dataset.id;

        document.getElementById("edit_name").value =
        button.dataset.name;

        document.getElementById("edit_email").value =
        button.dataset.email;

        document.getElementById("edit_role").value =
        button.dataset.role;

        document.getElementById("edit_status").value =
        button.dataset.status;

        modalEdit.classList.remove("hidden");

        modalEdit.classList.add("flex");

        setTimeout(()=>{

            modalEditContent.classList.remove("scale-95");

            modalEditContent.classList.remove("opacity-0");

        },50);

    });

});



    /*
    |--------------------------------------------------------------------------
    | DELETE USER
    |--------------------------------------------------------------------------
    */

    document.querySelectorAll(".formDeleteUser").forEach(form=>{

        form.addEventListener("submit",(e)=>{

            e.preventDefault();

            Swal.fire({

                title:"Hapus User?",

                text:"User akan dihapus dari sistem.",

                icon:"warning",

                showCancelButton:true,

                confirmButtonColor:"#dc2626",

                cancelButtonColor:"#6b7280",

                confirmButtonText:"Ya, Hapus",

                cancelButtonText:"Batal"

            }).then((result)=>{

                if(result.isConfirmed){

                    form.submit();

                }

            });

        });

    });

    /*
|--------------------------------------------------------------------------
| RESET PASSWORD
|--------------------------------------------------------------------------
*/

const modalPassword = document.getElementById("modalPassword");

const modalPasswordContent = document.getElementById("modalPasswordContent");

const formPassword = document.getElementById("formPassword");

const btnClosePassword = document.getElementById("btnClosePassword");

const btnCancelPassword = document.getElementById("btnCancelPassword");

function closePassword(){

    modalPasswordContent.classList.add("scale-95");

    modalPasswordContent.classList.add("opacity-0");

    setTimeout(()=>{

        modalPassword.classList.add("hidden");

        modalPassword.classList.remove("flex");

    },250);

}

btnClosePassword?.addEventListener("click",closePassword);

btnCancelPassword?.addEventListener("click",closePassword);

modalPassword?.addEventListener("click",(e)=>{

    if(e.target===modalPassword){

        closePassword();

    }

});

    document.querySelectorAll(".btnResetPassword").forEach(button=>{

        button.addEventListener("click",()=>{

            const id = button.dataset.id;

            formPassword.action="/users/"+id+"/password";

            formPassword.reset();

            modalPassword.classList.remove("hidden");

            modalPassword.classList.add("flex");

            setTimeout(()=>{

                modalPasswordContent.classList.remove("scale-95");

                modalPasswordContent.classList.remove("opacity-0");

            },50);

        });

    });

    /*
|--------------------------------------------------------------------------
| LOADING
|--------------------------------------------------------------------------
*/

document.querySelectorAll("form").forEach(form=>{

    form.addEventListener("submit",()=>{

        Swal.fire({

            title:"Memproses",

            text:"Mohon tunggu...",

            allowOutsideClick:false,

            didOpen:()=>{

                Swal.showLoading();

            }

        });

    });

});

});