document.addEventListener("DOMContentLoaded", () => {

    /*
    |--------------------------------------------------------------------------
    | ELEMENT
    |--------------------------------------------------------------------------
    */

    const modalCreate = document.getElementById("modalContract");
    const modalEdit = document.getElementById("modalEditContract");
    const modalArchive = document.getElementById("modalArchive");

    const formEdit = document.getElementById("formEditContract");
    const formArchive = document.getElementById("formArchive");

    /*
    |--------------------------------------------------------------------------
    | HELPER
    |--------------------------------------------------------------------------
    */

    function hideAllModal() {

        [
            modalCreate,
            modalEdit,
            modalArchive
        ].forEach(modal => {

            if (!modal) return;

            modal.classList.add("hidden");

        });

    }

    function openModal(modal) {

        if (!modal) return;

        hideAllModal();

        modal.classList.remove("hidden");

    }

    function closeModal(modal) {

        if (!modal) return;

        modal.classList.add("hidden");

    }

    /*
    |--------------------------------------------------------------------------
    | MODAL CREATE
    |--------------------------------------------------------------------------
    */

    const btnTambah = document.getElementById("btnTambahContract");

    const btnCloseCreate = document.getElementById("btnCloseContract");

    const btnCancelCreate = document.getElementById("btnCancelContract");

    if (btnTambah) {

        btnTambah.addEventListener("click", function (e) {

            e.preventDefault();

            openModal(modalCreate);

        });

    }

    if (btnCloseCreate) {

        btnCloseCreate.addEventListener("click", () => {

            closeModal(modalCreate);

        });

    }

    if (btnCancelCreate) {

        btnCancelCreate.addEventListener("click", () => {

            closeModal(modalCreate);

        });

    }

    if (modalCreate) {

        modalCreate.addEventListener("click", function (e) {

            if (e.target === modalCreate) {

                closeModal(modalCreate);

            }

        });

    }

    /*
    |--------------------------------------------------------------------------
    | PREVIEW FILE PDF
    |--------------------------------------------------------------------------
    */

    const uploadPDF = document.getElementById("fileKontrak");
    const namaFile = document.getElementById("namaFile");

    if (uploadPDF && namaFile) {

        uploadPDF.addEventListener("change", function () {

            if (this.files.length > 0) {

                namaFile.innerHTML = "📄 " + this.files[0].name;

            } else {

                namaFile.innerHTML = "Belum ada file dipilih";

            }

        });

    }

    /*
    |--------------------------------------------------------------------------
    | VALIDASI TANGGAL CREATE
    |--------------------------------------------------------------------------
    */

    const mulai = document.querySelector("input[name='mulai']");
    const selesai = document.querySelector("input[name='selesai']");

    if (mulai && selesai) {

        mulai.addEventListener("change", () => {

            selesai.min = mulai.value;

        });

    }

    /*
    |--------------------------------------------------------------------------
    | BACKDROP CREATE
    |--------------------------------------------------------------------------
    */

    if (modalCreate) {

        modalCreate.addEventListener("click", function (e) {

            if (e.target === modalCreate) {

                closeModal(modalCreate);

            }

        });

    }

        
    /*
|--------------------------------------------------------------------------
| MODAL EDIT
|--------------------------------------------------------------------------
*/

const btnCloseEdit = document.getElementById("btnCloseEditContract");

const btnCancelEdit = document.getElementById("btnCancelEditContract");

function closeEditModal() {

    closeModal(modalEdit);

    if(formEdit){

        formEdit.reset();

    }

    const preview=document.getElementById("previewPDF");

    if(preview){

        preview.href="#";

        preview.classList.add("hidden");

    }

}

if(btnCloseEdit){

    btnCloseEdit.addEventListener("click",closeEditModal);

}

if(btnCancelEdit){

    btnCancelEdit.addEventListener("click",closeEditModal);

}

document.querySelectorAll(".btnEditContract").forEach(button=>{

    button.addEventListener("click",async function(e){

        e.preventDefault();

        try{

            const id=this.dataset.id;

            const response=await fetch("/contracts/"+id);

            if(!response.ok){

                throw new Error("Gagal mengambil data kontrak.");

            }

            const data=await response.json();

            formEdit.action="/contracts/"+id;

            document.getElementById("edit_tenant_id").value=data.tenant_id ?? "";

            document.getElementById("edit_nomor_kontrak").value=data.nomor_kontrak ?? "";

            document.getElementById("edit_judul_kontrak").value=data.judul_kontrak ?? "";

            document.getElementById("edit_tanggal_kontrak").value=data.tanggal_kontrak ?? "";

            document.getElementById("edit_mulai").value=data.mulai ?? "";

            document.getElementById("edit_selesai").value=data.selesai ?? "";

            document.getElementById("edit_nilai_kontrak").value=data.nilai_kontrak ?? "";

            document.getElementById("edit_keterangan").value=data.keterangan ?? "";

            const preview=document.getElementById("previewPDF");

            if(data.file_kontrak){

                preview.href="/storage/"+data.file_kontrak;

                preview.classList.remove("hidden");

            }else{

                preview.href="#";

                preview.classList.add("hidden");

            }

            

requestAnimationFrame(() => {

    openModal(modalEdit);

    

});

        }

        catch(error){

            console.error(error);

            Swal.fire({

                icon:"error",

                title:"Gagal",

                text:"Data kontrak tidak dapat dimuat."

            });

        }

    });

});

if(modalEdit){

    modalEdit.addEventListener("click",function(e){

        if(e.target===modalEdit){

            closeEditModal();

        }

    });

}

    /*
    |--------------------------------------------------------------------------
    | VALIDASI TANGGAL EDIT
    |--------------------------------------------------------------------------
    */

    const editMulai = document.getElementById("edit_mulai");
    const editSelesai = document.getElementById("edit_selesai");

    if (editMulai && editSelesai) {

        editMulai.addEventListener("change", () => {

            editSelesai.min = editMulai.value;

        });

    }

    /*
    |--------------------------------------------------------------------------
    | BACKDROP EDIT
    |--------------------------------------------------------------------------
    */

    if (modalEdit) {

        modalEdit.addEventListener("click", function (e) {

            if (e.target === modalEdit) {

                closeEditModal();

            }

        });

    }

    
   /*
|--------------------------------------------------------------------------
| MODAL ARSIP
|--------------------------------------------------------------------------
*/

const btnCloseArchive = document.getElementById("btnCloseArchive");

const btnCancelArchive = document.getElementById("btnCancelArchive");

function closeArchiveModal() {

    closeModal(modalArchive);

    if(formArchive){

        formArchive.reset();

    }

}

if(btnCloseArchive){

    btnCloseArchive.addEventListener("click",closeArchiveModal);

}

if(btnCancelArchive){

    btnCancelArchive.addEventListener("click",closeArchiveModal);

}

document.querySelectorAll(".btnArchive").forEach(button=>{

    button.addEventListener("click",function(e){

        e.preventDefault();

        document.getElementById("archiveTenant").value=this.dataset.tenant;

        document.getElementById("archiveContract").value=this.dataset.kontrak;

        formArchive.action="/contracts/"+this.dataset.id+"/archive";

        

        requestAnimationFrame(() => {

            openModal(modalArchive);

            

        });

    });

});

if(modalArchive){

    modalArchive.addEventListener("click",function(e){

        if(e.target===modalArchive){

            closeArchiveModal();

        }

    });

}

    /*
|--------------------------------------------------------------------------
| DELETE CONTRACT
|--------------------------------------------------------------------------
*/

document.querySelectorAll(".btnDeleteContract").forEach(button=>{

    button.addEventListener("click",async function(e){

        e.preventDefault();

        const id=this.dataset.id;

        const nama=this.dataset.nama;

        const result=await Swal.fire({

            title:"Hapus Kontrak?",

            html:`<b>${nama}</b><br><br>Data akan dipindahkan ke Recycle Bin.`,

            icon:"warning",

            showCancelButton:true,

            confirmButtonText:"Ya, Hapus",

            cancelButtonText:"Batal",

            confirmButtonColor:"#dc2626",

            cancelButtonColor:"#6b7280"

        });

        if(!result.isConfirmed){

            return;

        }

        const form=document.createElement("form");

        form.method="POST";

        form.action="/contracts/"+id;

        form.innerHTML=`

            <input
                type="hidden"
                name="_token"
                value="${document.querySelector('meta[name=csrf-token]').content}">

            <input
                type="hidden"
                name="_method"
                value="DELETE">

        `;

        document.body.appendChild(form);

        form.submit();

    });

});

/*
|--------------------------------------------------------------------------
| RESET FORM
|--------------------------------------------------------------------------
*/

function resetCreateForm(){

    if(!modalCreate) return;

    const form=modalCreate.querySelector("form");

    if(form){

        form.reset();

    }

    if(namaFile){

        namaFile.innerHTML="Belum ada file dipilih";

    }

}

function resetEditForm(){

    if(formEdit){

        formEdit.reset();

    }

    const preview=document.getElementById("previewPDF");

    if(preview){

        preview.href="#";

        preview.classList.add("hidden");

    }

}

function resetArchiveForm(){

    if(formArchive){

        formArchive.reset();

    }

}

/*
|--------------------------------------------------------------------------
| TRANSITION RESET
|--------------------------------------------------------------------------
*/

if(modalCreate){

    modalCreate.addEventListener("transitionend",()=>{

        if(modalCreate.classList.contains("hidden")){

            resetCreateForm();

        }

    });

}

if(modalEdit){

    modalEdit.addEventListener("transitionend",()=>{

        if(modalEdit.classList.contains("hidden")){

            resetEditForm();

        }

    });

}

if(modalArchive){

    modalArchive.addEventListener("transitionend",()=>{

        if(modalArchive.classList.contains("hidden")){

            resetArchiveForm();

        }

    });

}

/*
|--------------------------------------------------------------------------
| ESC KEY
|--------------------------------------------------------------------------
*/

document.addEventListener("keydown",(e)=>{

    if(e.key!=="Escape") return;

    closeModal(modalCreate);

    closeEditModal();

    closeArchiveModal();

});

/*
|--------------------------------------------------------------------------
| AUTO CLOSE SWEETALERT
|--------------------------------------------------------------------------
*/

if(document.querySelector(".swal2-container")){

    setTimeout(()=>{

        Swal.close();

    },3000);

}

/*
|--------------------------------------------------------------------------
| DEBUG
|--------------------------------------------------------------------------
*/

console.log("Contract Module Loaded");

});
