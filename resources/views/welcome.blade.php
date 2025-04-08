<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <link rel="stylesheet" href="{{ asset(path: 'css/navbar.css') }}">
    
    <!-- Hero Section -->
    <section class="hero-section" id="about">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 hero-content">
                    <h1 class="mb-4 text-white">Arrestantencomplex Houten</h1>
                    <p class="lead mb-4">Een innovatief politiecomplex ontworpen voor hoge functionaliteit, veiligheid en duurzaamheid in een architectonisch hoogwaardig gebouw.</p>
                    <a href="#features" class="btn btn-light btn-lg px-4 mt-3">
                        <i class="fas fa-eye me-2"></i>Ontdek meer
                    </a>
                </div>
                <div class="col-lg-6">
                    <div class="rounded-custom custom-shadow overflow-hidden">
                        <img src="{{ asset('static/assets/building-picture.jpg') }}" alt="Buitenkant Arrestantencomplex" class="img-fluid w-100" style="object-fit: cover; height: 300px;">
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Complex Information -->
    <section class="container mb-5">
        <div class="row">
            <div class="col-lg-8">
                <h2 class="section-title">Over het Complex</h2>
                <p class="lead">Voor de politie is het Arrestantencomplex te Houten ontworpen als een state-of-the-art faciliteit voor de nationale veiligheidsketen.</p>
                <p>In het complex zijn 105 politiecellen met nevenruimten opgenomen. Verder is er een totale verhoorfaciliteit ingericht met twintig verhoorkamers en twee verhoorstudio's. De combinatie van functionaliteit en design maakt dit gebouw uniek in Nederland.</p>
                
                <div class="quote">
                    <p>"Het complex ademt rust uit en het heeft een soort alzijdigheid. Het totaal is zeer hoogwaardig vormgegeven."</p>
                    <p>"Het complex ziet er op het eerste gezicht simpel uit, maar is toch in de vormgeving en materiaalkeuze hoogwaardig. Bovendien is de routing in het gebouw vanwege tal van veiligheidsaspecten complex."</p>
                    <small>- Welstand en Monumenten Midden Nederland, juni 2006</small>
                </div>
                
                <p>De routing en functionele layout van alle faciliteiten is ontworpen en gebouwd om het proces van de gebruiker heen. Hierin is verzorgen en verhoren als duidelijke scheiding in de routing opgenomen, wat de efficiëntie en veiligheid van het complex verhoogt.</p>
            </div>
            <div class="col-lg-4">
                <div class="rounded-custom custom-shadow overflow-hidden">
                    <img src="{{ asset('static/assets/window-picture.jpg') }}" alt="Architectonisch detail" class="img-fluid w-100" style="object-fit: cover; height: 250px;">
                </div>
                <div class="card mt-4 card-accent custom-shadow">
                    <div class="card-header">
                        <i class="fas fa-award me-2"></i> Erkenning
                    </div>
                    <div class="card-body">
                        <p>Verkozen tot plan van de maand door Welstand en Monumenten Midden Nederland in juni 2006 vanwege de uitzonderlijke vormgeving en functionaliteit.</p>
                        <a href="#" class="btn btn-sm btn-primary mt-2">Meer informatie</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <div class="separator"></div>
    
    <!-- Features Section -->
    <section class="bg-pattern py-5" id="features">
        <div class="container">
            <h2 class="section-title text-center mb-5">Faciliteiten in het Complex</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="mb-0 rounded-bottom-0 overflow-hidden">
                            <img src="{{ asset('static/assets/cels-picture.jpg') }}" alt="Cellenvleugel" class="img-fluid w-100" style="object-fit: cover; height: 200px;">
                        </div>
                        <div class="card-body">
                            <div class="text-center my-2">
                                <i class="fas fa-building feature-icon"></i>
                            </div>
                            <h5 class="card-title text-center">Detentiefaciliteiten</h5>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">105 cellen</li>
                                <li class="list-group-item">10 intake cellen</li>
                                <li class="list-group-item">Dagverblijven en luchtplaatsen</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="mb-0 rounded-bottom-0 overflow-hidden">
                            <img src="{{ asset('static/assets/sketch-picture.jpg') }}" alt="Verhoorkamer" class="img-fluid w-100" style="object-fit: cover; height: 200px;">
                        </div>
                        <div class="card-body">
                            <div class="text-center my-2">
                                <i class="fas fa-comments feature-icon"></i>
                            </div>
                            <h5 class="card-title text-center">Verhoorfaciliteiten</h5>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">20 verhoorkamers</li>
                                <li class="list-group-item">2 digitale verhoorstudio's</li>
                                <li class="list-group-item">Geavanceerde opname-apparatuur</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="mb-0 rounded-bottom-0 overflow-hidden">
                            <img src="{{ asset('static/assets/lobby-picture.jpg') }}" alt="Kantooromgeving" class="img-fluid w-100" style="object-fit: cover; height: 200px;">
                        </div>
                        <div class="card-body">
                            <div class="text-center my-2">
                                <i class="fas fa-briefcase feature-icon"></i>
                            </div>
                            <h5 class="card-title text-center">Ondersteunende ruimten</h5>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Advocatenruimten</li>
                                <li class="list-group-item">Familieruimten</li>
                                <li class="list-group-item">Kantooromgeving ingericht volgens 'Het Nieuwe Werken'</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-5">
                <p class="lead">Een bijzonder project met hoge functionaliteit, technisch innovatief en duurzaam doordacht materiaalgebruik.</p>
                <a href="#" class="btn btn-primary mt-3">Bekijk alle faciliteiten</a>
            </div>
        </div>
    </section>
    
    <!-- History Timeline -->
    <section class="timeline-section" id="history">
        <div class="container">
            <h2 class="section-title text-center mb-5">Historie van de Nederlandse Politie</h2>
            
            <div class="row mb-5 align-items-center">
                <div class="col-lg-6">
                    <div class="rounded-custom custom-shadow overflow-hidden">
                        <img src="{{ asset('static/assets/outside-picture.jpg') }}" alt="Historische afbeelding" class="img-fluid w-100" style="object-fit: cover; height: 250px;">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="timeline-item">
                        <h4><i class="fas fa-calendar-alt me-2"></i>18e eeuw</h4>
                        <p>De handhaving van de openbare orde was van oudsher een taak van de schout. Maar deze kon nooit overal tegelijk zijn en had meerdere taken. Wanneer er in de 18e eeuw een probleem was met bedelaars of landlopers, kreeg de schout hulp van weerbare mannen.</p>
                    </div>
                </div>
            </div>
    
            <div class="row mb-5 align-items-center">
                <div class="col-lg-6 order-lg-2">
                    <div class="rounded-custom custom-shadow overflow-hidden">
                        <img src="{{ asset('static/assets/new-hallway-picture.jpg') }}" alt="Politie onder Napoleon" class="img-fluid w-100" style="object-fit: cover; height: 250px;">
                    </div>
                </div>
                <div class="col-lg-6 order-lg-1">
                    <div class="timeline-item">
                        <h4><i class="fas fa-calendar-alt me-2"></i>1811</h4>
                        <p>In maart 1811 richt Keizer Napoleon een politiemacht naar Frans model in. Er komt op het platteland een boswachter en een veldwachter. Het zijn vaak oud-militairen die in deze functie stappen. Ze waren onbewapend en bij grotere overtredingen moest de gendarmerie uit de stad erbij worden gehaald.</p>
                    </div>
                </div>
            </div>
    
            <div class="row mb-5 align-items-center">
                <div class="col-lg-6">
                    <div class="rounded-custom custom-shadow overflow-hidden">
                        <img src="{{ asset('static/assets/building-picture.jpg') }}" alt="19e-eeuwse veldwachter" class="img-fluid w-100" style="object-fit: cover; height: 250px;">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="timeline-item">
                        <h4><i class="fas fa-calendar-alt me-2"></i>19e eeuw</h4>
                        <p>Naarmate de 19e eeuw vordert, wordt de positie van veldwachter professioneler. De veldwachter krijgt een sabel, helm en later een revolver. Ook krijgt hij vergoedingen, maar echt hoog is het loon niet.</p>
                    </div>
                </div>
            </div>
    
            <div class="row mb-5 align-items-center">
                <div class="col-lg-6 order-lg-2">
                    <div class="rounded-custom custom-shadow overflow-hidden">
                        <img src="{{ asset('static/assets/sketch-picture.jpg') }}" alt="Politie tijdens WO II" class="img-fluid w-100" style="object-fit: cover; height: 250px;">
                    </div>
                </div>
                <div class="col-lg-6 order-lg-1">
                    <div class="timeline-item">
                        <h4><i class="fas fa-calendar-alt me-2"></i>1940-1945</h4>
                        <p>Op 5 juli 1940 voegt de Duitse bezetter de marechaussee in Nederland organisatorisch samen met de rijksveldwacht en de gemeenteveldwacht. Op 1 december 1942 wordt de functie van gemeenteveldwachter opgeheven. De veldwachters bleven wel in dienst, maar als politieagent.</p>
                    </div>
                </div>
            </div>
    
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="rounded-custom custom-shadow overflow-hidden">
                        <img src="{{ asset('static/assets/lobby-picture.jpg') }}" alt="Naoorlogse politie" class="img-fluid w-100" style="object-fit: cover; height: 250px;">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="timeline-item">
                        <h4><i class="fas fa-calendar-alt me-2"></i>Na de Tweede Wereldoorlog</h4>
                        <p>Na de tweede wereldoorlog wordt het politieapparaat opgebouwd. De bevolking heeft wantrouwen tegen de politie, omdat die had samengewerkt met de Duitsers.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Additional Features (Pictograms) -->
    <section class="container py-5">
        <div class="text-center mb-5">
            <h2 class="section-title d-inline-block">Kenmerken</h2>
        </div>
        
        <div class="row g-4 text-center">
            <div class="col-md-3 col-6">
                <div class="p-4 bg-white rounded-custom custom-shadow h-100">
                    <i class="fas fa-shield-alt fa-3x mb-3" style="color: var(--secondary);"></i>
                    <h5>Veiligheid</h5>
                    <p class="mb-0">Geavanceerde veiligheidsmaatregelen</p>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="p-4 bg-white rounded-custom custom-shadow h-100">
                    <i class="fas fa-route fa-3x mb-3" style="color: var(--secondary);"></i>
                    <h5>Routing</h5>
                    <p class="mb-0">Doordachte looplijnen en processen</p>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="p-4 bg-white rounded-custom custom-shadow h-100">
                    <i class="fas fa-leaf fa-3x mb-3" style="color: var(--secondary);"></i>
                    <h5>Duurzaam</h5>
                    <p class="mb-0">Milieuvriendelijke materialen</p>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="p-4 bg-white rounded-custom custom-shadow h-100">
                    <i class="fas fa-lightbulb fa-3x mb-3" style="color: var(--secondary);"></i>
                    <h5>Innovatief</h5>
                    <p class="mb-0">Moderne technologieën</p>
                </div>
            </div>
        </div>
    </section>
    
    <!-- CTA Section -->
    <section class="py-5" style="background-color: var(--very-light-brown);">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h3 class="mb-4" style="color: var(--primary);">Een mijlpaal in politie-infrastructuur</h3>
                    <p class="lead mb-4">Het Arrestantencomplex Houten combineert veiligheid, efficiëntie en modern design in één hoogwaardig gebouw.</p>
                    <button class="btn btn-lg btn-primary px-5 py-3">Meer informatie</button>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4 mb-md-0">
                    <h5 class="footer-heading">Arrestantencomplex Houten</h5>
                    <p>Een modern politiecomplex ontworpen voor functionaliteit en veiligheid.</p>
                    <div class="mt-4">
                        <a href="#" class="btn btn-outline-light me-2"><i class="fas fa-info-circle"></i></a>
                        <a href="#" class="btn btn-outline-light me-2"><i class="fas fa-envelope"></i></a>
                        <a href="#" class="btn btn-outline-light"><i class="fas fa-map-marker-alt"></i></a>
                    </div>
                </div>
                <div class="col-md-4 mb-4 mb-md-0">
                    <h5 class="footer-heading">Quick Links</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#about" class="text-white text-decoration-none">Over het complex</a></li>
                        <li class="mb-2"><a href="#features" class="text-white text-decoration-none">Faciliteiten</a></li>
                        <li class="mb-2"><a href="#history" class="text-white text-decoration-none">Historie</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Contact</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5 class="footer-heading">Contact</h5>
                    <address class="mb-0">
                        <p><i class="fas fa-map-marker-alt me-2"></i> Arrestantencomplex Houten</p>
                        <p><i class="fas fa-phone me-2"></i> 030-XXX XXXX</p>
                        <p><i class="fas fa-envelope me-2"></i> info@example.com</p>
                    </address>
                </div>
            </div>
            <hr style="border-color: var(--secondary); opacity: 0.3; margin: 30px 0;">
            <div class="row">
                <div class="col-md-6">
                    <p class="mb-0">© 2025 HekkenSluiter</p>
                </div>
            </div>
        </div>
    </footer>
</x-app-layout>