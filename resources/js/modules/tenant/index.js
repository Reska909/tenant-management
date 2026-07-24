/*
|--------------------------------------------------------------------------
| Tenant Module
|--------------------------------------------------------------------------
|
| Seluruh JavaScript Tenant dipusatkan di file ini.
| Setiap fitur dipisahkan menjadi module agar lebih mudah
| dipelihara dan dikembangkan.
|
*/

import "./modal";

import "./status-pks";

import "./edit";

import "./delete";

import "./wizard";

import "./helper";

/*
|--------------------------------------------------------------------------
| JENIS LAYANAN
|--------------------------------------------------------------------------
*/

const jenisLayanan = document.getElementById("jenisLayanan");

const lokasiRuangan = document.getElementById("lokasiRuangan");

const rak = document.getElementById("rak");

if (jenisLayanan && lokasiRuangan && rak) {

    function toggleLokasi() {

        if (jenisLayanan.value === "VPS") {

            lokasiRuangan.value = "";

            lokasiRuangan.disabled = true;

            rak.value = "-";

            rak.readOnly = true;

            rak.classList.add("bg-gray-100");

        } else {

            lokasiRuangan.disabled = false;

            rak.readOnly = false;

            rak.value = "";

            rak.classList.remove("bg-gray-100");

        }

    }

    toggleLokasi();

    jenisLayanan.addEventListener("change", toggleLokasi);

}

/*
|--------------------------------------------------------------------------
| LOADING
|--------------------------------------------------------------------------
*/

document.querySelectorAll("form").forEach(form=>{

    form.addEventListener("submit",()=>{

        Swal.fire({

            title:"Menyimpan Data",

            text:"Mohon tunggu...",

            allowOutsideClick:false,

            didOpen:()=>{

                Swal.showLoading();

            }

        });

    });

});