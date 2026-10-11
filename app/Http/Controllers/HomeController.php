<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\FirmSetting;
use App\Models\PracticeArea;
use App\Models\TeamMember;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Display the Home page with initial cover, 4 principles, flow method, and live legal perspective.
     */
    public function index(): View
    {
        $practiceAreas = PracticeArea::active()->get();
        $teamMembers = TeamMember::active()->get();
        $settings = FirmSetting::pluck('value', 'key')->all();

        return view('pages.home', compact('practiceAreas', 'teamMembers', 'settings'));
    }

    /**
     * Display "Nuestra Firma" (¿Quiénes somos?) page.
     */
    public function about(): View
    {
        $teamMembers = TeamMember::active()->get();
        $settings = FirmSetting::pluck('value', 'key')->all();

        return view('pages.about', compact('teamMembers', 'settings'));
    }

    /**
     * Display "Estrategias y Soluciones" (Áreas de servicios) page.
     */
    public function services(): View
    {
        $practiceAreas = PracticeArea::active()->get();
        $settings = FirmSetting::pluck('value', 'key')->all();

        return view('pages.services', compact('practiceAreas', 'settings'));
    }

    /**
     * Display "Consultoría de Alto Nivel" (Contacto) page.
     */
    public function contact(): View
    {
        $settings = FirmSetting::pluck('value', 'key')->all();

        return view('pages.contact', compact('settings'));
    }

    /**
     * Handle contact / high-level consultation submission.
     */
    public function contactSubmit(Request $request): JsonResponse|RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'subject' => ['nullable', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:5000'],
        ]);

        $message = ContactMessage::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'subject' => $validated['subject'] ?? 'Consultoría de Alto Nivel DIMO',
            'message' => $validated['message'],
            'status' => 'pending',
        ]);

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Su solicitud de consultoría de alto nivel ha sido registrada bajo estricta reserva profesional. Nuestro equipo directivo se comunicará con usted.',
                'data' => $message,
            ]);
        }

        return redirect()->route('contact')->with('success', 'Su solicitud de consultoría de alto nivel ha sido recibida bajo reserva profesional. Nos pondremos en contacto a la brevedad.');
    }
}
