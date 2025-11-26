import "./bootstrap";
import gsap from "gsap";
import ScrollSmoother from "gsap/ScrollSmoother";
import ScrollTrigger from "gsap/ScrollTrigger";
import ScrollToPlugin from "gsap/ScrollToPlugin";

gsap.registerPlugin(ScrollSmoother, ScrollTrigger, ScrollToPlugin);

const smoother = ScrollSmoother.create({
    wrapper: "#smooth-wrapper",
    content: "#smooth-content",
    smooth: 1.2,
    effects: true,
});

// Smooth scroll GSAP + ScrollSmoother
document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener("click", function (e) {
        e.preventDefault();
        const target = this.getAttribute("href");

        smoother.scrollTo(target, {
            duration: 1,
            ease: "power2.out",
        });
    });
});

document.getElementById("backToTop").addEventListener("click", () => {
    smoother.scrollTo(0, {
        duration: 1,
        ease: "power2.out",
    });
});
