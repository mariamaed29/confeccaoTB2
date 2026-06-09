<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#17130f">
    <title>{{ config('app.name', 'Atelie TB') }} | Confeccao premium</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700|playfair-display:600,700" rel="stylesheet">
    <style>
        :root {
            --ink: #17130f;
            --graphite: #2d2924;
            --muted: #746c63;
            --paper: #fbfaf7;
            --porcelain: #f3f0ea;
            --taupe: #c7b7a2;
            --clay: #9b6f55;
            --moss: #5d6a55;
            --wine: #6f2f3a;
            --gold: #c59d5f;
            --line: rgba(23, 19, 15, 0.12);
            --shadow: 0 22px 60px rgba(23, 19, 15, 0.12);
            --radius: 8px;
        }

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            background: var(--paper);
            color: var(--ink);
            font-family: "Instrument Sans", system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            line-height: 1.5;
        }

        body.menu-open {
            overflow: hidden;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        img {
            display: block;
            max-width: 100%;
        }

        .site-header {
            position: fixed;
            top: 0;
            left: 0;
            z-index: 20;
            width: 100%;
            border-bottom: 1px solid rgba(255, 255, 255, 0.16);
            color: #fff;
            transition: background-color 220ms ease, border-color 220ms ease, box-shadow 220ms ease, color 220ms ease;
        }

        .site-header.is-scrolled,
        .site-header.menu-active {
            border-color: var(--line);
            background: rgba(251, 250, 247, 0.92);
            color: var(--ink);
            box-shadow: 0 18px 44px rgba(23, 19, 15, 0.08);
            backdrop-filter: blur(18px);
        }

        .nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: min(1160px, calc(100% - 32px));
            min-height: 78px;
            margin: 0 auto;
            gap: 24px;
        }

        .brand {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            font-weight: 800;
            letter-spacing: 0;
        }

        .brand img {
            width: 46px;
            height: 46px;
            border-radius: 50%;
            background: #fff;
            object-fit: contain;
            padding: 4px;
        }

        .brand span {
            display: block;
            font-size: 0.72rem;
            color: currentColor;
            font-weight: 700;
            opacity: 0.72;
            text-transform: uppercase;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 24px;
            font-size: 0.92rem;
            font-weight: 700;
        }

        .nav-links a {
            position: relative;
            padding: 8px 0;
        }

        .nav-links a::after {
            position: absolute;
            right: 0;
            bottom: 2px;
            left: 0;
            height: 1px;
            background: currentColor;
            content: "";
            transform: scaleX(0);
            transform-origin: right;
            transition: transform 180ms ease;
        }

        .nav-links a:hover::after {
            transform: scaleX(1);
            transform-origin: left;
        }

        .menu-toggle {
            display: none;
            width: 42px;
            height: 42px;
            border: 1px solid currentColor;
            border-radius: 50%;
            background: transparent;
            color: inherit;
            cursor: pointer;
        }

        .menu-toggle span {
            display: block;
            width: 16px;
            height: 1.5px;
            margin: 4px auto;
            background: currentColor;
            transition: transform 180ms ease, opacity 180ms ease;
        }

        .menu-open .menu-toggle span:nth-child(1) {
            transform: translateY(5.5px) rotate(45deg);
        }

        .menu-open .menu-toggle span:nth-child(2) {
            opacity: 0;
        }

        .menu-open .menu-toggle span:nth-child(3) {
            transform: translateY(-5.5px) rotate(-45deg);
        }

        .hero {
            position: relative;
            display: grid;
            min-height: 92vh;
            padding: 118px 0 56px;
            color: #fff;
            overflow: hidden;
            place-items: end center;
        }

        .hero::before {
            position: absolute;
            inset: 0;
            background:
                linear-gradient(90deg, rgba(18, 15, 12, 0.84), rgba(18, 15, 12, 0.46) 44%, rgba(18, 15, 12, 0.2)),
                url("https://images.unsplash.com/photo-1445205170230-053b83016050?auto=format&fit=crop&w=1800&q=82") center/cover;
            content: "";
            transform: scale(1.02);
        }

        .hero::after {
            position: absolute;
            inset: auto 0 0;
            height: 34%;
            background: linear-gradient(0deg, var(--paper), rgba(251, 250, 247, 0));
            content: "";
            pointer-events: none;
        }

        .hero-inner {
            position: relative;
            z-index: 1;
            display: grid;
            grid-template-columns: minmax(0, 1fr) 320px;
            align-items: end;
            width: min(1160px, calc(100% - 32px));
            gap: 42px;
        }

        .eyebrow {
            margin: 0 0 16px;
            color: var(--gold);
            font-size: 0.76rem;
            font-weight: 800;
            letter-spacing: 0;
            text-transform: uppercase;
        }

        h1,
        h2,
        h3 {
            margin: 0;
            letter-spacing: 0;
        }

        h1,
        h2 {
            font-family: "Playfair Display", Georgia, serif;
        }

        h1 {
            max-width: 780px;
            font-size: clamp(3rem, 7vw, 6.8rem);
            line-height: 0.92;
        }

        .hero-copy {
            max-width: 620px;
            margin: 22px 0 0;
            color: rgba(255, 255, 255, 0.82);
            font-size: clamp(1rem, 1.5vw, 1.2rem);
        }

        .actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 30px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 48px;
            border: 1px solid transparent;
            border-radius: var(--radius);
            padding: 0 20px;
            font-weight: 800;
            transition: transform 180ms ease, box-shadow 180ms ease, background-color 180ms ease, border-color 180ms ease;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 16px 36px rgba(23, 19, 15, 0.18);
        }

        .btn-primary {
            background: #fff;
            color: var(--ink);
        }

        .btn-dark {
            background: var(--ink);
            color: #fff;
        }

        .btn-outline {
            border-color: rgba(255, 255, 255, 0.54);
            color: #fff;
        }

        .hero-panel {
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: var(--radius);
            background: rgba(255, 255, 255, 0.12);
            padding: 22px;
            backdrop-filter: blur(18px);
        }

        .hero-panel strong {
            display: block;
            font-size: 2.4rem;
            line-height: 1;
        }

        .hero-panel span {
            display: block;
            margin-top: 8px;
            color: rgba(255, 255, 255, 0.78);
        }

        .section {
            padding: 86px 0;
        }

        .section-alt {
            background: var(--porcelain);
        }

        .container {
            width: min(1160px, calc(100% - 32px));
            margin: 0 auto;
        }

        .section-heading {
            display: flex;
            align-items: end;
            justify-content: space-between;
            gap: 28px;
            margin-bottom: 34px;
        }

        .section-heading h2 {
            max-width: 660px;
            font-size: clamp(2rem, 4vw, 4rem);
            line-height: 0.98;
        }

        .section-heading p {
            max-width: 430px;
            margin: 0;
            color: var(--muted);
        }

        .trust-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            border: 1px solid var(--line);
            border-radius: var(--radius);
            background: #fff;
            box-shadow: var(--shadow);
        }

        .trust-item {
            padding: 26px;
            border-right: 1px solid var(--line);
        }

        .trust-item:last-child {
            border-right: 0;
        }

        .icon {
            display: inline-grid;
            width: 42px;
            height: 42px;
            margin-bottom: 18px;
            border-radius: 50%;
            background: var(--porcelain);
            color: var(--wine);
            place-items: center;
        }

        .icon svg {
            width: 20px;
            height: 20px;
            stroke: currentColor;
            stroke-width: 1.8;
            fill: none;
        }

        .trust-item h3,
        .service h3,
        .product-card h3 {
            font-size: 1.05rem;
            font-weight: 800;
        }

        .trust-item p,
        .service p,
        .product-card p {
            margin: 9px 0 0;
            color: var(--muted);
        }

        .products-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 18px;
        }

        .product-card {
            position: relative;
            overflow: hidden;
            border: 1px solid var(--line);
            border-radius: var(--radius);
            background: #fff;
            box-shadow: 0 16px 44px rgba(23, 19, 15, 0.08);
        }

        .product-media {
            position: relative;
            aspect-ratio: 4 / 5;
            overflow: hidden;
            background: var(--porcelain);
        }

        .product-media img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 420ms ease, filter 420ms ease;
        }

        .product-card:hover img {
            filter: saturate(1.05) contrast(1.03);
            transform: scale(1.06);
        }

        .product-tag {
            position: absolute;
            top: 14px;
            left: 14px;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.88);
            padding: 7px 11px;
            color: var(--ink);
            font-size: 0.72rem;
            font-weight: 800;
            text-transform: uppercase;
        }

        .product-body {
            padding: 18px;
        }

        .split {
            display: grid;
            grid-template-columns: minmax(0, 0.92fr) minmax(0, 1.08fr);
            align-items: center;
            gap: 48px;
        }

        .atelier-photo {
            position: relative;
            overflow: hidden;
            border-radius: var(--radius);
            box-shadow: var(--shadow);
        }

        .atelier-photo img {
            width: 100%;
            aspect-ratio: 4 / 5;
            object-fit: cover;
        }

        .atelier-photo::after {
            position: absolute;
            inset: 18px;
            border: 1px solid rgba(255, 255, 255, 0.5);
            border-radius: calc(var(--radius) - 2px);
            content: "";
        }

        .service-list {
            display: grid;
            gap: 14px;
        }

        .service {
            display: grid;
            grid-template-columns: auto minmax(0, 1fr);
            gap: 16px;
            padding: 18px;
            border: 1px solid var(--line);
            border-radius: var(--radius);
            background: rgba(255, 255, 255, 0.64);
        }

        .catalog {
            position: relative;
            overflow: hidden;
            border-radius: var(--radius);
            background:
                linear-gradient(90deg, rgba(23, 19, 15, 0.88), rgba(23, 19, 15, 0.55)),
                url("https://images.unsplash.com/photo-1483985988355-763728e1935b?auto=format&fit=crop&w=1600&q=82") center/cover;
            color: #fff;
            padding: clamp(32px, 6vw, 72px);
        }

        .catalog h2 {
            max-width: 680px;
            font-size: clamp(2.2rem, 5vw, 5rem);
            line-height: 0.95;
        }

        .catalog p {
            max-width: 560px;
            margin: 20px 0 0;
            color: rgba(255, 255, 255, 0.78);
        }

        .contact-grid {
            display: grid;
            grid-template-columns: 0.95fr 1.05fr;
            gap: 20px;
        }

        .contact-card,
        .contact-form {
            border: 1px solid var(--line);
            border-radius: var(--radius);
            background: #fff;
            padding: 26px;
            box-shadow: 0 16px 44px rgba(23, 19, 15, 0.08);
        }

        .contact-card h3,
        .contact-form h3 {
            font-size: 1.3rem;
        }

        .contact-list {
            display: grid;
            gap: 14px;
            margin-top: 24px;
        }

        .contact-list a,
        .contact-list span {
            display: flex;
            align-items: center;
            gap: 12px;
            color: var(--muted);
            font-weight: 700;
        }

        .form-grid {
            display: grid;
            gap: 12px;
            margin-top: 18px;
        }

        input,
        textarea {
            width: 100%;
            border: 1px solid var(--line);
            border-radius: var(--radius);
            background: var(--paper);
            color: var(--ink);
            font: inherit;
            padding: 14px 15px;
            outline: none;
            transition: border-color 180ms ease, box-shadow 180ms ease;
        }

        textarea {
            min-height: 118px;
            resize: vertical;
        }

        input:focus,
        textarea:focus {
            border-color: var(--clay);
            box-shadow: 0 0 0 4px rgba(155, 111, 85, 0.12);
        }

        .site-footer {
            padding: 32px 0;
            background: var(--ink);
            color: rgba(255, 255, 255, 0.72);
        }

        .footer-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 18px;
        }

        .reveal {
            opacity: 0;
            transform: translateY(18px);
            transition: opacity 520ms ease, transform 520ms ease;
        }

        .reveal.is-visible {
            opacity: 1;
            transform: translateY(0);
        }

        @media (prefers-reduced-motion: reduce) {
            *,
            *::before,
            *::after {
                scroll-behavior: auto !important;
                transition-duration: 0.01ms !important;
                animation-duration: 0.01ms !important;
            }

            .reveal {
                opacity: 1;
                transform: none;
            }
        }

        @media (max-width: 920px) {
            .menu-toggle {
                display: block;
            }

            .nav-links {
                position: fixed;
                top: 78px;
                right: 16px;
                left: 16px;
                display: grid;
                gap: 0;
                border: 1px solid var(--line);
                border-radius: var(--radius);
                background: var(--paper);
                color: var(--ink);
                padding: 12px;
                box-shadow: var(--shadow);
                opacity: 0;
                pointer-events: none;
                transform: translateY(-10px);
                transition: opacity 180ms ease, transform 180ms ease;
            }

            .menu-open .nav-links {
                opacity: 1;
                pointer-events: auto;
                transform: translateY(0);
            }

            .nav-links a {
                padding: 13px;
            }

            .hero {
                min-height: auto;
                padding-top: 132px;
            }

            .hero-inner,
            .split,
            .contact-grid {
                grid-template-columns: 1fr;
            }

            .hero-panel {
                max-width: 360px;
            }

            .section-heading {
                display: block;
            }

            .section-heading p {
                margin-top: 14px;
            }

            .trust-grid,
            .products-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .trust-item:nth-child(2) {
                border-right: 0;
            }

            .trust-item:nth-child(n + 3) {
                border-top: 1px solid var(--line);
            }
        }

        @media (max-width: 620px) {
            .nav {
                min-height: 68px;
            }

            .brand img {
                width: 40px;
                height: 40px;
            }

            .brand strong {
                font-size: 0.95rem;
            }

            .nav-links {
                top: 68px;
            }

            .hero {
                padding-top: 108px;
            }

            .hero-inner,
            .container,
            .nav {
                width: min(100% - 24px, 1160px);
            }

            .actions .btn,
            .contact-form .btn {
                width: 100%;
            }

            .section {
                padding: 62px 0;
            }

            .trust-grid,
            .products-grid {
                grid-template-columns: 1fr;
            }

            .trust-item {
                border-right: 0;
            }

            .trust-item + .trust-item {
                border-top: 1px solid var(--line);
            }

            .footer-inner {
                align-items: flex-start;
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <header class="site-header" data-header>
        <nav class="nav" aria-label="Navegacao principal">
            <a class="brand" href="#inicio" aria-label="Atelie TB">
                <img src="{{ asset('imagens/logo_confeccao.png') }}" alt="Logo Atelie TB">
                <strong>Atelie TB <span>Confeccao premium</span></strong>
            </a>

            <button class="menu-toggle" type="button" aria-label="Abrir menu" aria-expanded="false" data-menu-toggle>
                <span></span>
                <span></span>
                <span></span>
            </button>

            <div class="nav-links" data-nav-links>
                <a href="#colecoes">Colecoes</a>
                <a href="#servicos">Servicos</a>
                <a href="#catalogo">Catalogo</a>
                <a href="#contato">Contato</a>
                <a href="{{ url('/admin') }}">Area administrativa</a>
            </div>
        </nav>
    </header>

    <main id="inicio">
        <section class="hero">
            <div class="hero-inner">
                <div>
                    <p class="eyebrow reveal">Moda autoral, producao precisa e acabamento premium</p>
                    <h1 class="reveal">Confeccao sofisticada para marcas que valorizam cada detalhe.</h1>
                    <p class="hero-copy reveal">Do desenvolvimento da peca piloto a producao sob medida, criamos roupas com caimento, consistencia e apresentacao profissional para colecoes exclusivas.</p>
                    <div class="actions reveal">
                        <a class="btn btn-primary" href="#catalogo">Ver catalogo</a>
                        <a class="btn btn-outline" href="#contato">Solicitar orcamento</a>
                    </div>
                </div>

                <aside class="hero-panel reveal" aria-label="Indicador de qualidade">
                    <strong>100%</strong>
                    <span>Processos acompanhados com criterio tecnico, controle visual e cuidado de atelier.</span>
                </aside>
            </div>
        </section>

        <section class="section">
            <div class="container">
                <div class="trust-grid reveal">
                    <article class="trust-item">
                        <span class="icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M12 3l7 4v5c0 4.5-2.9 7.4-7 9-4.1-1.6-7-4.5-7-9V7l7-4z"></path><path d="M9 12l2 2 4-5"></path></svg></span>
                        <h3>Qualidade constante</h3>
                        <p>Padrao de corte, costura e revisao pensado para entregar confianca em cada lote.</p>
                    </article>
                    <article class="trust-item">
                        <span class="icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M4 19h16"></path><path d="M6 16l8-8 3 3-8 8H6v-3z"></path><path d="M13 9l3 3"></path></svg></span>
                        <h3>Modelagem refinada</h3>
                        <p>Desenvolvimento cuidadoso para valorizar caimento, conforto e identidade da marca.</p>
                    </article>
                    <article class="trust-item">
                        <span class="icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M8 3h8l2 4-6 14L6 7l2-4z"></path><path d="M6 7h12"></path><path d="M10 7l2 14 2-14"></path></svg></span>
                        <h3>Acabamento premium</h3>
                        <p>Detalhes limpos, materiais bem tratados e apresentacao pronta para encantar clientes.</p>
                    </article>
                    <article class="trust-item">
                        <span class="icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M4 6h16"></path><path d="M4 12h16"></path><path d="M4 18h10"></path></svg></span>
                        <h3>Processo organizado</h3>
                        <p>Fluxo claro para pedidos, prazos, materiais e acompanhamento de producao.</p>
                    </article>
                </div>
            </div>
        </section>

        <section class="section section-alt" id="colecoes">
            <div class="container">
                <div class="section-heading reveal">
                    <h2>Colecoes com presenca visual e desejo de compra.</h2>
                    <p>Cards pensados para destacar produtos, texturas, estilos e linhas de producao com leitura rapida e aparencia de marca consolidada.</p>
                </div>

                <div class="products-grid">
                    <article class="product-card reveal">
                        <div class="product-media">
                            <img src="https://images.unsplash.com/photo-1529139574466-a303027c1d8b?auto=format&fit=crop&w=900&q=80" alt="Vestido feminino em editorial de moda">
                            <span class="product-tag">Feminino</span>
                        </div>
                        <div class="product-body">
                            <h3>Vestidos e pecas autorais</h3>
                            <p>Linhas elegantes para colecoes casuais, festa, trabalho e moda boutique.</p>
                        </div>
                    </article>

                    <article class="product-card reveal">
                        <div class="product-media">
                            <img src="https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?auto=format&fit=crop&w=900&q=80" alt="Colecao de roupas em estilo contemporaneo">
                            <span class="product-tag">Colecao</span>
                        </div>
                        <div class="product-body">
                            <h3>Capsulas sob demanda</h3>
                            <p>Producao organizada para marcas que precisam testar e escalar colecoes.</p>
                        </div>
                    </article>

                    <article class="product-card reveal">
                        <div class="product-media">
                            <img src="https://images.unsplash.com/photo-1496747611176-843222e1e57c?auto=format&fit=crop&w=900&q=80" alt="Look premium em cabide de moda">
                            <span class="product-tag">Premium</span>
                        </div>
                        <div class="product-body">
                            <h3>Acabamentos especiais</h3>
                            <p>Costuras, aviamentos e revisao final com foco em durabilidade e percepcao de valor.</p>
                        </div>
                    </article>
                </div>
            </div>
        </section>

        <section class="section" id="servicos">
            <div class="container split">
                <div class="atelier-photo reveal">
                    <img src="https://images.unsplash.com/photo-1556905055-8f358a7a47b2?auto=format&fit=crop&w=1100&q=82" alt="Mesa de trabalho de confeccao com tecidos e ferramentas">
                </div>

                <div>
                    <p class="eyebrow reveal">Servicos de confeccao</p>
                    <div class="section-heading reveal" style="margin-bottom: 24px;">
                        <h2>Da ideia ao produto final com metodo e delicadeza.</h2>
                    </div>

                    <div class="service-list">
                        <article class="service reveal">
                            <span class="icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M4 7h16"></path><path d="M7 4v16"></path><path d="M17 4v16"></path><path d="M4 17h16"></path></svg></span>
                            <div>
                                <h3>Modelagem e peca piloto</h3>
                                <p>Ajustes de estrutura, medidas e caimento antes da producao.</p>
                            </div>
                        </article>
                        <article class="service reveal">
                            <span class="icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M5 4h14v16H5z"></path><path d="M9 4v16"></path><path d="M15 4v16"></path></svg></span>
                            <div>
                                <h3>Corte e costura</h3>
                                <p>Execucao limpa para pequenos e medios lotes com padronizacao visual.</p>
                            </div>
                        </article>
                        <article class="service reveal">
                            <span class="icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M12 21s7-4.4 7-11V5l-7-2-7 2v5c0 6.6 7 11 7 11z"></path></svg></span>
                            <div>
                                <h3>Controle e entrega</h3>
                                <p>Conferencia de pecas, organizacao por pedido e finalizacao profissional.</p>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </section>

        <section class="section section-alt" id="catalogo">
            <div class="container">
                <div class="catalog reveal">
                    <p class="eyebrow">Catalogo e atendimento</p>
                    <h2>Apresente sua colecao com uma experiencia premium.</h2>
                    <p>Use esta area para direcionar clientes ao catalogo, WhatsApp, formulario de orcamento ou painel administrativo. A navegacao fica clara, elegante e pronta para conversao.</p>
                    <div class="actions">
                        <a class="btn btn-primary" href="#contato">Falar com a confeccao</a>
                        <a class="btn btn-outline" href="{{ url('/admin') }}">Acessar painel</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="section" id="contato">
            <div class="container">
                <div class="section-heading reveal">
                    <h2>Vamos construir uma colecao com qualidade de marca grande.</h2>
                    <p>Entre em contato para alinhar estilo, quantidade, materiais, prazos e necessidades de acabamento.</p>
                </div>

                <div class="contact-grid">
                    <aside class="contact-card reveal">
                        <h3>Atendimento Atelie TB</h3>
                        <p>Uma comunicacao direta ajuda a entender sua marca e transformar ideias em pecas consistentes.</p>
                        <div class="contact-list">
                            <a href="mailto:contato@atelietb.com.br"><span class="icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M4 6h16v12H4z"></path><path d="M4 7l8 6 8-6"></path></svg></span>contato@atelietb.com.br</a>
                            <a href="tel:+5500000000000"><span class="icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M6 4l3 2-2 4c1.5 3 4 5.5 7 7l4-2 2 3c.4.7.1 1.6-.6 1.9-1.2.6-2.6.8-3.9.4C9.8 18.8 5.2 14.2 3.7 8.5c-.4-1.3-.2-2.7.4-3.9C4.4 3.9 5.3 3.6 6 4z"></path></svg></span>(00) 00000-0000</a>
                            <span><span class="icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M12 21s7-6.1 7-12a7 7 0 0 0-14 0c0 5.9 7 12 7 12z"></path><path d="M12 11a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"></path></svg></span>Atendimento sob agendamento</span>
                        </div>
                    </aside>

                    <form class="contact-form reveal" action="mailto:contato@atelietb.com.br" method="post" enctype="text/plain">
                        <h3>Solicite um orcamento</h3>
                        <div class="form-grid">
                            <input type="text" name="nome" placeholder="Nome ou marca" required>
                            <input type="email" name="email" placeholder="E-mail" required>
                            <input type="text" name="tipo" placeholder="Tipo de peca ou colecao">
                            <textarea name="mensagem" placeholder="Conte sobre quantidade, prazo e referencias"></textarea>
                            <button class="btn btn-dark" type="submit">Enviar solicitacao</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>

    <footer class="site-footer">
        <div class="container footer-inner">
            <strong>Atelie TB</strong>
            <span>Confeccao premium, design elegante e producao profissional.</span>
        </div>
    </footer>

    <script>
        const body = document.body;
        const header = document.querySelector("[data-header]");
        const menuButton = document.querySelector("[data-menu-toggle]");
        const navLinks = document.querySelectorAll("[data-nav-links] a");

        function updateHeader() {
            header.classList.toggle("is-scrolled", window.scrollY > 24);
        }

        function closeMenu() {
            body.classList.remove("menu-open");
            header.classList.remove("menu-active");
            menuButton.setAttribute("aria-expanded", "false");
        }

        menuButton.addEventListener("click", () => {
            const isOpen = body.classList.toggle("menu-open");
            header.classList.toggle("menu-active", isOpen);
            menuButton.setAttribute("aria-expanded", String(isOpen));
        });

        navLinks.forEach((link) => link.addEventListener("click", closeMenu));
        window.addEventListener("scroll", updateHeader, { passive: true });
        updateHeader();

        const reveals = document.querySelectorAll(".reveal");

        if ("IntersectionObserver" in window) {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add("is-visible");
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.14 });

            reveals.forEach((item) => observer.observe(item));
        } else {
            reveals.forEach((item) => item.classList.add("is-visible"));
        }
    </script>
</body>
</html>
