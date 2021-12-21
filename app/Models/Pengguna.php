<?php
 
namespace App\Models\Pengguna;
 
use Illuminate\Database\Eloquent\Model;
 
class Pengguna extends Model
{
    protected $table = "pengguna";
 
    public function telepon()
    {
    	return $this->hasOne('Telepon::class');
    }
    
}