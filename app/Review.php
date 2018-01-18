<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Review
 * @package App
 *
 * @property int $id
 * @property string $content
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Review extends Model
{
    // fillable for MassAssignment (... for security)
    protected $fillable = ['content'];

    // Expresses relationship
    public function product()
    {
        // Review (this) belongs to 1 single Product
        return $this->belongsTo(Product::class);
    }
}
