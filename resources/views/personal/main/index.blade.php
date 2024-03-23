@extends('personal.layouts.main')
@section('content')

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Main Page</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Main Page</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-6">
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{ $likedPostsCount }}</h3>

              <p>Posts that you like</p>
            </div>
            <div class="icon">
              <i class="nav-icon fas fa-regular fa-heart"></i>
            </div>
            <a href="{{ route('personal.liked.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <div class="small-box bg-success">
            <div class="inner">
              <h3>{{ $commentedPostsCount }}</h3>

              <p>Posts that you have commented</p>
            </div>
            <div class="icon">
              <i class="nav-icon fas fa-solid fa-comments"></i>
            </div>
            <a href="{{ route('personal.comment.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection