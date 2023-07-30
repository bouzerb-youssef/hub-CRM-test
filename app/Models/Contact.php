<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Organisation;

class Contact extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'contact';
    protected $fillable = [
        'cle',
        'organisation_id',
        'e_mail',
        'nom',
        'prenom',
        'telephone_fixe',
        'service',
        'fonction',
    ];

    protected $dates = ['deleted_at'];

    public function organisation()
    {
        return $this->belongsTo(Organisation::class, 'organisation_id');
    }
}
