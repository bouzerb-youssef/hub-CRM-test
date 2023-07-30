<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Contact;

class Organisation extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'organisation';
    protected $fillable = [
        'cle',
        'nom',
        'adresse',
        'code_postal',
        'ville',
        'statut',
    ];

    protected $dates = ['deleted_at'];

    public function contacts()
    {
        return $this->hasMany(Contact::class, 'organisation_id');
    }

    public function getStatutAttribute($value)
    {
        return ucfirst(strtolower($value));
    }
}
