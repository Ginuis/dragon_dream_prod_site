<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Mon site Laravel')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS personnalisé -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>

<body class="bg-black text-white">

    <!-- 🧭 NAVBAR avec effet de survol -->
    <nav class="navbar navbar-expand-lg fixed-top custom-navbar">
        <div class="container">
            <a class="navbar-brand text-white" href="/">Dragon Dream</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navMenu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link text-white" href="/">Accueil</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="/a-propos">À propos</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="/inscription">Inscription</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="/galerie">Galerie</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- 🌍 CONTENU -->
    <div class="container mt-5 pt-5">
        @yield('content')
    </div>

    <!-- ⬆️ Bouton vers le haut (invisible par défaut) -->
    <button id="scrollToTop" class="btn btn-light scroll-top-btn" title="Retour en haut">
        ↑
    </button>

    <!-- ⚓️ FOOTER dynamique -->
    <footer id="mainFooter" class="footer-custom py-4 mt-5">
        <div class="container d-flex justify-content-between align-items-center flex-wrap text-white">
            <div><strong>📧</strong> contact@dragondream.fr</div>
            <div class="text-center flex-fill small">© Dragon Dream Production 2025</div>
            <div><strong>📞</strong> +33 6 12 34 56 78</div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Script perso -->
    <script>
        // Gestion du footer et du bouton haut
        const footer = document.getElementById('mainFooter');
        const scrollBtn = document.getElementById('scrollToTop');

        window.addEventListener('scroll', () => {
            // Active le style de fond du footer quand on scroll
            if (window.scrollY > 100) {
                footer.classList.add('footer-visible');
            } else {
                footer.classList.remove('footer-visible');
            }

            // Affiche le bouton de retour en haut uniquement en bas de page
            if ((window.innerHeight + window.scrollY) >= document.body.scrollHeight - 100) {
                scrollBtn.style.display = 'block';
            } else {
                scrollBtn.style.display = 'none';
            }
        });

        // Scroll vers le haut
        scrollBtn.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    </script>
</body>
</html>