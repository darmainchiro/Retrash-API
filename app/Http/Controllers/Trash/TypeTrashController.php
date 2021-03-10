<?php
namespace App\Http\Controllers\Trash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TypeTrash;

class TypeTrashController extends Controller
{
    public function showType($id_type)
    { 
        $typeTrash = TypeTrash::where("type_trash.id_type",$id_type)
                ->join('category','type_trash.id_type','=','category.id')
                ->select('type_trash.*','category.category')
                ->get();

        foreach ($typeTrash as $object){
            $object->gambar = url('upload_foto'.'/'.$object->gambar);
        }

        return $typeTrash;
    }

    public function show($id)
    {

        $trash = TypeTrash::where("type_trash.id",$id)
            ->join('category','type_trash.id_type','=','category.id')
            ->select('type_trash.*','category.category')
            ->first();
        $trash['gambar'] = url('upload_foto'.'/'.$trash['gambar']);
        
        if($trash){
            return response()->json([
                'success' => true,
                'message' => 'Berhasil show detail',
                'travel' => $trash
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Tidak bisa show detail',
                'travel' => ''
            ], 404);
        }

    }
}