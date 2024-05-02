<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Website extends Model
{
    protected $fillable = [
        'name', 'subfolder_name', 'user_id', 'company_name', 'contact_email',
        'phone_number', 'address', 'logo_path'
    ];

    /**
     * Get the user that owns the website.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
