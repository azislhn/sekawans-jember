@extends('layouts.app')

@section('content')
<section class="container py-5 d-flex flex-column gap-4 align-items-center">
    <h1 class="fw-bold text-primary">Kegiatan</h1>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @foreach ($activities as $activity)
        <div class="col">
            <div class="card border h-100">
                <img src="{{ $activity->img }}" class="card-img-top thumbnail" alt="card-image">
                <div class="card-body">
                    <div class="mb-1 d-flex gap-3">
                        <div class="col-4 text-truncate" style="font-size: 14px;">
                            <i class="fa-solid fa-user"></i>
                            {{ $activity->user->name }}
                        </div>
                        <div class="px-2" style="font-size: 14px;">
                            <i class="fa-solid fa-calendar-days"></i>
                            {{ date('d M Y', strtotime($activity->updated_at)) }}
                        </div>
                    </div>
                    <div class="module line-clamp">
                        <h5>{{ $activity->title }}</h5>
                    </div>
                    <a href="{{ route('kegiatan.single', $activity) }}" class="link-primary text-underline">Baca
                        selengkapnya</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    {{ $activities->links() }}
</section>
@endsection