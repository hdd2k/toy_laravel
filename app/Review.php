<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    // fillable for MassAssignment (... for seeding) ...?
    protected $fillable = ['text'];

    // Expresses relationship
    public function product()
    {
        // Review (this) belongs to 1 single Product
        return $this->belongsTo(Product::class);
    }
}
