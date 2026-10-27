@extends('admin.layouts.app')

@section('title', 'Personalización Total del Sitio Web')
@section('page_title', 'Administración y Edición de Contenido (100% Editable)')

@section('breadcrumb')
    <li class="breadcrumb-item active">Personalizar Web</li>
@endsection

@section('content')
@php
    $currentTab = request('tab', 'tab-home');
@endphp
<form action="{{ route('admin.settings.update') }}" method="POST" id="settings-form" enctype="multipart/form-data" novalidate>
    @csrf
    <input type="hidden" name="_active_tab" id="active_tab_input" value="{{ $currentTab }}">

    <div class="row">
        <div class="col-12">
            <!-- Header bar with save button -->
            <div class="card card-outline card-primary shadow-sm mb-3">
                <div class="card-body py-2 px-3 d-flex flex-column flex-md-row justify-content-between align-items-center">
                    <div class="mb-2 mb-md-0">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-edit text-primary mr-2" style="font-size: 0.95rem;"></i>
                            <h2 class="font-weight-bold text-dark mb-0" style="font-size: 0.9rem;">
                                Centro de Control: Ajustes Generales de la Firma
                            </h2>
                        </div>
                        <p class="text-muted text-xs mb-0 mt-1" style="font-size: 0.72rem;">
                            Modifique cualquier texto, titular, frase, métrica o imagen. Todos los cambios se reflejan inmediatamente en la web.
                        </p>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary btn-sm shadow-sm font-weight-bold px-3">
                            <i class="fas fa-save mr-1"></i> Guardar Cambios
                        </button>
                    </div>
                </div>
            </div>

            <!-- Main Tabbed Settings Card -->
            <div class="card card-outline card-primary shadow-sm">
                <div class="card-header p-0 border-bottom-0">
                    <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link py-2 px-3 font-weight-semibold {{ $currentTab === 'tab-home' ? 'active' : '' }}" id="tab-home-tab" data-toggle="pill" href="#tab-home" role="tab">
                                <i class="fas fa-home text-primary mr-1"></i> 1. Inicio & Portada
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link py-2 px-3 font-weight-semibold {{ $currentTab === 'tab-fundamentos' ? 'active' : '' }}" id="tab-fundamentos-tab" data-toggle="pill" href="#tab-fundamentos" role="tab">
                                <i class="fas fa-th-large text-primary mr-1"></i> 2. Fundamentos
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link py-2 px-3 font-weight-semibold {{ $currentTab === 'tab-metodo' ? 'active' : '' }}" id="tab-metodo-tab" data-toggle="pill" href="#tab-metodo" role="tab">
                                <i class="fas fa-project-diagram text-primary mr-1"></i> 3. Método DIMO
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link py-2 px-3 font-weight-semibold {{ $currentTab === 'tab-x' ? 'active' : '' }}" id="tab-x-tab" data-toggle="pill" href="#tab-x" role="tab">
                                <i class="fab fa-twitter text-primary mr-1"></i> 4. Monitoreo X
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link py-2 px-3 font-weight-semibold {{ $currentTab === 'tab-about' ? 'active' : '' }}" id="tab-about-tab" data-toggle="pill" href="#tab-about" role="tab">
                                <i class="fas fa-landmark text-primary mr-1"></i> 5. Nuestra Firma
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link py-2 px-3 font-weight-semibold {{ $currentTab === 'tab-contact' ? 'active' : '' }}" id="tab-contact-tab" data-toggle="pill" href="#tab-contact" role="tab">
                                <i class="fas fa-map-marker-alt text-primary mr-1"></i> 6. Contacto & Sede
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link py-2 px-3 font-weight-semibold {{ $currentTab === 'tab-footer' ? 'active' : '' }}" id="tab-footer-tab" data-toggle="pill" href="#tab-footer" role="tab">
                                <i class="fas fa-shoe-prints text-primary mr-1"></i> 7. Pie de Página
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body p-3">
                    <div class="tab-content" id="custom-tabs-four-tabContent">

                        <!-- TAB 1: INICIO & PORTADA -->
                        <div class="tab-pane fade {{ $currentTab === 'tab-home' ? 'show active' : '' }}" id="tab-home" role="tabpanel">
                            <div class="section-header-banner">
                                <i class="fas fa-compass mr-1"></i> Identidad Institucional & Portada Principal
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Nombre Completo de la Firma</label>
                                        <input type="text" name="firm_name" class="form-control" value="{{ $settings['firm_name'] ?? 'M&C LEGAL GROUP' }}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Nombre Corto / Sigla</label>
                                        <input type="text" name="firm_short_name" class="form-control" value="{{ $settings['firm_short_name'] ?? 'M&C LEGAL GROUP' }}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Año de Fundación</label>
                                        <input type="text" name="since_year" class="form-control" value="{{ $settings['since_year'] ?? '1994' }}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold text-primary">Slogan Oficial (Bajo el Logo en Header y Footer)</label>
                                <input type="text" name="firm_slogan" class="form-control font-weight-bold" value="{{ $settings['firm_slogan'] ?? 'La Ciencia del Derecho aplicada a la Certeza de su Defensa.' }}">
                                <small class="text-muted">Se muestra debajo del logo en la barra de navegación, menú móvil y pie de página.</small>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Badge Superior de la Portada</label>
                                <input type="text" name="hero_badge" class="form-control" value="{{ $settings['hero_badge'] ?? 'Desde 1994 • Alta Precisión Forense' }}">
                            </div>

                            <div class="row">
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Titular Principal de Portada (Hero Title)</label>
                                        <input type="text" name="hero_title" class="form-control" value="{{ $settings['hero_title'] ?? 'Arquitectura Jurídica Superior y Control Integral de Riesgos Legales' }}">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Subtítulo Resaltado (Itálica y Subrayado)</label>
                                        <input type="text" name="hero_subtitle" class="form-control" value="{{ $settings['hero_subtitle'] ?? 'Garantizamos la Máxima Tutela de sus Derechos' }}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Frase Descriptiva de la Portada</label>
                                <textarea name="hero_phrase" rows="2" class="form-control">{{ $settings['hero_phrase'] ?? 'Mediante el Diseño de Metodologías Operativas Orientadas a la Eficacia Procesal y la Prevalencia de la Seguridad Jurídica en Escenarios de Alta Conflictividad.' }}</textarea>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Descripción Adicional de Portada</label>
                                <textarea name="hero_description" rows="2" class="form-control">{{ $settings['hero_description'] ?? 'En M&C LEGAL GROUP, integramos la tradición jurídica con una visión moderna y ágil para ofrecer soluciones estratégicas en un mercado global cambiante.' }}</textarea>
                            </div>

                            @include('admin.components.image-picker', [
                                'name' => 'hero_image',
                                'fileInputName' => 'hero_image_file',
                                'removeInputName' => 'remove_hero_image',
                                'label' => 'Imagen de Portada (Biblioteca / Despacho)',
                                'aspect' => 'landscape',
                                'value' => $settings['hero_image'] ?? '',
                                'helpText' => 'Fotografía que aparece en el cuadrante inferior de la portada principal (Home).'
                            ])

                            <h5 class="text-primary font-weight-bold border-bottom pb-2 mb-3 mt-4">
                                <i class="fas fa-chart-line mr-1"></i> Bloque Lateral de Slogan & Métrica
                            </h5>

                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Descripción en Cuadrante Azul Doctrinal</label>
                                        <input type="text" name="slogan_desc" class="form-control" value="{{ $settings['slogan_desc'] ?? 'Nuestros procesos están blindados por estándares dogmáticos y rigor ético inexpugnable.' }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Tasa de Casos Exitosos (%)</label>
                                        <div class="input-group">
                                            <input type="number" name="success_rate" class="form-control" min="1" max="100" value="{{ $settings['success_rate'] ?? '98' }}">
                                            <div class="input-group-append"><span class="input-group-text">%</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Etiqueta de la Métrica (Stats Label)</label>
                                        <input type="text" name="stats_label" class="form-control" value="{{ $settings['stats_label'] ?? 'Casos Exitosos' }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Descripción de la Métrica (Stats Desc)</label>
                                        <input type="text" name="stats_desc" class="form-control" value="{{ $settings['stats_desc'] ?? 'Prevalencia de seguridad jurídica en litigios de alta cuantía.' }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- TAB 2: FUNDAMENTOS -->
                        <div class="tab-pane fade {{ $currentTab === 'tab-fundamentos' ? 'show active' : '' }}" id="tab-fundamentos" role="tabpanel">
                            <div class="section-header-banner">
                                <i class="fas fa-th-large mr-1"></i> Recuadro 2: Fundamentos de Excelencia Jurídica (4 Cuadrantes Horizontales)
                            </div>

                            <div class="row">
                                <!-- Fundamento 1 -->
                                <div class="col-md-6 mb-3">
                                    <div class="p-3 bg-light rounded border">
                                        <h6 class="font-weight-bold text-primary mb-2"><i class="fas fa-book mr-1"></i> Cuadrante 1</h6>
                                        <div class="form-group mb-2">
                                            <label class="text-xs font-weight-bold text-uppercase">Título</label>
                                            <input type="text" name="fundamento_1_title" class="form-control" value="{{ $settings['fundamento_1_title'] ?? 'Rigor Normativo' }}">
                                        </div>
                                        <div class="form-group mb-0">
                                            <label class="text-xs font-weight-bold text-uppercase">Descripción</label>
                                            <textarea name="fundamento_1_desc" rows="3" class="form-control">{{ $settings['fundamento_1_desc'] ?? 'Nuestra práctica se fundamenta en un estudio exhaustivo y milimétrico de la norma colombiana, garantizando que cada estrategia esté blindada por la dogmática jurídica más sólida.' }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <!-- Fundamento 2 -->
                                <div class="col-md-6 mb-3">
                                    <div class="p-3 bg-light rounded border">
                                        <h6 class="font-weight-bold text-primary mb-2"><i class="fas fa-brain mr-1"></i> Cuadrante 2</h6>
                                        <div class="form-group mb-2">
                                            <label class="text-xs font-weight-bold text-uppercase">Título</label>
                                            <input type="text" name="fundamento_2_title" class="form-control" value="{{ $settings['fundamento_2_title'] ?? 'Ingenio y Estrategia Legal' }}">
                                        </div>
                                        <div class="form-group mb-0">
                                            <label class="text-xs font-weight-bold text-uppercase">Descripción</label>
                                            <textarea name="fundamento_2_desc" rows="3" class="form-control">{{ $settings['fundamento_2_desc'] ?? 'Abordamos cada desafío con una visión creativa y disruptiva, diseñando soluciones a medida que trascienden el litigio convencional para asegurar el éxito de nuestros representados.' }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <!-- Fundamento 3 -->
                                <div class="col-md-6 mb-3">
                                    <div class="p-3 bg-light rounded border">
                                        <h6 class="font-weight-bold text-primary mb-2"><i class="fas fa-microscope mr-1"></i> Cuadrante 3</h6>
                                        <div class="form-group mb-2">
                                            <label class="text-xs font-weight-bold text-uppercase">Título</label>
                                            <input type="text" name="fundamento_3_title" class="form-control" value="{{ $settings['fundamento_3_title'] ?? 'Precisión y Minuciosidad' }}">
                                        </div>
                                        <div class="form-group mb-0">
                                            <label class="text-xs font-weight-bold text-uppercase">Descripción</label>
                                            <textarea name="fundamento_3_desc" rows="3" class="form-control">{{ $settings['fundamento_3_desc'] ?? 'En el Derecho, el detalle es la diferencia entre el éxito y el riesgo. Analizamos cada variable probatoria con una metodología forense de alta precisión.' }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <!-- Fundamento 4 -->
                                <div class="col-md-6 mb-3">
                                    <div class="p-3 bg-light rounded border">
                                        <h6 class="font-weight-bold text-primary mb-2"><i class="fas fa-shield-alt mr-1"></i> Cuadrante 4</h6>
                                        <div class="form-group mb-2">
                                            <label class="text-xs font-weight-bold text-uppercase">Título</label>
                                            <input type="text" name="fundamento_4_title" class="form-control" value="{{ $settings['fundamento_4_title'] ?? 'Excelencia Corporativa' }}">
                                        </div>
                                        <div class="form-group mb-0">
                                            <label class="text-xs font-weight-bold text-uppercase">Descripción</label>
                                            <textarea name="fundamento_4_desc" rows="3" class="form-control">{{ $settings['fundamento_4_desc'] ?? 'Operamos bajo los más estrictos estándares de ética y confidencialidad, proyectando la seriedad de una firma de alcance global.' }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- TAB 3: EL METODO DIMO -->
                        <div class="tab-pane fade {{ $currentTab === 'tab-metodo' ? 'show active' : '' }}" id="tab-metodo" role="tabpanel">
                            <div class="section-header-banner">
                                <i class="fas fa-project-diagram mr-1"></i> Recuadro 3: Diagrama de Flujo (Las 4 Estaciones Operativas)
                            </div>

                            <div class="form-group mb-4">
                                <label class="font-weight-bold">Título General del Método</label>
                                <input type="text" name="metodo_title" class="form-control font-weight-bold" value="{{ $settings['metodo_title'] ?? 'EL METODO DIMO: INGENIERIA JURIDICA DE PRECISIÓN' }}">
                            </div>

                            <div class="row">
                                <!-- Estación 1 -->
                                <div class="col-md-6 mb-3">
                                    <div class="p-3 bg-light rounded border">
                                        <h6 class="font-weight-bold text-primary mb-2"><span class="badge badge-primary mr-1">1</span> Estación 1</h6>
                                        <div class="row">
                                            <div class="col-7">
                                                <div class="form-group mb-2">
                                                    <label class="text-xs font-weight-bold text-uppercase">Título</label>
                                                    <input type="text" name="estacion_1_title" class="form-control" value="{{ $settings['estacion_1_title'] ?? 'Auditoría y Diagnóstico' }}">
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="form-group mb-2">
                                                    <label class="text-xs font-weight-bold text-uppercase">Subtítulo</label>
                                                    <input type="text" name="estacion_1_sub" class="form-control" value="{{ $settings['estacion_1_sub'] ?? '(El Cimiento)' }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mb-0">
                                            <label class="text-xs font-weight-bold text-uppercase">Descripción</label>
                                            <textarea name="estacion_1_desc" rows="2" class="form-control">{{ $settings['estacion_1_desc'] ?? 'Análisis microscópico de las fuentes del derecho y auditoría de riesgos procesales.' }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <!-- Estación 2 -->
                                <div class="col-md-6 mb-3">
                                    <div class="p-3 bg-light rounded border">
                                        <h6 class="font-weight-bold text-primary mb-2"><span class="badge badge-primary mr-1">2</span> Estación 2</h6>
                                        <div class="row">
                                            <div class="col-7">
                                                <div class="form-group mb-2">
                                                    <label class="text-xs font-weight-bold text-uppercase">Título</label>
                                                    <input type="text" name="estacion_2_title" class="form-control" value="{{ $settings['estacion_2_title'] ?? 'Arquitectura de Estrategia' }}">
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="form-group mb-2">
                                                    <label class="text-xs font-weight-bold text-uppercase">Subtítulo</label>
                                                    <input type="text" name="estacion_2_sub" class="form-control" value="{{ $settings['estacion_2_sub'] ?? '(El Blindaje)' }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mb-0">
                                            <label class="text-xs font-weight-bold text-uppercase">Descripción</label>
                                            <textarea name="estacion_2_desc" rows="2" class="form-control">{{ $settings['estacion_2_desc'] ?? 'Diseño de la estructura argumentativa bajo el rigor de la dogmática jurídica y la jurisprudencia de cierre.' }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <!-- Estación 3 -->
                                <div class="col-md-6 mb-3">
                                    <div class="p-3 bg-light rounded border">
                                        <h6 class="font-weight-bold text-primary mb-2"><span class="badge badge-primary mr-1">3</span> Estación 3</h6>
                                        <div class="row">
                                            <div class="col-7">
                                                <div class="form-group mb-2">
                                                    <label class="text-xs font-weight-bold text-uppercase">Título</label>
                                                    <input type="text" name="estacion_3_title" class="form-control" value="{{ $settings['estacion_3_title'] ?? 'Despliegue Operativo' }}">
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="form-group mb-2">
                                                    <label class="text-xs font-weight-bold text-uppercase">Subtítulo</label>
                                                    <input type="text" name="estacion_3_sub" class="form-control" value="{{ $settings['estacion_3_sub'] ?? '(La Acción)' }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mb-0">
                                            <label class="text-xs font-weight-bold text-uppercase">Descripción</label>
                                            <textarea name="estacion_3_desc" rows="2" class="form-control">{{ $settings['estacion_3_desc'] ?? 'Ejecución técnica impecable en el escenario litigioso, garantizando la prevalencia de la seguridad jurídica.' }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <!-- Estación 4 -->
                                <div class="col-md-6 mb-3">
                                    <div class="p-3 bg-light rounded border">
                                        <h6 class="font-weight-bold text-primary mb-2"><span class="badge badge-primary mr-1">4</span> Estación 4</h6>
                                        <div class="row">
                                            <div class="col-7">
                                                <div class="form-group mb-2">
                                                    <label class="text-xs font-weight-bold text-uppercase">Título</label>
                                                    <input type="text" name="estacion_4_title" class="form-control" value="{{ $settings['estacion_4_title'] ?? 'Resolución y Resultado' }}">
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="form-group mb-2">
                                                    <label class="text-xs font-weight-bold text-uppercase">Subtítulo</label>
                                                    <input type="text" name="estacion_4_sub" class="form-control" value="{{ $settings['estacion_4_sub'] ?? '(El Éxito)' }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mb-0">
                                            <label class="text-xs font-weight-bold text-uppercase">Descripción</label>
                                            <textarea name="estacion_4_desc" rows="2" class="form-control">{{ $settings['estacion_4_desc'] ?? 'Obtención de soluciones jurídicas de alto impacto y protección definitiva de los intereses de la firma.' }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- TAB 4: MONITOREO EN X -->
                        <div class="tab-pane fade {{ $currentTab === 'tab-x' ? 'show active' : '' }}" id="tab-x" role="tabpanel">
                            <div class="section-header-banner">
                                <i class="fab fa-twitter mr-1"></i> Recuadro 4: Perspectiva Legal en Tiempo Real (Widget en X)
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Título del Widget</label>
                                        <input type="text" name="x_widget_title" class="form-control font-weight-bold" value="{{ $settings['x_widget_title'] ?? 'Perspectiva Legal en Tiempo Real: Monitoreo Jurídico DIMO' }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Subtítulo del Widget</label>
                                        <input type="text" name="x_widget_subtitle" class="form-control" value="{{ $settings['x_widget_subtitle'] ?? 'Siga nuestro análisis directo sobre la evolución del derecho y la seguridad jurídica en Colombia.' }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Texto del Botón de Acción</label>
                                        <input type="text" name="x_button_text" class="form-control" value="{{ $settings['x_button_text'] ?? 'SEGUIR EL DEBATE JURÍDICO EN X' }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Enlace Externo del Botón</label>
                                        <input type="text" name="x_button_url" class="form-control" value="{{ $settings['x_button_url'] ?? 'https://x.com' }}" placeholder="https://x.com/...">
                                    </div>
                                </div>
                            </div>

                            <div class="section-sub-header">Publicaciones Analíticas Simuladas:</div>

                            <!-- Post 1 -->
                            <div class="p-3 bg-light rounded border mb-3">
                                <div class="d-flex justify-content-between mb-2">
                                    <strong class="text-primary"><i class="fab fa-twitter mr-1"></i> Publicación 1</strong>
                                    <input type="text" name="x_post_1_time" class="form-control form-control-sm col-md-2" value="{{ $settings['x_post_1_time'] ?? 'Hace 3h' }}" placeholder="Tiempo">
                                </div>
                                <textarea name="x_post_1_text" rows="2" class="form-control">{{ $settings['x_post_1_text'] ?? '⚖️ Corte Suprema de Justicia: En reciente pronunciamiento sobre carga probatoria en controversias societarias, se ratifica la necesidad de auditoría documental previa. La dogmática no tolera improvisaciones procesales.' }}</textarea>
                            </div>

                            <!-- Post 2 -->
                            <div class="p-3 bg-light rounded border mb-3">
                                <div class="d-flex justify-content-between mb-2">
                                    <strong class="text-primary"><i class="fab fa-twitter mr-1"></i> Publicación 2</strong>
                                    <input type="text" name="x_post_2_time" class="form-control form-control-sm col-md-2" value="{{ $settings['x_post_2_time'] ?? 'Ayer' }}" placeholder="Tiempo">
                                </div>
                                <textarea name="x_post_2_text" rows="2" class="form-control">{{ $settings['x_post_2_text'] ?? '🏛️ Consejo de Estado: La prevalencia de la seguridad jurídica exige un análisis microscópico de los actos administrativos en litigios contractuales. Análisis de riesgos disponible para nuestros clientes corporativos.' }}</textarea>
                            </div>

                            <!-- Post 3 -->
                            <div class="p-3 bg-light rounded border">
                                <div class="d-flex justify-content-between mb-2">
                                    <strong class="text-primary"><i class="fab fa-twitter mr-1"></i> Publicación 3</strong>
                                    <input type="text" name="x_post_3_time" class="form-control form-control-sm col-md-2" value="{{ $settings['x_post_3_time'] ?? '3d' }}" placeholder="Tiempo">
                                </div>
                                <textarea name="x_post_3_text" rows="2" class="form-control">{{ $settings['x_post_3_text'] ?? '🔍 Control de Riesgos: Diseñamos la arquitectura argumentativa que anticipa los escenarios de alta conflictividad antes de acudir al tribunal arbitral.' }}</textarea>
                            </div>
                        </div>

                        <!-- TAB 5: NUESTRA FIRMA -->
                        <div class="tab-pane fade {{ $currentTab === 'tab-about' ? 'show active' : '' }}" id="tab-about" role="tabpanel">
                            <div class="section-header-banner">
                                <i class="fas fa-landmark mr-1"></i> Nuestra Firma (Filosofía Institucional)
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Titular Principal de la Página</label>
                                <input type="text" name="about_title" class="form-control font-weight-bold" value="{{ $settings['about_title'] ?? 'DIMO: Arquitectura Jurídica y Rigor Estratégico al Servicio de la Justicia.' }}">
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Manifiesto - Párrafo 1</label>
                                        <textarea name="about_p1" rows="3" class="form-control">{{ $settings['about_p1'] ?? 'En Defensa, Investigación y Metodologías Operacionales (DIMO), concebimos el ejercicio del derecho como una disciplina de alta precisión. Nuestra firma nace de la necesidad de ofrecer soluciones jurídicas disruptivas en un entorno normativo complejo, donde la interpretación literal ya no es suficiente.' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Manifiesto - Párrafo 2</label>
                                        <textarea name="about_p2" rows="3" class="form-control">{{ $settings['about_p2'] ?? 'Nos distinguimos por una minuciosa observancia de las fuentes del derecho colombiano, integrando la dogmática clásica con las herramientas operativas más avanzadas para garantizar la máxima tutela de los intereses de nuestros representados.' }}</textarea>
                                    </div>
                                </div>
                            </div>

                            @include('admin.components.image-picker', [
                                'name' => 'about_image',
                                'fileInputName' => 'about_image_file',
                                'removeInputName' => 'remove_about_image',
                                'label' => 'Imagen de Cabecera / Portada de Nuestra Firma (Biblioteca / Despacho)',
                                'aspect' => 'landscape',
                                'value' => $settings['about_image'] ?? ($settings['hero_image'] ?? ''),
                                'helpText' => 'Fotografía del recuadro principal de la página Nuestra Firma (¿Quiénes Somos?). Puede seleccionar una imagen desde su computador o ingresar una URL.'
                            ])

                            <div class="section-sub-header">Cita Destacada Lateral (Side Quote)</div>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Título de la Cita</label>
                                        <input type="text" name="side_quote_title" class="form-control" value="{{ $settings['side_quote_title'] ?? 'Defensa Científica' }}">
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Descripción de la Cita</label>
                                        <input type="text" name="side_quote_desc" class="form-control" value="{{ $settings['side_quote_desc'] ?? 'Transformamos el esfuerzo analítico en certidumbre procesal inexpugnable.' }}">
                                    </div>
                                </div>
                            </div>

                            <div class="section-sub-header">Bloque 1: Propuesta de Valor (El Factor DIMO)</div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Título</label>
                                        <input type="text" name="propuesta_title" class="form-control" value="{{ $settings['propuesta_title'] ?? 'Nuestra Propuesta de Valor (El Factor DIMO)' }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Subtítulo</label>
                                        <input type="text" name="propuesta_subtitle" class="form-control" value="{{ $settings['propuesta_subtitle'] ?? 'Más allá de la Representación: Ingeniería de Soluciones Jurídicas' }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Texto de la Propuesta</label>
                                <textarea name="propuesta_text" rows="2" class="form-control">{{ $settings['propuesta_text'] ?? 'Lo que nos distingue en el foro jurídico es nuestra capacidad de amalgamar la dogmática pura con metodologías de análisis técnico-forense. No nos limitamos a la gestión de expedientes; construimos escenarios de éxito mediante el estudio milimétrico de la prueba y la aplicación de la jurisprudencia de cierre. En DIMO, la defensa es una ciencia y la estrategia, nuestra mayor ventaja competitiva.' }}</textarea>
                            </div>

                            <div class="section-sub-header">Bloque 2: Valores Corporativos (3 Columnas)</div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="p-2 bg-light rounded border">
                                        <label class="text-xs font-weight-bold text-uppercase text-primary">Valor 1</label>
                                        <input type="text" name="valor_1_title" class="form-control mb-1" value="{{ $settings['valor_1_title'] ?? 'Rigor Normativo' }}">
                                        <textarea name="valor_1_desc" rows="2" class="form-control">{{ $settings['valor_1_desc'] ?? 'Nuestra brújula es la norma. Escudriñamos las fuentes del derecho para hallar la solución donde otros solo ven el conflicto.' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="p-2 bg-light rounded border">
                                        <label class="text-xs font-weight-bold text-uppercase text-primary">Valor 2</label>
                                        <input type="text" name="valor_2_title" class="form-control mb-1" value="{{ $settings['valor_2_title'] ?? 'Discreción Estratégica' }}">
                                        <textarea name="valor_2_desc" rows="2" class="form-control">{{ $settings['valor_2_desc'] ?? 'Entendemos la sensibilidad de los intereses que custodiamos. El sigilo y la reserva profesional son el pilar de nuestra confianza corporativa.' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="p-2 bg-light rounded border">
                                        <label class="text-xs font-weight-bold text-uppercase text-primary">Valor 3</label>
                                        <input type="text" name="valor_3_title" class="form-control mb-1" value="{{ $settings['valor_3_title'] ?? 'Excelencia Técnica' }}">
                                        <textarea name="valor_3_desc" rows="2" class="form-control">{{ $settings['valor_3_desc'] ?? 'Cada documento, cada memorial y cada intervención es el resultado de un proceso de control de calidad jurídica sin precedentes.' }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="section-sub-header">Bloque 3: Nuestro Alcance</div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Título</label>
                                        <input type="text" name="alcance_title" class="form-control" value="{{ $settings['alcance_title'] ?? 'Nuestro Alcance' }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Subtítulo</label>
                                        <input type="text" name="alcance_subtitle" class="form-control" value="{{ $settings['alcance_subtitle'] ?? 'Cobertura Integral en Escenarios de Alta Conflictividad' }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Texto Descriptivo del Alcance</label>
                                <textarea name="alcance_text" rows="2" class="form-control">{{ $settings['alcance_text'] ?? 'Operamos con solvencia en todo el territorio nacional, brindando asesoría a personas naturales y jurídicas que requieren un blindaje legal ante desafíos que amenazan su estabilidad patrimonial, libertad o reputación. Nuestra firma es el aliado estratégico para quienes no se conforman con una asesoría convencional.' }}</textarea>
                            </div>
                            @include('admin.components.image-picker', [
                                'name' => 'alcance_image',
                                'fileInputName' => 'alcance_image_file',
                                'removeInputName' => 'remove_alcance_image',
                                'label' => 'Imagen de Sección de Alcance',
                                'aspect' => 'landscape',
                                'value' => $settings['alcance_image'] ?? '',
                                'helpText' => 'Fotografía panorámica que ilustra la sección de Cobertura y Alcance Nacional.'
                            ])

                            <div class="section-sub-header">Bloque 4: Misión y Visión Institucional</div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-weight-bold text-primary"><i class="fas fa-flag mr-1"></i> Texto de la MISIÓN</label>
                                        <textarea name="mision_text" rows="4" class="form-control">{{ $settings['mision_text'] ?? 'Nuestra misión es proveer soluciones jurídicas e investigativas de alta complejidad, fundamentadas en un rigor técnico inexpugnable y una lealtad absoluta hacia los intereses de nuestros representados. En DIMO, transformamos el esfuerzo y la disciplina en estrategias de éxito, evolucionando constantemente para garantizar que la excelencia operativa sea el estándar en cada una de nuestras intervenciones. Nuestro propósito es ser el blindaje definitivo para quienes exigen una defensa técnica cimentada en la ciencia del derecho.' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-weight-bold text-primary"><i class="fas fa-eye mr-1"></i> Texto de la VISIÓN</label>
                                        <textarea name="vision_text" rows="4" class="form-control">{{ $settings['vision_text'] ?? 'Para el año 2030, DIMO se consolidará como la firma boutique de referencia integral en el territorio nacional, liderando la convergencia entre el derecho multidisciplinario y la investigación de vanguardia. Proyectamos un crecimiento estratégico sostenido por un capital humano de élite, especializado y con un dominio absoluto de las fuentes del derecho, permitiéndonos ofrecer un portafolio de soluciones jurídicas diversificado que redefina los estándares de la consultoría y el litigio de alto nivel en Colombia.' }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="alert alert-info mt-3 py-2 text-xs">
                                <i class="fas fa-users mr-1"></i> Para agregar, editar fotografías o modificar cargos de los socios directores (Andrés Martínez, Camila Casas, etc.), use el menú <a href="{{ route('admin.team.index') }}" class="font-weight-bold text-primary">Equipo Legal</a>.
                            </div>
                        </div>

                        <!-- TAB 6: CONTACTO & SEDE BOGOTA -->
                        <div class="tab-pane fade {{ $currentTab === 'tab-contact' ? 'show active' : '' }}" id="tab-contact" role="tabpanel">
                            <div class="section-header-banner">
                                <i class="fas fa-map-marker-alt mr-1"></i> Despacho Central & Canales de Comunicación
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Nombre del Despacho / Sede</label>
                                        <input type="text" name="office_title" class="form-control" value="{{ $settings['office_title'] ?? 'Sede Principal Bogotá' }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Teléfono PBX</label>
                                        <input type="text" name="phone" class="form-control" value="{{ $settings['phone'] ?? '+57 (601) 456 7890' }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Correo Institucional de Atención</label>
                                        <input type="email" name="email" class="form-control" value="{{ $settings['email'] ?? 'contacto@dimo.com.co' }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Horario de Atención</label>
                                        <input type="text" name="schedule" class="form-control" value="{{ $settings['schedule'] ?? 'Lun - Vie, 8am - 6pm' }}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Dirección Física Completa</label>
                                <textarea name="address" rows="3" class="form-control">{{ $settings['address'] ?? "Calle 100 # 15-32, Edificio Amadeus, Piso 7\nBogotá D.C., Colombia" }}</textarea>
                            </div>
                        </div>

                        <!-- TAB 7: PIE DE PAGINA (FOOTER) -->
                        <div class="tab-pane fade {{ $currentTab === 'tab-footer' ? 'show active' : '' }}" id="tab-footer" role="tabpanel">
                            <div class="section-header-banner">
                                <i class="fas fa-shoe-prints mr-1"></i> Pie de Página Unificado (Footer de 4 Columnas)
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Lema / Frase del Footer</label>
                                <input type="text" name="footer_slogan" class="form-control" value="{{ $settings['footer_slogan'] ?? 'Excelencia jurídica y rigor técnico al servicio de su seguridad y patrimonio.' }}">
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Aviso de Derechos de Autor (Copyright Oficial)</label>
                                <textarea name="footer_copyright" rows="2" class="form-control">{{ $settings['footer_copyright'] ?? '© 2026 DIMO – Defensa, Investigación y Metodologías Operacionales. Todos los derechos reservados. El rigor en la fuente, nuestra garantía jurídica.' }}</textarea>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Card footer with save button -->
                <div class="card-footer bg-light py-2 text-right">
                    <button type="submit" class="btn btn-primary btn-sm shadow-sm font-weight-bold px-4 py-1">
                        <i class="fas fa-save mr-1"></i> Guardar Todos los Cambios
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@push('scripts')
<script>
$(function() {
    $('a[data-toggle="pill"]').on('shown.bs.tab', function (e) {
        var targetId = $(e.target).attr('href').replace('#', '');
        $('#active_tab_input').val(targetId);
        if (history.replaceState) {
            history.replaceState(null, null, '?tab=' + targetId);
        }
    });

    var urlParams = new URLSearchParams(window.location.search);
    var tabParam = urlParams.get('tab');
    if (tabParam) {
        var $tabLink = $('a[href="#' + tabParam + '"]');
        if ($tabLink.length) {
            $tabLink.tab('show');
            $('#active_tab_input').val(tabParam);
        }
    }
});
</script>
@endpush
