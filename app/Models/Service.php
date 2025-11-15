<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'user_id',
        'name',
        'description',
        'rate_type',
        'rate_amount',
        'rate_currency',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'rate_amount' => 'decimal:2',
        ];
    }

    /**
     * Get the user that owns the service.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the formatted rate for display
     */
    public function getFormattedRateAttribute()
    {
        if ($this->rate_type === 'none' || ! $this->rate_amount) {
            return 'Επικοινωνήστε για πληροφορίες';
        }

        $unit = match ($this->rate_type) {
            'per_hour' => 'ανά ώρα',
            'per_square_meter' => 'ανά τ.μ.',
            'fixed' => 'σταθερή τιμή',
            default => '',
        };

        return number_format($this->rate_amount, 2, ',', '.').' € '.$unit;
    }
}
