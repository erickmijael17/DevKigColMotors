<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Index - Ronko Bootstrap Template</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/kigcolfavi.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Selecao
  * Template URL: https://bootstrapmade.com/selecao-bootstrap-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 class="sitename">KIGCOL</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#inicio" class="active">Inico</a></li>
          <li><a href="#productos">Productos</a></li>
          <li><a href="#quienessomos">¿Quienes Somos?</a></li>
          <li><a href="#servicios">Servicios</a></li>
          <li><a href="#contact">Contactanos</a></li>
          @if (Route::has('login'))
            <nav class="d-flex">
                @auth
                    <a class="cta-btn" href="{{ url('/dashboard') }}">Dashboard</a>
                @else
                    <a class="cta-btn" href="{{ route('login') }}">Log in</a>
                    @if (Route::has('register'))
                        <a class="cta-btn" href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </nav>
        @endif

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
        <img src="assets/img/offronko.png" class="d-block w-100 h-100 object-fit-cover" alt="Fondo 1">
      </div>
      <div class="carousel-item">
        <img src="assets/img/ronkooff.png" class="d-block w-100 h-100 object-fit-cover" alt="Fondo 2">
      </div>
      <div class="carousel-item">
        <img src="assets/img/ofronko.png" class="d-block w-100 h-100 object-fit-cover" alt="Fondo 3">
      </div>
    </div>
  </div>

  <!-- Carrusel de contenido -->
  <div id="hero-carousel" data-bs-interval="5000" class="container carousel carousel-fade position-relative z-2" data-bs-ride="carousel">
    <!-- Slide 1 -->
    <div class="carousel-item active">
      <div class="carousel-container text-center text-white">
        <a href="https://wa.me/51910678398?text=Cotiza%20ahora" href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Cotiza ahora</a>

      </div>
    </div>

    <!-- Slide 2 -->
    <div class="carousel-item">
      <div class="carousel-container text-center text-white">
        <a href="https://wa.me/51910678398?text=Cotiza%20ahora" href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Cotiza ahora</a>
      </div>
    </div>

    <!-- Slide 3 -->
    <div class="carousel-item">
      <div class="carousel-container text-center text-white">
        <a href="https://wa.me/51910678398?text=Cotiza%20ahora" href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Cotiza ahora</a>
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
</section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="productos" class="portfolio section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Productos</h2>
    <p>Explora nuestro catálogo</p>
  </div>

  <div class="container">

    <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

      <!-- Filtros de categoría -->
      <ul class="portfolio-filters isotope-filters text-center mb-4" data-aos="fade-up" data-aos-delay="100">
        <li data-filter="*" class="filter-active">Todos</li>
        <li data-filter=".filter-cascos">Cascos</li>
        <li data-filter=".filter-aceite">Aceite</li>
        <li data-filter=".filter-accesorios">Accesorios</li>
        <li data-filter=".filter-luces">Luces</li>
      </ul>

      <!-- Galería de productos -->
      <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">

        <!-- Producto: Casco -->
        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-cascos">
          <div class="card border-0 shadow">
            <img src="assets/img/productos/casco1.jpg" class="card-img-top" alt="Casco deportivo">
            <div class="card-body">
              <h5 class="card-title">Casco Deportivo Pro</h5>
              <p class="card-text">Protección máxima con diseño aerodinámico.</p>
              <span class="badge bg-success mb-2">S/ 180.00</span>
              <div class="d-flex justify-content-between">
                <a href="assets/img/casco.jpg" class="glightbox preview-link" data-gallery="portfolio-gallery-cascos" title="Casco Deportivo Pro">
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
            <img src="assets/img/productos/aceite1.jpg" class="card-img-top" alt="Aceite para motor">
            <div class="card-body">
              <h5 class="card-title">Aceite Motor 4T 20W50</h5>
              <p class="card-text">Lubricación premium para motores exigentes.</p>
              <span class="badge bg-success mb-2">S/ 35.00</span>
              <div class="d-flex justify-content-between">
                <a href="assets/img/aceite.avif" class="glightbox preview-link" data-gallery="portfolio-gallery-aceite" title="Aceite Motor 4T">
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
            <img src="assets/img/productos/accesorio1.jpg" class="card-img-top" alt="Retrovisor deportivo">
            <div class="card-body">
              <h5 class="card-title">Retrovisor Deportivo LED</h5>
              <p class="card-text">Visibilidad y estilo en cada recorrido.</p>
              <span class="badge bg-success mb-2">S/ 55.00</span>
              <div class="d-flex justify-content-between">
                <a href="assets/img/retrovisor.avif" class="glightbox preview-link" data-gallery="portfolio-gallery-accesorios" title="Retrovisor LED">
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
            <img src="assets/img/productos/luces1.jpg" class="card-img-top" alt="Foco LED alta intensidad">
            <div class="card-body">
              <h5 class="card-title">Foco LED Alta Intensidad</h5>
              <p class="card-text">Ilumina el camino con potencia y estilo.</p>
              <span class="badge bg-success mb-2">S/ 28.00</span>
              <div class="d-flex justify-content-between">
                <a href="assets/img/led.avif" class="glightbox preview-link" data-gallery="portfolio-gallery-luces" title="Foco LED">
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

      </div><!-- End Portfolio Container -->

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
            <img src="assets/img/ser.png" alt="Repuestos para motocicleta" class="img-fluid rounded shadow" style="max-height: 350px; object-fit: cover;">
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
            <img src="assets/img/working-envios.jpg" alt="Reparto nacional de repuestos" class="img-fluid rounded shadow" style="max-height: 350px; object-fit: cover;">
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
            <img src="assets/img/noser.png" alt="Asesoría técnica de motos" class="img-fluid rounded shadow" style="max-height: 350px; object-fit: cover;">
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
            <img src="assets/img/serviciews.png" alt="Garantía de repuestos de moto" class="img-fluid rounded shadow" style="max-height: 350px; object-fit: cover;">
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
          <div class="col-xl-9 text-center text-xl-start">
            <h3>¿No encuentras lo que buscas? ¡Escríbenos!</h3>
            <p>Un asesor de KIGCOL está listo para ayudarte a encontrar el repuesto exacto para tu moto. Escríbenos y te respondemos en minutos.</p>
          </div>
          <div class="col-xl-3 cta-btn-container text-center">
            <a href="https://wa.me/51910678398?text=Cotiza%20ahora" class="cta-btn align-middle" href="#">Chatear con un asesor ahora</a>
          </div>
        </div>


      </div>

    </section>
    <section id="call-to-action" class="call-to-action section dark-background">
  <div class="container">
    <div class="row justify-content-center text-center" data-aos="zoom-in" data-aos-delay="100">
      <div class="col-xl-9">
        <h3>¿Buscas un repuesto específico? Nosotros te ayudamos</h3>
        <p>Déjanos tu correo y uno de nuestros expertos en KIGCOL te enviará en minutos la información exacta del repuesto que necesitas. Sin compromiso, sin perder tiempo.</p>
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

    <!-- Portfolio Section -->
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
  <img src="assets/img/quienes.png" class="img-fluid rounded shadow" alt="Equipo técnico de KIGCOL trabajando en repuestos de moto" style="max-width: 75%;">
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
        <a href="#contact" class="btn btn-primary mt-3">
          Contáctanos <i class="bi bi-arrow-right ms-1"></i>
        </a>
      </div>

    </div>

  </div>

</section>
<!-- /Portfolio Section -->

    <!-- Testimonials Section -->
    <!-- /Testimonials Section -->

    <!-- Pricing Section -->

<!-- /Pricing Section -->

    <!-- Faq Section -->
    <!-- /Team Section -->

    <!-- Recent Posts Section -->
    <!-- /Recent Posts Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Contacto</h2>
    <p>¿Tienes dudas? ¡Estamos para ayudarte!</p>
  </div><!-- End Section Title -->

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
      </div><!-- End Contact Form -->

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
          <li><a href="#" class="text-light">Inicio</a></li>
          <li><a href="#" class="text-light">Catálogo</a></li>
          <li><a href="#" class="text-light">Blog</a></li>
          <li><a href="#" class="text-light">Contacto</a></li>
        </ul>
      </div>

      <!-- Columna 3: Compañía -->
      <div class="col-lg-2 col-md-6">
        <h5 class="text-uppercase">Compañía</h5>
        <ul class="list-unstyled">
          <li><a href="#" class="text-light">Sobre nosotros</a></li>
          <li><a href="#" class="text-light">Carreras</a></li>
          <li><a href="#" class="text-light">Aviso</a></li>
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
        <form action="https://example.com/registro" method="POST" class="d-flex flex-column flex-md-row gap-2">
          <input type="email" name="email" class="form-control" placeholder="Tu correo electrónico" required>
          <button type="submit" class="btn btn-primary">Suscribirse</button>
        </form>
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
<script>
  // Script para año dinámico
  document.getElementById("currentYear").textContent = new Date().getFullYear();
</script>
  </div>
</footer>



<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
<a href="javascript:void(0);" id="chat-button" class="chat-btn d-flex align-items-center justify-content-center"
   onclick="openChat()" style="position: fixed; bottom: 20px; right: 20px; z-index: 10000; background: #007bff; color: white; border-radius: 50%; width: 50px; height: 50px; box-shadow: 0 4px 12px rgba(0,0,0,0.3);">
  <i class="bi bi-robot" style="font-size: 1.5rem;"></i>
</a>

<!-- Ventana flotante de chat -->
<div id="chat-box" class="chat-box shadow-lg" style="display: none; position: fixed; bottom: 80px; right: 20px; width: 300px; background: white; border-radius: 8px; z-index: 10000; box-shadow: 0 4px 12px rgba(0,0,0,0.2); flex-direction: column;">
  <div class="chat-header bg-primary text-white p-2 d-flex justify-content-between align-items-center">
    <span>Asistente Virtual</span>
    <button class="btn btn-sm btn-light" onclick="closeChat()">✕</button>
  </div>
  <div id="chat-body" class="chat-body p-3" style="height: 200px; overflow-y: auto;">
    <p><strong>IA:</strong> ¡Hola! ¿En qué puedo ayudarte hoy?</p>
  </div>
  <div class="chat-footer p-2">
    <input type="text" id="userInput" class="form-control" placeholder="Escribe tu mensaje..." onkeydown="if(event.key === 'Enter') sendMessage()">
  </div>
</div>

<!-- Preloader -->
<div id="preloader"></div>

<!-- Vendor JS Files -->
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

<!-- Main JS File -->
<script src="assets/js/main.js"></script>
<script>

  function openChat() {
    document.getElementById("chat-box").style.display = "flex";
  }

  function closeChat() {
    document.getElementById("chat-box").style.display = "none";
  }

  window.addEventListener("load", function () {
    document.getElementById("preloader").style.display = "none";
  });

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
</script>

</body>

</html>
