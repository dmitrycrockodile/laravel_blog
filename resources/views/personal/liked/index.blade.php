@extends('personal.layouts.main')
@section('content')

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Liked posts</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('personal.main') }}">Main Page</a></li>
            <li class="breadcrumb-item active">Liked posts</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
      <div class="col-6 pt-3">
        <div class="card">
          <div class="card-header">
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Acts</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($posts as $post)
                  <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td class="text-left">
                      <a href="{{ route('post.show', $post->id) }}" class="pr-3">
                        <i class="far fa-eye"></i>
                      </a>
                      <form action="{{ route('personal.liked.delete', $post->id) }}" method="POST" class="d-inline">
                      @csrf
                      @method('DELETE')
                        <button type="submit" class="border-0 bg-transparent">
                          <i class="fas fa-solid fa-trash text-danger"></i>
                        </button>
                      </form>
                    </td>
                  </tr>
                @endforeach
                <tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection