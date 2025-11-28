<script>
    // ===============================
    // animasi fadeUp kalo scrollDown
    // ===============================
    let lastScroll = 0;
    const navbar = document.getElementById("navbar");

    window.addEventListener("scroll", () => {
        const currentScroll = window.scrollY;

        if (currentScroll > lastScroll && currentScroll > 50) {
            // scroll down → hide navbar
            navbar.classList.add("hide");
        } else {
            // scroll up → show navbar
            navbar.classList.remove("hide");
        }

        lastScroll = currentScroll;
    });
</script>

<script>
    // ===================================
    // navigasi menu and toggle (mobile)
    // ===================================

    const btn = document.getElementById("btnToggle");
    const menuToggle = document.getElementById("menuToggle");
    const navMenu = document.getElementById("navMenu");
    const body = document.body;
    let isActive = false;

    let scrollPosition = 0;

    btn.addEventListener("click", () => {
        if (!isActive) {
            scrollPosition = window.scrollY;
            btn.classList.add("active");
            setTimeout(() => btn.classList.add("active2"), 500);

            navMenu.classList.add("active");
            menuToggle.classList.add("active");

            body.style.top = `-${scrollPosition}px`;
            body.classList.add("menu-open");

            isActive = true;
        } else {
            btn.classList.remove("active2");
            setTimeout(() => btn.classList.remove("active"), 500);

            navMenu.classList.remove("active");
            menuToggle.classList.remove("active");

            body.classList.remove("menu-open");
            body.style.top = "";
            window.scrollTo(0, scrollPosition);

            isActive = false;
        }
    });
</script>

<script>
    // =======================
    // animasi fadeIn
    // =======================
    window.addEventListener("DOMContentLoaded", () => {
        const overlay = document.getElementById("overlay");

        // pastikan elemen terlihat
        overlay.style.display = "block";

        // jalankan fadeIn
        setTimeout(() => {
            overlay.classList.add("show");
        }, 1000); // delay kecil supaya transition bekerja
    });
</script>

</body>

</html>