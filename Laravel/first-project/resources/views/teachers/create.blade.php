<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Teacher</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</head>

<body>

    <div class="container mt-5">
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        <h3>create teacher</h3>
        <form action="{{ route('create.upload') }}" method="POST">
            @csrf
            <div>
                <label for="name">Name</label>
                <input type="text" id="name" name="name"
                    class="form-control   @error('name') is-invalid @enderror" placeholder="Enter Name"
                    value="{{ old('name') }}">
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="email">Email</label>
                <input type="email" id="email" name="email"
                    class="form-control @error('email') is-invalid @enderror" placeholder="Enter email"
                    value="{{ old('email') }}">
                @error('email')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="address">Address</label>
                <input type="text" id="address" name="address"
                    class="form-control @error('address') is-invalid @enderror" placeholder="Enter address"
                    value="{{ old('address') }}">
                @error('address')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="phone">phone</label>
                <input type="text" id="phone" name="phone"
                    class="form-control @error('phone') is-invalid @enderror" placeholder="Enter phone"
                    value="{{ old('phone') }}">
                @error('phone')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <input type="submit" class="btn btn-primary mt-3">
        </form>

        <table class="table mt-5">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Address</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($teachers as $teacher)
                    <tr>
                        <th>{{ $teacher->name }}</th>
                        <th>{{ $teacher->email }}</th>
                        <th>{{ $teacher->address }}</th>
                        <th>{{ $teacher->phone }}</th>
                        <th><a href="{{ route('teacher.edit', $teacher->id) }}" class="btn btn-primary">Edit</a></th>
                        <th>
                            <form action="{{ route('teacher.delete', $teacher->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <input type="submit" class="btn btn-danger" value="Delete">
                            </form>
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>

</html>
