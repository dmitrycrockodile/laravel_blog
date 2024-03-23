@extends('admin.layouts.main')
@section('content')

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Edit user: {{ $user->name }}</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.main') }}">Main Page</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">Users</a></li>
            <li class="breadcrumb-item active">Edit: {{ $user->name }}</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <form action="{{ route('admin.user.update', $user->id) }}" method="POST" class="w-25">
          @csrf
          @method('PATCH')
            <div class="form-group">
              <input type="text" class="form-control" name="name" placeholder="Your new name" value={{old('name') ?? $user->name}}>
              @error('name')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
              <input type="email" class="form-control" name="email" placeholder="Your new email" value={{old('email') ?? $user->email}}>
              @error('email')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group w-50">
              <label>Select role</label>
              <select class="form-control" name="role">
                @foreach ($roles as $id => $value)
                  <option 
                    value="{{$id}}"
                    {{$id == (old('role') ?? $user->role) ? ' selected' : ''}}
                  >{{$value}}</option>
                @endforeach
              </select>
              @error('role')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            
            <div class="form-group">
              <input type="submit" class="btn btn-primary" value="Edit">
            </div>
          </form>
        </div>
      </div>
      <a href="{{ route('admin.user.index') }}" class="btn btn-primary col-2 mt-2">Go Back</a>
    </div>
  </section>
</div>
@endsection