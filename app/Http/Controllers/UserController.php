<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
class UserController extends Controller
{
    /**
     * Instantiate a new UserController instance.
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    //     $this->middleware('permission:create-user|edit-user|delete-user', ['only' => ['index','show']]);
    //     $this->middleware('permission:create-user', ['only' => ['create','store']]);
    //     $this->middleware('permission:edit-user', ['only' => ['edit','update']]);
    //     $this->middleware('permission:delete-user', ['only' => ['destroy']]);
    // }

    /**
     * Display a listing of the resource.
     */
    public function index(request $request)
    {
       
                 
                 
        if ($request->ajax()) {
            $dataUser = DB::table('users')
                ->leftJoin('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
                ->leftJoin('roles', 'model_has_roles.role_id', '=', 'roles.id')
                ->select(
                    'users.id',
                    'users.name',
                    'users.email',
                    'users.password',
                    
                    'users.created_at',
                    DB::raw("GROUP_CONCAT(roles.name SEPARATOR ', ') as roles") // ✅ جلب الأدوار كمصفوفة مفصولة بفاصلة
                )
                ->groupBy('users.id', 'users.name', 'users.email', 'users.password', 'users.created_at');
    
            return DataTables::of($dataUser)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '';
    
                    // زر التعديل
                    $btn .= '<a href="#" class="btn btn-sm bg-primary-subtle me-1 editUser"
                                data-id="' . $row->id . '"  
                                >
                                <i class="fa-solid fa-pen-to-square text-primary"></i>
                            </a>';
    
                    // زر الحذف
                    $btn .= '<a href="#" class="btn btn-sm bg-danger-subtle deleteCompany"
                                data-id="' . $row->id . '" data-bs-toggle="tooltip" 
                                title="Supprimer company">
                                <i class="fa-solid fa-trash text-danger"></i>
                            </a>';
    
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
                 
                 
        return view('users.index', [
            'users' => User::latest('id')->paginate(3),
            'roles' => Role::pluck('name')->all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('users.create', [
            'roles' => Role::pluck('name')->all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)/* : RedirectResponse */
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email', // ✅ التحقق من البريد الإلكتروني الفريد
            'phone' => 'required',
            'password' => 'required|min:6',
        ], [
            'required' => 'Le champ :attribute est requis.',
            'email.email' => 'Le champ mail doit être une adresse valide.',
            'email.unique' => 'Cet email est déjà utilisé, veuillez en choisir un autre.', // ✅ رسالة خطأ عند التكرار
            'password.min' => 'Le mot de passe doit contenir au moins 6 caractères.',
        ], [
            'name' => 'nom complet',
            'email' => 'mail',
            'phone' => 'téléphone',
            'password' => 'mot de passe',
        ]);
        
        if ($validator->messages()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ], 400); // تأكد من وضع كود الحالة HTTP هنا
        }
        $input = $request->all();
        $input['password'] = Hash::make($request->password);

        $user = User::create($input);
        if($user)
        {
            $user->assignRole($request->roles);
            return response()->json([
                'status' => 200,
                'message' => 'user créée avec succès',
                
            ]);
        }
        else
        { 
            
            return response()->json([
                'status' => 500,
                'message' => 'Quelque chose ne va pas'
            ]);

        }
       
        

        
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user): RedirectResponse
    {
        return redirect()->route('users.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user): View
    {
        // Check Only Super Admin can update his own Profile
        if ($user->hasRole('Super Admin')){
            if($user->id != auth()->user()->id){
                abort(403, 'USER DOES NOT HAVE THE RIGHT PERMISSIONS');
            }
        }

        return view('users.edit', [
            'user' => $user,
            'roles' => Role::pluck('name')->all(),
            'userRoles' => $user->roles->pluck('name')->all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request)
    {
        $user = User::find($request->id);

        if (!$user) {
            return response()->json([
                'status' => 404,
                'message' => 'Utilisateur non trouvé'
            ], 404);
        }
    
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id, // Exclure l'ID actuel de la vérification d'unicité
            'phone' => 'required',
            'password' => 'nullable|min:6',
        ], [
            'required' => 'Le champ :attribute est requis.',
            'email.email' => 'Le champ mail doit être une adresse valide.',
            'email.unique' => 'Cet email est déjà utilisé, veuillez en choisir un autre.',
            'password.min' => 'Le mot de passe doit contenir au moins 6 caractères.',
        ], [
            'name' => 'nom complet',
            'email' => 'mail',
            'phone' => 'téléphone',
            'password' => 'mot de passe',
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ], 400);
        }
    
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
    
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
    
        if ($user->save()) {
            if ($request->has('roles')) {
                $user->syncRoles($request->roles); // Met à jour les rôles
            }
    
            return response()->json([
                'status' => 200,
                'message' => 'Utilisateur mis à jour avec succès',
            ]);
        }
    
        return response()->json([
            'status' => 500,
            'message' => 'Quelque chose ne va pas'
        ], 500);
        /* $input = $request->all();
 
        if(!empty($request->password)){
            $input['password'] = Hash::make($request->password);
        }else{
            $input = $request->except('password');
        }
        
        $user->update($input);

        $user->syncRoles($request->roles);

        return redirect()->back()
                ->withSuccess('User is updated successfully.'); */
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user): RedirectResponse
    {
        // About if user is Super Admin or User ID belongs to Auth User
        if ($user->hasRole('Super Admin') || $user->id == auth()->user()->id)
        {
            abort(403, 'USER DOES NOT HAVE THE RIGHT PERMISSIONS');
        }

        $user->syncRoles([]);
        $user->delete();
        return redirect()->route('users.index')
                ->withSuccess('User is deleted successfully.');
    }
}