document.addEventListener("DOMContentLoaded", function () {
    /* ======================
       SIDEBAR INTERACTION
    ====================== */
    const sidebarItems = document.querySelectorAll(".sidebar-item");

    sidebarItems.forEach((item) => {
        item.addEventListener("click", function () {
            sidebarItems.forEach((i) => i.classList.remove("active"));
            this.classList.add("active");
        });
    });
    });