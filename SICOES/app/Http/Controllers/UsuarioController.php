<?php

namespace siap\Http\Controllers;

use Illuminate\Http\Request;
use siap\User;
use siap\TipoUsuario;
use siap\Http\Requests;
use siap\Fecha;

use Illuminate\Support\Facades\Response;
use siap\Http\Requests\UsuarioFormRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class UsuarioController extends Controller
{
    /*
        Nombre: index
        Objetivo: muestra la lista de usuarios activos
        Autor: Steven
        Fecha de última  de modificación: 02/01/2019
    */
   
    public function index(Request $request)
    {
       	$usuarioactual=\Auth::user();
        $tipousuario=TipoUsuario::all();
        $usuarios= User::orderBy('created_at','desc')->paginate(10);

        $fecha_actual = Fecha::spanish();
          
        return view('usuario.index',compact('usuarios'),["fecha_actual"=>$fecha_actual, "usuarios"=>$usuarios, "usuarioactual"=>$usuarioactual,"tiposusuario"=>$tipousuario]);
    }


    /*
        Nombre: create
        Objetivo: muestra el formulario para agregar un nuevo usuario
        Autor: Steven
        Fecha de última  de modificación: 02/01/2019
    */
  
    public function create()
    {
     $usuarioactual=\Auth::user();
     $tipousuario = TipoUsuario::orderBy('idtipousuario','asc');
     $fecha_actual = Fecha::spanish();
     return view('usuario.create',["fecha_actual"=>$fecha_actual, "usuarioactual"=>$usuarioactual,"tipousuario"=>$tipousuario]);
    }


    /*
        Nombre: store
        Objetivo: almacena al nuevo usuario en la base de datos
        Autor: Steven
        Fecha de última  de modificación: 02/01/2019
    */

    public function store(UsuarioFormRequest $request)        //Para almacenar
    {
        $usuarioactual=\Auth::user();
        $tipousuario=TipoUsuario::all();
        $usuarios= User::orderBy('created_at','desc')->paginate(10);
        
     $data = $request;
     $usuario= new User;
     $usuario->nombre =  $data['nombre'];
   
     $usuario->name=$data['name'];
     $usuario->email=$data['email'];
     $usuario->idtipousuario=$data['idtipousuario'];
     $usuario->password=bcrypt($data['password']);
     $usuario->save();
     
     Session::flash('create',"Usuario agregado correctamente");
    
     return redirect('usuario');
     
     
    
            
    }


    /*
        Nombre: edit
        Objetivo: muestra el formulario para editar un usuario
        Autor: Steven
        Fecha de última  de modificación: 02/01/2019
    */

    public function edit($id)
    {
        $usuarioactual=\Auth::user();
        $tipousuario=TipoUsuario::all();
        $fecha_actual = Fecha::spanish();

        $usuario = User::findOrFail($id);
        return view('usuario.edit',["fecha_actual"=>$fecha_actual, "tipousuario"=>$tipousuario,"usuario"=>$usuario,"usuarioactual"=>$usuarioactual]);   
        
    }


    /*
        Nombre: update
        Objetivo: actualiza a un usuario
        Autor: Steven
        Fecha de última  de modificación: 02/01/2019
    */
    
     public function update(Request $request, $id)
    {
     $usuario = User::findOrFail($id);
     $data = $request;
     $usuario->nombre =  $data['nombre'];
     $usuario->name=$data['name'];
     $usuario->email=$data['email'];
     $usuario->idtipousuario=$data['idtipousuario'];
     $usuario->password=bcrypt($data['password']);
     $usuario->update();
     
     Session::flash('update',"El Usuario: ".$usuario->nombre. " con Username: " .$usuario->name  ." ha sido editado correctamente");
       
    return redirect('usuario');
    }


    /*
        Nombre: destroy
        Objetivo: elimina a un usuario
        Autor: Steven
        Fecha de última  de modificación: 02/01/2019
    */
    public function destroy($id)
    {
        $usuarioactual=\Auth::user();

        $usuario = User::findOrFail($id);
        $usuario->delete();
         
        Session::flash('delete',"Usuario Eliminado correctamente");
         return back();

    }
    

    public function download(){
       
        $filename = 'manual.pdf';
        $tempImage = tempnam(sys_get_temp_dir(), $filename);
        copy('./img/manual.pdf', $tempImage);
        
        return response()->download($tempImage, $filename);
        
    }


}
