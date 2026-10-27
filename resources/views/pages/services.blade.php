@extends('layouts.public')

@section('title', 'Estrategias y Soluciones - myclegalgroup.com (Grid Focused)')

@section('content')
<!-- Grid Focused Architecture for "Estrategias y Soluciones" -->
<div class="grid grid-cols-1 md:grid-cols-12 gap-6">

    <!-- Header Block (md:col-span-12) -->
    <div class="md:col-span-12 flex items-end justify-between px-2 pt-4 pb-2 border-b-2 border-primary/20">
        <div>
            <h1 class="grid-header text-3xl md:text-4xl font-bold text-gray-900 dark:text-white">
                Estrategias y Soluciones Jurídicas
            </h1>
            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                Catálogo especializado de áreas de práctica bajo la metodología y rigor de myclegalgroup.com.
            </p>
        </div>
        <a href="{{ route('contact') }}" class="text-primary text-sm font-bold flex items-center gap-1 hover:underline">
            <span>Solicitar Consultoría</span>
            <span class="material-symbols-outlined text-xs">open_in_new</span>
        </a>
    </div>

    <!-- Service Tiles (Grid layout - Exact Stitch styling) -->
    @foreach($practiceAreas as $area)
    <div class="md:col-span-3 bg-white dark:bg-gray-900 p-6 rounded-xl border border-gray-200 dark:border-gray-800 hover:border-primary transition-colors group cursor-pointer shadow-sm flex flex-col justify-between">
        <div>
            <div class="size-12 bg-primary/10 rounded-lg flex items-center justify-center text-primary mb-4 group-hover:bg-primary group-hover:text-white transition-all">
                <span class="material-symbols-outlined text-2xl">{{ $area->icon ?: 'corporate_fare' }}</span>
            </div>
            <h3 class="text-lg font-bold mb-2 text-gray-900 dark:text-white group-hover:text-primary transition-colors">
                {{ $area->title }}
            </h3>
            <p class="text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                {{ $area->description }}
            </p>
        </div>
        <div class="mt-4 pt-3 border-t border-gray-100 dark:border-gray-800 flex items-center justify-between text-xs font-semibold text-primary">
            <span>Especialidad DIMO</span>
            <span class="material-symbols-outlined text-xs">arrow_forward</span>
        </div>
    </div>
    @endforeach

    <!-- Detailed Strategy Cards (md:col-span-6 each) -->
    <div class="md:col-span-6 bg-white dark:bg-gray-900 p-8 rounded-xl border border-gray-200 dark:border-gray-800 shadow-sm flex flex-col justify-between">
        <div>
            <div class="flex items-center gap-3 mb-4">
                <div class="size-10 rounded bg-primary/10 text-primary flex items-center justify-center">
                    <span class="material-symbols-outlined text-2xl">policy</span>
                </div>
                <h3 class="grid-header text-2xl text-gray-900 dark:text-white">Auditoría y Blindaje Preventivo</h3>
            </div>
            <p class="text-sm text-gray-600 dark:text-gray-400 leading-relaxed mb-4">
                Prevenimos contingencias procesales antes de que escalen a los tribunales. Evaluamos contratos, decisiones asamblearias y esquemas de gobernanza con metodología microscópica.
            </p>
            <ul class="text-xs text-gray-500 dark:text-gray-400 space-y-2 mb-6">
                <li class="flex items-center gap-2"><span class="text-primary font-bold">✓</span> Auditoría de fuentes contractuales y riesgos de nulidad.</li>
                <li class="flex items-center gap-2"><span class="text-primary font-bold">✓</span> Análisis jurisprudencial de cierre aplicable a cada sector.</li>
            </ul>
        </div>
        <a href="{{ route('contact') }}" class="bg-primary text-white text-center py-2.5 rounded-lg text-sm font-bold hover:bg-primary-dark transition-colors">
            Consultar Auditoría
        </a>
    </div>

    <div class="md:col-span-6 bg-white dark:bg-gray-900 p-8 rounded-xl border border-gray-200 dark:border-gray-800 shadow-sm flex flex-col justify-between">
        <div>
            <div class="flex items-center gap-3 mb-4">
                <div class="size-10 rounded bg-primary/10 text-primary flex items-center justify-center">
                    <span class="material-symbols-outlined text-2xl">gavel</span>
                </div>
                <h3 class="grid-header text-2xl text-gray-900 dark:text-white">Litigio Forense en Altas Cortes</h3>
            </div>
            <p class="text-sm text-gray-600 dark:text-gray-400 leading-relaxed mb-4">
                Representación técnica inexpugnable ante tribunales de arbitramento nacionales e internacionales, Consejo de Estado y Corte Suprema de Justicia.
            </p>
            <ul class="text-xs text-gray-500 dark:text-gray-400 space-y-2 mb-6">
                <li class="flex items-center gap-2"><span class="text-primary font-bold">✓</span> Construcción de teoría del caso con estándares dogmáticos.</li>
                <li class="flex items-center gap-2"><span class="text-primary font-bold">✓</span> Control de prueba técnica y contrainterrogatorios periciales.</li>
            </ul>
        </div>
        <a href="{{ route('contact') }}" class="bg-primary text-white text-center py-2.5 rounded-lg text-sm font-bold hover:bg-primary-dark transition-colors">
            Consultar Litigio
        </a>
    </div>

</div>
@endsection
