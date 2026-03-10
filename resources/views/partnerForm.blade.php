@extends('layouts.welcome')

@section('title', 'Devenir Partenaire | ABEC International')
@section('meta_description', 'Rejoignez notre réseau de partenaires et contribuez au bien-être communautaire avec ABEC. Remplissez le formulaire pour nous rejoindre.')

@push('styles')
<style>
    /* ===== HERO SIMPLE ===== */
    #partnerHero {
        position: relative;
        width: 100%;
        height: 40vh;
        min-height: 300px;
        overflow: hidden;
        background-size: cover;
        background-position: center;
    }
    #partnerHero .hero-overlay {
        position: absolute; inset: 0;
        background: linear-gradient(135deg, rgba(0,0,30,0.7) 0%, rgba(30,144,255,0.2) 60%, rgba(0,0,0,0.6) 100%);
        z-index: 1;
    }
    #partnerHero .hero-content {
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
        font-size: clamp(2rem, 5vw, 3.5rem);
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

    /* ===== SECTION PARTENAIRE ===== */
    .partner-section {
        background: linear-gradient(160deg, #0f0f1a 0%, #0d1b2a 50%, #0f0f1a 100%);
        padding: 5rem 0;
        position: relative;
        overflow: hidden;
    }
    .partner-section::before {
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
        margin-bottom: 1rem;
    }
    .section-title span { color: #FFD700; }
    .section-sub {
        text-align: center;
        color: rgba(255,255,255,0.55);
        font-size: 1rem;
        max-width: 700px;
        margin: 0 auto 3rem;
    }

    /* ===== FORMULAIRE ===== */
    .partner-form {
        max-width: 800px;
        margin: 0 auto;
        background: rgba(255,255,255,0.02);
        border: 1px solid rgba(255,255,255,0.08);
        border-radius: 1.5rem;
        padding: 2.5rem;
        backdrop-filter: blur(10px);
    }
    .form-grid {
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        gap: 1.5rem;
    }
    @media (min-width: 640px) {
        .form-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }
    .form-group {
        margin-bottom: 1.2rem;
    }
    .form-group.full-width {
        grid-column: 1 / -1;
    }
    .form-label {
        display: block;
        color: #fff;
        font-size: 0.8rem;
        font-weight: 700;
        margin-bottom: 0.4rem;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }
    .form-control {
        width: 100%;
        background: rgba(255,255,255,0.05);
        border: 1px solid rgba(255,255,255,0.1);
        border-radius: 0.8rem;
        padding: 0.8rem 1.2rem;
        color: #fff;
        font-size: 0.9rem;
        transition: all 0.3s ease;
    }
    .form-control:focus {
        outline: none;
        border-color: #FFD700;
        box-shadow: 0 0 0 2px rgba(255,215,0,0.2);
    }
    .form-control::placeholder {
        color: rgba(255,255,255,0.3);
    }
    select.form-control option {
        background: #0d1b2a;
        color: #fff;
    }
    textarea.form-control {
        min-height: 120px;
        resize: vertical;
    }
    .checkbox-group {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        color: rgba(255,255,255,0.7);
        font-size: 0.9rem;
    }
    .checkbox-group input[type="checkbox"] {
        width: 18px;
        height: 18px;
        accent-color: #FFD700;
    }
    .btn-submit {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.6rem;
        background: #FFD700;
        color: #000;
        font-weight: 800;
        padding: 0.9rem 2.5rem;
        border-radius: 0.8rem;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 0 10px 20px rgba(255,215,0,0.2);
        border: none;
        cursor: pointer;
        font-size: 1rem;
        width: 100%;
        margin-top: 1.5rem;
    }
    .btn-submit:hover {
        transform: translateY(-3px) scale(1.02);
        background: #fff;
        box-shadow: 0 15px 30px rgba(255,215,0,0.3);
    }
    .alert-success {
        background: rgba(0,255,0,0.1);
        border: 1px solid #00ff00;
        color: #00ff00;
        padding: 1rem;
        border-radius: 0.8rem;
        text-align: center;
        margin-bottom: 2rem;
    }
    .alert-error {
        background: rgba(255,0,0,0.1);
        border: 1px solid #ff0000;
        color: #ff6666;
        padding: 1rem;
        border-radius: 0.8rem;
        text-align: center;
        margin-bottom: 2rem;
    }
    .text-error {
        color: #ff6666;
        font-size: 0.75rem;
        margin-top: 0.2rem;
        display: block;
    }
</style>
@endpush

@section('content')
<!-- ===== HERO ===== -->
<section id="partnerHero" style="background-image: url('{{ asset('image/partner-bg.jpg') }}');">
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <span class="hero-tag">Partenariat</span>
        <h1 class="hero-title">Devenir Partenaire</h1>
        <p class="hero-sub">Rejoignez un réseau d'acteurs engagés pour le bien-être communautaire.</p>
    </div>
</section>

<!-- ===== FORMULAIRE PARTENAIRE ===== -->
<section class="partner-section">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="section-title">Formulaire de <span>Candidature</span></h2>
        <p class="section-sub">Remplissez les informations ci-dessous. Nous vous contacterons dans les plus brefs délais.</p>

        <!-- Messages flash -->
        @if (session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif
        @if ($errors->any())
            <div class="alert-error">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('partners.store') }}" class="partner-form" x-data="{ type: '', autreVisible: false }">
            @csrf

            <div class="form-grid">
                <!-- Nom organisation -->
                <div class="form-group">
                    <label class="form-label" for="organisation">Nom de l'organisation *</label>
                    <input type="text" id="organisation" name="organisation" class="form-control" value="{{ old('organisation') }}" required>
                </div>

                <!-- Type d'organisation -->
                <div class="form-group">
                    <label class="form-label" for="type">Type d'organisation *</label>
                    <select id="type" name="type" class="form-control" x-model="type" required>
                        <option value="">Sélectionnez</option>
                        <option value="Entreprise">Entreprise</option>
                        <option value="ONG">ONG / Association</option>
                        <option value="Institution">Institution publique</option>
                        <option value="Autre">Autre</option>
                    </select>
                </div>

                <!-- Si autre, champ texte -->
                <div class="form-group full-width" x-show="type === 'Autre'" x-cloak>
                    <label class="form-label" for="type_autre">Précisez le type *</label>
                    <input type="text" id="type_autre" name="type_autre" class="form-control" value="{{ old('type_autre') }}">
                </div>

                <!-- Personne de contact -->
                <div class="form-group">
                    <label class="form-label" for="contact">Personne de contact *</label>
                    <input type="text" id="contact" name="contact" class="form-control" value="{{ old('contact') }}" required>
                </div>

                <!-- Fonction -->
                <div class="form-group">
                    <label class="form-label" for="fonction">Fonction</label>
                    <input type="text" id="fonction" name="fonction" class="form-control" value="{{ old('fonction') }}">
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label class="form-label" for="email">Email professionnel *</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
                </div>

                <!-- Téléphone -->
                <div class="form-group">
                    <label class="form-label" for="phone">Téléphone *</label>
                    <input type="tel" id="phone" name="phone" class="form-control" value="{{ old('phone') }}" required>
                </div>

                <!-- Pays -->
                <div class="form-group">
                    <label class="form-label" for="country">Pays</label>
                    <input type="text" id="country" name="country" class="form-control" value="{{ old('country') }}">
                </div>

                <!-- Message -->
                <div class="form-group full-width">
                    <label class="form-label" for="message">Message / Présentation de votre organisation</label>
                    <textarea id="message" name="message" class="form-control">{{ old('message') }}</textarea>
                </div>

                <!-- Conditions -->
                <div class="form-group full-width">
                    <div class="checkbox-group">
                        <input type="checkbox" id="accept" name="accept" value="1" {{ old('accept') ? 'checked' : '' }} required>
                        <label for="accept">J'accepte que mes données soient traitées pour être recontacté et je reconnais avoir pris connaissance de la <a href="{{ route('politique') }}" target="_blank" class="text-yellow underline">politique de confidentialité</a>.</label>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn-submit">
                <i class="ri-send-plane-fill"></i> Envoyer ma candidature
            </button>
        </form>
    </div>
</section>
@endsection

@push('scripts')
<script>
    // Alpine.js gère déjà l'affichage conditionnel
</script>
@endpush