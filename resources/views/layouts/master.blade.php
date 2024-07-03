<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

    <title>@yield('title') - Ambaca a Sonhar</title>

    {{-- {{ site_meta_tags() }} --}}
    <meta content="description" name="{!! settings()->app_description !!}">
    <meta content="keywords" name="{{ settings()->app_key_words }}">
    <meta name="google-site-verification" content="{{ settings()->app_google_id }}" />
    <meta name="author" content="{{ settings()->app_manager }}" />

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;600;700&display=swap" rel="stylesheet">

    <!-- Five Icons -->
    {{-- <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('theme/assets/images/favicon_32.jpg') }}"> --}}
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('theme/assets/images/favicon.jpg') }}">
    {{-- <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('theme/assets/images/favicon_32.jpg') }}"> --}}

    <!-- Vendor CSS Files -->
    <link href="{{ asset('theme/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('theme/assets/vendor/bootstrap/css/bootstrap-icons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('theme/assets/vendor/aos/aos.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('theme/assets/fonts/icomoon/style.css') }}">

    <!-- Owl.Carousel-->
    <link rel="stylesheet" href="{{ asset('theme/assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/assets/css/owl.theme.default.min.css') }}">

    <!-- Template Main CSS File -->
    <link href="{{ asset('theme/assets/css/theme-style.css') }}" rel="stylesheet">

    <!-- Fontawesome -->
    <link rel="stylesheet" href="{{ asset('theme/assets/fontawesome/css/all.min.css') }}">

    <!-- LightBox / FancyBox -->
    <link href="{{ asset('theme/assets/vendor/lightbox/css/lightbox.min.css') }}" rel="stylesheet" />
    <link
          rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"
          />

</head>

<body>
    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>

    <header>

        <div class="site-navbar site-navbar-target" role="banner">
            <div class="container">
                <div class="row align-items-center position-relative">

                    <div class="col-12">
                        <nav class="site-navigation  ml-auto text-uppercase" role="navigation">
                            <ul class="site-menu main-menu js-clone-nav ml-auto d-none d-lg-block">
                                <li><a href="/" class="nav-link home">Início</a></li>
                                <li class="has-children">
                                    <a href="#" class="nav-link">O Município</a>
                                    <ul class="dropdown arrow-top radius10">
                                        <li><a href="{{ route('site.pages.page', 'informacao-geral') }}"
                                                class="nav-link">Sobre o Muncípio</a></li>
                                        <li><a href="{{ route('site.pages.page', 'historia-do-municipio') }}"
                                                class="nav-link">História de Ambaca</a></li>
                                        <li><a href="{{ route('site.pages.page', 'cartao-de-visitas') }}"
                                                class="nav-link">Cartão de Visitas</a></li>
                                        <li><a href="{{ route('site.pages.page', 'como-chegar') }}"
                                                class="nav-link">Como chegar?</a></li>
                                        <li><a href="{{ route('site.pages.page', 'potencialidades-turisticas') }}"
                                                class="nav-link">Locais e Sítios</a></li>
                                        <li><a href="{{ route('site.pages.page', 'potencialidades-turisticas') }}"
                                                class="nav-link">Mercados e Feiras</a></li>

                                            <li><a href="{{ route('site.faq') }}" class="nav-link">Perguntas Frequentes</a></li>
                                        <li><a href="{{ route('site.pages.page', 'curiosidades') }}"
                                                class="nav-link">Curiosidades</a></li>
                                        <li><a href="{{ route('site.pages.managers-gallery') }}"
                                                    class="nav-link">Galeria de Administradores</a></li>
                                    </ul>
                                </li>

                                <li class="has-children">
                                    <a href="#" class="nav-link">Órgãos e Instituições</a>
                                    <ul class="dropdown arrow-top radius10">
                                        {{ showEntitiesMenuItem() }}
                                        <li><a href="{{ route('site.pages.entities') }}" class="nav-link">Ver todos os
                                                Órgãos</a></li>
                                    </ul>
                                </li>

                                <li class="has-children">
                                    <a href="#" class="nav-link">Serviços</a>
                                    <ul class="dropdown arrow-top radius10">
                                        {{ showServicesMenuItem() }}
                                        <li><a href="{{ route('site.pages.services') }}" class="nav-link">Ver todos os
                                                Serviços</a></li>
                                    </ul>
                                </li>

                                <li><a href="{{ route('site.pages.projects') }}" class="nav-link">Projectos e
                                        Acções</a></li>
                                <li class="has-children">
                                    <a href="#" class="nav-link">Publicações</a>
                                    <ul class="dropdown arrow-top radius10">
                                        <li><a href="{{ route('site.pages.blog') }}" class="nav-link">Central de
                                            Notícias</a></li>
                                        <li><a href="{{ route('site.pages.documents') }}" class="nav-link">Documentos e
                                                Arquivos</a></li>
                                        <li><a href="{{ route('site.galleries') }}" class="nav-link">Galeria de Fotos</a></li>
                                    </ul>
                                </li>

                        </nav>
                    </div>

                    <div class="toggle-button d-inline-block d-lg-none">
                        <a href="#" class="site-menu-toggle py-5 js-menu-toggle text-black">
                            <i class="bi bi-list"></i>
                            <!-- <span class="icon-menu h3"></span> -->
                        </a>
                    </div>

                </div>
            </div>
        </div>

        <div class="header-submenu">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-4">
                        <div class="logo-box">
                            <a href="/">
                                <div class="logo-img">
                                    <img src="{{ asset('theme/assets/images/logo.png') }}" alt="">
                                </div>
                                <div class="logo-text">
                                    <div class="logo-lead text-uppercase">AmbacaSonhar</div>
                                    <span class="logo-slogan text-uppercase">Com olhos postos no futuro</span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-5">
                        <!-- Search Form -->
                        <form class="main-search-box" method="GET" action="{{ route('site.pages.search', 's') }}">
                            <div class="input-group radius5">
                                <span><i class="fa-solid fa-magnifying-glass"></i></span>
                                <input type="search" class="form-control " placeholder="O que você procura?"
                                    name="s" />
                            </div>
                        </form>

                    </div>
                    <div class="col-12 col-md-12 col-lg-3">
                        <div class="social-media-icons">
                            <a href="{{ settings()->app_facebook_uri }}" title="Siga-nos no Facebook"><i
                                    class="fa-brands fa-square-facebook fa-xl"></i></a>
                            <a href="{{ settings()->app_whatsapp_uri }}" target="_blank" title="Acompanhe-nos no WhatsApp"><i
                                    class="fa-brands fa-whatsapp fa-xl"></i></a>
                            <a href="{{ route('site.contact') }}" title="Fale Connosco"><i
                                    class="fa-solid fa-envelope fa-xl"></i></a>
                            <a href="#" title="Notificações"><i class="fa-regular fa-bell fa-xl"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </header>

    <!-- ALERTA FESTAS DA VILA CAMABATELA -->
    {{ alertaFestasAmbaca() }}

    <!-- START CONTENT AREA ============================-->
    @yield('content')

    <!-- END CONTENT AREA ============================-->
{{--     <section class="secAssocAmbaca" data-aos="fade-up">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4 text-center">
                    <div class="fa-icon">
                        <img src="{{ asset('theme/assets/images/logo-footer.png') }}" alt="Ambaca a Sonhar">

                    </div>

                </div>
                <div class="col-12 col-md-8">
                    <div class="assoContent">
                        <h3>Comunidade dos Natuais de Ambaca</h3>
                        <p>Participe proactivamente das actividades em prol do desenvolvimento no município. Faça parte
                            da <strong>"Comunidade dos Naturais de Ambaca" (grupo WhatsApp)</strong>, criado para
                            promover a troca de informações, experiências e idéias que contribuam para o crescimento e
                            desenvolvimento do município de Ambaca e ser um manancial do saber inspirador do poder local
                            na formulação das políticas de administração do município em prol da prosperidade do seu
                            povo.</p>
                        <p>Atento às alterações climáticas, busca soluções pro-ambiente e encoraja os seus membros a
                            participarem activamente com as suas ideias criativas... <a href="#"><i
                                    class="fa-solid fa-arrow-right-long"></i></a></p>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- ======= Footer ======= -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4 logo-footer-area text-center">

                   <figure class="footer-logo">
                        <img src="{{ asset('theme/assets/images/logo-footer.png') }}" alt="">
                    </figure>

                    {{-- <div class="footer-social-media">
                        <h4>Redes sociais</h4>
                        <a href="" title="Siga-nos no Facebook"><i
                                class="fa-brands fa-square-facebook fa-xl"></i></a>
                        <a href="" title="Acompanhe-nos no WhatsApp"><i
                                class="fa-brands fa-whatsapp fa-xl"></i></a>
                        <a href="contacto.html" title="Fale Connosco"><i class="fa-solid fa-envelope fa-xl"></i></a>
                    </div> --}}
                </div>

                <div class="col-6 col-md-2">
                    <h3>Governo</h3>
                    <ul>
                        <li><a href="{{ route('site.pages.page', 'informacao-geral') }}">Sobre o Município</a></li>
                        <li><a href="{{ route('site.pages.entity', 'administracao-municipal') }}">Administração Municipal</a></li>
                        <li><a href="{{ route('site.pages.entities') }}">Órgãos e Instituições</a></li>
                        <li><a href="{{ route('site.pages.projects') }}">Projectos e Acções</a></li>
                    </ul>
                </div>

                <div class="col-6 col-md-2">
                    <h3>Munícipe</h3>
                    <ul>
                        <li><a href="{{ route('site.pages.services') }}">Serviços</a></li>
                        <li><a href="{{ route('site.pages.page', 'escolas-centros-formacao') }}">Escolas e Centros de Formação</a></li>
                        <li><a href="#">Serviços Bancários</a></li>
                    </ul>
                </div>

                <div class="col-12 col-md-2">
                    <h3>Visitante</h3>
                    <ul>
                        <li><a href="{{ route('site.pages.page', 'como-chegar') }}">Como chegar</a></li>
                        <li><a href="{{ route('site.pages.page', 'cartao-de-visitas') }}">Cartão de Visitas</a></li>
                        <li><a href="{{ route('site.pages.page','potencialidades-turisticas') }}">Locais e Sítios</a></li>
                        <li><a href="{{ route('site.pages.page', 'rede-hoteleira') }}">Rede Hoteleira</a></li>
                        <li><a href="{{ route('site.pages.page', 'mercados-feiras') }}">Feiras e Mercados</a></li>
                        <li><a href="{{ route('site.pages.page', 'como-chegar') }}">Cultura e Lazer</a></li>
                    </ul>

                </div>

                <div class="col-12 col-md-2">
                    <h3>Sobre</h3>
                    <ul>
                        <li><a href="{{ route('site.contact') }}"> Contacto</a></li>
                        <li><a href="{{ route('site.faq') }}">Perguntas Frequentes</a></li>
                        <li><a href="{{ route('site.map') }}">Mapa do Site</a></li>
                        <li><a href="{{ route('site.pages.page','politica-privacidade') }}">Política de Privacidade</a></li>
                    </ul>

                </div>
            </div>
        </div>

        <!-- Copyright -->
        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-12  col-md-6 ">
                        <span> <i class="bi bi-c-circle"></i> Copyright 2023 - Direitos reservados - CDI Ambaca</span>
                    </div>
                    <div class="col-12 col-md-6 system-version">
                        <span><i class="bi bi-tools"></i> Versão do sistema: {{ settings()->app_version }}&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp; <i class="bi bi-clock"></i> Portal
                            actualizado
                            em {{ date('d/m/Y H:m:s', strtotime(settings()->app_last_update)) }}</span>
                    </div>
                </div>
            </div>
        </div>

    </footer>
    <script src="{{ asset('theme/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('theme/assets/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('theme/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('theme/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('theme/assets/fontawesome/js/all.min.js') }}"></script>
    <script src='{{ asset('theme/assets/js/TweenMax.min.js') }}'></script>
    <script src="{{ asset('theme/assets/js/fancybox.umd.js') }}"></script>
    <script>
        Fancybox.bind('[data-fancybox="gallery"]', {
            //
        });
    </script>

    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
    <script src="{{ asset('theme/assets/js/main.js') }}"></script>
    <script src="{{ asset('theme/assets/js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('theme/assets/js/owl.carousel.js') }}"></script>
    <script>
        $(document).ready(function() {
            var owl = $('.owl-carousel');
            owl.owlCarousel({
                margin: 10,
                nav: true,
                loop: true,
                autoplay: true,
                autoplayTimeout: 10000,
                autoplayHoverPause: true,
                responsive: {
                    0: {
                        items: 2
                    },
                    600: {
                        items: 3
                    },
                    1000: {
                        items: 6
                    }
                }
            })

            window.addEventListener('load', () => {
                AOS.init({
                    duration: 1000,
                    easing: 'ease-in-out',
                    once: true,
                    mirror: false
                })
            });

        })
    </script>

    <script>
        //CONTAGEM REGRESSIVA PARA FESTAS DA VILA DE CAMABATELA
        (function() {
            const second = 1000,
                minute = second * 60,
                hour = minute * 60,
                day = hour * 24;

            let today = new Date(),
                dd = String(today.getDate()).padStart(2, "0"),
                mm = String(today.getMonth() + 1).padStart(2, "0"),
                yyyy = today.getFullYear(),
                nextYear = yyyy + 1,
                dayMonth = "07/14/",
                birthday = dayMonth + yyyy;

                numberYears = yyyy - 1934;

                today = mm + "/" + dd + "/" + yyyy;
                if (today > birthday) {
                    birthday = dayMonth + nextYear;
                }

            const countDown = new Date(birthday).getTime(),
                x = setInterval(function() {

                    const now = new Date().getTime(),
                        distance = countDown - now;

                    document.getElementById("days").innerText = Math.floor(distance / (day)),
                        document.getElementById("hours").innerText = Math.floor((distance % (day)) / (hour)),
                        document.getElementById("minutes").innerText = Math.floor((distance % (hour)) / (minute)),
                        document.getElementById("seconds").innerText = Math.floor((distance % (minute)) / second);

                    document.getElementById('numberYears').innerText = numberYears;


                    if (distance < 0) {
                        document.getElementById("headline").innerText = "Feliz Aniversário, Camabatela: são " +
                            numberYears + " anos de existência. Parabéns!!!";
                        document.getElementById("countdown").style.display = "none";
                        document.getElementById("content").style.display = "block";
                        clearInterval(x);
                    }

                }, 0)
        }());
    </script>

</body>

</html>
