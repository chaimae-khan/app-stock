

@extends('layouts.test')  
@section('content')  

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{asset('assets/js/Users/script.js')}}"></script>
<script>
    var csrf_token                      = "{{csrf_token()}}";
    var Adduser                       = "{{route('users.store')}}";
    var users                      = "{{route('users.index')}}";
    var UpdateUser                      = "{{url('updateUser')}}";
    var DeleteUser                      = "{{url('DeleteUser')}}";
   /*  var UpdateLivreurs                   = "{{url('UpdateLivreurs')}}";
    var livreur                         = "{{url('livreur')}}"; */
</script>
<div class="card">
    
    


<div class="content">
    <div class="page-header">
        
        <div class="page-btn">
            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalAddUser">
                <i class="fa-solid fa-user"></i> Add user
            </a>
        </div>	
        
    </div>
    
    <!-- /product list -->
    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
            
            
            <div class="card-body p-0">
                <div class="table-responsive">
                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer table-responsive ">
                        <table class="table datatable dataTable no-footer TableUsers" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
                            <thead class="thead-light">
                                <tr>
                                    
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    
                                    <th scope="col">roles</th>
                                    <th scope="col">créer le</th>
                                    <th scope="col">Action</th>    
                                </tr>
                            </thead>
                            <tbody>
        
                            </tbody>
                    </table>
                    
                </div>
            </div>
    </div>
    
    
    <!-- Modal -->
<div class="modal fade" id="ModalAddUser" tabindex="-1" aria-labelledby="ModalAddUserLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalAddUserLabel">Add New User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <ul class="validationAddUser"></ul>
                    <form action="{{ route('users.store') }}" id="FormAddUser">
                        {{-- @csrf --}}
                
                        <!-- Full Name & Email -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Full Name</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                
                        <!-- Password & Confirm Password -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Password</label>
                                    <div class="pass-group">
                                        <input type="password" name="password" class="form-control pass-input @error('password') is-invalid @enderror">
                                        <span class="fas toggle-password fa-eye-slash"></span>
                                    </div>
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <div class="pass-group">
                                        <input type="password" name="password_confirmation" class="form-control pass-input">
                                        <span class="fas toggle-password fa-eye-slash"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                
                        <!-- Phone & Role -->
                        <div class="row">
                            
                
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Role</label>
                                    <select class="select @error('roles') is-invalid @enderror" name="roles">
                                        <option value="">Select</option>
                                        @forelse ($roles as $role)
                                        @if ($role != 'Super Admin')
                                            <option value="{{ $role }}" {{ (old('roles') == $role) ? 'selected' : '' }}>
                                                {{ $role }}
                                            </option>
                                        @else
                                            @if (Auth::user()->hasRole('Super Admin'))   
                                                <option value="{{ $role }}" {{ (old('roles') == $role) ? 'selected' : '' }}>
                                                    {{ $role }}
                                                </option>
                                            @endif
                                        @endif
                                    @empty
                                    @endforelse
                                    </select>
                                    @error('roles')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                
                
                  
            </div>
            <div class="modal-footer text-end">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Ferme</button>
                <button type="button" class="btn btn-primary" id="BtnADDUser"> Sauvegarder</button>
            </div>
        </div>
    </div>
</div>

















<div class="modal fade" id="ModalEditUser" tabindex="-1" aria-labelledby="ModalAddUserLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalAddUserLabel">Edit  User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <ul class="validationAddUser"></ul>
                    <form action="{{ url('updateUser') }}" id="FormUpdateUser">
                        {{-- @csrf --}}
                
                        <!-- Full Name & Email -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Full Name</label>
                                    <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                
                        <!-- Password & Confirm Password -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Password</label>
                                    <div class="pass-group">
                                        <input type="password" id="password" name="password" class="form-control pass-input @error('password') is-invalid @enderror">
                                        <span class="fas toggle-password fa-eye-slash"></span>
                                    </div>
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <div class="pass-group">
                                        <input type="password" name="password_confirmation" class="form-control pass-input">
                                        <span class="fas toggle-password fa-eye-slash"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                
                        <!-- Phone & Role -->
                        <div class="row">
                           
                
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Role</label>
                                    <select class="select @error('roles') is-invalid @enderror" name="roles" id="roles">
                                        <option value="">Select</option>
                                        @forelse ($roles as $role)
                                        @if ($role != 'Super Admin')
                                            <option value="{{ $role }}" {{ (old('roles') == $role) ? 'selected' : '' }}>
                                                {{ $role }}
                                            </option>
                                        @else
                                            @if (Auth::user()->hasRole('Super Admin'))   
                                                <option value="{{ $role }}" {{ (old('roles') == $role) ? 'selected' : '' }}>
                                                    {{ $role }}
                                                </option>
                                            @endif
                                        @endif
                                    @empty
                                    @endforelse
                                    </select>
                                    @error('roles')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                
                
                  
            </div>
            <div class="modal-footer text-end">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Ferme</button>
                <button type="button" class="btn btn-primary" id="BtnUpdateUser"> Sauvegarder</button>
            </div>
        </div>
    </div>
</div>
    
</div>




@endsection