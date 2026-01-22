document.addEventListener("DOMContentLoaded", function () {
    /* ======================
       SIDEBAR INTERACTION
    ====================== */
    const sidebarItems = document.querySelectorAll(".sidebar-item");

    sidebarItems.forEach((item) => {
        // abaikan user (username)
        if (item.classList.contains("user-item")) return;

        item.addEventListener("click", function () {
            sidebarItems.forEach((i) => i.classList.remove("active"));
            this.classList.add("active");
        });
    });

    /* ======================
       RATING BINTANG
    ====================== */
    const stars = document.querySelectorAll(".star");
    const ratingInput = document.getElementById("ratingInput");
    const form = document.getElementById("testimonialForm");

    stars.forEach((star) => {
        star.addEventListener("click", function () {
            const rating = this.dataset.rating;
            ratingInput.value = rating;

            stars.forEach((s) => {
                s.classList.toggle("active", s.dataset.rating <= rating);
            });
        });

        star.addEventListener("mouseenter", function () {
            const rating = this.dataset.rating;
            stars.forEach((s) => {
                s.classList.toggle("active", s.dataset.rating <= rating);
            });
        });
    });

    const ratingContainer = document.querySelector(".rating-stars");
    if (ratingContainer) {
        ratingContainer.addEventListener("mouseleave", function () {
            const rating = ratingInput.value;
            stars.forEach((s) => {
                s.classList.toggle("active", s.dataset.rating <= rating);
            });
        });
    }

    /* ======================
       UPLOAD FILE
    ====================== */
    const uploadBtn = document.getElementById("uploadBtn");
    const fileInput = document.getElementById("fileInput");
    const fileName = document.getElementById("fileName");

    uploadBtn.addEventListener("click", function () {
        fileInput.click();
    });

    fileInput.addEventListener("change", function () {
        if (this.files && this.files.length > 0) {
            fileName.textContent = this.files[0].name;
            fileName.style.color = "#2a4962";
        } else {
            fileName.textContent = "Belum ada file";
            fileName.style.color = "#999";
        }
    });

    /* ======================
       VALIDASI SUBMIT
    ====================== */
    form.addEventListener("submit", function (e) {
        if (!ratingInput.value) {
            e.preventDefault();
            alert("Silakan pilih rating bintang ⭐");
        }
    });
});
