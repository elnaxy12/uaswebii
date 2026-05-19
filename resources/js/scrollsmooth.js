import "./bootstrap";
import gsap from "gsap";
import ScrollSmoother from "gsap/ScrollSmoother";
import ScrollTrigger from "gsap/ScrollTrigger";
import ScrollToPlugin from "gsap/ScrollToPlugin";

gsap.registerPlugin(ScrollSmoother, ScrollTrigger, ScrollToPlugin);

const wrapper = document.querySelector("#smooth-wrapper");
const content = document.querySelector("#smooth-content");

let smoother;

if (wrapper && content) {
    smoother = ScrollSmoother.create({
        wrapper: "#smooth-wrapper",
        content: "#smooth-content",
        smooth: 1.2,
        effects: true,
    });

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

    const backToTop = document.getElementById("backToTop");
    if (backToTop) {
        backToTop.addEventListener("click", () => {
            smoother.scrollTo(0, {
                duration: 1,
                ease: "power2.out",
            });
        });
    }
}
