<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PracticeArea;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class PracticeAreaController extends Controller
{
    /**
     * Display a listing of practice areas.
     */
    public function index(): View
    {
        $areas = PracticeArea::orderBy('sort_order', 'asc')->get();

        return view('admin.practice_areas.index', compact('areas'));
    }

    /**
     * Show the form for creating a new practice area.
     */
    public function create(): View
    {
        return view('admin.practice_areas.create');
    }

    /**
     * Store a newly created practice area.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'icon' => ['nullable', 'string', 'max:100'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        PracticeArea::create([
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']),
            'description' => $validated['description'],
            'icon' => (! empty($validated['icon']) ? $validated['icon'] : 'corporate_fare'),
            'sort_order' => $validated['sort_order'] ?? 0,
            'is_active' => $request->boolean('is_active', true),
        ]);

        return redirect()->route('admin.practice-areas.index')
            ->with('success', 'Área de práctica creada exitosamente.');
    }

    /**
     * Show the form for editing the specified practice area.
     */
    public function edit(PracticeArea $practiceArea): View
    {
        return view('admin.practice_areas.edit', compact('practiceArea'));
    }

    /**
     * Update the specified practice area.
     */
    public function update(Request $request, PracticeArea $practiceArea): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'icon' => ['nullable', 'string', 'max:100'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $practiceArea->update([
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']),
            'description' => $validated['description'],
            'icon' => (! empty($validated['icon']) ? $validated['icon'] : 'corporate_fare'),
            'sort_order' => $validated['sort_order'] ?? 0,
            'is_active' => $request->boolean('is_active', false),
        ]);

        return redirect()->route('admin.practice-areas.index')
            ->with('success', 'Área de práctica actualizada exitosamente.');
    }

    /**
     * Remove the specified practice area.
     */
    public function destroy(PracticeArea $practiceArea): RedirectResponse
    {
        $practiceArea->delete();

        return redirect()->route('admin.practice-areas.index')
            ->with('success', 'Área de práctica eliminada.');
    }
}
