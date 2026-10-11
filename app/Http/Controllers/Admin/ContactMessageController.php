<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactMessageController extends Controller
{
    /**
     * Display a listing of contact inquiries.
     */
    public function index(Request $request): View
    {
        $status = $request->query('status');

        $query = ContactMessage::latest();

        if ($status && in_array($status, ['pending', 'contacted', 'resolved'])) {
            $query->where('status', $status);
        }

        $messages = $query->paginate(15)->withQueryString();

        $counts = [
            'all' => ContactMessage::count(),
            'pending' => ContactMessage::where('status', 'pending')->count(),
            'contacted' => ContactMessage::where('status', 'contacted')->count(),
            'resolved' => ContactMessage::where('status', 'resolved')->count(),
        ];

        return view('admin.messages.index', compact('messages', 'counts', 'status'));
    }

    /**
     * Display the specified contact message.
     */
    public function show(ContactMessage $message): View
    {
        return view('admin.messages.show', compact('message'));
    }

    /**
     * Update the status of a contact inquiry.
     */
    public function updateStatus(Request $request, ContactMessage $message): RedirectResponse
    {
        $validated = $request->validate([
            'status' => ['required', 'in:pending,contacted,resolved'],
        ]);

        $message->update(['status' => $validated['status']]);

        return back()->with('success', 'Estado del mensaje actualizado correctamente.');
    }

    /**
     * Remove the specified contact inquiry.
     */
    public function destroy(ContactMessage $message): RedirectResponse
    {
        $message->delete();

        return redirect()->route('admin.messages.index')->with('success', 'Mensaje eliminado del sistema.');
    }
}
