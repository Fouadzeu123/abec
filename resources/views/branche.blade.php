@extends('layouts.welcome')

@section('title', 'Événements | ABEC International')
@section('meta_description', 'Découvrez les événements passés et à venir de l’Association du Bien-Être Communautaire (ABEC) : actions terrain, campagnes, rencontres.')

@push('styles')
<style>
    /* ===== HERO SIMPLE ===== */
    #eventsHero {
        position: relative;
        width: 100%;
        height: 60vh;
        min-height: 400px;
        overflow: hidden;
        background-size: cover;
        background-position: center;
    }
    #eventsHero .hero-overlay {
        position: absolute; inset: 0;
        background: linear-gradient(135deg, rgba(0,0,30,0.7) 0%, rgba(30,144,255,0.2) 60%, rgba(0,0,0,0.6) 100%);
        z-index: 1;
    }
    #eventsHero .hero-content {
        position: relative; z-index: 2;
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
        animation: fadeUp 0.7s ease 0.2s forwards;
    }
    .hero-title {
        font-size: clamp(2rem, 6vw, 4rem);
        font-weight: 900; color: #fff;
        line-height: 1.15; max-width: 860px;
        text-shadow: 0 4px 24px rgba(0,0,0,0.45);
        opacity: 0; transform: translateY(30px);
        animation: fadeUp 0.8s ease 0.35s forwards;
    }
    .hero-sub {
        margin-top: 1rem;
        font-size: clamp(0.9rem, 2vw, 1.1rem);
        color: rgba(255,255,255,0.85); max-width: 600px;
        opacity: 0; transform: translateY(20px);
        animation: fadeUp 0.8s ease 0.55s forwards;
    }
    @keyframes fadeUp {
        to { opacity: 1; transform: translateY(0); }
    }

    /* ===== SECTIONS ÉVÉNEMENTS (fond sombre) ===== */
    .events-section {
        background: linear-gradient(160deg, #0f0f1a 0%, #0d1b2a 50%, #0f0f1a 100%);
        padding: 5rem 0;
        position: relative;
        overflow: hidden;
    }
    .events-section::before {
        content: '';
        position: absolute; inset: 0;
        background: radial-gradient(ellipse at 20% 50%, rgba(30,144,255,0.07) 0%, transparent 60%),
                    radial-gradient(ellipse at 80% 20%, rgba(255,215,0,0.05) 0%, transparent 50%);
        pointer-events: none;
    }
    .section-title {
        font-size: clamp(1.6rem, 4vw, 2.8rem);
        font-weight: 900;
        color: #ffffff;
        text-align: center;
        letter-spacing: -0.02em;
        margin-bottom: 2rem;
    }
    .section-title span { color: #FFD700; }

    /* Grille (identique à actions-grid) */
    .events-grid {
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        gap: 1.1rem;
        margin-top: 2.5rem;
    }
    @media (min-width: 640px)  { .events-grid { grid-template-columns: repeat(2, 1fr); } }
    @media (min-width: 1024px) { .events-grid { grid-template-columns: repeat(3, 1fr); gap: 1.4rem; } }

    /* Carte événement (calquée sur .act-card) */
    .event-card {
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
    .event-card.in-view {
        opacity: 1;
        transform: translateY(0);
    }
    .event-card:hover {
        transform: translateY(-6px) scale(1.02);
        box-shadow: 0 20px 50px rgba(0,0,0,0.55), 0 0 0 1px rgba(255,215,0,0.25);
        border-color: rgba(255,215,0,0.3);
    }
    .event-img-wrap {
        position: relative;
        width: 100%;
        padding-top: 62%;
        overflow: hidden;
    }
    .event-img-wrap img {
        position: absolute; inset: 0;
        width: 100%; height: 100%;
        object-fit: cover;
        transition: transform 0.6s cubic-bezier(.4,0,.2,1);
        filter: brightness(0.75);
    }
    .event-card:hover .event-img-wrap img {
        transform: scale(1.08);
        filter: brightness(0.55);
    }
    .event-badge {
        position: absolute; top: 0.6rem; left: 0.6rem;
        font-size: 0.6rem; font-weight: 800;
        letter-spacing: 0.1em; text-transform: uppercase;
        padding: 0.2rem 0.55rem; border-radius: 9999px;
        backdrop-filter: blur(6px);
        background: rgba(30,144,255,0.7);
        color: #fff;
    }
    .event-icon {
        position: absolute; bottom: 0.5rem; right: 0.7rem;
        font-size: 1.6rem;
        filter: drop-shadow(0 2px 6px rgba(0,0,0,0.6));
        transition: transform 0.3s ease;
    }
    .event-card:hover .event-icon { transform: scale(1.2) rotate(-5deg); }
    .event-body {
        padding: 0.9rem 1rem 1rem;
    }
    .event-body h3 {
        font-size: 0.9rem;
        font-weight: 800;
        color: #fff;
        line-height: 1.3;
        margin-bottom: 0.35rem;
    }
    .event-meta {
        font-size: 0.6rem;
        color: rgba(255,215,0,0.7);
        margin: 0.5rem 0 0.8rem;
        display: flex;
        align-items: center;
        gap: 0.3rem;
    }
    .event-meta::before {
        content: "📅";
        font-size: 0.7rem;
    }
    .event-body p {
        font-size: 0.7rem;
        color: rgba(255,255,255,0.5);
        line-height: 1.5;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .event-btn {
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
    .event-btn:hover { background: #FFD700; color: #000; }

    /* Stagger delays */
    .event-card:nth-child(1) { transition-delay: 0.05s; }
    .event-card:nth-child(2) { transition-delay: 0.10s; }
    .event-card:nth-child(3) { transition-delay: 0.15s; }
    .event-card:nth-child(4) { transition-delay: 0.20s; }
    .event-card:nth-child(5) { transition-delay: 0.25s; }
    .event-card:nth-child(6) { transition-delay: 0.30s; }
    .event-card { transition: opacity 0.6s ease, transform 0.6s ease, box-shadow 0.4s ease, border-color 0.3s; }

    /* Marquee pour "pas d'événements" (adaptée) */
    .no-events-marquee {
        width: 100%;
        overflow: hidden;
        white-space: nowrap;
        background: rgba(255,215,0,0.1);
        border: 1px solid rgba(255,215,0,0.25);
        padding: 1rem 0;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 0.5rem;
        margin: 2rem 0;
    }
    .no-events-marquee-text {
        display: inline-block;
        font-size: 1.25rem;
        font-weight: bold;
        color: #FFD700;
        animation: marquee 10s linear infinite;
    }
    @keyframes marquee {
        0% { transform: translateX(100%); }
        100% { transform: translateX(-100%); }
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

    /* ===== LOADING SPINNER (adapté) ===== */
    .loading-overlay {
        position: fixed;
        top: 0; left: 0;
        width: 100%; height: 100%;
        background: #0f0f1a;
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 9999;
        opacity: 1;
        transition: opacity 0.6s ease-out, visibility 0.6s ease-out;
        visibility: visible;
    }
    .loading-overlay[style*="display: none"] { /* géré par Alpine */
        opacity: 0;
        visibility: hidden;
        pointer-events: none;
    }
    .spinner-container {
        position: relative;
        width: 80px; height: 80px;
    }
    .spinner-circle {
        position: absolute;
        width: 100%; height: 100%;
        border: 4px solid transparent;
        border-top-color: #FFD700;
        border-radius: 50%;
        animation: spin 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
    }
    .spinner-logo {
        position: absolute;
        top: 50%; left: 50%;
        transform: translate(-50%, -50%);
        width: 48px; height: 48px;
        object-fit: contain;
        filter: brightness(0) invert(1);
    }
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
    [x-cloak] { display: none !important; }

    /* Responsive */
    @media (max-width: 640px) {
        .modal-content { padding: 1rem; }
        .modal-title { font-size: 1.2rem; }
        .modal-content p { font-size: 0.9rem; }
        .no-events-marquee-text { font-size: 1rem; }
    }
</style>
@endpush

@section('content')
<!-- LOADING SPINNER -->
<div x-data="{ isLoading: true }" x-init="setTimeout(() => isLoading = false, 2000)" x-show="isLoading" x-cloak class="loading-overlay">
    <div class="spinner-container">
        <div class="spinner-circle"></div>
        <img src="{{ asset('image/ab.png') }}" alt="ABEC" class="spinner-logo">
    </div>
</div>

<!-- MODALE -->
<div class="modal" id="modal">
    <div class="modal-content">
        <svg class="modal-close" onclick="closeModal()" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="18" y1="6" x2="6" y2="18"></line>
            <line x1="6" y1="6" x2="18" y2="18"></line>
        </svg>
        <img id="modalImage" class="modal-image" src="" alt="">
        <h3 class="modal-title" id="modalTitle"></h3>
        <p class="text-gray-600" id="modalContent"></p>
    </div>
</div>

<!-- ===== HERO ===== -->
<section id="eventsHero" style="background-image: url('{{ asset('image/fotos.jpg') }}');">
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <span class="hero-tag">Mobilisation</span>
        <h1 class="hero-title">Nos Événements</h1>
        <p class="hero-sub">Découvrez nos actions passées et à venir, et rejoignez le mouvement.</p>
    </div>
</section>

<!-- ===== ÉVÉNEMENTS À VENIR ===== -->
<section class="events-section">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="section-title">À <span>Venir</span></h2>
        <div class="no-events-marquee">
            <span class="no-events-marquee-text">Les événements ne sont pas encore disponibles...</span>
        </div>
    </div>
</section>

<!-- ===== ÉVÉNEMENTS PASSÉS ===== -->
<section class="events-section" style="padding-top: 0;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="section-title">Événements <span>Passés</span></h2>

        <div class="events-grid">
            <!-- Carte 1 -->
            <div class="event-card" data-modal-title="L'ABEC au contact de la population" data-modal-content="Lors de ses descentes sur le terrain, l’équipe se rapproche au maximum des bénéficiaires afin d’assurer une prise en charge de qualité et de favoriser des échanges fluides entre l’organisation et les populations concernées. Nous veillons à la transparence, notamment en ce qui concerne une distribution juste et équitable des ressources." data-modal-image="{{ asset('image/c.jpeg') }}">
                <div class="event-img-wrap">
                    <img src="{{ asset('image/c.jpeg') }}" alt="Événement" loading="lazy">
                    <span class="event-badge">Passé</span>
                    
                </div>
                <div class="event-body">
                    <h3>L'ABEC au contact de la population</h3>
                    <div class="event-meta">25 Mars 2025 • Bafoussam</div>
                    <p>Lors de ses descentes sur le terrain, l’équipe se rapproche au maximum des bénéficiaires afin d’assurer une prise en charge de qualité...</p>
                    <button class="event-btn">Voir plus →</button>
                </div>
            </div>

            <!-- Carte 2 -->
            <div class="event-card" data-modal-title="L'équipe d'ABEC en action" data-modal-content="La descente de l'organisation du bien-être communautaire à l’Hôpital Régional de Bafoussam a été un moment fort d’action sociale, concrétisé après plusieurs mois de préparation. Toute l’équipe s’est mobilisée, depuis la collecte de fonds jusqu’aux démarches administratives, en passant par l’organisation logistique. Le jour J, l’équipe a fait preuve d’efficacité, et les résultats ont été parmi les meilleurs." data-modal-image="{{ asset('image/ngui.jpeg') }}">
                <div class="event-img-wrap">
                    <img src="{{ asset('image/ngui.jpeg') }}" alt="Événement" loading="lazy">
                    <span class="event-badge">Passé</span>
                    
                </div>
                <div class="event-body">
                    <h3>L'équipe d'ABEC en action</h3>
                    <div class="event-meta">22 Mars 2025 • Bafoussam</div>
                    <p>La descente de l'organisation du bien-être communautaire à l’Hôpital Régional de Bafoussam a été un moment fort d’action sociale...</p>
                    <button class="event-btn">Voir plus →</button>
                </div>
            </div>

            <!-- Carte 3 -->
            <div class="event-card" data-modal-title="Presentations des dons" data-modal-content="Des dons ont été distribués à l’hôpital régional de Bafoussam afin de venir en aide directement aux patients. Cette initiative permet de soutenir leur bien-être, de faciliter l’accès aux soins et d’améliorer leur confort durant leur séjour à l’hôpital. Elle illustre l’importance de la solidarité envers les personnes malades et renforce l’accompagnement humanitaire au sein de la communauté." data-modal-image="{{ asset('image/a.jpeg') }}">
                <div class="event-img-wrap">
                    <img src="{{ asset('image/a.jpeg') }}" alt="Événement" loading="lazy">
                    <span class="event-badge">Passé</span>
                   
                </div>
                <div class="event-body">
                    <h3>Presentations des dons</h3>
                    <div class="event-meta">20 Mars 2025 • Bafoussam</div>
                    <p>Des dons ont été distribués à l’hôpital régional de Bafoussam afin de venir en aide directement aux patients...</p>
                    <button class="event-btn">Voir plus →</button>
                </div>
            </div>
        </div>

        <p class="text-center text-gray-400 font-bold max-w-3xl mx-auto mt-12 px-4 text-sm sm:text-base">
            Chaque événement est une opportunité d’agir ensemble. Rejoignez-nous et faites partie du changement !
        </p>
    </div>
</section>

<!-- Alpine.js -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

<script>
    // Fonctions modale (globales)
    function openModal(content, title, imageSrc) {
        const modal = document.getElementById('modal');
        const modalContent = document.getElementById('modalContent');
        const modalTitle = document.getElementById('modalTitle');
        const modalImage = document.getElementById('modalImage');
        modalContent.innerHTML = content || 'Contenu non disponible.';
        modalTitle.textContent = title || 'Événement';
        modalImage.src = imageSrc || '';
        modalImage.alt = title || 'Image';
        modal.classList.add('show');
    }
    function closeModal() {
        document.getElementById('modal').classList.remove('show');
    }

    document.addEventListener('DOMContentLoaded', () => {
        // Ouverture par le bouton (stop propagation)
        document.querySelectorAll('.event-btn').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.stopPropagation();
                const card = btn.closest('.event-card');
                const title = card.dataset.modalTitle;
                const content = card.dataset.modalContent;
                const image = card.dataset.modalImage;
                openModal(content, title, image);
            });
        });

        // Fermeture par clic extérieur et touche Echap
        const modal = document.getElementById('modal');
        modal.addEventListener('click', (e) => {
            if (e.target === modal) closeModal();
        });
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') closeModal();
        });

        // Intersection Observer pour les cartes
        const cards = document.querySelectorAll('.event-card');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('in-view');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });
        cards.forEach(card => observer.observe(card));
    });
</script>
@endsection