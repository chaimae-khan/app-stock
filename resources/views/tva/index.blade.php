@extends('layouts.test')  
@section('content')  

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{asset('assets/js/tva/script.js')}}"></script>
<script>
    var csrf_token                = "{{csrf_token()}}";
    var AddTva                    = "{{url('addTva')}}";
    var tvas                      = "{{url('tva')}}";
    var UpdateTva                 = "{{url('updateTva')}}";
    var DeleteTva                 = "{{url('DeleteTva')}}";
</script>
<div class="card">
    
<div class="content">
    <div class="page-header">
        
        <div class="page-btn">
            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalAddTva">
                <i class="fa-solid fa-plus"></i> Add TVA
            </a>
        </div>	
        
    </div>
    
    <!-- TVA list -->
    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
            
            
            <div class="card-body p-0">
                <div class="table-responsive">
                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer table-responsive ">
                        <table class="table datatable dataTable no-footer TableTvas" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Value</th>
                                    <th scope="col">créer par</th>
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
    
    
    <!-- Add TVA Modal -->
    <div class="modal fade" id="ModalAddTva" tabindex="-1" aria-labelledby="ModalAddTvaLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalAddTvaLabel">Add New TVA</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <ul class="validationAddTva"></ul>
                        <form action="{{ url('addTva') }}" id="FormAddTva">
                            {{-- @csrf --}}
                    
                            <!-- Name & Value -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>TVA Name</label>
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                    
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>TVA Value (%)</label>
                                        <input type="number" name="value" step="0.01" class="form-control @error('value') is-invalid @enderror" value="{{ old('value') }}">
                                        @error('value')
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
                    <button type="button" class="btn btn-primary" id="BtnAddTva">Sauvegarder</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit TVA Modal -->
    <div class="modal fade" id="ModalEditTva" tabindex="-1" aria-labelledby="ModalEditTvaLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalEditTvaLabel">Edit TVA</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <ul class="validationEditTva"></ul>
                        <form action="{{ url('updateTva') }}" id="FormUpdateTva">
                            {{-- @csrf --}}
                            
                            <!-- Name & Value -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>TVA Name</label>
                                        <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                    
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>TVA Value (%)</label>
                                        <input type="number" id="value" name="value" step="0.01" class="form-control @error('value') is-invalid @enderror" value="{{ old('value') }}">
                                        @error('value')
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
                    <button type="button" class="btn btn-primary" id="BtnUpdateTva">Sauvegarder</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection