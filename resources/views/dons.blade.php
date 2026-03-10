@extends('layouts.welcome')

@section('title', 'Faire un don | ABEC International')
@section('meta_description', 'Soutenez les actions humanitaires de l’Association du Bien-Être Communautaire (ABEC) par vos dons. Chaque geste compte pour améliorer la vie des communautés.')

@push('styles')
<style>
    /* ===== HERO DON ===== */
    #donHero {
        position: relative;
        width: 100%;
        height: 80vh;
        min-height: 500px;
        overflow: hidden;
        background-size: cover;
        background-position: center;
    }
    #donHero .hero-overlay {
        position: absolute; inset: 0;
        background: linear-gradient(135deg, rgba(0,0,30,0.8) 0%, rgba(30,144,255,0.3) 60%, rgba(0,0,0,0.7) 100%);
        z-index: 1;
    }
    #donHero .hero-content {
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

    /* ===== SECTIONS COMMUNES ===== */
    .don-section {
        background: linear-gradient(160deg, #0f0f1a 0%, #0d1b2a 50%, #0f0f1a 100%);
        padding: 5rem 0;
        position: relative;
        overflow: hidden;
    }
    .don-section::before {
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

    /* ===== GRILLE DE CARTES "POURQUOI DONNER" ===== */
    .reasons-grid {
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        gap: 1.1rem;
        margin-top: 2.5rem;
    }
    @media (min-width: 640px)  { .reasons-grid { grid-template-columns: repeat(2, 1fr); } }
    @media (min-width: 1024px) { .reasons-grid { grid-template-columns: repeat(4, 1fr); gap: 1.4rem; } }

    .reason-card {
        position: relative;
        border-radius: 1rem;
        overflow: hidden;
        background: rgba(255,255,255,0.04);
        border: 1px solid rgba(255,255,255,0.08);
        transition: transform 0.4s cubic-bezier(.4,0,.2,1), box-shadow 0.4s ease, border-color 0.3s;
        opacity: 0;
        transform: translateY(32px);
        padding: 1.5rem 1rem;
        text-align: center;
    }
    .reason-card.in-view {
        opacity: 1;
        transform: translateY(0);
    }
    .reason-card:hover {
        transform: translateY(-6px) scale(1.02);
        box-shadow: 0 20px 50px rgba(0,0,0,0.55), 0 0 0 1px rgba(255,215,0,0.25);
        border-color: rgba(255,215,0,0.3);
    }
    .reason-icon {
        font-size: 2.5rem;
        margin-bottom: 1rem;
        filter: drop-shadow(0 2px 6px rgba(0,0,0,0.6));
        transition: transform 0.3s ease;
    }
    .reason-card:hover .reason-icon { transform: scale(1.2) rotate(-5deg); }
    .reason-card h3 {
        font-size: 1rem;
        font-weight: 800;
        color: #fff;
        margin-bottom: 0.5rem;
    }
    .reason-card p {
        font-size: 0.7rem;
        color: rgba(255,255,255,0.5);
        line-height: 1.5;
    }

    /* ===== DIAPORAMA SWiper ===== */
    .swiper {
        width: 100%;
        max-width: 1200px;
        margin: 2rem auto 0;
        padding: 0 0.5rem;
    }
    .swiper-slide {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 0.5rem 0;
    }
    .swiper-slide img {
        width: 100%;
        height: auto;
        max-height: 60vh;
        object-fit: contain;
        object-position: center;
        border-radius: 1rem;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.5);
        transition: transform 0.3s ease;
        border: 1px solid rgba(255,215,0,0.2);
    }
    .swiper-slide img:hover {
        transform: scale(1.02);
    }
    .swiper-pagination-bullet {
        background: rgba(255,215,0,0.5);
    }
    .swiper-pagination-bullet-active {
        background: #FFD700;
    }

    /* ===== FORMULAIRE DE DON ===== */
    .don-form {
        max-width: 600px;
        margin: 2rem auto 0;
        background: rgba(255,255,255,0.02);
        border: 1px solid rgba(255,255,255,0.08);
        border-radius: 1.5rem;
        padding: 2rem;
        backdrop-filter: blur(4px);
    }
    .don-form label {
        display: block;
        color: #fff;
        font-size: 0.8rem;
        font-weight: 700;
        margin-bottom: 0.3rem;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }
    .don-form input,
    .don-form select {
        width: 100%;
        background: rgba(255,255,255,0.05);
        border: 1px solid rgba(255,255,255,0.1);
        border-radius: 0.8rem;
        padding: 0.8rem 1rem;
        color: #fff;
        font-size: 0.9rem;
        transition: all 0.3s ease;
        margin-bottom: 1.2rem;
    }
    .don-form input:focus,
    .don-form select:focus {
        outline: none;
        border-color: #FFD700;
        box-shadow: 0 0 0 2px rgba(255,215,0,0.2);
    }
    .don-form input::placeholder {
        color: rgba(255,255,255,0.3);
    }
    .don-form .btn-primary {
        background: #FFD700;
        color: #000;
        font-weight: 800;
        padding: 0.9rem 2rem;
        border-radius: 0.8rem;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 0 10px 20px rgba(255,215,0,0.2);
        border: none;
        cursor: pointer;
        width: 100%;
        font-size: 1rem;
    }
    .don-form .btn-primary:hover {
        transform: translateY(-3px) scale(1.02);
        background: #fff;
        box-shadow: 0 15px 30px rgba(255,215,0,0.3);
    }
    .don-form .btn-secondary {
        background: transparent;
        border: 1px solid rgba(255,255,255,0.2);
        color: #fff;
        font-weight: 700;
        padding: 0.9rem 2rem;
        border-radius: 0.8rem;
        transition: all 0.3s ease;
        cursor: pointer;
        width: 100%;
        margin-top: 0.5rem;
    }
    .don-form .btn-secondary:hover {
        background: rgba(255,255,255,0.05);
        border-color: #FFD700;
    }
    .alternative-payment-img {
        margin-top: 1.5rem;
        border-radius: 1rem;
        overflow: hidden;
        border: 1px solid rgba(255,215,0,0.3);
        box-shadow: 0 15px 30px rgba(0,0,0,0.4);
    }

    /* Messages flash */
    .alert-success {
        background: rgba(0,255,0,0.1);
        border: 1px solid #00ff00;
        color: #00ff00;
        padding: 1rem;
        border-radius: 0.8rem;
        text-align: center;
        margin-bottom: 1.5rem;
    }
    .alert-error {
        background: rgba(255,0,0,0.1);
        border: 1px solid #ff0000;
        color: #ff6666;
        padding: 1rem;
        border-radius: 0.8rem;
        text-align: center;
        margin-bottom: 1.5rem;
    }

    /* Stagger delays */
    .reason-card:nth-child(1) { transition-delay: 0.05s; }
    .reason-card:nth-child(2) { transition-delay: 0.10s; }
    .reason-card:nth-child(3) { transition-delay: 0.15s; }
    .reason-card:nth-child(4) { transition-delay: 0.20s; }
    .reason-card { transition: opacity 0.6s ease, transform 0.6s ease, box-shadow 0.4s ease, border-color 0.3s; }
</style>
@endpush

@section('content')
<!-- ===== HERO ===== -->
<section id="donHero" style="background-image: url('{{ asset('image/dons.png') }}');">
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <span class="hero-tag">Générosité & Solidarité</span>
        <h1 class="hero-title">Faites un Don</h1>
        <p class="hero-sub">Soutenez nos missions humanitaires pour changer des vies. Chaque geste compte.</p>
        <div class="hero-btns mt-8">
            <a href="#donation-form" class="hero-btn-primary">Donner maintenant ↓</a>
            <a href="#pourquoi-donner" class="hero-btn-secondary">Pourquoi donner ?</a>
        </div>
        <!-- Flèche animée -->
        <div class="animated-arrow">
            <a href="#pourquoi-donner" class="arrow-bounce inline-block">
                <svg class="arrow-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M7.41 8.59L12 13.17l4.59-4.58L18 10l-6 6-6-6 1.41-1.41z"/></svg>
            </a>
        </div>
    </div>
</section>

<!-- ===== POURQUOI DONNER ===== -->
<section id="pourquoi-donner" class="don-section">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="section-title">Pourquoi <span>Donner</span> ?</h2>
        <div class="reasons-grid">
            <div class="reason-card">
                <div class="reason-icon">🤝</div>
                <h3>Solidarité</h3>
                <p>Votre don permet de soutenir les personnes les plus vulnérables et de renforcer le lien social.</p>
            </div>
            <div class="reason-card">
                <div class="reason-icon">🌍</div>
                <h3>Impact global</h3>
                <p>Chaque contribution finance des projets concrets dans les domaines de la santé, de l'éducation et de l'environnement.</p>
            </div>
            <div class="reason-card">
                <div class="reason-icon">📈</div>
                <h3>Transparence</h3>
                <p>Nous nous engageons à utiliser vos dons de manière efficace et transparente, avec des rapports réguliers.</p>
            </div>
            <div class="reason-card">
                <div class="reason-icon">💡</div>
                <h3>Changement durable</h3>
                <p>Votre soutien contribue à des solutions durables qui améliorent les conditions de vie à long terme.</p>
            </div>
        </div>
    </div>
</section>

<!-- ===== GALERIE PHOTOS (DIAPORAMA) ===== -->
<section class="don-section" style="padding-top: 0;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="section-title">Nos <span>Actions</span> en Images</h2>
        <div class="swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide"><img src="{{ asset('image/1.png') }}" alt="Action 1"></div>
                <div class="swiper-slide"><img src="{{ asset('image/2.png') }}" alt="Action 2"></div>
                <div class="swiper-slide"><img src="{{ asset('image/3.png') }}" alt="Action 3"></div>
                <div class="swiper-slide"><img src="{{ asset('image/4.png') }}" alt="Action 4"></div>
                <div class="swiper-slide"><img src="{{ asset('image/b.jpeg') }}" alt="Action 5"></div>
            </div>
            <!-- Pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>

<!-- ===== FORMULAIRE DE DON ===== -->
<section id="donation-form" class="don-section">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="section-title">Faites <span>Votre Don</span></h2>

        <!-- Messages flash -->
        @if (session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif
        @if ($errors->has('general'))
            <div class="alert-error">{{ $errors->first('general') }}</div>
        @endif
        @if ($errors->any() && !$errors->has('general'))
            <div class="alert-error">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Formulaire -->
        <form action="{{ route('dons.store') }}" method="POST" class="don-form" x-data="{
            phone: '',
            countryPrefixes: {
                'CM|XAF': '+237',
                'BJ|XOF': '+229',
                'CI|XOF': '+225',
                'RW|RWF': '+250',
                'UG|UGX': '+256',
                'KE|KES': '+254'
            },
            selectedCountry: 'CM|XAF',
            showAlternativePayment: false,
            updatePhone() {
                const prefix = this.countryPrefixes[this.selectedCountry] || '';
                if (!this.phone.startsWith(prefix)) {
                    this.phone = prefix;
                }
            }
        }" x-init="updatePhone()" @submit="isLoading = true">
            @csrf
            <input type="hidden" name="nature" value="Financier">

            <label for="pays">Pays *</label>
            <select id="pays" name="country_currency" x-model="selectedCountry" @change="updatePhone()" required>
                <option value="CM|XAF">Cameroun (XAF)</option>
                <option value="BJ|XOF">Bénin (XOF)</option>
                <option value="CI|XOF">Côte d'Ivoire (XOF)</option>
                <option value="RW|RWF">Rwanda (RWF)</option>
                <option value="UG|UGX">Ouganda (UGX)</option>
                <option value="KE|KES">Kenya (KES)</option>
            </select>

            <label for="phone">Numéro de téléphone *</label>
            <input type="tel" id="phone" name="phone" x-model="phone" placeholder="Ex: +237696123456" required>

            <label for="amount">Montant (FCFA) *</label>
            <input type="number" id="amount" name="amount" min="5" placeholder="Entrez un montant" required>

            <label for="name">Nom (optionnel)</label>
            <input type="text" id="name" name="name" placeholder="Votre nom">

            <label for="email">Email (optionnel)</label>
            <input type="email" id="email" name="email" placeholder="Votre email">

            <label for="service">Opérateur *</label>
            <select id="service" name="service" required>
                <option value="">Choisissez</option>
                <option value="ORANGE">Orange</option>
                <option value="MTN">MTN</option>
            </select>

            <button type="submit" class="btn-primary">Soumettre le Don</button>

            <!-- Bouton "Payer autrement" -->
            <button type="button" @click="showAlternativePayment = !showAlternativePayment" class="btn-secondary">
                Payer autrement
            </button>

            <!-- Image alternative -->
            <div x-show="showAlternativePayment" x-cloak class="alternative-payment-img">
                <img src="{{ asset('image/ww.jpg') }}" alt="Méthode de paiement alternative" class="w-full">
            </div>
        </form>
    </div>
</section>
@endsection

@push('scripts')
<!-- Swiper JS -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialisation du diaporama
        new Swiper('.swiper', {
            loop: true,
            autoplay: {
                delay: 3500,
                disableOnInteraction: false,
            },
            slidesPerView: 1,
            spaceBetween: 20,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                640: { slidesPerView: 1 },
                768: { slidesPerView: 2 },
                1024: { slidesPerView: 2 },
            }
        });

        // Intersection Observer pour les cartes "Pourquoi donner"
        const cards = document.querySelectorAll('.reason-card');
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
@endpush