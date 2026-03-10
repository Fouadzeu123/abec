@extends('layouts.welcome')

@section('title', 'À propos | ABEC International')
@section('meta_description', 'Découvrez l’Association du Bien-Être Communautaire (ABEC) : notre mission, nos valeurs, notre histoire et notre impact à travers le monde.')

@push('styles')
<style>
    /* ===== PAGE À PROPOS PREMIUM ===== */
    .about-section {
        background: linear-gradient(160deg, #0f0f1a 0%, #0d1b2a 50%, #0f0f1a 100%);
        padding: 5rem 0;
        position: relative;
        overflow: hidden;
    }
    .about-section::before {
        content: '';
        position: absolute; inset: 0;
        background: radial-gradient(ellipse at 20% 50%, rgba(30,144,255,0.07) 0%, transparent 60%),
                    radial-gradient(ellipse at 80% 20%, rgba(255,215,0,0.05) 0%, transparent 50%);
        pointer-events: none;
    }
    .about-title {
        font-size: clamp(1.6rem, 4vw, 2.8rem);
        font-weight: 900;
        color: #ffffff;
        text-align: center;
        letter-spacing: -0.02em;
    }
    .about-title span { color: #FFD700; }
    .about-sub {
        text-align: center;
        color: rgba(255,255,255,0.55);
        font-size: 0.95rem;
        margin-top: 0.6rem;
    }

    /* Grille (identique à actions-grid) */
    .about-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1.1rem;
        margin-top: 2.5rem;
    }
    @media (min-width: 640px)  { .about-grid { grid-template-columns: repeat(3, 1fr); } }
    @media (min-width: 1024px) { .about-grid { grid-template-columns: repeat(4, 1fr); gap: 1.4rem; } }

    /* Carte de base (act-card) */
    .about-card {
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
    .about-card.in-view {
        opacity: 1;
        transform: translateY(0);
    }
    .about-card:hover {
        transform: translateY(-6px) scale(1.02);
        box-shadow: 0 20px 50px rgba(0,0,0,0.55), 0 0 0 1px rgba(255,215,0,0.25);
        border-color: rgba(255,215,0,0.3);
    }
    .about-img-wrap {
        position: relative;
        width: 100%;
        padding-top: 62%;
        overflow: hidden;
    }
    .about-img-wrap img {
        position: absolute; inset: 0;
        width: 100%; height: 100%;
        object-fit: cover;
        transition: transform 0.6s cubic-bezier(.4,0,.2,1);
        filter: brightness(0.75);
    }
    .about-card:hover .about-img-wrap img {
        transform: scale(1.08);
        filter: brightness(0.55);
    }
    .about-badge {
        position: absolute; top: 0.6rem; left: 0.6rem;
        font-size: 0.6rem; font-weight: 800;
        letter-spacing: 0.1em; text-transform: uppercase;
        padding: 0.2rem 0.55rem; border-radius: 9999px;
        backdrop-filter: blur(6px);
    }
    .about-icon {
        position: absolute; bottom: 0.5rem; right: 0.7rem;
        font-size: 1.6rem;
        filter: drop-shadow(0 2px 6px rgba(0,0,0,0.6));
        transition: transform 0.3s ease;
    }
    .about-card:hover .about-icon { transform: scale(1.2) rotate(-5deg); }
    .about-body {
        padding: 0.9rem 1rem 1rem;
    }
    .about-body h3 {
        font-size: 0.9rem;
        font-weight: 800;
        color: #fff;
        line-height: 1.3;
        margin-bottom: 0.35rem;
    }
    .about-body p {
        font-size: 0.7rem;
        color: rgba(255,255,255,0.5);
        line-height: 1.5;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .about-btn {
        display: inline-flex; align-items: center; gap: 0.3rem;
        margin-top: 0.7rem;
        font-size: 0.7rem; font-weight: 700;
        color: #FFD700;
        background: rgba(255,215,0,0.1);
        border: 1px solid rgba(255,215,0,0.25);
        padding: 0.3rem 0.8rem; border-radius: 9999px;
        transition: all 0.25s ease;
        border: none;
        cursor: pointer;
    }
    .about-btn:hover { background: #FFD700; color: #000; }

    /* Carte pleine largeur pour texte */
    .about-text-card {
        background: rgba(255,255,255,0.04);
        border: 1px solid rgba(255,255,255,0.08);
        border-radius: 1rem;
        padding: 2rem;
        color: #fff;
        backdrop-filter: blur(10px);
    }
    .about-text-card p {
        color: rgba(255,255,255,0.7);
        font-size: 0.9rem;
        line-height: 1.8;
    }

    /* Valeurs : cartes sans image */
    .value-card {
        background: rgba(255,255,255,0.03);
        border: 1px solid rgba(255,215,0,0.15);
        border-radius: 1rem;
        padding: 2rem 1rem;
        text-align: center;
        transition: all 0.3s ease;
        opacity: 0;
        transform: translateY(32px);
    }
    .value-card.in-view {
        opacity: 1;
        transform: translateY(0);
    }
    .value-card:hover {
        border-color: #FFD700;
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(255,215,0,0.1);
    }
    .value-icon {
        font-size: 2.5rem;
        margin-bottom: 1rem;
        color: #FFD700;
    }
    .value-card h3 {
        color: #fff;
        font-size: 1.1rem;
        margin-bottom: 0.5rem;
    }
    .value-card p {
        color: rgba(255,255,255,0.5);
        font-size: 0.8rem;
    }

    /* Chiffres clés */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(2,1fr);
        gap: 1rem;
    }
    @media (min-width:768px){
        .stats-grid {
            grid-template-columns: repeat(4,1fr);
        }
    }
    .stat-item {
        background: rgba(255,255,255,0.03);
        border: 1px solid rgba(255,215,0,0.1);
        border-radius: 1rem;
        padding: 1.5rem 0.5rem;
        text-align: center;
        opacity: 0;
        transform: translateY(32px);
    }
    .stat-item.in-view {
        opacity: 1;
        transform: translateY(0);
    }
    .stat-number {
        font-size: 2rem;
        font-weight: 900;
        color: #FFD700;
    }
    .stat-label {
        color: rgba(255,255,255,0.6);
        font-size: 0.7rem;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    /* Stagger delays */
    .about-card:nth-child(1)  { transition-delay: 0.05s; }
    .about-card:nth-child(2)  { transition-delay: 0.10s; }
    .about-card:nth-child(3)  { transition-delay: 0.15s; }
    .about-card:nth-child(4)  { transition-delay: 0.20s; }
    .about-card:nth-child(5)  { transition-delay: 0.25s; }
    .about-card:nth-child(6)  { transition-delay: 0.30s; }
    .about-card:nth-child(7)  { transition-delay: 0.35s; }
    .about-card:nth-child(8)  { transition-delay: 0.40s; }
    .about-card { transition: opacity 0.6s ease, transform 0.6s ease, box-shadow 0.4s ease, border-color 0.3s; }

    .value-card:nth-child(1) { transition-delay: 0.1s; }
    .value-card:nth-child(2) { transition-delay: 0.2s; }
    .value-card:nth-child(3) { transition-delay: 0.3s; }
    .value-card:nth-child(4) { transition-delay: 0.4s; }

    .stat-item:nth-child(1) { transition-delay: 0.1s; }
    .stat-item:nth-child(2) { transition-delay: 0.2s; }
    .stat-item:nth-child(3) { transition-delay: 0.3s; }
    .stat-item:nth-child(4) { transition-delay: 0.4s; }

    /* Vidéo */
    .video-wrapper {
        border-radius: 1rem;
        overflow: hidden;
        border: 1px solid rgba(255,215,0,0.3);
    }
    .responsive-video {
        width: 100%;
        height: auto;
        display: block;
    }

    /* ===== SECTION VIDÉO (reprise de l'accueil) ===== */
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
@endpush

@section('content')
<!-- ===== PAGE À PROPOS PREMIUM ===== -->
<main class="about-section">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Hero de la page -->
        <div class="text-center mb-8">
            <p class="about-sub">Découvrez qui nous sommes</p>
            <h1 class="about-title">À propos <span>d'ABEC</span></h1>
        </div>

        <!-- Carte texte introductif (pleine largeur) -->
        <div class="about-text-card mb-12">
            <p class="text-lg leading-relaxed">
                L'Association du Bien-Être Communautaire (ABEC) est une organisation internationale à but non lucratif, légalement reconnue et enregistrée auprès des institutions locales sous le numéro de déclaration <strong>00001901/RDA/J06/SAAJP/BAPP</strong>. 
                Fondée par des jeunes visionnaires, elle rassemble des membres de plusieurs nationalités et place l'équité femmes-hommes au cœur de sa gouvernance.
            </p>
        </div>

        <!-- Section Mission (carte avec image) -->
        <div class="mb-16">
            <h2 class="about-title text-left text-2xl mb-6">Notre <span>Mission</span></h2>
            <div class="grid md:grid-cols-2 gap-8 items-center">
                <div class="about-card !opacity-100 !transform-none" style="transition: none;">
                    <div class="about-img-wrap">
                        <img src="{{ asset('image/elev.png') }}" alt="Mission ABEC">
                        <span class="about-badge" style="background:rgba(30,144,255,0.7);">Mission</span>
                        <span class="about-icon">🎯</span>
                    </div>
                </div>
                <div class="about-text-card">
                    <p class="text-base">
                        Agir concrètement pour le bien-être des communautés vulnérables à travers le monde, en mettant l'accent sur la jeunesse, l'éducation, la santé, l'environnement et la justice sociale. Nous concevons et réalisons des projets innovants, durables et participatifs.
                    </p>
                </div>
            </div>
        </div>

        <!-- Section Nos Valeurs (cartes avec icônes) -->
        <div class="mb-16">
            <h2 class="about-title text-left text-2xl mb-6">Nos <span>Valeurs</span></h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Valeur 1 -->
                <div class="value-card">
                    <div class="value-icon">🤝</div>
                    <h3>Solidarité</h3>
                    <p>Agir ensemble, sans laisser personne de côté.</p>
                </div>
                <!-- Valeur 2 -->
                <div class="value-card">
                    <div class="value-icon">⚖️</div>
                    <h3>Équité</h3>
                    <p>Garantir les mêmes chances à toutes et tous.</p>
                </div>
                <!-- Valeur 3 -->
                <div class="value-card">
                    <div class="value-icon">🌱</div>
                    <h3>Durabilité</h3>
                    <p>Construire un avenir viable pour les générations futures.</p>
                </div>
                <!-- Valeur 4 -->
                <div class="value-card">
                    <div class="value-icon">🔍</div>
                    <h3>Transparence</h3>
                    <p>Rendre compte de nos actions et de nos ressources.</p>
                </div>
            </div>
        </div>

        <!-- Section Notre Histoire (cartes avec images) -->
        <div class="mb-16">
            <h2 class="about-title text-left text-2xl mb-6">Notre <span>Histoire</span></h2>
            <div class="about-grid">
                <!-- Carte 1 : Création -->
                <div class="about-card"
                     data-modal-title="Création de l'ABEC"
                     data-modal-content="L'ABEC a été fondée en 2021 par un groupe de jeunes engagés, conscients des défis sociaux et environnementaux. Dès sa création, l'association a été officiellement déclarée sous le numéro 00001901/RDA/J06/SAAJP/BAPP, conformément à la loi camerounaise."
                     data-modal-image="{{ asset('image/ab.png') }}">
                    <div class="about-img-wrap">
                        <img src="{{ asset('image/ab.png') }}" alt="Création">
                        <span class="about-badge" style="background:rgba(255,215,0,0.7);color:#000;">2021</span>
                    </div>
                    <div class="about-body">
                        <h3>Création</h3>
                        <p>Fondée en 2021 par des jeunes visionnaires, l'ABEC naît d'une volonté de changement.</p>
                        <button class="about-btn">Lire →</button>
                    </div>
                </div>
                <!-- Carte 2 : Reconnaissance -->
                <div class="about-card"
                     data-modal-title="Reconnaissance officielle"
                     data-modal-content="Grâce à son sérieux et son professionnalisme, l'ABEC a rapidement été reconnue par les autorités et a noué des partenariats avec des organisations locales et internationales."
                     data-modal-image="{{ asset('image/la paix.png') }}">
                    <div class="about-img-wrap">
                        <img src="{{ asset('image/la paix.png') }}" alt="Reconnaissance">
                        <span class="about-badge" style="background:rgba(34,197,94,0.75);">Agrément</span>
                    </div>
                    <div class="about-body">
                        <h3>Reconnaissance</h3>
                        <p>Enregistrement officiel et début des partenariats avec des organisations.</p>
                        <button class="about-btn">Lire →</button>
                    </div>
                </div>
                <!-- Carte 3 : Premières actions -->
                <div class="about-card"
                     data-modal-title="Premières actions"
                     data-modal-content="Dès ses premiers mois, l'ABEC a organisé des campagnes de sensibilisation, des distributions alimentaires et des ateliers éducatifs dans plusieurs quartiers de Yaoundé."
                     data-modal-image="{{ asset('image/pont.png') }}">
                    <div class="about-img-wrap">
                        <img src="{{ asset('image/pont.png') }}" alt="Premières actions">
                        <span class="about-badge" style="background:rgba(245,158,11,0.75);color:#000;">2022</span>
                    </div>
                    <div class="about-body">
                        <h3>Premières actions</h3>
                        <p>Campagnes de sensibilisation et distributions alimentaires.</p>
                        <button class="about-btn">Lire →</button>
                    </div>
                </div>
                <!-- Carte 4 : Rayonnement -->
                <div class="about-card"
                     data-modal-title="Rayonnement international"
                     data-modal-content="Aujourd'hui, l'ABEC étend ses activités à plusieurs pays d'Afrique et collabore avec un réseau d'experts en droit, gestion de projet, communication et développement durable."
                     data-modal-image="{{ asset('image/ge.png') }}">
                    <div class="about-img-wrap">
                        <img src="{{ asset('image/ge.png') }}" alt="Rayonnement">
                        <span class="about-badge" style="background:rgba(30,144,255,0.7);">International</span>
                    </div>
                    <div class="about-body">
                        <h3>Rayonnement</h3>
                        <p>Des actions dans plusieurs pays et un réseau d'experts solide.</p>
                        <button class="about-btn">Lire →</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section Impact en chiffres -->
        <div class="mb-16">
            <h2 class="about-title text-left text-2xl mb-6">Notre <span>Impact</span></h2>
            <div class="stats-grid">
                <div class="stat-item">
                    <div class="stat-number">+5000</div>
                    <div class="stat-label">Bénéficiaires directs</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">12</div>
                    <div class="stat-label">Projets réalisés</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">8</div>
                    <div class="stat-label">Pays d'intervention</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">+30</div>
                    <div class="stat-label">Partenaires</div>
                </div>
            </div>
        </div>

        <!-- Section Vidéo -->
        <section id="about-teaser" class="section-animate">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <div class="teaser-video-wrap lg:order-1 order-2">
                        <video class="w-full h-full object-cover" autoplay loop muted playsinline>
                            <source src="{{ asset('image/Orange.mp4') }}" type="video/mp4">
                        </video>
                        <div class="absolute bottom-6 left-6 right-6 p-4 rounded-xl bg-white/10 backdrop-blur-md border border-white/20 hidden sm:block">
                            <p class="text-white text-xs font-bold leading-tight">
                                "Une jeunesse engagée pour un impact communautaire durable."
                            </p>
                        </div>
                    </div>
                    <div class="teaser-content lg:order-2 order-1 lg:pl-8">
                        <span class="text-yellow text-sm font-black tracking-widest uppercase mb-4 block">NOTRE ENGAGEMENT</span>
                        <h2>Défendre la <span>Dignité Humaine</span> &amp; Agir pour le Bien-Être</h2>
                        <p>
                            L'ABEC est une organisation internationale à but non lucratif qui rassemble des jeunes visionnaires déterminés à changer le cours des choses. À travers des actions concrètes en santé, environnement et éducation, nous bâtissons un avenir plus juste.
                        </p>
                        <a href="{{ route('aPropos') }}" class="teaser-btn">
                            En savoir plus 
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Citation de clôture -->
        <div class="text-center py-8">
            <p class="text-yellow text-xl italic">"Agir ensemble pour un monde plus juste et solidaire."</p>
        </div>

    </div>
</main>
@endsection

@push('scripts')
<script>
    // Fonctions modale (définies dans le layout, mais on les redéclare par sécurité)
    function openModal(content, title, imageSrc) {
        const modal = document.getElementById('modal');
        const modalContent = document.getElementById('modalContent');
        const modalTitle = document.getElementById('modalTitle');
        const modalImage = document.getElementById('modalImage');
        if (!modal || !modalContent || !modalTitle || !modalImage) return;
        modalContent.innerHTML = content;
        modalTitle.textContent = title;
        modalImage.src = imageSrc;
        modalImage.alt = title;
        modal.classList.add('show');
    }

    function closeModal() {
        const modal = document.getElementById('modal');
        if (modal) modal.classList.remove('show');
    }

    document.addEventListener('DOMContentLoaded', function() {
        // Attacher l'événement à chaque carte avec attributs data
        const cards = document.querySelectorAll('.about-card[data-modal-title]');
        cards.forEach(card => {
            card.addEventListener('click', function(e) {
                // Si on clique sur le bouton, on ne veut pas empêcher, mais on veut que le clic sur le bouton ouvre aussi la modale.
                // Comme l'événement se propage, cela fonctionnera.
                // Cependant, pour éviter les doubles appels (si le bouton a son propre gestionnaire), on s'assure qu'il n'y en a pas.
                const title = this.dataset.modalTitle;
                const content = this.dataset.modalContent;
                const image = this.dataset.modalImage;
                openModal(content, title, image);
            });
        });

        // Gestionnaire de fermeture de la modale (si pas déjà dans le layout)
        const modal = document.getElementById('modal');
        if (modal) {
            modal.addEventListener('click', function(e) {
                if (e.target === modal) closeModal();
            });
        }

        // Touche Echap
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') closeModal();
        });

        // Intersection Observer pour les animations
        const animatedElements = document.querySelectorAll('.about-card, .value-card, .stat-item, .section-animate');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('in-view', 'visible');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });

        animatedElements.forEach(el => observer.observe(el));
    });
</script>
@endpush