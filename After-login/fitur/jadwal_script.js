document.addEventListener('DOMContentLoaded', function() {
    const canvas = document.getElementById('backgroundCanvas');
    const ctx = canvas.getContext('2d');

    
    function resizeCanvas() {
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
    }
    resizeCanvas();
    window.addEventListener('resize', resizeCanvas);

    
    const particles = [];
    const particleCount = 30;
    const colors = ['#b8e9a5', '#a8d9ff', '#f4f9ff', '#b8e9ff'];

    class Particle {
        constructor() {
            this.x = Math.random() * canvas.width;
            this.y = Math.random() * canvas.height;
            this.size = Math.random() * 10 + 5;
            this.speedX = (Math.random() - 0.5) * 0.5;
            this.speedY = (Math.random() - 0.5) * 0.5;
            this.color = colors[Math.floor(Math.random() * colors.length)];
            this.opacity = Math.random() * 0.5 + 0.1;
        }

        update() {
            this.x += this.speedX;
            this.y += this.speedY;

            if (this.x <= 0 || this.x >= canvas.width) this.speedX *= -1;
            if (this.y <= 0 || this.y >= canvas.height) this.speedY *= -1;
        }

        draw() {
            ctx.fillStyle = this.color;
            ctx.globalAlpha = this.opacity;
            ctx.beginPath();
            ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
            ctx.fill();
        }
    }

    
    for (let i = 0; i < particleCount; i++) {
        particles.push(new Particle());
    }

    
    function animate() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);

        particles.forEach(particle => {
            particle.update();
            particle.draw();
        });

        requestAnimationFrame(animate);
    }

    
    animate();

    
    const mouse = {
        x: null,
        y: null,
        radius: 100
    };

    canvas.addEventListener('mousemove', function(e) {
        mouse.x = e.x;
        mouse.y = e.y;
    });

    canvas.addEventListener('mouseleave', function() {
        mouse.x = null;
        mouse.y = null;
    });

    function handleParticles() {
        if (mouse.x && mouse.y) {
            particles.forEach(particle => {
                const dx = mouse.x - particle.x;
                const dy = mouse.y - particle.y;
                const distance = Math.sqrt(dx * dx + dy * dy);

                if (distance < mouse.radius) {
                    const angle = Math.atan2(dy, dx);
                    const force = (mouse.radius - distance) / mouse.radius;
                    particle.x -= Math.cos(angle) * force * 2;
                    particle.y -= Math.sin(angle) * force * 2;
                }
            });
        }
    }

    function animateWithMouse() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);

        handleParticles();

        particles.forEach(particle => {
            particle.update();
            particle.draw();
        });

        requestAnimationFrame(animateWithMouse);
    }

    animateWithMouse();

    
    const modal = document.getElementById('editModal');
    const closeModalBtn = document.querySelector('.close');
    const editForm = document.getElementById('editForm');

    function openEditModal(regId, tanggal, waktu) {
        document.getElementById('editRegId').value = regId;
        document.getElementById('edit_tanggal').value = tanggal;
        document.getElementById('edit_waktu').value = waktu;
        modal.style.display = 'flex';
    }

    function closeEditModal() {
        modal.style.display = 'none';
    }

    closeModalBtn.onclick = closeEditModal;
    window.onclick = function(event) {
        if (event.target == modal) {
            closeEditModal();
        }
    }
});