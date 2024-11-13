 <!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Notícias</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Notícias</h1>
        <p class="lead">Bem-vindo à página de notícias</p>
        
        {{-- Exemplo de listagem de notícias --}}
        <div class="mt-4">
            @if(isset($noticias) && count($noticias) > 0)
                <ul class="list-group">
                    @foreach($noticias as $noticia)
                        <li class="list-group-item">
                            <h3>{{ $noticia->titulo }}</h3>
                            <p>{{ $noticia->descricao }}</p>
                            <p><strong>Publicado em:</strong> {{ $noticia->created_at->format('d/m/Y') }}</p>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-muted">Não há notícias disponíveis no momento.</p>
            @endif
        </div>
    </div>
</body>
</html>