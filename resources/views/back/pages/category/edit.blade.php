@extends('back.inc.master')
@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    @endsection
@section('content')

  <div class="card shadow mb-4">
    <div class="card-header">
      <i class="fas fa-align-center"></i>
      Categories
    </div>
    <div class="card-body">
        <form action="{{ route('admin.category.update',$category) }}" method="post" id="editForm" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label>Category Name</label>
                    <input type="text" class="form-control"  name="name" value="{{ $category->name }}">
                </div>

                <div class="row no-gutters">
                    <div class="col">
                            <label>Image</label><br>
                            <div class="row">
                                <div class="col-md-4 col-12">
                                    <div class="card bg-light shadow">
                                        <div class="card-body">
                                            <div class="clearfix">
                                                <div class="float-left">
                                                    <a href="{{ asset('uploads/'.$category->img) }}" download>
                                                        <img class="productImage" src="{{ asset('uploads/'.$category->img) }}" alt="Forest">

                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>

                <div class="form-group mt-3">
                    <label>New Image</label><br>
                    <input type="file" name="image" >
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
  </div>
  @endsection

