<!DOCTYPE html>
<html>
<head>
    <title>Kullanıcı Güncelle</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Kullanıcı Güncelle</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" name="username" value="{{ old('name', $user->name) }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password">
                <small class="form-text text-muted">Şifreyi değiştirmek istemiyorsanız boş bırakın.</small>
            </div>

            <div class="form-group">
                <label for="password2">Password Again:</label>
                <input type="password" class="form-control" id="password2" name="password2">
            </div>

            <button type="submit" class="btn btn-primary">Güncelle</button>
        </form>
    </div>
</body>
</html>