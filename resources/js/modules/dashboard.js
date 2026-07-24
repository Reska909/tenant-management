document.addEventListener("DOMContentLoaded", () => {

    /*
    |--------------------------------------------------------------------------
    | PAGE ANIMATION
    |--------------------------------------------------------------------------
    */

    const page = document.getElementById("pageContent");

    if (page) {

        setTimeout(() => {

            page.classList.remove("opacity-0");
            page.classList.add("fade-up");

        }, 80);

    }

    /*
    |--------------------------------------------------------------------------
    | TOP 10 CONTRACT CHART
    |--------------------------------------------------------------------------
    */

    const chartCanvas = document.getElementById("contractChart");

    if (chartCanvas && typeof Chart !== "undefined") {

        const labels = JSON.parse(chartCanvas.dataset.labels);
        const values = JSON.parse(chartCanvas.dataset.values);

        new Chart(chartCanvas, {

            type: "bar",

            data: {

                labels: labels,

                datasets: [{

                    label: "Nilai Kontrak",

                    data: values,

                    backgroundColor: "#2563EB",

                    borderRadius: 8,

                    borderSkipped: false,

                    barThickness: 24

                }]

            },

            options: {

                responsive: true,

                maintainAspectRatio: false,

                indexAxis: "y",

                animation: {

                    duration: 1000

                },

                plugins: {

                    legend: {

                        display: false

                    },

                    tooltip: {

                        callbacks: {

                            label: function(context) {

                                return "Rp " + Number(context.raw).toLocaleString("id-ID");

                            }

                        }

                    }

                },

                scales: {

                    x: {

                        beginAtZero: true,

                        grid: {

                            color: "#E5E7EB"

                        },

                        ticks: {

                            callback: function(value) {

                                return "Rp " + Number(value).toLocaleString("id-ID");

                            }

                        }

                    },

                    y: {

                        grid: {

                            display: false

                        }

                    }

                }

            }

        });

    }

/*
|--------------------------------------------------------------------------
| SEARCH TENANT
|--------------------------------------------------------------------------
*/

const searchInput = document.getElementById("searchTenant");
const tableBody = document.getElementById("tenantTable");

if (searchInput && tableBody) {

    searchInput.addEventListener("keyup", function () {

        const keyword = this.value.toLowerCase().trim();

        const rows = tableBody.querySelectorAll("tr");

        rows.forEach((row) => {

            const text = row.innerText.toLowerCase();

            row.style.display = text.includes(keyword)
                ? ""
                : "none";

        });

    });

}

});