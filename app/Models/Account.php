<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'owner_id', 'about', 'shop_url', 'logo_path', 'active', 'partner', 'partner_id', 'settings', 'trial_ends_at',
        'billed_at', 'stripe_account_id', 'type', 'stripe_id', 'primary'
    ];
    public function owner()
    {
        return $this->belongsTo(User::class);
    }
    public function isPartner()
    {
        return $this->partner;
    }
}
