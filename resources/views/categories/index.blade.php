{{-- @extends('layouts.test')  
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

@endsection --}}


@extends('dashboard.index')

@section('dashboard')
<script src="{{asset('assets/js/Categories/script.js')}}"></script>
<script>
    var csrf_token                = "{{csrf_token()}}";
    var AddCategory               = "{{url('addCategory')}}";
    var categories                = "{{url('categories')}}";
    var UpdateCategory            = "{{url('updateCategory')}}";
    var DeleteCategory            = "{{url('DeleteCategory')}}";
</script>
<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">List de categories </h4>
                </div>
                
                <div class="text-end">
                    <ol class="breadcrumb m-0 py-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Apps</a></li>
                        <li class="breadcrumb-item active">Tva</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-body">
                            <div class=" mb-3">
                                <button class="btn btn-primary" style="margin-right: 5px" data-bs-toggle="modal" data-bs-target="#ModalAddCategory">Add Category</button>
                            </div>
                            <div class="table-responsive">
                                <div class="datatable-wrapper datatable-loading no-footer sortable fixed-height fixed-columns">
                                    
                                    <div class="datatable-container" style="height: 665.531px;">
                                        <table class="table datatable datatable-table TableCategories" >
                                            <thead>
                                                <tr>
                                                    
                                                    
                                                    <th data-sortable="true">Name</th>
                                                    <th data-sortable="true">Créer par</th>
                                                    <th data-sortable="true">créer le</th>
                                                    <th data-sortable="true">Action</th>   
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
                    </div>
                </div>

            </div>
        </div>


       

        <!-- Add TVA Modal -->
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



        
        
        
        
</div>



@endsection