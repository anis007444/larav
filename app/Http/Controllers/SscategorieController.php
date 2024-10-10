<?php

namespace App\Http\Controllers;

use App\Models\Sscategorie;
use Illuminate\Http\Request;

class SscategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $scategorie=SsCategorie::with("categorie")->get();
            return response()->json($scategorie);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $scategorie= new SsCategorie([
            "nomcategorie"=>$request->input("nomcategorie"),
            "imagescategorie"=>$request->input("imagescategorie") ,
            "categorieID"=>$request->input("categorieID"),
            ]);
            $scategorie->save();
            return response()->json($scategorie);
            
        } catch (\Exception $e) {
            return response()->json("probleme création");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $scategorie=SsCategorie::findOrfail($id);
            return response()->json($scategorie);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $scategorie=Sscategorie::findOrfail($id);
            $scategorie->update($request->all());
            return response()->json($scategorie);

        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $scategorie=Sscategorie::findOrfail($id);
            $scategorie->delete();
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }


    public function showSCategorieByCAT($idcat)
{
try {
$scategorie= Sscategorie::where('categorieID', $idcat)->with('categorie')->get();
return response()->json($scategorie);
} catch (\Exception $e) {
return response()->json("Selection impossible {$e->getMessage()}");
}
}
}
