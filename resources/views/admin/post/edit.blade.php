@extends('admin.layouts.main')
@section('content')

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Edit post: {{ $post->title }}</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.main') }}">Main Page</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.post.index') }}">Posts</a></li>
            <li class="breadcrumb-item active">Edit: {{ $post->title }}</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <form action="{{ route('admin.post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PATCH')
            <div class="form-group w-25">
              <input type="text" class="form-control" name="title" placeholder="Enter title" value={{ old('title') ?? $post->title }}>
              @error('title')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group w-50">
              <textarea id="summernote" name="content">
                {{ old('content') ?? $post->content }}
              </textarea>
              @error('content')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group w-50">
              <label>Change preview</label>
              <div class="w-25 mb-2">
                <img src="{{asset('storage/' . $post->preview_image)}}" alt="Preview image" class="w-50" />
              </div>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" name="preview_image">
                  <label class="custom-file-label">Choose image</label>
                </div>
                <div class="input-group-append">
                  <span class="input-group-text">Upload</span>
                </div>
              </div>
              @error('preview_image')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group w-50">
              <label>Change main image</label>
              <div class="w-50 mb-2">
                <img src="{{url('storage/' . $post->main_image)}}" alt="Main image" class="w-50" />
              </div>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" name="main_image">
                  <label class="custom-file-label">Choose image</label>
                </div>
                <div class="input-group-append">
                  <span class="input-group-text">Upload</span>
                </div>
              </div>
              @error('main_image')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group w-25">
              <label>Select Category</label>
              <select class="form-control" name="category_id">
                @foreach ($categories as $category)
                  <option 
                    value="{{$category->id}}"
                    {{$category->id == (old('category_id') ?? $post->category_id) ? ' selected' : ''}}
                  >{{$category->title}}</option>
                @endforeach
              </select>
              @error('category_id')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group w-50">
                <label>Select tags</label>
                <select class="select2" name="tag_ids[]" multiple data-placeholder="Select a Tag" style="width: 100%;">
                  @foreach ($tags as $tag)
                    <option 
                      value="{{$tag->id}}"
                      {{ is_array($post->tags->pluck('id')->toArray()) && in_array($tag->id, $post->tags->pluck('id')->toArray()) ? ' selected' : '' }}  
                    >{{$tag->title}}</option>
                  @endforeach
                </select>
                @error('tag_ids')
                  <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>

            <div class="form-group">
              <input type="submit" class="btn btn-primary" value="Edit">
            </div>
          </form>
        </div>
      </div>
      <a href="{{ route('admin.post.index') }}" class="btn btn-primary col-2 mb-2">Go Back</a>
    </div>
  </section>
</div>
@endsection