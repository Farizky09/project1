<?php
 
namespace App\Models\Telepon;
 
use Illuminate\Database\Eloquent\Model;
 
class Telepon extends Model
{
    protected $table = "telepon";
 
    public function pengguna()
    {
    	return $this->belongsTo('Pengguna::class');
    }
}