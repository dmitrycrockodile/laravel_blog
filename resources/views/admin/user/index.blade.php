@extends('admin.layouts.main')
@section('content')

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Users</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.main') }}">Main Page</a></li>
            <li class="breadcrumb-item active">Users</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-1">
          <a href="{{ route('admin.user.create') }}" class="btn btn-block btn-primary mb-3">Add</a>
        </div>
      </div>
      <div class="row">
      <div class="col-5 pt-3">
        <div class="card">
          <div class="card-header">
          <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Acts</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($users as $user)
                <tr>
                  <td>{{ $user->id }}</td>
                  <td>{{ $user->name }}</td>
                  <td class="text-left">
                    <a href="{{ route('admin.user.show', $user->id) }}" class="pr-3">
                      <i class="far fa-eye"></i>
                    </a>
                    <a href="{{ route('admin.user.edit', $user->id) }}" class="text-success pr-3">
                      <i class="fas fa-solid fa-pen"></i>
                    </a>
                    <form action="{{ route('admin.user.delete', $user->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                      <button type="submit" class="border-0 bg-transparent">
                        <i class="fas fa-solid fa-trash text-danger"></i>
                      </button>
                    </form>
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection