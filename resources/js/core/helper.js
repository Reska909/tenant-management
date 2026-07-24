import flatpickr from "flatpickr";

window.flatpickr = flatpickr;

document.addEventListener("DOMContentLoaded",()=>{

    flatpickr("input[type=date]",{

        dateFormat:"Y-m-d"

    });

    /*
    |--------------------------------------------------------------------------
    | AUTO CLOSE ALERT
    |--------------------------------------------------------------------------
    */

    document.querySelectorAll(".alert-auto-close").forEach(alert=>{

        setTimeout(()=>{

            alert.classList.add("opacity-0");

            setTimeout(()=>{

                alert.remove();

            },300);

        },3000);

    });

    /*
    |--------------------------------------------------------------------------
    | LOADING BUTTON
    |--------------------------------------------------------------------------
    */

    document.querySelectorAll("form").forEach(form=>{

        form.addEventListener("submit",()=>{

            const btn=form.querySelector("button[type=submit]");

            if(btn){

                btn.disabled=true;

                btn.innerHTML="Menyimpan...";

            }

        });

    });

});