@extends('layouts.welcome')

@section('title', 'Actualités | ABEC International')
@section('meta_description', 'Retrouvez toutes les actualités et communiqués de l’Association du Bien-Être Communautaire (ABEC) : événements, actions, reconnaissances officielles.')

@push('styles')
<style>


/* Modal renforcé */
.modal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.8);
    z-index: 9999 !important; /* priorité maximale */
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
    width: 600px; /* largeur max par défaut, ajustable */
    max-height: 85vh; /* légèrement réduit pour éviter les débordements */
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
    position: sticky; /* reste visible en haut même en scroll */
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
    padding-right: 2rem; /* pour ne pas être caché par la croix */
}

.modal-content p {
    font-size: 1rem;
    line-height: 1.6;
    color: #333;
    white-space: pre-wrap; /* conserve les sauts de ligne */
}
    /* ===== HERO SIMPLE (inspiré du carrousel) ===== */
    #newsHero {
        position: relative;
        width: 100%;
        height: 60vh;
        min-height: 400px;
        overflow: hidden;
        background-size: cover;
        background-position: center;
    }
    #newsHero .hero-overlay {
        position: absolute; inset: 0;
        background: linear-gradient(135deg, rgba(0,0,30,0.7) 0%, rgba(30,144,255,0.2) 60%, rgba(0,0,0,0.6) 100%);
        z-index: 1;
    }
    #newsHero .hero-content {
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

    /* ===== SECTION ACTUALITÉS (grille premium) ===== */
    #news-grid {
        background: linear-gradient(160deg, #0f0f1a 0%, #0d1b2a 50%, #0f0f1a 100%);
        padding: 5rem 0;
        position: relative;
        overflow: hidden;
    }
    #news-grid::before {
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
    }
    .section-title span { color: #FFD700; }
    .section-sub {
        text-align: center;
        color: rgba(255,255,255,0.55);
        font-size: 0.95rem;
        margin-top: 0.6rem;
    }

    /* Grille identique à .actions-grid */
    .news-grid {
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        gap: 1.1rem;
        margin-top: 2.5rem;
    }
    @media (min-width: 640px)  { .news-grid { grid-template-columns: repeat(2, 1fr); } }
    @media (min-width: 1024px) { .news-grid { grid-template-columns: repeat(3, 1fr); gap: 1.4rem; } }

    /* Carte actualité (calquée sur .act-card) */
    .news-card {
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
    .news-card.in-view {
        opacity: 1;
        transform: translateY(0);
    }
    .news-card:hover {
        transform: translateY(-6px) scale(1.02);
        box-shadow: 0 20px 50px rgba(0,0,0,0.55), 0 0 0 1px rgba(255,215,0,0.25);
        border-color: rgba(255,215,0,0.3);
    }
    .news-img-wrap {
        position: relative;
        width: 100%;
        padding-top: 62%;
        overflow: hidden;
    }
    .news-img-wrap img {
        position: absolute; inset: 0;
        width: 100%; height: 100%;
        object-fit: cover;
        transition: transform 0.6s cubic-bezier(.4,0,.2,1);
        filter: brightness(0.75);
    }
    .news-card:hover .news-img-wrap img {
        transform: scale(1.08);
        filter: brightness(0.55);
    }
    .news-badge {
        position: absolute; top: 0.6rem; left: 0.6rem;
        font-size: 0.6rem; font-weight: 800;
        letter-spacing: 0.1em; text-transform: uppercase;
        padding: 0.2rem 0.55rem; border-radius: 9999px;
        backdrop-filter: blur(6px);
        background: rgba(30,144,255,0.7);
        color: #fff;
    }
    .news-icon {
        position: absolute; bottom: 0.5rem; right: 0.7rem;
        font-size: 1.6rem;
        filter: drop-shadow(0 2px 6px rgba(0,0,0,0.6));
        transition: transform 0.3s ease;
    }
    .news-card:hover .news-icon { transform: scale(1.2) rotate(-5deg); }
    .news-body {
        padding: 0.9rem 1rem 1rem;
    }
    .news-body h3 {
        font-size: 0.9rem;
        font-weight: 800;
        color: #fff;
        line-height: 1.3;
        margin-bottom: 0.35rem;
    }
    .news-body p {
        font-size: 0.7rem;
        color: rgba(255,255,255,0.5);
        line-height: 1.5;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .news-meta {
        font-size: 0.6rem;
        color: rgba(255,215,0,0.7);
        margin: 0.5rem 0 0.8rem;
        display: flex;
        align-items: center;
        gap: 0.3rem;
    }
    .news-meta::before {
        content: "📅";
        font-size: 0.7rem;
    }
    .news-btn {
        display: inline-flex; align-items: center; gap: 0.3rem;
        font-size: 0.7rem; font-weight: 700;
        color: #FFD700;
        background: rgba(255,215,0,0.1);
        border: 1px solid rgba(255,215,0,0.25);
        padding: 0.3rem 0.8rem; border-radius: 9999px;
        transition: all 0.25s ease;
        text-decoration: none;
        border: none;
        cursor: pointer;
    }
    .news-btn:hover { background: #FFD700; color: #000; }

    /* Bouton "Voir plus" */
    .btn-more {
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
        text-decoration: none;
    }
    .btn-more:hover {
        transform: translateY(-3px) scale(1.02);
        background: #fff;
        box-shadow: 0 15px 30px rgba(255,215,0,0.3);
    }

    /* ===== LOADING SPINNER (adapté au thème sombre) ===== */
    #page-loading {
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
    #page-loading.hidden {
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
        filter: brightness(0) invert(1); /* logo blanc sur fond sombre */
    }
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    /* Stagger delays pour les cartes */
    .news-card:nth-child(1) { transition-delay: 0.05s; }
    .news-card:nth-child(2) { transition-delay: 0.10s; }
    .news-card:nth-child(3) { transition-delay: 0.15s; }
    .news-card:nth-child(4) { transition-delay: 0.20s; }
    .news-card:nth-child(5) { transition-delay: 0.25s; }
    .news-card:nth-child(6) { transition-delay: 0.30s; }
    .news-card { transition: opacity 0.6s ease, transform 0.6s ease, box-shadow 0.4s ease, border-color 0.3s; }
</style>
@endpush

@section('content')
<!-- LOADING SPINNER -->
<div id="page-loading">
    <div class="spinner-container">
        <div class="spinner-circle"></div>
        <img src="{{ asset('image/ab.png') }}" alt="ABEC" class="spinner-logo">
    </div>
</div>

<!-- MODALE (réutilisée) -->
<div class="modal" id="modal">
    <div class="modal-content">
        <img id="modalImage" class="modal-image" src="" alt="">
        <h3 class="modal-title" id="modalTitle"></h3>
        <p class="text-sm text-gray-600" id="modalContent"></p>
        <svg class="modal-close" onclick="closeModal()" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="18" y1="6" x2="6" y2="18"></line>
            <line x1="6" y1="6" x2="18" y2="18"></line>
        </svg>
    </div>
</div>

<!-- ===== HERO ACTUALITÉS ===== -->
<section id="newsHero" style="background-image: url('{{ asset('image/news-hero.jpg') }}');">
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <span class="hero-tag">Dernières nouvelles</span>
        <h1 class="hero-title">Actualités & Communiqués</h1>
        <p class="hero-sub">Suivez nos actions, nos événements et notre impact au sein des communautés.</p>
    </div>
</section>

<!-- ===== GRILLE D'ACTUALITÉS ===== -->
<section id="news-grid">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- En-tête -->
        <div class="text-center mb-12">
            <h2 class="section-title">À la <span>Une</span></h2>
            <p class="section-sub">Toute l'actualité de l'ABEC en un coup d'œil</p>
        </div>

        <?php
        $newsConfig = [
            'articles' => [
                [
                    'title' => 'Appel aux bénévoles volontaires',
                    'content' => 'En août 2024, l’ABEC lance une campagne de mobilisation pour recruter des bénévoles motivés...',
                    'fullContent' => 'En août 2024, l’ABEC a lancé un appel à toute personne prête à s’impliquer activement dans la vie de l’organisation. Cette campagne de mobilisation vise à recruter des bénévoles motivés, disponibles et capables de travailler en équipe, que ce soit à distance ou en présentiel. L’association recherche des profils multilingues (français, anglais), prêts à consacrer du temps et de l’énergie pour renforcer l’impact de ses activités dans le monde. Les missions peuvent inclure la communication, l’organisation d’événements, la production de contenu, ou encore la participation à des projets sociaux. 🎯 Les places sont limitées. 📩 Contact : contact@universalwelfare.org 📱 WhatsApp : +237 6 21620677',
                    'image' => 'image/appl.jpg',
                    'date' => '31/08/2025'
                ],
                [
                    'title' => 'Action à l’hôpital régional de Bafoussam',
                    'content' => 'Le 20 mars 2025, l’association a apporté soutien moral, matériel et sanitaire aux patients hospitalisés...',
                    'fullContent' => 'Le 20 mars 2025, l’association Du bien-être communautaire a effectué une descente à l’hôpital régional de Bafoussam, dans le cadre de ses activités sociales. Cette initiative visait à apporter du soutien moral, matériel et sanitaire aux patients hospitalisés, en particulier ceux en situation de précarité. L’équipe de l’association a distribué des dons, échangé avec le personnel soignant et sensibilisé sur l’importance du bien-être mental dans le processus de guérison. Une action saluée tant par les bénéficiaires que par l’administration de l’hôpital, qui appelle à la multiplication de ce type de gestes solidaires dans les structures de santé.',
                    'image' => 'image/news.png',
                    'date' => '27/03/2025'
                ],
                [
                    'title' => 'Reconnaissance officielle de l’ABEC',
                    'content' => 'Récépissé n°00001901/RDA/J06/SAAJP/BAPP délivré le 20 novembre 2024 par la Préfecture du Mfoundi...',
                    'fullContent' => 'L’Association du Bien-Être Communautaire (ABEC) est officiellement reconnue par les autorités administratives camerounaises. Son récépissé de déclaration a été délivré sous le n°00001901/RDA/J06/SAAJP/BAPP en date du 20 novembre 2024, par le Préfet du Département du Mfoundi, région du Centre, Cameroun. Cette reconnaissance légale renforce la crédibilité de l’organisation et témoigne de son engagement dans la mise en œuvre d’actions sociales et humanitaires durables. 📌 Pour toute collaboration ou demande d\'information : 📞 +237 6 21620677 📧 contact@universalwelfare.org',
                    'image' => 'image/teste.jpg',
                    'date' => '20/11/2024'
                ],
            ]
        ];
        ?>

        <div class="news-grid">
            @foreach($newsConfig['articles'] as $article)
            <div class="news-card">   <!-- onclick retiré -->
                <div class="news-img-wrap">
                    <img src="{{ asset($article['image']) }}" alt="{{ $article['title'] }}" loading="lazy">
                    <span class="news-badge">Actualité</span>
                    <span class="news-icon">📰</span>
                </div>
                <div class="news-body">
                    <h3>{{ $article['title'] }}</h3>
                    <p>{{ $article['content'] }}</p>
                    <div class="news-meta">{{ $article['date'] }}</div>
                    <!-- Le bouton déclenche la modale -->
                    <button class="news-btn" onclick="openModal(
                        `{{ str_replace(["\r", "\n"], ' ', addslashes($article['fullContent'])) }}`,
                        `{{ addslashes($article['title']) }}`,
                        `{{ asset($article['image']) }}`
                    )">Lire plus →</button>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Bouton voir plus (peut être lié à une page d'archives) -->
        <div class="text-center mt-16">
            <a href="#archives" class="btn-more">
                Toutes les actualités
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
            </a>
        </div>
    </div>
</section>

<!-- Pas de section partenaires ajoutée -->
@endsection

@push('scripts')
<script>
// ===== FONCTIONS MODALE =====
function openModal(content, title, imageSrc) {
    const modal = document.getElementById('modal');
    const modalContent = document.getElementById('modalContent');
    const modalTitle = document.getElementById('modalTitle');
    const modalImage = document.getElementById('modalImage');
    modalContent.innerHTML = content.replace(/\n/g, '<br>');
    modalTitle.textContent = title;
    modalImage.src = imageSrc;
    modalImage.alt = title;
    modal.classList.add('show');
}
function closeModal() {
    document.getElementById('modal').classList.remove('show');
}

// ===== INTERSECTION OBSERVER POUR LES CARTES =====
(function(){
    const cards = document.querySelectorAll('.news-card');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('in-view');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });
    cards.forEach(card => observer.observe(card));
})();

// ===== GESTION DU LOADER =====
window.addEventListener('load', () => {
    setTimeout(() => {
        document.getElementById('page-loading').classList.add('hidden');
    }, 600);
});

// ===== FERMETURE MODALE (clic extérieur & Échap) =====
document.addEventListener('DOMContentLoaded', () => {
    const modal = document.getElementById('modal');
    modal.addEventListener('click', (e) => {
        if (e.target === modal) closeModal();
    });
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') closeModal();
    });
});
</script>
@endpush