<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class TeamMemberController extends Controller
{
    /**
     * Display a listing of team members.
     */
    public function index(): View
    {
        $members = TeamMember::orderBy('sort_order', 'asc')->get();

        return view('admin.team.index', compact('members'));
    }

    /**
     * Show the form for creating a new team member.
     */
    public function create(): View
    {
        return view('admin.team.create');
    }

    /**
     * Store a newly created team member.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:255'],
            'quote' => ['nullable', 'string', 'max:500'],
            'email' => ['nullable', 'email', 'max:255'],
            'linkedin_url' => ['nullable', 'string', 'max:255'],
            'image_file' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp,gif', 'max:5120'],
            'image_url' => ['nullable', 'string', 'max:2000'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $imageUrl = $validated['image_url'] ?? null;

        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('team', 'public');
            $imageUrl = Storage::url($path);
        }

        TeamMember::create([
            'name' => $validated['name'],
            'role' => $validated['role'],
            'quote' => $validated['quote'] ?? null,
            'email' => $validated['email'] ?? null,
            'linkedin_url' => (! empty($validated['linkedin_url']) ? $validated['linkedin_url'] : '#'),
            'image_url' => $imageUrl,
            'sort_order' => $validated['sort_order'] ?? 0,
            'is_active' => $request->boolean('is_active', true),
        ]);

        return redirect()->route('admin.team.index')
            ->with('success', 'Miembro del equipo registrado exitosamente.');
    }

    /**
     * Show the form for editing the specified team member.
     */
    public function edit(TeamMember $teamMember): View
    {
        return view('admin.team.edit', compact('teamMember'));
    }

    /**
     * Update the specified team member.
     */
    public function update(Request $request, TeamMember $teamMember): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:255'],
            'quote' => ['nullable', 'string', 'max:500'],
            'email' => ['nullable', 'email', 'max:255'],
            'linkedin_url' => ['nullable', 'string', 'max:255'],
            'image_file' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp,gif', 'max:5120'],
            'image_url' => ['nullable', 'string', 'max:2000'],
            'remove_image_url' => ['nullable'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $imageUrl = $teamMember->getRawOriginal('image_url');

        if ($request->input('remove_image_url') === '1' && ! $request->hasFile('image_file')) {
            if ($imageUrl && str_starts_with($imageUrl, '/storage/')) {
                Storage::disk('public')->delete(str_replace('/storage/', '', $imageUrl));
            }
            $imageUrl = null;
        } elseif ($request->hasFile('image_file')) {
            if ($imageUrl && str_starts_with($imageUrl, '/storage/')) {
                Storage::disk('public')->delete(str_replace('/storage/', '', $imageUrl));
            }
            $path = $request->file('image_file')->store('team', 'public');
            $imageUrl = Storage::url($path);
        } elseif ($request->has('image_url')) {
            $imageUrl = $validated['image_url'] ?? null;
        }

        $teamMember->update([
            'name' => $validated['name'],
            'role' => $validated['role'],
            'quote' => $validated['quote'] ?? null,
            'email' => $validated['email'] ?? null,
            'linkedin_url' => (! empty($validated['linkedin_url']) ? $validated['linkedin_url'] : '#'),
            'image_url' => $imageUrl,
            'sort_order' => $validated['sort_order'] ?? 0,
            'is_active' => $request->boolean('is_active', false),
        ]);

        return redirect()->route('admin.team.index')
            ->with('success', 'Miembro del equipo actualizado exitosamente.');
    }

    /**
     * Remove the specified team member.
     */
    public function destroy(TeamMember $teamMember): RedirectResponse
    {
        $rawUrl = $teamMember->getRawOriginal('image_url');
        if ($rawUrl && str_starts_with($rawUrl, '/storage/')) {
            Storage::disk('public')->delete(str_replace('/storage/', '', $rawUrl));
        }

        $teamMember->delete();

        return redirect()->route('admin.team.index')
            ->with('success', 'Miembro del equipo eliminado.');
    }
}
