@extends('admin.layouts.main')
@section('content')

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Edit tag: {{ $tag->title }}</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.main') }}">Main Page</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('admin.tag.index') }}">Tags</a></li>
            <li class="breadcrumb-item active">Edit: {{ $tag->title }}</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <form action="{{ route('admin.tag.update', $tag->id) }}" method="POST" class="w-50 d-flex mb-4" style="height: 38px">
          @csrf
          @method('PATCH')
            <div class="form-group">
              <input type="text" class="form-control" name="title" value={{$tag->title}} placeholder="Enter new title">
              @error('title')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <input type="submit" class="btn btn-primary ml-2" value="Edit">
          </form>
        </div>
      </div>
      <a href="{{ route('admin.tag.index') }}" class="btn btn-primary col-2">Go Back</a>
    </div>
  </section>
</div>
@endsection