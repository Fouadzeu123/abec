@extends('layouts.welcome')

@section('title', 'FAQ | ABEC International')
@section('meta_description', 'Trouvez les réponses aux questions fréquentes sur l’Association du Bien-Être Communautaire (ABEC) : dons, actions, bénévolat, reconnaissance légale.')

@push('styles')
<style>
    /* ===== HERO SIMPLE ===== */
    #faqHero {
        position: relative;
        width: 100%;
        height: 40vh;
        min-height: 300px;
        overflow: hidden;
        background-size: cover;
        background-position: center;
    }
    #faqHero .hero-overlay {
        position: absolute; inset: 0;
        background: linear-gradient(135deg, rgba(0,0,30,0.7) 0%, rgba(30,144,255,0.2) 60%, rgba(0,0,0,0.6) 100%);
        z-index: 1;
    }
    #faqHero .hero-content {
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

    /* ===== FAQ SECTION ===== */
    .faq-section {
        background: #f9fafb;
        padding: 4rem 0;
        position: relative;
    }
    .section-title {
        font-size: clamp(1.6rem, 4vw, 2.4rem);
        font-weight: 900;
        color: #1E90FF;
        text-align: center;
        letter-spacing: -0.02em;
        margin-bottom: 1rem;
        text-transform: uppercase;
        text-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    .section-sub {
        text-align: center;
        color: #6b7280;
        font-size: 1rem;
        max-width: 700px;
        margin: 0 auto 3rem;
    }

    .faq-item {
        background: white;
        border-radius: 1rem;
        box-shadow: 0 8px 20px rgba(0,0,0,0.04);
        margin-bottom: 1rem;
        border: 1px solid #e5e7eb;
        transition: all 0.3s ease;
        overflow: hidden;
    }
    .faq-item:hover {
        box-shadow: 0 12px 28px rgba(0,0,0,0.08);
        border-color: #1E90FF40;
    }
    .faq-question {
        cursor: pointer;
        padding: 1.2rem 1.5rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-weight: 700;
        color: #1E90FF;
        transition: background-color 0.2s;
    }
    .faq-question:hover {
        background-color: #f0f9ff;
    }
    .faq-question span {
        font-size: 1.1rem;
        line-height: 1.4;
        flex: 1;
    }
    .faq-icon {
        width: 24px; height: 24px;
        border-radius: 50%;
        background: #1E90FF10;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: transform 0.3s ease, background 0.3s ease;
        color: #1E90FF;
        flex-shrink: 0;
        margin-left: 1rem;
    }
    .faq-question:hover .faq-icon {
        background: #1E90FF;
        color: white;
    }
    .faq-icon.open {
        transform: rotate(180deg);
        background: #1E90FF;
        color: white;
    }
    .faq-answer {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.5s cubic-bezier(0.4,0,0.2,1), padding 0.3s ease;
        padding: 0 1.5rem;
        color: #4b5563;
        font-weight: 400;
        line-height: 1.6;
        background: #f9fafb;
        border-top: 1px solid transparent;
    }
    .faq-answer.open {
        max-height: 500px;
        padding: 1.5rem;
        border-top-color: #e5e7eb;
    }
    .faq-answer ul {
        list-style-type: disc;
        padding-left: 1.5rem;
        margin-top: 0.5rem;
    }
    .faq-answer a {
        color: #1E90FF;
        font-weight: 600;
        text-decoration: underline;
        text-underline-offset: 2px;
    }
    .faq-answer a:hover {
        color: #FFD700;
    }
</style>
@endpush

@section('content')
<!-- ===== HERO ===== -->
<section id="faqHero" style="background-image: url('{{ asset('image/faq-bg.jpg') }}');">
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <span class="hero-tag">Questions fréquentes</span>
        <h1 class="hero-title">FAQ – Nous répondons à vos questions</h1>
        <p class="hero-sub">Trouvez rapidement des informations sur l'ABEC, nos actions, les dons et le bénévolat.</p>
    </div>
</section>

<!-- ===== SECTION FAQ ===== -->
<section class="faq-section">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="section-title">Questions Fréquemment Posées</h2>
        <p class="section-sub">Des réponses claires et précises pour mieux connaître l'ABEC et son fonctionnement.</p>

        <div class="space-y-4">
            <!-- FAQ 1 -->
            <div class="faq-item" x-data="{ open: false }">
                <div class="faq-question" @click="open = !open">
                    <span>Qu'est-ce que l'ABEC ?</span>
                    <div class="faq-icon" :class="{ 'open': open }">
                        <svg x-show="!open" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                            <path d="M12 5v14M5 12h14" stroke-linecap="round"/>
                        </svg>
                        <svg x-show="open" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                            <path d="M5 12h14" stroke-linecap="round"/>
                        </svg>
                    </div>
                </div>
                <div class="faq-answer" :class="{ 'open': open }">
                    L'Association du Bien-Être Communautaire (ABEC) est une organisation internationale à but non lucratif, légalement reconnue au Cameroun sous le numéro de déclaration 00001901/RDA/J06/SAAJP/BAPP. Nous œuvrons pour le bien-être des communautés à travers des programmes concrets dans les domaines de la jeunesse, de l'environnement, des droits humains, de la santé, de la paix et du développement durable.
                </div>
            </div>

            <!-- FAQ 2 -->
            <div class="faq-item" x-data="{ open: false }">
                <div class="faq-question" @click="open = !open">
                    <span>Comment puis-je faire un don ?</span>
                    <div class="faq-icon" :class="{ 'open': open }">
                        <svg x-show="!open" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                            <path d="M12 5v14M5 12h14" stroke-linecap="round"/>
                        </svg>
                        <svg x-show="open" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                            <path d="M5 12h14" stroke-linecap="round"/>
                        </svg>
                    </div>
                </div>
                <div class="faq-answer" :class="{ 'open': open }">
                    Vous pouvez faire un don en toute sécurité via notre <a href="{{ route('dons') }}">page Dons</a>. Nous acceptons les virements bancaires, mobile money et autres méthodes locales. Chaque contribution, quelle que soit sa taille, soutient directement nos actions sur le terrain.
                </div>
            </div>

            <!-- FAQ 3 -->
            <div class="faq-item" x-data="{ open: false }">
                <div class="faq-question" @click="open = !open">
                    <span>Quelles sont vos principales actions ?</span>
                    <div class="faq-icon" :class="{ 'open': open }">
                        <svg x-show="!open" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                            <path d="M12 5v14M5 12h14" stroke-linecap="round"/>
                        </svg>
                        <svg x-show="open" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                            <path d="M5 12h14" stroke-linecap="round"/>
                        </svg>
                    </div>
                </div>
                <div class="faq-answer" :class="{ 'open': open }">
                    Nos actions incluent : sensibilisation environnementale, campagnes de santé, promotion des droits de la femme et de l'enfant, éducation civique, projets culturels, initiatives panafricaines, et accompagnement des jeunes entrepreneurs. Nous croyons au changement par l'action locale.
                </div>
            </div>

            <!-- FAQ 4 -->
            <div class="faq-item" x-data="{ open: false }">
                <div class="faq-question" @click="open = !open">
                    <span>Comment puis-je contacter l'ABEC ?</span>
                    <div class="faq-icon" :class="{ 'open': open }">
                        <svg x-show="!open" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                            <path d="M12 5v14M5 12h14" stroke-linecap="round"/>
                        </svg>
                        <svg x-show="open" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                            <path d="M5 12h14" stroke-linecap="round"/>
                        </svg>
                    </div>
                </div>
                <div class="faq-answer" :class="{ 'open': open }">
                    Vous pouvez nous joindre :
                    <ul>
                        <li><strong>Email :</strong> <a href="mailto:globaluniversalwelfare@gmail.com">globaluniversalwelfare@gmail.com</a></li>
                        <li><strong>Téléphone :</strong> +237 6 21 62 06 77</li>
                        <li><strong>Réseaux sociaux :</strong> Facebook, WhatsApp, Instagram (icônes en haut du site)</li>
                    </ul>
                </div>
            </div>

            <!-- FAQ 5 -->
            <div class="faq-item" x-data="{ open: false }">
                <div class="faq-question" @click="open = !open">
                    <span>L'ABEC est-elle une ONG reconnue ?</span>
                    <div class="faq-icon" :class="{ 'open': open }">
                        <svg x-show="!open" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                            <path d="M12 5v14M5 12h14" stroke-linecap="round"/>
                        </svg>
                        <svg x-show="open" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                            <path d="M5 12h14" stroke-linecap="round"/>
                        </svg>
                    </div>
                </div>
                <div class="faq-answer" :class="{ 'open': open }">
                    Oui. L'ABEC est officiellement enregistrée au Cameroun conformément à la <strong>Loi n°99/014 du 22 décembre 1999</strong> régissant les ONG et à la <strong>Loi n°90/053 du 19 décembre 1990</strong> sur la liberté d'association. Nous sommes donc une organisation légale, transparente et engagée.
                </div>
            </div>

            <!-- FAQ 6 -->
            <div class="faq-item" x-data="{ open: false }">
                <div class="faq-question" @click="open = !open">
                    <span>Puis-je devenir bénévole ?</span>
                    <div class="faq-icon" :class="{ 'open': open }">
                        <svg x-show="!open" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                            <path d="M12 5v14M5 12h14" stroke-linecap="round"/>
                        </svg>
                        <svg x-show="open" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                            <path d="M5 12h14" stroke-linecap="round"/>
                        </svg>
                    </div>
                </div>
                <div class="faq-answer" :class="{ 'open': open }">
                    Absolument ! Nous accueillons avec joie les bénévoles passionnés par notre mission. Envoyez-nous un message via nos contacts ou remplissez le formulaire sur notre page Contact. Ensemble, agissons pour un monde meilleur.
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    // Alpine.js est déjà chargé dans le layout, pas besoin de le réinclure.
    // On peut laisser le comportement géré par x-data.
</script>
@endpush