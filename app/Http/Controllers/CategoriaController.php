<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    //Realizar la consulta GET
    public function getCategoria(){
        return response()->json(Categoria::all(),200);
    }


    //Búsqueda por Id
    public function getCategoriaxid($id){
        $categoria = Categoria::find($id);

        if(is_null($categoria)){
            return response()->json(['Mensaje' => 'Registro no encontrado'],404);
        }
        return response()->json($categoria::find($id),200);
    }

    //Insertar POST
    public function insertCategoria(Request $request){
        $categoria = Categoria::create($request->all());

        return response($categoria,200);
    }

    //UPDATE PUT
    public function updateCategoria(Request $request, $id){
        $categoria = Categoria::find($id);

        if(is_null($categoria)){
            return response()->json(['Mensaje' => 'Registro no encontrado',200]);
        }

        $categoria->update($request->all());
        return response($categoria,200);
    }

    //DELETE
    public function deleteCategoria($id){
        $categoria = Categoria::find($id);

        if(is_null($categoria)){
            return response()->json(['Mensaje'=>'Registro no encontrado'],400);
        }

        $categoria->delete();
        return response()->json(['Mensaje' => 'Se eliminó correctamente'],200);

    }

}