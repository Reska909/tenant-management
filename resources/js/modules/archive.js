document.addEventListener("DOMContentLoaded",()=>{

document.querySelectorAll(".btnDeleteArchive").forEach(button=>{

button.onclick=async function(){

const id=this.dataset.id;

const nama=this.dataset.nama;

const { value: password } = await Swal.fire({

    

    title: "Konfirmasi Password",

    text: "Masukkan password Administrator",

    input: "password",

    inputPlaceholder: "Password",

    inputAttributes: {

        autocomplete: "new-password",

        autocorrect: "off",

        autocapitalize: "off",

        spellcheck: "false"

    },

    didOpen: () => {

        const input = Swal.getInput();

        input.value = "";

        input.removeAttribute("name");

        input.setAttribute("autocomplete","off");

        input.setAttribute("readonly","readonly");

        input.blur();

        setTimeout(() => {

            input.removeAttribute("readonly");

            input.focus();

        },100);

    },

    showCancelButton: true,

    confirmButtonText: "Lanjut",

    cancelButtonText: "Batal",

    confirmButtonColor: "#2563eb",

    cancelButtonColor: "#6b7280"

});

if(!password) return;

const response = await fetch('/verify-password', {

    method: 'POST',

    headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': document
            .querySelector('meta[name="csrf-token"]').content
    },

    body: JSON.stringify({
        password: password
    })

});

const resultPassword = await response.json();

if (!resultPassword.valid) {

    await Swal.fire({

        icon: 'error',

        title: 'Password Salah',

        text: 'Password yang Anda masukkan salah.',

        confirmButtonColor: '#dc2626'

    });

    return;
}

const result=await Swal.fire({

title:"Yakin?",

html:`${nama}<br><br>akan dipindahkan ke Recycle Bin.`,

icon:"warning",

showCancelButton:true,

confirmButtonText:"Ya"

});

if(!result.isConfirmed) return;

const form=document.createElement("form");

form.method="POST";

form.action="/archives/"+id;

form.innerHTML=`

<input type="hidden"

name="_token"

value="${document.querySelector('meta[name=csrf-token]').content}">

<input type="hidden"

name="_method"

value="DELETE">

<input type="hidden"

name="password"

value="${password}">

`;

document.body.appendChild(form);

form.submit();

};

});

});