<?php

namespace siap\Http\Controllers;

use Illuminate\Http\Request;

use siap\Http\Requests\TasaInteresFormRequest;

use siap\Http\Requests;
use siap\Fecha;
use siap\TipoCredito;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use DB;

class TasaInteresController extends Controller
{

    /*
        Nombre: index
        Objetivo: mostrar la lista de tasas disponibles
        Autor: Steven
        Fecha de última  de modificación: 02/01/2019
      */

     public function index(Request $request)
    {

    	if($request)
    	{
            $usuarioactual=\Auth::user();

            //Obtenemos la fecha de hoy en español usando carbon y array
            $fecha_actual = Fecha::spanish();
            
    		$query = $request->get('searchText');

    		if (!is_numeric($query)) {
                $query = 0;
            }

    		//Para el Select
            $consulta = DB::table('tipo_credito')->where('tipo_credito.estado','=','DISPONIBLE')->orderby('tipo_credito.interes','desc')->get();

            //Para el Search
    		$tasas = DB::table('tipo_credito as tipo')
            ->select('tipo.idtipocredito', 'tipo.nombre', 'tipo.condicion', 'tipo.monto',  'tipo.interes', 'tipo.estado')
            ->where('tipo.idtipocredito','=',$query)
    		->orderBy('tipo.interes','desc')
    		->paginate(20);

    		$cont = count($tasas);

    		//En caso de no encontrar elemento (al inicio)
    		if($cont == 0) {
    			$tasas = DB::table('tipo_credito as tipo')
		            ->select('tipo.idtipocredito', 'tipo.nombre', 'tipo.condicion', 'tipo.monto',  'tipo.interes', 'tipo.estado')
		            ->where('tipo.estado','=','DISPONIBLE')
		    		->orderBy('tipo.interes','desc')
		    		->paginate(25);
    		}

    		return view('tasaInteres.index',["tasas"=>$tasas, "consulta"=>$consulta, "fecha_actual"=>$fecha_actual, "searchText"=>$query,"usuarioactual"=>$usuarioactual]);
    	}

    }


        /*
        Nombre: create
        Objetivo: Formulario para crear tasas de interes
        Autor: Steven
        Fecha de última  de modificación: 02/01/2019
      */

    public function create()
    {
        //Obtenemos la fecha de hoy en español usando carbon y array
        $fecha_actual = Fecha::spanish();

        $usuarioactual=\Auth::user();

    	return view('tasaInteres.create',["fecha_actual"=>$fecha_actual, "usuarioactual"=>$usuarioactual]);
    }



    /*
    Nombre: store
    Objetivo: guarda los datos del formulario 
    Autor: Steven
    Fecha de última  de modificación: 02/01/2019
  */

    public function store( TasaInteresFormRequest $request)		//Para almacenar
    {

        try{
                DB::beginTransaction();

                $tasa = new TipoCredito;

                $tasa->nombre = $request->get('nombre');

                if (!empty($request->get('condicion'))) {
                    $tasa->condicion = $request->get('condicion');
                }else{
                    $tasa->condicion = 'No Aplica';
                }

                if (is_numeric($request->get('monto'))){
                    $tasa->monto = $request->get('monto');
                }else{
                    $tasa->monto = 0;
                }

                $interes = $request->get('interes');

                if ($interes < 0) {
                    Session::flash('msj1', ' El << Interés >> debe ser ingresado en porcentaje y debe ser mayor o igual a 0. ');
                    return Redirect::to('tasa-interes/create');
                }

                if ($interes > 100) {
                    Session::flash('msj1', ' El << Interés >> debe ser ingresado en porcentaje y debe ser menor o igual a 100. ');
                    return Redirect::to('tasa-interes/create');
                }

                $tasa->interes = $interes/100;

                $tasa->estado = 'DISPONIBLE';

                $tasa->save();

                $porc = $tasa->interes*100;

                Session::flash('create', ' '.$porc.' ');                

           DB::commit();

        } catch(\Exception $e)
        {
          DB::rollback();
          Session::flash('error', ''.' No se pudo guardar los datos de la tasa de interes, notificalo con los desarrolladores');
        }   	

    	return Redirect::to('tasa-interes');
    }


    /*
        Nombre: edit
        Objetivo: formulario de edicion de tasas de interes
        Autor: Steven
        Fecha de última  de modificación: 02/01/2019
    */

    public function edit($id)
    {
        $usuarioactual=\Auth::user();

        //Obtenemos la fecha de hoy en español usando carbon y array
        $fecha_actual = Fecha::spanish();

        //Búscamos el cliente junto con sus relaciones
        $interes = TipoCredito::findOrFail($id);

         return view('tasaInteres.edit',["fecha_actual"=>$fecha_actual, "interes"=>$interes, "usuarioactual"=>$usuarioactual]);  
    }


    /*
        Nombre: update
        Objetivo: Actualiza los datos del formulario en la base
        Autor: Steven
        Fecha de última  de modificación: 02/01/2019
    */
    public function update(TasaInteresFormRequest $request, $id)
    {   
        $usuarioactual=\Auth::user();

        try{
                DB::beginTransaction();

                //Se busca la tasa de interes
                $tasa = TipoCredito::findOrFail($id);
         
                //Actualizamos datos de la tasa de interes

                $tasa->nombre = $request->get('nombre');

                if (!empty($request->get('condicion'))) {
                    $tasa->condicion = $request->get('condicion');
                }else{
                    $tasa->condicion = 'No Aplica';
                }

                if (is_numeric($request->get('monto'))){
                    $tasa->monto = $request->get('monto');
                }else{
                    $tasa->monto = 0;
                }

                $interes = $request->get('interes');

                if ($interes < 0) {
                    Session::flash('msj1', ' El << Interés >> debe ser ingresado en porcentaje y debe ser mayor o igual a 0. ');
                    return Redirect::to('tasa-interes/'.$id.'/edit');
                }

                if ($interes > 100) {
                    Session::flash('msj1', ' El << Interés >> debe ser ingresado en porcentaje y debe ser menor o igual a 100. ');
                    return Redirect::to('tasa-interes/'.$id.'/edit');
                }

                $tasa->interes = $interes/100;

                $tasa->estado = 'DISPONIBLE';

                $tasa->update();

                $porc = $tasa->interes*100;

                Session::flash('update', ' '.$porc.' ');
                
           DB::commit();

        } catch(\Exception $e)
        {
          DB::rollback();
          Session::flash('error', ''.' No se pudo actualizar la tasa de interés, notificalo con los desarrolladores');

        }       

        return Redirect::to('tasa-interes');
    
    }

    /*
        Nombre: destroy
        Objetivo: Elimina una tasa de interes
        Autor: Steven
        Fecha de última  de modificación: 02/01/2019
    */

    public function destroy($id)
    {
        $usuarioactual=\Auth::user();

        $tasa = TipoCredito::findOrFail($id);
        $porc = $tasa->interes*100;
        $tasa->delete();

        Session::flash('delete'," ".$porc. " ");

        return Redirect::to('tasa-interes');

    }
}
