@extends('personal.layouts.main')
@section('content')

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Edit comment</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('personal.main') }}">Main Page</a></li>
            <li class="breadcrumb-item"><a href="{{ route('personal.comment.index') }}">Comments</a></li>
            <li class="breadcrumb-item active">Edit</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <form action="{{ route('personal.comment.update', $comment->id) }}" method="POST" class="w-50 d-flex flex-wrap">
          @csrf
          @method('PATCH')
            <div class="form-group">
              <textarea name="message" cols="30" wrap="soft">{{ $comment->message }}</textarea>
              @error('message')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <input type="submit" class="btn btn-primary ml-2 h-100" value="Edit">
          </form>
        </div>
      </div>
      <a href="{{ route('personal.comment.index') }}" class="btn btn-primary col-2">Go Back</a>
    </div>
  </section>
</div>
@endsection