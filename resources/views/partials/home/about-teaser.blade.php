<section id="about-teaser" class="section-animate">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            
            <!-- Vidéo à gauche -->
            <div class="teaser-video-wrap lg:order-1 order-2">
                <video class="w-full h-full object-cover" autoplay loop muted playsinline>
                    <source src="{{ asset('image/Orange.mp4') }}" type="video/mp4">
                </video>
                <!-- Overlay glassmorphism sur la vidéo -->
                <div class="absolute bottom-6 left-6 right-6 p-4 rounded-xl bg-white/10 backdrop-blur-md border border-white/20 hidden sm:block">
                    <p class="text-white text-xs font-bold leading-tight">
                        "Une jeunesse engagée pour un impact communautaire durable."
                    </p>
                </div>
            </div>

            <!-- Texte à droite -->
            <div class="teaser-content lg:order-2 order-1 lg:pl-8">
                <span class="text-yellow text-sm font-black tracking-widest uppercase mb-4 block">QUI SOMMES-NOUS ?</span>
                <h2>Défendre la <span>Dignité Humaine</span> &amp; Agir pour le Bien-Être</h2>
                <p>
                    L'ABEC est une organisation internationale à but non lucratif qui rassemble des jeunes visionnaires déterminés à changer le cours des choses. À travers des actions concrètes en santé, environnement et éducation, nous bâtissons un avenir plus juste.
                </p>
                <a href="{{ route('aPropos') }}" class="teaser-btn">
                    Découvrir notre mission 
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                </a>
            </div>

        </div>
    </div>
</section>