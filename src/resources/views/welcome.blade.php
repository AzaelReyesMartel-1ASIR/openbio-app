<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $user->name }} - OpenBio</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #0F111A; /* Fondo SAO */
            color: #F0F0F0;
            font-family: sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        .card {
            text-align: center;
            width: 100%;
            max-width: 400px;
            padding: 20px;
        }
        .avatar {
            width: 100px;
            height: 100px;
            background-color: #00B4D8; /* Azul SAO */
            border-radius: 50%;
            margin: 0 auto 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 40px;
            font-weight: bold;
        }
        h1 { margin-bottom: 5px; color: #fff; }
        p { color: #6272A4; margin-bottom: 30px; }

        .link-btn {
            display: block;
            background-color: #21252B;
            color: #fff;
            text-decoration: none;
            padding: 15px;
            margin-bottom: 10px;
            border-radius: 8px;
            border: 1px solid #333;
            transition: all 0.3s;
        }
        .link-btn:hover {
            background-color: #00B4D8; /* Hover Cyan */
            color: #000;
            transform: translateY(-2px);
            box-shadow: 0 0 15px rgba(0, 180, 216, 0.4);
        }

        .link-btn i {
            font-size: 1.5em;
            margin-right: 15px;
            vertical-align: middle;
            position: relative;
            top: -2px;
        }
    </style>
</head>
<body>

    <div class="card">
        <div class="avatar">
            @if($user->avatar)
                <img src="{{ asset('storage/' . $user->avatar) }}" alt="Avatar" style="width: 100%; height: 100%; object-fit: cover; border-radius: 50%;">
            @else
                {{ substr($user->name, 0, 1) }}
            @endif
        </div>

        <h1>{{ $user->name }}</h1>
        <p>{{ $user->email }}</p>

        <div class="links">
            @foreach($user->links as $link)
                <a href="{{ route('links.visit', $link) }}" target="_blank" class="link-btn">
                    @if($link->icon)
                        <i class="{{ $link->icon }}"></i>
                    @endif

                    {{ $link->title }} 🔗
                </a>
            @endforeach
        </div>
    </div>

</body>
</html>
