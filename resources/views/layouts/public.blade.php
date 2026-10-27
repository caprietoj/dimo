<!DOCTYPE html>
<html class="light" lang="es">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>@yield('title', 'M&C LEGAL GROUP - Grid Focused')</title>

    <!-- Google Fonts: Inter for UI, Playfair Display for legal headers -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;900&family=Playfair+Display:ital,wght@0,700;0,900;1,700&display=swap" rel="stylesheet"/>
    <!-- Material Symbols -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>

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
    @stack('styles')
</head>
<body class="bg-background-light dark:bg-background-dark font-display text-gray-900 dark:text-gray-100 transition-colors duration-300 min-h-screen flex flex-col">

<!-- Top Navigation Bar (Exact Grid Focused Navbar) -->
<div class="sticky top-0 z-50 w-full bg-white/80 dark:bg-background-dark/80 backdrop-blur-md border-b border-gray-200 dark:border-gray-800">
    <div class="max-w-7xl mx-auto px-6 min-h-[4.5rem] py-2 flex items-center justify-between">
        <!-- Logo M&C LEGAL GROUP con Slogan Debajo -->
        <a href="{{ route('home') }}" class="flex items-center gap-3 py-1 group">
            <div class="bg-primary p-2 rounded text-white flex items-center justify-center shrink-0">
                <span class="material-symbols-outlined text-2xl">balance</span>
            </div>
            <div class="flex flex-col">
                <h2 class="text-xl font-black tracking-tight uppercase text-gray-900 dark:text-white leading-tight">
                    {{ $settings['firm_short_name'] ?? 'M&C LEGAL GROUP' }}
                </h2>
                <span class="text-[10px] md:text-xs text-gray-500 dark:text-gray-400 font-medium leading-tight tracking-tight">
                    {{ $settings['firm_slogan'] ?? 'La Ciencia del Derecho aplicada a la Certeza de su Defensa.' }}
                </span>
            </div>
        </a>

        <!-- Menu Options requested by the user -->
        <div class="hidden lg:flex items-center gap-6 xl:gap-8">
            <nav class="flex items-center gap-1.5 xl:gap-2">
                <a class="px-3.5 py-2 rounded-lg text-sm font-semibold transition-all {{ request()->routeIs('home') ? 'text-primary bg-primary/10 font-bold shadow-sm' : 'text-gray-700 dark:text-gray-300 hover:text-primary hover:bg-gray-100 dark:hover:bg-gray-800' }}" href="{{ route('home') }}">
                    Inicio
                </a>
                <a class="px-3.5 py-2 rounded-lg text-sm font-semibold transition-all {{ request()->routeIs('about') ? 'text-primary bg-primary/10 font-bold shadow-sm' : 'text-gray-700 dark:text-gray-300 hover:text-primary hover:bg-gray-100 dark:hover:bg-gray-800' }}" href="{{ route('about') }}">
                    Nuestra Firma
                </a>
                <a class="px-3.5 py-2 rounded-lg text-sm font-semibold transition-all {{ request()->routeIs('services') ? 'text-primary bg-primary/10 font-bold shadow-sm' : 'text-gray-700 dark:text-gray-300 hover:text-primary hover:bg-gray-100 dark:hover:bg-gray-800' }}" href="{{ route('services') }}">
                    Estrategias y Soluciones
                </a>
                <a class="px-4 py-2 rounded-lg text-sm font-bold transition-all {{ request()->routeIs('contact') ? 'bg-primary text-white shadow-md shadow-primary/20 hover:bg-primary-dark' : 'bg-primary/10 text-primary hover:bg-primary hover:text-white' }}" href="{{ route('contact') }}">
                    Consultoría de Alto Nivel
                </a>
            </nav>

            <!-- Herramientas y Accesos -->
            <div class="flex items-center gap-3 pl-4 border-l border-gray-200 dark:border-gray-800">
                <!-- Dark / Light Mode Toggle -->
                <button id="theme-toggle" type="button" aria-label="Cambiar tema" class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 p-2 rounded-lg text-sm transition-colors" title="Cambiar tema claro / oscuro">
                    <span id="theme-toggle-dark-icon" class="material-symbols-outlined hidden text-xl">dark_mode</span>
                    <span id="theme-toggle-light-icon" class="material-symbols-outlined hidden text-xl">light_mode</span>
                </button>

                <!-- AdminLTE Panel -->
                <a href="{{ route('admin.dashboard') }}" class="text-xs font-semibold px-2.5 py-1.5 rounded-lg border border-gray-200 dark:border-gray-700 hover:border-primary text-gray-500 dark:text-gray-400 hover:text-primary flex items-center gap-1.5 transition-colors" title="Panel de Administración AdminLTE">
                    <span class="material-symbols-outlined text-sm">tune</span>
                    <span>Admin</span>
                </a>
            </div>
        </div>

        <!-- Mobile Controls -->
        <div class="flex items-center gap-2 lg:hidden">
            <button id="theme-toggle-mobile" type="button" class="text-gray-500 dark:text-gray-400 p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800">
                <span class="material-symbols-outlined text-xl">brightness_4</span>
            </button>
            <button id="mobile-menu-btn" type="button" class="text-gray-700 dark:text-gray-300 p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800">
                <span class="material-symbols-outlined text-2xl">menu</span>
            </button>
        </div>
    </div>

    <!-- Mobile Drawer -->
    <div id="mobile-menu" class="hidden lg:hidden border-t border-gray-200 dark:border-gray-800 bg-white dark:bg-background-dark px-6 py-4 space-y-2">
        <p class="text-[11px] text-primary font-semibold border-b border-gray-100 dark:border-gray-800 pb-2 mb-2 leading-tight">
            {{ $settings['firm_slogan'] ?? 'La Ciencia del Derecho aplicada a la Certeza de su Defensa.' }}
        </p>
        <a class="flex items-center gap-2.5 px-3 py-2 rounded-lg text-sm font-medium transition-colors {{ request()->routeIs('home') ? 'bg-primary/10 text-primary font-bold' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800' }}" href="{{ route('home') }}">
            <span class="material-symbols-outlined text-lg">home</span>
            <span>Inicio</span>
        </a>
        <a class="flex items-center gap-2.5 px-3 py-2 rounded-lg text-sm font-medium transition-colors {{ request()->routeIs('about') ? 'bg-primary/10 text-primary font-bold' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800' }}" href="{{ route('about') }}">
            <span class="material-symbols-outlined text-lg">corporate_fare</span>
            <span>Nuestra Firma</span>
        </a>
        <a class="flex items-center gap-2.5 px-3 py-2 rounded-lg text-sm font-medium transition-colors {{ request()->routeIs('services') ? 'bg-primary/10 text-primary font-bold' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800' }}" href="{{ route('services') }}">
            <span class="material-symbols-outlined text-lg">balance</span>
            <span>Estrategias y Soluciones</span>
        </a>
        <a class="flex items-center gap-2.5 px-3 py-2 rounded-lg text-sm font-bold bg-primary text-white hover:bg-primary-dark transition-colors" href="{{ route('contact') }}">
            <span class="material-symbols-outlined text-lg">support_agent</span>
            <span>Consultoría de Alto Nivel</span>
        </a>
        <div class="pt-3 mt-2 border-t border-gray-200 dark:border-gray-800 flex items-center justify-between text-xs text-gray-500">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-1 hover:text-primary">
                <span class="material-symbols-outlined text-sm">tune</span>
                <span>Panel AdminLTE</span>
            </a>
            <span class="text-[10px] text-gray-400">M&amp;C LEGAL GROUP</span>
        </div>
    </div>
</div>

<!-- Main Page Content -->
<main class="max-w-7xl mx-auto px-6 py-8 flex-1 w-full">
    @yield('content')
</main>

<!-- Footer Block (Exact Grid Focused Footer with the 4 columns requested) -->
<footer class="bg-gray-900 text-white mt-16 py-12 px-6">
    <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-start gap-8">
        
        <!-- Columna 1: Identidad Corporativa -->
        <div class="flex flex-col gap-3 max-w-sm">
            <!-- Logo M&C LEGAL GROUP idéntico al menú de navegación superior -->
            <a href="{{ route('home') }}" class="flex items-center gap-3 py-1 group">
                <div class="bg-primary p-2 rounded text-white flex items-center justify-center shrink-0 shadow-sm">
                    <span class="material-symbols-outlined text-2xl">balance</span>
                </div>
                <div class="flex flex-col">
                    <h2 class="text-xl font-black tracking-tight uppercase text-white leading-tight">
                        {{ $settings['firm_short_name'] ?? 'M&C LEGAL GROUP' }}
                    </h2>
                    <span class="text-[10px] md:text-xs text-gray-400 font-medium leading-tight tracking-tight">
                        {{ $settings['firm_slogan'] ?? 'La Ciencia del Derecho aplicada a la Certeza de su Defensa.' }}
                    </span>
                </div>
            </a>
            <p class="text-sm font-bold text-gray-200">
                {{ $settings['firm_name'] ?? 'M&C LEGAL GROUP' }}
            </p>
            <p class="text-gray-400 text-sm leading-relaxed italic">
                "{{ $settings['footer_slogan'] ?? 'Excelencia jurídica y rigor técnico al servicio de su seguridad y patrimonio.' }}"
            </p>
        </div>

        <!-- 3 Columnas Derechas: Especialidades, Navegación, Ubicación -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-10 w-full md:w-auto">
            
            <!-- Columna 2: Áreas de Especialidad (Servicios) -->
            <div class="flex flex-col gap-3">
                <h4 class="font-bold text-sm uppercase tracking-widest text-primary">Especialidades</h4>
                @if(isset($globalPracticeAreas) && $globalPracticeAreas->count() > 0)
                    @foreach($globalPracticeAreas->take(5) as $area)
                        <a class="text-sm text-gray-400 hover:text-white transition-colors" href="{{ route('services') }}">{{ $area->title }}</a>
                    @endforeach
                @else
                    <a class="text-sm text-gray-400 hover:text-white transition-colors" href="{{ route('services') }}">Derecho Corporativo</a>
                    <a class="text-sm text-gray-400 hover:text-white transition-colors" href="{{ route('services') }}">Litigios y Arbitraje</a>
                    <a class="text-sm text-gray-400 hover:text-white transition-colors" href="{{ route('services') }}">Control de Riesgos</a>
                    <a class="text-sm text-gray-400 hover:text-white transition-colors" href="{{ route('services') }}">Seguridad Jurídica</a>
                @endif
            </div>

            <!-- Columna 3: Navegación (Compañía) -->
            <div class="flex flex-col gap-3">
                <h4 class="font-bold text-sm uppercase tracking-widest text-primary">Navegación</h4>
                <a class="text-sm text-gray-400 hover:text-white transition-colors" href="{{ route('home') }}">Inicio</a>
                <a class="text-sm text-gray-400 hover:text-white transition-colors" href="{{ route('about') }}">Nuestra Firma</a>
                <a class="text-sm text-gray-400 hover:text-white transition-colors" href="{{ route('services') }}">Estrategias y Soluciones</a>
                <a class="text-sm text-gray-400 hover:text-white transition-colors" href="{{ route('contact') }}">Consultoría de Alto Nivel</a>
                <a class="text-xs text-gray-500 hover:text-primary transition-colors pt-1" href="{{ route('admin.dashboard') }}">Panel AdminLTE</a>
            </div>

            <!-- Columna 4: Ubicación y Vínculo -->
            <div class="flex flex-col gap-3">
                <h4 class="font-bold text-sm uppercase tracking-widest text-primary">Ubicación</h4>
                <p class="text-sm text-gray-400 leading-relaxed">
                    {!! nl2br(e($settings['address'] ?? "Calle 100 # 15-32\nEdificio Amadeus, Piso 7\nBogotá D.C., Colombia")) !!}
                </p>
                <p class="text-sm text-gray-300">
                    <span class="text-primary font-bold">Tel:</span> {{ $settings['phone'] ?? '+57 (601) 456 7890' }}
                </p>
                <div class="flex gap-4 pt-1">
                    <a href="{{ $settings['x_button_url'] ?? 'https://x.com' }}" target="_blank" rel="noopener noreferrer" class="material-symbols-outlined cursor-pointer hover:text-primary transition-colors text-xl" title="Twitter / X">public</a>
                    <a href="mailto:{{ $settings['email'] ?? 'departamentojuridico@myclegalgroup.com' }}" class="material-symbols-outlined cursor-pointer hover:text-primary transition-colors text-xl" title="Correo">mail</a>
                    <a href="{{ route('admin.dashboard') }}" class="material-symbols-outlined cursor-pointer hover:text-primary transition-colors text-xl" title="Panel Admin">tune</a>
                </div>
            </div>

        </div>
    </div>

    <!-- Copyright Oficial Solicitado -->
    <div class="max-w-7xl mx-auto border-t border-gray-800 mt-12 pt-8 text-center text-xs text-gray-500">
        {{ $settings['footer_copyright'] ?? '© 2026 DIMO - Defensa, Investigación y Metodologías Operacionales. Todos los derechos reservados. El rigor en la fuente, nuestra garantía jurídica.' }}
    </div>
</footer>

<!-- Theme Toggle Logic -->
<script>
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

    if (localStorage.getItem('color-theme') === 'dark') {
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

    const mobileBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    mobileBtn?.addEventListener('click', () => {
        mobileMenu?.classList.toggle('hidden');
    });
</script>
@stack('scripts')
</body>
</html>
