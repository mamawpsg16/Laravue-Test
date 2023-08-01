<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title','content','user_id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Scope a query to only include published posts.
     */
    public function scopeDeletedAt($query): void
    {
        $query->whereNotNull('deleted_at');
    }
    public function scopePublished($query): void
    {
        $query->where('published', 1);
    }

    public function scopeId($query): void
    {
        $query->where('id', 5);
    }

    /** DYNAMIC SCOPE */
    public function scopeFindId($query, string $id): void
    {
        $query->where('id', $id);
    }

    /** ACCESSOR */
    protected function title(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => ucfirst($value),
            set: fn (string $value) => strtolower($value),
        );
    }

   /** MUTATOR */
}
