<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class CodeSnippet extends Model
{
    use HasFactory;

    /**
     * Mass-assignable fields.
     * We explicitly list these instead of $guarded = [] for security —
     * this prevents someone from injecting a field like `user_id` through
     * a form submission that isn't meant to be user-controlled.
     */
    protected $fillable = [
        'title',
        'description',
        'language',
        'code',
        'is_favorite',
    ];

    /**
     * Cast is_favorite to a real PHP boolean instead of returning
     * a raw 0/1 from MySQL — cleaner to work with in code and in
     * the JSON sent to the React frontend.
     */
    protected $casts = [
        'is_favorite' => 'boolean',
    ];

    /**
     * A snippet belongs to one user.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * A snippet can have many tags, and each tag can belong to many snippets.
     * Laravel automatically finds the `code_snippet_tag` pivot table
     * because of the naming convention (alphabetical, singular, underscore).
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }
}