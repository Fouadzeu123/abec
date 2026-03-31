<section id="heroCarousel">

    <!-- Slide 1 -->
    <div class="hero-slide active" id="hSlide0">
        <div class="hero-slide-bg" style="background-image:url('{{ asset('image/elev.png') }}')"></div>
        <div class="hero-slide-overlay"></div>
        <div class="hero-slide-content">
            <span class="hero-tag">Organisation Internationale</span>
            <h1 class="hero-title">Agissons ensemble pour le Bien-Être Communautaire</h1>
            <p class="hero-sub">Une jeunesse multinationale engagée au service des communautés vulnérables à travers le monde.</p>
            <div class="hero-btns">
                <a href="{{ route('dons') }}" class="hero-btn-primary">Faites un don ↓</a>
                <a href="{{ route('aPropos') }}" class="hero-btn-secondary">En savoir plus</a>
            </div>
        </div>
    </div>

    <!-- Slide 2 -->
    <div class="hero-slide" id="hSlide1">
        <div class="hero-slide-bg" style="background-image:url('{{ asset('image/pl.png') }}')"></div>
        <div class="hero-slide-overlay"></div>
        <div class="hero-slide-content">
            <span class="hero-tag">Jeunesse &amp; Avenir</span>
            <h1 class="hero-title">La Jeunesse Africaine, Moteur du Changement</h1>
            <p class="hero-sub">Investir dans les jeunes, c'est construire un avenir plus solide, innovant et équitable pour toute l'Afrique.</p>
            <div class="hero-btns">
                <a href="{{ route('dons') }}" class="hero-btn-primary">Soutenir notre mission ↓</a>
                <a href="#actions" class="hero-btn-secondary">Nos actions</a>
            </div>
        </div>
    </div>

    <!-- Slide 3 -->
    <div class="hero-slide" id="hSlide2">
        <div class="hero-slide-bg" style="background-image:url('{{ asset('image/enfants.png') }}')"></div>
        <div class="hero-slide-overlay"></div>
        <div class="hero-slide-content">
            <span class="hero-tag">Éducation &amp; Droits</span>
            <h1 class="hero-title">Chaque Enfant Mérite un Avenir Meilleur</h1>
            <p class="hero-sub">Nous œuvrons pour l'éducation, la protection et l'épanouissement des enfants les plus vulnérables.</p>
            <div class="hero-btns">
                <a href="{{ route('dons') }}" class="hero-btn-primary">Aider maintenant ↓</a>
                <a href="{{ route('news') }}" class="hero-btn-secondary">Nos actualités</a>
            </div>
        </div>
    </div>

    <!-- Slide 4 -->
    <div class="hero-slide" id="hSlide3">
        <div class="hero-slide-bg" style="background-image:url('{{ asset('image/p.png') }}')"></div>
        <div class="hero-slide-overlay"></div>
        <div class="hero-slide-content">
            <span class="hero-tag">Paix &amp; Justice</span>
            <h1 class="hero-title">Construire un Monde Plus Juste et Pacifique</h1>
            <p class="hero-sub">Agir pour la paix, c'est promouvoir le dialogue, la coopération et le respect des droits fondamentaux.</p>
            <div class="hero-btns">
                <a href="{{ route('dons') }}" class="hero-btn-primary">Rejoindre le mouvement ↓</a>
                <a href="{{ route('branche') }}" class="hero-btn-secondary">Événements</a>
            </div>
        </div>
    </div>

    <!-- Slide 5 -->
    <div class="hero-slide" id="hSlide4">
        <div class="hero-slide-bg" style="background-image:url('{{ asset('image/e.png') }}')"></div>
        <div class="hero-slide-overlay"></div>
        <div class="hero-slide-content">
            <span class="hero-tag">Environnement &amp; Durabilité</span>
            <h1 class="hero-title">Protéger Notre Planète pour les Générations Futures</h1>
            <p class="hero-sub">Le Bassin du Congo, poumon de l'Afrique, mérite notre engagement pour sa préservation et sa biodiversité.</p>
            <div class="hero-btns">
                <a href="{{ route('dons') }}" class="hero-btn-primary">Agir maintenant ↓</a>
                <a href="#about" class="hero-btn-secondary">Notre mission</a>
            </div>
        </div>
    </div>

    <!-- Flèches -->
    <button class="hero-arrow prev" id="heroPrev" aria-label="Précédent">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
    </button>
    <button class="hero-arrow next" id="heroNext" aria-label="Suivant">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
    </button>

    <!-- Dots de progression -->
    <div class="hero-dots-wrap" id="heroDots"></div>

    <!-- Bouton pause/play -->
    <button class="hero-pause-btn" id="heroPauseBtn" aria-label="Pause">
        <svg id="heroPauseIcon" width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"/></svg>
        <svg id="heroPlayIcon" width="16" height="16" fill="currentColor" viewBox="0 0 24 24" style="display:none"><path d="M8 5v14l11-7z"/></svg>
    </button>

    <!-- Barre de progression en bas -->
    <div class="hero-progress-strip">
        <div class="hero-progress-fill" id="heroProgressFill"></div>
    </div>

    <!-- Scroll arrow -->
    <div class="animated-arrow">
        <a href="#actions" class="arrow-bounce inline-block">
            <svg class="arrow-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M7.41 8.59L12 13.17l4.59-4.58L18 10l-6 6-6-6 1.41-1.41z"/></svg>
        </a>
    </div>
</section>