import AOS from "aos";
import "aos/dist/aos.css";

import Alpine from "alpinejs";

import Swal from "sweetalert2";

import Chart from "chart.js/auto";

window.Alpine = Alpine;
window.Swal = Swal;
window.Chart = Chart;

Alpine.start();

import "./core/helper";
import "./core/modal";

import "./modules/tenant/index";
import "./modules/contract";
import "./modules/dashboard";
import "./modules/archive";
import "./modules/user";

/*
|--------------------------------------------------------------------------
| Landing Page
|--------------------------------------------------------------------------
*/

import "./modules/navbar";

import "./core/swal";

AOS.init({

    duration: 900,

    once: true,

    easing: "ease-in-out"

});