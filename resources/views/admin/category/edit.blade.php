@extends('admin.layouts.main')
@section('content')

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Edit category: {{ $category->title }}</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard v1</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <form action="{{ route('admin.category.update', $category->id) }}" method="POST" class="w-50 d-flex mb-4" style="height: 38px">
          @csrf
          @method('PATCH')
            <div class="form-group">
              <input type="text" class="form-control" name="title" value={{$category->title}} placeholder="Enter new title">
              @error('title')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <input type="submit" class="btn btn-primary ml-2" value="Edit">
          </form>
        </div>
      </div>
      <a href="{{ route('admin.category.index') }}" class="btn btn-primary col-2">Go Back</a>
    </div>
  </section>
</div>
@endsection