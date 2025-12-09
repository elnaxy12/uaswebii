const canvas = document.getElementById("aurora");
const ctx = canvas.getContext("2d");

let w, h;
function resize() {
    w = canvas.width = window.innerWidth;
    h = canvas.height = window.innerHeight;
}
window.addEventListener("resize", resize);
resize();

let t = 0;

function drawAurora() {
    ctx.clearRect(0, 0, w, h);

    for (let i = 0; i < 3; i++) {
        ctx.beginPath();
        ctx.moveTo(0, h);

        for (let x = 0; x <= w; x += 10) {
            const y =
                h / 2 +
                Math.sin(x * 0.01 + t + i) * 80 +
                Math.sin(x * 0.02 + t * 1.5) * 40;
            ctx.lineTo(x, y);
        }

        ctx.lineTo(w, h);
        ctx.closePath();

        const grad = ctx.createLinearGradient(0, 0, 0, h);
        grad.addColorStop(0, "rgba(72, 255, 203, 0.35)");
        grad.addColorStop(0.5, "rgba(56, 189, 248, 0.25)");
        grad.addColorStop(1, "rgba(0, 0, 0, 0)");

        ctx.fillStyle = grad;
        ctx.fill();
    }

    t += 0.01;
    requestAnimationFrame(drawAurora);
}

drawAurora();
