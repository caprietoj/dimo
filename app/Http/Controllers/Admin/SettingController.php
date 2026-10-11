<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FirmSetting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class SettingController extends Controller
{
    /**
     * Show the firm settings management form.
     */
    public function index(): View
    {
        $settings = FirmSetting::pluck('value', 'key')->all();

        return view('admin.settings.index', compact('settings'));
    }

    /**
     * Update the firm configuration settings.
     */
    public function update(Request $request): RedirectResponse
    {
        $activeTab = $request->input('_active_tab', 'tab-home');

        $request->validate([
            'hero_image_file' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp,gif', 'max:5120'],
            'about_image_file' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp,gif', 'max:5120'],
            'alcance_image_file' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp,gif', 'max:5120'],
        ]);

        $inputs = $request->except(['_token', '_method', '_active_tab']);

        // Handle file uploads for settings (e.g. hero_image_file -> hero_image)
        foreach ($request->allFiles() as $fileKey => $file) {
            if ($file && $file->isValid()) {
                $targetKey = preg_replace('/_file$/', '', $fileKey);
                $currentVal = FirmSetting::get($targetKey);
                if ($currentVal && str_starts_with($currentVal, '/storage/')) {
                    Storage::disk('public')->delete(str_replace('/storage/', '', $currentVal));
                }
                $path = $file->store('settings', 'public');
                $inputs[$targetKey] = Storage::url($path);
            }
            unset($inputs[$fileKey]);
        }

        // Handle explicit removal of images
        foreach (['hero_image', 'about_image', 'alcance_image'] as $imageKey) {
            $removeKey = 'remove_'.$imageKey;
            if ($request->input($removeKey) === '1' && ! $request->hasFile($imageKey.'_file')) {
                $currentVal = FirmSetting::get($imageKey);
                if ($currentVal && str_starts_with($currentVal, '/storage/')) {
                    Storage::disk('public')->delete(str_replace('/storage/', '', $currentVal));
                }
                $inputs[$imageKey] = '';
            }
            unset($inputs[$removeKey]);
        }

        // Filter out temporary and file keys before saving
        $cleanInputs = collect($inputs)->reject(function ($value, $key) {
            return str_ends_with($key, '_file') || str_starts_with($key, 'remove_') || str_starts_with($key, '_');
        })->all();

        foreach ($cleanInputs as $key => $value) {
            FirmSetting::set($key, $value);
        }

        $redirectParams = ($request->filled('_active_tab') && $activeTab !== 'tab-home')
            ? ['tab' => $activeTab]
            : [];

        return redirect()->route('admin.settings.index', $redirectParams)
            ->with('success', 'Configuración del despacho actualizada correctamente. Todos los cambios se reflejan inmediatamente en el sitio web.');
    }
}
