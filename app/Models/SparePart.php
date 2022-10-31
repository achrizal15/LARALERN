<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Alfa6661\AutoNumber\AutoNumberTrait;
class SparePart extends Model
{
    use HasFactory;
    use SoftDeletes;
    use AutoNumberTrait;
    
    /**
     * Return the autonumber configuration array for this model.
     *
     * @return array
     */
    protected $guarded=["id"];
    
    public function sparePartProductionTotal(){
        return $this->hasMany(SparePartProduction::class);
    }
    public function getAutoNumberOptions()
    {
        return [
            'serial_number' => [
                'format' => '#?', // Format kode yang akan digunakan.
                'length' => 5 // Jumlah digit yang akan digunakan sebagai nomor urut
            ]
        ];
    }
}
