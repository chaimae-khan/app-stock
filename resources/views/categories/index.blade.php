@extends('layouts.test')  
@section('content')  

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{asset('assets/js/Categories/script.js')}}"></script>
<script>
    var csrf_token                = "{{csrf_token()}}";
    var AddCategory               = "{{url('addCategory')}}";
    var categories                = "{{url('categories')}}";
    var UpdateCategory            = "{{url('updateCategory')}}";
    var DeleteCategory            = "{{url('DeleteCategory')}}";
</script>
<div class="card">
    
<div class="content">
    <div class="page-header">
        
        <div class="page-btn">
            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalAddCategory">
                <i class="fa-solid fa-plus"></i> Add Category
            </a>
        </div>	
        
    </div>
    
    <!-- Categories list -->
    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
            
            
            <div class="card-body p-0">
                <div class="table-responsive">
                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer table-responsive ">
                        <table class="table datatable dataTable no-footer TableCategories" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Créer par</th>
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
        </div>
    </div>
    
    
    <!-- Add Category Modal -->
    <div class="modal fade" id="ModalAddCategory" tabindex="-1" aria-labelledby="ModalAddCategoryLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalAddCategoryLabel">Add New Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <ul class="validationAddCategory"></ul>
                        <form action="{{ url('addCategory') }}" id="FormAddCategory">
                            {{-- @csrf --}}
                    
                            <!-- Name -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Category Name</label>
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                                        @error('name')
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
                    <button type="button" class="btn btn-primary" id="BtnAddCategory">Sauvegarder</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Category Modal -->
    <div class="modal fade" id="ModalEditCategory" tabindex="-1" aria-labelledby="ModalEditCategoryLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalEditCategoryLabel">Edit Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <ul class="validationEditCategory"></ul>
                        <form action="{{ url('updateCategory') }}" id="FormUpdateCategory">
                            {{-- @csrf --}}
                            
                            <!-- Name -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Category Name</label>
                                        <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                                        @error('name')
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
                    <button type="button" class="btn btn-primary" id="BtnUpdateCategory">Sauvegarder</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection