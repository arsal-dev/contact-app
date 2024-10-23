@extends('layouts')

@section('content')
    @php
        $thumbnail = $blog[0]->thumbnail;
    @endphp
    <!-- Page Header-->
    <header class="masthead" style="background-image: url({{ asset("assets/thumbnails/$thumbnail") }})">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="post-heading">
                        <h1>{{ $blog[0]->title }}</h1>
                        <h2 class="subheading">{{ $blog[0]->excerpt }}</h2>
                        <span class="meta">
                            Posted by
                            <a href="#!">{{ $blog[0]->User->name }}</a>
                            on {{ $blog[0]->created_at }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Post Content-->
    <article class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    {{ $blog[0]->body }}
                </div>
            </div>
        </div>
    </article>
@endsection
