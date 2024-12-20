@extends('layouts')

@section('content')
    <!-- Page Header-->
    <header class="masthead" style="background-image: url('assets/img/home-bg.jpg')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="site-heading">
                        <h1>{{ $search }}</h1>
                        <span class="subheading">A Blog Theme by Start Bootstrap</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main Content-->
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">

                <form action="{{ route('search') }}" method="POST" class="mb-5">
                    @csrf
                    <input type="search" name="query" value="{{ $search }}" placeholder="search blog"
                        class="form-control">
                </form>

                @foreach ($blogs as $blog)
                    <!-- Post preview-->
                    <div class="post-preview">
                        <img src="{{ asset("assets/thumbnails/$blog->thumbnail") }}" width="600px" class="img_fluid"
                            alt="">
                        <a href="{{ route('view.post', "$blog->title") }}">
                            <h2 class="post-title">{{ $blog->title }}</h2>
                            <h3 class="post-subtitle">{{ $blog->excerpt }}</h3>
                        </a>
                        <p class="post-meta">
                            Posted by
                            <a href="#!">{{ $blog->User->name }}</a>
                            on {{ $blog->created_at }}
                        </p>
                    </div>
                    <!-- Divider-->
                    <hr class="my-4" />
                @endforeach
                <!-- Pager-->
                <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="#!">Older
                        Posts →</a></div>
            </div>
        </div>
    </div>
@endsection
