<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctype extends Model
{
    use HasFactory;
    protected $table ='document_type';
    protected $primarykey = 'id';
    protected $fillable = ['type'];
}
