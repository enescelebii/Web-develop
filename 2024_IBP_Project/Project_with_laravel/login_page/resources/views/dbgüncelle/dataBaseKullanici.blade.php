<!DOCTYPE html>
<html>
<head>
    <title>Data Table</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Kullanıcı Tablosu</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                   
                    <th>ID</th>
                    <th>Userame</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Yetki Düzeyi</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach($veri as $item)
                <tr>
                    
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->username }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->password }}</td>
                    <td>{{ $item->yetki_duzeyi }}</td>
                    <td>
                            <a href="{{ route('admin.users.edit', $item->id) }}" class="btn btn-primary">Düzenle</a>
                          
                    </td>
                    <td>
                        <form action="{{ route('admin.users.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Bu kullanıcıyı silmek istediğinize emin misiniz?')">Sil</button>
                        </form>
                    </td>
                  
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>