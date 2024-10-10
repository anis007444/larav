<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $categories=Categorie::all();
            return response()->json($categories);
        }catch(\Exception $e)
        {
           return response()->json("probleme de récuperation des categories");
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $categorie= new Categorie([
            "nomcategorie"=>$request->input("nomcategorie"),
            "imagecategorie"=>$request->input("imagecategorie") ]);
            $categorie->save();
            return response()->json($categorie);
            
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
            $categorie=Categorie::findOrfail($id);
            return response()->json($categorie);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        try {
            $categorie=Categorie::findOrfail($id);
            $categorie->update($request->all());
            return response()->json($categorie);

        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        try {
            $categorie=Categorie::findOrfail($id);
            $categorie->delete();
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }

    }
}
