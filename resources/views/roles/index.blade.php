{{-- @extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Manage Roles</div>
    <div class="card-body">
        @can('create-role')
            <a href="{{ route('roles.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Role</a>
        @endcan
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                <th scope="col">S#</th>
                <th scope="col" style="max-width:100px;">Role Name</th>
                <th scope="col">Permissions</th>
                <th scope="col" style="width: 250px;">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($roles as $role)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $role->name }}</td>
                    <td>
                        <ul>
                            @forelse ($role->permissions as $permission)
                                <li>{{ $permission->name }}</li>
                            @empty
                            @endforelse
                        </ul>
                    </td>
                    <td>
                        <form action="{{ route('roles.destroy', $role->id) }}" method="post">
                            @csrf
                            @method('DELETE')

                            @if ($role->name!='Super Admin')
                                @can('edit-role')
                                    <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>   
                                @endcan

                                @can('delete-role')
                                    @if ($role->name!=Auth::user()->hasRole($role->name))
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this role?');"><i class="bi bi-trash"></i> Delete</button>
                                    @endif
                                @endcan
                            @endif

                        </form>
                    </td>
                </tr>
                @empty
                    <td colspan="3">
                        <span class="text-danger">
                            <strong>No Role Found!</strong>
                        </span>
                    </td>
                @endforelse
            </tbody>
        </table>

        {{ $roles->links() }}

    </div>
</div>
@endsection --}}




@extends('layouts.test')  
@section('content')  

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{asset('assets/js/Roles/script.js')}}"></script>
<script>
    var csrf_token                      = "{{csrf_token()}}";
    var AddRoles                       = "{{route('roles.store')}}";
    var roles                      = "{{route('roles.index')}}";
    var updateRole                      = "{{url('updateRole')}}";
    var DeleteRole                      = "{{url('DeleteRole')}}";
   /*  var UpdateLivreurs                   = "{{url('UpdateLivreurs')}}";
    var livreur                         = "{{url('livreur')}}"; */
</script>
<div class="card">
    
    


<div class="content">
    <div class="page-header">
        
        <div class="page-btn">
            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalAddRoles">
                <i class="fa-solid fa-user-gear"></i> Add roles
            </a>
        </div>	
        
    </div>
    
    <!-- /product list -->
    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
            
            
            <div class="card-body p-0">
                <div class="table-responsive">
                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer table-responsive ">
                        <table class="table datatable dataTable no-footer TableRoles" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">S#</th>
                                    <th scope="col" style="max-width:100px;">Role Name</th>
                                    <th scope="col">Permissions</th>
                                    <th scope="col" style="width: 250px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
        
                            </tbody>
                    </table>
                    
                </div>
            </div>
    </div>
    
    
    <!-- Modal -->
<div class="modal fade" id="ModalAddRoles" tabindex="-1" aria-labelledby="ModalAddUserLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalAddUserLabel">Add New User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <ul class="validationAddRoles"></ul>
                    <form action="{{ route('roles.store') }}" id="FormAddRoles">
                        {{-- @csrf --}}
                
                        <!-- Full Name & Email -->
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Name roles</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                
                            <div class="col-12">           
                                <select class="form-select @error('permissions') is-invalid @enderror" multiple aria-label="Permissions" id="permissions" name="permissions[]" style="height: 210px;">
                                    @forelse ($permissions as $permission)
                                        <option value="{{ $permission->id }}" {{ in_array($permission->id, old('permissions') ?? []) ? 'selected' : '' }}>
                                            {{ $permission->name }}
                                        </option>
                                    @empty
    
                                    @endforelse
                                </select>
                                @error('permissions')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>  
                    </form>
                </div>
            </div>
            <div class="modal-footer text-end">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Ferme</button>
                <button type="button" class="btn btn-primary" id="BtnADDRoles"> Sauvegarder</button>
            </div>
        </div>
    </div>
</div>

















<div class="modal fade" id="ModalEditRoles" tabindex="-1" aria-labelledby="ModalAddUserLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalAddUserLabel">Edit  roles</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <ul class="validationEditRoles"></ul>
                    <form action="{{ url('updateRole') }}" id="FormUpdateRoles">
                        {{-- @csrf --}}
                
                        <!-- Full Name & Email -->
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Name roles</label>
                                    <input type="text" id="nameRole" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                
                            <div class="col-12">           
                                <select class="form-select @error('permissions') is-invalid @enderror" multiple aria-label="Permissions" id="permissions" name="permissions[]" style="height: 210px;">
                                    @forelse ($permissions as $permission)
                                        <option value="{{ $permission->id }}" {{ in_array($permission->id, old('permissions') ?? []) ? 'selected' : '' }}>
                                            {{ $permission->name }}
                                        </option>
                                    @empty
    
                                    @endforelse
                                </select>
                                @error('permissions')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>  
                    </form>
                </div>
                
                
                  
            </div>
            <div class="modal-footer text-end">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Ferme</button>
                <button type="button" class="btn btn-primary" id="BtnEditRoles"> Sauvegarder</button>
            </div>
        </div>
    </div>
</div>
    
</div>




@endsection