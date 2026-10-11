<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\PracticeArea;
use App\Models\TeamMember;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Display the AdminLTE Dashboard overview.
     */
    public function index(): View
    {
        $totalMessages = ContactMessage::count();
        $pendingMessages = ContactMessage::where('status', 'pending')->count();
        $totalPracticeAreas = PracticeArea::count();
        $totalTeamMembers = TeamMember::count();

        $recentMessages = ContactMessage::latest()->take(6)->get();
        $practiceAreas = PracticeArea::orderBy('sort_order')->take(4)->get();
        $teamMembers = TeamMember::orderBy('sort_order')->take(4)->get();

        return view('admin.dashboard', compact(
            'totalMessages',
            'pendingMessages',
            'totalPracticeAreas',
            'totalTeamMembers',
            'recentMessages',
            'practiceAreas',
            'teamMembers'
        ));
    }
}
