<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>KIGCOL - Repuestos y Accesorios para Motos</title>
    <meta name="description" content="KIGCOL - Especialistas en repuestos y accesorios para motocicletas de todas las marcas. Envíos a todo el Perú.">
    <meta name="keywords" content="repuestos moto, accesorios moto, cascos, aceites, luces LED, Perú">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/kigcolfavi.png') }}" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">

    <!-- Estilos para el Chat Bot -->
    <style>
        #chat-bot-button {
            position: fixed;
            bottom: 20px;
            left: 20px;
            z-index: 10000;
            background: #5C16C5;
            color: white;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        #chat-bot-button:hover {
            transform: scale(1.1);
            background: #4a12a0;
        }

        #chat-box {
            position: fixed;
            bottom: 90px;
            left: 20px;
            width: 350px;
            height: 450px;
            background: white;
            border-radius: 16px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.2);
            z-index: 9999;
            display: none;
            flex-direction: column;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        #chat-header {
            background: linear-gradient(135deg, #5C16C5, #8540ED);
            color: white;
            padding: 15px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        #chat-header h4 {
            margin: 0;
            font-size: 18px;
            font-weight: 600;
        }

        #chat-close {
            background: transparent;
            border: none;
            color: white;
            font-size: 20px;
            cursor: pointer;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #chat-body {
            flex: 1;
            padding: 16px;
            overflow-y: auto;
            background-color: #f5f5f5;
        }

        #chat-body p {
            margin-bottom: 10px;
            padding: 10px 15px;
            border-radius: 18px;
            max-width: 85%;
            line-height: 1.4;
        }

        #chat-body p:has(strong:contains("Tú:")) {
            background-color: #e1f5fe;
            margin-left: auto;
            border-bottom-right-radius: 4px;
        }

        #chat-body p:has(strong:contains("IA:")) {
            background-color: white;
            margin-right: auto;
            border-bottom-left-radius: 4px;
        }

        #chat-input {
            display: flex;
            padding: 10px;
            background-color: #f9f9f9;
            border-top: 1px solid #eaeaea;
        }

        #userInput {
            flex: 1;
            border: 1px solid #ddd;
            border-radius: 24px;
            padding: 10px 15px;
            margin-right: 10px;
            font-size: 14px;
        }

        #sendButton {
            background: #5C16C5;
            color: white;
            border: none;
            border-radius: 24px;
            padding: 10px 20px;
            cursor: pointer;
            font-weight: 500;
            transition: background 0.3s ease;
        }

        #sendButton:hover {
            background: #4a12a0;
        }

        .chat-bot-animation {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(92, 22, 197, 0.7);
            }
            70% {
                box-shadow: 0 0 0 10px rgba(92, 22, 197, 0);
            }
            100% {
                box-shadow: 0 0 0 0 rgba(92, 22, 197, 0);
            }
        }
    </style>
</head>
<body class="index-page">
<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">
        <a href="#inicio" class="logo d-flex align-items-center">
            <h1 class="sitename">KIGCOL</h1>
        </a>
        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="#inicio" class="active">Inicio</a></li>
                <li><a href="#productos">Productos</a></li>
                <li><a href="#quienessomos">¿Quienes Somos?</a></li>
                <li><a href="#servicios">Servicios</a></li>
                <li><a href="#contact">Contáctanos</a></li>
                <!-- Destacado botón de acceso al dashboard -->
                <li>
                    <a href="{{ url('/dashboard') }}" class="dashboard-btn" style="background-color: #5C16C5; color: white; padding: 10px 20px; border-radius: 5px; font-weight: bold;">
                        <i class="bi bi-speedometer2 me-1"></i> Acceder al Dashboard
                    </a>
                </li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>
    </div>
</header>
<main class="main">
    <!-- Hero Section -->
    <section id="inicio" class="hero section dark-background position-relative overflow-hidden">
        <!-- Carrusel de fondo -->
        <div id="heroBackgroundCarousel" class="carousel slide carousel-fade position-absolute w-100 h-100" data-bs-ride="carousel">
            <div class="carousel-inner w-100 h-100">
                <div class="carousel-item active">
                    <img src="{{ asset('assets/img/offronko.png') }}" class="d-block w-100 h-100 object-fit-cover" alt="Fondo 1">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('assets/img/ronkooff.png') }}" class="d-block w-100 h-100 object-fit-cover" alt="Fondo 2">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('assets/img/ofronko.png') }}" class="d-block w-100 h-100 object-fit-cover" alt="Fondo 3">
                </div>
            </div>
        </div>
        <!-- Carrusel de contenido -->
        <div id="hero-carousel" data-bs-interval="5000" class="container carousel carousel-fade position-relative z-2" data-bs-ride="carousel">
            <!-- Slide 1 -->
            <div class="carousel-item active">
                <div class="carousel-container text-center text-white">
                    <div class="mb-5">
                        <h2 class="animate__animated animate__fadeInDown mb-4">Repuestos y Accesorios para tu Moto</h2>
                        <p class="animate__animated animate__fadeInUp mb-4">Las mejores marcas al mejor precio con envío a todo el Perú</p>
                    </div>
                    <a href="https://wa.me/51910678398?text=Cotiza%20ahora" class="btn-get-started animate__animated animate__fadeInUp scrollto">Cotiza ahora</a>

                    <!-- Botón de Dashboard destacado en hero section -->
                    <a href="{{ url('/dashboard') }}" class="btn-dashboard animate__animated animate__fadeInUp ms-3" style="background-color: #5C16C5; color: white; padding: 10px 20px; border-radius: 30px; font-weight: bold; display: inline-block; margin-top: 15px;">
                        <i class="bi bi-speedometer2 me-1"></i> Acceder al Dashboard
                    </a>
                </div>
            </div>
            <!-- Slide 2 -->
            <div class="carousel-item">
                <div class="carousel-container text-center text-white">
                    <div class="mb-5">
                        <h2 class="animate__animated animate__fadeInDown mb-4">Atención Personalizada</h2>
                        <p class="animate__animated animate__fadeInUp mb-4">Asesoría técnica especializada para tu moto</p>
                    </div>
                    <a href="https://wa.me/51910678398?text=Cotiza%20ahora" class="btn-get-started animate__animated animate__fadeInUp scrollto">Cotiza ahora</a>

                    <!-- Botón de Dashboard destacado en hero section -->
                    <a href="{{ url('/dashboard') }}" class="btn-dashboard animate__animated animate__fadeInUp ms-3" style="background-color: #5C16C5; color: white; padding: 10px 20px; border-radius: 30px; font-weight: bold; display: inline-block; margin-top: 15px;">
                        <i class="bi bi-speedometer2 me-1"></i> Acceder al Dashboard
                    </a>
                </div>
            </div>
            <!-- Slide 3 -->
            <div class="carousel-item">
                <div class="carousel-container text-center text-white">
                    <div class="mb-5">
                        <h2 class="animate__animated animate__fadeInDown mb-4">Envíos a Todo el Perú</h2>
                        <p class="animate__animated animate__fadeInUp mb-4">Recibe tus repuestos donde estés en tiempo récord</p>
                    </div>
                    <a href="https://wa.me/51910678398?text=Cotiza%20ahora" class="btn-get-started animate__animated animate__fadeInUp scrollto">Cotiza ahora</a>

                    <!-- Botón de Dashboard destacado en hero section -->
                    <a href="{{ url('/dashboard') }}" class="btn-dashboard animate__animated animate__fadeInUp ms-3" style="background-color: #5C16C5; color: white; padding: 10px 20px; border-radius: 30px; font-weight: bold; display: inline-block; margin-top: 15px;">
                        <i class="bi bi-speedometer2 me-1"></i> Acceder al Dashboard
                    </a>
                </div>
            </div>
        </div>
        <!-- Flechas navegación -->
        <a class="carousel-control-prev z-2" href="#hero-carousel" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>
        <a class="carousel-control-next z-2" href="#hero-carousel" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>
        <!-- Olas SVG -->
        <svg class="hero-waves z-2 position-relative" xmlns="http://www.w3.org/2000/svg" viewBox="0 24 150 28" preserveAspectRatio="none">
            <defs>
                <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z"></path>
            </defs>
            <g class="wave1"><use xlink:href="#wave-path" x="50" y="3" /></g>
            <g class="wave2"><use xlink:href="#wave-path" x="50" y="0" /></g>
            <g class="wave3"><use xlink:href="#wave-path" x="50" y="9" /></g>
        </svg>
    </section>
    <!-- /Hero Section -->

    <!-- About Section -->
    <section id="productos" class="portfolio section">
        <div class="container section-title" data-aos="fade-up">
            <h2>Productos</h2>
            <p>Explora nuestro catálogo</p>
        </div>
        <div class="container">
            <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
                <ul class="portfolio-filters isotope-filters text-center mb-4" data-aos="fade-up" data-aos-delay="100">
                    <li data-filter="*" class="filter-active">Todos</li>
                    <li data-filter=".filter-cascos">Cascos</li>
                    <li data-filter=".filter-aceite">Aceite</li>
                    <li data-filter=".filter-accesorios">Accesorios</li>
                    <li data-filter=".filter-luces">Luces</li>
                </ul>
                <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
                    <!-- Producto: Casco -->
                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-cascos">
                        <div class="card border-0 shadow">
                            <img src="{{ asset('assets/img/productos/casco1.jpg') }}" class="card-img-top" alt="Casco deportivo">
                            <div class="card-body">
                                <h5 class="card-title">Casco Deportivo Pro</h5>
                                <p class="card-text">Protección máxima con diseño aerodinámico.</p>
                                <span class="badge bg-success mb-2">S/ 180.00</span>
                                <div class="d-flex justify-content-between">
                                    <a href="{{ asset('assets/img/casco.jpg') }}" class="glightbox preview-link" data-gallery="portfolio-gallery-cascos" title="Casco Deportivo Pro">
                                        <i class="bi bi-zoom-in"></i>
                                    </a>
                                    <a href="#contact" class="details-link" title="Solicitar Cotización">
                                        <i class="bi bi-whatsapp"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Producto: Aceite -->
                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-aceite">
                        <div class="card border-0 shadow">
                            <img src="{{ asset('assets/img/productos/aceite1.jpg') }}" class="card-img-top" alt="Aceite para motor">
                            <div class="card-body">
                                <h5 class="card-title">Aceite Motor 4T 20W50</h5>
                                <p class="card-text">Lubricación premium para motores exigentes.</p>
                                <span class="badge bg-success mb-2">S/ 35.00</span>
                                <div class="d-flex justify-content-between">
                                    <a href="{{ asset('assets/img/aceite.avif') }}" class="glightbox preview-link" data-gallery="portfolio-gallery-aceite" title="Aceite Motor 4T">
                                        <i class="bi bi-zoom-in"></i>
                                    </a>
                                    <a href="#contact" class="details-link" title="Solicitar Cotización">
                                        <i class="bi bi-whatsapp"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Producto: Accesorios -->
                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-accesorios">
                        <div class="card border-0 shadow">
                            <img src="{{ asset('assets/img/productos/accesorio1.jpg') }}" class="card-img-top" alt="Retrovisor deportivo">
                            <div class="card-body">
                                <h5 class="card-title">Retrovisor Deportivo LED</h5>
                                <p class="card-text">Visibilidad y estilo en cada recorrido.</p>
                                <span class="badge bg-success mb-2">S/ 55.00</span>
                                <div class="d-flex justify-content-between">
                                    <a href="{{ asset('assets/img/retrovisor.avif') }}" class="glightbox preview-link" data-gallery="portfolio-gallery-accesorios" title="Retrovisor LED">
                                        <i class="bi bi-zoom-in"></i>
                                    </a>
                                    <a href="#contact" class="details-link" title="Solicitar Cotización">
                                        <i class="bi bi-whatsapp"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Producto: Luces -->
                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-luces">
                        <div class="card border-0 shadow">
                            <img src="{{ asset('assets/img/productos/luces1.jpg') }}" class="card-img-top" alt="Foco LED alta intensidad">
                            <div class="card-body">
                                <h5 class="card-title">Foco LED Alta Intensidad</h5>
                                <p class="card-text">Ilumina el camino con potencia y estilo.</p>
                                <span class="badge bg-success mb-2">S/ 28.00</span>
                                <div class="d-flex justify-content-between">
                                    <a href="{{ asset('assets/img/led.avif') }}" class="glightbox preview-link" data-gallery="portfolio-gallery-luces" title="Foco LED">
                                        <i class="bi bi-zoom-in"></i>
                                    </a>
                                    <a href="#contact" class="details-link" title="Solicitar Cotización">
                                        <i class="bi bi-whatsapp"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Puedes seguir duplicando los productos con sus respectivas categorías -->
                </div>
            </div>
        </div>
    </section>
    <!-- /About Section -->

    <!-- Features Section -->
    <section id="features" class="features section">
        <div class="container">
            <!-- Navegación de pestañas -->
            <ul class="nav nav-tabs row d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
                <li class="nav-item col-3">
                    <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#features-tab-1">
                        <i class="bi bi-tools"></i>
                        <h4 class="d-none d-lg-block">Repuestos Originales</h4>
                    </a>
                </li>
                <li class="nav-item col-3">
                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-2">
                        <i class="bi bi-truck"></i>
                        <h4 class="d-none d-lg-block">Envíos a Nivel Nacional</h4>
                    </a>
                </li>
                <li class="nav-item col-3">
                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-3">
                        <i class="bi bi-headset"></i>
                        <h4 class="d-none d-lg-block">Asesoría Personalizada</h4>
                    </a>
                </li>
                <li class="nav-item col-3">
                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-4">
                        <i class="bi bi-stars"></i>
                        <h4 class="d-none d-lg-block">Calidad Garantizada</h4>
                    </a>
                </li>
            </ul>

            <!-- Contenido de cada pestaña -->
            <div class="tab-content" data-aos="fade-up" data-aos-delay="200">
                <!-- Repuestos originales -->
                <div class="tab-pane fade active show" id="features-tab-1">
                    <div class="row align-items-center">
                        <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                            <h3>Repuestos 100% originales y compatibles con tu moto</h3>
                            <p class="fst-italic">Encuentra las piezas exactas para cada modelo y marca.</p>
                            <ul>
                                <li><i class="bi bi-check2-all"></i> Stock permanente de las marcas más reconocidas.</li>
                                <li><i class="bi bi-check2-all"></i> Compatibilidad asegurada para motos urbanas y de carga.</li>
                                <li><i class="bi bi-check2-all"></i> Productos nuevos, sellados y con garantía.</li>
                            </ul>
                            <p>En KIGCOL seleccionamos cuidadosamente cada pieza para ofrecerte lo mejor.</p>
                        </div>
                        <div class="col-lg-6 order-1 order-lg-2 text-center">
                            <img src="{{ asset('assets/img/ser.png') }}" alt="Repuestos para motocicleta" class="img-fluid rounded shadow" style="max-height: 350px; object-fit: cover;">
                        </div>
                    </div>
                </div>

                <!-- Envíos nacionales -->
                <div class="tab-pane fade" id="features-tab-2">
                    <div class="row align-items-center">
                        <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                            <h3>Envíos rápidos a todo el Perú</h3>
                            <p>Recibe tus repuestos donde estés, con operadores confiables y logística segura.</p>
                            <ul>
                                <li><i class="bi bi-check2-all"></i> Despachos diarios a Lima y provincias.</li>
                                <li><i class="bi bi-check2-all"></i> Seguimiento de pedidos en tiempo real.</li>
                                <li><i class="bi bi-check2-all"></i> Embalaje reforzado para proteger tus productos.</li>
                            </ul>
                            <p class="fst-italic">Con KIGCOL, tu moto nunca se detiene.</p>
                        </div>
                        <div class="col-lg-6 order-1 order-lg-2 text-center">
                            <img src="{{ asset('assets/img/working-envios.jpg') }}" alt="Reparto nacional de repuestos" class="img-fluid rounded shadow" style="max-height: 350px; object-fit: cover;">
                        </div>
                    </div>
                </div>

                <!-- Asesoría personalizada -->
                <div class="tab-pane fade" id="features-tab-3">
                    <div class="row align-items-center">
                        <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                            <h3>Asesoría técnica en tiempo real</h3>
                            <p>¿Tienes dudas? Te guiamos paso a paso para que elijas lo mejor para tu moto.</p>
                            <ul>
                                <li><i class="bi bi-check2-all"></i> Atención personalizada por WhatsApp y teléfono.</li>
                                <li><i class="bi bi-check2-all"></i> Técnicos especializados en repuestos de moto.</li>
                                <li><i class="bi bi-check2-all"></i> Recomendaciones según uso y presupuesto.</li>
                            </ul>
                            <p class="fst-italic">En KIGCOL te escuchamos y te ayudamos.</p>
                        </div>
                        <div class="col-lg-6 order-1 order-lg-2 text-center">
                            <img src="{{ asset('assets/img/noser.png') }}" alt="Asesoría técnica de motos" class="img-fluid rounded shadow" style="max-height: 350px; object-fit: cover;">
                        </div>
                    </div>
                </div>

                <!-- Calidad Garantizada -->
                <div class="tab-pane fade" id="features-tab-4">
                    <div class="row align-items-center">
                        <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                            <h3>Calidad que se nota, garantía que protege</h3>
                            <p>Trabajamos con marcas que cumplen altos estándares de calidad.</p>
                            <ul>
                                <li><i class="bi bi-check2-all"></i> Productos certificados y garantizados.</li>
                                <li><i class="bi bi-check2-all"></i> Garantía por defectos de fábrica.</li>
                                <li><i class="bi bi-check2-all"></i> La confianza de miles de clientes en todo el país.</li>
                            </ul>
                            <p class="fst-italic">Invertir en KIGCOL es invertir en seguridad para tu moto.</p>
                        </div>
                        <div class="col-lg-6 order-1 order-lg-2 text-center">
                            <img src="{{ asset('assets/img/serviciews.png') }}" alt="Garantía de repuestos de moto" class="img-fluid rounded shadow" style="max-height: 350px; object-fit: cover;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Features Section -->

    <!-- Call To Action Section -->
    <section id="call-to-action" class="call-to-action section dark-background">
        <div class="container">
            <div class="row" data-aos="zoom-in" data-aos-delay="100">
                <div class="col-xl-8 text-center text-xl-start">
                    <h3>¿No encuentras lo que buscas? ¡Escríbenos!</h3>
                    <p>Un asesor de KIGCOL está listo para ayudarte a encontrar el repuesto exacto para tu moto.</p>
                </div>
                <div class="col-xl-4 d-flex align-items-center justify-content-center justify-content-xl-end">
                    <div class="d-flex gap-3">
                        <a href="https://wa.me/51910678398?text=Cotiza%20ahora" class="cta-btn align-middle">Chatear con un asesor</a>
                        <a href="{{ url('/dashboard') }}" class="cta-btn align-middle" style="background-color: #5C16C5;">
                            <i class="bi bi-speedometer2 me-1"></i> Dashboard
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Call To Action Section -->

    <section id="call-to-action" class="call-to-action section dark-background">
        <div class="container">
            <div class="row justify-content-center text-center" data-aos="zoom-in" data-aos-delay="100">
                <div class="col-xl-9">
                    <h3>¿Buscas un repuesto específico? Nosotros te ayudamos</h3>
                    <p>Déjanos tu correo y uno de nuestros expertos en KIGCOL te enviará la información del repuesto que necesitas.</p>
                </div>

                <div class="col-xl-6 mt-4">
                    <div class="email">
                        <iframe width="540" height="305" src="https://sibforms.com/serve/MUIFALDUcqF-Uf8ttwgDMwaBR9MI-86k3F_vW6e0uRi851t60eyblXFkJufE0ZS5hI3sfu76GKIScQbIjp0szHWzBmb-ll_mX_asFdQgS6pH4V9QQzhwHhX5h1oEJao-dudCWrNOkNa35ZP3kapCRM3979L32F8ktz2LYG9pCRbrrNrH8bvrDXtZhQoS02JsxoxXvyFUoOL11WLk" frameborder="0" scrolling="auto" allowfullscreen style="display: block;margin-left: auto;margin-right: auto;max-width: 100%;"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Call To Action Section -->

    <!-- Services Section -->
    <section id="servicios" class="services section bg-light">
        <!-- Título de la sección -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Servicios</h2>
            <p>¿Qué ofrecemos en KIGCOL?</p>
        </div>

        <div class="container">
            <div class="row gy-4">
                <!-- Venta de Repuestos -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-item position-relative">
                        <div class="icon">
                            <i class="bi bi-gear-wide-connected" style="color: #0dcaf0;"></i>
                        </div>
                        <h3>Venta de Repuestos</h3>
                        <p>Repuestos originales y alternativos para motocicletas de todas las marcas. Trabajamos con los mejores proveedores del mercado.</p>
                    </div>
                </div>

                <!-- Envíos a nivel nacional -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-item position-relative">
                        <div class="icon">
                            <i class="bi bi-truck" style="color: #fd7e14;"></i>
                        </div>
                        <h3>Envíos a Todo el Perú</h3>
                        <p>Despachamos tu pedido a Lima, provincias y zonas rurales. Entregas rápidas, seguras y con seguimiento.</p>
                    </div>
                </div>

                <!-- Asesoría técnica -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="service-item position-relative">
                        <div class="icon">
                            <i class="bi bi-headset" style="color: #20c997;"></i>
                        </div>
                        <h3>Asesoría Técnica</h3>
                        <p>No sabes qué repuesto necesitas? Nuestro equipo te ayuda a identificarlo y elegir el correcto según tu modelo de moto.</p>
                    </div>
                </div>

                <!-- Instalación en tienda -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="service-item position-relative">
                        <div class="icon">
                            <i class="bi bi-wrench-adjustable" style="color: #df1529;"></i>
                        </div>
                        <h3>Instalación en Tienda</h3>
                        <p>En nuestra sede puedes recibir el servicio completo: compra e instalación de repuestos con técnicos especializados.</p>
                    </div>
                </div>

                <!-- Accesorios para Motos -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
                    <div class="service-item position-relative">
                        <div class="icon">
                            <i class="bi bi-lightbulb" style="color: #6610f2;"></i>
                        </div>
                        <h3>Venta de Accesorios</h3>
                        <p>Cascos, luces LED, retrovisores, alarmas, chalecos reflectantes y más para que conduzcas con seguridad y estilo.</p>
                    </div>
                </div>

                <!-- Atención personalizada -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
                    <div class="service-item position-relative">
                        <div class="icon">
                            <i class="bi bi-person-badge" style="color: #f3268c;"></i>
                        </div>
                        <h3>Atención Personalizada</h3>
                        <p>Te atendemos vía WhatsApp, redes sociales o directamente en tienda. En KIGCOL cada cliente es prioridad.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Services Section -->

    <!-- Quienes Somos Section -->
    <section id="quienessomos" class="about section">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Conócenos</h2>
            <p>¿Quiénes somos en KIGCOL?</p>
        </div>

        <div class="container">
            <div class="row gy-4 align-items-center">
                <!-- Imagen representativa -->
                <div class="col-lg-6 d-flex justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="100">
                    <img src="{{ asset('assets/img/quienes.png') }}" class="img-fluid rounded shadow" alt="Equipo técnico de KIGCOL trabajando en repuestos de moto" style="max-width: 75%;">
                </div>

                <!-- Contenido de texto -->
                <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="200">
                    <h3 class="fw-bold mb-3">Tu moto es tu pasión. La nuestra es cuidarla.</h3>
                    <p>
                        En <strong>KIGCOL</strong>, no solo vendemos repuestos: entregamos confianza y soluciones para que cada viaje sea seguro. Nos especializamos en la venta de repuestos y accesorios para motocicletas de todas las marcas, con un enfoque claro: <em>calidad, rapidez y atención personalizada</em>.
                    </p>
                    <ul class="list-unstyled">
                        <li><i class="bi bi-check2-circle text-primary me-2"></i> Amplio stock de repuestos originales y alternativos.</li>
                        <li><i class="bi bi-check2-circle text-primary me-2"></i> Asesoría gratuita para encontrar el repuesto exacto.</li>
                        <li><i class="bi bi-check2-circle text-primary me-2"></i> Envíos rápidos a todo el Perú.</li>
                    </ul>
                    <p class="mt-3">
                        Con años de experiencia en el sector, en KIGCOL entendemos que tu moto no es solo transporte: es tu estilo de vida. Por eso, trabajamos cada día para que tengas lo mejor al alcance de un clic.
                    </p>
                    <div class="d-flex gap-3">
                        <a href="#contact" class="btn btn-primary mt-3">
                            Contáctanos <i class="bi bi-arrow-right ms-1"></i>
                        </a>
                        <a href="{{ url('/dashboard') }}" class="btn mt-3" style="background-color: #5C16C5; color: white;">
                            <i class="bi bi-speedometer2 me-1"></i> Ir al Dashboard
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Quienes Somos Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Contacto</h2>
            <p>¿Tienes dudas? ¡Estamos para ayudarte!</p>
        </div>

        <div class="container" data-aos="fade" data-aos-delay="100">
            <div class="row gy-4">
                <div class="col-lg-4">
                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                        <i class="bi bi-geo-alt flex-shrink-0"></i>
                        <div>
                            <h3>Dirección</h3>
                            <p>Av. Las Motos 123, Lima, Perú</p>
                        </div>
                    </div>

                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                        <i class="bi bi-telephone flex-shrink-0"></i>
                        <div>
                            <h3>Llámanos</h3>
                            <p>+51 910 678 398</p>
                        </div>
                    </div>

                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                        <i class="bi bi-envelope flex-shrink-0"></i>
                        <div>
                            <h3>Correo</h3>
                            <p>ventas@kigcol.com</p>
                        </div>
                    </div>

                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="500">
                        <i class="bi bi-whatsapp flex-shrink-0"></i>
                        <div>
                            <h3>WhatsApp</h3>
                            <p><a href="https://wa.me/51910678398?text=Cotiza%20ahora" target="_blank">Escríbenos por WhatsApp</a></p>
                        </div>
                    </div>

                    <!-- Acceso Dashboard -->
                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="600">
                        <i class="bi bi-speedometer2 flex-shrink-0" style="color: #5C16C5;"></i>
                        <div>
                            <h3>Administración</h3>
                            <p><a href="{{ url('/dashboard') }}" class="fw-bold" style="color: #5C16C5;">Acceder al Dashboard</a></p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
                        <div class="row gy-4">
                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control" placeholder="Tu Nombre" required="">
                            </div>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" placeholder="Tu Correo" required="">
                            </div>

                            <div class="col-md-12">
                                <input type="text" class="form-control" name="subject" placeholder="¿Qué repuesto necesitas?" required="">
                            </div>

                            <div class="col-md-12">
                                <textarea class="form-control" name="message" rows="6" placeholder="Cuéntanos la marca, modelo y año de tu moto para ayudarte mejor..." required=""></textarea>
                            </div>

                            <div class="col-md-12 text-center">
                                <div class="loading">Enviando...</div>
                                <div class="error-message"></div>
                                <div class="sent-message">¡Mensaje enviado! Te responderemos lo más pronto posible.</div>

                                <button type="submit">Solicitar Cotización</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- /Contact Section -->
</main>

<footer id="footer" class="footer py-5 bg-dark text-light">
    <div class="container">
        <div class="row gy-4">
            <!-- Columna 1: Síganos -->
            <div class="col-lg-2 col-md-6">
                <h5 class="text-uppercase">Síganos</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-light"><i class="bi bi-facebook me-2"></i>Facebook</a></li>
                    <li><a href="#" class="text-light"><i class="bi bi-instagram me-2"></i>Instagram</a></li>
                    <li><a href="#" class="text-light"><i class="bi bi-whatsapp me-2"></i>WhatsApp</a></li>
                    <li><a href="#" class="text-light"><i class="bi bi-youtube me-2"></i>YouTube</a></li>
                </ul>
            </div>

            <!-- Columna 2: Menú principal -->
            <div class="col-lg-2 col-md-6">
                <h5 class="text-uppercase">Menú principal</h5>
                <ul class="list-unstyled">
                    <li><a href="#inicio" class="text-light">Inicio</a></li>
                    <li><a href="#productos" class="text-light">Catálogo</a></li>
                    <li><a href="#servicios" class="text-light">Servicios</a></li>
                    <li><a href="#contact" class="text-light">Contacto</a></li>
                    <li><a href="{{ url('/dashboard') }}" class="text-light"><i class="bi bi-speedometer2 me-1"></i> Dashboard</a></li>
                </ul>
            </div>

            <!-- Columna 3: Compañía -->
            <div class="col-lg-2 col-md-6">
                <h5 class="text-uppercase">Compañía</h5>
                <ul class="list-unstyled">
                    <li><a href="#quienessomos" class="text-light">Sobre nosotros</a></li>
                    <li><a href="#" class="text-light">Términos y condiciones</a></li>
                    <li><a href="#" class="text-light">Política de privacidad</a></li>
                </ul>
            </div>

            <!-- Columna 4: Nuestra Misión -->
            <div class="col-lg-3 col-md-6">
                <h5 class="text-uppercase">Nuestra Misión</h5>
                <p class="small text-light">
                    Nuestra misión en <strong>KIGCOL</strong> es brindarte la facilidad de encontrar los repuestos y accesorios que más necesitas sin salir de casa. Hacemos que comprar sea rápido, fácil y confiable.
                </p>
                <p class="fw-bold">¡Gracias por su preferencia!</p>
            </div>

            <!-- Columna 5: Registro de correo -->
            <div class="col-lg-3 col-md-12">
                <h5 class="text-uppercase">Registro de correo electrónico</h5>
                <p class="small">Únase a nuestro boletín y reciba actualizaciones, promociones y novedades de productos.</p>
                <form action="#" method="POST" class="d-flex flex-column flex-md-row gap-2">
                    <input type="email" name="email" class="form-control" placeholder="Tu correo electrónico" required>
                    <button type="submit" class="btn btn-primary">Suscribirse</button>
                </form>
                <div class="mt-3">
                    <a href="{{ url('/dashboard') }}" class="btn btn-light w-100">
                        <i class="bi bi-speedometer2 me-1"></i> Acceder al Dashboard
                    </a>
                </div>
            </div>
        </div>

        <hr class="my-4 border-light">

        <!-- Footer personalizado con año dinámico -->
        <div class="text-center small text-light">
            <p style="font-size: 15px; font-weight: 200; line-height: 15px; font-family: Arial;">
                Copyright &copy; 2024 - <span id="currentYear"></span> KIGCOL |
                Desarrollado por <a href="#inicio" style="color: #fff; text-decoration: none;"><u>RonaldoDV</u></a>
            </p>
        </div>
    </div>
</footer>

<!-- Botón de acceso flotante al Dashboard -->
<a href="{{ url('/dashboard') }}" id="dashboard-floating" class="dashboard-floating d-flex align-items-center justify-content-center" style="position: fixed; bottom: 80px; right: 20px; z-index: 10000; background: #5C16C5; color: white; border-radius: 50%; width: 60px; height: 60px; box-shadow: 0 4px 12px rgba(0,0,0,0.3);">
    <i class="bi bi-speedometer2" style="font-size: 1.8rem;"></i>
</a>

<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- WhatsApp button -->
<a href="https://wa.me/51910678398?text=Cotiza%20ahora" id="chat-button" class="chat-btn d-flex align-items-center justify-content-center"
   style="position: fixed; bottom: 20px; right: 20px; z-index: 10000; background: #25D366; color: white; border-radius: 50%; width: 60px; height: 60px; box-shadow: 0 4px 12px rgba(0,0,0,0.3);">
    <i class="bi bi-whatsapp" style="font-size: 1.8rem;"></i>
</a>

<!-- Botón flotante de Chat Bot -->
<div id="chat-bot-button" class="chat-bot-animation" onclick="openChat()">
    <i class="bi bi-chat-dots" style="font-size: 1.8rem;"></i>
</div>

<!-- Chat Box -->
<div id="chat-box">
    <div id="chat-header">
        <h4><i class="bi bi-robot me-2"></i>Asistente KIGCOL</h4>
        <button id="chat-close" onclick="closeChat()">
            <i class="bi bi-x-lg"></i>
        </button>
    </div>
    <div id="chat-body">
        <p><strong>IA:</strong> ¡Hola! Soy el asistente virtual de KIGCOL. ¿En qué puedo ayudarte a encontrar repuestos para tu moto hoy?</p>
    </div>
    <div id="chat-input">
        <input type="text" id="userInput" placeholder="Escribe tu mensaje aquí..." onkeypress="if(event.key==='Enter') sendMessage()">
        <button id="sendButton" onclick="sendMessage()">
            <i class="bi bi-send"></i>
        </button>
    </div>
</div>

<!-- Preloader -->
<div id="preloader"></div>

<!-- Vendor JS Files -->
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
<script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
<script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ asset('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

<!-- Main JS File -->
<script src="{{ asset('assets/js/main.js') }}"></script>
<script>
    // Script para año dinámico
    document.getElementById("currentYear").textContent = new Date().getFullYear();

    // Chat Bot Functions
    function openChat() {
        document.getElementById("chat-box").style.display = "flex";
        document.getElementById("chat-bot-button").classList.remove("chat-bot-animation");
    }

    function closeChat() {
        document.getElementById("chat-box").style.display = "none";
        document.getElementById("chat-bot-button").classList.add("chat-bot-animation");
    }

    window.addEventListener("load", function () {
        document.getElementById("preloader").style.display = "none";
    });

    // Configura aquí tu API key (en producción, esto debería manejarse de forma segura en el backend)
    const apiKey = "Tu-API-Key-Aquí";

    async function sendMessage() {
        const input = document.getElementById("userInput");
        const userMessage = input.value.trim();
        if (!userMessage) return;

        const chatBody = document.getElementById("chat-body");
        chatBody.innerHTML += `<p><strong>Tú:</strong> ${userMessage}</p>`;
        input.value = '';
        chatBody.scrollTop = chatBody.scrollHeight;

        try {
            const response = await fetch('https://api.groq.com/openai/v1/chat/completions', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': `Bearer ${apiKey}`
                },
                body: JSON.stringify({
                    model: 'llama3-8b-8192',
                    messages: [
                        { role: 'system', content: 'Eres un asistente virtual amigable de KIGCOL, especializado en guiar a los clientes a encontrar repuestos para motos en Perú.' },
                        { role: 'user', content: userMessage }
                    ]
                })
            });

            const data = await response.json();
            const iaMessage = data.choices[0].message.content;
            chatBody.innerHTML += `<p><strong>IA:</strong> ${iaMessage}</p>`;
            chatBody.scrollTop = chatBody.scrollHeight;
        } catch (error) {
            chatBody.innerHTML += `<p><strong>IA:</strong> Lo siento, hubo un error al conectar con el servidor.</p>`;
        }
    }

    // Si quieres una experiencia de chat básica sin depender de la API durante el desarrollo:
    /*
    function sendMessage() {
        const input = document.getElementById("userInput");
        const userMessage = input.value.trim();
        if (!userMessage) return;

        const chatBody = document.getElementById("chat-body");
        chatBody.innerHTML += `<p><strong>Tú:</strong> ${userMessage}</p>`;
        input.value = '';

        // Respuesta simulada del bot
        setTimeout(() => {
            chatBody.innerHTML += `<p><strong>IA:</strong> Gracias por tu mensaje. Estamos procesando tu consulta sobre "${userMessage}". Un asesor de KIGCOL te contactará pronto.</p>`;
            chatBody.scrollTop = chatBody.scrollHeight;
        }, 1000);
    }
    */
</script>
</body>
</html>
