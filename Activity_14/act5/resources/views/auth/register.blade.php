<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow-lg p-4" style="max-width: 500px; width: 100%;">
            <h2 class="card-title text-center mb-4 text-primary fw-bold">Create Account</h2>
    
            <form method="POST" action="{{ route('register') }}">
                @csrf
    
                <!-- Name -->
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input id="name" class="form-control" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
                    @error('name')
                        <div class="alert alert-danger py-1 px-2 mt-2 mb-0">{{ $message }}</div>
                    @enderror
                </div>
    
                <!-- Email Address -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autocomplete="username">
                    @error('email')
                        <div class="alert alert-danger py-1 px-2 mt-2 mb-0">{{ $message }}</div>
                    @enderror
                </div>
    
                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input id="password" class="form-control" type="password" name="password" required autocomplete="new-password">
                    @error('password')
                        <div class="alert alert-danger py-1 px-2 mt-2 mb-0">{{ $message }}</div>
                    @enderror
                </div>
    
                <!-- Confirm Password -->
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password">
                    @error('password_confirmation')
                        <div class="alert alert-danger py-1 px-2 mt-2 mb-0">{{ $message }}</div>
                    @enderror
                </div>
    
                <!-- Actions -->
                <div class="d-flex justify-content-between align-items-center mt-4">
                    <a class="small text-decoration-underline text-primary" href="{{ route('login') }}">
                        Already registered?
                    </a>
                    <button type="submit" class="btn btn-primary px-4 fw-semibold rounded-pill">
                        Register
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

