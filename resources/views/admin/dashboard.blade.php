@extends('layouts.admin')

@section('admin-content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <h1>Dashboard</h1>
  </div>
</section>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>{{$info->count()}}</h3>
            <p>Informasi TBC</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="#" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>{{$artikel->count()}}</h3>
            <p>Artikel</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="#" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3>{{$kegiatan->count()}}</h3>
            <p>Kegiatan</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="{{route('admin.kegiatan')}}" class="small-box-footer">Selengkapnya <i
              class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
    </div>
    <!-- /.row -->

    <!-- Main row -->
    <div class="row">
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>

            <p class="card-text">
              Some quick example text to build on the card title and make up the bulk of the card's
              content.
            </p>

            <a href="#" class="card-link">Card link</a>
            <a href="#" class="card-link">Another link</a>
          </div>
        </div>

        <div class="card card-primary card-outline">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>

            <p class="card-text">
              Some quick example text to build on the card title and make up the bulk of the card's
              content.
            </p>
            <a href="#" class="card-link">Card link</a>
            <a href="#" class="card-link">Another link</a>
          </div>
        </div><!-- /.card -->
      </div>
      <!-- /.col-md-6 -->
      <div class="col-lg-6">
        <div class="card">
          <div class="card-header">
            <h5 class="m-0">Featured</h5>
          </div>
          <div class="card-body">
            <h6 class="card-title">Special title treatment</h6>

            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>

        <div class="card card-primary card-outline">
          <div class="card-header">
            <h5 class="m-0">Featured</h5>
          </div>
          <div class="card-body">
            <h6 class="card-title">Special title treatment</h6>

            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
      </div>
      <!-- /.col-md-6 -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection
