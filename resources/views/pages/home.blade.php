@extends('layouts.public')

@section('title', ($settings['firm_short_name'] ?? 'M&C LEGAL GROUP') . ' - ' . ($settings['hero_title'] ?? 'Arquitectura Jurídica Superior'))

@section('content')
<!-- Main Grid Content (Strict DIMO Law Firm - Grid Focused Architecture) -->
<div class="grid grid-cols-1 md:grid-cols-12 gap-6">

    <!-- PORTADA INICIAL (Large Span - md:col-span-8) -->
    <section class="md:col-span-8 bg-white dark:bg-gray-900 rounded-xl overflow-hidden border border-gray-200 dark:border-gray-800 flex flex-col justify-between shadow-sm">
        <div class="p-8 md:p-12 flex-1 flex flex-col justify-center">
            <span class="text-primary font-bold tracking-widest uppercase text-xs mb-4">
                {{ $settings['hero_badge'] ?? 'Desde ' . ($settings['since_year'] ?? '1994') . ' • Alta Precisión Forense' }}
            </span>
            <h1 class="grid-header text-3xl md:text-5xl text-gray-900 dark:text-white mb-6 leading-tight">
                {{ $settings['hero_title'] ?? 'Arquitectura Jurídica Superior y Control Integral de Riesgos Legales' }}: 
                <span class="italic underline decoration-primary/30">{{ $settings['hero_subtitle'] ?? 'Garantizamos la Máxima Tutela de sus Derechos' }}</span>.
            </h1>
            <p class="text-base md:text-lg text-gray-600 dark:text-gray-400 max-w-2xl mb-8 leading-relaxed">
                {{ $settings['hero_phrase'] ?? 'Mediante el Diseño de Metodologías Operativas Orientadas a la Eficacia Procesal y la Prevalencia de la Seguridad Jurídica en Escenarios de Alta Conflictividad.' }}
            </p>
            <div class="flex flex-wrap gap-4">
                <a href="{{ route('contact') }}" class="bg-primary text-white px-6 py-3 rounded-lg font-bold flex items-center gap-2 hover:bg-primary-dark transition-all">
                    <span>Consultoría de Alto Nivel</span>
                    <span class="material-symbols-outlined text-sm">arrow_forward</span>
                </a>
                <a href="{{ route('about') }}" class="border border-gray-300 dark:border-gray-700 hover:border-primary text-gray-700 dark:text-gray-300 px-6 py-3 rounded-lg font-bold flex items-center gap-2 transition-all">
                    <span>Nuestra Firma</span>
                </a>
            </div>
        </div>
        <!-- Imagen de portada con el estilo exacto de biblioteca jurídica de Stitch -->
        <div class="h-64 bg-cover bg-center border-t border-gray-100 dark:border-gray-800" 
             data-alt="Modern law office library with sleek wooden shelves" 
             style="background-image: url('{{ (!empty($settings['hero_image']) ? asset($settings['hero_image']) : 'https://lh3.googleusercontent.com/aida-public/AB6AXuBwDg6y45y18okSbZT34ztaF_Dq8VCfy-M3_SojFYOH3ndbNBNSxh9uk1M1mRHcDYeaZFZ1LnJ_eLE3LVm1_GEnNfpLEoZ2BQVEp5SYeQp8QiN_fFj06zea_Z8WrWI2bS3-3yWPrd4T2TNivUD5MGUexppDsEzDLG11O5jL7yIpdOHFP90q8JzRT7U8QgbvPSBQx8AqnWkbAz71lVGsgtXBfCu0q4oz0ZFJyDgXuNRy_NjAjRZ-zYsKTKmeVCDf8iAaXr3F5hu1m47z') }}');">
        </div>
    </section>

    <!-- SLOGAN & STATS BLOCK (md:col-span-4) -->
    <div class="md:col-span-4 flex flex-col gap-6">
        <!-- Slogan Card en Bloque Primario Azul de Stitch -->
        <div class="bg-primary text-white p-8 rounded-xl flex flex-col justify-between h-full shadow-sm">
            <span class="material-symbols-outlined text-4xl mb-4">balance</span>
            <div>
                <span class="text-wine-200 text-xs font-bold uppercase tracking-widest block mb-1">Doctrina Institucional</span>
                <h3 class="grid-header text-2xl md:text-3xl mb-3 leading-snug">
                    {{ $settings['firm_slogan'] ?? 'La Ciencia del Derecho aplicada a la Certeza de su Defensa.' }}
                </h3>
                <p class="text-wine-100 text-sm leading-relaxed">
                    {{ $settings['slogan_desc'] ?? 'Nuestros procesos están blindados por estándares dogmáticos y rigor ético inexpugnable.' }}
                </p>
            </div>
        </div>

        <!-- Stats Card de Stitch -->
        <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 p-8 rounded-xl h-full shadow-sm flex flex-col justify-between">
            <div>
                <h3 class="text-4xl font-black mb-1 text-gray-900 dark:text-white">{{ $settings['success_rate'] ?? '98' }}%</h3>
                <p class="text-gray-500 text-sm uppercase font-bold tracking-wider mb-4">{{ $settings['stats_label'] ?? 'Casos Exitosos' }}</p>
            </div>
            <div>
                <div class="w-full bg-gray-100 dark:bg-gray-800 h-2 rounded-full overflow-hidden mb-2">
                    <div class="bg-primary h-full rounded-full" style="width: {{ min(100, max(1, (int)($settings['success_rate'] ?? 98))) }}%;"></div>
                </div>
                <p class="text-xs text-gray-400">{{ $settings['stats_desc'] ?? 'Prevalencia de seguridad jurídica en litigios de alta cuantía.' }}</p>
            </div>
        </div>
    </div>

    <!-- RECUADRO 2: FUNDAMENTOS DE EXCELENCIA JURÍDICA -->
    <div class="md:col-span-12 flex items-end justify-between px-2 pt-8 pb-2 border-b-2 border-primary/20">
        <h2 class="grid-header text-3xl font-bold text-gray-900 dark:text-white">Fundamentos de Excelencia Jurídica</h2>
        <span class="text-primary text-sm font-bold hidden sm:inline">Pilares Doctrinales DIMO</span>
    </div>

    <!-- 4 Cuadros en Horizontal (md:col-span-3 cada uno con diseño Grid Focused) -->
    <!-- Cuadro 1: Rigor Normativo -->
    <div class="md:col-span-3 bg-white dark:bg-gray-900 p-6 rounded-xl border border-gray-200 dark:border-gray-800 hover:border-primary transition-colors group cursor-pointer shadow-sm flex flex-col justify-between">
        <div>
            <div class="size-12 bg-primary/10 rounded-lg flex items-center justify-center text-primary mb-4 group-hover:bg-primary group-hover:text-white transition-all">
                <span class="material-symbols-outlined text-2xl">menu_book</span>
            </div>
            <h3 class="text-lg font-bold mb-2 text-gray-900 dark:text-white group-hover:text-primary transition-colors">
                {{ $settings['fundamento_1_title'] ?? 'Rigor Normativo' }}
            </h3>
            <p class="text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                {{ $settings['fundamento_1_desc'] ?? 'Nuestra práctica se fundamenta en un estudio exhaustivo y milimétrico de la norma colombiana, garantizando que cada estrategia esté blindada por la dogmática jurídica más sólida.' }}
            </p>
        </div>
        <div class="mt-4 pt-3 border-t border-gray-100 dark:border-gray-800 text-xs font-semibold text-primary opacity-0 group-hover:opacity-100 transition-opacity">
            Dogmática Pura &rarr;
        </div>
    </div>

    <!-- Cuadro 2: Ingenio y Estrategia Legal -->
    <div class="md:col-span-3 bg-white dark:bg-gray-900 p-6 rounded-xl border border-gray-200 dark:border-gray-800 hover:border-primary transition-colors group cursor-pointer shadow-sm flex flex-col justify-between">
        <div>
            <div class="size-12 bg-primary/10 rounded-lg flex items-center justify-center text-primary mb-4 group-hover:bg-primary group-hover:text-white transition-all">
                <span class="material-symbols-outlined text-2xl">psychology</span>
            </div>
            <h3 class="text-lg font-bold mb-2 text-gray-900 dark:text-white group-hover:text-primary transition-colors">
                {{ $settings['fundamento_2_title'] ?? 'Ingenio y Estrategia Legal' }}
            </h3>
            <p class="text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                {{ $settings['fundamento_2_desc'] ?? 'Abordamos cada desafío con una visión creativa y disruptiva, diseñando soluciones a medida que trascienden el litigio convencional para asegurar el éxito de nuestros representados.' }}
            </p>
        </div>
        <div class="mt-4 pt-3 border-t border-gray-100 dark:border-gray-800 text-xs font-semibold text-primary opacity-0 group-hover:opacity-100 transition-opacity">
            Solución Disruptiva &rarr;
        </div>
    </div>

    <!-- Cuadro 3: Precisión y Minuciosidad -->
    <div class="md:col-span-3 bg-white dark:bg-gray-900 p-6 rounded-xl border border-gray-200 dark:border-gray-800 hover:border-primary transition-colors group cursor-pointer shadow-sm flex flex-col justify-between">
        <div>
            <div class="size-12 bg-primary/10 rounded-lg flex items-center justify-center text-primary mb-4 group-hover:bg-primary group-hover:text-white transition-all">
                <span class="material-symbols-outlined text-2xl">biotech</span>
            </div>
            <h3 class="text-lg font-bold mb-2 text-gray-900 dark:text-white group-hover:text-primary transition-colors">
                {{ $settings['fundamento_3_title'] ?? 'Precisión y Minuciosidad' }}
            </h3>
            <p class="text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                {{ $settings['fundamento_3_desc'] ?? 'En el Derecho, el detalle es la diferencia entre el éxito y el riesgo. Analizamos cada variable probatoria con una metodología forense de alta precisión.' }}
            </p>
        </div>
        <div class="mt-4 pt-3 border-t border-gray-100 dark:border-gray-800 text-xs font-semibold text-primary opacity-0 group-hover:opacity-100 transition-opacity">
            Metodología Forense &rarr;
        </div>
    </div>

    <!-- Cuadro 4: Excelencia Corporativa -->
    <div class="md:col-span-3 bg-white dark:bg-gray-900 p-6 rounded-xl border border-gray-200 dark:border-gray-800 hover:border-primary transition-colors group cursor-pointer shadow-sm flex flex-col justify-between">
        <div>
            <div class="size-12 bg-primary/10 rounded-lg flex items-center justify-center text-primary mb-4 group-hover:bg-primary group-hover:text-white transition-all">
                <span class="material-symbols-outlined text-2xl">verified_user</span>
            </div>
            <h3 class="text-lg font-bold mb-2 text-gray-900 dark:text-white group-hover:text-primary transition-colors">
                {{ $settings['fundamento_4_title'] ?? 'Excelencia Corporativa' }}
            </h3>
            <p class="text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                {{ $settings['fundamento_4_desc'] ?? 'Operamos bajo los más estrictos estándares de ética y confidencialidad, proyectando la seriedad de una firma de alcance global.' }}
            </p>
        </div>
        <div class="mt-4 pt-3 border-t border-gray-100 dark:border-gray-800 text-xs font-semibold text-primary opacity-0 group-hover:opacity-100 transition-opacity">
            Estándar Global &rarr;
        </div>
    </div>

    <!-- RECUADRO 3: FORMATO DIAGRAMA DE FLUJO (EL METODO DIMO) -->
    <div class="md:col-span-12 flex items-end justify-between px-2 pt-8 pb-2 border-b-2 border-primary/20">
        <h2 class="grid-header text-3xl font-bold text-gray-900 dark:text-white uppercase tracking-tight">
            {{ $settings['metodo_title'] ?? 'EL METODO DIMO: INGENIERIA JURIDICA DE PRECISIÓN' }}
        </h2>
        <span class="text-primary text-sm font-bold hidden sm:inline">4 Estaciones Operativas</span>
    </div>

    <!-- Estación 1: Auditoría y Diagnóstico -->
    <div class="md:col-span-3 bg-white dark:bg-gray-900 p-6 rounded-xl border border-gray-200 dark:border-gray-800 relative hover:border-primary transition-colors group shadow-sm flex flex-col justify-between">
        <div>
            <div class="flex items-center justify-between mb-4">
                <span class="text-xs font-black uppercase tracking-wider text-primary bg-primary/10 px-2 py-0.5 rounded">Estación 1</span>
                <span class="material-symbols-outlined text-gray-400 group-hover:text-primary transition-colors">travel_explore</span>
            </div>
            <h3 class="text-base font-bold text-gray-900 dark:text-white mb-1">{{ $settings['estacion_1_title'] ?? 'Auditoría y Diagnóstico' }}</h3>
            <p class="text-xs font-semibold text-primary mb-3">{{ $settings['estacion_1_sub'] ?? '(El Cimiento)' }}</p>
            <p class="text-sm text-gray-500 dark:text-gray-400 leading-relaxed">
                {{ $settings['estacion_1_desc'] ?? 'Análisis microscópico de las fuentes del derecho y auditoría de riesgos procesales.' }}
            </p>
        </div>
        <div class="hidden lg:block absolute -right-3 top-1/2 -translate-y-1/2 z-10 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 size-6 rounded-full text-center text-xs leading-6 text-primary font-bold">
            &rarr;
        </div>
    </div>

    <!-- Estación 2: Arquitectura de Estrategia -->
    <div class="md:col-span-3 bg-white dark:bg-gray-900 p-6 rounded-xl border border-gray-200 dark:border-gray-800 relative hover:border-primary transition-colors group shadow-sm flex flex-col justify-between">
        <div>
            <div class="flex items-center justify-between mb-4">
                <span class="text-xs font-black uppercase tracking-wider text-primary bg-primary/10 px-2 py-0.5 rounded">Estación 2</span>
                <span class="material-symbols-outlined text-gray-400 group-hover:text-primary transition-colors">architecture</span>
            </div>
            <h3 class="text-base font-bold text-gray-900 dark:text-white mb-1">{{ $settings['estacion_2_title'] ?? 'Arquitectura de Estrategia' }}</h3>
            <p class="text-xs font-semibold text-primary mb-3">{{ $settings['estacion_2_sub'] ?? '(El Blindaje)' }}</p>
            <p class="text-sm text-gray-500 dark:text-gray-400 leading-relaxed">
                {{ $settings['estacion_2_desc'] ?? 'Diseño de la estructura argumentativa bajo el rigor de la dogmática jurídica y la jurisprudencia de cierre.' }}
            </p>
        </div>
        <div class="hidden lg:block absolute -right-3 top-1/2 -translate-y-1/2 z-10 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 size-6 rounded-full text-center text-xs leading-6 text-primary font-bold">
            &rarr;
        </div>
    </div>

    <!-- Estación 3: Despliegue Operativo -->
    <div class="md:col-span-3 bg-white dark:bg-gray-900 p-6 rounded-xl border border-gray-200 dark:border-gray-800 relative hover:border-primary transition-colors group shadow-sm flex flex-col justify-between">
        <div>
            <div class="flex items-center justify-between mb-4">
                <span class="text-xs font-black uppercase tracking-wider text-primary bg-primary/10 px-2 py-0.5 rounded">Estación 3</span>
                <span class="material-symbols-outlined text-gray-400 group-hover:text-primary transition-colors">bolt</span>
            </div>
            <h3 class="text-base font-bold text-gray-900 dark:text-white mb-1">{{ $settings['estacion_3_title'] ?? 'Despliegue Operativo' }}</h3>
            <p class="text-xs font-semibold text-primary mb-3">{{ $settings['estacion_3_sub'] ?? '(La Acción)' }}</p>
            <p class="text-sm text-gray-500 dark:text-gray-400 leading-relaxed">
                {{ $settings['estacion_3_desc'] ?? 'Ejecución técnica impecable en el escenario litigioso, garantizando la prevalencia de la seguridad jurídica.' }}
            </p>
        </div>
        <div class="hidden lg:block absolute -right-3 top-1/2 -translate-y-1/2 z-10 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 size-6 rounded-full text-center text-xs leading-6 text-primary font-bold">
            &rarr;
        </div>
    </div>

    <!-- Estación 4: Resolución y Resultado -->
    <div class="md:col-span-3 bg-white dark:bg-gray-900 p-6 rounded-xl border border-gray-200 dark:border-gray-800 hover:border-primary transition-colors group shadow-sm flex flex-col justify-between">
        <div>
            <div class="flex items-center justify-between mb-4">
                <span class="text-xs font-black uppercase tracking-wider text-primary bg-primary/10 px-2 py-0.5 rounded">Estación 4</span>
                <span class="material-symbols-outlined text-primary">task_alt</span>
            </div>
            <h3 class="text-base font-bold text-gray-900 dark:text-white mb-1">{{ $settings['estacion_4_title'] ?? 'Resolución y Resultado' }}</h3>
            <p class="text-xs font-semibold text-primary mb-3">{{ $settings['estacion_4_sub'] ?? '(El Éxito)' }}</p>
            <p class="text-sm text-gray-500 dark:text-gray-400 leading-relaxed">
                {{ $settings['estacion_4_desc'] ?? 'Obtención de soluciones jurídicas de alto impacto y protección definitiva de los intereses de la firma.' }}
            </p>
        </div>
        <div class="mt-4 pt-3 border-t border-gray-100 dark:border-gray-800 text-xs font-semibold text-primary">
            Certeza Procesal Definitiva
        </div>
    </div>

</div>
@endsection
