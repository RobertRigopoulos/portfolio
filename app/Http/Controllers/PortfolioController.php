<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Contracts\View\View;

class PortfolioController extends Controller
{
    /**
     * Render the portfolio home page.
     *
     * Pulls the projects from the database (ordered by sort_order) and
     * passes them into the Blade view, where they're iterated over in
     * the projects partial.
     */
    public function index(): View
    {
        $projects = Project::query()
            ->orderBy('sort_order')
            ->get();

        return view('portfolio.index', [
            'projects' => $projects,
        ]);
    }
}
