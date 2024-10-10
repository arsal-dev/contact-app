<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
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
        <div class="card p-5">
            <h3>Register</h3>
            <form action="{{ route('register.post') }}" method="POST" class="mt-3">
                @csrf
                <div>
                    <label for="name">Name</label>
                    <input type="name" id="name" name="name" value="{{ old('name') }}"
                        class="form-control @error('name') is-invalid @enderror">
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}"
                        class="form-control @error('email') is-invalid @enderror">
                    @error('email')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password"
                        class="form-control @error('name') is-invalid @enderror">
                    @error('password')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="cpassword">Confirm Password</label>
                    <input type="password" id="cpassword" name="confirm-password"
                        class="form-control @error('name') is-invalid @enderror">
                    @error('confirm-password')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <p>Already have and account? <a href="{{ route('login') }}">Login</a></p>
                <input type="submit" class="btn btn-primary mt-3" value="register">
            </form>
        </div>
    </div>

</body>

</html>
