<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
    ];

    /**
     * The reverse of CodeSnippet::tags() — a tag can be attached
     * to many snippets. This lets us do things like:
     * $tag->codeSnippets to see every snippet with this tag.
     */
    public function codeSnippets(): BelongsToMany
    {
        return $this->belongsToMany(CodeSnippet::class);
    }
}