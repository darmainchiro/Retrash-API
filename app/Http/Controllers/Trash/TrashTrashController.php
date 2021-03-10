<?php
namespace App\Http\Controllers\Trash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TrashTrashController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request,[
            'type' => ['required'],
            'name' => ['required'],
        ]);

        //upload foto
        if($request->file('foto')){
            $name_foto = time().$request->file('foto')->getClientOriginalName();
            //direktori
            $request->file('foto')->move('upload_foto', $name_foto);
            $foto = $name_foto;
            $id_category = $request->id_category;
            $name_wisata = $request->name_wisata;
            $description = $request->description;
            $alamat = $request->alamat;
            $fasilitas = $request->fasilitas;
        } else {
            $id_category = $request->id_category;
            $name_wisata = $request->name_wisata;
            $foto = 'default.png';
            $alamat = $request->alamat;
            $description = $request->description;
            $fasilitas = $request->fasilitas;
        }

        $travel = Travel::create([
            'id_category' => $id_category,
            'name_wisata' => $name_wisata,
            'description' => $description,
            'alamat' => $alamat,
            'fasilitas' => $fasilitas,
            'gambar' => $foto,
        ]);
        
        $travel->gambar = url('upload_foto'.'/'.$foto);

        if($travel){
            return response()->json([
                'success' => true,
                'message' => 'Berhasil add travel',
                'travel' => $travel
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Tidak bisa add travel',
                'travel' => ''
            ], 404);
        }
    }
}