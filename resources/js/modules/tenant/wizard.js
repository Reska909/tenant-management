/*
|--------------------------------------------------------------------------
| TENANT WIZARD
|--------------------------------------------------------------------------
|
| Wizard Step Tambah Tenant
|
*/

document.addEventListener("DOMContentLoaded", () => {

    const modal = document.getElementById("modalTenant");

    if (!modal) return;

    let currentStep = 1;

    const totalStep = 3;

    const steps = document.querySelectorAll(".wizard-step");

    const indicators = document.querySelectorAll(".step-item");

    const btnNext = document.getElementById("btnNext");

    const btnPrev = document.getElementById("btnPrev");

    const btnSubmit = document.getElementById("btnSubmit");

    const statusPKS = document.getElementById("statusPKS");

    const form = document.getElementById("formCreateTenant");

    const layanan = document.querySelector("[name='jenis_layanan']");

const archiveForm = document.getElementById("archiveForm");

const vpsInfo = document.getElementById("vpsInfo");

const lokasi = document.getElementById("lokasi_ruangan");

const rak = document.getElementById("rak");

function toggleArchiveForm() {

    if (!layanan) return;

    if (layanan.value === "VPS") {

        archiveForm.classList.add("hidden");

        vpsInfo.classList.remove("hidden");

        lokasi.value = "-";

        rak.value = "-";

    } else {

        archiveForm.classList.remove("hidden");

        vpsInfo.classList.add("hidden");

        lokasi.value = "";

        rak.value = "";

    }

}

layanan?.addEventListener("change", toggleArchiveForm);

toggleArchiveForm();



    /*
    |--------------------------------------------------------------------------
    | UPDATE STEP
    |--------------------------------------------------------------------------
    */

    function updateStep() {

        steps.forEach(step => {

            step.classList.add("hidden");

        });

        document
            .querySelector(`.wizard-step[data-content="${currentStep}"]`)
            ?.classList.remove("hidden");



        indicators.forEach((item, index) => {

            const circle = item.querySelector(".step-circle");

            if (!circle) return;

            if ((index + 1) <= currentStep) {

                circle.classList.remove(
                    "bg-blue-700",
                    "text-white"
                );

                circle.classList.add(
                    "bg-white",
                    "text-[#0B3C8A]"
                );

            }

            else{

                circle.classList.remove(
                    "bg-white",
                    "text-[#0B3C8A]"
                );

                circle.classList.add(
                    "bg-blue-700",
                    "text-white"
                );

            }

        });



        btnPrev?.classList.toggle(

            "hidden",

            currentStep === 1

        );



        btnNext?.classList.toggle(

            "hidden",

            currentStep === totalStep

        );



        btnSubmit?.classList.toggle(

            "hidden",

            currentStep !== totalStep

        );

    }



    /*
    |--------------------------------------------------------------------------
    | NEXT
    |--------------------------------------------------------------------------
    */

    btnNext?.addEventListener("click", () => {

        if (

            currentStep === 1 &&

            statusPKS?.value === "Belum"

        ){

            currentStep = 3;

        }

        else if(currentStep < totalStep){

            currentStep++;

        }

        updateStep();

    });



    /*
    |--------------------------------------------------------------------------
    | BACK
    |--------------------------------------------------------------------------
    */

    btnPrev?.addEventListener("click", () => {

        if(

            currentStep===3 &&

            statusPKS?.value==="Belum"

        ){

            currentStep=1;

        }

        else if(currentStep>1){

            currentStep--;

        }

        updateStep();

    });



    /*
    |--------------------------------------------------------------------------
    | RESET
    |--------------------------------------------------------------------------
    */

    function resetWizard(){

        currentStep=1;

        updateStep();

    }



    /*
    |--------------------------------------------------------------------------
    | OPEN MODAL
    |--------------------------------------------------------------------------
    */

    document

    .getElementById("btnTambahTenant")

    ?.addEventListener("click",()=>{

        resetWizard();

    });



    /*
    |--------------------------------------------------------------------------
    | CLOSE MODAL
    |--------------------------------------------------------------------------
    */

    document

    .getElementById("btnCloseModal")

    ?.addEventListener("click",resetWizard);



    document

    .getElementById("btnBatal")

    ?.addEventListener("click",resetWizard);



    /*
    |--------------------------------------------------------------------------
    | SUBMIT
    |--------------------------------------------------------------------------
    */

    form?.addEventListener("submit",()=>{

        btnSubmit.disabled=true;

        btnSubmit.innerHTML=`

            <i class="fas fa-spinner fa-spin mr-2"></i>

            Menyimpan...

        `;

    });



    /*
    |--------------------------------------------------------------------------
    | INIT
    |--------------------------------------------------------------------------
    */

    updateStep();

});