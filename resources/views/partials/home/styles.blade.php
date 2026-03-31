<style>
    @import url('https://fonts.googleapis.com/css2?family=Arial+Black&display=swap');
    
    /* Animation de la flèche vers le bas */
    @keyframes bounceDown {
        0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
        40% { transform: translateY(6px); }
        60% { transform: translateY(3px); }
    }
    .bounce-down-arrow {
        display: inline-block;
        animation: bounceDown 2s infinite;
        color: #1E90FF;
        margin-left: 6px;
        vertical-align: middle;
    }

    /* Flèche animée bleue pointant vers la section actions */
    .animated-arrow {
        position: absolute;
        bottom: 30px;
        left: 50%;
        transform: translateX(-50%);
        cursor: pointer;
        z-index: 10;
    }
    .arrow-bounce { animation: bounce 2s infinite; }
    @keyframes bounce {
        0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
        40% { transform: translateY(-10px); }
        60% { transform: translateY(-5px); }
    }
    .arrow-svg {
        width: 40px; height: 40px;
        fill: #1E90FF;
        filter: drop-shadow(0 2px 4px rgba(0,0,0,0.3));
        transition: all 0.3s ease;
    }
    .arrow-svg:hover { fill: #0D47A1; transform: scale(1.1); }

    /* PARTNERS MARQUEE PREMIUM */
    @keyframes marquee-infinite {
        0% { transform: translateX(0); }
        100% { transform: translateX(-50%); }
    }
    .animate-marquee-infinite {
        animation: marquee-infinite 40s linear infinite;
        display: flex;
        width: max-content;
    }
    .marquee-track:hover .animate-marquee-infinite { animation-play-state: paused; }

    .partner-glass-card {
        background: rgba(255, 255, 255, 0.03);
        backdrop-filter: blur(8px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 1.25rem;
        padding: 2.5rem;
        margin: 0 1rem;
        width: 180px;
        height: 120px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        flex-shrink: 0;
    }
    .partner-glass-card:hover {
        background: rgba(255, 255, 255, 0.1);
        border-color: rgba(255, 215, 0, 0.4);
        transform: translateY(-8px) scale(1.05);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
    }
    .partner-logo-img {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
        filter: grayscale(1) brightness(2);
        opacity: 0.7;
        transition: all 0.4s ease;
    }
    .partner-glass-card:hover .partner-logo-img {
        filter: grayscale(0) brightness(1);
        opacity: 1;
    }
    /* PARTNERS MARQUEE PREMIUM (suite) */
    .marquee-fade-left {
        position: absolute; top: 0; left: 0; width: 15%; height: 100%;
        background: linear-gradient(to right, #f3f4f6 0%, transparent 100%);
        z-index: 2; pointer-events: none;
    }
    .marquee-fade-right {
        position: absolute; top: 0; right: 0; width: 15%; height: 100%;
        background: linear-gradient(to left, #f3f4f6 0%, transparent 100%);
        z-index: 2; pointer-events: none;
    }
    .partner-glass-card {
        background: #ffffff;
        border: 1px solid #f1f3f5;
        border-radius: 1.5rem;
        padding: 1.25rem 2.25rem;
        width: 270px;
        height: 150px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 3rem;
        box-shadow: 0 10px 25px rgba(0,0,0,0.05), 0 2px 5px rgba(0,0,0,0.02);
        transition: all 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        flex-shrink: 0;
        cursor: pointer;
        position: relative;
        overflow: hidden;
    }
    .partner-glass-card::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(30,144,255,0.05) 0%, transparent 100%);
        opacity: 0;
        transition: opacity 0.4s ease;
    }
    .partner-glass-card:hover {
        transform: translateY(-12px);
        border-color: #1E90FF;
        box-shadow: 0 25px 50px -12px rgba(30,144,255,0.15);
    }
    .partner-glass-card:hover::before {
        opacity: 1;
    }
    .partner-logo-img {
        max-width: 90%;
        max-height: 90%;
        object-fit: contain;
        filter: drop-shadow(0 2px 4px rgba(0,0,0,0.05));
        transition: all 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
    }
    .partner-glass-card:hover .partner-logo-img {
        transform: scale(1.1);
        filter: drop-shadow(0 8px 15px rgba(30,144,255,0.2));
    }
    /* ===== HERO CAROUSEL PREMIUM ===== */
    #heroCarousel {
        position: relative;
        width: 100%;
        height: 100vh;
        min-height: 500px;
        overflow: hidden;
        touch-action: pan-y;
        user-select: none;
    }
    @media (max-width: 640px) { #heroCarousel { height: 80vh; min-height: 420px; } }
    .hero-slide {
        position: absolute; inset: 0;
        opacity: 0;
        transition: opacity 1.2s ease-in-out;
        z-index: 1;
    }
    .hero-slide.active { opacity: 1; z-index: 2; }
    .hero-slide-bg {
        position: absolute; inset: 0;
        background-size: cover;
        background-position: center;
        transform: scale(1.08);
        transition: transform 8s ease-in-out;
    }
    .hero-slide.active .hero-slide-bg { transform: scale(1); }
    .hero-slide-overlay {
        position: absolute; inset: 0;
        background: linear-gradient(135deg, rgba(0,0,30,0.68) 0%, rgba(30,144,255,0.18) 60%, rgba(0,0,0,0.55) 100%);
    }
    .hero-slide-content {
        position: relative; z-index: 3;
        display: flex; flex-direction: column;
        align-items: center; justify-content: center;
        height: 100%; text-align: center; padding: 0 1.5rem;
    }
    .hero-tag {
        display: inline-block;
        background: rgba(255,215,0,0.18);
        border: 1px solid rgba(255,215,0,0.55);
        color: #FFD700;
        font-size: 0.7rem; letter-spacing: 0.18em; text-transform: uppercase;
        padding: 0.25rem 0.85rem; border-radius: 9999px;
        margin-bottom: 1rem;
        opacity: 0; transform: translateY(20px);
        transition: opacity 0.7s ease 0.2s, transform 0.7s ease 0.2s;
    }
    .hero-slide.active .hero-tag { opacity: 1; transform: translateY(0); }
    .hero-title {
        font-size: clamp(1.8rem, 5.5vw, 3.8rem);
        font-weight: 900; color: #fff;
        line-height: 1.15; max-width: 860px;
        text-shadow: 0 4px 24px rgba(0,0,0,0.45);
        opacity: 0; transform: translateY(30px);
        transition: opacity 0.8s ease 0.35s, transform 0.8s ease 0.35s;
    }
    .hero-slide.active .hero-title { opacity: 1; transform: translateY(0); }
    .hero-sub {
        margin-top: 1rem;
        font-size: clamp(0.85rem, 2vw, 1.1rem);
        color: rgba(255,255,255,0.85); max-width: 600px;
        opacity: 0; transform: translateY(20px);
        transition: opacity 0.8s ease 0.55s, transform 0.8s ease 0.55s;
    }
    .hero-slide.active .hero-sub { opacity: 1; transform: translateY(0); }
    .hero-btns {
        margin-top: 2rem; display: flex; gap: 1rem; flex-wrap: wrap; justify-content: center;
        opacity: 0; transform: translateY(20px);
        transition: opacity 0.8s ease 0.75s, transform 0.8s ease 0.75s;
    }
    .hero-slide.active .hero-btns { opacity: 1; transform: translateY(0); }
    .hero-btn-primary {
        background: #FFD700; color: #000;
        font-weight: 800; font-size: 0.9rem;
        padding: 0.75rem 1.8rem; border-radius: 0.6rem;
        transition: all 0.3s ease; display: inline-flex; align-items: center; gap: 0.4rem;
    }
    .hero-btn-primary:hover { background: #fff; transform: translateY(-2px); box-shadow: 0 8px 24px rgba(255,215,0,0.4); }
    .hero-btn-secondary {
        background: transparent;
        border: 2px solid rgba(255,255,255,0.7);
        color: #fff; font-weight: 700; font-size: 0.9rem;
        padding: 0.75rem 1.8rem; border-radius: 0.6rem;
        transition: all 0.3s ease;
    }
    .hero-btn-secondary:hover { background: rgba(255,255,255,0.15); transform: translateY(-2px); }
    /* Nav arrows */
    .hero-arrow {
        position: absolute; top: 50%; transform: translateY(-50%);
        z-index: 10; width: 46px; height: 46px;
        background: rgba(255,255,255,0.12);
        backdrop-filter: blur(8px);
        border: 1px solid rgba(255,255,255,0.25);
        border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        color: #fff; cursor: pointer;
        transition: all 0.3s ease;
    }
    .hero-arrow:hover { background: #FFD700; color: #000; border-color: #FFD700; transform: translateY(-50%) scale(1.12); }
    .hero-arrow.prev { left: 1.2rem; }
    .hero-arrow.next { right: 1.2rem; }
    @media (max-width: 480px) { .hero-arrow { width: 36px; height: 36px; } .hero-arrow.prev { left: 0.5rem; } .hero-arrow.next { right: 0.5rem; } }
    /* Dots */
    .hero-dots-wrap {
        position: absolute; bottom: 3.5rem; left: 50%; transform: translateX(-50%);
        z-index: 10; display: flex; gap: 0.5rem; align-items: center;
    }
    .h-dot {
        position: relative; overflow: hidden;
        height: 4px; width: 22px; border-radius: 9999px;
        background: rgba(255,255,255,0.3);
        cursor: pointer;
        transition: width 0.35s cubic-bezier(.4,0,.2,1), background 0.3s;
    }
    .h-dot.active { width: 44px; background: rgba(255,255,255,0.55); }
    .h-dot-fill {
        position: absolute; left: 0; top: 0;
        height: 100%; width: 0; background: #FFD700; border-radius: 9999px;
    }
    .h-dot.active .h-dot-fill { animation: hDotFill 5s linear forwards; }
    .h-dot.paused .h-dot-fill { animation-play-state: paused !important; }
    @keyframes hDotFill { from { width: 0; } to { width: 100%; } }
    /* Pause btn */
    .hero-pause-btn {
        position: absolute; bottom: 3rem; right: 1.2rem; z-index: 10;
        width: 38px; height: 38px; border-radius: 50%;
        background: rgba(255,255,255,0.12); backdrop-filter: blur(8px);
        border: 1px solid rgba(255,255,255,0.25);
        display: flex; align-items: center; justify-content: center;
        color: #fff; cursor: pointer; transition: all 0.3s ease;
    }
    .hero-pause-btn:hover { background: #FFD700; color: #000; border-color: #FFD700; }
    /* Progress bar strip at bottom */
    .hero-progress-strip {
        position: absolute; bottom: 0; left: 0; right: 0; height: 3px;
        background: rgba(255,255,255,0.15); z-index: 10;
    }
    .hero-progress-fill {
        height: 100%; background: #FFD700; width: 0;
        transition: width 5s linear;
    }
    .hero-progress-fill.instant { transition: none; }
    /* Responsive images in Nos Actions */
    .action-image {
        width: 100%;
        height: 120px;
        object-fit: cover;
        border-radius: 0.5rem;
        transition: transform 0.3s ease, opacity 0.3s ease;
    }
    .action-card:hover .action-image {
        transform: scale(1.05);
        opacity: 0.9;
    }
    /* Action Card Styles with Before/After */
    .action-card {
        background-color: #FFF8DC;
        position: relative;
        overflow: hidden;
        transition: transform 0.5s ease, box-shadow 0.5s ease, opacity 0.5s ease;
        opacity: 0;
        transform: translateY(50px);
    }
    .action-card.visible {
        opacity: 1;
        transform: translateY(0);
    }
    .action-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 215, 0, 0.3), transparent);
        transition: left 0.6s ease;
    }
    .action-card:hover::before {
        left: 100%;
    }
    .action-card::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 0;
        height: 3px;
        background-color: #FFD700;
        transition: width 0.3s ease;
    }
    .action-card:hover::after {
        width: 100%;
    }
    .action-card:hover {
        transform: scale(1.05);
        box-shadow: 0 10px 15px rgba(0, 0, 0, 0.2);
    }
    /* Stagger animation for cards */
    .action-card:nth-child(1).visible { transition-delay: 0.1s; }
    .action-card:nth-child(2).visible { transition-delay: 0.2s; }
    .action-card:nth-child(3).visible { transition-delay: 0.3s; }
    .action-card:nth-child(4).visible { transition-delay: 0.4s; }
    .action-card:nth-child(5).visible { transition-delay: 0.1s; }
    .action-card:nth-child(6).visible { transition-delay: 0.2s; }
    .action-card:nth-child(7).visible { transition-delay: 0.3s; }
    .action-card:nth-child(8).visible { transition-delay: 0.4s; }
    .action-card:nth-child(9).visible { transition-delay: 0.1s; }
    .action-card:nth-child(10).visible { transition-delay: 0.2s; }
    .action-card:nth-child(11).visible { transition-delay: 0.3s; }
    .action-card:nth-child(12).visible { transition-delay: 0.4s; }
    /* Responsive video */
    .responsive-video {
        width: 100%;
        max-width: 90%;
        height: auto;
        opacity: 0;
        transform: scale(0.95);
        transition: opacity 0.8s ease-out, transform 0.8s ease-out;
    }
    .responsive-video.visible {
        opacity: 1;
        transform: scale(1);
    }
    /* Loading Spinner Styles */
    #loading {
        display: flex;
        align-items: center;
        justify-content: center;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.95);
        z-index: 9999;
        transition: opacity 0.7s ease-out;
    }
    .loading-hidden {
        opacity: 0;
        pointer-events: none;
    }
    .animate-spin {
        animation: spin 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
    }
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
    /* Mobile Menu Animation */
    .mobile-menu {
        transform: translateX(100%);
        transition: transform 0.3s ease-in-out, opacity 0.3s ease-in-out;
        opacity: 0;
    }
    .mobile-menu.open {
        transform: translateX(0);
        opacity: 1;
    }
    .mobile-menu a {
        transition: background-color 0.3s ease, color 0.3s ease, transform 0.3s ease;
    }
    .mobile-menu a:hover {
        transform: translateX(5px);
    }
    /* Section Entrance Animation on Scroll */
    .section-animate {
        opacity: 0;
        transform: translateY(30px);
        transition: opacity 0.8s ease-out, transform 0.8s ease-out;
    }
    .section-animate.visible {
        opacity: 1;
        transform: translateY(0);
    }
    /* Navigation Links Animation */
    nav a {
        transition: background-color 0.3s ease, color 0.3s ease, transform 0.3s ease;
    }
    nav a:hover {
        transform: translateY(-2px);
    }
    /* ===== MODAL RENFORCÉ ===== */
    .modal {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.8);
        z-index: 9999 !important;
        display: none;
        align-items: center;
        justify-content: center;
        backdrop-filter: blur(4px);
    }
    .modal.show {
        display: flex !important;
    }
    .modal-content {
        background: #FFF8DC;
        border-radius: 1rem;
        padding: 1.5rem;
        max-width: 90%;
        width: 600px;
        max-height: 85vh;
        overflow-y: auto;
        position: relative;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        transform: scale(0.95);
        transition: transform 0.3s ease, opacity 0.3s ease;
        opacity: 0;
    }
    .modal.show .modal-content {
        transform: scale(1);
        opacity: 1;
    }
    .modal-close {
        position: sticky;
        top: 0;
        right: 0;
        float: right;
        cursor: pointer;
        width: 30px;
        height: 30px;
        background: rgba(0,0,0,0.1);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.2s;
        z-index: 10000;
    }
    .modal-close:hover {
        background: #FFD700;
        color: #000;
        transform: scale(1.1);
    }
    .modal-image {
        width: 100%;
        max-height: 40vh;
        object-fit: cover;
        border-radius: 0.5rem;
        margin-bottom: 1rem;
    }
    .modal-title {
        font-size: 1.5rem;
        color: #1E90FF;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        margin-bottom: 0.75rem;
        padding-right: 2rem;
        background: transparent;
    }
    .modal-content p {
        font-size: 1rem;
        line-height: 1.6;
        color: #333;
        white-space: pre-wrap;
    }
    /* Style pour les titres des sections avec ombre derrière */
    .section-title {
        text-transform: uppercase;
        color: #1E90FF;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        position: relative;
        display: inline-block;
    }
    .section-title::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 110%;
        height: 110%;
        background: rgba(0, 0, 0, 0.1);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        z-index: -1;
        border-radius: 0.25rem;
    }
    /* Style pour les cartes de la section Nos Actions */
    .action-card h3 {
        color: #1E90FF;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }
    .action-card p {
        color: #333333;
    }
    .action-card button {
        color: #000000;
        background-color: #FFD700;
        border: 1px solid #FFD700;
        text-align: center;
        display: flex;
        justify-content: center;
        align-items: center;
        width: fit-content;
        margin-left: auto;
        margin-right: auto;
    }
    .action-card button:hover {
        background-color: #DAA520;
        color: #ffffff;
    }
    .wave-divider {
        position: absolute;
        top: -1px;
        left: 0;
        width: 100%;
        overflow: hidden;
        line-height: 0;
    }
    .wave-divider svg {
        position: relative;
        display: block;
        width: calc(100% + 1.3px);
        height: 40px;
    }
    .wave-divider .shape-fill {
        fill: url(#gradient-wave);
    }
    .social-icon {
        transition: transform 0.3s ease, opacity 0.3s ease;
    }
    .social-icon:hover {
        transform: scale(1.2);
        opacity: 0.8;
    }
    /* ===== HERO DOTS DE PROGRESSION ===== */
    .hero-dot {
        position: relative;
        display: block;
        height: 4px;
        width: 24px;
        border-radius: 9999px;
        background: rgba(255,255,255,0.35);
        cursor: pointer;
        overflow: hidden;
        transition: width 0.35s cubic-bezier(.4,0,.2,1), background 0.3s ease;
        flex-shrink: 0;
    }
    .hero-dot.active {
        width: 48px;
        background: rgba(255,255,255,0.55);
    }
    .hero-dot-fill {
        position: absolute;
        left: 0; top: 0;
        height: 100%;
        width: 0%;
        background: #FFD700;
        border-radius: 9999px;
    }
    .hero-dot.active .hero-dot-fill {
        animation: heroDotFill 4s linear forwards;
    }
    .hero-dot.paused .hero-dot-fill {
        animation-play-state: paused !important;
    }
    @keyframes heroDotFill {
        from { width: 0%; }
        to   { width: 100%; }
    }
    /* Animation pour la phrase défilante */
    .marquee-container {
        width: 100%;
        overflow: hidden;
        white-space: nowrap;
        background-color: #1E90FF;
        padding: 0.5rem 0;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        z-index: 10;
    }
    .marquee-text {
        display: inline-block;
        font-size: 1rem;
        font-weight: bold;
        color: #FFD700;
        animation: marquee 15s linear infinite;
        text-align: center;
    }
    @keyframes marquee {
        0% { transform: translateX(100%); }
        100% { transform: translateX(-100%); }
    }
    /* Responsive adjustments */
    @media (max-width: 640px) {
        body { padding-top: 0; }
        .top-bar { height: 40px; margin-bottom: 12px; }
        .main-header { padding-top: 0; }
        .hero-text { font-size: clamp(1.25rem, 4vw, 2rem); }
        .hero-subtext { font-size: clamp(0.75rem, 2vw, 0.875rem); }
        .partner-logo { width: 70px; height: 70px; }
        .action-image { height: 100px; }
        .modal-content { padding: 1rem; max-width: 95%; }
        .modal-image { max-height: 25vh; }
        .modal-title { font-size: 1.2rem; }
        .modal-content p { font-size: 0.9rem; }
        .modal-close { width: 24px; height: 24px; }
        .action-card { padding: 0.75rem; }
    }
    @media (min-width: 641px) and (max-width: 1023px) {
        .hero-text { font-size: clamp(1.5rem, 4.5vw, 2.5rem); }
        .hero-subtext { font-size: clamp(0.875rem, 2.5vw, 1rem); }
        .action-image { height: 130px; }
        .modal-content { max-width: 80%; }
        .modal-image { max-height: 30vh; }
        .partner-logo { width: 85px; height: 85px; }
    }
    @media (min-width: 1024px) {
        .action-image { height: 150px; }
        .modal-content { max-width: 600px; }
    }
    /* Offset pour header fixe (top-bar 36px + nav 68px) */
    .hero-spacing-offset { padding-top: 104px; }
    @media (max-width: 640px) { .hero-spacing-offset { padding-top: 68px; } }

    /* === SECTION ACTIONS PREMIUM (déplacée depuis actions.blade.php) === */
    #actions {
        background: linear-gradient(160deg, #0f0f1a 0%, #0d1b2a 50%, #0f0f1a 100%);
        padding: 5rem 0;
        position: relative;
        overflow: hidden;
    }
    #actions::before {
        content: '';
        position: absolute; inset: 0;
        background: radial-gradient(ellipse at 20% 50%, rgba(30,144,255,0.07) 0%, transparent 60%),
                    radial-gradient(ellipse at 80% 20%, rgba(255,215,0,0.05) 0%, transparent 50%);
        pointer-events: none;
    }
    .actions-title {
        font-size: clamp(1.6rem, 4vw, 2.8rem);
        font-weight: 900;
        color: #ffffff;
        text-align: center;
        letter-spacing: -0.02em;
    }
    .actions-title span { color: #FFD700; }
    .actions-sub {
        text-align: center;
        color: rgba(255,255,255,0.55);
        font-size: 0.95rem;
        margin-top: 0.6rem;
    }
    .actions-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1.1rem;
        margin-top: 2.5rem;
    }
    @media (min-width: 640px)  { .actions-grid { grid-template-columns: repeat(3, 1fr); } }
    @media (min-width: 1024px) { .actions-grid { grid-template-columns: repeat(4, 1fr); gap: 1.4rem; } }
    .act-card {
        position: relative;
        border-radius: 1rem;
        overflow: hidden;
        cursor: pointer;
        background: rgba(255,255,255,0.04);
        border: 1px solid rgba(255,255,255,0.08);
        transition: transform 0.4s cubic-bezier(.4,0,.2,1), box-shadow 0.4s ease, border-color 0.3s;
        opacity: 0;
        transform: translateY(32px);
    }
    .act-card.in-view {
        opacity: 1;
        transform: translateY(0);
    }
    .act-card:hover {
        transform: translateY(-6px) scale(1.02);
        box-shadow: 0 20px 50px rgba(0,0,0,0.55), 0 0 0 1px rgba(255,215,0,0.25);
        border-color: rgba(255,215,0,0.3);
    }
    .act-img-wrap {
        position: relative;
        width: 100%;
        padding-top: 62%;
        overflow: hidden;
    }
    .act-img-wrap img {
        position: absolute; inset: 0;
        width: 100%; height: 100%;
        object-fit: cover;
        transition: transform 0.6s cubic-bezier(.4,0,.2,1);
        filter: brightness(0.75);
    }
    .act-card:hover .act-img-wrap img {
        transform: scale(1.08);
        filter: brightness(0.55);
    }
    .act-badge {
        position: absolute; top: 0.6rem; left: 0.6rem;
        font-size: 0.6rem; font-weight: 800;
        letter-spacing: 0.1em; text-transform: uppercase;
        padding: 0.2rem 0.55rem; border-radius: 9999px;
        backdrop-filter: blur(6px);
    }
    .act-icon {
        position: absolute; bottom: 0.5rem; right: 0.7rem;
        font-size: 1.6rem;
        filter: drop-shadow(0 2px 6px rgba(0,0,0,0.6));
        transition: transform 0.3s ease;
    }
    .act-card:hover .act-icon { transform: scale(1.2) rotate(-5deg); }
    .act-body {
        padding: 0.9rem 1rem 1rem;
    }
    .act-body h3 {
        font-size: 0.9rem;
        font-weight: 800;
        color: #fff;
        line-height: 1.3;
        margin-bottom: 0.35rem;
    }
    .act-body p {
        font-size: 0.7rem;
        color: rgba(255,255,255,0.5);
        line-height: 1.5;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .act-btn {
        display: inline-flex; align-items: center; gap: 0.3rem;
        margin-top: 0.7rem;
        font-size: 0.7rem; font-weight: 700;
        color: #FFD700;
        background: rgba(255,215,0,0.1);
        border: 1px solid rgba(255,215,0,0.25);
        padding: 0.3rem 0.8rem; border-radius: 9999px;
        transition: all 0.25s ease;
    }
    .act-btn:hover { background: #FFD700; color: #000; }
    .act-card:nth-child(1)  { transition-delay: 0.05s; }
    .act-card:nth-child(2)  { transition-delay: 0.10s; }
    .act-card:nth-child(3)  { transition-delay: 0.15s; }
    .act-card:nth-child(4)  { transition-delay: 0.20s; }
    .act-card:nth-child(5)  { transition-delay: 0.25s; }
    .act-card:nth-child(6)  { transition-delay: 0.30s; }
    .act-card:nth-child(7)  { transition-delay: 0.35s; }
    .act-card:nth-child(8)  { transition-delay: 0.40s; }
    .act-card:nth-child(9)  { transition-delay: 0.45s; }
    .act-card:nth-child(10) { transition-delay: 0.50s; }
    .act-card:nth-child(11) { transition-delay: 0.55s; }
    .act-card:nth-child(12) { transition-delay: 0.60s; }
    .act-card { transition: opacity 0.6s ease, transform 0.6s ease, box-shadow 0.4s ease, border-color 0.3s; }

    /* === SECTION ABOUT TEASER (déplacée depuis about-teaser.blade.php) === */
    #about-teaser {
        background: linear-gradient(160deg, #0d1b2a 0%, #0f0f1a 100%);
        padding: 6rem 0;
        position: relative;
        overflow: hidden;
        border-top: 1px solid rgba(255,215,0,0.05);
    }
    .teaser-video-wrap {
        position: relative;
        border-radius: 1.5rem;
        overflow: hidden;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        border: 1px solid rgba(255,215,0,0.2);
    }
    .teaser-video-wrap::after {
        content: '';
        position: absolute; inset: 0;
        background: linear-gradient(to right, rgba(13,27,42,0.4), transparent);
        pointer-events: none;
    }
    .teaser-content h2 {
        font-size: clamp(1.8rem, 4vw, 2.6rem);
        font-weight: 900;
        color: #fff;
        line-height: 1.2;
        margin-bottom: 1.5rem;
    }
    .teaser-content h2 span { color: #FFD700; }
    .teaser-content p {
        color: rgba(255,255,255,0.7);
        font-size: 1rem;
        line-height: 1.8;
        margin-bottom: 2rem;
    }
    .teaser-btn {
        display: inline-flex;
        align-items: center;
        gap: 0.6rem;
        background: #FFD700;
        color: #000;
        font-weight: 800;
        padding: 0.9rem 2.2rem;
        border-radius: 0.8rem;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 0 10px 20px rgba(255,215,0,0.2);
    }
    .teaser-btn:hover {
        transform: translateY(-3px) scale(1.02);
        background: #fff;
        box-shadow: 0 15px 30px rgba(255,215,0,0.3);
    }
</style>