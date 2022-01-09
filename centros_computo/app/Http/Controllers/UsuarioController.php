<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
    public function index(){
    	$nombrePag =  "Usuarios";
        $usuarios = DB::table('users')
            ->select('users.*')
            ->get();
        return view('admin.usuarios',compact('usuarios', 'nombrePag')); 
        
    }

    public function store(Request $request){

        request()->validate([
            'id' => 'required',
            'name' => 'required',
            'last_name' => 'required',
            'password' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'telephone' => 'required',
            'role' => 'required'
        ]);

        $usuarios = new User(); 

        $usuarios->id = $request->id;
        $usuarios->name = $request->name;
        $usuarios->last_name = $request->last_name;
        $usuarios->password = $request->password;
        $usuarios->email = $request->email;
        $usuarios->address = $request->address;
        $usuarios->telephone = $request->telephone;
        $usuarios->role = $request->role;

        $usuarios->save();
        return redirect()->route('usuariosP');
    }

    public function edit(Request $request){ 

        request()->validate([
            'id' => 'required',
            'name' => 'required',
            'last_name' => 'required',
            'password' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'telephone' => 'required',
            'role' => 'required'
        ]);
        $id = $request->id;

        $usuarios = DB::table('usuario')->where('id', $id)->update(
            ['id' => $request->id, 
            'nombre_usuario' => $request->nombre_usuario,
            'apellido' => $request->apellido,
            'contraseña' => $request->contraseña,
            'correo_electronico' => $request->correo_electronico,
        	'direccion' => $request->direccion,
        	'telefono' => $request->telefono,
        	'tipo' => $request->tipo]
        );
        return redirect()->route('usuariosP');
    }

    public function destroy(Request $request){

        request()->validate([
            'id' => 'required'
        ]);


        $id = $request->id;
   
        $usuario = DB::table('usuario')->where('id', $id)->delete();
        return redirect()->route('usuariosP');
    }
}
