@extends('layouts.public')

@section('title', 'Nuestra Firma - ' . ($settings['firm_short_name'] ?? 'DIMO') . ' Colombia')

@section('content')
<!-- Grid Focused Architecture for "Nuestra Firma" (100% Editable) -->
<div class="grid grid-cols-1 md:grid-cols-12 gap-6">

    <!-- RECUADRO PRINCIPAL (md:col-span-8) -->
    <section class="md:col-span-8 bg-white dark:bg-gray-900 rounded-xl overflow-hidden border border-gray-200 dark:border-gray-800 flex flex-col justify-between shadow-sm">
        <div class="p-8 md:p-12 flex-1 flex flex-col justify-center">
            <span class="text-primary font-bold tracking-widest uppercase text-xs mb-4">
                ¿Quiénes Somos? • Arquitectura Jurídica
            </span>
            <h1 class="grid-header text-3xl md:text-5xl text-gray-900 dark:text-white mb-6 leading-tight">
                {{ $settings['about_title'] ?? 'DIMO: Arquitectura Jurídica y Rigor Estratégico al Servicio de la Justicia.' }}
            </h1>
            <p class="text-base md:text-lg text-gray-600 dark:text-gray-400 leading-relaxed mb-6">
                {{ $settings['about_p1'] ?? 'En Defensa, Investigación y Metodologías Operacionales (DIMO), concebimos el ejercicio del derecho como una disciplina de alta precisión. Nuestra firma nace de la necesidad de ofrecer soluciones jurídicas disruptivas en un entorno normativo complejo, donde la interpretación literal ya no es suficiente.' }}
            </p>
            <p class="text-sm md:text-base text-gray-500 dark:text-gray-400 leading-relaxed mb-6">
                {{ $settings['about_p2'] ?? 'Nos distinguimos por una minuciosa observancia de las fuentes del derecho colombiano, integrando la dogmática clásica con las herramientas operativas más avanzadas para garantizar la máxima tutela de los intereses de nuestros representados.' }}
            </p>
        </div>
        <div class="h-64 bg-cover bg-center border-t border-gray-100 dark:border-gray-800" 
             style="background-image: url('{{ !empty($settings['about_image']) ? asset($settings['about_image']) : (!empty($settings['hero_image']) ? asset($settings['hero_image']) : 'https://lh3.googleusercontent.com/aida-public/AB6AXuBwDg6y45y18okSbZT34ztaF_Dq8VCfy-M3_SojFYOH3ndbNBNSxh9uk1M1mRHcDYeaZFZ1LnJ_eLE3LVm1_GEnNfpLEoZ2BQVEp5SYeQp8QiN_fFj06zea_Z8WrWI2bS3-3yWPrd4T2TNivUD5MGUexppDsEzDLG11O5jL7yIpdOHFP90q8JzRT7U8QgbvPSBQx8AqnWkbAz71lVGsgtXBfCu0q4oz0ZFJyDgXuNRy_NjAjRZ-zYsKTKmeVCDf8iAaXr3F5hu1m47z') }}');">
        </div>
    </section>

    <!-- SIDE PANEL (md:col-span-4) -->
    <div class="md:col-span-4 flex flex-col gap-6">
        <div class="bg-primary text-white p-8 rounded-xl flex flex-col justify-between h-full shadow-sm">
            <span class="material-symbols-outlined text-4xl mb-4">gavel</span>
            <div>
                <h3 class="grid-header text-3xl mb-2 italic">{{ $settings['side_quote_title'] ?? 'Defensa Científica' }}</h3>
                <p class="text-blue-100 text-sm leading-relaxed">
                    {{ $settings['side_quote_desc'] ?? 'Transformamos el esfuerzo analítico en certidumbre procesal inexpugnable.' }}
                </p>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 p-8 rounded-xl h-full shadow-sm flex flex-col justify-between">
            <div>
                <span class="text-primary font-bold text-xs uppercase tracking-widest block mb-1">Rigor Procesal</span>
                <h3 class="text-3xl font-black mb-1 text-gray-900 dark:text-white">100%</h3>
                <p class="text-gray-500 text-sm uppercase font-bold tracking-wider mb-4">Observancia Dogmática</p>
            </div>
            <div>
                <div class="w-full bg-gray-100 dark:bg-gray-800 h-2 rounded-full overflow-hidden mb-2">
                    <div class="bg-primary h-full w-full rounded-full"></div>
                </div>
                <p class="text-xs text-gray-400">Jurisprudencia de cierre de las Altas Cortes colombianas.</p>
            </div>
        </div>
    </div>

    <!-- RECUADRO DEL PRIMER BLOQUE: PROPUESTA DE VALOR (md:col-span-12) -->
    <div class="md:col-span-12 bg-white dark:bg-gray-900 p-8 md:p-12 rounded-xl border border-gray-200 dark:border-gray-800 shadow-sm">
        <span class="text-primary font-bold tracking-widest uppercase text-xs mb-2 block">Diferencial Estratégico</span>
        <h2 class="grid-header text-3xl md:text-4xl text-gray-900 dark:text-white mb-2">
            {{ $settings['propuesta_title'] ?? 'Nuestra Propuesta de Valor (El Factor DIMO)' }}
        </h2>
        <h3 class="text-xl text-primary font-bold mb-6">
            {{ $settings['propuesta_subtitle'] ?? 'Más allá de la Representación: Ingeniería de Soluciones Jurídicas' }}
        </h3>
        <p class="text-base text-gray-600 dark:text-gray-300 leading-relaxed max-w-5xl">
            {{ $settings['propuesta_text'] ?? 'Lo que nos distingue en el foro jurídico es nuestra capacidad de amalgamar la dogmática pura con metodologías de análisis técnico-forense. No nos limitamos a la gestión de expedientes; construimos escenarios de éxito mediante el estudio milimétrico de la prueba y la aplicación de la jurisprudencia de cierre. En DIMO, la defensa es una ciencia y la estrategia, nuestra mayor ventaja competitiva.' }}
        </p>
    </div>

    <!-- RECUADRO DEL SEGUNDO BLOQUE: VALORES CORPORATIVOS -->
    <div class="md:col-span-12 flex items-end justify-between px-2 pt-8 pb-2 border-b-2 border-primary/20">
        <h2 class="grid-header text-3xl font-bold text-gray-900 dark:text-white">Valores Corporativos</h2>
        <span class="text-primary text-sm font-bold hidden sm:inline">3 Columnas Deontológicas</span>
    </div>

    <!-- Columna 1: Rigor Normativo -->
    <div class="md:col-span-4 bg-white dark:bg-gray-900 p-6 rounded-xl border border-gray-200 dark:border-gray-800 hover:border-primary transition-colors group cursor-pointer shadow-sm flex flex-col justify-between">
        <div>
            <div class="size-12 bg-primary/10 rounded-lg flex items-center justify-center text-primary mb-4 group-hover:bg-primary group-hover:text-white transition-all">
                <span class="material-symbols-outlined text-2xl">balance</span>
            </div>
            <h3 class="text-lg font-bold mb-2 text-gray-900 dark:text-white group-hover:text-primary transition-colors">
                {{ $settings['valor_1_title'] ?? 'Rigor Normativo' }}
            </h3>
            <p class="text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                {{ $settings['valor_1_desc'] ?? 'Nuestra brújula es la norma. Escudriñamos las fuentes del derecho para hallar la solución donde otros solo ven el conflicto.' }}
            </p>
        </div>
        <div class="mt-4 pt-3 border-t border-gray-100 dark:border-gray-800 text-xs font-semibold text-primary opacity-0 group-hover:opacity-100 transition-opacity">
            La Norma como Brújula &rarr;
        </div>
    </div>

    <!-- Columna 2: Discreción Estratégica -->
    <div class="md:col-span-4 bg-white dark:bg-gray-900 p-6 rounded-xl border border-gray-200 dark:border-gray-800 hover:border-primary transition-colors group cursor-pointer shadow-sm flex flex-col justify-between">
        <div>
            <div class="size-12 bg-primary/10 rounded-lg flex items-center justify-center text-primary mb-4 group-hover:bg-primary group-hover:text-white transition-all">
                <span class="material-symbols-outlined text-2xl">lock</span>
            </div>
            <h3 class="text-lg font-bold mb-2 text-gray-900 dark:text-white group-hover:text-primary transition-colors">
                {{ $settings['valor_2_title'] ?? 'Discreción Estratégica' }}
            </h3>
            <p class="text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                {{ $settings['valor_2_desc'] ?? 'Entendemos la sensibilidad de los intereses que custodiamos. El sigilo y la reserva profesional son el pilar de nuestra confianza corporativa.' }}
            </p>
        </div>
        <div class="mt-4 pt-3 border-t border-gray-100 dark:border-gray-800 text-xs font-semibold text-primary opacity-0 group-hover:opacity-100 transition-opacity">
            Reserva Profesional &rarr;
        </div>
    </div>

    <!-- Columna 3: Excelencia Técnica -->
    <div class="md:col-span-4 bg-white dark:bg-gray-900 p-6 rounded-xl border border-gray-200 dark:border-gray-800 hover:border-primary transition-colors group cursor-pointer shadow-sm flex flex-col justify-between">
        <div>
            <div class="size-12 bg-primary/10 rounded-lg flex items-center justify-center text-primary mb-4 group-hover:bg-primary group-hover:text-white transition-all">
                <span class="material-symbols-outlined text-2xl">verified</span>
            </div>
            <h3 class="text-lg font-bold mb-2 text-gray-900 dark:text-white group-hover:text-primary transition-colors">
                {{ $settings['valor_3_title'] ?? 'Excelencia Técnica' }}
            </h3>
            <p class="text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                {{ $settings['valor_3_desc'] ?? 'Cada documento, cada memorial y cada intervención es el resultado de un proceso de control de calidad jurídica sin precedentes.' }}
            </p>
        </div>
        <div class="mt-4 pt-3 border-t border-gray-100 dark:border-gray-800 text-xs font-semibold text-primary opacity-0 group-hover:opacity-100 transition-opacity">
            Control de Calidad &rarr;
        </div>
    </div>

    <!-- RECUADRO DEL TERCER BLOQUE: NUESTRO ALCANCE (md:col-span-12) -->
    <div class="md:col-span-12 bg-white dark:bg-gray-900 rounded-xl overflow-hidden border border-gray-200 dark:border-gray-800 flex flex-col md:flex-row shadow-sm">
        <div class="md:w-1/2 h-72 md:h-auto bg-cover bg-center grayscale hover:grayscale-0 transition-all duration-500" 
             style="background-image: url('{{ !empty($settings['alcance_image']) ? asset($settings['alcance_image']) : 'https://lh3.googleusercontent.com/aida-public/AB6AXuAeQHO5RS-lkugRJaHNsVZ34vMVNb-4uBPtgkXtyXCCQfWY3wfhMVpes9BGYG85gkl7cOWo2832mKQDqa933ZcX94BoR5HkWZK6XSa9cutMhv2QoSBDlt7KW9kIEXf0CHgwAR1XepJIRvoMNCgmsH87L29kPc-nBLev4Oma68IZyjVBfR43bD0i71BnrkFYdT57sh1zIogZNWsmOaQ22229PH-1hy2OF7Y67r9OD07HGEqfOb7PM1_EJy_ksOKwRpP9urL6p-ATt-oB' }}');">
        </div>
        <div class="p-8 md:p-12 md:w-1/2 flex flex-col justify-center">
            <span class="text-primary font-bold text-xs uppercase tracking-widest mb-2">Despliegue Nacional</span>
            <h2 class="grid-header text-3xl mb-2 text-gray-900 dark:text-white">{{ $settings['alcance_title'] ?? 'Nuestro Alcance' }}</h2>
            <h3 class="text-lg text-primary font-bold mb-4">{{ $settings['alcance_subtitle'] ?? 'Cobertura Integral en Escenarios de Alta Conflictividad' }}</h3>
            <p class="text-gray-600 dark:text-gray-400 text-sm leading-relaxed mb-6">
                {{ $settings['alcance_text'] ?? 'Operamos con solvencia en todo el territorio nacional, brindando asesoría a personas naturales y jurídicas que requieren un blindaje legal ante desafíos que amenazan su estabilidad patrimonial, libertad o reputación. Nuestra firma es el aliado estratégico para quienes no se conforman con una asesoría convencional.' }}
            </p>
            <div>
                <a href="{{ route('services') }}" class="text-primary font-bold text-sm hover:underline flex items-center gap-1">
                    <span>Ver portafolio de estrategias</span>
                    <span class="material-symbols-outlined text-xs">arrow_forward</span>
                </a>
            </div>
        </div>
    </div>

    <!-- RECUADRO DEL CUARTO BLOQUE: MISIÓN Y VISIÓN (HORIZONTAL DOS CUADROS) -->
    <div class="md:col-span-12 flex items-end justify-between px-2 pt-8 pb-2 border-b-2 border-primary/20">
        <h2 class="grid-header text-3xl font-bold text-gray-900 dark:text-white">Compromiso Institucional</h2>
        <span class="text-primary text-sm font-bold hidden sm:inline">Misión y Visión</span>
    </div>

    <!-- Cuadro Misión (md:col-span-6) -->
    <div class="md:col-span-6 bg-white dark:bg-gray-900 p-8 rounded-xl border border-gray-200 dark:border-gray-800 shadow-sm flex flex-col justify-between">
        <div>
            <div class="flex items-center justify-between mb-4">
                <h3 class="grid-header text-2xl font-bold text-gray-900 dark:text-white">MISIÓN</h3>
                <span class="material-symbols-outlined text-primary text-3xl">flag</span>
            </div>
            <p class="text-gray-600 dark:text-gray-400 text-sm leading-relaxed">
                {{ $settings['mision_text'] ?? 'Nuestra misión es proveer soluciones jurídicas e investigativas de alta complejidad, fundamentadas en un rigor técnico inexpugnable y una lealtad absoluta hacia los intereses de nuestros representados. En DIMO, transformamos el esfuerzo y la disciplina en estrategias de éxito, evolucionando constantemente para garantizar que la excelencia operativa sea el estándar en cada una de nuestras intervenciones. Nuestro propósito es ser el blindaje definitivo para quienes exigen una defensa técnica cimentada en la ciencia del derecho.' }}
            </p>
        </div>
        <div class="mt-6 pt-4 border-t border-gray-100 dark:border-gray-800 text-xs font-bold text-primary uppercase tracking-wider">
            Blindaje Definitivo
        </div>
    </div>

    <!-- Cuadro Visión (md:col-span-6) -->
    <div class="md:col-span-6 bg-white dark:bg-gray-900 p-8 rounded-xl border border-gray-200 dark:border-gray-800 shadow-sm flex flex-col justify-between">
        <div>
            <div class="flex items-center justify-between mb-4">
                <h3 class="grid-header text-2xl font-bold text-gray-900 dark:text-white">VISIÓN</h3>
                <span class="material-symbols-outlined text-primary text-3xl">visibility</span>
            </div>
            <p class="text-gray-600 dark:text-gray-400 text-sm leading-relaxed">
                {{ $settings['vision_text'] ?? 'Para el año 2030, DIMO se consolidará como la firma boutique de referencia integral en el territorio nacional, liderando la convergencia entre el derecho multidisciplinario y la investigación de vanguardia. Proyectamos un crecimiento estratégico sostenido por un capital humano de élite, especializado y con un dominio absoluto de las fuentes del derecho, permitiéndonos ofrecer un portafolio de soluciones jurídicas diversificado que redefina los estándares de la consultoría y el litigio de alto nivel en Colombia.' }}
            </p>
        </div>
        <div class="mt-6 pt-4 border-t border-gray-100 dark:border-gray-800 text-xs font-bold text-primary uppercase tracking-wider">
            Firma Boutique de Referencia 2030
        </div>
    </div>

    <!-- ¿QUIÉNES SOMOS? - EQUIPO DIRECTIVO (Rendered Dynamically from Team Members CRUD) -->
    <div class="md:col-span-12 flex items-end justify-between px-2 pt-8 pb-2 border-b-2 border-primary/20">
        <div>
            <h2 class="grid-header text-3xl font-bold text-gray-900 dark:text-white">¿Quiénes somos?</h2>
            <p class="text-gray-500 text-sm italic">Equipo directivo y socios de {{ $settings['firm_short_name'] ?? 'DIMO' }}.</p>
        </div>
        <a href="{{ route('admin.team.index') }}" class="text-xs text-gray-400 hover:text-primary transition-colors flex items-center gap-1" title="Gestionar en panel">
            <span class="material-symbols-outlined text-sm">edit</span>
            <span>Editar en panel</span>
        </a>
    </div>

    @forelse($teamMembers as $member)
    <div class="md:col-span-6 bg-white dark:bg-gray-900 rounded-xl overflow-hidden border border-gray-200 dark:border-gray-800 flex flex-col sm:flex-row shadow-sm">
        <div class="sm:w-1/2 h-64 sm:h-auto bg-cover bg-center grayscale hover:grayscale-0 transition-all duration-500" 
             style="background-image: url('{{ (!empty($member->image_url) ? $member->image_url : 'https://lh3.googleusercontent.com/aida-public/AB6AXuBw7_ADBgZcDB4yW8cbvStlrh4ej-qnY-jK_ezo7Pkk1kaRkAFqlcyxvCOsLL0dPZkx6AQPEprnEuPQuAeGncyGOvmdaLu5oU36YuIXNZCgrBhXHO58ajP7PuceismrjVRr1LFnOggrhxA7fA38Bdwqzk4Tz4ZgKoYuVfU6AO13drKBueOElVklc_M2bWbTaRSeMiFMRNAyFVcqeespz_mlRrijZe-4SPQ4n7sXpqM6pYrE7x0zNbJGzWmMqMtCAFBBYaO97VFmAOQS') }}');">
        </div>
        <div class="p-8 sm:w-1/2 flex flex-col justify-center">
            <h3 class="grid-header text-2xl mb-1 text-gray-900 dark:text-white">{{ $member->name }}</h3>
            <p class="text-primary font-bold text-xs uppercase tracking-widest mb-4">{{ $member->role }}</p>
            <p class="text-sm text-gray-500 italic mb-6">
                "{{ $member->quote }}"
            </p>
            <div class="flex gap-3">
                @if($member->email)
                <a href="mailto:{{ $member->email }}" class="material-symbols-outlined text-gray-400 hover:text-primary cursor-pointer text-xl" title="Enviar correo">mail</a>
                @endif
                @if($member->linkedin_url)
                <a href="{{ $member->linkedin_url }}" target="_blank" class="material-symbols-outlined text-gray-400 hover:text-primary cursor-pointer text-xl" title="Perfil LinkedIn">link</a>
                @endif
            </div>
        </div>
    </div>
    @empty
    <!-- Fallback default founders -->
    <div class="md:col-span-6 bg-white dark:bg-gray-900 rounded-xl overflow-hidden border border-gray-200 dark:border-gray-800 flex flex-col sm:flex-row shadow-sm">
        <div class="sm:w-1/2 h-64 sm:h-auto bg-cover bg-center grayscale hover:grayscale-0 transition-all duration-500" 
             style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBw7_ADBgZcDB4yW8cbvStlrh4ej-qnY-jK_ezo7Pkk1kaRkAFqlcyxvCOsLL0dPZkx6AQPEprnEuPQuAeGncyGOvmdaLu5oU36YuIXNZCgrBhXHO58ajP7PuceismrjVRr1LFnOggrhxA7fA38Bdwqzk4Tz4ZgKoYuVfU6AO13drKBueOElVklc_M2bWbTaRSeMiFMRNAyFVcqeespz_mlRrijZe-4SPQ4n7sXpqM6pYrE7x0zNbJGzWmMqMtCAFBBYaO97VFmAOQS');">
        </div>
        <div class="p-8 sm:w-1/2 flex flex-col justify-center">
            <h3 class="grid-header text-2xl mb-1 text-gray-900 dark:text-white">Dr. Andrés Martínez</h3>
            <p class="text-primary font-bold text-xs uppercase tracking-widest mb-4">Socio Director & Arquitecto Jurídico</p>
            <p class="text-sm text-gray-500 italic mb-6">
                "La defensa es una ciencia rigurosa; combinamos la dogmática clásica con metodologías forenses para asegurar la máxima tutela jurídica."
            </p>
            <div class="flex gap-3">
                <a href="mailto:a.martinez@dimo.com.co" class="material-symbols-outlined text-gray-400 hover:text-primary cursor-pointer text-xl">mail</a>
                <a href="https://linkedin.com" target="_blank" class="material-symbols-outlined text-gray-400 hover:text-primary cursor-pointer text-xl">link</a>
            </div>
        </div>
    </div>
    <div class="md:col-span-6 bg-white dark:bg-gray-900 rounded-xl overflow-hidden border border-gray-200 dark:border-gray-800 flex flex-col sm:flex-row shadow-sm">
        <div class="sm:w-1/2 h-64 sm:h-auto bg-cover bg-center grayscale hover:grayscale-0 transition-all duration-500" 
             style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuCHl4HPc0ugKsF7mZqOPbRxNssTNK5J98HPQxC9gVh9yJwRDzZEf1z-sWojmXZggZrZ685Vv9NlOL1051q2JZhEDipaBnqyQ6UcYnPnsiUR_7JANfei8vCOYJp6XwnCj86FSc_4LNj5cucL0qTOnJ1Tubw6yfUkBFEPmBkd19qZjdnLjBVdBe7FrkpcqauFGYmu6dlYemA0KdBdlL5VJFU3oOCKiz6yI8BeR_7SdatmMEEyR67qk6Sv70XHyog7VhFRLsKAsW74jQg_');">
        </div>
        <div class="p-8 sm:w-1/2 flex flex-col justify-center">
            <h3 class="grid-header text-2xl mb-1 text-gray-900 dark:text-white">Dra. Camila Casas</h3>
            <p class="text-primary font-bold text-xs uppercase tracking-widest mb-4">Socia & Directora de Litigio Estratégico</p>
            <p class="text-sm text-gray-500 italic mb-6">
                "No nos limitamos a tramitar expedientes; construimos escenarios de certeza mediante el estudio microscópico de la prueba y la jurisprudencia de cierre."
            </p>
            <div class="flex gap-3">
                <a href="mailto:c.casas@dimo.com.co" class="material-symbols-outlined text-gray-400 hover:text-primary cursor-pointer text-xl">mail</a>
                <a href="https://linkedin.com" target="_blank" class="material-symbols-outlined text-gray-400 hover:text-primary cursor-pointer text-xl">link</a>
            </div>
        </div>
    </div>
    @endforelse

</div>
@endsection
