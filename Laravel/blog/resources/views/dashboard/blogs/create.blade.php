@extends('dashboard.layouts')

@section('content')
    <h3>add blog</h3>
    <div class="container">
        <div class="card p-5">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            <form action="{{ route('blog.add') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="title">title</label>
                    <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}">
                </div>
                @error('title')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <div>
                    <label for="excerpt">excerpt</label>
                    <input type="text" id="excerpt" name="excerpt" class="form-control" value="{{ old('excerpt') }}">
                </div>
                @error('excerpt')
                    <p class="text-danger">{{ $message }}</p>
                @enderror

                <div>
                    <label for="category">category</label>
                    <select name="category" name="category" id="category" class="form-control">
                        <option value="">Select</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach
                    </select>
                </div>
                @error('category')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <div>
                    <label for="body">body</label>
                    <textarea name="body" id="body" class="form-control" cols="30" rows="10">{{ old('body') }}</textarea>
                </div>
                @error('body')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <div>
                    <label for="thumbnail">thumbnail</label>
                    <input type="file" id="thumbnail" name="thumbnail" class="form-control"
                        value="{{ old('thumbnail') }}">
                </div>
                @error('thumbnail')
                    <p class="text-danger">{{ $message }}</p>
                @enderror

                <input type="submit" value="add" class="btn btn-primary mt-3">
            </form>
        </div>
    </div>
@endsection
