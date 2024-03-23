@extends('admin.layouts.main')
@section('content')

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Create Tag</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.main') }}">Main Page</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('admin.tag.index') }}">Tags</a></li>
            <li class="breadcrumb-item active">Create Tag</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <form action="{{ route('admin.tag.store') }}" method="POST" class="w-25">
          @csrf
            <div class="form-group">
              <input type="text" class="form-control" name="title" placeholder="Enter title">
              @error('title')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <input type="submit" class="btn btn-primary" value="Create">
          </form>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection