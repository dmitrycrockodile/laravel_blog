@extends('admin.layouts.main')
@section('content')

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6 d-flex align-items-center">
          <h1 class="m-0 mr-3">{{ $user->name }}</h1>
          <a href="{{ route('admin.user.edit', $user->id) }}" class="text-success mr-2">
            <i class="fas fa-solid fa-pen"></i>
          </a>
          <form action="{{ route('admin.user.delete', $user->id) }}" method="POST" class="d-inline">
          @csrf
          @method('DELETE')
            <button type="submit" class="border-0 bg-transparent">
              <i class="fas fa-solid fa-trash text-danger"></i>
            </button>
          </form>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.main') }}">Main Page</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">Users</a></li>
            <li class="breadcrumb-item active">{{ $user->name }}</li>
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
                  <td>{{ $user->id }}</td>
                </tr>
                <tr>
                  <th>Name</th>
                  <td>{{ $user->name }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <a href="{{ route('admin.user.index') }}" class="btn btn-primary col-5">Go Back</a>
    </div>
  </section>
</div>
@endsection