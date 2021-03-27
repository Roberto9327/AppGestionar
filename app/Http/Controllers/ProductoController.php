<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productos;
use Illuminate\Support\Facades\DB;
//use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $productos =DB::table('productos')
        ->select('*')
        ->paginate(5);
        return view('productoList', ['productos' => $productos]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $productoNueva = new Productos();
        $productoNueva->Name = $request->inputNombre3;
        $productoNueva->Price = $request->inputPrecio3;
        $productoNueva->State = 1;

        $productoNueva->save();
        //dd($alumnoNueva);
        return redirect('productoList');
    }
    public function update(Request $request, $id){
        
        $fecha = date('Y-m-d G:i:s');
        DB::table('productos')
            ->where('Id', $id)
            ->update(array( 'Name' => $request->inputNombre3,
                                     'Price'   => $request->inputPrecio3,
                                        'updated_at'=>$fecha));
        return redirect('productoList');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function editar($item){
        $productos = Productos::findOrFail($item);
        return view('editar')->with('productos', $productos);
    }
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function update(Request $request, $id)
    {
        $alumnosActualizada = Alumnos::find($id);
        $alumnosActualizada->Cod = $request->Codigo;
        $alumnosActualizada->Name = $request->Nombre;
        $alumnosActualizada->save();

        $alumnos = alumnos::all();
        return view('studentList')->with('alumnos', $alumnos);
    }*/

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productos = Productos::findOrFail($id);
        //dd($alumnos);
        if($productos->State == 0){
          DB::table('productos')
            ->where('Id', $id)
            ->update(array( 'State' => 1));  
        }else{
            DB::table('productos')
            ->where('Id', $id)
            ->update(array( 'State' => 0));  
        }
        
        //$alumnos = alumnos::all()->paginate(2);
        //dd($alumnosActualizado);
        //return redirect('studentList')->with('alumnos', $alumnos);
        return redirect('productoList');
    }
}
