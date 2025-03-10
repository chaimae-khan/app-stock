<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use App\Models\Category;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $dataSubCategory = DB::table('sub_categories as sc')
                        ->join('users as u', 'u.id', 'sc.iduser')
                        ->join('categories as c', 'c.id', 'sc.id_categorie')
                ->select(
                    'sc.id',
                    'sc.name',
                    'c.name as category_name',
                    'u.name as username',
                    'sc.created_at'
                );

            return DataTables::of($dataSubCategory)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '';

                    // Edit button
                    $btn .= '<a href="#" class="btn btn-sm bg-primary-subtle me-1 editSubCategory"
                                data-id="' . $row->id . '">
                                <i class="fa-solid fa-pen-to-square text-primary"></i>
                            </a>';

                    // Delete button
                    $btn .= '<a href="#" class="btn btn-sm bg-danger-subtle deleteSubCategory"
                                data-id="' . $row->id . '" data-bs-toggle="tooltip" 
                                title="Supprimer Sous-catégorie">
                                <i class="fa-solid fa-trash text-danger"></i>
                            </a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        
        $categories = Category::all();
        
        return view('subcategory.index', [
            'subcategories' => SubCategory::latest('id')->paginate(10),
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'id_categorie' => 'required|exists:categories,id',
        ], [
            'required' => 'Le champ :attribute est requis.',
            'exists' => 'La catégorie sélectionnée n\'existe pas.',
        ], [
            'name' => 'nom',
            'id_categorie' => 'catégorie',
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ], 400);
        }

        $subcategory = SubCategory::create([
            'name' => $request->name,
            'id_categorie' => $request->id_categorie,
            'iduser' => Auth::user()->id,
        ]);

        if($subcategory) {
            return response()->json([
                'status' => 200,
                'message' => 'Sous-catégorie créée avec succès',
            ]);
        } else { 
            return response()->json([
                'status' => 500,
                'message' => 'Quelque chose ne va pas'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(SubCategory $subcategory): RedirectResponse
    {
        return redirect()->route('subcategory.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $subcategory = SubCategory::find($id);
        
        if (!$subcategory) {
            return response()->json([
                'status' => 404,
                'message' => 'Sous-catégorie non trouvée'
            ], 404);
        }
        
        return response()->json($subcategory);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
{
    \Log::info('Update request data:', $request->all());
    
    $subcategory = SubCategory::find($request->id);
    
    if (!$subcategory) {
        return response()->json([
            'status' => 404,
            'message' => 'Sous-catégorie non trouvée'
        ], 404);
    }
    
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'id_categorie' => 'required|exists:categories,id',
    ]);
    
    if ($validator->fails()) {
        return response()->json([
            'status' => 400,
            'errors' => $validator->messages(),
        ], 400);
    }
    
    try {
        $subcategory->name = $request->name;
        $subcategory->id_categorie = $request->id_categorie;
        $saved = $subcategory->save();
        
        if ($saved) {
            return response()->json([
                'status' => 200,
                'message' => 'Sous-catégorie mise à jour avec succès',
            ]);
        } else {
            return response()->json([
                'status' => 500,
                'message' => 'Erreur lors de la mise à jour de la sous-catégorie',
            ], 500);
        }
    } catch (\Exception $e) {
        \Log::error('Error updating subcategory: ' . $e->getMessage());
        return response()->json([
            'status' => 500,
            'message' => 'Erreur lors de la mise à jour: ' . $e->getMessage(),
        ], 500);
    }
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $subcategory = SubCategory::find($request->id);

        if (!$subcategory) {
            return response()->json([
                'status' => 404,
                'message' => 'Sous-catégorie non trouvée'
            ], 404);
        }

        if ($subcategory->delete()) {
            return response()->json([
                'status' => 200,
                'message' => 'Sous-catégorie supprimée avec succès'
            ]);
        }

        return response()->json([
            'status' => 500,
            'message' => 'Une erreur est survenue lors de la suppression'
        ], 500);
    }
}