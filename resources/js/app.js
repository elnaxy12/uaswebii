import "./bootstrap";

const element = document.querySelector(".element");
let angle = 220;
let direction = 1;
const minAngle = 220;
const maxAngle = 390;
const speed = 0.5; // Semakin kecil = semakin lambat

function animate() {
    angle += direction * speed;

    // Update variable CSS
    element.style.setProperty("--angle", `${angle}deg`);

    // Jika mencapai batas → balik arah
    if (angle >= maxAngle) direction = -1;
    if (angle <= minAngle) direction = 1;

    requestAnimationFrame(animate);
}

animate();
