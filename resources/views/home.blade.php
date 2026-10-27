<!DOCTYPE html>
<html class="light" lang="es">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>{{ $settings['firm_name'] ?? 'myclegalgroup.com' }} - Firma de Abogados | Grid Focused</title>
    
    <!-- Google Fonts: Inter for UI, Playfair Display for traditional legal headers -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;900&family=Playfair+Display:ital,wght@0,700;0,900;1,700&display=swap" rel="stylesheet"/>
    
    <!-- Material Symbols -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    
    <!-- Tailwind CSS with Forms and Container Queries -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#6E1E2E",
                        "primary-dark": "#531421",
                        "wine-100": "#F4DADD",
                        "wine-200": "#E7BAC1",
                        "primary-hover": "#531421",
                        "background-light": "#F8F3F3",
                        "background-dark": "#171012",
                    },
                    fontFamily: {
                        "display": ["Inter", "sans-serif"],
                        "serif": ["Playfair Display", "serif"]
                    },
                    borderRadius: {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                },
            },
        }
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            vertical-align: middle;
        }
        .grid-header {
            font-family: 'Playfair Display', serif;
        }
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>
<body class="bg-background-light dark:bg-background-dark font-display text-gray-900 dark:text-gray-100 transition-colors duration-300 antialiased selection:bg-primary selection:text-white">

<!-- Top Navigation Bar -->
<header class="sticky top-0 z-50 w-full bg-white/80 dark:bg-background-dark/80 backdrop-blur-md border-b border-gray-200 dark:border-gray-800 transition-colors">
    <div class="max-w-7xl mx-auto px-6 h-16 flex items-center justify-between">
        <a href="{{ route('home') }}" class="flex items-center gap-3 group">
            <div class="bg-primary p-1.5 rounded text-white flex items-center justify-center shadow-md shadow-primary/20 group-hover:scale-105 transition-transform">
                <span class="material-symbols-outlined text-2xl">balance</span>
            </div>
            <h2 class="text-xl font-black tracking-tight uppercase">
                myclegalgroup.com
            </h2>
        </a>

        <!-- Desktop Navigation -->
        <nav class="hidden md:flex items-center gap-8">
            <a class="text-sm font-medium hover:text-primary transition-colors" href="#filosofia">Filosofía</a>
            <a class="text-sm font-medium hover:text-primary transition-colors" href="#servicios">Servicios</a>
            <a class="text-sm font-medium hover:text-primary transition-colors" href="#equipo">Equipo</a>
            <a class="text-sm font-medium hover:text-primary transition-colors" href="#contacto">Contacto</a>
            
            <!-- Dark / Light Mode Toggle -->
            <button id="theme-toggle" type="button" aria-label="Cambiar tema" class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 focus:outline-none rounded-lg text-sm p-2 transition-colors">
                <span id="theme-toggle-dark-icon" class="material-symbols-outlined hidden text-xl">dark_mode</span>
                <span id="theme-toggle-light-icon" class="material-symbols-outlined hidden text-xl">light_mode</span>
            </button>

            <!-- Admin Portal Link -->
            <a href="{{ route('admin.dashboard') }}" class="text-xs font-semibold px-3 py-1.5 rounded border border-gray-300 dark:border-gray-700 hover:border-primary text-gray-700 dark:text-gray-300 hover:text-primary flex items-center gap-1.5 transition-colors" title="Panel de Administración AdminLTE">
                <span class="material-symbols-outlined text-base">dashboard</span>
                <span>AdminLTE</span>
            </a>

            <!-- CTA Button -->
            <a href="#contacto" class="bg-primary text-white px-5 py-2 rounded-lg text-sm font-bold hover:bg-primary-dark shadow-md shadow-primary/20 hover:shadow-primary/30 transition-all flex items-center gap-1.5">
                <span class="material-symbols-outlined text-base">support_agent</span>
                <span>Consulta Legal</span>
            </a>
        </nav>

        <!-- Mobile Menu Trigger -->
        <div class="flex items-center gap-3 md:hidden">
            <button id="theme-toggle-mobile" type="button" class="text-gray-500 dark:text-gray-400 p-2 rounded-lg">
                <span class="material-symbols-outlined text-xl">brightness_4</span>
            </button>
            <a href="#contacto" class="bg-primary text-white px-3 py-1.5 rounded-lg text-xs font-bold">
                Consulta
            </a>
        </div>
    </div>
</header>

<!-- Success / Flash Messages -->
@if(session('success'))
<div class="max-w-7xl mx-auto px-6 pt-4">
    <div class="bg-emerald-500/10 border border-emerald-500/30 text-emerald-800 dark:text-emerald-300 px-4 py-3 rounded-xl flex items-center justify-between">
        <div class="flex items-center gap-2">
            <span class="material-symbols-outlined text-emerald-600 dark:text-emerald-400">check_circle</span>
            <span class="text-sm font-medium">{{ session('success') }}</span>
        </div>
        <button onclick="this.parentElement.remove()" class="text-emerald-600 hover:opacity-75">
            <span class="material-symbols-outlined text-sm">close</span>
        </button>
    </div>
</div>
@endif

<!-- Main Grid Content -->
<main class="max-w-7xl mx-auto px-6 py-8">
    <div class="grid grid-cols-1 md:grid-cols-12 gap-6">

        <!-- Hero / Philosophy Block (Large Span - 8 cols) -->
        <section class="md:col-span-8 bg-white dark:bg-gray-900 rounded-xl overflow-hidden border border-gray-200 dark:border-gray-800 flex flex-col shadow-sm" id="filosofia">
            <div class="p-8 md:p-12 flex-1 flex flex-col justify-center">
                <span class="text-primary font-bold tracking-widest uppercase text-xs mb-4">
                    Desde {{ $settings['since_year'] ?? '1994' }}
                </span>
                <h1 class="grid-header text-4xl md:text-6xl text-gray-900 dark:text-white mb-6 leading-tight">
                    {!! str_replace('Cuadrante', '<span class="italic underline decoration-primary/30">Cuadrante</span>', e($settings['hero_title'] ?? 'Excelencia Legal en cada Cuadrante.')) !!}
                </h1>
                <p class="text-lg text-gray-600 dark:text-gray-400 max-w-xl mb-8 leading-relaxed">
                    {{ $settings['hero_description'] ?? 'En myclegalgroup.com, integramos la tradición jurídica con una visión moderna y ágil para ofrecer soluciones estratégicas en un mercado global cambiante.' }}
                </p>
                <div class="flex flex-wrap gap-4">
                    <a href="#contacto" class="bg-primary text-white px-6 py-3 rounded-lg font-bold flex items-center gap-2 hover:bg-primary-dark shadow-md shadow-primary/20 transition-all group">
                        <span>Conocer Más</span>
                        <span class="material-symbols-outlined text-sm group-hover:translate-x-1 transition-transform">arrow_forward</span>
                    </a>
                    <a href="#servicios" class="border border-gray-300 dark:border-gray-700 hover:border-primary text-gray-700 dark:text-gray-300 hover:text-primary px-6 py-3 rounded-lg font-bold flex items-center gap-2 transition-all">
                        <span>Explorar Áreas</span>
                    </a>
                </div>
            </div>
            <div class="h-64 bg-cover bg-center border-t border-gray-100 dark:border-gray-800" 
                 data-alt="Modern law office library with sleek wooden shelves" 
                 style="background-image: url('{{ !empty($settings['hero_image']) ? asset($settings['hero_image']) : 'https://lh3.googleusercontent.com/aida-public/AB6AXuBwDg6y45y18okSbZT34ztaF_Dq8VCfy-M3_SojFYOH3ndbNBNSxh9uk1M1mRHcDYeaZFZ1LnJ_eLE3LVm1_GEnNfpLEoZ2BQVEp5SYeQp8QiN_fFj06zea_Z8WrWI2bS3-3yWPrd4T2TNivUD5MGUexppDsEzDLG11O5jL7yIpdOHFP90q8JzRT7U8QgbvPSBQx8AqnWkbAz71lVGsgtXBfCu0q4oz0ZFJyDgXuNRy_NjAjRZ-zYsKTKmeVCDf8iAaXr3F5hu1m47z' }}');">
            </div>
        </section>

        <!-- Stats / Integrity Block (Small - 4 cols) -->
        <div class="md:col-span-4 flex flex-col gap-6">
            <!-- Integrity Card -->
            <div class="bg-primary text-white p-8 rounded-xl flex flex-col justify-between h-full shadow-md shadow-primary/20 relative overflow-hidden group">
                <div class="absolute -right-4 -bottom-4 opacity-10 text-white pointer-events-none group-hover:scale-110 transition-transform">
                    <span class="material-symbols-outlined text-9xl">gavel</span>
                </div>
                <span class="material-symbols-outlined text-4xl mb-4">gavel</span>
                <div>
                    <h3 class="grid-header text-3xl mb-2 italic">Integridad Total</h3>
                    <p class="text-wine-100 text-sm leading-relaxed">
                        Nuestros procesos están blindados por estándares éticos rigurosos y rigor jurídico.
                    </p>
                </div>
            </div>

            <!-- Stats Card -->
            <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 p-8 rounded-xl h-full shadow-sm flex flex-col justify-between">
                <div>
                    <h3 class="text-4xl font-black mb-1 text-gray-900 dark:text-white">
                        {{ $settings['success_rate'] ?? '98' }}%
                    </h3>
                    <p class="text-gray-500 text-sm uppercase font-bold tracking-wider mb-4">Casos Exitosos</p>
                </div>
                <div>
                    <div class="w-full bg-gray-100 dark:bg-gray-800 h-2 rounded-full overflow-hidden mb-2">
                        <div class="bg-primary h-full rounded-full" style="width: {{ $settings['success_rate'] ?? '98' }}%;"></div>
                    </div>
                    <span class="text-xs text-gray-400">Tasa de resolución positiva en litigios y arbitrajes corporativos.</span>
                </div>
            </div>
        </div>

        <!-- Services Section Header -->
        <div class="md:col-span-12 flex items-end justify-between px-2 pt-8 pb-2 border-b-2 border-primary/20" id="servicios">
            <div>
                <span class="text-primary font-bold uppercase text-xs tracking-widest block mb-1">Especialidades</span>
                <h2 class="grid-header text-3xl font-bold">Áreas de Práctica</h2>
            </div>
            <a class="text-primary text-sm font-bold flex items-center gap-1 hover:underline group" href="#contacto">
                <span>Solicitar Asesoría</span>
                <span class="material-symbols-outlined text-xs group-hover:translate-x-0.5 transition-transform">open_in_new</span>
            </a>
        </div>

        <!-- Service Tiles (Grid layout - 4 items in cols-3 each) -->
        @forelse($practiceAreas as $area)
        <div class="md:col-span-3 bg-white dark:bg-gray-900 p-6 rounded-xl border border-gray-200 dark:border-gray-800 hover:border-primary dark:hover:border-primary transition-all duration-300 group cursor-pointer shadow-sm hover:shadow-md flex flex-col justify-between">
            <div>
                <div class="size-12 bg-primary/10 rounded-lg flex items-center justify-center text-primary mb-4 group-hover:bg-primary group-hover:text-white transition-all duration-300">
                    <span class="material-symbols-outlined text-2xl">{{ $area->icon ?: 'corporate_fare' }}</span>
                </div>
                <h3 class="text-lg font-bold mb-2 group-hover:text-primary transition-colors text-gray-900 dark:text-white">
                    {{ $area->title }}
                </h3>
                <p class="text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                    {{ $area->description }}
                </p>
            </div>
            <div class="mt-4 pt-3 border-t border-gray-100 dark:border-gray-800 flex items-center text-xs font-semibold text-primary opacity-0 group-hover:opacity-100 transition-opacity">
                <span>Consultar área</span>
                <span class="material-symbols-outlined text-xs ml-1">arrow_forward</span>
            </div>
        </div>
        @empty
        <!-- Fallback tiles matching exact design -->
        <div class="md:col-span-3 bg-white dark:bg-gray-900 p-6 rounded-xl border border-gray-200 dark:border-gray-800 hover:border-primary transition-colors group cursor-pointer">
            <div class="size-12 bg-primary/10 rounded-lg flex items-center justify-center text-primary mb-4 group-hover:bg-primary group-hover:text-white transition-all">
                <span class="material-symbols-outlined">corporate_fare</span>
            </div>
            <h3 class="text-lg font-bold mb-2">Derecho Corporativo</h3>
            <p class="text-gray-500 text-sm leading-relaxed">Asesoría integral para empresas nacionales y multinacionales en Colombia.</p>
        </div>
        <div class="md:col-span-3 bg-white dark:bg-gray-900 p-6 rounded-xl border border-gray-200 dark:border-gray-800 hover:border-primary transition-colors group cursor-pointer">
            <div class="size-12 bg-primary/10 rounded-lg flex items-center justify-center text-primary mb-4 group-hover:bg-primary group-hover:text-white transition-all">
                <span class="material-symbols-outlined">account_balance</span>
            </div>
            <h3 class="text-lg font-bold mb-2">Litigios y Arbitraje</h3>
            <p class="text-gray-500 text-sm leading-relaxed">Representación de alto nivel en procesos judiciales y resolución de conflictos.</p>
        </div>
        <div class="md:col-span-3 bg-white dark:bg-gray-900 p-6 rounded-xl border border-gray-200 dark:border-gray-800 hover:border-primary transition-colors group cursor-pointer">
            <div class="size-12 bg-primary/10 rounded-lg flex items-center justify-center text-primary mb-4 group-hover:bg-primary group-hover:text-white transition-all">
                <span class="material-symbols-outlined">work</span>
            </div>
            <h3 class="text-lg font-bold mb-2">Laboral y Seguridad</h3>
            <p class="text-gray-500 text-sm leading-relaxed">Gestión estratégica del talento humano y cumplimiento normativo laboral.</p>
        </div>
        <div class="md:col-span-3 bg-white dark:bg-gray-900 p-6 rounded-xl border border-gray-200 dark:border-gray-800 hover:border-primary transition-colors group cursor-pointer">
            <div class="size-12 bg-primary/10 rounded-lg flex items-center justify-center text-primary mb-4 group-hover:bg-primary group-hover:text-white transition-all">
                <span class="material-symbols-outlined">real_estate_agent</span>
            </div>
            <h3 class="text-lg font-bold mb-2">Propiedad Intelectual</h3>
            <p class="text-gray-500 text-sm leading-relaxed">Protección de activos intangibles, marcas, patentes y derechos de autor.</p>
        </div>
        @endforelse

        <!-- Team Gallery Header -->
        <div class="md:col-span-12 flex items-end justify-between px-2 pt-8 pb-2 border-b-2 border-primary/20" id="equipo">
            <div>
                <span class="text-primary font-bold uppercase text-xs tracking-widest block mb-1">Liderazgo</span>
                <h2 class="grid-header text-3xl font-bold">Nuestro Equipo</h2>
            </div>
            <p class="text-gray-500 dark:text-gray-400 text-sm max-w-xs text-right italic">
                Liderando con experiencia y dedicación en cada caso.
            </p>
        </div>

        <!-- Team Member Cards (Grid layout - 6 cols each) -->
        @forelse($teamMembers as $member)
        <div class="md:col-span-6 bg-white dark:bg-gray-900 rounded-xl overflow-hidden border border-gray-200 dark:border-gray-800 flex flex-col sm:flex-row shadow-sm hover:shadow-md transition-shadow">
            <div class="sm:w-1/2 h-64 sm:h-auto bg-cover bg-center grayscale hover:grayscale-0 transition-all duration-500" 
                 data-alt="{{ $member->name }}" 
                 style="background-image: url('{{ $member->image_url }}');">
            </div>
            <div class="p-8 sm:w-1/2 flex flex-col justify-center">
                <h3 class="grid-header text-2xl mb-1 text-gray-900 dark:text-white">{{ $member->name }}</h3>
                <p class="text-primary font-bold text-xs uppercase tracking-widest mb-4">{{ $member->role }}</p>
                <p class="text-sm text-gray-500 dark:text-gray-400 italic mb-6 leading-relaxed">
                    "{{ $member->quote }}"
                </p>
                <div class="flex items-center gap-3">
                    @if($member->email)
                    <a href="mailto:{{ $member->email }}" class="material-symbols-outlined text-gray-400 hover:text-primary transition-colors text-xl" title="Enviar correo">
                        mail
                    </a>
                    @endif
                    @if($member->linkedin_url)
                    <a href="{{ $member->linkedin_url }}" target="_blank" rel="noopener noreferrer" class="material-symbols-outlined text-gray-400 hover:text-primary transition-colors text-xl" title="Perfil profesional">
                        link
                    </a>
                    @endif
                </div>
            </div>
        </div>
        @empty
        <!-- Fallback Team Cards -->
        <div class="md:col-span-6 bg-white dark:bg-gray-900 rounded-xl overflow-hidden border border-gray-200 dark:border-gray-800 flex flex-col sm:flex-row">
            <div class="sm:w-1/2 h-64 sm:h-auto bg-cover bg-center grayscale hover:grayscale-0 transition-all duration-500" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBw7_ADBgZcDB4yW8cbvStlrh4ej-qnY-jK_ezo7Pkk1kaRkAFqlcyxvCOsLL0dPZkx6AQPEprnEuPQuAeGncyGOvmdaLu5oU36YuIXNZCgrBhXHO58ajP7PuceismrjVRr1LFnOggrhxA7fA38Bdwqzk4Tz4ZgKoYuVfU6AO13drKBueOElVklc_M2bWbTaRSeMiFMRNAyFVcqeespz_mlRrijZe-4SPQ4n7sXpqM6pYrE7x0zNbJGzWmMqMtCAFBBYaO97VFmAOQS');"></div>
            <div class="p-8 sm:w-1/2 flex flex-col justify-center">
                <h3 class="grid-header text-2xl mb-1">Dr. Alejandro Daza</h3>
                <p class="text-primary font-bold text-xs uppercase tracking-widest mb-4">Socio Fundador</p>
                <p class="text-sm text-gray-500 italic mb-6">"La justicia no es solo una meta, es un proceso de transparencia absoluta."</p>
                <div class="flex gap-3">
                    <span class="material-symbols-outlined text-gray-400 hover:text-primary cursor-pointer">mail</span>
                    <span class="material-symbols-outlined text-gray-400 hover:text-primary cursor-pointer">link</span>
                </div>
            </div>
        </div>
        <div class="md:col-span-6 bg-white dark:bg-gray-900 rounded-xl overflow-hidden border border-gray-200 dark:border-gray-800 flex flex-col sm:flex-row">
            <div class="sm:w-1/2 h-64 sm:h-auto bg-cover bg-center grayscale hover:grayscale-0 transition-all duration-500" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuCHl4HPc0ugKsF7mZqOPbRxNssTNK5J98HPQxC9gVh9yJwRDzZEf1z-sWojmXZggZrZ685Vv9NlOL1051q2JZhEDipaBnqyQ6UcYnPnsiUR_7JANfei8vCOYJp6XwnCj86FSc_4LNj5cucL0qTOnJ1Tubw6yfUkBFEPmBkd19qZjdnLjBVdBe7FrkpcqauFGYmu6dlYemA0KdBdlL5VJFU3oOCKiz6yI8BeR_7SdatmMEEyR67qk6Sv70XHyog7VhFRLsKAsW74jQg_');"></div>
            <div class="p-8 sm:w-1/2 flex flex-col justify-center">
                <h3 class="grid-header text-2xl mb-1">Dra. Camila Morales</h3>
                <p class="text-primary font-bold text-xs uppercase tracking-widest mb-4">Especialista Senior</p>
                <p class="text-sm text-gray-500 italic mb-6">"Enfocada en resultados que trascienden el marco legal tradicional."</p>
                <div class="flex gap-3">
                    <span class="material-symbols-outlined text-gray-400 hover:text-primary cursor-pointer">mail</span>
                    <span class="material-symbols-outlined text-gray-400 hover:text-primary cursor-pointer">link</span>
                </div>
            </div>
        </div>
        @endforelse

        <!-- Contact & Map Block -->
        <!-- Contact Form (7 cols) -->
        <section class="md:col-span-7 bg-white dark:bg-gray-900 rounded-xl border border-gray-200 dark:border-gray-800 p-8 shadow-sm flex flex-col justify-between" id="contacto">
            <div>
                <span class="text-primary font-bold uppercase text-xs tracking-widest block mb-1">Contacto Directo</span>
                <h2 class="grid-header text-3xl mb-6 text-gray-900 dark:text-white">Agende una Cita</h2>

                <div id="contact-alert" class="hidden mb-6 p-4 rounded-xl text-sm font-medium"></div>

                <form id="contact-form" action="{{ route('contact.submit') }}" method="POST" class="space-y-4">
                    @csrf
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="flex flex-col gap-1">
                            <label for="name" class="text-xs font-bold uppercase text-gray-400">Nombre Completo *</label>
                            <input id="name" name="name" required class="bg-background-light dark:bg-gray-800 border-none rounded-lg focus:ring-2 focus:ring-primary text-sm p-3 text-gray-900 dark:text-gray-100 placeholder-gray-400 transition-colors" placeholder="Su nombre" type="text" value="{{ old('name') }}"/>
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="email" class="text-xs font-bold uppercase text-gray-400">Email Corporativo *</label>
                            <input id="email" name="email" required class="bg-background-light dark:bg-gray-800 border-none rounded-lg focus:ring-2 focus:ring-primary text-sm p-3 text-gray-900 dark:text-gray-100 placeholder-gray-400 transition-colors" placeholder="email@ejemplo.com" type="email" value="{{ old('email') }}"/>
                        </div>
                    </div>

                    <div class="flex flex-col gap-1">
                        <label for="subject" class="text-xs font-bold uppercase text-gray-400">Asunto</label>
                        <select id="subject" name="subject" class="bg-background-light dark:bg-gray-800 border-none rounded-lg focus:ring-2 focus:ring-primary text-sm p-3 text-gray-900 dark:text-gray-100 transition-colors">
                            <option value="Consulta Corporativa">Consulta Corporativa</option>
                            <option value="Litigios y Arbitraje">Litigios y Arbitraje</option>
                            <option value="Laboral y Seguridad">Laboral y Seguridad</option>
                            <option value="Propiedad Intelectual">Propiedad Intelectual</option>
                            <option value="Otros Asuntos Jurídicos">Otros Asuntos Jurídicos</option>
                        </select>
                    </div>

                    <div class="flex flex-col gap-1">
                        <label for="message" class="text-xs font-bold uppercase text-gray-400">Mensaje *</label>
                        <textarea id="message" name="message" required rows="4" class="bg-background-light dark:bg-gray-800 border-none rounded-lg focus:ring-2 focus:ring-primary text-sm p-3 text-gray-900 dark:text-gray-100 placeholder-gray-400 transition-colors resize-none" placeholder="¿Cómo podemos asesorarle?"></textarea>
                    </div>

                    <button type="submit" id="submit-btn" class="w-full bg-primary text-white py-4 rounded-xl font-black text-lg hover:bg-primary-dark hover:shadow-lg hover:shadow-primary/20 transition-all flex items-center justify-center gap-2">
                        <span id="btn-text">Enviar Solicitud</span>
                        <span id="btn-spinner" class="material-symbols-outlined hidden animate-spin">progress_activity</span>
                    </button>
                </form>
            </div>
            <div class="mt-4 pt-4 border-t border-gray-100 dark:border-gray-800 text-xs text-gray-400 flex items-center gap-2">
                <span class="material-symbols-outlined text-sm text-emerald-500">lock</span>
                <span>Sus comunicaciones y datos están protegidos bajo estricto secreto profesional.</span>
            </div>
        </section>

        <!-- Map and Address (5 cols) -->
        <div class="md:col-span-5 flex flex-col gap-6">
            <div class="bg-white dark:bg-gray-900 rounded-xl border border-gray-200 dark:border-gray-800 overflow-hidden h-full flex flex-col shadow-sm">
                <!-- Map representation -->
                <div class="flex-1 min-h-[250px] bg-gray-200 dark:bg-gray-800 relative group overflow-hidden">
                    <div class="absolute inset-0 bg-cover bg-center opacity-70 grayscale group-hover:grayscale-0 group-hover:scale-105 transition-all duration-700" 
                         data-alt="Stylized map of Bogota Colombia office location" 
                         data-location="Bogota" 
                         style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuAeQHO5RS-lkugRJaHNsVZ34vMVNb-4uBPtgkXtyXCCQfWY3wfhMVpes9BGYG85gkl7cOWo2832mKQDqa933ZcX94BoR5HkWZK6XSa9cutMhv2QoSBDlt7KW9kIEXf0CHgwAR1XepJIRvoMNCgmsH87L29kPc-nBLev4Oma68IZyjVBfR43bD0i71BnrkFYdT57sh1zIogZNWsmOaQ22229PH-1hy2OF7Y67r9OD07HGEqfOb7PM1_EJy_ksOKwRpP9urL6p-ATt-oB');">
                    </div>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="size-12 bg-primary rounded-full flex items-center justify-center shadow-2xl animate-pulse">
                            <span class="material-symbols-outlined text-white text-2xl">location_on</span>
                        </div>
                    </div>
                </div>

                <!-- Office Contact Info -->
                <div class="p-6">
                    <h4 class="font-bold text-lg mb-2 text-gray-900 dark:text-white">Sede Principal Bogotá</h4>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mb-4 leading-relaxed">
                        {!! nl2br(e($settings['address'] ?? "Calle 100 # 15-32, Edificio Amadeus\nBogotá D.C., Colombia")) !!}
                    </p>
                    <div class="flex flex-col gap-2.5">
                        <div class="flex items-center gap-2 text-sm text-gray-700 dark:text-gray-300">
                            <span class="material-symbols-outlined text-primary text-lg">phone</span>
                            <span>{{ $settings['phone'] ?? '+57 (601) 456 7890' }}</span>
                        </div>
                        <div class="flex items-center gap-2 text-sm text-gray-700 dark:text-gray-300">
                            <span class="material-symbols-outlined text-primary text-lg">schedule</span>
                            <span>{{ $settings['schedule'] ?? 'Lun - Vie, 8am - 6pm' }}</span>
                        </div>
                        <div class="flex items-center gap-2 text-sm text-gray-700 dark:text-gray-300">
                            <span class="material-symbols-outlined text-primary text-lg">mail</span>
                            <span>{{ $settings['email'] ?? 'contacto@dimo.com.co' }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>

<!-- Footer Block -->
<footer class="bg-gray-900 text-white mt-16 py-12 px-6 border-t border-gray-800">
    <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-start gap-8">
        <div class="flex flex-col gap-4">
            <div class="flex items-center gap-2">
                <div class="bg-primary p-1 rounded text-white flex items-center justify-center">
                    <span class="material-symbols-outlined text-xl">balance</span>
                </div>
                <h2 class="text-xl font-black tracking-tight uppercase">
                    myclegalgroup.com
                </h2>
            </div>
            <p class="text-gray-400 text-sm max-w-xs leading-relaxed">
                {{ $settings['firm_slogan'] ?? 'Firmando el futuro legal de Colombia con integridad y excelencia técnica.' }}
            </p>
            <div class="pt-2">
                <a href="{{ route('admin.dashboard') }}" class="text-xs text-gray-400 hover:text-white inline-flex items-center gap-1.5 px-3 py-1.5 rounded bg-gray-800 hover:bg-gray-700 transition-colors">
                    <span class="material-symbols-outlined text-sm">lock</span>
                    <span>Acceso Panel AdminLTE</span>
                </a>
            </div>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-3 gap-12">
            <div class="flex flex-col gap-3">
                <h4 class="font-bold text-sm uppercase tracking-widest text-primary">Mapa</h4>
                <a class="text-sm text-gray-400 hover:text-white transition-colors" href="#filosofia">Filosofía</a>
                <a class="text-sm text-gray-400 hover:text-white transition-colors" href="#servicios">Servicios</a>
                <a class="text-sm text-gray-400 hover:text-white transition-colors" href="#equipo">Equipo</a>
                <a class="text-sm text-gray-400 hover:text-white transition-colors" href="#contacto">Contacto</a>
            </div>
            <div class="flex flex-col gap-3">
                <h4 class="font-bold text-sm uppercase tracking-widest text-primary">Legal</h4>
                <a class="text-sm text-gray-400 hover:text-white transition-colors" href="#">Privacidad</a>
                <a class="text-sm text-gray-400 hover:text-white transition-colors" href="#">Términos</a>
                <a class="text-sm text-gray-400 hover:text-white transition-colors" href="#">Cookies</a>
            </div>
            <div class="flex flex-col gap-3">
                <h4 class="font-bold text-sm uppercase tracking-widest text-primary">Conexión</h4>
                <div class="flex gap-4">
                    <a href="#" class="material-symbols-outlined text-gray-400 hover:text-primary transition-colors text-2xl">public</a>
                    <a href="#" class="material-symbols-outlined text-gray-400 hover:text-primary transition-colors text-2xl">group</a>
                    <a href="#" class="material-symbols-outlined text-gray-400 hover:text-primary transition-colors text-2xl">person</a>
                </div>
                <p class="text-xs text-gray-500 mt-2">Bogotá D.C., Colombia</p>
            </div>
        </div>
    </div>
    <div class="max-w-7xl mx-auto border-t border-gray-800 mt-12 pt-8 flex flex-col sm:flex-row items-center justify-between text-xs text-gray-500 gap-4">
        <div>
            © {{ date('Y') }} myclegalgroup.com. Todos los derechos reservados. Abogados Registrados en el CSJ.
        </div>
        <div class="flex items-center gap-4">
            <a href="{{ route('admin.dashboard') }}" class="hover:underline">Portal Administrativo</a>
            <span>•</span>
            <a href="#" class="hover:underline">Aviso de Privacidad</a>
        </div>
    </div>
</footer>

<!-- Interactive Scripts -->
<script>
    // Dark Mode Toggle Logic
    const themeToggleBtn = document.getElementById('theme-toggle');
    const themeToggleBtnMobile = document.getElementById('theme-toggle-mobile');
    const darkIcon = document.getElementById('theme-toggle-dark-icon');
    const lightIcon = document.getElementById('theme-toggle-light-icon');

    function updateIcons() {
        if (document.documentElement.classList.contains('dark')) {
            lightIcon?.classList.remove('hidden');
            darkIcon?.classList.add('hidden');
        } else {
            darkIcon?.classList.remove('hidden');
            lightIcon?.classList.add('hidden');
        }
    }

    if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark');
        document.documentElement.classList.remove('light');
    } else {
        document.documentElement.classList.remove('dark');
        document.documentElement.classList.add('light');
    }
    updateIcons();

    function toggleTheme() {
        if (document.documentElement.classList.contains('dark')) {
            document.documentElement.classList.remove('dark');
            document.documentElement.classList.add('light');
            localStorage.setItem('color-theme', 'light');
        } else {
            document.documentElement.classList.add('dark');
            document.documentElement.classList.remove('light');
            localStorage.setItem('color-theme', 'dark');
        }
        updateIcons();
    }

    themeToggleBtn?.addEventListener('click', toggleTheme);
    themeToggleBtnMobile?.addEventListener('click', toggleTheme);

    // AJAX Submission for Contact Form
    const form = document.getElementById('contact-form');
    const alertBox = document.getElementById('contact-alert');
    const submitBtn = document.getElementById('submit-btn');
    const btnText = document.getElementById('btn-text');
    const btnSpinner = document.getElementById('btn-spinner');

    form?.addEventListener('submit', async function(e) {
        e.preventDefault();
        
        btnText.textContent = 'Enviando...';
        btnSpinner.classList.remove('hidden');
        submitBtn.disabled = true;
        alertBox.classList.add('hidden');

        try {
            const formData = new FormData(form);
            const response = await fetch(form.action, {
                method: 'POST',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                },
                body: formData
            });

            const data = await response.json();

            if (response.ok && data.success) {
                alertBox.className = 'mb-6 p-4 rounded-xl text-sm font-medium bg-emerald-500/10 border border-emerald-500/30 text-emerald-800 dark:text-emerald-300';
                alertBox.innerHTML = '<div class="flex items-center gap-2"><span class="material-symbols-outlined text-emerald-500">check_circle</span> <span>' + data.message + '</span></div>';
                alertBox.classList.remove('hidden');
                form.reset();
            } else {
                let errorMsg = data.message || 'Ocurrió un error al procesar su solicitud. Por favor verifique los campos.';
                if (data.errors) {
                    errorMsg = Object.values(data.errors).flat().join('<br>');
                }
                alertBox.className = 'mb-6 p-4 rounded-xl text-sm font-medium bg-red-500/10 border border-red-500/30 text-red-800 dark:text-red-300';
                alertBox.innerHTML = '<div class="flex items-center gap-2"><span class="material-symbols-outlined text-red-500">error</span> <div>' + errorMsg + '</div></div>';
                alertBox.classList.remove('hidden');
            }
        } catch (err) {
            alertBox.className = 'mb-6 p-4 rounded-xl text-sm font-medium bg-red-500/10 border border-red-500/30 text-red-800 dark:text-red-300';
            alertBox.innerHTML = '<div class="flex items-center gap-2"><span class="material-symbols-outlined text-red-500">wifi_off</span> <span>Error de conexión. Inténtelo nuevamente.</span></div>';
            alertBox.classList.remove('hidden');
        } finally {
            btnText.textContent = 'Enviar Solicitud';
            btnSpinner.classList.add('hidden');
            submitBtn.disabled = false;
        }
    });
</script>

</body>
</html>
