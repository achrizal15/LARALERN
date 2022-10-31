<?php

namespace App\Models;

use Alfa6661\AutoNumber\AutoNumberTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SparePartProduction extends Model
{
    use HasFactory;
    use SoftDeletes;
    use AutoNumberTrait;
    protected $guarded = ["id"];
    public function sparepart(){
        return $this->belongsTo(SparePart::class);
    }
    public function getAutoNumberOptions()
    {
        return [
            'serial_number' => [
                'format' => function () {
                    return 'SPS/' . date('Y.m.d') . '/?';
                },
                'length' => 5,
            ]
        ];
    }
}
