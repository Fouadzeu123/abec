<section id="actions">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- En-tête -->
        <p class="actions-sub">Nous œuvrons pour un monde plus juste, plus vert et plus solidaire.</p>
        <h2 class="actions-title">Nos <span>Domaines d'Action</span></h2>

        <!-- Grille de cartes -->
        <div class="actions-grid">

            <!-- 1 — La Jeunesse -->
            <div class="act-card" onclick="openModal(`{{ str_replace(['`','\n','\r'],['\\`','<br>',''],addslashes('L\'Afrique possède une population extrêmement jeune, dans de nombreuses zones, près de 40 % des habitants ont moins de 15 ans, et plus de 400 millions de personnes sont âgées de 15 à 35 ans. Pourtant, ce secteur de la population fait face à des défis sérieux. Agir en faveur des jeunes, c\'est investir dans un avenir plus solide, plus innovant et plus équitable pour toute l\'Afrique.')) }}`, 'La Jeunesse', '{{ asset('image/ge.png') }}')">
                <div class="act-img-wrap">
                    <img src="{{ asset('image/ge.png') }}" alt="La Jeunesse">
                    <span class="act-badge" style="background:rgba(30,144,255,0.7);color:#fff;">Jeunesse</span>
                </div>
                <div class="act-body">
                    <h3>La Jeunesse</h3>
                    <p>L'Afrique possède une population extrêmement jeune. Agir en faveur des jeunes, c'est investir dans un avenir plus solide et équitable.</p>
                    <button class="act-btn">Voir plus →</button>
                </div>
            </div>

            <!-- 2 — L'Environnement -->
            <div class="act-card" onclick="openModal(`{{ str_replace(['`','\n','\r'],['\\`','<br>',''],addslashes('La région du Bassin du Congo abrite l\'une des dernières grandes étendues de forêt tropicale intacte au monde. La forêt du Bassin du Congo peut capturer environ 0,61 gigatonne de CO₂ par an. Agir pour l\'environnement, c\'est prendre soin de la nature qui a toujours pris soin de nous.')) }}`, 'L\'Environnement', '{{ asset('image/vegete.png') }}')">
                <div class="act-img-wrap">
                    <img src="{{ asset('image/vegete.png') }}" alt="L'Environnement">
                    <span class="act-badge" style="background:rgba(34,197,94,0.75);color:#fff;">Écologie</span>
                </div>
                <div class="act-body">
                    <h3>L'Environnement</h3>
                    <p>Le Bassin du Congo, puits de carbone vital. Protéger cette forêt, c'est préserver un patrimoine pour l'humanité entière.</p>
                    <button class="act-btn">Voir plus →</button>
                </div>
            </div>

            <!-- 3 — Les Droits de l'Homme -->
            <div class="act-card" onclick="openModal(`{{ str_replace(['`','\n','\r'],['\\`','<br>',''],addslashes('En Afrique et ailleurs, de nombreuses personnes sont persécutées en raison de leur identité ethnique ou de leurs opinions. La dignité humaine est universelle et inaliénable. Agir pour la défense des droits de l\'Homme, c\'est se lever contre l\'injustice.')) }}`, 'Les Droits de l\'Homme', '{{ asset('image/droit.png') }}')">
                <div class="act-img-wrap">
                    <img src="{{ asset('image/droit.png') }}" alt="Droits de l'Homme">
                    <span class="act-badge" style="background:rgba(239,68,68,0.7);color:#fff;">Droits</span>
                </div>
                <div class="act-body">
                    <h3>Les Droits de l'Homme</h3>
                    <p>La dignité humaine est universelle. Nous défendons chaque individu contre toute forme d'injustice et de discrimination.</p>
                    <button class="act-btn">Voir plus →</button>
                </div>
            </div>

            <!-- 4 — La Santé -->
            <div class="act-card" onclick="openModal(`{{ str_replace(['`','\n','\r'],['\\`','<br>',''],addslashes('La santé mondiale est marquée par des inégalités profondes. En 2023, environ 260 000 femmes sont décédées des suites de complications liées à la grossesse. Agir pour la santé mondiale, c\'est investir dans la vie et le bien-être de chaque individu.')) }}`, 'La Santé', '{{ asset('image/santee.png') }}')">
                <div class="act-img-wrap">
                    <img src="{{ asset('image/santee.png') }}" alt="La Santé">
                    <span class="act-badge" style="background:rgba(236,72,153,0.7);color:#fff;">Santé</span>
                </div>
                <div class="act-body">
                    <h3>La Santé</h3>
                    <p>Des inégalités profondes marquent la santé mondiale. Nous œuvrons pour un accès universel à des soins de qualité.</p>
                    <button class="act-btn">Voir plus →</button>
                </div>
            </div>

            <!-- 5 — La Paix -->
            <div class="act-card" onclick="openModal(`{{ str_replace(['`','\n','\r'],['\\`','<br>',''],addslashes('Selon le Global Peace Index 2025, le niveau de paix mondiale est au plus bas. En 2024, le monde a enregistré 152 000 décès liés aux conflits. Agir pour la paix, c\'est œuvrer pour un monde plus juste et harmonieux.')) }}`, 'La Paix', '{{ asset('image/paix.png') }}')">
                <div class="act-img-wrap">
                    <img src="{{ asset('image/paix.png') }}" alt="La Paix">
                    <span class="act-badge" style="background:rgba(99,102,241,0.7);color:#fff;">Paix</span>
                </div>
                <div class="act-body">
                    <h3>La Paix</h3>
                    <p>152 000 décès liés aux conflits en 2024. Promouvoir le dialogue et la coopération pour bâtir un avenir pacifique.</p>
                    <button class="act-btn">Voir plus →</button>
                </div>
            </div>

            <!-- 6 — La Justice -->
            <div class="act-card" onclick="openModal(`{{ str_replace(['`','\n','\r'],['\\`','<br>',''],addslashes('La justice est un pilier fondamental pour des sociétés équitables. En 2023, environ 4,4 milliards de personnes vivaient dans des pays où l\'accès à la justice est limité. Agir pour la justice, c\'est promouvoir l\'égalité devant la loi.')) }}`, 'La Justice', '{{ asset('image/bel.png') }}')">
                <div class="act-img-wrap">
                    <img src="{{ asset('image/bel.png') }}" alt="La Justice">
                    <span class="act-badge" style="background:rgba(245,158,11,0.75);color:#000;">Justice</span>
                </div>
                <div class="act-body">
                    <h3>La Justice</h3>
                    <p>4,4 milliards de personnes sans accès à la justice. Nous renforçons les institutions pour garantir l'égalité de tous.</p>
                    <button class="act-btn">Voir plus →</button>
                </div>
            </div>

            <!-- 7 — Le Développement Durable -->
            <div class="act-card" onclick="openModal(`{{ str_replace(['`','\n','\r'],['\\`','<br>',''],addslashes('Le développement durable est essentiel pour répondre aux besoins actuels sans compromettre les générations futures. Nos actions incluent des formations et des projets visant à promouvoir des pratiques agricoles durables et l\'accès à l\'énergie renouvelable.')) }}`, 'Le Développement Durable', '{{ asset('image/deve.png') }}')">
                <div class="act-img-wrap">
                    <img src="{{ asset('image/deve.png') }}" alt="Développement Durable">
                    <span class="act-badge" style="background:rgba(20,184,166,0.75);color:#fff;">Durabilité</span>
                </div>
                <div class="act-body">
                    <h3>Développement Durable</h3>
                    <p>Pratiques agricoles durables et accès aux énergies renouvelables pour un futur viable pour tous.</p>
                    <button class="act-btn">Voir plus →</button>
                </div>
            </div>

            <!-- 8 — Le Bien-être des Communautés -->
            <div class="act-card" onclick="openModal(`{{ str_replace(['`','\n','\r'],['\\`','<br>',''],addslashes('Le bien-être des communautés est au cœur de nos actions. L\'insécurité alimentaire touche environ 2,4 milliards de personnes dans le monde. Nos initiatives incluent la distribution de repas nutritifs et des programmes de formation agricole.')) }}`, 'Le Bien-être des Communautés', '{{ asset('image/pont.png') }}')">
                <div class="act-img-wrap">
                    <img src="{{ asset('image/pont.png') }}" alt="Bien-être Communauté">
                    <span class="act-badge" style="background:rgba(30,144,255,0.7);color:#fff;">Communauté</span>
                </div>
                <div class="act-body">
                    <h3>Bien-être Communautaire</h3>
                    <p>2,4 milliards face à l'insécurité alimentaire. Nous distribuons des repas et formons aux techniques agricoles durables.</p>
                    <button class="act-btn">Voir plus →</button>
                </div>
            </div>

            <!-- 9 — La Culture -->
            <div class="act-card" onclick="openModal(`{{ str_replace(['`','\n','\r'],['\\`','<br>',''],addslashes('L\'Afrique est un continent riche d\'une diversité culturelle exceptionnelle, avec plus de 3 000 groupes ethniques. Agir pour la culture africaine, c\'est préserver notre identité et investir dans la mémoire collective.')) }}`, 'La Culture', '{{ asset('image/f.png') }}')">
                <div class="act-img-wrap">
                    <img src="{{ asset('image/f.png') }}" alt="La Culture">
                    <span class="act-badge" style="background:rgba(168,85,247,0.7);color:#fff;">Culture</span>
                </div>
                <div class="act-body">
                    <h3>La Culture</h3>
                    <p>Plus de 3 000 groupes ethniques. Préserver l'identité africaine, c'est construire un futur ancré dans ses valeurs.</p>
                    <button class="act-btn">Voir plus →</button>
                </div>
            </div>

            <!-- 10 — L'Histoire -->
            <div class="act-card" onclick="openModal(`{{ str_replace(['`','\n','\r'],['\\`','<br>',''],addslashes('L\'Afrique possède une histoire millénaire, riche de civilisations anciennes. La jeunesse africaine joue un rôle clé dans la revalorisation de ce patrimoine. Agir pour l\'histoire africaine, c\'est préserver la mémoire du continent.')) }}`, 'L\'Histoire', '{{ asset('image/h.png') }}')">
                <div class="act-img-wrap">
                    <img src="{{ asset('image/h.png') }}" alt="L'Histoire">
                    <span class="act-badge" style="background:rgba(245,158,11,0.75);color:#000;">Histoire</span>
                </div>
                <div class="act-body">
                    <h3>L'Histoire</h3>
                    <p>Civilisations de l'Égypte au royaume de Kongo. Valoriser ce patrimoine, c'est éclairer l'avenir par le passé.</p>
                    <button class="act-btn">Voir plus →</button>
                </div>
            </div>

            <!-- 11 — Le Panafricanisme -->
            <div class="act-card" onclick="openModal(`{{ str_replace(['`','\n','\r'],['\\`','<br>',''],addslashes('Le panafricanisme est un mouvement visant à unir les peuples africains autour de valeurs de solidarité, de développement et d\'autonomie. Agir pour le panafricanisme, c\'est œuvrer pour l\'unité et la solidarité du continent africain.')) }}`, 'Le Panafricanisme', '{{ asset('image/pp.png') }}')">
                <div class="act-img-wrap">
                    <img src="{{ asset('image/pp.png') }}" alt="Le Panafricanisme">
                    <span class="act-badge" style="background:rgba(34,197,94,0.75);color:#fff;">Panafricanisme</span>
                </div>
                <div class="act-body">
                    <h3>Le Panafricanisme</h3>
                    <p>Unir 54 pays autour de valeurs communes. L'Afrique unie est une Afrique forte, innovante et souveraine.</p>
                    <button class="act-btn">Voir plus →</button>
                </div>
            </div>

            <!-- 12 — Égalité & Équité -->
            <div class="act-card" onclick="openModal(`{{ str_replace(['`','\n','\r'],['\\`','<br>',''],addslashes('Dans de nombreuses régions du monde, les inégalités persistent encore: inégalités de genre, économiques, sociales et éducatives. Promouvoir l\'égalité et l\'équité, c\'est reconnaître la dignité de chaque personne.')) }}`, 'Promotion de l\'Égalité et de l\'Équité', '{{ asset('image/b.png') }}')">
                <div class="act-img-wrap">
                    <img src="{{ asset('image/b.png') }}" alt="Égalité et Équité">
                    <span class="act-badge" style="background:rgba(236,72,153,0.7);color:#fff;">Égalité</span>
                </div>
                <div class="act-body">
                    <h3>Égalité &amp; Équité</h3>
                    <p>Lutter contre les inégalités de genre, économiques et sociales pour que chaque personne puisse s'épanouir.</p>
                    <button class="act-btn">Voir plus →</button>
                </div>
            </div>

        </div><!-- /actions-grid -->
    </div>
</section>