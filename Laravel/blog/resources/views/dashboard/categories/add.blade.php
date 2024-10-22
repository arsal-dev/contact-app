@extends('dashboard.layouts')

@section('content')
    <h3>add category</h3>
    <div class="container">
        <div class="card p-5">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            <form action="{{ route('category.add') }}" method="POST">
                @csrf
                <div>
                    <label for="title">title</label>
                    <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}">
                </div>
                @error('title')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <div>
                    <label for="description">description</label>
                    <input type="text" id="description" name="description" class="form-control"
                        value="{{ old('description') }}">
                </div>
                @error('description')
                    <p class="text-danger">{{ $message }}</p>
                @enderror

                <input type="submit" value="add" class="btn btn-primary mt-3">
            </form>
        </div>
    </div>
@endsection
