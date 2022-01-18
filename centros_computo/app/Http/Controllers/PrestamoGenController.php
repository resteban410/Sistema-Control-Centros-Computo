<?php

namespace App\Http\Controllers;

use App\Models\PrestamoModel;
use App\Models\LaboratorioModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrestamoGenController extends Controller
{
    public function index(){
        $laboratorios = LaboratorioModel::all();
        $usuarios = DB::table('users')
        ->select('users.*')
        ->get();
        $data = DB::table('usuario_asignacion')
			->join('asignacion', 'usuario_asignacion.id_asignacion', '=', 'asignacion.num_asignacion')
			->join('users', 'usuario_asignacion.id_usuario', '=', 'users.id')
			->join('laboratorio', 'asignacion.laboratorio_lab_clave', '=', 'laboratorio.lab_clave')
			->join('periodo', 'asignacion.periodo_id_periodo', '=', 'periodo.id_periodo')
			->select('asignacion.*', 'users.name', 'laboratorio.nombre_laboratorio', 'periodo.nombre_periodo')
			->get();
        $nombrePag = "Préstamos";
        return view('general.prestamosGen', compact('laboratorios', 'usuarios','nombrePag', 'data'));

    }

    public function show(){
        $prestamos = PrestamoModel::all();
        return response()->json($prestamos);
    }

    public function store(Request $request){
        $prestamos = new PrestamoModel();
        request()->validate([
            'start' => 'required',
            'end' => 'required',
            'title' => 'required',
        ]);
        $prestamos->start = $request->start;
        $prestamos->end = $request->end;
        $prestamos->title = $request->title;
        $prestamos->descripcion = $request->descripcion;
        $prestamos->labora_lab_clave = $request->labora_lab_clave;
        $prestamos->usuario_usu_id = $request->usuario_usu_id;	
        $prestamos->save();
    }

    public function edit($id){
		$prestamos = DB::table('prestamo')
			->where('num_prestamo', '=', $id)
			->get();
	   return response()->json($prestamos);
    }

    public function update(Request $request){
		$num_prestamo = $request->num_prestamo;
		$prestamos = DB::table('prestamo')->where('num_prestamo', $num_prestamo)->update([
    		'start' => $request->start,
    		'end' => $request->end,
    		'title' => $request->title,
            'descripcion' => $request->descripcion,
			'labora_lab_clave' => $request->labora_lab_clave,
			'usuario_usu_id' => $request->usuario_usu_id,	
    	]);
		return response()->json($prestamos);
    }

    public function destroy($id){
		$prestamos = DB::table('prestamo')
		->where('num_prestamo', '=', $id)
		->delete();
		return response()->json($prestamos);
    }
}
