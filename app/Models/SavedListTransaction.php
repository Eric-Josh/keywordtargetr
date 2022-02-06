<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavedListTransaction extends Model
{
    use HasFactory;
    
    protected $table = 'kt_list_transactions';
    protected $fillable = [
        'list_id',
        'provider',
        'keyword',
        'language_code'
    ];
}
