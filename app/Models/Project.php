<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Project model.
 *
 * Represents a portfolio project (e.g. Athyra, Planet Generator). Stored in
 * the projects table and rendered on the home page through the
 * PortfolioController.
 */
class Project extends Model
{
    use HasFactory;

    /**
     * Mass-assignable attributes. Anything outside this list cannot be
     * filled via Project::create() or ->fill() — a small but real
     * security guard against unintended data injection.
     */
    protected $fillable = [
        'title',
        'subtitle',
        'stack',
        'description',
        'image_url',
        'primary_link_label',
        'primary_link_url',
        'secondary_link_label',
        'secondary_link_url',
        'sort_order',
    ];

    protected $casts = [
        'sort_order' => 'integer',
    ];
}
