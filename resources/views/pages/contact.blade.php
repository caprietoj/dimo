@extends('layouts.public')

@section('title', 'Consultoría de Alto Nivel - myclegalgroup.com (Grid Focused)')

@section('content')
<!-- Grid Focused Architecture for "Consultoría de Alto Nivel" -->
<div class="grid grid-cols-1 md:grid-cols-12 gap-6">

    <!-- Header Block (md:col-span-12) -->
    <div class="md:col-span-12 flex items-end justify-between px-2 pt-4 pb-2 border-b-2 border-primary/20">
        <div>
            <h1 class="grid-header text-3xl md:text-4xl font-bold text-gray-900 dark:text-white">
                Consultoría de Alto Nivel
            </h1>
            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                Atención preferente y reserva profesional bajo la ciencia del derecho.
            </p>
        </div>
        <span class="text-primary text-sm font-bold hidden sm:inline">Despacho Bogotá D.C.</span>
    </div>

    <!-- Contact Form (md:col-span-7 - Exact Grid Focused Form Structure) -->
    <section class="md:col-span-7 bg-white dark:bg-gray-900 rounded-xl border border-gray-200 dark:border-gray-800 p-8 shadow-sm flex flex-col justify-between">
        <div>
            <h2 class="grid-header text-3xl mb-6 text-gray-900 dark:text-white">Agende una Cita</h2>

            @if(session('success'))
            <div class="mb-6 p-4 rounded-lg bg-emerald-500/10 border border-emerald-500/30 text-emerald-800 dark:text-emerald-300 text-sm font-semibold flex items-center gap-2">
                <span class="material-symbols-outlined text-emerald-500">check_circle</span>
                <span>{{ session('success') }}</span>
            </div>
            @endif

            <div id="contact-alert" class="hidden mb-6 p-4 rounded-lg text-sm font-medium"></div>

            <form id="contact-form" action="{{ route('contact.submit') }}" method="POST" class="space-y-4">
                @csrf
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="flex flex-col gap-1">
                        <label for="name" class="text-xs font-bold uppercase text-gray-400">Nombre *</label>
                        <input id="name" name="name" required class="bg-background-light dark:bg-gray-800 border-none rounded-lg focus:ring-2 focus:ring-primary text-sm p-3 text-gray-900 dark:text-gray-100 placeholder-gray-400" placeholder="Su nombre" type="text"/>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="email" class="text-xs font-bold uppercase text-gray-400">Email *</label>
                        <input id="email" name="email" required class="bg-background-light dark:bg-gray-800 border-none rounded-lg focus:ring-2 focus:ring-primary text-sm p-3 text-gray-900 dark:text-gray-100 placeholder-gray-400" placeholder="email@ejemplo.com" type="email"/>
                    </div>
                </div>

                <div class="flex flex-col gap-1">
                    <label for="subject" class="text-xs font-bold uppercase text-gray-400">Asunto</label>
                    <select id="subject" name="subject" class="bg-background-light dark:bg-gray-800 border-none rounded-lg focus:ring-2 focus:ring-primary text-sm p-3 text-gray-900 dark:text-gray-100">
                        <option value="Consulta Corporativa">Consulta Corporativa</option>
                        <option value="Litigios y Arbitraje">Litigios y Arbitraje</option>
                        <option value="Investigación Forense y Riesgos">Investigación Forense y Riesgos</option>
                        <option value="Seguridad Jurídica y Compliance">Seguridad Jurídica y Compliance</option>
                        <option value="Otros">Otros Asuntos Jurídicos</option>
                    </select>
                </div>

                <div class="flex flex-col gap-1">
                    <label for="message" class="text-xs font-bold uppercase text-gray-400">Mensaje *</label>
                    <textarea id="message" name="message" required rows="5" class="bg-background-light dark:bg-gray-800 border-none rounded-lg focus:ring-2 focus:ring-primary text-sm p-3 text-gray-900 dark:text-gray-100 placeholder-gray-400 resize-none" placeholder="¿Cómo podemos ayudarle?"></textarea>
                </div>

                <button type="submit" id="submit-btn" class="w-full bg-primary text-white py-4 rounded-xl font-black text-lg hover:bg-primary-dark hover:shadow-lg hover:shadow-primary/20 transition-all flex items-center justify-center gap-2">
                    <span id="btn-text">Enviar Solicitud</span>
                    <span id="btn-spinner" class="material-symbols-outlined hidden animate-spin">progress_activity</span>
                </button>
            </form>
        </div>

        <div class="mt-6 pt-4 border-t border-gray-100 dark:border-gray-800 text-xs text-gray-400 flex items-center gap-2">
            <span class="material-symbols-outlined text-sm text-emerald-500">lock</span>
            <span>Sus comunicaciones y datos están protegidos bajo estricto secreto profesional.</span>
        </div>
    </section>

    <!-- Map & Address Block (md:col-span-5 - Exact Stitch Styling) -->
    <div class="md:col-span-5 flex flex-col gap-6">
        <div class="bg-white dark:bg-gray-900 rounded-xl border border-gray-200 dark:border-gray-800 overflow-hidden h-full flex flex-col shadow-sm">
            
            <!-- Map preview with pulsing pin -->
            <div class="flex-1 min-h-[250px] bg-gray-200 dark:bg-gray-800 relative group overflow-hidden">
                <div class="absolute inset-0 bg-cover bg-center opacity-70 grayscale group-hover:grayscale-0 transition-all duration-700" 
                     data-alt="Stylized map of Bogota Colombia office location" 
                     data-location="Bogota" 
                     style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuAeQHO5RS-lkugRJaHNsVZ34vMVNb-4uBPtgkXtyXCCQfWY3wfhMVpes9BGYG85gkl7cOWo2832mKQDqa933ZcX94BoR5HkWZK6XSa9cutMhv2QoSBDlt7KW9kIEXf0CHgwAR1XepJIRvoMNCgmsH87L29kPc-nBLev4Oma68IZyjVBfR43bD0i71BnrkFYdT57sh1zIogZNWsmOaQ22229PH-1hy2OF7Y67r9OD07HGEqfOb7PM1_EJy_ksOKwRpP9urL6p-ATt-oB');">
                </div>
                <div class="absolute inset-0 flex items-center justify-center">
                    <div class="size-10 bg-primary rounded-full flex items-center justify-center shadow-2xl animate-pulse">
                        <span class="material-symbols-outlined text-white text-xl">location_on</span>
                    </div>
                </div>
            </div>

            <!-- Address and Details -->
            <div class="p-6">
                <h4 class="font-bold text-lg mb-2 text-gray-900 dark:text-white">{{ $settings['office_title'] ?? 'Sede Principal Bogotá' }}</h4>
                <p class="text-sm text-gray-500 mb-4 leading-relaxed">
                    {!! nl2br(e($settings['address'] ?? "Calle 100 # 15-32, Edificio Amadeus, Piso 7\nBogotá D.C., Colombia")) !!}
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
@endsection

@push('scripts')
<script>
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
                alertBox.className = 'mb-6 p-4 rounded-lg text-sm font-semibold bg-emerald-500/10 border border-emerald-500/30 text-emerald-800 dark:text-emerald-300';
                alertBox.innerHTML = '<div class="flex items-center gap-2"><span class="material-symbols-outlined text-emerald-500">check_circle</span> <span>' + data.message + '</span></div>';
                alertBox.classList.remove('hidden');
                form.reset();
            } else {
                let errorMsg = data.message || 'Verifique los campos ingresados.';
                if (data.errors) {
                    errorMsg = Object.values(data.errors).flat().join('<br>');
                }
                alertBox.className = 'mb-6 p-4 rounded-lg text-sm font-semibold bg-red-500/10 border border-red-500/30 text-red-800 dark:text-red-300';
                alertBox.innerHTML = '<div class="flex items-center gap-2"><span class="material-symbols-outlined text-red-500">error</span> <div>' + errorMsg + '</div></div>';
                alertBox.classList.remove('hidden');
            }
        } catch (err) {
            alertBox.className = 'mb-6 p-4 rounded-lg text-sm font-semibold bg-red-500/10 border border-red-500/30 text-red-800 dark:text-red-300';
            alertBox.innerHTML = '<div class="flex items-center gap-2"><span class="material-symbols-outlined text-red-500">wifi_off</span> <span>Error de comunicación. Intente nuevamente.</span></div>';
            alertBox.classList.remove('hidden');
        } finally {
            btnText.textContent = 'Enviar Solicitud';
            btnSpinner.classList.add('hidden');
            submitBtn.disabled = false;
        }
    });
</script>
@endpush
