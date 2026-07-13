<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rey Buban – AI Developer</title>
    <meta name="description" content="AI Developer specializing in chatbots, eKYC, and full-stack development. Building intelligent solutions with Python, Laravel, and Vue.">

    <!-- Open Graph / Social Meta -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="Rey Buban – AI Developer">
    <meta property="og:description" content="AI Developer specializing in chatbots, eKYC, and full-stack development.">
    <meta property="og:image" content="{{ asset('images/profile.jpg') }}">
    <meta name="twitter:card" content="summary_large_image">

    <!-- Google Fonts: Space Grotesk (display) + JetBrains Mono (code/terminal) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500;600;700&display=swap" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        /* =========================================================
           RESET & BASE
        ========================================================= */
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --bg:           #050a05;
            --bg-deep:      #030803;
            --bg-light:     #0a140a;
            --bg-card:      #0a120a;
            --white:        #eaffea;
            --off-white:    #b8d8b8;
            --muted:        #5a7f5a;
            --border:       rgba(57,255,20,0.15);
            --neon:         #39FF14;
            --neon-soft:    #6fff4f;
            --neon-dim:     rgba(57,255,20,0.08);
            --neon-glow:    0 0 10px rgba(57,255,20,0.6), 0 0 30px rgba(57,255,20,0.2);
            --neon-text-glow: 0 0 12px rgba(57,255,20,0.85), 0 0 36px rgba(57,255,20,0.35);
            --neon-shadow:  0 4px 24px rgba(57,255,20,0.15);
            --radius-sm:    8px;
            --radius-md:    14px;
            --radius-lg:    20px;
            --ease-spring:  cubic-bezier(0.34, 1.56, 0.64, 1);
            --ease-smooth:  cubic-bezier(0.4, 0, 0.2, 1);
            --font-display: 'Space Grotesk', system-ui, sans-serif;
            --font-mono:    'JetBrains Mono', 'Fira Code', monospace;
        }

        html { scroll-behavior: smooth; }

        body {
            font-family: var(--font-display);
            background-color: var(--bg);
            color: var(--white);
            overflow-x: hidden;
            line-height: 1.65;
            font-weight: 400;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        /* Scanline overlay – subtle CRT/terminal feel */
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background: repeating-linear-gradient(
                0deg,
                transparent,
                transparent 2px,
                rgba(57,255,20,0.012) 2px,
                rgba(57,255,20,0.012) 4px
            );
            pointer-events: none;
            z-index: 50;
        }

        /* Noise/grain texture overlay for organic depth */
        body::after {
            content: '';
            position: fixed;
            inset: 0;
            opacity: 0.035;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)'/%3E%3C/svg%3E");
            pointer-events: none;
            z-index: 51;
        }

        /* Skip-to-content accessibility link */
        .skip-link {
            position: absolute;
            top: -100%;
            left: 16px;
            padding: 12px 24px;
            background: var(--neon);
            color: var(--bg);
            font-weight: 700;
            font-family: var(--font-mono);
            border-radius: var(--radius-sm);
            z-index: 2000;
            text-decoration: none;
            transition: top 0.2s;
        }
        .skip-link:focus { top: 16px; }

        /* Focus-visible rings for keyboard nav */
        :focus-visible {
            outline: 2px solid var(--neon);
            outline-offset: 3px;
        }

        /* Scroll-reveal animation base */
        .reveal {
            opacity: 0;
            transform: translateY(32px);
            transition: opacity 0.7s var(--ease-smooth), transform 0.7s var(--ease-smooth);
        }
        .reveal.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* =========================================================
           KEYFRAMES
        ========================================================= */
        @keyframes neon-pulse {
            0%, 100% { opacity: 1; text-shadow: var(--neon-text-glow); }
            50%       { opacity: 0.82; text-shadow: 0 0 6px rgba(57,255,20,0.45); }
        }

        @keyframes typewriter {
            from { width: 0; }
            to   { width: 14ch; }
        }

        @keyframes blink-cursor {
            0%, 100% { border-color: var(--neon); }
            50%       { border-color: transparent; }
        }

        @keyframes border-glow {
            0%, 100% { box-shadow: 0 0 8px rgba(57,255,20,0.35), inset 0 0 8px rgba(57,255,20,0.05); }
            50%       { box-shadow: 0 0 22px rgba(57,255,20,0.65), inset 0 0 14px rgba(57,255,20,0.08); }
        }

        @keyframes scan {
            0%   { transform: translateY(-100%); }
            100% { transform: translateY(100vh); }
        }

        @keyframes float-dot {
            0%, 100% { transform: translateY(0); opacity: 0.5; }
            50%       { transform: translateY(-10px); opacity: 1; }
        }

        @keyframes marquee-ltr {
            from { transform: translateX(-50%); }
            to   { transform: translateX(0%); }
        }

        @keyframes marquee-rtl {
            from { transform: translateX(0%); }
            to   { transform: translateX(-50%); }
        }

        @keyframes shimmer {
            0%   { background-position: -200% center; }
            100% { background-position: 200% center; }
        }

        @keyframes ambient-float {
            0%, 100% { transform: translate(0, 0) scale(1); }
            33%      { transform: translate(12px, -8px) scale(1.05); }
            66%      { transform: translate(-8px, 6px) scale(0.97); }
        }

        /* =========================================================
           NAVBAR – Floating glassmorphic
        ========================================================= */
        .navbar {
            position: fixed;
            top: 16px; left: 24px; right: 24px;
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 16px 36px;
            background: rgba(5,10,5,0.82);
            backdrop-filter: blur(20px) saturate(1.4);
            -webkit-backdrop-filter: blur(20px) saturate(1.4);
            border: 1px solid rgba(57,255,20,0.1);
            border-radius: var(--radius-md);
            box-shadow: 0 4px 32px rgba(0,0,0,0.5), inset 0 1px 0 rgba(57,255,20,0.06);
            transition: box-shadow 0.3s, background 0.3s;
        }

        .nav-logo {
            font-size: 1.25rem;
            font-weight: 700;
            letter-spacing: 3px;
            color: var(--neon);
            text-decoration: none;
            border: 1.5px solid var(--neon);
            padding: 6px 16px;
            border-radius: 6px;
            line-height: 1;
            font-family: var(--font-mono);
            text-shadow: var(--neon-text-glow);
            box-shadow: var(--neon-glow);
            animation: border-glow 3.5s ease-in-out infinite;
            transition: transform 0.2s var(--ease-spring);
        }
        .nav-logo:hover { transform: scale(1.05); }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 40px;
            list-style: none;
        }

        .nav-links a {
            color: var(--off-white);
            text-decoration: none;
            font-size: 0.88rem;
            font-weight: 500;
            letter-spacing: 0.06em;
            opacity: 0.7;
            transition: color 0.25s, opacity 0.25s, text-shadow 0.25s;
            font-family: var(--font-mono);
            position: relative;
        }

        .nav-links a.active {
            opacity: 1;
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: -4px;
            left: 0; right: 0;
            height: 1.5px;
            background: var(--neon);
            transform: scaleX(0);
            transition: transform 0.25s var(--ease-spring);
            box-shadow: 0 0 8px rgba(57,255,20,0.5);
        }

        .nav-links a:hover {
            opacity: 1;
            color: var(--neon);
            text-shadow: var(--neon-text-glow);
        }
        .nav-links a:hover::after { transform: scaleX(1); }

        .nav-right {
            display: flex;
            align-items: center;
        }

        .btn-resume {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 24px;
            border: 1.5px solid var(--neon);
            border-radius: var(--radius-sm);
            color: var(--neon);
            font-size: 0.88rem;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.25s var(--ease-spring);
            background: transparent;
            cursor: pointer;
            font-family: var(--font-mono);
            text-shadow: var(--neon-text-glow);
            box-shadow: 0 0 10px rgba(57,255,20,0.25);
        }

        .btn-resume:hover {
            background: var(--neon);
            color: var(--bg);
            text-shadow: none;
            box-shadow: 0 0 28px rgba(57,255,20,0.6);
            transform: translateY(-2px);
        }
        .btn-resume:active {
            transform: translateY(0) scale(0.98);
        }

        .btn-resume svg {
            width: 16px; height: 16px;
            stroke: currentColor;
            flex-shrink: 0;
        }

        /* Mobile hamburger */
        .hamburger {
            display: none;
            flex-direction: column;
            gap: 5px;
            cursor: pointer;
            padding: 4px;
            background: none;
            border: none;
        }

        .hamburger span {
            display: block;
            width: 24px;
            height: 2px;
            background: var(--neon);
            border-radius: 2px;
            transition: all 0.3s var(--ease-spring);
            box-shadow: 0 0 6px rgba(57,255,20,0.5);
        }

        /* =========================================================
           SECTION  1 – ABOUT ME (HERO)
        ========================================================= */
        #about {
            min-height: 100dvh;
            display: grid;
            grid-template-columns: 1fr 1fr;
            max-width: 1440px;
            margin: 0 auto;
            position: relative;
            overflow: hidden;
        }

        /* Circuit-board dot grid background */
        #about::after {
            content: '';
            position: absolute;
            inset: 0;
            background-image:
                radial-gradient(circle, rgba(57,255,20,0.07) 1px, transparent 1px);
            background-size: 40px 40px;
            pointer-events: none;
            z-index: 0;
        }

        /* Ambient neon glow orbs behind hero */
        .hero-ambient {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            pointer-events: none;
            z-index: 0;
        }
        .hero-ambient-1 {
            width: 300px; height: 300px;
            background: rgba(57,255,20,0.06);
            top: 15%; left: 5%;
            animation: ambient-float 12s ease-in-out infinite;
        }
        .hero-ambient-2 {
            width: 200px; height: 200px;
            background: rgba(57,255,20,0.04);
            bottom: 20%; right: 40%;
            animation: ambient-float 16s ease-in-out infinite reverse;
        }

        .hero-left {
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 160px 60px 100px;
            position: relative;
            z-index: 1;
        }

        /* Green left accent bar */
        .hero-left::before {
            content: '';
            position: absolute;
            left: 0; top: 20%; bottom: 20%;
            width: 3px;
            background: linear-gradient(to bottom, transparent, var(--neon), transparent);
            box-shadow: var(--neon-glow);
        }

        .hero-name {
            font-size: clamp(2.4rem, 4.2vw, 3.8rem);
            font-weight: 700;
            letter-spacing: -0.03em;
            line-height: 1.05;
            margin-bottom: 14px;
            color: var(--white);
        }

        /* First letter of name glows green */
        .hero-name .neon-char {
            color: var(--neon);
            text-shadow: var(--neon-text-glow);
            animation: neon-pulse 2.5s ease-in-out infinite;
        }

        .hero-title {
            font-size: clamp(1rem, 1.8vw, 1.3rem);
            font-weight: 500;
            color: var(--neon);
            margin-bottom: 28px;
            font-family: var(--font-mono);
            letter-spacing: 0.08em;
            text-shadow: 0 0 10px rgba(57,255,20,0.45);
            /* Typewriter */
            overflow: hidden;
            white-space: nowrap;
            width: 0;
            border-right: 2px solid var(--neon);
            animation:
                typewriter 1.6s steps(14, end) 0.6s forwards,
                blink-cursor 0.75s step-end infinite;
        }

        .hero-bio {
            font-size: 0.92rem;
            color: var(--muted);
            line-height: 1.8;
            max-width: 480px;
            margin-bottom: 40px;
            border-left: 2px solid rgba(57,255,20,0.25);
            padding-left: 18px;
            font-weight: 400;
        }

        .social-links { display: flex; gap: 14px; }

        .social-btn {
            width: 44px; height: 44px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            transition: transform 0.25s var(--ease-spring), box-shadow 0.25s;
            overflow: hidden;
            border: 1px solid rgba(57,255,20,0.25);
        }

        .social-btn:hover {
            transform: translateY(-4px) scale(1.05);
            box-shadow: 0 0 16px rgba(57,255,20,0.45);
        }
        .social-btn:active {
            transform: translateY(0) scale(0.97);
        }

        .social-btn.linkedin  { background: #0a66c2; }
        .social-btn.facebook  { background: #1877f2; }
        .social-btn.instagram { background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%, #d6249f 60%, #285aeb 90%); }

        .social-btn img,
        .social-btn svg { width: 22px; height: 22px; }

        .hero-right {
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1;
            padding: 40px;
        }

        /* Moving scan line over the photo */
        .hero-right::after {
            content: '';
            position: absolute;
            left: 0; right: 0;
            height: 3px;
            background: linear-gradient(to right, transparent, var(--neon), transparent);
            opacity: 0.35;
            animation: scan 5s linear infinite;
            pointer-events: none;
            z-index: 3;
        }

        /* Corner brackets */
        .hero-right::before {
            content: '';
            position: absolute;
            top: 32px; right: 32px;
            width: 40px; height: 40px;
            border-top: 2px solid var(--neon);
            border-right: 2px solid var(--neon);
            box-shadow: 4px -4px 16px rgba(57,255,20,0.35);
            z-index: 3;
            pointer-events: none;
        }

        .hero-photo-area {
            width: 85%;
            max-width: 480px;
            aspect-ratio: 3 / 4;
            background: var(--bg-deep);
            overflow: hidden;
            position: relative;
            border: 1px solid rgba(57,255,20,0.15);
            border-radius: var(--radius-lg);
            box-shadow:
                0 0 40px rgba(57,255,20,0.08),
                0 20px 60px rgba(0,0,0,0.5);
        }

        .hero-portrait {
            width: 100%; height: 100%;
            object-fit: cover;
            object-position: center top;
            display: block;
            filter: brightness(0.92) contrast(1.08);
        }

        /* Photo gradient overlay */
        .hero-photo-overlay {
            position: absolute;
            bottom: 0; left: 0; right: 0;
            height: 140px;
            background: linear-gradient(to top, var(--bg-deep), transparent);
            pointer-events: none;
        }

        /* =========================================================
           SECTION HEADERS (shared)
        ========================================================= */
        .section-title {
            font-size: clamp(2.2rem, 4.5vw, 3.2rem);
            font-weight: 700;
            text-align: center;
            margin-bottom: 64px;
            letter-spacing: -0.02em;
            color: var(--white);
            line-height: 1.1;
        }

        /* The classic "< title />" AI bracket label */
        .section-title::before { content: '< '; color: var(--neon); font-size: 0.55em; vertical-align: middle; opacity: 0.6; font-family: var(--font-mono); }
        .section-title::after  { content: ' />'; color: var(--neon); font-size: 0.55em; vertical-align: middle; opacity: 0.6; font-family: var(--font-mono); }

        /* =========================================================
           SECTION  2 – EXPERIENCE
        ========================================================= */
        #experience {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 120px 52px;
            background: var(--bg);
            position: relative;
        }

        /* Subtle radial glow behind experience section */
        #experience::before {
            content: '';
            position: absolute;
            top: 50%; left: 50%;
            transform: translate(-50%, -50%);
            width: 600px; height: 600px;
            background: radial-gradient(circle, rgba(57,255,20,0.04) 0%, transparent 70%);
            pointer-events: none;
        }

        .experience-cards {
            display: flex;
            gap: 24px;
            flex-wrap: wrap;
            justify-content: center;
            width: 100%;
            max-width: 1100px;
            position: relative;
            z-index: 1;
        }

        .exp-card {
            flex: 1 1 240px;
            max-width: 300px;
            min-width: 220px;
            border-radius: var(--radius-md);
            padding: 0;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            transition: transform 0.35s var(--ease-spring), box-shadow 0.35s;
            cursor: default;
            border: 1px solid rgba(57,255,20,0.15);
            background: var(--bg-card);
        }

        .exp-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 0 28px rgba(57,255,20,0.2), 0 24px 48px rgba(0,0,0,0.55);
            border-color: rgba(57,255,20,0.5);
        }

        .exp-card-image {
            width: 100%;
            aspect-ratio: 1 / 1.05;
            overflow: hidden;
            border-radius: var(--radius-md) var(--radius-md) 0 0;
        }

        .exp-card-image svg,
        .exp-card-image img {
            width: 100%; height: 100%;
            object-fit: cover;
            display: block;
        }

        .exp-card-body {
            padding: 20px 22px;
            border-radius: 0 0 var(--radius-md) var(--radius-md);
            background: var(--bg-card);
            border-top: 1px solid rgba(57,255,20,0.08);
        }

        .exp-card-name {
            font-size: 1.05rem;
            font-weight: 700;
            margin-bottom: 10px;
            color: var(--neon);
            text-shadow: 0 0 8px rgba(57,255,20,0.35);
            font-family: var(--font-mono);
        }

        .exp-card-detail {
            font-size: 0.82rem;
            line-height: 1.85;
            opacity: 0.7;
            color: var(--off-white);
        }

        .exp-card-detail li { list-style: none; }
        .exp-card-detail li::before { content: '> '; color: var(--neon); font-family: var(--font-mono); }

        /* Card colours – all dark + tinted tones */
        .card-blue      { background: #050f14; }
        .card-yellow    { background: #070f05; }
        .card-pink      { background: #0a0710; }
        .card-red       { background: #0a0705; }
        .card-ojt       { background: #040f09; }
        .card-synermaxx { background: #060410; }

        /* =========================================================
           SECTION  3 – SKILLS
        ========================================================= */
        #skills {
            min-height: 60vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 120px 0;
            width: 100%;
            background: linear-gradient(180deg, var(--bg) 0%, var(--bg-deep) 50%, var(--bg) 100%);
        }

        #skills .section-title { margin-bottom: 56px; }

        .marquee-wrapper {
            display: flex;
            flex-direction: column;
            gap: 22px;
            width: 100%;
            max-width: 920px;
            margin: 0 auto;
            overflow: hidden;
        }

        .marquee-row {
            display: flex;
            width: 100%;
            overflow: hidden;
            mask-image: linear-gradient(to right, transparent 0%, black 12%, black 88%, transparent 100%);
            -webkit-mask-image: linear-gradient(to right, transparent 0%, black 12%, black 88%, transparent 100%);
        }

        .marquee-track {
            display: flex;
            gap: 18px;
            will-change: transform;
            flex-shrink: 0;
        }

        .marquee-row.ltr .marquee-track { animation: marquee-ltr 20s linear infinite; }
        .marquee-row.rtl .marquee-track { animation: marquee-rtl 20s linear infinite; }
        .marquee-row:hover .marquee-track { animation-play-state: paused; }

        .skill-pill {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 12px 34px;
            border: 1px solid rgba(57,255,20,0.3);
            border-radius: 999px;
            font-size: clamp(0.82rem, 1.3vw, 0.95rem);
            font-weight: 500;
            color: var(--neon);
            white-space: nowrap;
            flex-shrink: 0;
            background: rgba(57,255,20,0.04);
            font-family: var(--font-mono);
            letter-spacing: 0.06em;
            transition: all 0.3s var(--ease-spring);
            cursor: default;
            position: relative;
            overflow: hidden;
        }

        .skill-pill::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(110deg, transparent 30%, rgba(57,255,20,0.12) 50%, transparent 70%);
            background-size: 200% 100%;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .skill-pill:hover {
            background: rgba(57,255,20,0.12);
            border-color: var(--neon);
            box-shadow: var(--neon-glow);
            transform: scale(1.08);
        }
        .skill-pill:hover::before {
            opacity: 1;
            animation: shimmer 1.5s ease-in-out infinite;
        }

        /* =========================================================
           SECTION  4 – EDUCATION
        ========================================================= */
        #education {
            min-height: 60vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 120px 60px;
            max-width: 1100px;
            margin: 0 auto;
            width: 100%;
        }

        #education .section-title {
            text-align: left;
            margin-bottom: 52px;
            font-size: clamp(1.8rem, 3.5vw, 2.6rem);
        }

        .education-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px 80px;
        }

        .edu-item {
            padding: 16px 0;
            border-bottom: 1px solid rgba(57,255,20,0.08);
            display: flex;
            align-items: flex-start;
            gap: 14px;
            font-size: 0.92rem;
            color: var(--off-white);
            line-height: 1.55;
            transition: border-color 0.3s, padding-left 0.3s;
        }

        .edu-item:hover {
            border-color: rgba(57,255,20,0.35);
            padding-left: 6px;
        }

        .edu-dot {
            width: 7px; height: 7px;
            background: var(--neon);
            border-radius: 50%;
            margin-top: 8px;
            flex-shrink: 0;
            box-shadow: 0 0 8px rgba(57,255,20,0.7);
            animation: float-dot 2.8s ease-in-out infinite;
        }

        /* =========================================================
           SECTION  5 – PROJECTS
        ========================================================= */
        #projects {
            padding: 120px 52px;
            display: flex;
            flex-direction: column;
            align-items: center;
            background: linear-gradient(180deg, var(--bg) 0%, var(--bg-deep) 50%, var(--bg) 100%);
        }

        .projects-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 28px;
            width: 100%;
            max-width: 1100px;
        }

        .proj-card {
            border-radius: var(--radius-md);
            overflow: hidden;
            background: var(--bg-card);
            border: 1px solid rgba(57,255,20,0.12);
            display: flex;
            flex-direction: column;
            transition: transform 0.35s var(--ease-spring), box-shadow 0.35s, border-color 0.3s;
            cursor: pointer;
            text-decoration: none;
            color: inherit;
            position: relative;
        }

        .proj-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 0 35px rgba(57,255,20,0.15), 0 24px 48px rgba(0,0,0,0.55);
            border-color: rgba(57,255,20,0.5);
        }

        .proj-thumb {
            width: 100%;
            aspect-ratio: 16 / 10;
            overflow: hidden;
            display: block;
            position: relative;
        }

        /* Green scan line on thumb hover */
        .proj-card:hover .proj-thumb::after {
            content: '';
            position: absolute;
            left: 0; right: 0;
            height: 2px;
            background: linear-gradient(to right, transparent, var(--neon), transparent);
            opacity: 0.45;
            animation: scan 2s linear infinite;
        }

        .proj-thumb svg {
            width: 100%; height: 100%;
            display: block;
        }

        .proj-info {
            padding: 18px 20px 22px;
            display: flex;
            flex-direction: column;
            gap: 6px;
            border-top: 1px solid rgba(57,255,20,0.06);
        }

        .proj-badge {
            font-size: 0.7rem;
            font-weight: 600;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--neon);
            opacity: 0.65;
            font-family: var(--font-mono);
        }

        .proj-name {
            font-size: 1rem;
            font-weight: 600;
            line-height: 1.35;
            color: var(--white);
        }

        .proj-link {
            margin-top: 8px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 0.8rem;
            font-weight: 600;
            color: rgba(57,255,20,0.45);
            transition: color 0.25s, text-shadow 0.25s;
            font-family: var(--font-mono);
        }

        .proj-card:hover .proj-link {
            color: var(--neon);
            text-shadow: 0 0 10px rgba(57,255,20,0.55);
        }

        .proj-link svg {
            width: 13px; height: 13px;
            transition: transform 0.25s var(--ease-spring);
        }

        .proj-card:hover .proj-link svg { transform: translate(3px, -3px); }

        /* =========================================================
           RESPONSIVE
        ========================================================= */
        @media (max-width: 1024px) {
            .navbar { left: 16px; right: 16px; padding: 14px 24px; }
            .hero-left { padding: 140px 36px 70px; }
            #experience { padding: 100px 32px; }
            #skills { padding: 100px 32px; }
            #education { padding: 100px 32px; }
            .education-grid { gap: 16px 48px; }
            #projects { padding: 100px 32px; }
            .projects-grid { grid-template-columns: repeat(2, 1fr); }
        }

        @media (max-width: 768px) {
            .navbar { top: 10px; left: 12px; right: 12px; padding: 12px 18px; }
            .nav-links {
                display: none;
                position: fixed;
                top: 72px; left: 12px; right: 12px;
                background: rgba(5,10,5,0.97);
                backdrop-filter: blur(20px);
                flex-direction: column;
                gap: 0;
                padding: 12px 0 20px;
                border: 1px solid rgba(57,255,20,0.12);
                border-radius: var(--radius-md);
                box-shadow: 0 8px 32px rgba(0,0,0,0.6);
            }
            .nav-links.open { display: flex; }
            .nav-links li { width: 100%; }
            .nav-links a {
                display: block;
                padding: 14px 28px;
                font-size: 1rem;
            }
            .nav-links a::after { display: none; }
            .hamburger { display: flex; }
            .nav-right { display: none; }

            #about {
                grid-template-columns: 1fr;
                grid-template-rows: auto auto;
            }
            .hero-left {
                order: 2;
                padding: 44px 24px 60px;
            }
            .hero-left::before { display: none; }
            .hero-right {
                order: 1;
                height: auto;
                padding: 32px 24px;
                max-height: 420px;
            }
            .hero-photo-area {
                width: 60%;
                max-width: 280px;
            }
            .hero-name { font-size: 2.2rem; }
            .hero-bio { max-width: 100%; }

            #experience { padding: 80px 24px; }
            .experience-cards { gap: 16px; }
            .exp-card { max-width: 100%; flex: 1 1 calc(50% - 8px); }

            #skills { padding: 80px 24px; }
            .skill-pill { padding: 10px 22px; font-size: 0.85rem; }

            #education { padding: 80px 24px; }
            .education-grid { grid-template-columns: 1fr; gap: 4px; }

            #projects { padding: 80px 24px; }
            .projects-grid { grid-template-columns: repeat(2, 1fr); gap: 16px; }
        }

        @media (max-width: 480px) {
            .exp-card { flex: 1 1 100%; max-width: 100%; }
            .hero-right { height: 70vw; }
            .projects-grid { grid-template-columns: 1fr; }
        }

        /* =========================================================
           FOOTER
        ========================================================= */
        footer {
            text-align: center;
            padding: 48px 24px;
            border-top: 1px solid rgba(57,255,20,0.08);
            font-size: 0.82rem;
            color: var(--muted);
            font-family: var(--font-mono);
            letter-spacing: 0.06em;
            background: var(--bg-deep);
        }

        .footer-content {
            max-width: 600px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 18px;
        }

        .footer-social {
            display: flex;
            gap: 16px;
            align-items: center;
        }

        .footer-social a {
            color: var(--muted);
            transition: color 0.25s, text-shadow 0.25s;
            text-decoration: none;
        }
        .footer-social a:hover {
            color: var(--neon);
            text-shadow: 0 0 8px rgba(57,255,20,0.5);
        }
        .footer-social a svg { width: 18px; height: 18px; }

        .back-to-top {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            color: var(--muted);
            text-decoration: none;
            font-family: var(--font-mono);
            font-size: 0.78rem;
            transition: color 0.25s;
            cursor: pointer;
            background: none;
            border: none;
        }
        .back-to-top:hover { color: var(--neon); }
        .back-to-top svg { width: 14px; height: 14px; }

        footer p::before { content: '// '; color: var(--neon); opacity: 0.4; }

        /* =========================================================
           CHATBOT UI
        ========================================================= */
        #chat-btn {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 62px;
            height: 62px;
            border-radius: 50%;
            background: rgba(5,10,5,0.92);
            border: 2px solid var(--neon);
            color: var(--neon);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 100;
            box-shadow: var(--neon-glow);
            transition: transform 0.25s var(--ease-spring), box-shadow 0.25s;
        }

        #chat-btn:hover {
            transform: scale(1.12);
            box-shadow: 0 0 24px rgba(57,255,20,0.75);
        }
        #chat-btn:active {
            transform: scale(0.95);
        }

        #chat-btn svg { overflow: visible; }

        /* Eye blink animation */
        @keyframes eye-blink {
            0%   { ry: 2.5; }
            30%  { ry: 0.2; }
            60%  { ry: 2.5; }
            100% { ry: 2.5; }
        }

        .bot-eye.blinking {
            animation: eye-blink 0.15s ease-in-out forwards;
        }

        /* Waving arm animation */
        #wave-arm {
            opacity: 0;
            transform-box: fill-box;
            transform-origin: 34px 22px;
            transition: opacity 0.35s ease;
        }

        #wave-arm.waving {
            opacity: 1;
            animation: wave-arm 0.55s ease-in-out 4;
        }

        @keyframes wave-arm {
            0%, 100% { transform: rotate(0deg); }
            25%  { transform: rotate(-16deg); }
            75%  { transform: rotate(16deg); }
        }

        #chat-window {
            position: fixed;
            bottom: 100px;
            right: 30px;
            width: 370px;
            height: 510px;
            background: rgba(5,10,5,0.94);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(57,255,20,0.3);
            border-radius: var(--radius-lg);
            box-shadow: 0 12px 40px rgba(0,0,0,0.75), 0 0 20px rgba(57,255,20,0.1);
            z-index: 99;
            display: flex;
            flex-direction: column;
            overflow: hidden;
            opacity: 0;
            pointer-events: none;
            transform: translateY(20px) scale(0.96);
            transition: opacity 0.3s, transform 0.35s var(--ease-spring);
        }

        #chat-window.open {
            opacity: 1;
            pointer-events: auto;
            transform: translateY(0) scale(1);
        }

        .chat-header {
            padding: 16px 18px;
            background: rgba(57,255,20,0.06);
            border-bottom: 1px solid rgba(57,255,20,0.15);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .chat-title {
            font-size: 1.05rem;
            color: var(--neon);
            font-family: var(--font-mono);
            font-weight: 600;
        }

        .chat-title::before { content: '< '; opacity: 0.6; }
        .chat-title::after  { content: ' />'; opacity: 0.6; }

        .chat-close {
            background: none;
            border: none;
            color: var(--muted);
            cursor: pointer;
            transition: color 0.2s;
            padding: 4px;
        }

        .chat-close:hover { color: var(--neon); }
        .chat-close svg { width: 18px; height: 18px; }

        .chat-messages {
            flex: 1;
            padding: 16px;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .chat-msg {
            max-width: 85%;
            padding: 10px 14px;
            border-radius: var(--radius-sm);
            font-size: 0.88rem;
            line-height: 1.55;
            word-wrap: break-word;
        }

        .chat-msg strong {
            color: var(--neon);
            font-weight: 600;
        }
        
        .chat-msg em {
            color: var(--off-white);
            font-style: italic;
        }

        .chat-msg.user {
            align-self: flex-end;
            background: rgba(57,255,20,0.12);
            border: 1px solid rgba(57,255,20,0.35);
            color: var(--white);
            border-bottom-right-radius: 2px;
        }

        .chat-msg.bot {
            align-self: flex-start;
            background: rgba(255,255,255,0.04);
            border: 1px solid rgba(255,255,255,0.08);
            color: var(--off-white);
            border-bottom-left-radius: 2px;
        }

        .chat-input-area {
            padding: 12px;
            border-top: 1px solid rgba(57,255,20,0.15);
            display: flex;
            gap: 8px;
            background: rgba(0,0,0,0.15);
        }

        #chat-input {
            flex: 1;
            background: rgba(255,255,255,0.04);
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: var(--radius-sm);
            padding: 10px 14px;
            color: var(--white);
            font-size: 0.88rem;
            font-family: var(--font-display);
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        #chat-input:focus { border-color: var(--neon); box-shadow: 0 0 8px rgba(57,255,20,0.15); }

        #chat-send {
            background: var(--neon);
            color: var(--bg);
            border: none;
            border-radius: var(--radius-sm);
            padding: 0 18px;
            font-weight: 600;
            cursor: pointer;
            font-family: var(--font-mono);
            transition: opacity 0.2s, transform 0.2s var(--ease-spring);
        }

        #chat-send:hover { opacity: 0.85; }
        #chat-send:active { transform: scale(0.95); }

        .typing-indicator {
            display: flex;
            gap: 4px;
            padding: 4px 8px;
            align-items: center;
            height: 20px;
        }

        .typing-dot {
            width: 5px; height: 5px;
            background: var(--neon);
            border-radius: 50%;
            animation: typing 1.4s infinite ease-in-out both;
        }

        .typing-dot:nth-child(1) { animation-delay: -0.32s; }
        .typing-dot:nth-child(2) { animation-delay: -0.16s; }
        @keyframes typing {
            0%, 80%, 100% { transform: scale(0); }
            40% { transform: scale(1); }
        }

        @media (max-width: 480px) {
            #chat-window {
                bottom: 85px;
                right: 12px;
                left: 12px;
                width: auto;
                height: 400px;
            }
            #chat-btn { bottom: 15px; right: 15px; width: 50px; height: 50px; }
        }

        /* =========================================================
           REDUCED MOTION – Accessibility
        ========================================================= */
        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
            }
            html { scroll-behavior: auto; }
            .reveal { opacity: 1; transform: none; }
        }
    </style>
</head>
<body>

    <!-- Skip to content – Accessibility -->
    <a href="#main-content" class="skip-link">Skip to content</a>

    <!-- ===================================================
         NAVBAR
    =================================================== -->
    <header>
    <nav class="navbar" role="navigation" aria-label="Main navigation">

        <a href="#about" class="nav-logo" id="logo-rb" aria-label="RB – Home">RB</a>

        <ul class="nav-links" id="nav-menu" role="list">
            <li><a href="#about"      id="nav-about">About Me</a></li>
            <li><a href="#experience" id="nav-experience">Experience</a></li>
            <li><a href="#skills"     id="nav-skills">Skills</a></li>
            <li><a href="#projects"   id="nav-projects">Projects</a></li>
        </ul>

        <div class="nav-right">
            <a href="#" class="btn-resume" id="btn-resume" download>
                Resume
                <svg viewBox="0 0 24 24" fill="none" stroke-width="2"
                     stroke-linecap="round" stroke-linejoin="round"
                     aria-hidden="true">
                    <path d="M12 5v14M5 12l7 7 7-7"/>
                </svg>
            </a>
        </div>

        <button class="hamburger" id="hamburger-btn"
                aria-label="Toggle navigation menu"
                aria-expanded="false" aria-controls="nav-menu">
            <span></span><span></span><span></span>
        </button>

    </nav>
    </header>

    <!-- ===================================================
         MAIN CONTENT
    =================================================== -->
    <main id="main-content">

    <!-- ===================================================
         SECTION 1 – ABOUT ME
    =================================================== -->
    <section id="about" aria-label="About Me">

        <!-- Ambient neon glow orbs -->
        <div class="hero-ambient hero-ambient-1" aria-hidden="true"></div>
        <div class="hero-ambient hero-ambient-2" aria-hidden="true"></div>

        <div class="hero-left reveal">
            <h1 class="hero-name" id="hero-heading"><span class="neon-char">R</span>ey<br>Buban</h1>
            <p class="hero-title">AI Developer</p>
            <p class="hero-bio">
            Creative developer passionate about artificial intelligence and building
            intelligent solutions — from e-commerce AI search and chatbots to eKYC
            identity verification. Experienced across the full stack with Python,
            Laravel, Vue, and modern AI integration.
            </p>

            <div class="social-links" aria-label="Social profiles">
                <a href="https://www.linkedin.com/in/rey-buban-a82057334/" target="_blank" rel="noopener"
                   class="social-btn linkedin" id="link-linkedin"
                   aria-label="LinkedIn profile">
                    <!-- LinkedIn icon -->
                    <svg viewBox="0 0 24 24" fill="white" aria-hidden="true">
                        <path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0
                                 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0
                                 016-6zM2 9h4v12H2z"/>
                        <circle cx="4" cy="4" r="2" fill="white"/>
                    </svg>
                </a>

                <a href="https://www.facebook.com/reybuban11" target="_blank" rel="noopener"
                   class="social-btn facebook" id="link-facebook"
                   aria-label="Facebook profile">
                    <!-- Facebook f icon -->
                    <svg viewBox="0 0 24 24" fill="white" aria-hidden="true">
                        <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"/>
                    </svg>
                </a>

                <a href="https://www.instagram.com/reybuban11/" target="_blank" rel="noopener"
                   class="social-btn instagram" id="link-instagram"
                   aria-label="Instagram profile">
                    <!-- Instagram icon -->
                    <svg viewBox="0 0 24 24" fill="none" stroke="white"
                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         aria-hidden="true">
                        <rect x="2" y="2" width="20" height="20" rx="5" ry="5"/>
                        <circle cx="12" cy="12" r="4"/>
                        <circle cx="17.5" cy="6.5" r="1" fill="white" stroke="none"/>
                    </svg>
                </a>
            </div>
        </div>

        <!-- Right: portrait -->
        <div class="hero-right">
            <div class="hero-photo-area">
                <!-- Real profile photo -->
                <img src="{{ asset('images/profile.jpg') }}"
                     alt="Rey Buban – AI Developer"
                     id="hero-portrait-img"
                     class="hero-portrait" />
                <!-- Gradient overlay to blend into section -->
                <div class="hero-photo-overlay" aria-hidden="true"></div>
            </div>
        </div>

    </section>

    <!-- ===================================================
         SECTION 2 – EXPERIENCE
    =================================================== -->
    <section id="experience" aria-label="Work Experience">
        <h2 class="section-title reveal">Experience</h2>

        <div class="experience-cards reveal">

            <!-- Card 1: OJT (teal/green) -->
            <article class="exp-card card-ojt" id="card-ojt"
                     aria-label="OJT experience">
                <div class="exp-card-image">
                    <svg viewBox="0 0 260 275" xmlns="http://www.w3.org/2000/svg">
                        <rect width="260" height="275" fill="#00897b"/>

                        <!-- Sun / accent circle top right -->
                        <circle cx="210" cy="40" r="34" fill="rgba(255,255,255,0.12)"/>
                        <circle cx="210" cy="40" r="22" fill="rgba(255,255,255,0.18)"/>

                        <!-- Desk surface -->
                        <rect x="30" y="200" width="200" height="12" rx="6"
                              fill="rgba(255,255,255,0.22)"/>

                        <!-- Laptop body -->
                        <rect x="70" y="130" width="120" height="78" rx="8"
                              fill="#004d40"/>
                        <rect x="76" y="136" width="108" height="64" rx="4"
                              fill="#00bfa5" opacity="0.9"/>
                        <!-- Screen glow lines (code) -->
                        <rect x="84" y="145" width="60" height="5" rx="2"
                              fill="rgba(255,255,255,0.6)"/>
                        <rect x="84" y="156" width="80" height="5" rx="2"
                              fill="rgba(255,255,255,0.4)"/>
                        <rect x="84" y="167" width="50" height="5" rx="2"
                              fill="rgba(255,255,255,0.5)"/>
                        <rect x="84" y="178" width="70" height="5" rx="2"
                              fill="rgba(255,255,255,0.3)"/>
                        <!-- Laptop base -->
                        <rect x="55" y="207" width="150" height="8" rx="4"
                              fill="#003d33"/>

                        <!-- Clock icon (9 hrs) -->
                        <circle cx="190" cy="155" r="20" fill="rgba(255,255,255,0.15)"
                                stroke="rgba(255,255,255,0.5)" stroke-width="2"/>
                        <line x1="190" y1="143" x2="190" y2="155"
                              stroke="white" stroke-width="2.5" stroke-linecap="round"/>
                        <line x1="190" y1="155" x2="198" y2="160"
                              stroke="white" stroke-width="2.5" stroke-linecap="round"/>
                        <text x="190" y="177" text-anchor="middle"
                              font-size="9" fill="rgba(255,255,255,0.8)">9 HRS</text>

                        <!-- Calendar icon (3 months) -->
                        <rect x="30" y="130" width="36" height="34" rx="4"
                              fill="rgba(255,255,255,0.18)" stroke="rgba(255,255,255,0.4)"
                              stroke-width="1.5"/>
                        <rect x="30" y="130" width="36" height="8" rx="4"
                              fill="rgba(255,255,255,0.35)"/>
                        <text x="48" y="157" text-anchor="middle"
                              font-size="8" fill="white" font-weight="700">3</text>
                        <text x="48" y="167" text-anchor="middle"
                              font-size="7" fill="rgba(255,255,255,0.8)">MOS</text>

                        <!-- Floating check marks -->
                        <text x="32" y="110" font-size="18" fill="rgba(255,255,255,0.5)">✓</text>
                        <text x="190" y="115" font-size="14" fill="rgba(255,255,255,0.3)">✓</text>
                    </svg>
                </div>
                <div class="exp-card-body">
                    <div class="exp-card-name">OJT</div>
                    <ul class="exp-card-detail">
                        <li>On-the-Job Training</li>
                        <li>9 hrs/day · 3 months</li>
                    </ul>
                </div>
            </article>

            <!-- Card 2: Synermaxx (purple) -->
            <article class="exp-card card-synermaxx" id="card-synermaxx"
                     aria-label="Synermaxx experience">
                <div class="exp-card-image">
                    <svg viewBox="0 0 260 275" xmlns="http://www.w3.org/2000/svg">
                        <rect width="260" height="275" fill="#5e35b1"/>

                        <!-- Glow orb background -->
                        <circle cx="130" cy="120" r="80"
                                fill="rgba(255,255,255,0.05)"/>
                        <circle cx="130" cy="120" r="55"
                                fill="rgba(255,255,255,0.07)"/>

                        <!-- Building / office silhouette -->
                        <!-- Main tower -->
                        <rect x="85" y="80" width="90" height="125" rx="4"
                              fill="#311b92"/>
                        <!-- Tower top detail -->
                        <rect x="115" y="70" width="30" height="16" rx="3"
                              fill="#4527a0"/>
                        <!-- Windows grid -->
                        <g fill="rgba(255,255,255,0.35)">
                            <rect x="96"  y="96"  width="14" height="10" rx="2"/>
                            <rect x="116" y="96"  width="14" height="10" rx="2"/>
                            <rect x="136" y="96"  width="14" height="10" rx="2"/>
                            <rect x="96"  y="114" width="14" height="10" rx="2"/>
                            <rect x="116" y="114" width="14" height="10" rx="2"/>
                            <rect x="136" y="114" width="14" height="10" rx="2"/>
                            <rect x="96"  y="132" width="14" height="10" rx="2"/>
                            <rect x="136" y="132" width="14" height="10" rx="2"/>
                        </g>
                        <!-- Lit window (highlight) -->
                        <rect x="116" y="132" width="14" height="10" rx="2"
                              fill="rgba(255,220,100,0.75)"/>

                        <!-- Door -->
                        <rect x="113" y="175" width="34" height="30" rx="3"
                              fill="#1a0080" opacity="0.7"/>
                        <circle cx="143" cy="191" r="2.5" fill="rgba(255,255,255,0.5)"/>

                        <!-- Side wings -->
                        <rect x="38"  y="130" width="50" height="75" rx="3"
                              fill="#4527a0"/>
                        <rect x="172" y="130" width="50" height="75" rx="3"
                              fill="#4527a0"/>
                        <!-- Wing windows -->
                        <rect x="46"  y="143" width="12" height="9" rx="2"
                              fill="rgba(255,255,255,0.28)"/>
                        <rect x="62"  y="143" width="12" height="9" rx="2"
                              fill="rgba(255,255,255,0.28)"/>
                        <rect x="46"  y="158" width="12" height="9" rx="2"
                              fill="rgba(255,220,100,0.6)"/>
                        <rect x="62"  y="158" width="12" height="9" rx="2"
                              fill="rgba(255,255,255,0.28)"/>
                        <rect x="178" y="143" width="12" height="9" rx="2"
                              fill="rgba(255,255,255,0.28)"/>
                        <rect x="194" y="143" width="12" height="9" rx="2"
                              fill="rgba(255,255,255,0.28)"/>
                        <rect x="178" y="158" width="12" height="9" rx="2"
                              fill="rgba(255,255,255,0.28)"/>
                        <rect x="194" y="158" width="12" height="9" rx="2"
                              fill="rgba(255,220,100,0.6)"/>

                        <!-- Ground line -->
                        <rect x="20" y="204" width="220" height="4" rx="2"
                              fill="rgba(255,255,255,0.2)"/>

                        <!-- Stars / sparkles -->
                        <text x="28"  y="62" font-size="16" fill="rgba(255,255,255,0.3)">✦</text>
                        <text x="214" y="58" font-size="12" fill="rgba(255,255,255,0.2)">✦</text>
                        <text x="44"  y="115" font-size="10" fill="rgba(255,255,255,0.15)">✦</text>
                    </svg>
                </div>
                <div class="exp-card-body">
                    <div class="exp-card-name">Synermaxx</div>
                    <ul class="exp-card-detail">
                        <li>Full-time</li>
                        <li>Started Jan 22, 2025</li>
                    </ul>
                </div>
            </article>

        </div>
    </section>

    <!-- ===================================================
         SECTION 3 – SKILLS
    =================================================== -->
    <section id="skills" aria-label="Technical Skills">
        <h2 class="section-title reveal">Skills</h2>

        <div class="marquee-wrapper reveal" role="list" aria-label="Programming languages and frameworks">

            <!-- Row 1: Python PHP AI JavaScript CSS — scrolls LEFT → RIGHT -->
            <!-- Items duplicated twice for seamless infinite loop -->
            <div class="marquee-row ltr">
                <div class="marquee-track" aria-hidden="false">
                    <span class="skill-pill" role="listitem">Python</span>
                    <span class="skill-pill" role="listitem">PHP</span>
                    <span class="skill-pill" role="listitem">AI</span>
                    <span class="skill-pill" role="listitem">JavaScript</span>
                    <span class="skill-pill" role="listitem">CSS</span>
                    <!-- duplicate for seamless loop -->
                    <span class="skill-pill" aria-hidden="true">Python</span>
                    <span class="skill-pill" aria-hidden="true">PHP</span>
                    <span class="skill-pill" aria-hidden="true">AI</span>
                    <span class="skill-pill" aria-hidden="true">JavaScript</span>
                    <span class="skill-pill" aria-hidden="true">CSS</span>
                </div>
            </div>

            <!-- Row 2: Vue Visual Basic Laravel MySQL XAMPP — scrolls RIGHT → LEFT -->
            <div class="marquee-row rtl">
                <div class="marquee-track" aria-hidden="false">
                    <span class="skill-pill" role="listitem">Vue</span>
                    <span class="skill-pill" role="listitem">Visual Basic</span>
                    <span class="skill-pill" role="listitem">Laravel</span>
                    <span class="skill-pill" role="listitem">MySQL</span>
                    <span class="skill-pill" role="listitem">XAMPP</span>
                    <!-- duplicate for seamless loop -->
                    <span class="skill-pill" aria-hidden="true">Vue</span>
                    <span class="skill-pill" aria-hidden="true">Visual Basic</span>
                    <span class="skill-pill" aria-hidden="true">Laravel</span>
                    <span class="skill-pill" aria-hidden="true">MySQL</span>
                    <span class="skill-pill" aria-hidden="true">XAMPP</span>
                </div>
            </div>

        </div>
    </section>

    <!-- ===================================================
         SECTION 4 – EDUCATION
    =================================================== -->
    <section aria-label="Education and Certificates">
        <div id="education">
            <h2 class="section-title reveal">Education & Certificates</h2>

            <div class="education-grid reveal">
                <div class="edu-item" id="edu-1">
                    <div class="edu-dot" aria-hidden="true"></div>
                    <span>Graduated at New Era Elementary School</span>
                </div>
                <div class="edu-item" id="edu-5">
                    <div class="edu-dot" aria-hidden="true"></div>
                    <span>Graduated at New Era High School</span>
                </div>

                <div class="edu-item" id="edu-2">
                    <div class="edu-dot" aria-hidden="true"></div>
                    <span>Graduated ICT strand at Electron College in Senior High</span>
                </div>
                <div class="edu-item" id="edu-6">
                    <div class="edu-dot" aria-hidden="true"></div>
                    <span>Graduated Bachelor of Science Information Technology at Gardner College Diliman </span>
                </div>

                <div class="edu-item" id="edu-3">
                    <div class="edu-dot" aria-hidden="true"></div>
                    <span>Rookie of the Year 2025 in my work at Synermaxx Corporation</span>
                </div>
                <div class="edu-item" id="edu-7">
                    <div class="edu-dot" aria-hidden="true"></div>
                    <span>Master of AI Chatbot</span>
                </div>
            </div>
        </div>
    </section>

    <!-- ===================================================
         SECTION 5 – PROJECTS
    =================================================== -->
    <section id="projects" aria-label="Projects">
        <h2 class="section-title reveal">Projects</h2>

        <div class="projects-grid reveal">

            <!-- Project 1: E-Commerce / Main App -->
            <a href="https://app123.maxxweb.biz/" target="_blank" rel="noopener"
               class="proj-card" id="proj-ecommerce"
               aria-label="E-Commerce AI App">
                <div class="proj-thumb">
                    <svg viewBox="0 0 480 300" xmlns="http://www.w3.org/2000/svg">
                        <rect width="480" height="300" fill="#0d1117"/>
                        <!-- Grid background -->
                        <g stroke="rgba(255,255,255,0.04)" stroke-width="1">
                            <line x1="0" y1="60"  x2="480" y2="60"/>
                            <line x1="0" y1="120" x2="480" y2="120"/>
                            <line x1="0" y1="180" x2="480" y2="180"/>
                            <line x1="0" y1="240" x2="480" y2="240"/>
                            <line x1="120" y1="0" x2="120" y2="300"/>
                            <line x1="240" y1="0" x2="240" y2="300"/>
                            <line x1="360" y1="0" x2="360" y2="300"/>
                        </g>
                        <!-- Product cards grid -->
                        <rect x="32" y="48" width="92" height="110" rx="10" fill="#1e3a5f"/>
                        <rect x="44" y="58" width="68" height="60" rx="6" fill="#2d5b8a"/>
                        <rect x="44" y="126" width="48" height="8" rx="4" fill="rgba(255,255,255,0.5)"/>
                        <rect x="44" y="140" width="32" height="6" rx="3" fill="rgba(255,255,255,0.25)"/>

                        <rect x="138" y="48" width="92" height="110" rx="10" fill="#3b1f5e"/>
                        <rect x="150" y="58" width="68" height="60" rx="6" fill="#5e35b1"/>
                        <rect x="150" y="126" width="48" height="8" rx="4" fill="rgba(255,255,255,0.5)"/>
                        <rect x="150" y="140" width="32" height="6" rx="3" fill="rgba(255,255,255,0.25)"/>

                        <rect x="244" y="48" width="92" height="110" rx="10" fill="#1f3d28"/>
                        <rect x="256" y="58" width="68" height="60" rx="6" fill="#2e7d32"/>
                        <rect x="256" y="126" width="48" height="8" rx="4" fill="rgba(255,255,255,0.5)"/>
                        <rect x="256" y="140" width="32" height="6" rx="3" fill="rgba(255,255,255,0.25)"/>

                        <!-- Cart icon centered right -->
                        <rect x="362" y="48" width="92" height="110" rx="10" fill="#1a1a1a" stroke="rgba(255,255,255,0.1)" stroke-width="1"/>
                        <text x="408" y="115" text-anchor="middle" font-size="36" fill="rgba(255,255,255,0.6)">🛒</text>

                        <!-- Bottom bar -->
                        <rect x="0" y="220" width="480" height="80" fill="rgba(255,255,255,0.03)"/>
                        <rect x="32" y="236" width="120" height="10" rx="5" fill="rgba(255,255,255,0.15)"/>
                        <rect x="32" y="252" width="80" height="8" rx="4" fill="rgba(255,255,255,0.08)"/>
                        <rect x="340" y="230" width="110" height="32" rx="8" fill="#4c6bff"/>
                        <rect x="358" y="241" width="74" height="10" rx="5" fill="rgba(255,255,255,0.9)"/>

                        <!-- Accent glow -->
                        <circle cx="420" cy="60" r="40" fill="rgba(76,107,255,0.15)"/>
                    </svg>
                </div>
                <div class="proj-info">
                    <span class="proj-badge">E-Commerce · AI Search</span>
                    <span class="proj-name">Maxx E-Commerce Platform</span>
                    <span class="proj-link">
                        View Project
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                             stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M7 17L17 7M17 7H7M17 7v10"/>
                        </svg>
                    </span>
                </div>
            </a>

            <!-- Project 2: Chat App (app130) -->
            <a href="https://app130.maxxweb.biz/chat" target="_blank" rel="noopener"
               class="proj-card" id="proj-chat-130"
               aria-label="AI Chatbot App 130">
                <div class="proj-thumb">
                    <svg viewBox="0 0 480 300" xmlns="http://www.w3.org/2000/svg">
                        <rect width="480" height="300" fill="#0e1f1a"/>
                        <!-- Glow -->
                        <circle cx="240" cy="150" r="130" fill="rgba(0,137,123,0.12)"/>
                        <!-- Chat bubbles -->
                        <rect x="30" y="50" width="240" height="48" rx="14" fill="#00897b" opacity="0.85"/>
                        <rect x="30" y="50" width="240" height="48" rx="14" fill="rgba(255,255,255,0.05)"/>
                        <rect x="42" y="65" width="140" height="10" rx="5" fill="rgba(255,255,255,0.75)"/>
                        <rect x="42" y="79" width="90" height="8" rx="4" fill="rgba(255,255,255,0.45)"/>
                        <!-- Tail -->
                        <polygon points="30,82 14,98 30,98" fill="#00897b" opacity="0.85"/>

                        <rect x="210" y="120" width="240" height="48" rx="14" fill="#1a2a29"/>
                        <rect x="222" y="135" width="120" height="10" rx="5" fill="rgba(255,255,255,0.35)"/>
                        <rect x="222" y="149" width="80" height="8" rx="4" fill="rgba(255,255,255,0.2)"/>
                        <polygon points="450,152 466,168 450,168" fill="#1a2a29"/>

                        <rect x="30" y="190" width="200" height="48" rx="14" fill="#00897b" opacity="0.8"/>
                        <rect x="42" y="205" width="100" height="10" rx="5" fill="rgba(255,255,255,0.75)"/>
                        <rect x="42" y="219" width="60" height="8" rx="4" fill="rgba(255,255,255,0.45)"/>
                        <polygon points="30,222 14,238 30,238" fill="#00897b" opacity="0.8"/>

                        <!-- Robot icon -->
                        <rect x="360" y="60" width="90" height="90" rx="18" fill="rgba(0,137,123,0.2)" stroke="rgba(0,137,123,0.4)" stroke-width="1.5"/>
                        <rect x="378" y="82" width="54" height="38" rx="8" fill="rgba(0,137,123,0.4)"/>
                        <circle cx="392" cy="98" r="7" fill="#00bfa5"/>
                        <circle cx="418" cy="98" r="7" fill="#00bfa5"/>
                        <rect x="388" y="108" width="28" height="5" rx="2" fill="rgba(255,255,255,0.5)"/>
                        <rect x="396" y="76" width="12" height="8" rx="4" fill="rgba(0,137,123,0.6)"/>
                    </svg>
                </div>
                <div class="proj-info">
                    <span class="proj-badge">AI Chatbot</span>
                    <span class="proj-name">Maxx AI Chat · app130</span>
                    <span class="proj-link">
                        View Project
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                             stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M7 17L17 7M17 7H7M17 7v10"/>
                        </svg>
                    </span>
                </div>
            </a>

            <!-- Project 3: Chat App (app119) -->
            <a href="https://app119.maxxweb.biz/chat" target="_blank" rel="noopener"
               class="proj-card" id="proj-chat-119"
               aria-label="AI Chatbot App 119">
                <div class="proj-thumb">
                    <svg viewBox="0 0 480 300" xmlns="http://www.w3.org/2000/svg">
                        <rect width="480" height="300" fill="#0f0e1f"/>
                        <circle cx="240" cy="150" r="130" fill="rgba(94,53,177,0.12)"/>
                        <!-- Chat bubbles -->
                        <rect x="30" y="50" width="240" height="48" rx="14" fill="#5e35b1" opacity="0.9"/>
                        <rect x="42" y="65" width="160" height="10" rx="5" fill="rgba(255,255,255,0.75)"/>
                        <rect x="42" y="79" width="100" height="8" rx="4" fill="rgba(255,255,255,0.45)"/>
                        <polygon points="30,82 14,98 30,98" fill="#5e35b1" opacity="0.9"/>

                        <rect x="210" y="120" width="240" height="48" rx="14" fill="#1a1530"/>
                        <rect x="222" y="135" width="120" height="10" rx="5" fill="rgba(255,255,255,0.35)"/>
                        <rect x="222" y="149" width="80" height="8" rx="4" fill="rgba(255,255,255,0.2)"/>
                        <polygon points="450,152 466,168 450,168" fill="#1a1530"/>

                        <rect x="30" y="190" width="180" height="48" rx="14" fill="#5e35b1" opacity="0.8"/>
                        <rect x="42" y="205" width="100" height="10" rx="5" fill="rgba(255,255,255,0.75)"/>
                        <rect x="42" y="219" width="60" height="8" rx="4" fill="rgba(255,255,255,0.45)"/>
                        <polygon points="30,222 14,238 30,238" fill="#5e35b1" opacity="0.8"/>

                        <!-- Bot face -->
                        <rect x="360" y="60" width="90" height="90" rx="18" fill="rgba(94,53,177,0.2)" stroke="rgba(94,53,177,0.4)" stroke-width="1.5"/>
                        <rect x="378" y="82" width="54" height="38" rx="8" fill="rgba(94,53,177,0.4)"/>
                        <circle cx="392" cy="98" r="7" fill="#9575cd"/>
                        <circle cx="418" cy="98" r="7" fill="#9575cd"/>
                        <rect x="388" y="108" width="28" height="5" rx="2" fill="rgba(255,255,255,0.5)"/>
                        <rect x="396" y="76" width="12" height="8" rx="4" fill="rgba(94,53,177,0.6)"/>
                    </svg>
                </div>
                <div class="proj-info">
                    <span class="proj-badge">AI Chatbot</span>
                    <span class="proj-name">Maxx AI Chat · app119</span>
                    <span class="proj-link">
                        View Project
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                             stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M7 17L17 7M17 7H7M17 7v10"/>
                        </svg>
                    </span>
                </div>
            </a>

            <!-- Project 4: eKYC (app133) -->
            <a href="https://app133.maxxweb.biz/kyc" target="_blank" rel="noopener"
               class="proj-card" id="proj-kyc-133"
               aria-label="eKYC Verification App 133">
                <div class="proj-thumb">
                    <svg viewBox="0 0 480 300" xmlns="http://www.w3.org/2000/svg">
                        <rect width="480" height="300" fill="#0d1a1f"/>
                        <circle cx="240" cy="150" r="130" fill="rgba(1,87,155,0.12)"/>
                        <!-- ID card -->
                        <rect x="80" y="60" width="320" height="180" rx="16" fill="#0d2a3a" stroke="rgba(3,169,244,0.3)" stroke-width="1.5"/>
                        <!-- Card header stripe -->
                        <rect x="80" y="60" width="320" height="40" rx="16" fill="#01579b"/>
                        <rect x="80" y="83" width="320" height="17" fill="#01579b"/>
                        <rect x="100" y="73" width="80" height="14" rx="4" fill="rgba(255,255,255,0.6)"/>
                        <rect x="360" y="70" width="30" height="20" rx="4" fill="rgba(255,255,255,0.3)"/>
                        <!-- Photo box -->
                        <rect x="100" y="116" width="76" height="90" rx="10" fill="#012a40"/>
                        <!-- Face placeholder -->
                        <ellipse cx="138" cy="143" rx="22" ry="22" fill="rgba(3,169,244,0.35)"/>
                        <ellipse cx="138" cy="175" rx="30" ry="20" fill="rgba(3,169,244,0.25)"/>
                        <!-- Text lines -->
                        <rect x="192" y="116" width="140" height="12" rx="6" fill="rgba(255,255,255,0.5)"/>
                        <rect x="192" y="135" width="100" height="9" rx="4" fill="rgba(255,255,255,0.25)"/>
                        <rect x="192" y="155" width="120" height="9" rx="4" fill="rgba(255,255,255,0.2)"/>
                        <rect x="192" y="173" width="80" height="9" rx="4" fill="rgba(255,255,255,0.15)"/>
                        <!-- Checkmark badge -->
                        <circle cx="356" cy="172" r="22" fill="#00c853"/>
                        <path d="M344 172 l8 8 l18-18" stroke="white" stroke-width="3" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
                        <!-- Barcode lines -->
                        <g fill="rgba(255,255,255,0.3)" transform="translate(100, 218)">
                            <rect x="0"  y="0" width="4"  height="12" rx="1"/>
                            <rect x="7"  y="0" width="2"  height="12" rx="1"/>
                            <rect x="12" y="0" width="5"  height="12" rx="1"/>
                            <rect x="20" y="0" width="3"  height="12" rx="1"/>
                            <rect x="26" y="0" width="4"  height="12" rx="1"/>
                            <rect x="33" y="0" width="2"  height="12" rx="1"/>
                            <rect x="38" y="0" width="6"  height="12" rx="1"/>
                            <rect x="47" y="0" width="3"  height="12" rx="1"/>
                        </g>
                    </svg>
                </div>
                <div class="proj-info">
                    <span class="proj-badge">Identity Verification · eKYC</span>
                    <span class="proj-name">Maxx eKYC System · app133</span>
                    <span class="proj-link">
                        View Project
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                             stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M7 17L17 7M17 7H7M17 7v10"/>
                        </svg>
                    </span>
                </div>
            </a>

            <!-- Project 5: Chat App (app89) -->
            <a href="https://app89.maxxweb.biz/chat" target="_blank" rel="noopener"
               class="proj-card" id="proj-chat-89"
               aria-label="AI Chatbot App 89">
                <div class="proj-thumb">
                    <svg viewBox="0 0 480 300" xmlns="http://www.w3.org/2000/svg">
                        <rect width="480" height="300" fill="#1a0e0a"/>
                        <circle cx="240" cy="150" r="130" fill="rgba(230,81,0,0.1)"/>
                        <!-- Chat bubbles -->
                        <rect x="30" y="50" width="240" height="48" rx="14" fill="#e65100" opacity="0.85"/>
                        <rect x="42" y="65" width="150" height="10" rx="5" fill="rgba(255,255,255,0.75)"/>
                        <rect x="42" y="79" width="90" height="8" rx="4" fill="rgba(255,255,255,0.45)"/>
                        <polygon points="30,82 14,98 30,98" fill="#e65100" opacity="0.85"/>

                        <rect x="210" y="120" width="240" height="48" rx="14" fill="#2a1800"/>
                        <rect x="222" y="135" width="120" height="10" rx="5" fill="rgba(255,255,255,0.3)"/>
                        <rect x="222" y="149" width="80" height="8" rx="4" fill="rgba(255,255,255,0.18)"/>
                        <polygon points="450,152 466,168 450,168" fill="#2a1800"/>

                        <rect x="30" y="190" width="200" height="48" rx="14" fill="#e65100" opacity="0.75"/>
                        <rect x="42" y="205" width="110" height="10" rx="5" fill="rgba(255,255,255,0.75)"/>
                        <rect x="42" y="219" width="70" height="8" rx="4" fill="rgba(255,255,255,0.45)"/>
                        <polygon points="30,222 14,238 30,238" fill="#e65100" opacity="0.75"/>

                        <!-- Bot icon -->
                        <rect x="360" y="60" width="90" height="90" rx="18" fill="rgba(230,81,0,0.18)" stroke="rgba(230,81,0,0.35)" stroke-width="1.5"/>
                        <rect x="378" y="82" width="54" height="38" rx="8" fill="rgba(230,81,0,0.35)"/>
                        <circle cx="392" cy="98" r="7" fill="#ff8a50"/>
                        <circle cx="418" cy="98" r="7" fill="#ff8a50"/>
                        <rect x="388" y="108" width="28" height="5" rx="2" fill="rgba(255,255,255,0.5)"/>
                        <rect x="396" y="76" width="12" height="8" rx="4" fill="rgba(230,81,0,0.55)"/>
                    </svg>
                </div>
                <div class="proj-info">
                    <span class="proj-badge">AI Chatbot</span>
                    <span class="proj-name">Maxx AI Chat · app89</span>
                    <span class="proj-link">
                        View Project
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                             stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M7 17L17 7M17 7H7M17 7v10"/>
                        </svg>
                    </span>
                </div>
            </a>

            <!-- Project 6: Chat App (app110) -->
            <a href="https://app110.maxxweb.biz/chat" target="_blank" rel="noopener"
               class="proj-card" id="proj-chat-110"
               aria-label="AI Chatbot App 110">
                <div class="proj-thumb">
                    <svg viewBox="0 0 480 300" xmlns="http://www.w3.org/2000/svg">
                        <rect width="480" height="300" fill="#0a1520"/>
                        <circle cx="240" cy="150" r="130" fill="rgba(21,101,192,0.12)"/>
                        <!-- Chat bubbles -->
                        <rect x="30" y="50" width="240" height="48" rx="14" fill="#1565c0" opacity="0.9"/>
                        <rect x="42" y="65" width="130" height="10" rx="5" fill="rgba(255,255,255,0.75)"/>
                        <rect x="42" y="79" width="80" height="8" rx="4" fill="rgba(255,255,255,0.45)"/>
                        <polygon points="30,82 14,98 30,98" fill="#1565c0" opacity="0.9"/>

                        <rect x="210" y="120" width="240" height="48" rx="14" fill="#0d1e30"/>
                        <rect x="222" y="135" width="120" height="10" rx="5" fill="rgba(255,255,255,0.32)"/>
                        <rect x="222" y="149" width="80" height="8" rx="4" fill="rgba(255,255,255,0.18)"/>
                        <polygon points="450,152 466,168 450,168" fill="#0d1e30"/>

                        <rect x="30" y="190" width="180" height="48" rx="14" fill="#1565c0" opacity="0.8"/>
                        <rect x="42" y="205" width="90" height="10" rx="5" fill="rgba(255,255,255,0.75)"/>
                        <rect x="42" y="219" width="55" height="8" rx="4" fill="rgba(255,255,255,0.45)"/>
                        <polygon points="30,222 14,238 30,238" fill="#1565c0" opacity="0.8"/>

                        <!-- Bot icon -->
                        <rect x="360" y="60" width="90" height="90" rx="18" fill="rgba(21,101,192,0.2)" stroke="rgba(21,101,192,0.4)" stroke-width="1.5"/>
                        <rect x="378" y="82" width="54" height="38" rx="8" fill="rgba(21,101,192,0.4)"/>
                        <circle cx="392" cy="98" r="7" fill="#64b5f6"/>
                        <circle cx="418" cy="98" r="7" fill="#64b5f6"/>
                        <rect x="388" y="108" width="28" height="5" rx="2" fill="rgba(255,255,255,0.5)"/>
                        <rect x="396" y="76" width="12" height="8" rx="4" fill="rgba(21,101,192,0.6)"/>
                    </svg>
                </div>
                <div class="proj-info">
                    <span class="proj-badge">AI Chatbot</span>
                    <span class="proj-name">Maxx AI Chat · app110</span>
                    <span class="proj-link">
                        View Project
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                             stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M7 17L17 7M17 7H7M17 7v10"/>
                        </svg>
                    </span>
                </div>
            </a>

        </div>
    </section>

    <!-- ===================================================
         CHATBOT UI
    =================================================== -->
    <button id="chat-btn" aria-label="Open AI Assistant">
        <svg viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg" width="30" height="30">
            <!-- Antenna -->
            <line x1="20" y1="2" x2="20" y2="9" stroke="#39FF14" stroke-width="2" stroke-linecap="round"/>
            <circle cx="20" cy="2" r="2" fill="#39FF14"/>
            <!-- Head -->
            <rect x="6" y="9" width="28" height="22" rx="6" fill="rgba(2,12,2,0.95)" stroke="#39FF14" stroke-width="1.5"/>
            <!-- Eyes (outer) -->
            <rect x="11" y="15" width="8" height="7" rx="2" fill="rgba(57,255,20,0.15)" stroke="#39FF14" stroke-width="1"/>
            <rect x="21" y="15" width="8" height="7" rx="2" fill="rgba(57,255,20,0.15)" stroke="#39FF14" stroke-width="1"/>
            <!-- Eye irises – these blink -->
            <ellipse id="bot-eye-left"  class="bot-eye" cx="15" cy="18.5" rx="2.5" ry="2.5" fill="#39FF14"/>
            <ellipse id="bot-eye-right" class="bot-eye" cx="25" cy="18.5" rx="2.5" ry="2.5" fill="#39FF14"/>
            <!-- Mouth -->
            <path d="M14 26 Q20 30 26 26" stroke="#39FF14" stroke-width="1.5" stroke-linecap="round" fill="none"/>
            <!-- Waving arm (hidden by default, shown by JS) -->
            <g id="wave-arm">
                <line x1="34" y1="22" x2="37" y2="13" stroke="#39FF14" stroke-width="2" stroke-linecap="round"/>
                <circle cx="37" cy="11" r="2.5" fill="#39FF14"/>
            </g>
        </svg>
    </button>

    <div id="chat-window">
        <div class="chat-header">
            <span class="chat-title">Assistant</span>
            <button class="chat-close" id="chat-close" aria-label="Close Chat">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </button>
        </div>
        <div class="chat-messages" id="chat-messages">
            <div class="chat-msg bot">Initializing terminal... Hello! I'm Rey's AI assistant. How can I help you today?</div>
        </div>
        <div class="chat-input-area">
            <input type="text" id="chat-input" placeholder="Ask about Rey's skills or projects..." autocomplete="off">
            <button id="chat-send">Send</button>
        </div>
    </div>

    </main>

    <!-- ===================================================
         FOOTER
    =================================================== -->
    <footer>
        <div class="footer-content">
            <div class="footer-social">
                <a href="https://www.linkedin.com/in/rey-buban-a82057334/" target="_blank" rel="noopener" aria-label="LinkedIn">
                    <svg viewBox="0 0 24 24" fill="currentColor"><path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"/><circle cx="4" cy="4" r="2"/></svg>
                </a>
                <a href="https://www.facebook.com/reybuban11" target="_blank" rel="noopener" aria-label="Facebook">
                    <svg viewBox="0 0 24 24" fill="currentColor"><path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"/></svg>
                </a>
                <a href="https://www.instagram.com/reybuban11/" target="_blank" rel="noopener" aria-label="Instagram">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="1" fill="currentColor" stroke="none"/></svg>
                </a>
            </div>
            <p>© 2025 Rey Buban · All rights reserved</p>
            <button class="back-to-top" onclick="window.scrollTo({top:0,behavior:'smooth'})" aria-label="Back to top">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 19V5M5 12l7-7 7 7"/></svg>
                back_to_top()
            </button>
        </div>
    </footer>

    <!-- ===================================================
         JAVASCRIPT
    =================================================== -->
    <script>
        /* ── Hamburger toggle ── */
        const hamburger = document.getElementById('hamburger-btn');
        const navMenu   = document.getElementById('nav-menu');

        hamburger.addEventListener('click', () => {
            const isOpen = navMenu.classList.toggle('open');
            hamburger.setAttribute('aria-expanded', isOpen);
            const spans = hamburger.querySelectorAll('span');
            if (isOpen) {
                spans[0].style.transform = 'rotate(45deg) translateY(7px)';
                spans[1].style.opacity   = '0';
                spans[2].style.transform = 'rotate(-45deg) translateY(-7px)';
            } else {
                spans[0].style.transform = '';
                spans[1].style.opacity   = '';
                spans[2].style.transform = '';
            }
        });

        /* Close menu on link click (mobile) */
        navMenu.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                navMenu.classList.remove('open');
                hamburger.setAttribute('aria-expanded', 'false');
                const spans = hamburger.querySelectorAll('span');
                spans[0].style.transform = '';
                spans[1].style.opacity   = '';
                spans[2].style.transform = '';
            });
        });

        /* ── Active nav highlight on scroll ── */
        const sections = document.querySelectorAll('section[id]');
        const navLinks  = document.querySelectorAll('.nav-links a');

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    navLinks.forEach(l => l.classList.remove('active'));
                    const active = document.querySelector(
                        `.nav-links a[href="#${entry.target.id}"]`
                    );
                    if (active) active.classList.add('active');
                }
            });
        }, { threshold: 0.4 });

        sections.forEach(s => observer.observe(s));

        /* ── Smooth scroll for all anchor links ── */
        document.querySelectorAll('a[href^="#"]').forEach(a => {
            a.addEventListener('click', e => {
                const t = document.querySelector(a.getAttribute('href'));
                if (t) { e.preventDefault(); t.scrollIntoView({ behavior: 'smooth' }); }
            });
        });

        /* ── Navbar shadow on scroll ── */
        window.addEventListener('scroll', () => {
            const nav = document.querySelector('.navbar');
            if (window.scrollY > 10) {
                nav.style.boxShadow = '0 4px 32px rgba(0,0,0,0.6), inset 0 1px 0 rgba(57,255,20,0.08)';
                nav.style.background = 'rgba(5,10,5,0.92)';
            } else {
                nav.style.boxShadow = '0 4px 32px rgba(0,0,0,0.5), inset 0 1px 0 rgba(57,255,20,0.06)';
                nav.style.background = 'rgba(5,10,5,0.82)';
            }
        });

        /* ── Scroll Reveal (IntersectionObserver) ── */
        const revealEls = document.querySelectorAll('.reveal');
        const revealObserver = new IntersectionObserver((entries) => {
            entries.forEach((entry, i) => {
                if (entry.isIntersecting) {
                    // Stagger animation delay per element index
                    setTimeout(() => {
                        entry.target.classList.add('visible');
                    }, i * 120);
                    revealObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.15, rootMargin: '0px 0px -40px 0px' });

        revealEls.forEach(el => revealObserver.observe(el));

        /* ── Chatbot Logic ── */
        const chatBtn = document.getElementById('chat-btn');
        const chatWindow = document.getElementById('chat-window');
        const chatClose = document.getElementById('chat-close');
        const chatInput = document.getElementById('chat-input');
        const chatSend = document.getElementById('chat-send');
        const chatMessages = document.getElementById('chat-messages');

        let chatHistory = [];

        // Toggle window
        chatBtn.addEventListener('click', () => {
            chatWindow.classList.toggle('open');
            if (chatWindow.classList.contains('open')) {
                setTimeout(() => chatInput.focus(), 300);
            }
        });

        chatClose.addEventListener('click', () => {
            chatWindow.classList.remove('open');
        });

        /* ── Robot eye random blinking ── */
        function triggerRandomBlink() {
            const delay = 5000 + Math.random() * 3000; // 5–8 seconds
            setTimeout(() => {
                const eyes = document.querySelectorAll('.bot-eye');
                eyes.forEach(eye => eye.classList.add('blinking'));
                setTimeout(() => {
                    eyes.forEach(eye => eye.classList.remove('blinking'));
                    triggerRandomBlink(); // schedule the next blink
                }, 200);
            }, delay);
        }
        triggerRandomBlink();

        /* ── Robot waving animation ── */
        const waveArm = document.getElementById('wave-arm');

        function triggerRandomWave() {
            const delay = 15000 + Math.random() * 15000; // 15–30 s
            setTimeout(() => {
                waveArm.classList.add('waving');
                // 4 waves × 0.55s = 2.2s + buffer for opacity fade-out
                setTimeout(() => {
                    waveArm.classList.remove('waving');
                    triggerRandomWave();
                }, 2500);
            }, delay);
        }
        triggerRandomWave();


        const eyeLeft  = document.getElementById('bot-eye-left');
        const eyeRight = document.getElementById('bot-eye-right');

        // Default SVG positions for each iris center
        const EYE_L = { cx: 15, cy: 18.5 };
        const EYE_R = { cx: 25, cy: 18.5 };
        const MAX_OFFSET = 1.4; // max SVG units the iris can shift

        window.addEventListener('mousemove', (e) => {
            const btn = chatBtn.getBoundingClientRect();
            const btnCX = btn.left + btn.width  / 2;
            const btnCY = btn.top  + btn.height / 2;

            const dx   = e.clientX - btnCX;
            const dy   = e.clientY - btnCY;
            const dist = Math.sqrt(dx * dx + dy * dy) || 1;

            // Influence fades in up to 120 px away, flat beyond that
            const factor = Math.min(dist, 120) / 120;
            const nx = (dx / dist) * MAX_OFFSET * factor;
            const ny = (dy / dist) * MAX_OFFSET * factor;

            eyeLeft .setAttribute('cx', EYE_L.cx + nx);
            eyeLeft .setAttribute('cy', EYE_L.cy + ny);
            eyeRight.setAttribute('cx', EYE_R.cx + nx);
            eyeRight.setAttribute('cy', EYE_R.cy + ny);
        });

        // Reset eyes to center when cursor leaves the window
        document.addEventListener('mouseleave', () => {
            eyeLeft .setAttribute('cx', EYE_L.cx);
            eyeLeft .setAttribute('cy', EYE_L.cy);
            eyeRight.setAttribute('cx', EYE_R.cx);
            eyeRight.setAttribute('cy', EYE_R.cy);
        });

        function formatMessage(text) {
            // Escape HTML tags to prevent XSS, but allow our own formatting to parse properly later
            let formatted = text.replace(/</g, '&lt;').replace(/>/g, '&gt;');
            
            // Bold: **text**
            formatted = formatted.replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>');
            
            // Italic: *text*
            formatted = formatted.replace(/\*(.*?)\*/g, '<em>$1</em>');
            
            // Simple newlines to <br> for better display
            formatted = formatted.replace(/\n/g, '<br>');
            
            return formatted;
        }

        function appendMessage(text, isUser = false) {
            const div = document.createElement('div');
            div.className = `chat-msg ${isUser ? 'user' : 'bot'}`;
            div.innerHTML = formatMessage(text);
            chatMessages.appendChild(div);
            // Auto scroll to bottom
            chatMessages.scrollTop = chatMessages.scrollHeight;
        }

        function appendTypingIndicator() {
            const div = document.createElement('div');
            div.className = 'chat-msg bot typing-wrapper';
            div.id = 'typing-indicator';
            div.innerHTML = `
                <div class="typing-indicator">
                    <div class="typing-dot"></div>
                    <div class="typing-dot"></div>
                    <div class="typing-dot"></div>
                </div>
            `;
            chatMessages.appendChild(div);
            chatMessages.scrollTop = chatMessages.scrollHeight;
        }

        function removeTypingIndicator() {
            const indicator = document.getElementById('typing-indicator');
            if (indicator) indicator.remove();
        }

        async function sendMessage() {
            const text = chatInput.value.trim();
            if (!text) return;

            // UI updates
            appendMessage(text, true);
            chatInput.value = '';
            appendTypingIndicator();

            try {
                // Get CSRF Token
                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                
                const response = await fetch('/api/chat', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        message: text,
                        history: chatHistory
                    })
                });

                const data = await response.json();
                removeTypingIndicator();

                if (response.ok && data.reply) {
                    appendMessage(data.reply, false);
                    
                    if ('speechSynthesis' in window) {
                        // Patigilin muna kung may nagsasalita pa
                        window.speechSynthesis.cancel();
                        
                        // Linisin ang text (Tanggalin ang mga * asterisk para hindi basahin ng bot)
                        const cleanText = data.reply.replace(/\*/g, '').replace(/_/g, '');
                        
                        const utterance = new SpeechSynthesisUtterance(cleanText);
                        utterance.rate = 1.0;  // Bilis ng pagsasalita (1 = normal)
                        utterance.pitch = 1.1; // Taas ng boses (1.1 = medyo AI vibe)
                        
                        // Subukang maghanap ng magandang boses sa computer/phone ng user
                        function setPreferredVoice() {
                            const voices = window.speechSynthesis.getVoices();
                            const preferredVoice = voices.find(v => v.name === 'Google UK English Male' || v.name.includes('UK English Male') || v.name.includes('Daniel'));
                            if (preferredVoice) utterance.voice = preferredVoice;
                        }
                        setPreferredVoice();
                        // Fallback: some browsers load voices asynchronously
                        if (window.speechSynthesis.getVoices().length === 0) {
                            window.speechSynthesis.addEventListener('voiceschanged', setPreferredVoice, { once: true });
                        }
                        
                        window.speechSynthesis.speak(utterance);
                    }
                    
                    // Update internal history array so Qwen has context
                    chatHistory.push({ role: 'user', content: text });
                    chatHistory.push({ role: 'assistant', content: data.reply });
                } else {
                    appendMessage(data.error || 'System error. Failed to communicate with host.', false);
                }

            } catch (error) {
                console.error(error);
                removeTypingIndicator();
                appendMessage('Connection offline. Please try again later.', false);
            }
        }

        chatSend.addEventListener('click', sendMessage);
        
        chatInput.addEventListener('keypress', (e) => {
            if (e.key === 'Enter') sendMessage();
        });

    </script>

</body>
</html>
