@extends('admin.layouts.main')
@section('content')

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6 d-flex align-items-center">
          <h1 class="m-0 mr-3">{{ $category->title }}</h1>
          <a href="{{ route('admin.category.edit', $category->id) }}" class="text-success mr-2">
            <i class="fas fa-solid fa-pen"></i>
          </a>
          <form action="{{ route('admin.category.delete', $category->id) }}" method="POST" class="d-inline">
          @csrf
          @method('DELETE')
            <button type="submit" class="border-0 bg-transparent">
              <i class="fas fa-solid fa-trash text-danger"></i>
            </button>
          </form>
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
      <div class="col-4 pt-3">
        <div class="card">
          <div class="card-header">
          <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
              <tbody>
                <tr>
                  <th>ID</th>
                  <td>{{ $category->id }}</td>
                </tr>
                <tr>
                  <th>Title</th>
                  <td>{{ $category->title }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <a href="{{ route('admin.category.index') }}" class="btn btn-primary col-3">Go Back</a>
    </div>
  </section>
</div>
@endsection