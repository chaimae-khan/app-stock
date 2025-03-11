@extends('layouts.test')  
@section('content')  

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{asset('assets/js/subcategory/script.js')}}"></script>
<script>
    var csrf_token                = "{{csrf_token()}}";
    var AddSubCategory            = "{{url('addSubCategory')}}";
    var subcategories             = "{{url('subcategory')}}";
    var UpdateSubCategory         = "{{url('updateSubCategory')}}";
    var DeleteSubCategory         = "{{url('DeleteSubCategory')}}";
    var editSubCategory           = "{{url('editSubCategory')}}";
</script>
<div class="card">
    
<div class="content">
    <div class="page-header">
        
        <div class="page-btn">
            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalAddSubCategory">
                <i class="fa-solid fa-plus"></i> Ajouter une sous-catégorie
            </a>
        </div>	
        
    </div>
    
    <!-- SubCategory list -->
    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
            
            
            <div class="card-body p-0">
                <div class="table-responsive">
                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer table-responsive ">
                        <table class="table datatable dataTable no-footer TableSubCategories" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Catégorie</th>
                                    <th scope="col">Créé par</th>
                                    <th scope="col">Créé le</th>
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
    
    
    <!-- Add SubCategory Modal -->
    <div class="modal fade" id="ModalAddSubCategory" tabindex="-1" aria-labelledby="ModalAddSubCategoryLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalAddSubCategoryLabel">Ajouter une nouvelle sous-catégorie</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <ul class="validationAddSubCategory"></ul>
                        <form action="{{ url('addSubCategory') }}" id="FormAddSubCategory">
                            {{-- @csrf --}}
                    
                            <!-- Name & Category -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nom de la sous-catégorie</label>
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                    
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Catégorie</label>
                                        <select name="id_categorie" class="form-control @error('id_categorie') is-invalid @enderror">
                                            <option value="">Sélectionner une catégorie</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('id_categorie')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer text-end">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="button" class="btn btn-primary" id="BtnAddSubCategory">Sauvegarder</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit SubCategory Modal -->
    <div class="modal fade" id="ModalEditSubCategory" tabindex="-1" aria-labelledby="ModalEditSubCategoryLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalEditSubCategoryLabel">Modifier la sous-catégorie</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <ul class="validationEditSubCategory"></ul>
                        <form action="{{ url('updateSubCategory') }}" id="FormUpdateSubCategory">
                            {{-- @csrf --}}
                            
                            <!-- Name & Category -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nom de la sous-catégorie</label>
                                        <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                    
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Catégorie</label>
                                        <select id="id_categorie" name="id_categorie" class="form-control @error('id_categorie') is-invalid @enderror">
                                            <option value="">Sélectionner une catégorie</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('id_categorie')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer text-end">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="button" class="btn btn-primary" id="BtnUpdateSubCategory">Mettre à jour</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection