<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>@yield('title', 'Organisation du Bien-Être Communautaire | ABEC International')</title>
    
    <!-- Theme Initialization -->
    <script>
        if (localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>

    <meta name="description" content="@yield('meta_description', 'ABEC International œuvre pour le bien-être communautaire à travers des actions concrètes en santé, éducation et environnement.')">

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="64x64" href="{{ asset('image/ab.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('image/ab.png') }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&family=Sora:wght@700;800;900&display=swap" rel="stylesheet">

    <!-- Remix Icons -->
    <link rel="stylesheet" href="https://unpkg.com/remixicon@3.5.0/fonts/remixicon.css">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        display: ['Sora', 'sans-serif'],
                    },
                    colors: {
                        primary: '#1E90FF',
                        primaryDark: '#0B5ED7',
                        secondary: '#87CEFA',
                        yellow: '#FFD700',
                        dark: '#0a0f1c',
                    }
                }
            }
        }
    </script>

    <!-- AlpineJS -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')

    <style>
        [x-cloak] { display: none !important; }

        /* ===== THEME SYSTEM ===== */
        :root {
            --bg-primary: #ffffff;
            --text-primary: #111827;
            --text-secondary: #4b5563;
            --text-muted: #9ca3af;
            --nav-bg: rgba(255, 255, 255, 0.97);
            --nav-border: rgba(0, 0, 0, 0.06);
            --card-bg: #ffffff;
            --card-border: rgba(0, 0, 0, 0.05);
            --footer-bg: #0a0f1c;
            --section-alt: #f9fafb;
            --loader-bg: #ffffff;
            --input-bg: #ffffff;
            --input-border: #e5e7eb;
        }

        .dark {
            --bg-primary: #0a0f1c;
            --text-primary: #f9fafb;
            --text-secondary: #d1d5db;
            --text-muted: #9ca3af;
            --nav-bg: rgba(10, 15, 28, 0.96);
            --nav-border: rgba(255, 255, 255, 0.08);
            --card-bg: #111827;
            --card-border: rgba(255, 255, 255, 0.1);
            --footer-bg: #050810;
            --section-alt: #0f172a;
            --loader-bg: #0a0f1c;
            --input-bg: #1f2937;
            --input-border: #374151;
        }

        /* Transition for theme switching */
        body { transition: background-color 0.3s ease, color 0.3s ease; }

        /* ===== GLOBAL ===== */
        *, *::before, *::after { box-sizing: border-box; }
        html { scroll-behavior: smooth; }
        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-primary);
            color: var(--text-primary);
            overflow-x: hidden;
        }
        .font-all-bold, body, h1, h2, h3, p, a, li { font-weight: bold; }

        /* ===== PAGE LOADER ===== */
        .page-loader {
            position: fixed; inset: 0; z-index: 99999;
            background: var(--loader-bg);
            display: flex; align-items: center; justify-content: center;
            flex-direction: column; gap: 1rem;
            transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .page-loader.loaded { 
            opacity: 0; 
            visibility: hidden;
            transform: scale(1.05);
        }
        .loader-ring {
            position: relative; width: 60px; height: 60px;
        }
        .loader-ring::before {
            content: '';
            position: absolute; inset: 0;
            border: 4px solid rgba(30,144,255,0.15);
            border-top-color: #1E90FF;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }
        .loader-ring img {
            position: absolute; top: 50%; left: 50%;
            transform: translate(-50%, -50%);
            width: 36px; height: 36px;
            object-fit: contain;
        }
        @keyframes spin { to { transform: rotate(360deg); } }

        /* ===== HEADER PREMIUM ===== */
        .site-header {
            position: fixed; top: 0; left: 0; right: 0;
            z-index: 9000;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Top bar announcement */
        .top-announcement {
            background: linear-gradient(90deg, #1E90FF 0%, #0B5ED7 50%, #1E90FF 100%);
            background-size: 200% 100%;
            animation: shimmer-bg 4s ease infinite;
            overflow: hidden;
            white-space: nowrap;
            height: 36px;
            display: flex; align-items: center;
            position: relative;
        }
        @keyframes shimmer-bg {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        .announcement-scroll {
            display: inline-block;
            animation: announcement-run 20s linear infinite;
            font-size: 0.78rem;
            font-weight: 700;
            color: #FFD700;
            letter-spacing: 0.05em;
            padding-left: 100%;
            white-space: nowrap;
        }
        @keyframes announcement-run {
            from { transform: translateX(0); }
            to   { transform: translateX(-100%); }
        }
        .top-announcement .social-links {
            position: absolute; right: 1rem; top: 50%; transform: translateY(-50%);
            display: flex; align-items: center; gap: 0.5rem;
        }
        .top-social-icon {
            width: 22px; height: 22px; border-radius: 50%;
            overflow: hidden;
            border: 1px solid rgba(255,255,255,0.3);
            transition: transform 0.2s ease, border-color 0.2s ease;
        }
        .top-social-icon:hover { transform: scale(1.1); border-color: #FFD700; }
        .top-social-icon img { width: 100%; height: 100%; object-fit: cover; }

        /* Main nav area */
        .nav-glass {
            background: var(--nav-bg);
            backdrop-filter: blur(16px) saturate(180%);
            -webkit-backdrop-filter: blur(16px) saturate(180%);
            border-bottom: 1px solid var(--nav-border);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .nav-glass.scrolled {
            background: var(--nav-bg);
            box-shadow: 0 4px 24px -4px rgba(0,0,0,0.12), 0 1px 0 var(--nav-border);
        }
        .nav-inner {
            max-width: 1280px; margin: 0 auto;
            padding: 0 1rem;
            display: flex; align-items: center; justify-content: space-between;
            height: 68px;
            transition: height 0.4s ease;
        }
        .nav-glass.scrolled .nav-inner { height: 58px; }

        /* Logo */
        .nav-logo {
            display: flex; align-items: center; gap: 0.75rem;
            text-decoration: none;
        }
        .nav-logo-img-wrap {
            width: 48px; height: 48px;
            
            overflow: hidden;
            border: 2px solid transparent;
            background: linear-gradient(white, white) padding-box,
                        linear-gradient(135deg, #1E90FF, #FFD700) border-box;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            flex-shrink: 0;
        }
        .nav-logo:hover .nav-logo-img-wrap {
            transform: scale(1.05);
            box-shadow: 0 4px 20px rgba(30,144,255,0.3);
        }
        .nav-logo-img-wrap img { width: 100%; height: 100%; object-fit: cover; }
        .nav-logo-text { line-height: 1; }
        .nav-logo-name {
            font-family: 'Sora', sans-serif;
            font-size: 1.3rem; font-weight: 900;
            color: var(--text-primary);
            letter-spacing: -0.02em;
            transition: color 0.3s ease;
        }
        .nav-logo:hover .nav-logo-name { color: #1E90FF; }
        .nav-logo-tagline {
            font-size: 0.6rem; font-weight: 700;
            text-transform: uppercase; letter-spacing: 0.12em;
            color: var(--text-muted);
            margin-top: 2px;
        }

        /* Desktop Nav Links */
        .nav-links { display: flex; align-items: center; gap: 0.25rem; }
        .nav-link-item {
            position: relative;
            padding: 0.4rem 0.85rem;
            border-radius: 0.5rem;
            font-size: 0.875rem; font-weight: 700;
            color: var(--text-secondary);
            text-decoration: none;
            transition: color 0.25s ease, background-color 0.25s ease;
        }
        .nav-link-item::after {
            content: '';
            position: absolute; bottom: -2px; left: 0.85rem; right: 0.85rem;
            height: 2px; background: #1E90FF; border-radius: 9999px;
            transform: scaleX(0);
            transform-origin: center;
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .nav-link-item:hover { color: #1E90FF; background-color: rgba(30,144,255,0.06); }
        .nav-link-item:hover::after, .nav-link-item.active::after { transform: scaleX(1); }
        .nav-link-item.active { color: #1E90FF; }

        /* Donate button in header */
        .btn-header-donate {
            display: inline-flex; align-items: center; gap: 0.4rem;
            padding: 0.55rem 1.4rem;
            background: linear-gradient(135deg, #FFD700 0%, #F59E0B 100%);
            color: #000;
            font-weight: 800; font-size: 0.875rem;
            border-radius: 9999px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 4px 14px rgba(255,215,0,0.35);
            white-space: nowrap;
        }
        .btn-header-donate:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(255,215,0,0.5);
        }

        /* Mobile menu */
        .mobile-nav-overlay {
            position: fixed; inset: 0; z-index: 8999;
            background: rgba(0,0,0,0.4); backdrop-filter: blur(4px);
            opacity: 0; pointer-events: none;
            transition: opacity 0.3s ease;
        }
        .mobile-nav-overlay.open { opacity: 1; pointer-events: all; }
        .mobile-nav-panel {
            position: fixed; top: 0; right: 0; bottom: 0;
            width: min(320px, 85vw);
            background: var(--bg-primary);
            z-index: 9100;
            transform: translateX(100%);
            transition: transform 0.35s cubic-bezier(0.4, 0, 0.2, 1);
            overflow-y: auto;
            display: flex; flex-direction: column;
            border-left: 1px solid var(--nav-border);
        }
        .mobile-nav-panel.open { transform: translateX(0); }
        .mobile-nav-panel-header {
            display: flex; align-items: center; justify-content: space-between;
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid var(--nav-border);
        }
        .mobile-nav-close {
            width: 36px; height: 36px;
            border-radius: 50%; background: var(--input-bg);
            display: flex; align-items: center; justify-content: center;
            color: var(--text-primary); cursor: pointer;
            transition: background 0.2s ease, color 0.2s ease;
        }
        .mobile-nav-close:hover { background: #fee2e2; color: #ef4444; }
        .mobile-nav-links { padding: 1rem 1rem 1.5rem; flex: 1; }
        .mobile-nav-link {
            display: flex; align-items: center; gap: 0.85rem;
            padding: 0.9rem 1rem; border-radius: 0.75rem;
            color: var(--text-secondary); font-weight: 700; font-size: 0.95rem;
            text-decoration: none;
            transition: background 0.2s ease, color 0.2s ease;
            margin-bottom: 0.25rem;
        }
        .mobile-nav-link .icon-wrap {
            width: 40px; height: 40px; border-radius: 0.6rem;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.1rem; flex-shrink: 0;
        }
        .mobile-nav-link:hover { background: #eff6ff; color: #1E90FF; }
        .mobile-nav-footer { padding: 1.5rem; border-top: 1px solid var(--nav-border); }

        /* Theme Toggle Button */
        .theme-toggle-btn {
            width: 40px; height: 40px;
            border-radius: 12px;
            display: flex; align-items: center; justify-content: center;
            color: var(--text-primary);
            background: var(--input-bg);
            border: 1px solid var(--nav-border);
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .theme-toggle-btn:hover {
            transform: translateY(-2px);
            background: var(--nav-bg);
            border-color: #1E90FF;
            box-shadow: 0 4px 12px rgba(30,144,255,0.1);
        }

        /* ===== FOOTER AMÉLIORÉ (thème sombre) ===== */
        /* Footer Marquee */
        .footer-marquee {
            background: #0a0f1c; /* fond très sombre */
            border-top: 1px solid rgba(255, 215, 0, 0.2);
            border-bottom: 1px solid rgba(255, 215, 0, 0.2);
            padding: 1rem 0;
            overflow: hidden;
            white-space: nowrap;
            box-shadow: inset 0 0 20px rgba(0,0,0,0.5);
        }
        .footer-marquee-content {
            display: inline-block;
            animation: footer-marquee-run 25s linear infinite;
            font-family:  sans-serif;
            font-size: 1.35rem;
            font-weight: 900;
            color: #FFD700;
            text-transform: uppercase;
            letter-spacing: 0.25em;
            padding-left: 100%;
            text-shadow: 0 0 10px rgba(255,215,0,0.5);
        }
        @keyframes footer-marquee-run {
            from { transform: translateX(0); }
            to   { transform: translateX(-100%); }
        }

        .site-footer {
            background: #000000;
            position: relative; overflow: hidden;
            color: white;
            padding-top: 5rem;
            border-top: 1px solid rgba(255,215,0,0.15);
        }
        /* Vague décorative */
        .footer-wave-top {
            position: absolute; top: 0; left: 0; width: 100%;
            overflow: hidden; line-height: 0;
            transform: translateY(-1px);
        }
        .footer-wave-top svg {
            position: relative; display: block;
            width: calc(100% + 1.3px); height: 60px;
            filter: drop-shadow(0 4px 4px rgba(0,0,0,0.2));
        }
        .footer-wave-top .shape-fill { fill: #0a0f1c; }
        /* Orbes lumineux plus subtils */
        .footer-glow-orb {
            position: absolute; border-radius: 50%;
            pointer-events: none; filter: blur(90px);
        }
        .footer-glow-1 {
            width: 600px; height: 600px;
            background: radial-gradient(circle, rgba(30,144,255,0.15) 0%, transparent 70%);
            top: -300px; right: -200px;
        }
        .footer-glow-2 {
            width: 500px; height: 500px;
            background: radial-gradient(circle, rgba(255,215,0,0.1) 0%, transparent 70%);
            bottom: -250px; left: -150px;
        }
        /* Boutons sociaux améliorés */
        .footer-social-btn {
            display: flex; align-items: center; justify-content: center;
            width: 44px; height: 44px; border-radius: 50%;
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,215,0,0.3);
            color: #FFD700; font-size: 1.2rem;
            text-decoration: none;
            transition: all 0.3s ease;
            backdrop-filter: blur(4px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.3);
        }
        .footer-social-btn:hover {
            background: #FFD700; color: #0a0f1c;
            transform: translateY(-5px) scale(1.05);
            box-shadow: 0 12px 24px rgba(255,215,0,0.4);
            border-color: #FFD700;
        }
        .footer-nav-title {
            font-size: 0.8rem; font-weight: 800;
            text-transform: uppercase; letter-spacing: 0.15em;
            color: rgba(255,215,0,0.7);
            margin-bottom: 1.25rem;
            display: flex; align-items: center; gap: 0.5rem;
        }
        .footer-nav-title::before {
            content: '';
            width: 28px; height: 3px;
            background: #FFD700; border-radius: 9999px;
            box-shadow: 0 0 8px #FFD700;
        }
        .footer-link-item {
            display: flex; align-items: center; gap: 0.5rem;
            color: rgba(255,255,255,0.7); font-size: 0.9rem; font-weight: 600;
            text-decoration: none;
            padding: 0.4rem 0;
            transition: color 0.3s ease, transform 0.3s ease, gap 0.3s ease;
            
        }
        .footer-link-item i { color: #FFD700; font-size: 0.9rem; transition: transform 0.3s ease, color 0.3s ease; }
        .footer-link-item:hover { color: #FFD700; transform: translateX(8px); gap: 0.75rem; }
        .footer-link-item:hover i { transform: translateX(4px); color: #fff; }
        .footer-contact-card {
            background: rgba(10, 15, 28, 0.7);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255,215,0,0.2);
            border-radius: 1.5rem;
            padding: 1.75rem;
            box-shadow: 0 20px 30px -10px rgba(0,0,0,0.5);
        }
        .footer-contact-row {
            display: flex; align-items: flex-start; gap: 0.85rem;
            padding: 0.85rem 0;
            border-bottom: 1px solid rgba(255,215,0,0.1);
        }
        .footer-contact-row:last-child { border-bottom: none; padding-bottom: 0; }
        .footer-contact-icon {
            width: 40px; height: 40px; border-radius: 0.75rem;
            background: rgba(255,215,0,0.12);
            display: flex; align-items: center; justify-content: center;
            color: #FFD700; font-size: 1.1rem; flex-shrink: 0;
            border: 1px solid rgba(255,215,0,0.2);
        }
        .footer-contact-label {
            font-size: 0.7rem; font-weight: 800;
            text-transform: uppercase; letter-spacing: 0.1em;
            color: #FFD700; opacity: 0.7; margin-bottom: 2px;
        }
        .footer-contact-value { color: white; font-weight: 600; font-size: 0.95rem; }

        /* Footer CTA amélioré */
        .footer-cta {
            background: linear-gradient(145deg, #1E90FF 0%, #0B5ED7 100%);
            border-radius: 2rem; padding: 3rem 2.5rem;
            position: relative; overflow: hidden;
            margin: 3rem 0;
            border: 1px solid rgba(255,215,0,0.3);
            box-shadow: 0 20px 30px -10px #00000080;
        }
        .footer-cta::before {
            content: '';
            position: absolute; inset: 0;
            background: url("data:image/svg+xml,%3Csvg width='80' height='80' viewBox='0 0 80 80' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%23FFD700' fill-opacity='0.05' fill-rule='evenodd'%3E%3Cpath d='M50 50v-5h-5v5h-5v5h5v5h5v-5h5v-5h-5zm0-40V5h-5v5h-5v5h5v5h5v-5h5v-5h-5zM10 50v-5H5v5H0v5h5v5h5v-5h5v-5h-5zM10 10V5H5v5H0v5h5v5h5v-5h5v-5h-5z'/%3E%3C/g%3E%3C/svg%3E");
        }
        .footer-cta-btn {
            display: inline-flex; align-items: center; gap: 0.6rem;
            background: #0a0f1c; color: #FFD700;
            padding: 0.9rem 2.2rem; border-radius: 0.9rem;
            font-weight: 800; font-size: 1rem;
            transition: all 0.3s ease;
            box-shadow: 0 8px 20px rgba(0,0,0,0.4), 0 0 0 1px #FFD70033;
            border: 1px solid #FFD70099;
        }
        .footer-cta-btn:hover {
            background: #FFD700; color: #0a0f1c;
            transform: translateY(-3px);
            box-shadow: 0 16px 28px rgba(255,215,0,0.4);
        }

        /* Back to top */
        #btt-btn {
            position: fixed; bottom: 1.5rem; right: 1.5rem;
            width: 48px; height: 48px;
            background: #FFD700; color: #0a0f1c;
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.3rem; z-index: 40;
            box-shadow: 0 4px 14px rgba(255,215,0,0.6);
            opacity: 0; transform: translateY(20px);
            transition: all 0.35s cubic-bezier(0.4, 0, 0.2, 1);
            cursor: pointer;
            border: none;
        }
        #btt-btn.visible { opacity: 1; transform: translateY(0); }
        #btt-btn:hover { background: #ffffff; color: #1E90FF; transform: translateY(-3px) scale(1.1); box-shadow: 0 12px 28px #FFD700; }

        .footer-heading { text-shadow: 0 2px 4px rgba(0,0,0,0.5); }
    </style>
</head>
<body class="flex flex-col min-h-screen antialiased">

    <!-- ===== PAGE LOADER ===== -->
    <div class="page-loader" id="page-loader">
        <div class="loader-ring">
            <img src="{{ asset('image/ab.png') }}" alt="Logo ABEC">
        </div>
        <p style="font-size:0.75rem; font-weight:700; color:#9ca3af; letter-spacing:0.1em; text-transform:uppercase;">Chargement...</p>
    </div>

    <!-- ===== HEADER PREMIUM ===== -->
    <header class="site-header" id="site-header">

        <!-- Bande d'annonce supérieure -->
        <div class="top-announcement hidden sm:flex">
            <span class="announcement-scroll">
                🌍 Agir ensemble pour le Bien-Être Communautaire — ABEC International &nbsp;&nbsp;|&nbsp;&nbsp;
                ✓ Actions en Santé, Éducation, Environnement &nbsp;&nbsp;|&nbsp;&nbsp;
                💛 Soutenez notre mission — Faites un don aujourd'hui &nbsp;&nbsp;|&nbsp;&nbsp;
                🌍 Agir ensemble pour le Bien-Être Communautaire — ABEC International &nbsp;&nbsp;|&nbsp;&nbsp;
                ✓ Actions en Santé, Éducation, Environnement &nbsp;&nbsp;|&nbsp;&nbsp;
                💛 Soutenez notre mission — Faites un don aujourd'hui
            </span>
        </div>

        <!-- Navigation principale -->
        <div class="nav-glass" id="nav-glass">
            <div class="nav-inner">

                <!-- Logo -->
                <a href="{{ url('/') }}" class="nav-logo">
                    <div class="nav-logo-img-wrap">
                        <img src="{{ asset('image/ab.png') }}" alt="Logo ABEC">
                    </div>
                    <div class="nav-logo-text hidden sm:block">
                        <div class="nav-logo-name">ABEC</div>
                        <div class="nav-logo-tagline">International</div>
                    </div>
                </a>

                <!-- Desktop Navigation -->
                <nav class="hidden md:flex nav-links">
                    <a href="{{ url('/') }}" class="nav-link-item {{ request()->is('/') ? 'active' : '' }}">Accueil</a>
                    @if (Route::currentRouteName()=='welcome')
                    <a href="#actions" class="nav-link-item">Nos Actions</a>
                    @endif
                    <a href="{{ route('aPropos') }}" class="nav-link-item {{ request()->routeIs('aPropos') ? 'active' : '' }}">À propos</a>
                    <a href="{{ route('news') }}" class="nav-link-item {{ request()->routeIs('news') ? 'active' : '' }}">News</a>
                    <a href="{{ route('branche') }}" class="nav-link-item {{ request()->routeIs('branche') ? 'active' : '' }}">Événements</a>
                    <a href="{{ route('partnerForm') }}" class="nav-link-item {{ request()->routeIs('partnerForm') ? 'active' : '' }}">Devenir Partenaire</a>
                    <a href="#contact" class="nav-link-item">Contact</a>
                </nav>

                <!-- Desktop Actions -->
                <div class="hidden md:flex items-center gap-3">
                    <button class="theme-toggle-btn" id="theme-toggle" aria-label="Changer de thème">
                        <i class="ri-sun-line hidden dark:block"></i>
                        <i class="ri-moon-line block dark:hidden"></i>
                    </button>
                    <a href="{{ url('/dons') }}" class="btn-header-donate">
                        <i class="ri-heart-3-fill text-red-500"></i>
                        Faire un don
                    </a>
                </div>

                <!-- Mobile Hamburger -->
                <button id="mobile-menu-toggle" class="md:hidden w-10 h-10 rounded-xl bg-gray-100 flex items-center justify-center text-gray-700 hover:bg-blue-50 hover:text-primary transition-colors" aria-label="Ouvrir le menu">
                    <i class="ri-menu-4-line text-xl" id="hamburger-icon"></i>
                    <i class="ri-close-line text-xl hidden" id="close-icon"></i>
                </button>
            </div>
        </div>
    </header>

    <!-- Mobile Nav Overlay -->
    <div class="mobile-nav-overlay" id="mobile-overlay"></div>

    <!-- Mobile Nav Panel -->
    <div class="mobile-nav-panel" id="mobile-panel">
        <div class="mobile-nav-panel-header">
            <div class="flex items-center gap-3">
                <img src="{{ asset('image/ab.png') }}" alt="Logo" class="w-8 h-8 rounded-full">
                <div>
                    <div style="font-family:'Sora',sans-serif; font-weight:900; font-size:1rem; color:var(--text-primary);">ABEC</div>
                    <div style="font-size:0.6rem; font-weight:700; text-transform:uppercase; letter-spacing:0.1em; color:var(--text-muted);">International</div>
                </div>
            </div>
            <div class="flex items-center gap-2">
                <button class="theme-toggle-btn w-9 h-9" id="mobile-theme-toggle" aria-label="Changer de thème">
                    <i class="ri-sun-line hidden dark:block"></i>
                    <i class="ri-moon-line block dark:hidden"></i>
                </button>
                <button class="mobile-nav-close" id="mobile-menu-close" aria-label="Fermer">
                    <i class="ri-close-line text-lg"></i>
                </button>
            </div>
        </div>
        <div class="mobile-nav-links">
            <a href="{{ url('/') }}" class="mobile-nav-link">
                <span class="icon-wrap" style="background:#eff6ff; color:#1E90FF;"><i class="ri-home-smile-2-line"></i></span>
                Accueil
            </a>
            @if (Route::currentRouteName()=='welcome')
            <a href="#actions" class="mobile-nav-link" id="mobile-actions-link">
                <span class="icon-wrap" style="background:#fef3c7; color:#d97706;"><i class="ri-heart-pulse-line"></i></span>
                Nos Actions
            </a>
            @endif
            <a href="{{ route('aPropos') }}" class="mobile-nav-link">
                <span class="icon-wrap" style="background:#ede9fe; color:#7c3aed;"><i class="ri-team-line"></i></span>
                À propos
            </a>
            <a href="{{ route('news') }}" class="mobile-nav-link">
                <span class="icon-wrap" style="background:#f0fdf4; color:#16a34a;"><i class="ri-newspaper-line"></i></span>
                News
            </a>
            <a href="{{ route('branche') }}" class="mobile-nav-link">
                <span class="icon-wrap" style="background:#fdf2f8; color:#9d174d;"><i class="ri-calendar-event-line"></i></span>
                Événements
            </a>
            <a href="#contact" class="mobile-nav-link" id="mobile-contact-link">
                <span class="icon-wrap" style="background:#ecfeff; color:#0891b2;"><i class="ri-map-pin-2-line"></i></span>
                Contact
            </a>
            <a href="{{route('partnerForm')}}" class="mobile-nav-link">
                <span class="icon-wrap" style="background:#ecfeff; color:#0891b2;"><i class="ri-handshake-line"></i></span>
                Devenir Partenaire
            </a>
        </div>
        <div class="mobile-nav-footer">
            <a href="{{ url('/dons') }}" class="btn-header-donate w-full justify-center py-3 rounded-xl text-base">
                <i class="ri-heart-3-fill text-red-500"></i>
                Faire un don
            </a>
            <div class="flex justify-center gap-4 mt-4">
                <a href="https://www.facebook.com/profile.php?id=61568266295634" target="_blank" class="footer-social-btn"><i class="ri-facebook-fill"></i></a>
                <a href="https://whatsapp.com/channel/0029VaYTsNkD8SE42sDpnk1w" target="_blank" class="footer-social-btn"><i class="ri-whatsapp-line"></i></a>
                <a href="https://www.instagram.com/abec.officiel/" target="_blank" class="footer-social-btn"><i class="ri-instagram-line"></i></a>
            </div>
        </div>
    </div>

    <!-- ===== MAIN CONTENT ===== -->
    <main class="flex-grow">
        @yield('content')
    </main>


<!-- ===== FOOTER AMÉLIORÉ ===== -->
<footer class="relative pt-20 overflow-hidden" style="background: var(--footer-bg); color: var(--text-primary);">
    <!-- Vague décorative -->
    <div class="absolute top-0 left-0 w-full overflow-hidden leading-none rotate-180">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none" class="relative block w-full h-12 md:h-16">
            <path d="M0,0 C300,100 900,100 1200,0 V120 H0 Z" fill="var(--footer-bg)" opacity="0.6"></path>
        </svg>
    </div>

    <!-- Orbes lumineux -->
    <div class="absolute top-20 right-0 w-96 h-96 bg-primary opacity-10 rounded-full blur-3xl"></div>
    <div class="absolute bottom-20 left-0 w-80 h-80 bg-yellow opacity-10 rounded-full blur-3xl"></div>

    <!-- Conteneur principal -->
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-8 z-10">
        <!-- Phrase défilante premium -->
        <div class="mb-12 py-3 border-y border-yellow/20 overflow-hidden bg-yellow/5 backdrop-blur-sm rounded-2xl">
            <div class="animate-marquee whitespace-nowrap text-yellow font-black text-xl md:text-2xl tracking-[0.2em]">
                <span class="mx-4"></span> AGIR ENSEMBLE POUR LE BIEN-ÊTRE COMMUNAUTAIRE <span class="mx-4">✦</span> SOUTENEZ NOS ACTIONS <span class="mx-4">✦</span> REJOIGNEZ LE MOUVEMENT <span class="mx-4">✦</span>
            </div>
        </div>

        <!-- Grille principale 4 colonnes -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-12 mb-12">
            <!-- Colonne 1 : Logo + description + réseaux (glassmorphique) -->
            <div class="bg-white/5 backdrop-blur-lg border border-white/10 rounded-2xl p-6 hover:border-yellow/40 transition duration-300">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-16 h-16 overflow-hidden ring-2 ring-yellow/50 rounded-xl">
                        <img src="{{ asset('image/ab.png') }}" alt="ABEC" class="w-full h-full object-cover">
                    </div>
                    <div>
                        <h3 class="font-display font-black text-lg text-white">ABEC</h3>
                        <p class="text-yellow text-[0.65rem] font-bold tracking-wider uppercase">Organisation</p>
                    </div>
                </div>
                <p class="text-white/80 text-sm leading-relaxed mb-6">
                    Fondée en 2021, nous agissons pour améliorer les conditions de vie des communautés vulnérables à travers l'éducation, la santé, l'environnement et la justice sociale.
                </p>
                <div class="flex gap-3">
                    <a href="https://www.facebook.com/profile.php?id=61568266295634" target="_blank" class="w-10 h-10 rounded-xl bg-white/10 flex items-center justify-center text-yellow hover:bg-yellow hover:text-dark transition-all duration-300 hover:scale-110">
                        <i class="ri-facebook-fill text-lg"></i>
                    </a>
                    <a href="https://whatsapp.com/channel/0029VaYTsNkD8SE42sDpnk1w" target="_blank" class="w-10 h-10 rounded-xl bg-white/10 flex items-center justify-center text-yellow hover:bg-yellow hover:text-dark transition-all duration-300 hover:scale-110">
                        <i class="ri-whatsapp-line text-lg"></i>
                    </a>
                    <a href="https://www.instagram.com/abec.officiel/" target="_blank" class="w-10 h-10 rounded-xl bg-white/10 flex items-center justify-center text-yellow hover:bg-yellow hover:text-dark transition-all duration-300 hover:scale-110">
                        <i class="ri-instagram-line text-lg"></i>
                    </a>
                    <a href="https://mail.google.com/mail/?view=cm&to=contact@universalwelfare.org" class="w-10 h-10 rounded-xl bg-white/10 flex items-center justify-center text-yellow hover:bg-yellow hover:text-dark transition-all duration-300 hover:scale-110">
                        <i class="ri-mail-line text-lg"></i>
                    </a>
                </div>
            </div>

            <!-- Colonne 2 : Liens rapides -->
            <div class="bg-white/5 backdrop-blur-lg border border-white/10 rounded-2xl p-6 hover:border-yellow/40 transition duration-300">
                <h4 class="font-display font-bold text-white text-lg mb-4 flex items-center gap-2">
                    <span class="w-1 h-6 bg-yellow rounded-full"></span>
                    Navigation
                </h4>
                <ul class="space-y-3">
                    <li><a href="{{ url('/') }}" class="text-gray-300 hover:text-yellow flex items-center gap-2 transition group"><span class="w-1.5 h-1.5 bg-yellow/60 rounded-full group-hover:scale-125 transition"></span> Accueil</a></li>
                    <li><a href="{{ route('aPropos') }}" class="text-gray-300 hover:text-yellow flex items-center gap-2 transition group"><span class="w-1.5 h-1.5 bg-yellow/60 rounded-full group-hover:scale-125 transition"></span> À propos</a></li>
                    <li><a href="{{ route('news') }}" class="text-gray-300 hover:text-yellow flex items-center gap-2 transition group"><span class="w-1.5 h-1.5 bg-yellow/60 rounded-full group-hover:scale-125 transition"></span> Actualités</a></li>
                    <li><a href="{{ route('branche') }}" class="text-gray-300 hover:text-yellow flex items-center gap-2 transition group"><span class="w-1.5 h-1.5 bg-yellow/60 rounded-full group-hover:scale-125 transition"></span> Événements</a></li>
                    <li><a href="{{ route('dons') }}" class="text-gray-300 hover:text-yellow flex items-center gap-2 transition group"><span class="w-1.5 h-1.5 bg-yellow/60 rounded-full group-hover:scale-125 transition"></span> Faire un don</a></li>
                </ul>
            </div>

            <!-- Colonne 3 : Contact -->
            <div class="bg-white/5 backdrop-blur-lg border border-white/10 rounded-2xl p-6 hover:border-yellow/40 transition duration-300">
                <h4 class="font-display font-bold text-white text-lg mb-4 flex items-center gap-2">
                    <span class="w-1 h-6 bg-yellow rounded-full"></span>
                    Contact
                </h4>
                <ul class="space-y-4">
                    <li class="flex items-start gap-3">
                        <div class="w-8 h-8 rounded-lg bg-yellow/10 flex items-center justify-center text-yellow shrink-0"><i class="ri-map-pin-2-line"></i></div>
                        <div><span class="block text-xs font-bold text-yellow/80 uppercase tracking-wider">Adresse</span><span class="text-gray-300 text-sm">Yaoundé, Cameroun</span></div>
                    </li>
                    <li class="flex items-start gap-3">
                        <div class="w-8 h-8 rounded-lg bg-yellow/10 flex items-center justify-center text-yellow shrink-0"><i class="ri-phone-line"></i></div>
                        <div><span class="block text-xs font-bold text-yellow/80 uppercase tracking-wider">Téléphone</span><span class="text-gray-300 text-sm">+237 6 21 62 06 77<br>+237 6 91 42 53 34</span></div>
                    </li>
                    <li class="flex items-start gap-3">
                        <div class="w-8 h-8 rounded-lg bg-yellow/10 flex items-center justify-center text-yellow shrink-0"><i class="ri-question-line"></i></div>
                        <div><span class="block text-xs font-bold text-yellow/80 uppercase tracking-wider">Aide</span><a href="{{ url('/faq') }}" class="text-gray-300 hover:text-yellow text-sm">FAQ – Questions fréquentes</a></div>
                    </li>
                </ul>
            </div>

            <!-- Colonne 4 : Newsletter / CTA -->
            <div class="bg-white/5 backdrop-blur-lg border border-white/10 rounded-2xl p-6 hover:border-yellow/40 transition duration-300">
                <h4 class="font-display font-bold text-white text-lg mb-4 flex items-center gap-2">
                    <span class="w-1 h-6 bg-yellow rounded-full"></span>
                    Restez informé
                </h4>
                <p class="text-gray-300 text-sm mb-4">Recevez nos actualités et appels aux dons.</p>
                <form class="mb-4">
                    <div class="flex gap-2">
                        <input type="email" placeholder="Votre email" class="w-full px-4 py-2 bg-white/10 border border-white/20 rounded-xl text-white placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-yellow/50 text-sm">
                        <button type="submit" class="px-4 py-2 bg-yellow text-dark font-bold rounded-xl hover:bg-white transition duration-300"><i class="ri-send-plane-fill"></i></button>
                    </div>
                </form>
                <a href="{{ url('/dons') }}" class="inline-flex items-center justify-center gap-2 w-full py-3 bg-white text-dark font-black rounded-xl hover:scale-105 transition duration-300 shadow-lg shadow-yellow/20">
                    <i class="ri-heart-3-fill"></i> Faire un don
                </a>
            </div>
        </div>

        <!-- Barre inférieure : copyright + liens légaux -->
        <div class="pt-8 border-t border-white/10 flex flex-col md:flex-row justify-between items-center gap-4 text-xs text-gray-400">
            <p>&copy; {{ date('Y') }} Association du Bien-Être Communautaire. Tous droits réservés.</p>
            <div class="flex gap-6">
                <a href="{{ route('mention') }}" class="hover:text-yellow transition">Mentions légales</a>
                <a href="{{ route('politique') }}" class="hover:text-yellow transition">Politique de confidentialité</a>
                <a href="{{ route('copitt') }}" class="hover:text-yellow transition">Conditions d'utilisation</a>
            </div>
        </div>
    </div>
</footer>


<style>
    @keyframes marquee {
        0% { transform: translateX(0); }
        100% { transform: translateX(-50%); }
    }
    .animate-marquee {
        animation: marquee 20s linear infinite;
    }
</style>

    <!-- Back to top button -->
    <button id="btt-btn" aria-label="Retour en haut">
        <i class="ri-arrow-up-line"></i>
    </button>

    @stack('scripts')

    <script>
        // ===== PAGE LOADER OPTIMIZATION =====
        // Hide loader faster: wait for DOM and a small buffer, instead of full window load
        document.addEventListener('DOMContentLoaded', () => {
            const loader = document.getElementById('page-loader');
            // Minimum display time for the brand animation, then hide
            setTimeout(() => {
                loader.classList.add('loaded');
                setTimeout(() => loader.style.display = 'none', 600);
            }, 600);
        });

        // ===== THEME TOGGLE LOGIC =====
        const themeToggle = document.getElementById('theme-toggle');
        const mobileThemeToggle = document.getElementById('mobile-theme-toggle');
        
        function toggleTheme() {
            const isDark = document.documentElement.classList.toggle('dark');
            localStorage.setItem('theme', isDark ? 'dark' : 'light');
        }

        themeToggle && themeToggle.addEventListener('click', toggleTheme);
        mobileThemeToggle && mobileThemeToggle.addEventListener('click', toggleTheme);

        // ===== HEADER SCROLL EFFECT =====
        const navGlass = document.getElementById('nav-glass');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 40) {
                navGlass.classList.add('scrolled');
            } else {
                navGlass.classList.remove('scrolled');
            }
        }, { passive: true });

        // ===== MOBILE MENU =====
        const toggleBtn  = document.getElementById('mobile-menu-toggle');
        const closeBtn   = document.getElementById('mobile-menu-close');
        const overlay    = document.getElementById('mobile-overlay');
        const panel      = document.getElementById('mobile-panel');
        const hamIcon    = document.getElementById('hamburger-icon');
        const closeIcon  = document.getElementById('close-icon');

        function openMobileMenu() {
            panel.classList.add('open');
            overlay.classList.add('open');
            hamIcon.classList.add('hidden');
            closeIcon.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }
        function closeMobileMenu() {
            panel.classList.remove('open');
            overlay.classList.remove('open');
            hamIcon.classList.remove('hidden');
            closeIcon.classList.add('hidden');
            document.body.style.overflow = '';
        }

        toggleBtn && toggleBtn.addEventListener('click', openMobileMenu);
        closeBtn  && closeBtn.addEventListener('click', closeMobileMenu);
        overlay   && overlay.addEventListener('click', closeMobileMenu);

        // Close on anchor link click in mobile
        ['mobile-actions-link', 'mobile-contact-link'].forEach(id => {
            const el = document.getElementById(id);
            el && el.addEventListener('click', closeMobileMenu);
        });

        // ===== BACK TO TOP =====
        const bttBtn = document.getElementById('btt-btn');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 400) {
                bttBtn.classList.add('visible');
            } else {
                bttBtn.classList.remove('visible');
            }
        }, { passive: true });
        bttBtn && bttBtn.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));

        // ===== SCROLL REVEAL =====
        const revealObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    revealObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });
        document.querySelectorAll('.section-animate').forEach(el => revealObserver.observe(el));

        // Active nav link highlighting (footer links)
        document.querySelectorAll('.hover\\:text-yellow-300').forEach(a => {
            a.style.transition = 'color 0.3s';
            a.addEventListener('mouseover', () => a.style.color = '#FFD700');
            a.addEventListener('mouseout',  () => a.style.color = '');
        });
    </script>
</body>
</html>