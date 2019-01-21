<?php

namespace siap;

use Jenssegers\Date\Date;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon; //Para la zona fecha horaria

use DB;

class DetalleLiquidacion extends Model
{
    protected $table = 'detalle_liquidacion';

    
    protected $primaryKey='iddetalleliquidacion';

    protected $fillable = [

         'fechadiaria', 'created_at', 'updated_at'

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];
    

    public function getFechadiariaAttribute($date)
    {
        if ($date != null) {
            return new Date($date);
        }
    }

    

    /*
    Nombre: saldoCapital
    Objetivo: calcula el saldo capital de credito de un negocio
    Autor: Lexan
    parámetros de entrada: ID de un negocio
    parámetros de salida: saldo de credito anterior.
     */
    

}
