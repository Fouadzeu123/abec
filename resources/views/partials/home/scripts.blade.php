<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
    // ===== FONCTIONS MODALE =====
    function openModal(content, title, imageSrc) {
        const modal = document.getElementById('modal');
        const modalContent = document.getElementById('modalContent');
        const modalTitle = document.getElementById('modalTitle');
        const modalImage = document.getElementById('modalImage');
        modalContent.innerHTML = content;
        modalTitle.textContent = title;
        modalImage.src = imageSrc;
        modalImage.alt = title;
        modal.classList.add('show');
    }
    function closeModal() {
        document.getElementById('modal').classList.remove('show');
    }
    document.getElementById('modal').addEventListener('click', function(e) {
        if (e.target === this) closeModal();
    });

    // ===== HERO CAROUSEL (Ken Burns + dots + pause/play + swipe) =====
    (function(){
        const SLIDES = 5, DELAY = 5000;
        let cur = 0, paused = false, timer = null, tx = 0, ty = 0;

        const slides  = Array.from(document.querySelectorAll('.hero-slide'));
        const dotsWrap = document.getElementById('heroDots');
        const fill    = document.getElementById('heroProgressFill');
        const pauseBtn = document.getElementById('heroPauseBtn');
        const pauseIco = document.getElementById('heroPauseIcon');
        const playIco  = document.getElementById('heroPlayIcon');
        const prevBtn  = document.getElementById('heroPrev');
        const nextBtn  = document.getElementById('heroNext');

        const dots = [];
        for(let i=0;i<SLIDES;i++){
            const d = document.createElement('button');
            d.className = 'h-dot'+(i===0?' active':'');
            d.setAttribute('aria-label','Slide '+(i+1));
            const f = document.createElement('span'); f.className='h-dot-fill';
            d.appendChild(f); dotsWrap.appendChild(d); dots.push(d);
            d.addEventListener('click',()=>goTo(i));
        }

        function resetFill(d){ const f=d.querySelector('.h-dot-fill'); f.style.animation='none'; f.offsetHeight; f.style.animation=''; }
        function updateDots(idx){ dots.forEach((d,i)=>{ d.classList.toggle('active',i===idx); d.classList.remove('paused'); resetFill(d); }); }
        function updateBar(){ fill.classList.add('instant'); fill.style.width='0%'; fill.offsetHeight; fill.classList.remove('instant'); fill.style.transition='width '+DELAY+'ms linear'; fill.style.width='100%'; }
        function showSlide(idx){ slides.forEach(s=>s.classList.remove('active')); slides[idx].classList.add('active'); updateDots(idx); updateBar(); }
        function goTo(idx){ cur=((idx%SLIDES)+SLIDES)%SLIDES; showSlide(cur); if(!paused){ clearTimeout(timer); schedule(); } }
        function schedule(){ timer=setTimeout(()=>goTo(cur+1),DELAY); }
        function doPause(){
            if(paused) return; paused=true; clearTimeout(timer);
            fill.style.transition='none';
            const cw=parseFloat(getComputedStyle(fill).width),pw=parseFloat(getComputedStyle(fill.parentElement).width);
            fill.style.width=(cw/pw*100)+'%';
            dots[cur].classList.add('paused');
            pauseIco.style.display='none'; playIco.style.display='block';
        }
        function doPlay(){
            if(!paused) return; paused=false;
            dots[cur].classList.remove('paused'); resetFill(dots[cur]);
            fill.style.transition='width '+DELAY+'ms linear'; fill.style.width='100%';
            pauseIco.style.display='block'; playIco.style.display='none';
            schedule();
        }

        pauseBtn.addEventListener('click',()=>paused?doPlay():doPause());
        prevBtn && prevBtn.addEventListener('click',()=>goTo(cur-1));
        nextBtn && nextBtn.addEventListener('click',()=>goTo(cur+1));

        const el = document.getElementById('heroCarousel');
        el.addEventListener('touchstart',e=>{tx=e.touches[0].clientX;ty=e.touches[0].clientY;},{passive:true});
        el.addEventListener('touchend',e=>{
            const dx=e.changedTouches[0].clientX-tx, dy=e.changedTouches[0].clientY-ty;
            if(Math.abs(dx)>Math.abs(dy)&&Math.abs(dx)>40){ dx<0?goTo(cur+1):goTo(cur-1); }
        },{passive:true});

        showSlide(0); schedule();
    })();

    // ===== INTERSECTION OBSERVER pour actions cards =====
    (function(){
        const cards = document.querySelectorAll('.act-card');
        const obs = new IntersectionObserver((entries) => {
            entries.forEach(e => {
                if (e.isIntersecting) { e.target.classList.add('in-view'); obs.unobserve(e.target); }
            });
        }, { threshold: 0.08 });
        cards.forEach(c => obs.observe(c));
    })();
</script>