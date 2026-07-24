document.addEventListener("DOMContentLoaded", () => {

    /*
    |--------------------------------------------------------------------------
    | Navbar Scroll
    |--------------------------------------------------------------------------
    */

    const navbar = document.getElementById("navbar");
    const title = document.getElementById("navbarTitle");
    const subtitle = document.getElementById("navbarSubtitle");

    const navLinks = document.querySelectorAll(".nav-link");

    if (!navbar || !title || !subtitle) {
    return;
}

    function navbarScroll() {

        if (window.scrollY > 80) {

            navbar.classList.remove(
                "bg-transparent"
            );

            navbar.classList.add(
                "bg-white",
                "shadow-xl"
            );

            title.classList.remove("text-white");
            title.classList.add("text-[#0B3C8A]");

            subtitle.classList.remove("text-blue-100");
            subtitle.classList.add("text-gray-500");

            navLinks.forEach(link=>{

                link.classList.remove("text-white");

                link.classList.add(
                    "text-gray-700"
                );

            });

        }

        else{

            navbar.classList.remove(
                "bg-white",
                "shadow-xl"
            );

            navbar.classList.add(
                "bg-transparent"
            );

            title.classList.remove(
                "text-[#0B3C8A]"
            );

            title.classList.add(
                "text-white"
            );

            subtitle.classList.remove(
                "text-gray-500"
            );

            subtitle.classList.add(
                "text-blue-100"
            );

            navLinks.forEach(link=>{

                link.classList.remove(
                    "text-gray-700"
                );

                link.classList.add(
                    "text-white"
                );

            });

        }

    }

    navbarScroll();

    window.addEventListener(
        "scroll",
        navbarScroll
    );



    /*
    |--------------------------------------------------------------------------
    | Mobile Menu
    |--------------------------------------------------------------------------
    */

    const btnMobile=document.getElementById(
        "btnMobileMenu"
    );

    const mobileMenu=document.getElementById(
        "mobileMenu"
    );

    if(btnMobile){

        btnMobile.onclick=()=>{

            mobileMenu.classList.toggle("hidden");

        }

    }



    /*
    |--------------------------------------------------------------------------
    | Login Modal
    |--------------------------------------------------------------------------
    */

    const modal=document.getElementById(
        "loginModal"
    );

    const card=document.getElementById(
        "loginCard"
    );

    const open = document.getElementById(
        "btnOpenLogin"
    );

    const openHero = document.getElementById(
        "btnOpenLoginHero"
    );

    const openMobile = document.getElementById(
        "btnOpenLoginMobile"
    );

    const close = document.getElementById(
        "btnCloseLogin"
    );



    function showModal(){

        modal.classList.remove("hidden");

        modal.classList.add("flex");

        setTimeout(()=>{

            card.classList.remove(
                "opacity-0",
                "scale-95"
            );

            card.classList.add(
                "opacity-100",
                "scale-100"
            );

        },50);

        document.body.classList.add(
            "overflow-hidden"
        );

    }



    function hideModal(){

        card.classList.remove(
            "opacity-100",
            "scale-100"
        );

        card.classList.add(
            "opacity-0",
            "scale-95"
        );

        setTimeout(()=>{

            modal.classList.add(
                "hidden"
            );

            modal.classList.remove(
                "flex"
            );

        },250);

        document.body.classList.remove(
            "overflow-hidden"
        );

    }



    if (open) {

        open.onclick = showModal;

    }

    if (openHero) {

        openHero.onclick = showModal;

    }

    if (openMobile) {

        openMobile.onclick = showModal;

    }



    if(close){

        close.onclick=hideModal;

    }



    modal.addEventListener("click",(e)=>{

        if(e.target===modal){

            hideModal();

        }

    });



    document.addEventListener("keydown",(e)=>{

        if(e.key==="Escape"){

            hideModal();

        }

    });



    /*
    |--------------------------------------------------------------------------
    | Show Password
    |--------------------------------------------------------------------------
    */

    const toggle=document.getElementById(
        "togglePassword"
    );

    const password=document.getElementById(
        "loginPassword"
    );

    if(toggle){

        toggle.onclick=()=>{

            if(password.type==="password"){

                password.type="text";

                toggle.innerHTML='<i class="fas fa-eye-slash"></i>';

            }

            else{

                password.type="password";

                toggle.innerHTML='<i class="fas fa-eye"></i>';

            }

        }

    }

    /*
|--------------------------------------------------------------------------
| Login Error
|--------------------------------------------------------------------------
*/

if(document.querySelector(".border-red-200")){

    showModal();

}

/*
|--------------------------------------------------------------------------
| Loading Button
|--------------------------------------------------------------------------
*/

const loginForm=document.querySelector("#loginModal form");

const loginButton=document.getElementById("btnLoginSubmit");

const loginText=document.getElementById("loginText");

if(loginForm){

    loginForm.addEventListener("submit",()=>{

        loginButton.disabled=true;

        loginText.innerHTML=`
            <i class="fas fa-spinner fa-spin mr-2"></i>
            Memverifikasi...
        `;

    });

}

    /*
|--------------------------------------------------------------------------
| Preloader
|--------------------------------------------------------------------------
*/

window.addEventListener("load",()=>{

    const loader=document.getElementById("preloader");

    const bar=document.getElementById("loadingBar");

    if(bar){

        bar.style.width="100%";

    }

    setTimeout(()=>{

        loader.style.opacity="0";

        loader.style.transition="0.6s";

        setTimeout(()=>{

            loader.remove();

        },600);

    },1700);

});

});