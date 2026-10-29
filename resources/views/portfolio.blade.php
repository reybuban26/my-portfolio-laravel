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
            --bg:           #0a050a;
            --bg-deep:      #050205;
            --bg-light:     #120a14;
            --bg-card:      #100a12;
            --white:        #f0eaff;
            --off-white:    #c8b8d8;
            --muted:        #7a5a8a;
            --border:       rgba(179,78,255,0.15);
            --neon:         #B34EFF;
            --neon-soft:    #d08bff;
            --neon-dim:     rgba(179,78,255,0.08);
            --neon-glow:    0 0 10px rgba(179,78,255,0.6), 0 0 30px rgba(179,78,255,0.2);
            --neon-text-glow: 0 0 12px rgba(179,78,255,0.85), 0 0 36px rgba(179,78,255,0.35);
            --neon-shadow:  0 4px 24px rgba(179,78,255,0.15);
            --radius-sm:    8px;
            --radius-md:    14px;
            --radius-lg:    20px;
            --ease-spring:  cubic-bezier(0.34, 1.56, 0.64, 1);
            --ease-smooth:  cubic-bezier(0.4, 0, 0.2, 1);
            --font-display: 'Space Grotesk', system-ui, sans-serif;
            --font-mono:    'JetBrains Mono', 'Fira Code', monospace;
            --nav-bg:       rgba(5,10,5,0.82);
            --nav-bg-solid: rgba(5,10,5,0.97);
            --nav-shadow:   0 4px 32px rgba(0,0,0,0.5);
        }

        /* =========================================================
           LIGHT THEME
        ========================================================= */
        [data-theme="light"] {
            --bg:           #f5f0fa;
            --bg-deep:      #eee8f5;
            --bg-light:     #faf7ff;
            --bg-card:      #ffffff;
            --white:        #1a1a2e;
            --off-white:    #3d3d5c;
            --muted:        #8a7a9e;
            --border:       rgba(179,78,255,0.2);
            --neon:         #8B30D6;
            --neon-soft:    #a855f7;
            --neon-dim:     rgba(179,78,255,0.06);
            --neon-glow:    0 0 8px rgba(179,78,255,0.3), 0 0 20px rgba(179,78,255,0.1);
            --neon-text-glow: 0 0 6px rgba(179,78,255,0.3);
            --neon-shadow:  0 4px 24px rgba(179,78,255,0.1);
            --nav-bg:       rgba(255,255,255,0.92);
            --nav-bg-solid: rgba(245,240,250,0.97);
            --nav-shadow:   0 4px 32px rgba(0,0,0,0.08);
        }

        [data-theme="light"] .navbar {
            border-color: rgba(179,78,255,0.2);
            box-shadow: var(--nav-shadow), inset 0 1px 0 rgba(255,255,255,0.9);
        }

        [data-theme="light"] .nav-logo {
            border-color: var(--neon);
            text-shadow: none;
            box-shadow: 0 0 6px rgba(139,48,214,0.2);
            animation: none;
        }

        [data-theme="light"] .nav-links a {
            color: var(--white);
            opacity: 0.8;
        }

        [data-theme="light"] .nav-links a:hover {
            opacity: 1;
            color: var(--neon);
            text-shadow: none;
        }

        [data-theme="light"] .nav-links a::after { box-shadow: none; }
        [data-theme="light"] .nav-links a.active { opacity: 1; color: var(--neon); }
        [data-theme="light"] .nav-links a.active::after { background: var(--neon); }

        [data-theme="light"] .btn-resume {
            border-color: var(--neon);
            color: var(--neon);
            text-shadow: none;
            box-shadow: none;
        }

        [data-theme="light"] .btn-resume:hover {
            background: var(--neon);
            color: white;
        }

        [data-theme="light"] .hamburger span { background: var(--white); }

        [data-theme="light"] .hero-ambient-1 { background: rgba(179,78,255,0.08); }
        [data-theme="light"] .hero-ambient-2 { background: rgba(179,78,255,0.06); }

        [data-theme="light"] .hero-photo-area #svg-global #node-server path:last-child {
            fill: #f0eaff;
        }

        [data-theme="light"] .exp-card { background: var(--bg-card); border-color: var(--border); }
        [data-theme="light"] .skill-pill { background: var(--bg-light); }
        [data-theme="light"] .proj-card { background: var(--bg-card); border-color: var(--border); }
        [data-theme="light"] footer { border-color: var(--border); }
        [data-theme="light"] #chat-btn {
            background: rgba(255,255,255,0.95);
            box-shadow: 0 4px 20px rgba(179,78,255,0.25);
        }

        [data-theme="light"] #chat-window {
            background: rgba(255,255,255,0.95);
            border-color: rgba(179,78,255,0.25);
            box-shadow: 0 12px 40px rgba(0,0,0,0.15), 0 0 20px rgba(179,78,255,0.08);
        }

        [data-theme="light"] .chat-header {
            background: rgba(179,78,255,0.04);
            border-bottom-color: rgba(179,78,255,0.12);
        }

        [data-theme="light"] .chat-msg.user {
            background: rgba(179,78,255,0.08);
            border-color: rgba(179,78,255,0.2);
            color: var(--white);
        }

        [data-theme="light"] .chat-msg.bot {
            background: rgba(179,78,255,0.03);
            border-color: rgba(179,78,255,0.1);
            color: var(--white);
        }

        [data-theme="light"] .chat-input-area {
            background: rgba(179,78,255,0.03);
            border-top-color: rgba(179,78,255,0.12);
        }

        [data-theme="light"] #chat-input {
            background: rgba(255,255,255,0.8);
            border-color: rgba(179,78,255,0.15);
            color: var(--white);
        }

        [data-theme="light"] #chat-send { color: white; }

        [data-theme="light"] .theme-switch .slider { background-color: #c8b8d8; }
        [data-theme="light"] .theme-switch { border-color: rgba(139,48,214,0.3); }
        [data-theme="light"] .theme-switch .slider:before { background-color: #6b4c8a; }
        [data-theme="light"] .theme-switch input:checked + .slider { background-color: #87CEEB; }
        [data-theme="light"] .theme-switch input:checked + .slider:before { background-color: #ff8c00; }

        @media (max-width: 768px) {
            [data-theme="light"] .nav-links {
                border-color: rgba(179,78,255,0.25);
                box-shadow: 0 8px 32px rgba(0,0,0,0.1);
            }
        }

        /* =========================================================
           SEASONAL THEMES (Calendar & URL Preview Support)
        ========================================================= */

        /* --- 1. HALLOWEEN THEME (Oct 29 - Nov 3) --- */
        [data-season="halloween"] {
            --neon:           #FF7518;
            --neon-soft:      #FFA256;
            --neon-dim:       rgba(255, 117, 24, 0.08);
            --border:         rgba(255, 117, 24, 0.22);
            --neon-glow:      0 0 10px rgba(255, 117, 24, 0.6), 0 0 30px rgba(255, 117, 24, 0.25);
            --neon-text-glow: 0 0 12px rgba(255, 117, 24, 0.9), 0 0 36px rgba(255, 117, 24, 0.4);
            --neon-shadow:    0 4px 24px rgba(255, 117, 24, 0.18);
            --bg:             #0b0509;
            --bg-deep:        #060205;
            --bg-light:       #150912;
            --bg-card:        #140810;
            --white:          #fff4ea;
            --off-white:      #dfc6b7;
            --muted:          #996e62;
            --nav-bg:         rgba(11, 5, 9, 0.85);
            --nav-bg-solid:   rgba(11, 5, 9, 0.98);
        }

        [data-season="halloween"] #about::after {
            background-image: radial-gradient(circle, rgba(255, 117, 24, 0.09) 1px, transparent 1px);
        }
        [data-season="halloween"] .hero-ambient-1 {
            background: rgba(255, 117, 24, 0.14);
        }
        [data-season="halloween"] .hero-ambient-2 {
            background: rgba(157, 0, 255, 0.12);
        }
        [data-season="halloween"] #line-v1 { stroke: #D95D00; }
        [data-season="halloween"] #line-v2 { stroke: #FF7518; }
        [data-season="halloween"] .hero-portrait {
            border-color: #FF7518;
            box-shadow: 0 0 16px rgba(255, 117, 24, 0.65);
        }

        /* Halloween Light Theme */
        [data-season="halloween"][data-theme="light"] {
            --bg:             #fef7f0;
            --bg-deep:        #f8ebe0;
            --bg-light:       #fffcf7;
            --bg-card:        #ffffff;
            --white:          #241203;
            --off-white:      #4d2f19;
            --muted:          #8f6a4e;
            --border:         rgba(217, 93, 0, 0.25);
            --neon:           #D95D00;
            --neon-soft:      #ff802b;
            --neon-glow:      0 0 8px rgba(217, 93, 0, 0.35), 0 0 20px rgba(217, 93, 0, 0.15);
            --neon-text-glow: 0 0 6px rgba(217, 93, 0, 0.35);
            --nav-bg:         rgba(255, 250, 245, 0.92);
            --nav-bg-solid:   rgba(254, 247, 240, 0.98);
        }

        /* --- 2. CHRISTMAS THEME (Dec 1 - Jan 2) --- */
        [data-season="christmas"] {
            --neon:           #FF2253;
            --neon-soft:      #FF6888;
            --neon-dim:       rgba(255, 34, 83, 0.08);
            --border:         rgba(255, 34, 83, 0.22);
            --neon-glow:      0 0 10px rgba(255, 34, 83, 0.6), 0 0 30px rgba(0, 245, 160, 0.25);
            --neon-text-glow: 0 0 12px rgba(255, 34, 83, 0.9), 0 0 36px rgba(0, 245, 160, 0.35);
            --neon-shadow:    0 4px 24px rgba(255, 34, 83, 0.18);
            --bg:             #030810;
            --bg-deep:        #02050b;
            --bg-light:       #06111e;
            --bg-card:        #071321;
            --white:          #f0f8ff;
            --off-white:      #bdd8f0;
            --muted:          #5e83a6;
            --nav-bg:         rgba(3, 8, 16, 0.86);
            --nav-bg-solid:   rgba(3, 8, 16, 0.98);
        }

        [data-season="christmas"] #about::after {
            background-image: radial-gradient(circle, rgba(0, 245, 160, 0.08) 1px, transparent 1px);
        }
        [data-season="christmas"] .hero-ambient-1 {
            background: rgba(255, 34, 83, 0.12);
        }
        [data-season="christmas"] .hero-ambient-2 {
            background: rgba(0, 245, 160, 0.12);
        }
        [data-season="christmas"] #line-v1 { stroke: #00F5A0; }
        [data-season="christmas"] #line-v2 { stroke: #FF2253; }
        [data-season="christmas"] .hero-portrait {
            border-color: #FF2253;
            box-shadow: 0 0 16px rgba(255, 34, 83, 0.65);
        }

        /* Christmas Light Theme */
        [data-season="christmas"][data-theme="light"] {
            --bg:             #f2f7fd;
            --bg-deep:        #e4eef8;
            --bg-light:       #fafcff;
            --bg-card:        #ffffff;
            --white:          #08192a;
            --off-white:      #224263;
            --muted:          #5a7a9a;
            --border:         rgba(217, 17, 61, 0.25);
            --neon:           #D9113D;
            --neon-soft:      #ff426b;
            --neon-glow:      0 0 8px rgba(217, 17, 61, 0.35), 0 0 20px rgba(0, 180, 120, 0.15);
            --neon-text-glow: 0 0 6px rgba(217, 17, 61, 0.35);
            --nav-bg:         rgba(255, 255, 255, 0.92);
            --nav-bg-solid:   rgba(242, 247, 253, 0.98);
        }

        /* --- 3. NEW YEAR THEME (Dec 29 - Jan 2) --- */
        [data-season="newyear"] {
            --neon:           #FFD700;
            --neon-soft:      #FFE266;
            --neon-dim:       rgba(255, 215, 0, 0.08);
            --border:         rgba(255, 215, 0, 0.24);
            --neon-glow:      0 0 10px rgba(255, 215, 0, 0.65), 0 0 30px rgba(0, 240, 255, 0.25);
            --neon-text-glow: 0 0 12px rgba(255, 215, 0, 0.9), 0 0 36px rgba(0, 240, 255, 0.35);
            --neon-shadow:    0 4px 24px rgba(255, 215, 0, 0.18);
            --bg:             #070603;
            --bg-deep:        #040301;
            --bg-light:       #130f05;
            --bg-card:        #100c04;
            --white:          #fffdf8;
            --off-white:      #e5dbc3;
            --muted:          #998d73;
            --nav-bg:         rgba(7, 6, 3, 0.88);
            --nav-bg-solid:   rgba(7, 6, 3, 0.98);
        }

        [data-season="newyear"] #about::after {
            background-image: radial-gradient(circle, rgba(255, 215, 0, 0.09) 1px, transparent 1px);
        }
        [data-season="newyear"] .hero-ambient-1 {
            background: rgba(255, 215, 0, 0.14);
        }
        [data-season="newyear"] .hero-ambient-2 {
            background: rgba(0, 240, 255, 0.12);
        }
        [data-season="newyear"] #line-v1 { stroke: #00F0FF; }
        [data-season="newyear"] #line-v2 { stroke: #FFD700; }
        [data-season="newyear"] .hero-portrait {
            border-color: #FFD700;
            box-shadow: 0 0 18px rgba(255, 215, 0, 0.7);
        }

        /* New Year Light Theme */
        [data-season="newyear"][data-theme="light"] {
            --bg:             #fcf9f2;
            --bg-deep:        #f3ede0;
            --bg-light:       #fffdf8;
            --bg-card:        #ffffff;
            --white:          #1f1807;
            --off-white:      #453818;
            --muted:          #85734e;
            --border:         rgba(184, 134, 11, 0.28);
            --neon:           #B8860B;
            --neon-soft:      #d4af37;
            --neon-glow:      0 0 8px rgba(184, 134, 11, 0.35), 0 0 20px rgba(0, 190, 210, 0.15);
            --neon-text-glow: 0 0 6px rgba(184, 134, 11, 0.35);
            --nav-bg:         rgba(255, 252, 246, 0.94);
            --nav-bg-solid:   rgba(252, 249, 242, 0.98);
        }

        /* --- 4. VALENTINE'S DAY THEME (Feb 10 - Feb 14) --- */
        [data-season="valentine"] {
            --neon:           #FF1493;
            --neon-soft:      #FF69B4;
            --neon-dim:       rgba(255, 20, 147, 0.08);
            --border:         rgba(255, 20, 147, 0.22);
            --neon-glow:      0 0 10px rgba(255, 20, 147, 0.65), 0 0 30px rgba(255, 105, 180, 0.25);
            --neon-text-glow: 0 0 12px rgba(255, 20, 147, 0.9), 0 0 36px rgba(255, 105, 180, 0.35);
            --neon-shadow:    0 4px 24px rgba(255, 20, 147, 0.18);
            --bg:             #0b0409;
            --bg-deep:        #060205;
            --bg-light:       #150611;
            --bg-card:        #140510;
            --white:          #fff0f6;
            --off-white:      #e5c4d4;
            --muted:          #996981;
            --nav-bg:         rgba(11, 4, 9, 0.86);
            --nav-bg-solid:   rgba(11, 4, 9, 0.98);
        }

        [data-season="valentine"] #about::after {
            background-image: radial-gradient(circle, rgba(255, 20, 147, 0.09) 1px, transparent 1px);
        }
        [data-season="valentine"] .hero-ambient-1 {
            background: rgba(255, 20, 147, 0.14);
        }
        [data-season="valentine"] .hero-ambient-2 {
            background: rgba(255, 105, 180, 0.12);
        }
        [data-season="valentine"] #line-v1 { stroke: #FF69B4; }
        [data-season="valentine"] #line-v2 { stroke: #FF1493; }
        [data-season="valentine"] .hero-portrait {
            border-color: #FF1493;
            box-shadow: 0 0 18px rgba(255, 20, 147, 0.7);
        }

        /* Valentine Light Theme */
        [data-season="valentine"][data-theme="light"] {
            --bg:             #fef4f8;
            --bg-deep:        #f9e3ee;
            --bg-light:       #fff9fc;
            --bg-card:        #ffffff;
            --white:          #240716;
            --off-white:      #4d1b35;
            --muted:          #8f4b6d;
            --border:         rgba(217, 18, 126, 0.25);
            --neon:           #D9127E;
            --neon-soft:      #ff3f9e;
            --neon-glow:      0 0 8px rgba(217, 18, 126, 0.35), 0 0 20px rgba(255, 105, 180, 0.15);
            --neon-text-glow: 0 0 6px rgba(217, 18, 126, 0.35);
            --nav-bg:         rgba(255, 248, 252, 0.92);
            --nav-bg-solid:   rgba(254, 244, 248, 0.98);
        }

        /* --- Seasonal UI Switcher Button in Navbar --- */
        .btn-season {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 5px 12px;
            border-radius: 20px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid var(--border);
            color: var(--white);
            font-size: 0.78rem;
            font-family: var(--font-mono);
            cursor: pointer;
            transition: all 0.25s var(--ease-spring);
            user-select: none;
            flex-shrink: 0;
        }
        .btn-season:hover {
            border-color: var(--neon);
            box-shadow: var(--neon-glow);
            transform: translateY(-1px);
        }
        .btn-season:active {
            transform: scale(0.95);
        }
        .season-btn-icon {
            font-size: 1rem;
            line-height: 1;
        }
        .season-btn-text {
            font-weight: 500;
            letter-spacing: 0.04em;
        }

        @media (max-width: 768px) {
            .btn-season { padding: 5px 9px; }
            .season-btn-text { display: none; }
        }

        /* =========================================================
           SEASONAL DECORATIVE ELEMENTS
        ========================================================= */
        #seasonal-decorations {
            pointer-events: none;
            position: fixed;
            inset: 0;
            width: 100%;
            max-width: 100vw;
            height: 100%;
            overflow: hidden;
            contain: paint;
            z-index: 45;
        }

        .decor-halloween, .decor-christmas, .decor-newyear, .decor-valentine {
            display: none;
            width: 100%;
            height: 100%;
            position: absolute;
            inset: 0;
        }

        [data-season="halloween"] .decor-halloween { display: block; }
        [data-season="christmas"] .decor-christmas { display: block; }
        [data-season="newyear"] .decor-newyear { display: block; }
        [data-season="valentine"] .decor-valentine { display: block; }

        /* --- Halloween Elements --- */
        .h-web {
            position: absolute;
            width: 130px;
            height: 130px;
            color: var(--neon);
            filter: drop-shadow(0 0 6px rgba(255, 117, 24, 0.45));
            opacity: 0.75;
            pointer-events: none;
        }
        .h-web-left { top: 0; left: 0; }
        .h-web-right { top: 0; right: 0; }

        .h-spider-hang {
            position: absolute;
            top: 0;
            right: 85px;
            display: flex;
            flex-direction: column;
            align-items: center;
            animation: spider-sway 4.5s ease-in-out infinite;
            transform-origin: top center;
        }
        .h-thread {
            width: 1px;
            height: 70px;
            background: linear-gradient(to bottom, rgba(255, 117, 24, 0.7), rgba(255, 117, 24, 0.2));
            box-shadow: 0 0 4px rgba(255, 117, 24, 0.5);
        }
        .h-spider {
            width: 32px;
            height: 32px;
            color: var(--neon);
            filter: drop-shadow(0 0 6px rgba(255, 117, 24, 0.7));
            margin-top: -2px;
        }

        @keyframes spider-sway {
            0%, 100% { transform: rotate(0deg) translateY(0); }
            25%      { transform: rotate(8deg) translateY(6px); }
            50%      { transform: rotate(-6deg) translateY(-2px); }
            75%      { transform: rotate(5deg) translateY(3px); }
        }

        .h-ghost {
            position: absolute;
            color: var(--neon);
            pointer-events: none;
            filter: drop-shadow(0 0 10px rgba(255, 117, 24, 0.45));
        }
        .h-ghost-1 {
            top: 25%;
            left: 3%;
            width: 54px;
            height: 64px;
            animation: ghost-float-1 7s ease-in-out infinite;
            opacity: 0.85;
        }
        .h-ghost-2 {
            top: 60%;
            right: 4%;
            width: 46px;
            height: 56px;
            animation: ghost-float-2 8.5s ease-in-out infinite;
            opacity: 0.8;
        }

        @keyframes ghost-float-1 {
            0%, 100% { transform: translate(0, 0) rotate(0deg); }
            33%      { transform: translate(16px, -28px) rotate(5deg); }
            66%      { transform: translate(-12px, -14px) rotate(-4deg); }
        }
        @keyframes ghost-float-2 {
            0%, 100% { transform: translate(0, 0) rotate(0deg); }
            50%      { transform: translate(-20px, -24px) rotate(-6deg); }
        }

        .h-pumpkin {
            position: absolute;
            bottom: 25px;
            left: 25px;
            width: 52px;
            height: 48px;
            color: var(--neon);
            filter: drop-shadow(0 0 10px rgba(255, 117, 24, 0.6));
            animation: pumpkin-hover 4s ease-in-out infinite alternate;
        }
        @keyframes pumpkin-hover {
            0%   { transform: translateY(0) rotate(-2deg); }
            100% { transform: translateY(-8px) rotate(2deg); }
        }
        .pumpkin-glow {
            animation: pumpkin-flicker 2.5s infinite;
        }
        @keyframes pumpkin-flicker {
            0%, 100% { fill: #FF7518; filter: drop-shadow(0 0 6px #FF7518); }
            20%      { fill: #FF4500; filter: drop-shadow(0 0 3px #FF4500); }
            45%      { fill: #FFA500; filter: drop-shadow(0 0 9px #FFA500); }
            70%      { fill: #FF7518; filter: drop-shadow(0 0 5px #FF7518); }
        }

        /* --- Christmas Elements --- */
        #snow-canvas {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 46;
        }

        .c-flake {
            position: absolute;
            color: #00F5A0;
            filter: drop-shadow(0 0 8px rgba(0, 245, 160, 0.6));
            animation: snowflake-spin 9s linear infinite;
            opacity: 0.8;
            pointer-events: none;
        }
        .c-flake-1 { top: 90px; left: 35px; width: 32px; height: 32px; }
        .c-flake-2 { top: 120px; right: 45px; width: 26px; height: 26px; animation-duration: 12s; animation-direction: reverse; color: #FF2253; filter: drop-shadow(0 0 8px rgba(255, 34, 83, 0.6)); }

        @keyframes snowflake-spin {
            0%   { transform: rotate(0deg) translateY(0); }
            50%  { transform: rotate(180deg) translateY(-8px); }
            100% { transform: rotate(360deg) translateY(0); }
        }

        /* Bot holiday charms */
        .bot-santa-hat {
            display: none;
            position: absolute;
            top: -14px;
            right: 4px;
            width: 30px;
            height: 24px;
            pointer-events: none;
            z-index: 105;
            filter: drop-shadow(0 0 6px rgba(255, 34, 83, 0.7));
            animation: hat-bob 3s ease-in-out infinite;
        }
        [data-season="christmas"] .bot-santa-hat { display: block; }
        @keyframes hat-bob {
            0%, 100% { transform: rotate(0deg); }
            50%      { transform: rotate(-5deg) translateY(-2px); }
        }

        .bot-halloween-charm {
            display: none;
            position: absolute;
            top: -12px;
            left: -8px;
            width: 28px;
            height: 20px;
            pointer-events: none;
            z-index: 105;
            filter: drop-shadow(0 0 6px rgba(255, 117, 24, 0.75));
            animation: bat-flap 2.2s ease-in-out infinite alternate;
        }
        [data-season="halloween"] .bot-halloween-charm { display: block; }
        @keyframes bat-flap {
            0%   { transform: rotate(-8deg) scale(1); }
            100% { transform: rotate(6deg) scale(1.08); }
        }

        /* --- Casper-style Full Screen Flying Ghosts --- */
        .h-casper-ghost {
            position: absolute;
            pointer-events: none;
            z-index: 47;
            filter: drop-shadow(0 0 16px rgba(255, 117, 24, 0.85));
        }
        .h-casper-1 {
            width: 82px;
            height: 92px;
            color: #FF7518;
            animation: casper-flight-1 20s ease-in-out infinite;
        }
        .h-casper-2 {
            width: 68px;
            height: 76px;
            color: #b34eff;
            filter: drop-shadow(0 0 16px rgba(179, 78, 255, 0.85));
            animation: casper-flight-2 24s ease-in-out infinite 7s;
        }

        @keyframes casper-flight-1 {
            0% {
                transform: translate3d(-120px, 35vh, 0) scale(0.85) rotate(15deg);
                opacity: 0;
            }
            10% { opacity: 0.95; }
            35% {
                transform: translate3d(35vw, 15vh, 0) scale(1.05) rotate(-10deg);
            }
            65% {
                transform: translate3d(65vw, 55vh, 0) scale(0.95) rotate(14deg);
            }
            90% { opacity: 0.9; }
            100% {
                transform: translate3d(calc(100vw + 120px), 25vh, 0) scale(1) rotate(-15deg);
                opacity: 0;
            }
        }

        @keyframes casper-flight-2 {
            0% {
                transform: translate3d(calc(100vw + 120px), 70vh, 0) scale(0.8) rotate(-15deg) scaleX(-1);
                opacity: 0;
            }
            12% { opacity: 0.9; }
            45% {
                transform: translate3d(60vw, 30vh, 0) scale(1) rotate(10deg) scaleX(-1);
            }
            75% {
                transform: translate3d(25vw, 65vh, 0) scale(0.9) rotate(-8deg) scaleX(-1);
            }
            92% { opacity: 0.85; }
            100% {
                transform: translate3d(-120px, 40vh, 0) scale(0.85) rotate(12deg) scaleX(-1);
                opacity: 0;
            }
        }

        /* Flying Bats Flock */
        .h-bat-flock {
            position: absolute;
            top: 50px;
            width: 100%;
            height: 140px;
            pointer-events: none;
            overflow: hidden;
        }
        .h-bat {
            position: absolute;
            color: #FF7518;
            filter: drop-shadow(0 0 8px rgba(255, 117, 24, 0.8));
            animation: bat-cross 16s linear infinite;
        }
        .h-bat-1 { top: 20px; width: 34px; height: 20px; animation-duration: 15s; }
        .h-bat-2 { top: 65px; width: 26px; height: 16px; animation-duration: 18s; animation-delay: 4.5s; }
        .h-bat-3 { top: 40px; width: 22px; height: 14px; animation-duration: 13s; animation-delay: 8s; }

        @keyframes bat-cross {
            0% { transform: translate3d(-60px, 0, 0) scale(0.8); opacity: 0; }
            10% { opacity: 0.9; }
            50% { transform: translate3d(50vw, -20px, 0) scale(1); }
            90% { opacity: 0.9; }
            100% { transform: translate3d(calc(100vw + 60px), 15px, 0) scale(0.85); opacity: 0; }
        }

        /* Second pumpkin & tombstone */
        .h-pumpkin-2 {
            position: absolute;
            bottom: 30px;
            right: 120px;
            width: 44px;
            height: 40px;
            color: #FF7518;
            filter: drop-shadow(0 0 10px rgba(255, 117, 24, 0.6));
            animation: pumpkin-hover 3.6s ease-in-out infinite alternate 1s;
        }
        .h-tombstone {
            position: absolute;
            bottom: 25px;
            left: 95px;
            width: 42px;
            height: 48px;
            color: #b34eff;
            opacity: 0.8;
            filter: drop-shadow(0 0 8px rgba(179, 78, 255, 0.5));
        }

        /* --- Christmas Enhanced Elements (Santa Sleigh, Tree, Baubles) --- */
        .c-santa-sleigh {
            position: absolute;
            top: 105px;
            left: -320px;
            width: 270px;
            height: 60px;
            pointer-events: none;
            z-index: 48;
            filter: drop-shadow(0 0 14px rgba(255, 34, 83, 0.85));
            animation: santa-flight 24s linear infinite;
        }

        @keyframes santa-flight {
            0% {
                transform: translate3d(0, 0, 0) rotate(-3deg);
                opacity: 0;
            }
            5%  { opacity: 0.95; }
            30% { transform: translate3d(35vw, 15px, 0) rotate(2deg); }
            60% { transform: translate3d(70vw, 5px, 0) rotate(-2deg); }
            92% { opacity: 0.95; }
            100% {
                transform: translate3d(calc(100vw + 340px), 18px, 0) rotate(3deg);
                opacity: 0;
            }
        }

        @media (max-width: 768px) {
            .c-santa-sleigh {
                top: 85px;
                transform: scale(0.75);
                transform-origin: top left;
            }
        }

        /* Glowing Neon Decorated Christmas Tree */
        .c-christmas-tree {
            position: absolute;
            bottom: 25px;
            left: 28px;
            width: 78px;
            height: 110px;
            pointer-events: none;
            filter: drop-shadow(0 0 14px rgba(0, 245, 160, 0.75));
            animation: tree-gentle-glow 4s ease-in-out infinite alternate;
        }
        @keyframes tree-gentle-glow {
            0%   { filter: drop-shadow(0 0 10px rgba(0, 245, 160, 0.6)); }
            100% { filter: drop-shadow(0 0 18px rgba(0, 245, 160, 0.95)); }
        }

        .c-tree-light-1 { animation: fairy-blink-1 1.6s infinite; }
        .c-tree-light-2 { animation: fairy-blink-2 1.9s infinite 0.4s; }
        .c-tree-light-3 { animation: fairy-blink-3 2.1s infinite 0.8s; }
        @keyframes fairy-blink-1 {
            0%, 100% { fill: #FF2253; filter: drop-shadow(0 0 6px #FF2253); }
            50%      { fill: #FFD700; filter: drop-shadow(0 0 8px #FFD700); }
        }
        @keyframes fairy-blink-2 {
            0%, 100% { fill: #00F5A0; filter: drop-shadow(0 0 6px #00F5A0); }
            50%      { fill: #00D2FF; filter: drop-shadow(0 0 8px #00D2FF); }
        }
        @keyframes fairy-blink-3 {
            0%, 100% { fill: #FFD700; filter: drop-shadow(0 0 8px #FFD700); }
            50%      { fill: #FF2253; filter: drop-shadow(0 0 6px #FF2253); }
        }

        /* Hanging Christmas Baubles & Candy Canes */
        .c-hanging-ornaments {
            position: absolute;
            top: 0;
            left: 22%;
            display: flex;
            gap: 75px;
            pointer-events: none;
        }
        .c-bauble-hang {
            display: flex;
            flex-direction: column;
            align-items: center;
            animation: ornament-sway 4.5s ease-in-out infinite;
            transform-origin: top center;
        }
        .c-bauble-hang:nth-child(2) { animation-duration: 5.4s; animation-delay: 1.2s; }
        .c-bauble-hang:nth-child(3) { animation-duration: 4.8s; animation-delay: 0.6s; }
        @keyframes ornament-sway {
            0%, 100% { transform: rotate(0deg); }
            33%      { transform: rotate(7deg); }
            66%      { transform: rotate(-7deg); }
        }

        /* --- New Year Fireworks, Toast & Disco Ball --- */
        #fireworks-canvas {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 46;
        }

        .ny-sparkle {
            position: absolute;
            color: #FFD700;
            filter: drop-shadow(0 0 10px rgba(255, 215, 0, 0.85));
            animation: ny-twinkle 3s ease-in-out infinite alternate;
            pointer-events: none;
        }
        .ny-sparkle-1 { top: 90px; right: 55px; width: 34px; height: 34px; }
        .ny-sparkle-2 { top: 120px; left: 40px; width: 28px; height: 28px; color: #00F0FF; animation-delay: 1.2s; filter: drop-shadow(0 0 10px rgba(0, 240, 255, 0.85)); }

        @keyframes ny-twinkle {
            0%   { transform: scale(0.8) rotate(0deg); opacity: 0.5; }
            50%  { transform: scale(1.2) rotate(90deg); opacity: 1; }
            100% { transform: scale(0.85) rotate(180deg); opacity: 0.6; }
        }

        .ny-champagne {
            position: absolute;
            bottom: 25px;
            left: 35px;
            width: 68px;
            height: 64px;
            pointer-events: none;
            filter: drop-shadow(0 0 12px rgba(255, 215, 0, 0.85));
            animation: toast-clink 3.2s ease-in-out infinite;
        }
        @keyframes toast-clink {
            0%, 80%, 100% { transform: rotate(0deg); }
            40%           { transform: rotate(-6deg); }
            50%           { transform: rotate(5deg) scale(1.06); }
        }

        .ny-disco-hang {
            position: absolute;
            top: 0;
            left: 18%;
            display: flex;
            flex-direction: column;
            align-items: center;
            pointer-events: none;
        }
        .ny-disco-ball {
            width: 44px;
            height: 44px;
            color: #FFD700;
            filter: drop-shadow(0 0 14px rgba(255, 215, 0, 0.95));
            animation: disco-spin 6.5s linear infinite;
        }
        @keyframes disco-spin {
            0%   { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .bot-party-hat {
            display: none;
            position: absolute;
            top: -16px;
            right: 4px;
            width: 32px;
            height: 28px;
            pointer-events: none;
            z-index: 105;
            filter: drop-shadow(0 0 8px rgba(255, 215, 0, 0.8));
            animation: party-bob 2.5s ease-in-out infinite;
        }
        [data-season="newyear"] .bot-party-hat { display: block; }
        @keyframes party-bob {
            0%, 100% { transform: rotate(0deg) translateY(0); }
            50%      { transform: rotate(-8deg) translateY(-3px); }
        }

        /* --- Valentine's Day Flying Cupid, Rose, Love Letter --- */
        #hearts-canvas {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 46;
        }

        .val-cupid-fly {
            position: absolute;
            top: 95px;
            left: -140px;
            width: 86px;
            height: 74px;
            pointer-events: none;
            z-index: 47;
            filter: drop-shadow(0 0 16px rgba(255, 20, 147, 0.9));
            animation: cupid-soar 22s ease-in-out infinite;
        }
        @keyframes cupid-soar {
            0% {
                transform: translate3d(0, 0, 0) rotate(8deg);
                opacity: 0;
            }
            10% { opacity: 0.95; }
            35% { transform: translate3d(35vw, 45px, 0) rotate(-6deg); }
            65% { transform: translate3d(70vw, -25px, 0) rotate(6deg); }
            90% { opacity: 0.95; }
            100% {
                transform: translate3d(calc(100vw + 160px), 25px, 0) rotate(-4deg);
                opacity: 0;
            }
        }

        .val-letter {
            position: absolute;
            top: 135px;
            right: 35px;
            width: 52px;
            height: 42px;
            pointer-events: none;
            filter: drop-shadow(0 0 10px rgba(255, 105, 180, 0.85));
            animation: letter-hover 4.2s ease-in-out infinite alternate;
        }
        @keyframes letter-hover {
            0%   { transform: translateY(0) rotate(-5deg); }
            100% { transform: translateY(-12px) rotate(6deg); }
        }

        .val-rose {
            position: absolute;
            bottom: 25px;
            left: 32px;
            width: 54px;
            height: 72px;
            pointer-events: none;
            filter: drop-shadow(0 0 14px rgba(255, 20, 147, 0.85));
            animation: rose-pulse 3.2s ease-in-out infinite alternate;
        }
        @keyframes rose-pulse {
            0%   { filter: drop-shadow(0 0 10px rgba(255, 20, 147, 0.7)); }
            100% { filter: drop-shadow(0 0 18px rgba(255, 20, 147, 1)); }
        }

        .val-heart {
            position: absolute;
            color: #FF1493;
            filter: drop-shadow(0 0 12px rgba(255, 20, 147, 0.75));
            animation: heart-pulse 2.2s ease-in-out infinite alternate;
            pointer-events: none;
        }
        .val-heart-1 { top: 90px; left: 45px; width: 34px; height: 34px; }
        .val-heart-2 { top: 115px; right: 50px; width: 28px; height: 28px; color: #FF69B4; animation-delay: 0.8s; }

        @keyframes heart-pulse {
            0%   { transform: scale(0.9) rotate(-4deg); opacity: 0.7; }
            100% { transform: scale(1.18) rotate(6deg); opacity: 1; filter: drop-shadow(0 0 16px rgba(255, 20, 147, 0.95)); }
        }

        .bot-valentine-heart {
            display: none;
            position: absolute;
            top: -15px;
            right: 4px;
            width: 28px;
            height: 24px;
            pointer-events: none;
            z-index: 105;
            filter: drop-shadow(0 0 8px rgba(255, 20, 147, 0.85));
            animation: cupid-flutter 1.8s ease-in-out infinite alternate;
        }
        [data-season="valentine"] .bot-valentine-heart { display: block; }
        @keyframes cupid-flutter {
            0%   { transform: translateY(0) scale(0.95); }
            100% { transform: translateY(-4px) scale(1.12); }
        }

        /* Scrolled navbar state (class-based for flawless theme reactivity) */
        .navbar.scrolled {
            background: var(--nav-bg-solid) !important;
            box-shadow: var(--nav-shadow), inset 0 1px 0 rgba(255,255,255,0.08) !important;
        }
        [data-theme="light"] .navbar.scrolled {
            box-shadow: var(--nav-shadow), inset 0 1px 0 rgba(255,255,255,0.95) !important;
        }

        html {
            scroll-behavior: smooth;
            overflow-x: hidden;
            max-width: 100%;
            width: 100%;
        }

        body {
            font-family: var(--font-display);
            background-color: var(--bg);
            color: var(--white);
            overflow-x: hidden;
            max-width: 100%;
            width: 100%;
            position: relative;
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
                rgba(179,78,255,0.012) 2px,
                rgba(179,78,255,0.012) 4px
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
            50%       { opacity: 0.82; text-shadow: 0 0 6px rgba(179,78,255,0.45); }
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
            0%, 100% { box-shadow: 0 0 8px rgba(179,78,255,0.35), inset 0 0 8px rgba(179,78,255,0.05); }
            50%       { box-shadow: 0 0 22px rgba(179,78,255,0.65), inset 0 0 14px rgba(179,78,255,0.08); }
        }

        @keyframes scan {
            0%   { top: -3px; }
            100% { top: 100%; }
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
            background: var(--nav-bg);
            backdrop-filter: blur(20px) saturate(1.4);
            -webkit-backdrop-filter: blur(20px) saturate(1.4);
            border: 1px solid rgba(179,78,255,0.1);
            border-radius: var(--radius-md);
            box-shadow: var(--nav-shadow), inset 0 1px 0 rgba(179,78,255,0.06);
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
            box-shadow: 0 0 8px rgba(179,78,255,0.5);
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
            gap: 12px;
        }

        /* =========================================================
           THEME TOGGLE SWITCH
        ========================================================= */
        .theme-switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 28px;
            border: 1px solid rgba(179,78,255,0.25);
            border-radius: 22px;
            cursor: pointer;
            flex-shrink: 0;
        }

        .theme-switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .theme-switch .slider {
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background-color: #1a1a2e;
            border-radius: 20px;
            transition: 0.4s;
            overflow: hidden;
            z-index: 2;
        }

        .theme-switch .slider:before {
            position: absolute;
            content: "";
            height: 20px;
            width: 20px;
            left: 3px;
            bottom: 4px;
            background-color: #ffd93d;
            transition: 0.6s;
            border-radius: 50%;
            z-index: 3;
        }

        .theme-switch .moons-hole {
            position: absolute;
            opacity: 1;
            transition: 0.6s;
            z-index: 2;
        }

        .theme-switch .moon-hole {
            position: absolute;
            border-radius: 50%;
            background-color: #555;
        }
        .theme-switch .moon-hole:nth-child(1) { height: 4px; width: 4px; top: 18px; left: 16px; }
        .theme-switch .moon-hole:nth-child(2) { height: 7px; width: 7px; top: 11px; left: 6px; }
        .theme-switch .moon-hole:nth-child(3) { height: 3px; width: 3px; top: 8px; left: 16px; }

        .theme-switch input:checked + .slider { background-color: #62cff0; }
        .theme-switch input:checked + .slider:before {
            transform: translateX(34px);
            background-color: #ff8c00;
        }
        .theme-switch input:checked + .slider .moons-hole {
            transform: translateX(34px);
            opacity: 0;
        }

        .theme-switch .stars {
            position: absolute;
            right: 4px; top: 0; bottom: 0;
            transition: 0.6s;
        }
        .theme-switch .star {
            position: absolute;
            fill: white;
            animation: star-twinkle 2s infinite;
        }
        .theme-switch .star:nth-child(1) { top: 3px; right: 20px; width: 14px; animation-delay: 0.3s; }
        .theme-switch .star:nth-child(2) { top: 12px; right: 5px; width: 10px; }
        .theme-switch .star:nth-child(3) { top: 3px; right: 10px; width: 7px; animation-delay: 0.6s; }
        .theme-switch .star:nth-child(4) { top: 18px; right: 19px; width: 8px; animation-delay: 0.9s; }
        .theme-switch .star:nth-child(5) { top: 1px; right: 34px; width: 5px; animation-delay: 1.2s; }

        .theme-switch input:checked + .slider .stars {
            transform: translateY(-24px);
            opacity: 0;
        }

        .theme-switch .clouds {
            position: absolute;
            left: 3px; top: 0; bottom: 0;
            width: 16px;
            transition: 0.6s;
            transform: translateX(-40px);
        }
        .theme-switch .cloud {
            position: absolute;
            background-color: white;
            border-radius: 50%;
            animation: cloud-move 6s infinite;
        }
        .theme-switch .cloud:nth-child(1) { top: 0; height: 14px; width: 14px; right: 10px; }
        .theme-switch .cloud:nth-child(2) { height: 17px; width: 17px; top: 10px; right: 3px; }
        .theme-switch .cloud:nth-child(3) { height: 16px; width: 16px; top: 19px; left: 2px; }
        .theme-switch .cloud:nth-child(4) { top: 17px; left: 14px; height: 12px; width: 12px; }
        .theme-switch .cloud:nth-child(5) { top: 21px; left: 22px; height: 10px; width: 10px; }
        .theme-switch .cloud:nth-child(6) { top: 19px; left: 32px; height: 8px; width: 8px; }
        .theme-switch .cloud:nth-child(7) { top: 22px; left: 40px; height: 6px; width: 6px; }

        .theme-switch input:checked + .slider .clouds {
            transform: translateX(22px);
            opacity: 1;
        }

        .theme-switch .black-clouds {
            position: absolute;
            left: 3px; top: 0; bottom: 0;
            width: 16px;
            transition: 0.6s;
            transform: translateX(-40px);
            opacity: 0;
            z-index: 0;
        }
        .theme-switch .black-cloud {
            position: absolute;
            width: 14px; height: 14px;
            background-color: #555;
            opacity: 0.6;
            border-radius: 50%;
            animation: cloud-move 6s infinite;
            animation-delay: 1s;
        }
        .theme-switch .black-cloud:nth-child(1) { top: 0; right: 2px; }
        .theme-switch .black-cloud:nth-child(2) { top: 10px; left: 6px; }
        .theme-switch .black-cloud:nth-child(3) { top: 14px; left: 19px; }

        .theme-switch input:checked + .slider .black-clouds {
            transform: translateX(22px);
            opacity: 1;
        }

        @keyframes star-twinkle {
            0% { transform: scale(1); }
            40% { transform: scale(1.2); }
            80% { transform: scale(0.8); }
            100% { transform: scale(1); }
        }

        @keyframes cloud-move {
            0% { transform: translateX(-24px); }
            40% { transform: translateX(-28px); }
            80% { transform: translateX(-20px); }
            100% { transform: translateX(-24px); }
        }

        [data-theme="light"] .theme-switch .slider {
            background-color: #c8b8d8;
        }
        [data-theme="light"] .theme-switch {
            border-color: rgba(139,48,214,0.3);
        }
        [data-theme="light"] .theme-switch .slider:before {
            background-color: #6b4c8a;
        }
        [data-theme="light"] .theme-switch input:checked + .slider {
            background-color: #87CEEB;
        }
        [data-theme="light"] .theme-switch input:checked + .slider:before {
            background-color: #ff8c00;
        }

        .btn-resume {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 18px;
            border: 1.5px solid var(--neon);
            border-radius: var(--radius-sm);
            color: var(--neon);
            font-size: 0.84rem;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.25s var(--ease-spring);
            background: transparent;
            cursor: pointer;
            font-family: var(--font-mono);
            text-shadow: var(--neon-text-glow);
            box-shadow: 0 0 10px rgba(179,78,255,0.25);
            white-space: nowrap;
        }

        .nav-cv-link {
            display: none;
        }

        .btn-resume:hover {
            background: var(--neon);
            color: var(--bg);
            text-shadow: none;
            box-shadow: 0 0 28px rgba(179,78,255,0.6);
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
            box-shadow: 0 0 6px rgba(179,78,255,0.5);
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
                radial-gradient(circle, rgba(179,78,255,0.07) 1px, transparent 1px);
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
            background: rgba(179,78,255,0.06);
            top: 15%; left: 5%;
            animation: ambient-float 12s ease-in-out infinite;
        }
        .hero-ambient-2 {
            width: 200px; height: 200px;
            background: rgba(179,78,255,0.04);
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
            text-shadow: 0 0 10px rgba(179,78,255,0.45);
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
            border-left: 2px solid rgba(179,78,255,0.25);
            padding-left: 18px;
            font-weight: 400;
        }

        /* =========================================================
           SOCIAL BUTTONS (3D hover)
        ========================================================= */
        .social-links {
            width: 100%;
            display: flex;
            justify-content: flex-start;
            align-items: center;
            gap: 10px;
            margin-top: 4px;
        }

        .social-links .child {
            width: 50px;
            height: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            transform-style: preserve-3d;
            transition: all 0.5s ease-in-out;
            border-radius: 50%;
            margin: 0 5px;
        }

        .social-links .child:hover {
            background-color: white;
            background-position: -100px 100px, -100px 100px;
            transform: rotate3d(0.5, 1, 0, 30deg);
            transform: perspective(180px) rotateX(60deg) translateY(2px);
            box-shadow: 0px 10px 10px rgb(147, 51, 234);
        }

        .social-links a {
            border: none;
            background-color: transparent;
            font-size: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            width: 100%;
            height: 100%;
        }

        .social-links a:hover {
            width: inherit;
            height: inherit;
            display: flex;
            justify-content: center;
            align-items: center;
            transform: translate3d(0px, 0px, 15px) perspective(180px) rotateX(-35deg) translateY(2px);
            border-radius: 50%;
        }

        .social-links a:active { transform: scale(0.93); }

        .hero-right {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1;
            padding: 40px;
        }

        /* New SVG Glowing Server Background */
        .hero-photo-area {
            width: 85%;
            max-width: 480px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        #svg-global {
            width: 100%;
            height: auto;
            overflow: visible;
            z-index: 1;
        }

        @keyframes fade-particles {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }

        @keyframes floatUp {
            0% { transform: translateY(0); opacity: 0; }
            10% { opacity: 1; }
            100% { transform: translateY(-40px); opacity: 0; }
        }

        #particles { animation: fade-particles 5s infinite alternate; }
        .particle { animation: floatUp linear infinite; }
        .p1 { animation-duration: 2.2s; animation-delay: 0s; }
        .p2 { animation-duration: 2.5s; animation-delay: 0.3s; }
        .p3 { animation-duration: 2s; animation-delay: 0.6s; }
        .p4 { animation-duration: 2.8s; animation-delay: 0.2s; }
        .p5 { animation-duration: 2.3s; animation-delay: 0.4s; }
        .p6 { animation-duration: 3s; animation-delay: 0.1s; }
        .p7 { animation-duration: 2.1s; animation-delay: 0.5s; }
        .p8 { animation-duration: 2.6s; animation-delay: 0.2s; }
        .p9 { animation-duration: 2.4s; animation-delay: 0.3s; }

        @keyframes bounce-lines {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-3px); }
        }

        #line-v1, #line-v2, #node-server, #panel-rigth, #reflectores, #particles {
            animation: bounce-lines 3s ease-in-out infinite alternate;
        }
        #line-v2 { animation-delay: 0.2s; }
        #node-server, #panel-rigth, #reflectores, #particles { animation-delay: 0.4s; }

        /* Floating Profile Image */
        .hero-portrait {
            position: absolute;
            top: 5%;
            width: 50%;
            aspect-ratio: 1 / 1;
            object-fit: cover;
            object-position: center top;
            border-radius: 50%;
            z-index: 2;
            border: 2px solid var(--neon);
            box-shadow: var(--neon-glow);
            animation: floatAvatar 4s ease-in-out infinite alternate;
        }

        @keyframes floatAvatar {
            0% { transform: translateY(0px); }
            100% { transform: translateY(-20px); }
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
            background: radial-gradient(circle, rgba(179,78,255,0.04) 0%, transparent 70%);
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
            border: 1px solid rgba(179,78,255,0.15);
            background: var(--bg-card);
        }

        .exp-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 0 28px rgba(179,78,255,0.2), 0 24px 48px rgba(0,0,0,0.55);
            border-color: rgba(179,78,255,0.5);
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
            border-top: 1px solid rgba(179,78,255,0.08);
        }

        .exp-card-name {
            font-size: 1.05rem;
            font-weight: 700;
            margin-bottom: 10px;
            color: var(--neon);
            text-shadow: 0 0 8px rgba(179,78,255,0.35);
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
            border: 1px solid rgba(179,78,255,0.3);
            border-radius: 999px;
            font-size: clamp(0.82rem, 1.3vw, 0.95rem);
            font-weight: 500;
            color: var(--neon);
            white-space: nowrap;
            flex-shrink: 0;
            background: rgba(179,78,255,0.04);
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
            background: linear-gradient(110deg, transparent 30%, rgba(179,78,255,0.12) 50%, transparent 70%);
            background-size: 200% 100%;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .skill-pill:hover {
            background: rgba(179,78,255,0.12);
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
            border-bottom: 1px solid rgba(179,78,255,0.08);
            display: flex;
            align-items: flex-start;
            gap: 14px;
            font-size: 0.92rem;
            color: var(--off-white);
            line-height: 1.55;
            transition: border-color 0.3s, padding-left 0.3s;
        }

        .edu-item:hover {
            border-color: rgba(179,78,255,0.35);
            padding-left: 6px;
        }

        .edu-dot {
            width: 7px; height: 7px;
            background: var(--neon);
            border-radius: 50%;
            margin-top: 8px;
            flex-shrink: 0;
            box-shadow: 0 0 8px rgba(179,78,255,0.7);
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
            border: 1px solid rgba(179,78,255,0.12);
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
            box-shadow: 0 0 35px rgba(179,78,255,0.15), 0 24px 48px rgba(0,0,0,0.55);
            border-color: rgba(179,78,255,0.5);
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
            border-top: 1px solid rgba(179,78,255,0.06);
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
            color: rgba(179,78,255,0.45);
            transition: color 0.25s, text-shadow 0.25s;
            font-family: var(--font-mono);
        }

        .proj-card:hover .proj-link {
            color: var(--neon);
            text-shadow: 0 0 10px rgba(179,78,255,0.55);
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
            .navbar {
                top: 10px;
                left: 12px;
                right: 12px;
                padding: 10px 14px;
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 6px;
            }
            .nav-links {
                display: none;
                position: fixed;
                top: 68px; left: 12px; right: 12px;
                background: var(--nav-bg-solid);
                backdrop-filter: blur(20px);
                flex-direction: column;
                gap: 0;
                padding: 12px 0 20px;
                border: 1px solid rgba(179,78,255,0.12);
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
            .nav-cv-link {
                display: block !important;
                color: var(--neon) !important;
                font-weight: 700;
                border-top: 1px solid rgba(179,78,255,0.15);
                margin-top: 6px;
                padding-top: 16px !important;
            }
            .hamburger {
                display: flex;
                flex-shrink: 0;
                margin-left: 2px;
            }
            .nav-right {
                margin-left: auto;
                margin-right: 4px;
                gap: 6px;
                display: flex;
                align-items: center;
            }
            .nav-right .btn-resume { display: none; }
            .theme-switch {
                transform: scale(0.88);
                transform-origin: right center;
            }

            #about {
                grid-template-columns: 1fr;
                grid-template-rows: auto auto;
                padding-top: 80px;
                width: 100%;
                max-width: 100%;
            }
            .hero-left {
                order: 2;
                padding: 36px 20px 50px;
                width: 100%;
                max-width: 100%;
            }
            .hero-left::before { display: none; }
            .hero-right {
                order: 1;
                height: auto;
                padding: 15px 20px 10px;
                max-height: none;
                width: 100%;
                max-width: 100%;
            }
            .hero-photo-area {
                width: 55%;
                max-width: 200px;
            }
            .hero-portrait {
                top: 3%;
                width: 40%;
            }
            .hero-name { font-size: 2.1rem; }
            .hero-bio { max-width: 100%; font-size: 0.88rem; }

            #experience {
                padding: 70px 20px;
                width: 100%;
                max-width: 100%;
            }
            .experience-cards {
                gap: 16px;
                width: 100%;
                max-width: 100%;
            }
            .exp-card {
                flex: 1 1 100% !important;
                max-width: 100% !important;
                min-width: 0 !important;
            }

            #skills {
                padding: 70px 20px;
                width: 100%;
                max-width: 100%;
            }
            .skill-pill { padding: 9px 18px; font-size: 0.82rem; }
            .marquee-wrapper { width: 100%; max-width: 100%; }

            #education {
                padding: 70px 20px;
                width: 100%;
                max-width: 100%;
            }
            .education-grid {
                grid-template-columns: 1fr;
                gap: 4px;
                width: 100%;
            }

            #projects {
                padding: 70px 20px;
                width: 100%;
                max-width: 100%;
            }
            .projects-grid {
                grid-template-columns: 1fr !important;
                gap: 16px;
                width: 100%;
                max-width: 100%;
            }
        }

        @media (max-width: 480px) {
            .navbar { padding: 8px 12px; }
            .nav-right { gap: 4px; }
            .theme-switch { transform: scale(0.82); }
            .hero-right { padding: 12px 16px 8px; }
            .hero-photo-area { width: 50%; max-width: 170px; }
            .hero-portrait { width: 44%; }
            #about { padding-top: 68px; }
        }

        /* =========================================================
           FOOTER
        ========================================================= */
        footer {
            text-align: center;
            padding: 48px 24px;
            border-top: 1px solid rgba(179,78,255,0.08);
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
            text-shadow: 0 0 8px rgba(179,78,255,0.5);
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
            z-index: 9999;
            box-shadow: var(--neon-glow);
            transition: transform 0.25s var(--ease-spring), box-shadow 0.25s;
        }

        #chat-btn:hover {
            transform: scale(1.12);
            box-shadow: 0 0 24px rgba(179,78,255,0.75);
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
            transform-origin: 1px 18px;
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
            border: 1px solid rgba(179,78,255,0.3);
            border-radius: var(--radius-lg);
            box-shadow: 0 12px 40px rgba(0,0,0,0.75), 0 0 20px rgba(179,78,255,0.1);
            z-index: 10000;
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
            background: rgba(179,78,255,0.06);
            border-bottom: 1px solid rgba(179,78,255,0.15);
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
            background: rgba(179,78,255,0.12);
            border: 1px solid rgba(179,78,255,0.35);
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
            border-top: 1px solid rgba(179,78,255,0.15);
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

        #chat-input:focus { border-color: var(--neon); box-shadow: 0 0 8px rgba(179,78,255,0.15); }

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

        @media (max-width: 768px) {
            #chat-btn {
                display: flex !important;
                visibility: visible !important;
                opacity: 1 !important;
                bottom: calc(20px + env(safe-area-inset-bottom, 0px)) !important;
                right: calc(18px + env(safe-area-inset-right, 0px)) !important;
                width: 56px !important;
                height: 56px !important;
                z-index: 9999 !important;
            }
            #chat-window {
                bottom: calc(86px + env(safe-area-inset-bottom, 0px)) !important;
                right: calc(14px + env(safe-area-inset-right, 0px)) !important;
                left: calc(14px + env(safe-area-inset-left, 0px)) !important;
                width: auto !important;
                max-width: calc(100vw - 28px) !important;
                height: 440px !important;
                max-height: 72vh !important;
                z-index: 10000 !important;
            }
        }

        @media (max-width: 480px) {
            #chat-btn {
                bottom: calc(18px + env(safe-area-inset-bottom, 0px)) !important;
                right: calc(16px + env(safe-area-inset-right, 0px)) !important;
                width: 52px !important;
                height: 52px !important;
            }
            #chat-window {
                bottom: calc(80px + env(safe-area-inset-bottom, 0px)) !important;
                height: 420px !important;
                max-height: 75vh !important;
            }
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
         SEASONAL DECORATIONS (Halloween & Christmas)
    =================================================== -->
    <div id="seasonal-decorations" aria-hidden="true">
        <!-- Halloween Layer -->
        <div class="decor-halloween">
            <!-- Corner Spiderweb Left -->
            <svg class="h-web h-web-left" viewBox="0 0 120 120" fill="none">
                <path d="M0,0 L120,0 M0,0 L105,55 M0,0 L85,85 M0,0 L55,105 M0,0 L0,120" stroke="currentColor" stroke-width="1.4" opacity="0.6"/>
                <path d="M30,0 Q30,30 0,30 M60,0 Q60,60 0,60 M90,0 Q90,90 0,90 M115,0 Q115,115 0,115" stroke="currentColor" stroke-width="1.2" fill="none" opacity="0.5"/>
                <circle cx="8" cy="8" r="1.5" fill="currentColor"/>
            </svg>

            <!-- Corner Spiderweb Right -->
            <svg class="h-web h-web-right" viewBox="0 0 120 120" fill="none">
                <path d="M120,0 L0,0 M120,0 L15,55 M120,0 L35,85 M120,0 L65,105 M120,0 L120,120" stroke="currentColor" stroke-width="1.4" opacity="0.6"/>
                <path d="M90,0 Q90,30 120,30 M60,0 Q60,60 120,60 M30,0 Q30,90 120,90 M5,0 Q5,115 120,115" stroke="currentColor" stroke-width="1.2" fill="none" opacity="0.5"/>
                <circle cx="112" cy="8" r="1.5" fill="currentColor"/>
            </svg>

            <!-- Hanging Animated Spider -->
            <div class="h-spider-hang">
                <div class="h-thread"></div>
                <svg class="h-spider" viewBox="0 0 40 40" fill="none">
                    <path d="M15,18 Q8,12 5,16 M25,18 Q32,12 35,16 M14,21 Q6,20 4,25 M26,21 Q34,20 36,25 M14,24 Q7,28 6,33 M26,24 Q33,28 34,33 M15,26 Q9,33 11,38 M25,26 Q31,33 29,38" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
                    <ellipse cx="20" cy="18" rx="4.2" ry="3.8" fill="#130910" stroke="currentColor" stroke-width="1.6"/>
                    <circle cx="20" cy="25" r="5.6" fill="#130910" stroke="currentColor" stroke-width="1.6"/>
                    <circle cx="18.5" cy="17.5" r="1" fill="#FF7518"/>
                    <circle cx="21.5" cy="17.5" r="1" fill="#FF7518"/>
                </svg>
            </div>

            <!-- Casper-style Full Screen Flying Ghosts -->
            <div class="h-casper-ghost h-casper-1">
                <svg viewBox="0 0 70 80" fill="none">
                    <path d="M35,6 C18,6 12,20 12,34 C12,48 8,56 12,65 C16,72 22,64 27,68 C32,72 37,64 42,68 C47,72 52,65 56,66 C62,58 58,48 58,34 C58,20 52,6 35,6 Z" fill="rgba(255,117,24,0.12)" stroke="#FF7518" stroke-width="2.2"/>
                    <ellipse cx="27" cy="30" rx="3.5" ry="5" fill="#FF7518"/>
                    <ellipse cx="43" cy="30" rx="3.5" ry="5" fill="#FF7518"/>
                    <circle cx="28" cy="28.5" r="1.2" fill="#ffffff"/>
                    <circle cx="44" cy="28.5" r="1.2" fill="#ffffff"/>
                    <path d="M30,42 Q35,48 40,42" stroke="#FF7518" stroke-width="2" stroke-linecap="round" fill="none"/>
                    <path d="M12,36 Q4,30 6,24" stroke="#FF7518" stroke-width="2" stroke-linecap="round" fill="none"/>
                    <path d="M58,36 Q66,30 64,24" stroke="#FF7518" stroke-width="2" stroke-linecap="round" fill="none"/>
                </svg>
            </div>
            <div class="h-casper-ghost h-casper-2">
                <svg viewBox="0 0 65 75" fill="none">
                    <path d="M32,6 C16,6 10,18 10,32 C10,46 6,52 10,60 C14,66 20,58 24,62 C29,66 34,58 39,62 C44,66 48,60 52,61 C57,54 54,46 54,32 C54,18 48,6 32,6 Z" fill="rgba(179,78,255,0.12)" stroke="#B34EFF" stroke-width="2.2"/>
                    <ellipse cx="25" cy="28" rx="3.2" ry="4.5" fill="#B34EFF"/>
                    <ellipse cx="39" cy="28" rx="3.2" ry="4.5" fill="#B34EFF"/>
                    <circle cx="26" cy="26.8" r="1" fill="#ffffff"/>
                    <circle cx="40" cy="26.8" r="1" fill="#ffffff"/>
                    <path d="M28,39 Q32,44 36,39" stroke="#B34EFF" stroke-width="2" stroke-linecap="round" fill="none"/>
                </svg>
            </div>

            <!-- Flying Bats Flock across sky -->
            <div class="h-bat-flock">
                <svg class="h-bat h-bat-1" viewBox="0 0 34 20" fill="none">
                    <path d="M17,10 Q12,2 4,5 Q2,14 10,13 Q13,16 17,13 Q21,16 24,13 Q32,14 30,5 Q22,2 17,10 Z" fill="#130910" stroke="#FF7518" stroke-width="1.4"/>
                    <circle cx="15" cy="10" r="1" fill="#FF7518"/>
                    <circle cx="19" cy="10" r="1" fill="#FF7518"/>
                </svg>
                <svg class="h-bat h-bat-2" viewBox="0 0 34 20" fill="none">
                    <path d="M17,10 Q12,2 4,5 Q2,14 10,13 Q13,16 17,13 Q21,16 24,13 Q32,14 30,5 Q22,2 17,10 Z" fill="#130910" stroke="#FF7518" stroke-width="1.4"/>
                </svg>
                <svg class="h-bat h-bat-3" viewBox="0 0 34 20" fill="none">
                    <path d="M17,10 Q12,2 4,5 Q2,14 10,13 Q13,16 17,13 Q21,16 24,13 Q32,14 30,5 Q22,2 17,10 Z" fill="#130910" stroke="#FF7518" stroke-width="1.4"/>
                </svg>
            </div>

            <!-- Floating Neon Ghost 1 (Left) -->
            <div class="h-ghost h-ghost-1">
                <svg viewBox="0 0 60 70" fill="none">
                    <path d="M30 6 C16 6 12 18 12 30 C12 44 10 52 14 58 C18 64 22 56 26 60 C30 64 34 56 38 60 C42 64 46 56 50 58 C54 52 48 44 48 30 C48 18 44 6 30 6 Z" fill="rgba(255,117,24,0.08)" stroke="currentColor" stroke-width="2"/>
                    <ellipse cx="23" cy="28" rx="2.5" ry="3.8" fill="currentColor"/>
                    <ellipse cx="37" cy="28" rx="2.5" ry="3.8" fill="currentColor"/>
                    <ellipse cx="30" cy="39" rx="2.2" ry="3.2" fill="currentColor"/>
                </svg>
            </div>

            <!-- Floating Neon Ghost 2 (Right) -->
            <div class="h-ghost h-ghost-2">
                <svg viewBox="0 0 52 62" fill="none">
                    <path d="M26 5 C14 5 10 16 10 26 C10 38 8 45 12 50 C15 55 18 48 21 52 C25 56 28 49 32 53 C36 56 39 49 43 51 C46 45 42 38 42 26 C42 16 38 5 26 5 Z" fill="rgba(179,78,255,0.08)" stroke="#B34EFF" stroke-width="2"/>
                    <ellipse cx="20" cy="24" rx="2.2" ry="3.4" fill="#B34EFF"/>
                    <ellipse cx="32" cy="24" rx="2.2" ry="3.4" fill="#B34EFF"/>
                    <ellipse cx="26" cy="34" rx="2" ry="2.8" fill="#B34EFF"/>
                </svg>
            </div>

            <!-- Glowing Carved Jack-o'-Lantern Pumpkin -->
            <div class="h-pumpkin" title="Happy Halloween!">
                <svg viewBox="0 0 54 48" fill="none">
                    <path d="M27,10 Q30,2 34,4" stroke="#00F5A0" stroke-width="2.6" stroke-linecap="round"/>
                    <ellipse cx="27" cy="28" rx="22" ry="16" fill="#180b08" stroke="currentColor" stroke-width="2"/>
                    <ellipse cx="27" cy="28" rx="13" ry="16" fill="none" stroke="currentColor" stroke-width="1.2" opacity="0.6"/>
                    <polygon points="19,22 15,28 23,28" fill="currentColor" class="pumpkin-glow"/>
                    <polygon points="35,22 31,28 39,28" fill="currentColor" class="pumpkin-glow"/>
                    <polygon points="27,29 25,32 29,32" fill="currentColor" class="pumpkin-glow"/>
                    <path d="M17,35 L21,38 L24,36 L27,39 L30,36 L33,38 L37,35 Q27,43 17,35 Z" fill="currentColor" class="pumpkin-glow"/>
                </svg>
            </div>

            <!-- Second Laughing Pumpkin & Spooky Tombstone -->
            <div class="h-pumpkin-2" title="Spooky vibes!">
                <svg viewBox="0 0 54 48" fill="none">
                    <path d="M27,10 Q24,2 20,4" stroke="#00F5A0" stroke-width="2.6" stroke-linecap="round"/>
                    <ellipse cx="27" cy="28" rx="22" ry="16" fill="#180b08" stroke="#FF7518" stroke-width="2"/>
                    <path d="M17,23 L23,23 L20,28 Z" fill="#FF7518" class="pumpkin-glow"/>
                    <path d="M31,23 L37,23 L34,28 Z" fill="#FF7518" class="pumpkin-glow"/>
                    <path d="M18,34 Q27,42 36,34 Q27,37 18,34 Z" fill="#FF7518" class="pumpkin-glow"/>
                </svg>
            </div>
            <div class="h-tombstone">
                <svg viewBox="0 0 42 50" fill="none">
                    <path d="M4,48 L4,18 Q4,4 21,4 Q38,4 38,18 L38,48 Z" fill="#120914" stroke="#B34EFF" stroke-width="1.8"/>
                    <text x="21" y="26" text-anchor="middle" font-size="9" font-family="monospace" font-weight="700" fill="#B34EFF" letter-spacing="1">RIP</text>
                    <line x1="12" y1="34" x2="30" y2="34" stroke="#B34EFF" stroke-width="1.2" opacity="0.6"/>
                    <line x1="21" y1="31" x2="21" y2="40" stroke="#B34EFF" stroke-width="1.2" opacity="0.6"/>
                </svg>
            </div>
        </div>

        <!-- Christmas Layer -->
        <div class="decor-christmas">
            <canvas id="snow-canvas"></canvas>

            <!-- Flying Santa with Reindeer Sleigh across the sky -->
            <div class="c-santa-sleigh" title="Merry Christmas!">
                <svg viewBox="0 0 270 60" fill="none">
                    <!-- Reindeer 1 -->
                    <g transform="translate(180, 10)">
                        <path d="M38,6 L42,1 M40,4 L44,4 M38,6 L35,1" stroke="#FFD700" stroke-width="1.2" stroke-linecap="round"/>
                        <ellipse cx="36" cy="11" rx="5" ry="3.5" fill="#08121f" stroke="#00F5A0" stroke-width="1.2"/>
                        <circle cx="41" cy="12" r="1.2" fill="#FF2253"/>
                        <ellipse cx="24" cy="17" rx="9" ry="5.5" fill="#08121f" stroke="#00F5A0" stroke-width="1.2"/>
                        <path d="M28,22 L32,32 M22,22 L17,31 M30,21 L35,30 M19,21 L14,29" stroke="#00F5A0" stroke-width="1.2" stroke-linecap="round"/>
                    </g>
                    <!-- Reindeer 2 -->
                    <g transform="translate(110, 12)">
                        <path d="M38,6 L42,1 M40,4 L44,4 M38,6 L35,1" stroke="#FFD700" stroke-width="1.2" stroke-linecap="round"/>
                        <ellipse cx="36" cy="11" rx="5" ry="3.5" fill="#08121f" stroke="#00F5A0" stroke-width="1.2"/>
                        <circle cx="41" cy="12" r="1" fill="#FFD700"/>
                        <ellipse cx="24" cy="17" rx="9" ry="5.5" fill="#08121f" stroke="#00F5A0" stroke-width="1.2"/>
                        <path d="M28,22 L32,32 M22,22 L17,31 M30,21 L35,30 M19,21 L14,29" stroke="#00F5A0" stroke-width="1.2" stroke-linecap="round"/>
                    </g>
                    <path d="M68,26 Q110,18 145,24 Q180,18 215,22" stroke="#FFD700" stroke-width="1" stroke-dasharray="3,2" opacity="0.8"/>
                    <!-- Santa Sleigh -->
                    <g transform="translate(10, 8)">
                        <path d="M5,42 Q28,45 62,42 Q70,41 72,36" stroke="#FFD700" stroke-width="2" stroke-linecap="round"/>
                        <path d="M8,36 Q22,38 60,36 Q66,35 68,26 Q52,28 32,24 Q18,22 10,34 Z" fill="#071321" stroke="#FF2253" stroke-width="2"/>
                        <ellipse cx="38" cy="20" rx="7" ry="6" fill="#FF2253" stroke="#FF6888" stroke-width="1.2"/>
                        <circle cx="38" cy="12" r="4.5" fill="#ffffff" stroke="#FF2253" stroke-width="1"/>
                        <path d="M34,10 Q38,2 45,7 Z" fill="#FF2253"/>
                        <circle cx="45" cy="7" r="1.5" fill="#ffffff"/>
                        <ellipse cx="22" cy="26" rx="8" ry="7" fill="#00F5A0" stroke="#FFD700" stroke-width="1.2"/>
                    </g>
                </svg>
            </div>

            <!-- Glowing Neon Decorated Christmas Tree -->
            <div class="c-christmas-tree" title="O Christmas Tree!">
                <svg viewBox="0 0 78 110" fill="none">
                    <polygon points="39,2 41.5,8 48,8.5 43,13 44.5,19 39,15.5 33.5,19 35,13 30,8.5 36.5,8" fill="#FFD700" stroke="#FFE266" stroke-width="1"/>
                    <path d="M39,18 L51,34 L44,34 L57,52 L49,52 L64,74 L14,74 L29,52 L21,52 L34,34 L27,34 Z" fill="#07171d" stroke="#00F5A0" stroke-width="2"/>
                    <path d="M39,22 L47,33 L41,33 L52,49 L46,49 L58,70 L20,70 L32,49 L26,49 L37,33 L31,33 Z" stroke="#00D2FF" stroke-width="1" opacity="0.4"/>
                    <circle cx="34" cy="28" r="2.2" class="c-tree-light-1"/>
                    <circle cx="44" cy="32" r="2.2" class="c-tree-light-2"/>
                    <circle cx="30" cy="44" r="2.2" class="c-tree-light-3"/>
                    <circle cx="48" cy="46" r="2.2" class="c-tree-light-1"/>
                    <circle cx="38" cy="42" r="2.2" class="c-tree-light-2"/>
                    <circle cx="26" cy="62" r="2.5" class="c-tree-light-2"/>
                    <circle cx="39" cy="58" r="2.5" class="c-tree-light-3"/>
                    <circle cx="52" cy="64" r="2.5" class="c-tree-light-1"/>
                    <rect x="35" y="74" width="8" height="12" fill="#2d1d12" stroke="#FFD700" stroke-width="1"/>
                    <g transform="translate(16, 82)">
                        <rect x="0" y="4" width="16" height="14" rx="2" fill="#FF2253" stroke="#FFD700" stroke-width="1"/>
                        <line x1="8" y1="4" x2="8" y2="18" stroke="#FFD700" stroke-width="1.2"/>
                        <line x1="0" y1="11" x2="16" y2="11" stroke="#FFD700" stroke-width="1.2"/>
                    </g>
                    <g transform="translate(42, 80)">
                        <rect x="0" y="4" width="18" height="16" rx="2" fill="#00F5A0" stroke="#FF2253" stroke-width="1"/>
                        <line x1="9" y1="4" x2="9" y2="20" stroke="#FF2253" stroke-width="1.2"/>
                        <line x1="0" y1="12" x2="18" y2="12" stroke="#FF2253" stroke-width="1.2"/>
                    </g>
                </svg>
            </div>

            <!-- Hanging Baubles & Candy Cane -->
            <div class="c-hanging-ornaments">
                <div class="c-bauble-hang">
                    <line x1="12" y1="0" x2="12" y2="40" stroke="rgba(255,34,83,0.7)" stroke-width="1"/>
                    <circle cx="12" cy="48" r="8" fill="#071321" stroke="#FF2253" stroke-width="1.6"/>
                    <circle cx="10" cy="46" r="2" fill="#ffffff" opacity="0.6"/>
                </div>
                <div class="c-bauble-hang">
                    <line x1="10" y1="0" x2="10" y2="60" stroke="rgba(0,245,160,0.7)" stroke-width="1"/>
                    <path d="M10,60 L10,80 Q10,92 18,92 Q26,92 26,82" stroke="#ffffff" stroke-width="3.5" fill="none" stroke-linecap="round"/>
                    <path d="M10,60 L10,80 Q10,92 18,92 Q26,92 26,82" stroke="#FF2253" stroke-width="3.5" fill="none" stroke-dasharray="4,4" stroke-linecap="round"/>
                </div>
                <div class="c-bauble-hang">
                    <line x1="12" y1="0" x2="12" y2="48" stroke="rgba(255,215,0,0.7)" stroke-width="1"/>
                    <circle cx="12" cy="56" r="7.5" fill="#071321" stroke="#FFD700" stroke-width="1.6"/>
                    <circle cx="10" cy="54" r="1.8" fill="#ffffff" opacity="0.6"/>
                </div>
            </div>

            <div class="c-flake c-flake-1">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                    <line x1="12" y1="2" x2="12" y2="22"/>
                    <line x1="2" y1="12" x2="22" y2="12"/>
                    <line x1="4.93" y1="4.93" x2="19.07" y2="19.07"/>
                    <line x1="4.93" y1="19.07" x2="19.07" y2="4.93"/>
                    <circle cx="12" cy="12" r="3.2" stroke="currentColor" stroke-width="1.2"/>
                </svg>
            </div>
            <div class="c-flake c-flake-2">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                    <line x1="12" y1="2" x2="12" y2="22"/>
                    <line x1="2" y1="12" x2="22" y2="12"/>
                    <line x1="4.93" y1="4.93" x2="19.07" y2="19.07"/>
                    <line x1="4.93" y1="19.07" x2="19.07" y2="4.93"/>
                </svg>
            </div>
        </div>

        <!-- New Year Layer -->
        <div class="decor-newyear">
            <canvas id="fireworks-canvas"></canvas>

            <!-- Clinking Neon Champagne Flutes -->
            <div class="ny-champagne" title="Cheers to the New Year!">
                <svg viewBox="0 0 68 64" fill="none">
                    <g transform="translate(10, 10) rotate(-14)">
                        <path d="M6,2 L14,2 L12,18 Q10,24 10,32 L6,32 L6,2 Z" fill="rgba(255,215,0,0.15)" stroke="#FFD700" stroke-width="1.4"/>
                        <line x1="8" y1="32" x2="8" y2="48" stroke="#FFD700" stroke-width="1.4"/>
                        <line x1="3" y1="48" x2="13" y2="48" stroke="#FFD700" stroke-width="1.8" stroke-linecap="round"/>
                        <circle cx="9" cy="12" r="1" fill="#00F0FF"/>
                        <circle cx="7" cy="18" r="1.2" fill="#00F0FF"/>
                    </g>
                    <g transform="translate(42, 8) rotate(14)">
                        <path d="M6,2 L14,2 L12,18 Q10,24 10,32 L6,32 L6,2 Z" fill="rgba(255,215,0,0.15)" stroke="#FFD700" stroke-width="1.4"/>
                        <line x1="8" y1="32" x2="8" y2="48" stroke="#FFD700" stroke-width="1.4"/>
                        <line x1="3" y1="48" x2="13" y2="48" stroke="#FFD700" stroke-width="1.8" stroke-linecap="round"/>
                        <circle cx="8" cy="14" r="1.1" fill="#00F0FF"/>
                        <circle cx="10" cy="20" r="0.9" fill="#00F0FF"/>
                    </g>
                    <circle cx="34" cy="16" r="2.5" fill="#ffffff" filter="drop-shadow(0 0 6px #FFD700)"/>
                    <line x1="34" y1="9" x2="34" y2="23" stroke="#FFD700" stroke-width="1"/>
                    <line x1="27" y1="16" x2="41" y2="16" stroke="#FFD700" stroke-width="1"/>
                </svg>
            </div>

            <!-- Hanging Mirrored Neon Disco Ball -->
            <div class="ny-disco-hang">
                <line x1="22" y1="0" x2="22" y2="35" stroke="rgba(255,215,0,0.6)" stroke-width="1"/>
                <svg class="ny-disco-ball" viewBox="0 0 44 44" fill="none">
                    <circle cx="22" cy="22" r="18" fill="#120e05" stroke="#FFD700" stroke-width="2"/>
                    <ellipse cx="22" cy="22" rx="10" ry="18" stroke="#00F0FF" stroke-width="0.8" opacity="0.7"/>
                    <ellipse cx="22" cy="22" rx="18" ry="10" stroke="#00F0FF" stroke-width="0.8" opacity="0.7"/>
                    <line x1="4" y1="22" x2="40" y2="22" stroke="#FFD700" stroke-width="0.8"/>
                    <line x1="22" y1="4" x2="22" y2="40" stroke="#FFD700" stroke-width="0.8"/>
                </svg>
            </div>

            <div class="ny-sparkle ny-sparkle-1">
                <svg viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 0L14.59 9.41L24 12L14.59 14.59L12 24L9.41 14.59L0 12L9.41 9.41L12 0Z"/>
                </svg>
            </div>
            <div class="ny-sparkle ny-sparkle-2">
                <svg viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 0L14.59 9.41L24 12L14.59 14.59L12 24L9.41 14.59L0 12L9.41 9.41L12 0Z"/>
                </svg>
            </div>
        </div>

        <!-- Valentine's Day Layer -->
        <div class="decor-valentine">
            <canvas id="hearts-canvas"></canvas>

            <!-- Flying Cupid Angel across the screen -->
            <div class="val-cupid-fly" title="Love is in the air!">
                <svg viewBox="0 0 86 74" fill="none">
                    <path d="M30,32 Q14,14 18,4 Q28,6 34,22" fill="rgba(255,105,180,0.2)" stroke="#FF69B4" stroke-width="1.6"/>
                    <path d="M48,32 Q64,14 60,4 Q50,6 44,22" fill="rgba(255,105,180,0.2)" stroke="#FF69B4" stroke-width="1.6"/>
                    <ellipse cx="39" cy="38" rx="8" ry="10" fill="#150611" stroke="#FF1493" stroke-width="1.8"/>
                    <circle cx="39" cy="24" r="7" fill="#150611" stroke="#FF1493" stroke-width="1.8"/>
                    <path d="M52,22 Q62,34 52,46" stroke="#FFD700" stroke-width="2" fill="none" stroke-linecap="round"/>
                    <line x1="38" y1="34" x2="62" y2="34" stroke="#FF69B4" stroke-width="1.6"/>
                    <path d="M66,34 L62,31 L63,34 L62,37 Z" fill="#FF1493"/>
                </svg>
            </div>

            <!-- Fluttering Love Letter Envelope with Wings -->
            <div class="val-letter" title="You've got love!">
                <svg viewBox="0 0 52 42" fill="none">
                    <path d="M12,18 Q2,10 6,4 Q12,6 14,14" fill="rgba(255,105,180,0.25)" stroke="#FF69B4" stroke-width="1.2"/>
                    <path d="M40,18 Q50,10 46,4 Q40,6 38,14" fill="rgba(255,105,180,0.25)" stroke="#FF69B4" stroke-width="1.2"/>
                    <rect x="10" y="14" width="32" height="22" rx="3" fill="#150611" stroke="#FF1493" stroke-width="1.6"/>
                    <polyline points="10,14 26,27 42,14" stroke="#FF1493" stroke-width="1.4"/>
                    <path d="M26,29 C24.5,27.5 22,27.5 22,29 C22,30.5 26,33 26,33 C26,33 30,30.5 30,29 C30,27.5 27.5,27.5 26,29 Z" fill="#FF1493"/>
                </svg>
            </div>

            <!-- Glowing Neon Blooming Rose -->
            <div class="val-rose" title="A rose for you">
                <svg viewBox="0 0 54 72" fill="none">
                    <path d="M27,38 Q29,54 26,68" stroke="#00F5A0" stroke-width="2.2" stroke-linecap="round"/>
                    <path d="M28,48 Q38,44 39,52 Q32,56 28,52" fill="rgba(0,245,160,0.2)" stroke="#00F5A0" stroke-width="1.4"/>
                    <path d="M27,56 Q17,52 16,60 Q23,64 27,60" fill="rgba(0,245,160,0.2)" stroke="#00F5A0" stroke-width="1.4"/>
                    <path d="M27,12 Q20,12 18,22 Q16,34 27,38 Q38,34 36,22 Q34,12 27,12 Z" fill="#1a0410" stroke="#FF1493" stroke-width="2"/>
                    <path d="M27,16 Q23,16 22,24 Q24,32 27,33 Q30,32 32,24 Q31,16 27,16 Z" stroke="#FF69B4" stroke-width="1.4" fill="none"/>
                    <path d="M27,20 Q25,20 25,25 Q26,29 27,29 Q28,29 29,25 Q29,20 27,20 Z" fill="#FF1493"/>
                </svg>
            </div>

            <div class="val-heart val-heart-1">
                <svg viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                </svg>
            </div>
            <div class="val-heart val-heart-2">
                <svg viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                </svg>
            </div>
        </div>
    </div>

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
            <li><a href="{{ url('/download-cv') }}" download="Rey_Buban_Curriculum_Vitae.pdf" id="nav-cv-mobile" class="nav-cv-link">Curriculum Vitae (PDF)</a></li>
        </ul>

        <div class="nav-right">
            <!-- Seasonal Theme Switcher -->
            <button type="button" class="btn-season" id="btn-season" aria-label="Switch seasonal theme" title="Cycle seasonal theme: Auto (Date) → 🎃 Halloween → 🎄 Christmas → ⚡ Default">
                <span class="season-btn-icon" id="season-btn-icon">⚡</span>
                <span class="season-btn-text" id="season-btn-text">Season</span>
            </button>

            <label class="theme-switch" aria-label="Toggle dark/light mode">
                <input type="checkbox" id="theme-toggle" />
                <span class="slider">
                    <div class="moons-hole">
                        <div class="moon-hole"></div>
                        <div class="moon-hole"></div>
                        <div class="moon-hole"></div>
                    </div>
                    <div class="stars">
                        <svg class="star" viewBox="0 0 20 20"><path d="M 0 10 C 10 10,10 10 ,0 10 C 10 10 , 10 10 , 10 20 C 10 10 , 10 10 , 20 10 C 10 10 , 10 10 , 10 0 C 10 10,10 10 ,0 10 Z"></path></svg>
                        <svg class="star" viewBox="0 0 20 20"><path d="M 0 10 C 10 10,10 10 ,0 10 C 10 10 , 10 10 , 10 20 C 10 10 , 10 10 , 20 10 C 10 10 , 10 10 , 10 0 C 10 10,10 10 ,0 10 Z"></path></svg>
                        <svg class="star" viewBox="0 0 20 20"><path d="M 0 10 C 10 10,10 10 ,0 10 C 10 10 , 10 10 , 10 20 C 10 10 , 10 10 , 20 10 C 10 10 , 10 10 , 10 0 C 10 10,10 10 ,0 10 Z"></path></svg>
                        <svg class="star" viewBox="0 0 20 20"><path d="M 0 10 C 10 10,10 10 ,0 10 C 10 10 , 10 10 , 10 20 C 10 10 , 10 10 , 20 10 C 10 10 , 10 10 , 10 0 C 10 10,10 10 ,0 10 Z"></path></svg>
                        <svg class="star" viewBox="0 0 20 20"><path d="M 0 10 C 10 10,10 10 ,0 10 C 10 10 , 10 10 , 10 20 C 10 10 , 10 10 , 20 10 C 10 10 , 10 10 , 10 0 C 10 10,10 10 ,0 10 Z"></path></svg>
                    </div>
                    <div class="clouds">
                        <div class="cloud"></div>
                        <div class="cloud"></div>
                        <div class="cloud"></div>
                        <div class="cloud"></div>
                        <div class="cloud"></div>
                        <div class="cloud"></div>
                        <div class="cloud"></div>
                    </div>
                    <div class="black-clouds">
                        <div class="black-cloud"></div>
                        <div class="black-cloud"></div>
                        <div class="black-cloud"></div>
                    </div>
                </span>
            </label>
            <a href="{{ url('/download-cv') }}" class="btn-resume" id="btn-resume" download="Rey_Buban_Curriculum_Vitae.pdf" aria-label="Download Curriculum Vitae (PDF)" title="Download Curriculum Vitae (PDF)">
                Curriculum Vitae
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
                <div class="child">
                    <a href="https://www.linkedin.com/in/rey-buban-a82057334/" target="_blank" rel="noopener"
                       aria-label="LinkedIn profile">
                        <svg xmlns="http://www.w3.org/2000/svg" height="1.3em" viewBox="0 0 24 24" fill="#0a66c2">
                            <path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"/>
                            <circle cx="4" cy="4" r="2" fill="#0a66c2"/>
                        </svg>
                    </a>
                </div>

                <div class="child">
                    <a href="https://www.facebook.com/reybuban11" target="_blank" rel="noopener"
                       aria-label="Facebook profile">
                        <svg xmlns="http://www.w3.org/2000/svg" height="1.3em" viewBox="0 0 320 512" fill="#4267B2">
                            <path d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"/>
                        </svg>
                    </a>
                </div>

                <div class="child">
                    <a href="https://www.instagram.com/reybuban11/" target="_blank" rel="noopener"
                       aria-label="Instagram profile">
                        <svg xmlns="http://www.w3.org/2000/svg" height="1.3em" viewBox="0 0 448 512" fill="#ff00ff">
                            <path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <!-- Right: portrait -->
        <div class="hero-right">
            <div class="hero-photo-area">
                <!-- SVG Glowing Server Background -->
                <svg id="svg-global" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 94 136" height="136" width="94">
                    <path stroke="#4B22B5" d="M87.3629 108.433L49.1073 85.3765C47.846 84.6163 45.8009 84.6163 44.5395 85.3765L6.28392 108.433C5.02255 109.194 5.02255 110.426 6.28392 111.187L44.5395 134.243C45.8009 135.004 47.846 135.004 49.1073 134.243L87.3629 111.187C88.6243 110.426 88.6243 109.194 87.3629 108.433Z" id="line-v1"></path>
                    <path stroke="#5728CC" d="M91.0928 95.699L49.2899 70.5042C47.9116 69.6734 45.6769 69.6734 44.2986 70.5042L2.49568 95.699C1.11735 96.5298 1.11735 97.8767 2.49568 98.7074L44.2986 123.902C45.6769 124.733 47.9116 124.733 49.2899 123.902L91.0928 98.7074C92.4712 97.8767 92.4712 96.5298 91.0928 95.699Z" id="line-v2"></path>
                    <g id="node-server">
                        <path fill="url(#paint0_linear_204_217)" d="M2.48637 72.0059L43.8699 96.9428C45.742 98.0709 48.281 97.8084 50.9284 96.2133L91.4607 71.7833C92.1444 71.2621 92.4197 70.9139 92.5421 70.1257V86.1368C92.5421 86.9686 92.0025 87.9681 91.3123 88.3825C84.502 92.4724 51.6503 112.204 50.0363 113.215C48.2352 114.343 45.3534 114.343 43.5523 113.215C41.9261 112.197 8.55699 91.8662 2.08967 87.926C1.39197 87.5011 1.00946 86.5986 1.00946 85.4058V70.1257C1.11219 70.9289 1.49685 71.3298 2.48637 72.0059Z"></path>
                        <path stroke="url(#paint2_linear_204_217)" fill="url(#paint1_linear_204_217)" d="M91.0928 68.7324L49.2899 43.5375C47.9116 42.7068 45.6769 42.7068 44.2986 43.5375L2.49568 68.7324C1.11735 69.5631 1.11735 70.91 2.49568 71.7407L44.2986 96.9356C45.6769 97.7663 47.9116 97.7663 49.2899 96.9356L91.0928 71.7407C92.4712 70.91 92.4712 69.5631 91.0928 68.7324Z"></path>
                        <mask height="41" width="67" y="50" x="13" maskUnits="userSpaceOnUse" style="mask-type:luminance" id="mask0_204_217">
                            <path fill="white" d="M78.3486 68.7324L49.0242 51.0584C47.6459 50.2276 45.4111 50.2276 44.0328 51.0584L14.7084 68.7324C13.3301 69.5631 13.3301 70.91 14.7084 71.7407L44.0328 89.4148C45.4111 90.2455 47.6459 90.2455 49.0242 89.4148L78.3486 71.7407C79.7269 70.91 79.727 69.5631 78.3486 68.7324Z"></path>
                        </mask>
                        <g mask="url(#mask0_204_217)">
                            <path fill="#332C94" d="M78.3486 68.7324L49.0242 51.0584C47.6459 50.2276 45.4111 50.2276 44.0328 51.0584L14.7084 68.7324C13.3301 69.5631 13.3301 70.91 14.7084 71.7407L44.0328 89.4148C45.4111 90.2455 47.6459 90.2455 49.0242 89.4148L78.3486 71.7407C79.7269 70.91 79.727 69.5631 78.3486 68.7324Z"></path>
                            <mask height="29" width="48" y="56" x="23" maskUnits="userSpaceOnUse" style="mask-type:luminance" id="mask1_204_217">
                                <path fill="white" d="M68.9898 68.7324L49.0242 56.699C47.6459 55.8683 45.4111 55.8683 44.0328 56.699L24.0673 68.7324C22.6889 69.5631 22.6889 70.91 24.0673 71.7407L44.0328 83.7741C45.4111 84.6048 47.6459 84.6048 49.0242 83.7741L68.9898 71.7407C70.3681 70.91 70.3681 69.5631 68.9898 68.7324Z"></path>
                            </mask>
                            <g mask="url(#mask1_204_217)">
                                <path fill="#5E5E5E" d="M68.9898 68.7324L49.0242 56.699C47.6459 55.8683 45.4111 55.8683 44.0328 56.699L24.0673 68.7324C22.6889 69.5631 22.6889 70.91 24.0673 71.7407L44.0328 83.7741C45.4111 84.6048 47.6459 84.6048 49.0242 83.7741L68.9898 71.7407C70.3681 70.91 70.3681 69.5631 68.9898 68.7324Z"></path>
                                <path fill="#71B1C6" d="M70.1311 69.3884L48.42 56.303C47.3863 55.6799 45.7103 55.6799 44.6765 56.303L22.5275 69.6523C21.4938 70.2754 21.4938 71.2855 22.5275 71.9086L44.2386 84.994C45.2723 85.617 46.9484 85.617 47.9821 84.994L70.1311 71.6446C71.1648 71.0216 71.1648 70.0114 70.1311 69.3884Z"></path>
                                <path fill="#80C0D4" d="M70.131 70.8923L48.4199 57.8069C47.3862 57.1839 45.7101 57.1839 44.6764 57.8069L22.5274 71.1562C21.4937 71.7793 21.4937 72.7894 22.5274 73.4125L44.2385 86.4979C45.2722 87.1209 46.9482 87.1209 47.982 86.4979L70.131 73.1486C71.1647 72.5255 71.1647 71.5153 70.131 70.8923Z"></path>
                                <path fill="#89D3EB" d="M69.751 72.1675L48.4199 59.3111C47.3862 58.6881 45.7101 58.6881 44.6764 59.3111L23.2004 72.2548C22.1667 72.8779 22.1667 73.888 23.2004 74.5111L44.5315 87.3674C45.5653 87.9905 47.2413 87.9905 48.2751 87.3674L69.751 74.4238C70.7847 73.8007 70.7847 72.7905 69.751 72.1675Z"></path>
                                <path fill="#97E6FF" d="M68.5091 72.9231L48.4199 60.8153C47.3862 60.1922 45.7101 60.1922 44.6764 60.8153L24.8146 72.7861C23.7808 73.4091 23.7808 74.4193 24.8146 75.0424L44.9038 87.1502C45.9375 87.7733 47.6135 87.7733 48.6473 87.1502L68.5091 75.1794C69.5428 74.5563 69.5428 73.5462 68.5091 72.9231Z"></path>
                                <path fill="#97E6FF" d="M66.6747 73.3219L48.4199 62.3197C47.3862 61.6966 45.7101 61.6966 44.6764 62.3197L26.4412 73.3101C25.4075 73.9332 25.4075 74.9433 26.4412 75.5664L44.696 86.5686C45.7297 87.1917 47.4058 87.1917 48.4395 86.5686L66.6747 75.5782C67.7084 74.9551 67.7084 73.945 66.6747 73.3219Z"></path>
                            </g>
                            <path stroke-width="0.5" stroke="#F4F4F4" d="M68.9898 68.7324L49.0242 56.699C47.6459 55.8683 45.4111 55.8683 44.0328 56.699L24.0673 68.7324C22.6889 69.5631 22.6889 70.91 24.0673 71.7407L44.0328 83.7741C45.4111 84.6048 47.6459 84.6048 49.0242 83.7741L68.9898 71.7407C70.3681 70.91 70.3681 69.5631 68.9898 68.7324Z"></path>
                        </g>
                    </g>
                    <g id="particles">
                        <path fill="url(#paint3_linear_204_217)" d="M43.5482 32.558C44.5429 32.558 45.3493 31.7162 45.3493 30.6778C45.3493 29.6394 44.5429 28.7976 43.5482 28.7976C42.5535 28.7976 41.7471 29.6394 41.7471 30.6778C41.7471 31.7162 42.5535 32.558 43.5482 32.558Z" class="particle p1"></path>
                        <path fill="url(#paint4_linear_204_217)" d="M50.0323 48.3519C51.027 48.3519 51.8334 47.5101 51.8334 46.4717C51.8334 45.4333 51.027 44.5915 50.0323 44.5915C49.0375 44.5915 48.2311 45.4333 48.2311 46.4717C48.2311 47.5101 49.0375 48.3519 50.0323 48.3519Z" class="particle p2"></path>
                        <path fill="url(#paint5_linear_204_217)" d="M40.3062 62.6416C41.102 62.6416 41.7471 61.9681 41.7471 61.1374C41.7471 60.3067 41.102 59.6332 40.3062 59.6332C39.5104 59.6332 38.8653 60.3067 38.8653 61.1374C38.8653 61.9681 39.5104 62.6416 40.3062 62.6416Z" class="particle p3"></path>
                        <path fill="url(#paint6_linear_204_217)" d="M50.7527 73.9229C52.1453 73.9229 53.2743 72.7444 53.2743 71.2906C53.2743 69.8368 52.1453 68.6583 50.7527 68.6583C49.3601 68.6583 48.2311 69.8368 48.2311 71.2906C48.2311 72.7444 49.3601 73.9229 50.7527 73.9229Z" class="particle p4"></path>
                        <path fill="url(#paint7_linear_204_217)" d="M48.5913 76.9312C49.1882 76.9312 49.672 76.4262 49.672 75.8031C49.672 75.1801 49.1882 74.675 48.5913 74.675C47.9945 74.675 47.5107 75.1801 47.5107 75.8031C47.5107 76.4262 47.9945 76.9312 48.5913 76.9312Z" class="particle p5"></path>
                        <path fill="url(#paint8_linear_204_217)" d="M52.9153 67.1541C53.115 67.1541 53.2768 66.9858 53.2768 66.7781C53.2768 66.5704 53.115 66.402 52.9153 66.402C52.7156 66.402 52.5538 66.5704 52.5538 66.7781C52.5538 66.9858 52.7156 67.1541 52.9153 67.1541Z" class="particle p6"></path>
                        <path fill="url(#paint9_linear_204_217)" d="M52.1936 43.8394C52.7904 43.8394 53.2743 43.3344 53.2743 42.7113C53.2743 42.0883 52.7904 41.5832 52.1936 41.5832C51.5967 41.5832 51.1129 42.0883 51.1129 42.7113C51.1129 43.3344 51.5967 43.8394 52.1936 43.8394Z" class="particle p7"></path>
                        <path fill="url(#paint10_linear_204_217)" d="M57.2367 29.5497C57.8335 29.5497 58.3173 29.0446 58.3173 28.4216C58.3173 27.7985 57.8335 27.2935 57.2367 27.2935C56.6398 27.2935 56.156 27.7985 56.156 28.4216C56.156 29.0446 56.6398 29.5497 57.2367 29.5497Z" class="particle p8"></path>
                        <path fill="url(#paint11_linear_204_217)" d="M43.9084 34.8144C44.3063 34.8144 44.6289 34.4777 44.6289 34.0623C44.6289 33.647 44.3063 33.3102 43.9084 33.3102C43.5105 33.3102 43.188 33.647 43.188 34.0623C43.188 34.4777 43.5105 34.8144 43.9084 34.8144Z" class="particle p9"></path>
                    </g>
                    <g id="reflectores">
                        <path fill-opacity="0.2" fill="url(#paint12_linear_204_217)" d="M49.2037 57.0009L68.7638 68.7786C69.6763 69.3089 69.7967 69.9684 69.794 70.1625V13.7383C69.7649 13.5587 69.6807 13.4657 69.4338 13.3096L48.4832 0.601307C46.9202 -0.192595 46.0788 -0.208238 44.6446 0.601307L23.6855 13.2118C23.1956 13.5876 23.1966 13.7637 23.1956 14.4904L23.246 70.1625C23.2948 69.4916 23.7327 69.0697 25.1768 68.2447L43.9084 57.0008C44.8268 56.4344 45.3776 56.2639 46.43 56.2487C47.5299 56.2257 48.1356 56.4222 49.2037 57.0009Z"></path>
                        <path fill-opacity="0.2" fill="url(#paint13_linear_204_217)" d="M48.8867 27.6696C49.9674 26.9175 68.6774 14.9197 68.6774 14.9197C69.3063 14.5327 69.7089 14.375 69.7796 13.756V70.1979C69.7775 70.8816 69.505 71.208 68.7422 71.7322L48.9299 83.6603C48.2003 84.1258 47.6732 84.2687 46.5103 84.2995C45.3295 84.2679 44.8074 84.1213 44.0907 83.6603L24.4348 71.8149C23.5828 71.3313 23.2369 71.0094 23.2316 70.1979L23.1884 13.9816C23.1798 14.8398 23.4982 15.3037 24.7518 16.0874C24.7518 16.0874 42.7629 26.9175 44.2038 27.6696C45.6447 28.4217 46.0049 28.4217 46.5452 28.4217C47.0856 28.4217 47.806 28.4217 48.8867 27.6696Z"></path>
                    </g>
                    <g id="panel-rigth">
                        <mask fill="white" id="path-26-inside-1_204_217">
                            <path d="M72 91.8323C72 90.5121 72.9268 88.9068 74.0702 88.2467L87.9298 80.2448C89.0731 79.5847 90 80.1198 90 81.44V81.44C90 82.7602 89.0732 84.3656 87.9298 85.0257L74.0702 93.0275C72.9268 93.6876 72 93.1525 72 91.8323V91.8323Z"></path>
                        </mask>
                        <path fill="#91DDFB" d="M72 91.8323C72 90.5121 72.9268 88.9068 74.0702 88.2467L87.9298 80.2448C89.0731 79.5847 90 80.1198 90 81.44V81.44C90 82.7602 89.0732 84.3656 87.9298 85.0257L74.0702 93.0275C72.9268 93.6876 72 93.1525 72 91.8323V91.8323Z"></path>
                        <path mask="url(#path-26-inside-1_204_217)" fill="#489CB7" d="M72 89.4419L90 79.0496L72 89.4419ZM90.6928 81.44C90.6928 82.9811 89.6109 84.8551 88.2762 85.6257L74.763 93.4275C73.237 94.3085 72 93.5943 72 91.8323V91.8323C72 92.7107 72.9268 92.8876 74.0702 92.2275L87.9298 84.2257C88.6905 83.7865 89.3072 82.7184 89.3072 81.84L90.6928 81.44ZM72 94.2227V89.4419V94.2227ZM88.2762 80.0448C89.6109 79.2742 90.6928 79.8989 90.6928 81.44V81.44C90.6928 82.9811 89.6109 84.8551 88.2762 85.6257L87.9298 84.2257C88.6905 83.7865 89.3072 82.7184 89.3072 81.84V81.84C89.3072 80.5198 88.6905 79.8056 87.9298 80.2448L88.2762 80.0448Z"></path>
                        <mask fill="white" id="path-28-inside-2_204_217">
                            <path d="M67 94.6603C67 93.3848 67.8954 91.8339 69 91.1962V91.1962C70.1046 90.5584 71 91.0754 71 92.3509V92.5129C71 93.7884 70.1046 95.3393 69 95.977V95.977C67.8954 96.6147 67 96.0978 67 94.8223V94.6603Z"></path>
                        </mask>
                        <path fill="#91DDFB" d="M67 94.6603C67 93.3848 67.8954 91.8339 69 91.1962V91.1962C70.1046 90.5584 71 91.0754 71 92.3509V92.5129C71 93.7884 70.1046 95.3393 69 95.977V95.977C67.8954 96.6147 67 96.0978 67 94.8223V94.6603Z"></path>
                        <path mask="url(#path-28-inside-2_204_217)" fill="#489CB7" d="M67 92.3509L71 90.0415L67 92.3509ZM71.6928 92.5129C71.6928 94.0093 70.6423 95.8288 69.3464 96.577L69.3464 96.577C68.0505 97.3252 67 96.7187 67 95.2223V94.8223C67 95.6559 67.8954 95.8147 69 95.177L69 95.177C69.7219 94.7602 70.3072 93.7465 70.3072 92.9129L71.6928 92.5129ZM67 97.1317V92.3509V97.1317ZM69.2762 91.0367C70.6109 90.2661 71.6928 90.8908 71.6928 92.4319V92.5129C71.6928 94.0093 70.6423 95.8288 69.3464 96.577L69 95.177C69.7219 94.7602 70.3072 93.7465 70.3072 92.9129V92.7509C70.3072 91.4754 69.7219 90.7794 69 91.1962L69.2762 91.0367Z"></path>
                    </g>
                    <defs>
                        <linearGradient gradientUnits="userSpaceOnUse" y2="92.0933" x2="92.5421" y1="92.0933" x1="1.00946" id="paint0_linear_204_217">
                            <stop stop-color="#5727CC"></stop>
                            <stop stop-color="#4354BF" offset="1"></stop>
                        </linearGradient>
                        <linearGradient gradientUnits="userSpaceOnUse" y2="91.1638" x2="6.72169" y1="70" x1="92.5" id="paint1_linear_204_217">
                            <stop stop-color="#4559C4"></stop>
                            <stop stop-color="#332C94" offset="0.29"></stop>
                            <stop stop-color="#5727CB" offset="1"></stop>
                        </linearGradient>
                        <linearGradient gradientUnits="userSpaceOnUse" y2="85.0762" x2="3.55544" y1="70" x1="92.5" id="paint2_linear_204_217">
                            <stop stop-color="#91DDFB"></stop>
                            <stop stop-color="#8841D5" offset="1"></stop>
                        </linearGradient>
                        <linearGradient gradientUnits="userSpaceOnUse" y2="32.558" x2="43.5482" y1="28.7976" x1="43.5482" id="paint3_linear_204_217">
                            <stop stop-color="#5927CE"></stop>
                            <stop stop-color="#91DDFB" offset="1"></stop>
                        </linearGradient>
                        <linearGradient gradientUnits="userSpaceOnUse" y2="48.3519" x2="50.0323" y1="44.5915" x1="50.0323" id="paint4_linear_204_217">
                            <stop stop-color="#5927CE"></stop>
                            <stop stop-color="#91DDFB" offset="1"></stop>
                        </linearGradient>
                        <linearGradient gradientUnits="userSpaceOnUse" y2="62.6416" x2="40.3062" y1="59.6332" x1="40.3062" id="paint5_linear_204_217">
                            <stop stop-color="#5927CE"></stop>
                            <stop stop-color="#91DDFB" offset="1"></stop>
                        </linearGradient>
                        <linearGradient gradientUnits="userSpaceOnUse" y2="73.9229" x2="50.7527" y1="68.6583" x1="50.7527" id="paint6_linear_204_217">
                            <stop stop-color="#5927CE"></stop>
                            <stop stop-color="#91DDFB" offset="1"></stop>
                        </linearGradient>
                        <linearGradient gradientUnits="userSpaceOnUse" y2="76.9312" x2="48.5913" y1="74.675" x1="48.5913" id="paint7_linear_204_217">
                            <stop stop-color="#5927CE"></stop>
                            <stop stop-color="#91DDFB" offset="1"></stop>
                        </linearGradient>
                        <linearGradient gradientUnits="userSpaceOnUse" y2="67.1541" x2="52.9153" y1="66.402" x1="52.9153" id="paint8_linear_204_217">
                            <stop stop-color="#5927CE"></stop>
                            <stop stop-color="#91DDFB" offset="1"></stop>
                        </linearGradient>
                        <linearGradient gradientUnits="userSpaceOnUse" y2="43.8394" x2="52.1936" y1="41.5832" x1="52.1936" id="paint9_linear_204_217">
                            <stop stop-color="#5927CE"></stop>
                            <stop stop-color="#91DDFB" offset="1"></stop>
                        </linearGradient>
                        <linearGradient gradientUnits="userSpaceOnUse" y2="29.5497" x2="57.2367" y1="27.2935" x1="57.2367" id="paint10_linear_204_217">
                            <stop stop-color="#5927CE"></stop>
                            <stop stop-color="#91DDFB" offset="1"></stop>
                        </linearGradient>
                        <linearGradient gradientUnits="userSpaceOnUse" y2="34.8144" x2="43.9084" y1="33.3102" x1="43.9084" id="paint11_linear_204_217">
                            <stop stop-color="#5927CE"></stop>
                            <stop stop-color="#91DDFB" offset="1"></stop>
                        </linearGradient>
                        <linearGradient gradientUnits="userSpaceOnUse" y2="16.0743" x2="62.9858" y1="88.5145" x1="67.8638" id="paint12_linear_204_217">
                            <stop stop-color="#97E6FF"></stop>
                            <stop stop-opacity="0" stop-color="white" offset="1"></stop>
                        </linearGradient>
                        <linearGradient gradientUnits="userSpaceOnUse" y2="39.4139" x2="31.4515" y1="88.0938" x1="36.2597" id="paint13_linear_204_217">
                            <stop stop-color="#97E6FF"></stop>
                            <stop stop-opacity="0" stop-color="white" offset="1"></stop>
                        </linearGradient>
                    </defs>
                </svg>

                <!-- Real profile photo (floating) -->
                <img src="{{ asset('images/profile.jpg') }}"
                     alt="Rey Buban — AI Developer"
                     id="hero-portrait-img"
                     class="hero-portrait" />
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
         CHATBOT UI (Direct Body Child for Rock-Solid Mobile Visibility)
    =================================================== -->
    <button id="chat-btn" aria-label="Open AI Assistant">
        <!-- Seasonal Bot Charms -->
        <div class="bot-santa-hat" aria-hidden="true">
            <svg viewBox="0 0 32 26" fill="none">
                <path d="M5 20 Q16 4 27 13 Q29 15 27 19 Z" fill="#FF2253" stroke="#FF6888" stroke-width="1.2"/>
                <rect x="3" y="18" width="26" height="6" rx="3" fill="#ffffff" stroke="rgba(255,255,255,0.8)" stroke-width="0.8"/>
                <circle cx="28" cy="14" r="3.6" fill="#ffffff" stroke="rgba(255,255,255,0.8)" stroke-width="0.8"/>
            </svg>
        </div>
        <div class="bot-halloween-charm" aria-hidden="true">
            <svg viewBox="0 0 28 20" fill="none">
                <!-- Mini Bat Charm -->
                <path d="M14,9 Q9,2 3,5 Q2,13 9,12 Q11,15 14,12 Q17,15 19,12 Q26,13 25,5 Q19,2 14,9 Z" fill="#140910" stroke="#FF7518" stroke-width="1.2"/>
                <circle cx="12" cy="9" r="0.9" fill="#FF7518"/>
                <circle cx="16" cy="9" r="0.9" fill="#FF7518"/>
            </svg>
        </div>
        <div class="bot-party-hat" aria-hidden="true">
            <svg viewBox="0 0 32 28" fill="none">
                <path d="M16 2 L5 24 L27 24 Z" fill="#181204" stroke="#FFD700" stroke-width="1.4"/>
                <path d="M12 11 L7 21" stroke="#00F0FF" stroke-width="1.2"/>
                <path d="M20 11 L25 21" stroke="#00F0FF" stroke-width="1.2"/>
                <circle cx="16" cy="2" r="3" fill="#FFD700" stroke="#FFE266" stroke-width="0.8"/>
                <line x1="3" y1="24" x2="29" y2="24" stroke="#FFD700" stroke-width="2" stroke-linecap="round"/>
            </svg>
        </div>
        <div class="bot-valentine-heart" aria-hidden="true">
            <svg viewBox="0 0 28 24" fill="none">
                <path d="M8,13 Q1,8 3,3 Q8,5 9,10" stroke="#FF69B4" stroke-width="1.2" fill="rgba(255,105,180,0.15)"/>
                <path d="M20,13 Q27,8 25,3 Q20,5 19,10" stroke="#FF69B4" stroke-width="1.2" fill="rgba(255,105,180,0.15)"/>
                <path d="M14 20 L12.8 18.9 C7 13.6 3.5 10.4 3.5 6.5 C3.5 3.4 5.9 1 9 1 C10.8 1 12.5 1.8 14 3.2 C15.5 1.8 17.2 1 19 1 C22.1 1 24.5 3.4 24.5 6.5 C24.5 10.4 21 13.6 15.2 18.9 Z" fill="#FF1493" stroke="#FF69B4" stroke-width="1.2"/>
            </svg>
        </div>
        <svg viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg" width="30" height="30">
            <!-- Antenna with signal dot -->
            <line x1="20" y1="1" x2="20" y2="6" stroke="#B34EFF" stroke-width="1.5" stroke-linecap="round"/>
            <circle cx="20" cy="1" r="2" fill="#B34EFF"/>
            <circle cx="20" cy="1" r="4" fill="#B34EFF" opacity="0.25">
                <animate attributeName="r" values="4;6;4" dur="2s" repeatCount="indefinite"/>
                <animate attributeName="opacity" values="0.25;0;0.25" dur="2s" repeatCount="indefinite"/>
            </circle>
            <!-- Robot Head (main dome) -->
            <path d="M6 12 Q6 7 12 7 L28 7 Q34 7 34 12 L34 26 Q34 32 28 32 L12 32 Q6 32 6 26 Z" fill="rgba(12,2,12,0.95)" stroke="#B34EFF" stroke-width="1.5"/>
            <!-- Side ear panels -->
            <rect x="2" y="14" width="5" height="10" rx="2.5" fill="rgba(179,78,255,0.12)" stroke="#B34EFF" stroke-width="1"/>
            <rect x="33" y="14" width="5" height="10" rx="2.5" fill="rgba(179,78,255,0.12)" stroke="#B34EFF" stroke-width="1"/>
            <!-- Inner ear accent lines -->
            <line x1="3.5" y1="17" x2="3.5" y2="21" stroke="#B34EFF" stroke-width="0.8" stroke-linecap="round" opacity="0.5"/>
            <line x1="36.5" y1="17" x2="36.5" y2="21" stroke="#B34EFF" stroke-width="0.8" stroke-linecap="round" opacity="0.5"/>
            <!-- Visor background -->
            <rect x="9" y="12" width="22" height="12" rx="4" fill="rgba(179,78,255,0.05)" stroke="rgba(179,78,255,0.2)" stroke-width="0.5"/>
            <!-- Eye sockets -->
            <rect x="11" y="14" width="7" height="7" rx="2" fill="rgba(179,78,255,0.1)" stroke="#B34EFF" stroke-width="1"/>
            <rect x="22" y="14" width="7" height="7" rx="2" fill="rgba(179,78,255,0.1)" stroke="#B34EFF" stroke-width="1"/>
            <!-- Eye irises (blinking) -->
            <ellipse id="bot-eye-left" class="bot-eye" cx="14.5" cy="17.5" rx="2" ry="2" fill="#B34EFF"/>
            <ellipse id="bot-eye-right" class="bot-eye" cx="25.5" cy="17.5" rx="2" ry="2" fill="#B34EFF"/>
            <!-- Eye glow dots -->
            <circle cx="14.5" cy="16.5" r="0.8" fill="white" opacity="0.8"/>
            <circle cx="25.5" cy="16.5" r="0.8" fill="white" opacity="0.8"/>
            <!-- Digital mouth / speaker grille -->
            <rect x="15" y="26" width="10" height="2" rx="1" fill="#B34EFF" opacity="0.8"/>
            <line x1="15" y1="29" x2="25" y2="29" stroke="#B34EFF" stroke-width="0.8" stroke-linecap="round" opacity="0.4"/>
            <!-- Tech accent lines on forehead -->
            <line x1="16" y1="9" x2="24" y2="9" stroke="#B34EFF" stroke-width="0.6" stroke-linecap="round" opacity="0.3"/>
            <line x1="18" y1="10.5" x2="22" y2="10.5" stroke="#B34EFF" stroke-width="0.6" stroke-linecap="round" opacity="0.2"/>
            <!-- Waving arm -->
            <g id="wave-arm">
                <line x1="1" y1="18" x2="-3" y2="10" stroke="#B34EFF" stroke-width="1.5" stroke-linecap="round"/>
                <circle cx="-3" cy="8" r="2.5" fill="#B34EFF"/>
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
                nav.classList.add('scrolled');
            } else {
                nav.classList.remove('scrolled');
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

        /* ── Theme Toggle ── */
        const themeToggle = document.getElementById('theme-toggle');
        const htmlEl = document.documentElement;
        const navbar = document.querySelector('.navbar');

        function applyTheme(theme) {
            if (theme === 'light') {
                htmlEl.setAttribute('data-theme', 'light');
                themeToggle.checked = true;
            } else {
                htmlEl.removeAttribute('data-theme');
                themeToggle.checked = false;
            }
            // Clear inline navbar styles so CSS variables take over immediately
            navbar.style.boxShadow = '';
            navbar.style.background = '';
        }

        // Restore saved preference
        const savedTheme = localStorage.getItem('theme');
        if (savedTheme === 'light') {
            applyTheme('light');
        }

        themeToggle.addEventListener('change', () => {
            if (themeToggle.checked) {
                applyTheme('light');
                localStorage.setItem('theme', 'light');
            } else {
                applyTheme('dark');
                localStorage.setItem('theme', 'dark');
            }
        });

        /* =========================================================
           SEASONAL THEMES (Date & Preview Switcher Engine)
        ========================================================= */
        const seasonBtn     = document.getElementById('btn-season');
        const seasonBtnIcon = document.getElementById('season-btn-icon');
        const seasonBtnText = document.getElementById('season-btn-text');

        // Check calendar date automatically
        function getSeasonFromDate() {
            const now = new Date();
            const month = now.getMonth() + 1; // 1-12
            const day = now.getDate();

            // 1. Halloween: Oct 29 - Nov 3
            if ((month === 10 && day >= 29) || (month === 11 && day <= 3)) {
                return 'halloween';
            }

            // 2. Christmas: Dec 1 - Dec 28
            if (month === 12 && day >= 1 && day <= 28) {
                return 'christmas';
            }

            // 3. New Year: Dec 29 - Jan 2
            if ((month === 12 && day >= 29) || (month === 1 && day <= 2)) {
                return 'newyear';
            }

            // 4. Valentine's Day: Feb 10 - Feb 14
            if (month === 2 && day >= 10 && day <= 14) {
                return 'valentine';
            }

            return 'default';
        }

        // Get initial mode from URL param or localStorage or auto
        function getInitialSeasonMode() {
            const valid = ['halloween', 'christmas', 'newyear', 'valentine', 'default', 'auto'];
            const params = new URLSearchParams(window.location.search);
            const param = params.get('season');
            if (param && valid.includes(param.toLowerCase())) {
                return param.toLowerCase();
            }

            const stored = localStorage.getItem('portfolio_season_mode');
            if (stored && valid.includes(stored)) {
                return stored;
            }

            return 'auto';
        }

        let currentSeasonMode = getInitialSeasonMode();

        /* ── Snow Canvas Engine for Christmas ── */
        let snowAnimationId = null;
        let snowCanvas = null;
        let snowCtx = null;
        let snowFlakes = [];

        function initSnow() {
            snowCanvas = document.getElementById('snow-canvas');
            if (!snowCanvas) return;
            snowCtx = snowCanvas.getContext('2d');
            resizeSnow();
            window.addEventListener('resize', resizeSnow);

            snowFlakes = [];
            const count = window.innerWidth < 768 ? 30 : 60;
            for (let i = 0; i < count; i++) {
                snowFlakes.push({
                    x: Math.random() * snowCanvas.width,
                    y: Math.random() * snowCanvas.height,
                    r: Math.random() * 2.4 + 0.8,
                    d: Math.random() * 1.3 + 0.6,
                    sway: Math.random() * Math.PI * 2,
                    swaySpeed: Math.random() * 0.02 + 0.008,
                    opacity: Math.random() * 0.6 + 0.35
                });
            }
        }

        function resizeSnow() {
            if (!snowCanvas) return;
            snowCanvas.width = window.innerWidth;
            snowCanvas.height = window.innerHeight;
        }

        function renderSnow() {
            if (!snowCtx || !snowCanvas) return;
            snowCtx.clearRect(0, 0, snowCanvas.width, snowCanvas.height);

            for (let i = 0; i < snowFlakes.length; i++) {
                const f = snowFlakes[i];
                f.sway += f.swaySpeed;
                f.y += f.d;
                f.x += Math.sin(f.sway) * 0.65;

                if (f.y > snowCanvas.height + 6) {
                    f.y = -6;
                    f.x = Math.random() * snowCanvas.width;
                }
                if (f.x > snowCanvas.width + 6) f.x = -6;
                if (f.x < -6) f.x = snowCanvas.width + 6;

                snowCtx.beginPath();
                snowCtx.arc(f.x, f.y, f.r, 0, Math.PI * 2);
                snowCtx.fillStyle = `rgba(240, 248, 255, ${f.opacity})`;
                snowCtx.shadowBlur = 6;
                snowCtx.shadowColor = 'rgba(0, 245, 160, 0.4)';
                snowCtx.fill();
            }
            snowAnimationId = requestAnimationFrame(renderSnow);
        }

        function startSnow() {
            if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;
            if (!snowCanvas) initSnow();
            if (!snowAnimationId) {
                renderSnow();
            }
        }

        function stopSnow() {
            if (snowAnimationId) {
                cancelAnimationFrame(snowAnimationId);
                snowAnimationId = null;
            }
            if (snowCtx && snowCanvas) {
                snowCtx.clearRect(0, 0, snowCanvas.width, snowCanvas.height);
            }
        }

        /* ── Fireworks Engine for New Year ── */
        let fwAnimationId = null;
        let fwCanvas = null;
        let fwCtx = null;
        let fwParticles = [];
        let lastFwLaunch = 0;

        function initFireworks() {
            fwCanvas = document.getElementById('fireworks-canvas');
            if (!fwCanvas) return;
            fwCtx = fwCanvas.getContext('2d');
            resizeFireworks();
            window.addEventListener('resize', resizeFireworks);
            fwParticles = [];
        }

        function resizeFireworks() {
            if (!fwCanvas) return;
            fwCanvas.width = window.innerWidth;
            fwCanvas.height = window.innerHeight;
        }

        function createBurst(x, y) {
            const colors = ['#FFD700', '#FFE266', '#00F0FF', '#FF2453', '#FFFFFF'];
            const count = window.innerWidth < 768 ? 22 : 36;
            const baseColor = colors[Math.floor(Math.random() * colors.length)];
            for (let i = 0; i < count; i++) {
                const angle = (Math.PI * 2 / count) * i + Math.random() * 0.2;
                const speed = Math.random() * 3.4 + 1.2;
                fwParticles.push({
                    x: x,
                    y: y,
                    vx: Math.cos(angle) * speed,
                    vy: Math.sin(angle) * speed,
                    r: Math.random() * 2 + 1,
                    alpha: 1,
                    color: Math.random() > 0.3 ? baseColor : colors[Math.floor(Math.random() * colors.length)]
                });
            }

            // Celebratory drifting confetti ribbons
            const confettiColors = ['#FFD700', '#00F0FF', '#FF2453', '#00F5A0', '#FF69B4', '#FFFFFF'];
            for (let j = 0; j < 8; j++) {
                fwParticles.push({
                    x: x + (Math.random() * 40 - 20),
                    y: y + (Math.random() * 40 - 20),
                    vx: (Math.random() - 0.5) * 2,
                    vy: Math.random() * 1.4 + 0.6,
                    isRibbon: true,
                    w: Math.random() * 8 + 4,
                    h: Math.random() * 3.5 + 2,
                    rot: Math.random() * Math.PI,
                    rotSpeed: (Math.random() - 0.5) * 0.08,
                    alpha: 1,
                    color: confettiColors[Math.floor(Math.random() * confettiColors.length)]
                });
            }
        }

        function renderFireworks(timestamp) {
            if (!fwCtx || !fwCanvas) return;
            fwCtx.clearRect(0, 0, fwCanvas.width, fwCanvas.height);

            if (timestamp - lastFwLaunch > 1200) {
                const bx = Math.random() * (fwCanvas.width * 0.8) + (fwCanvas.width * 0.1);
                const by = Math.random() * (fwCanvas.height * 0.45) + 60;
                createBurst(bx, by);
                lastFwLaunch = timestamp;
            }

            for (let i = fwParticles.length - 1; i >= 0; i--) {
                const p = fwParticles[i];

                if (p.isRibbon) {
                    p.rot += p.rotSpeed;
                    p.y += p.vy;
                    p.x += Math.sin(p.rot) * 0.7;
                    p.alpha -= 0.007;

                    if (p.alpha <= 0 || p.y > fwCanvas.height + 20) {
                        fwParticles.splice(i, 1);
                        continue;
                    }

                    fwCtx.save();
                    fwCtx.translate(p.x, p.y);
                    fwCtx.rotate(p.rot);
                    fwCtx.fillStyle = p.color;
                    fwCtx.globalAlpha = p.alpha;
                    fwCtx.fillRect(-p.w / 2, -p.h / 2, p.w, p.h);
                    fwCtx.restore();
                } else {
                    p.x += p.vx;
                    p.y += p.vy;
                    p.vy += 0.04;
                    p.alpha -= 0.016;

                    if (p.alpha <= 0) {
                        fwParticles.splice(i, 1);
                        continue;
                    }

                    fwCtx.beginPath();
                    fwCtx.arc(p.x, p.y, p.r, 0, Math.PI * 2);
                    fwCtx.globalAlpha = p.alpha;
                    fwCtx.fillStyle = p.color;
                    fwCtx.shadowBlur = 8;
                    fwCtx.shadowColor = p.color;
                    fwCtx.fill();
                }
            }
            fwCtx.globalAlpha = 1;
            fwAnimationId = requestAnimationFrame(renderFireworks);
        }

        function startFireworks() {
            if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;
            if (!fwCanvas) initFireworks();
            if (!fwAnimationId) {
                lastFwLaunch = performance.now();
                fwAnimationId = requestAnimationFrame(renderFireworks);
            }
        }

        function stopFireworks() {
            if (fwAnimationId) {
                cancelAnimationFrame(fwAnimationId);
                fwAnimationId = null;
            }
            fwParticles = [];
            if (fwCtx && fwCanvas) {
                fwCtx.clearRect(0, 0, fwCanvas.width, fwCanvas.height);
            }
        }

        /* ── Floating Hearts Engine for Valentine's Day ── */
        let heartAnimationId = null;
        let heartCanvas = null;
        let heartCtx = null;
        let heartParticles = [];

        function initHearts() {
            heartCanvas = document.getElementById('hearts-canvas');
            if (!heartCanvas) return;
            heartCtx = heartCanvas.getContext('2d');
            resizeHearts();
            window.addEventListener('resize', resizeHearts);

            heartParticles = [];
            const count = window.innerWidth < 768 ? 16 : 28;
            for (let i = 0; i < count; i++) {
                heartParticles.push({
                    x: Math.random() * heartCanvas.width,
                    y: Math.random() * heartCanvas.height,
                    size: Math.random() * 12 + 8,
                    speed: Math.random() * 0.8 + 0.4,
                    sway: Math.random() * Math.PI * 2,
                    swaySpeed: Math.random() * 0.02 + 0.008,
                    alpha: Math.random() * 0.5 + 0.35,
                    color: Math.random() > 0.4 ? '#FF1493' : '#FF69B4'
                });
            }
        }

        function resizeHearts() {
            if (!heartCanvas) return;
            heartCanvas.width = window.innerWidth;
            heartCanvas.height = window.innerHeight;
        }

        function drawHeart(ctx, x, y, size) {
            ctx.save();
            ctx.translate(x, y);
            ctx.beginPath();
            const top = size * 0.3;
            ctx.moveTo(0, top);
            ctx.bezierCurveTo(-size / 2, -top, -size, size / 3, 0, size);
            ctx.bezierCurveTo(size, size / 3, size / 2, -top, 0, top);
            ctx.closePath();
            ctx.fill();
            ctx.restore();
        }

        function renderHearts() {
            if (!heartCtx || !heartCanvas) return;
            heartCtx.clearRect(0, 0, heartCanvas.width, heartCanvas.height);

            for (let i = 0; i < heartParticles.length; i++) {
                const h = heartParticles[i];
                h.sway += h.swaySpeed;
                h.y -= h.speed;
                h.x += Math.sin(h.sway) * 0.6;

                if (h.y < -30) {
                    h.y = heartCanvas.height + 20;
                    h.x = Math.random() * heartCanvas.width;
                }

                heartCtx.fillStyle = h.color;
                heartCtx.globalAlpha = h.alpha;
                heartCtx.shadowBlur = 10;
                heartCtx.shadowColor = 'rgba(255, 20, 147, 0.6)';
                drawHeart(heartCtx, h.x, h.y, h.size);
            }
            heartCtx.globalAlpha = 1;
            heartAnimationId = requestAnimationFrame(renderHearts);
        }

        function startHearts() {
            if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;
            if (!heartCanvas) initHearts();
            if (!heartAnimationId) {
                renderHearts();
            }
        }

        function stopHearts() {
            if (heartAnimationId) {
                cancelAnimationFrame(heartAnimationId);
                heartAnimationId = null;
            }
            if (heartCtx && heartCanvas) {
                heartCtx.clearRect(0, 0, heartCanvas.width, heartCanvas.height);
            }
        }

        function applySeason(mode) {
            let active = mode;
            if (mode === 'auto') {
                active = getSeasonFromDate();
            }

            // Reset animation engines
            stopSnow();
            stopFireworks();
            stopHearts();

            if (active === 'halloween') {
                htmlEl.setAttribute('data-season', 'halloween');
                if (seasonBtnIcon) seasonBtnIcon.textContent = '🎃';
                if (seasonBtnText) seasonBtnText.textContent = mode === 'auto' ? 'Auto: Spooky' : 'Halloween';
            } else if (active === 'christmas') {
                htmlEl.setAttribute('data-season', 'christmas');
                if (seasonBtnIcon) seasonBtnIcon.textContent = '🎄';
                if (seasonBtnText) seasonBtnText.textContent = mode === 'auto' ? 'Auto: Festive' : 'Christmas';
                startSnow();
            } else if (active === 'newyear') {
                htmlEl.setAttribute('data-season', 'newyear');
                if (seasonBtnIcon) seasonBtnIcon.textContent = '🎆';
                if (seasonBtnText) seasonBtnText.textContent = mode === 'auto' ? 'Auto: New Year' : 'New Year';
                startFireworks();
            } else if (active === 'valentine') {
                htmlEl.setAttribute('data-season', 'valentine');
                if (seasonBtnIcon) seasonBtnIcon.textContent = '💖';
                if (seasonBtnText) seasonBtnText.textContent = mode === 'auto' ? 'Auto: Valentine' : 'Valentine';
                startHearts();
            } else {
                htmlEl.removeAttribute('data-season');
                if (seasonBtnIcon) seasonBtnIcon.textContent = '⚡';
                if (seasonBtnText) seasonBtnText.textContent = mode === 'auto' ? 'Auto: Normal' : 'Default';
            }

            if (navbar) {
                navbar.style.boxShadow = '';
                navbar.style.background = '';
            }
        }

        // Initialize seasonal theme on load
        applySeason(currentSeasonMode);

        // Click to cycle seasonal themes: Auto -> Halloween -> Christmas -> New Year -> Valentine -> Default -> Auto
        if (seasonBtn) {
            seasonBtn.addEventListener('click', () => {
                const sequence = ['auto', 'halloween', 'christmas', 'newyear', 'valentine', 'default'];
                const nextIdx = (sequence.indexOf(currentSeasonMode) + 1) % sequence.length;
                currentSeasonMode = sequence[nextIdx];

                if (currentSeasonMode === 'auto') {
                    localStorage.removeItem('portfolio_season_mode');
                } else {
                    localStorage.setItem('portfolio_season_mode', currentSeasonMode);
                }

                // Update URL query parameter without page reload
                const url = new URL(window.location);
                if (currentSeasonMode === 'auto') {
                    url.searchParams.delete('season');
                } else {
                    url.searchParams.set('season', currentSeasonMode);
                }
                window.history.replaceState({}, '', url);

                applySeason(currentSeasonMode);
            });
        }

    </script>

</body>
</html>
