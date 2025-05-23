<!doctype html>
<html lang="es" class="height-full">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Configuration | Biblioteca B</title>
    <link rel="stylesheet" href="../css/utilities.css">
    <link rel="stylesheet" href="../css/layouts/_base.css">
    <link rel="stylesheet" href="../css/components/_button.css">
    <link rel="stylesheet" href="../css/components/_footer.css">
    <link rel="stylesheet" href="../css/components/_form.css">
    <link rel="stylesheet" href="../css/components/_table.css">
    <link rel="stylesheet" href="../css/components/_header.css">
    <link rel="stylesheet" href="../css/components/_input.css">
    <link rel="stylesheet" href="../css/components/_top-bar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>

<body class="h-100 d-flex flex-column">
    <x-top-bar relativePath="../"></x-top-bar>
    <x-header-auth></x-header-auth>
    <main class="flex__grow-2 ">
        <div class="row m-0">
            <div class="col-12 p-0">
                <article class="form">
                    <div class="flex-full__justify-content-between p-0">
                        <div>
                            <h1><b>Libros</b></h1>
                        </div>
                        <div>
                            <a href="{{ route('employee.book.create') }}">
                                <button class="button button--color-blue">
                                    Agregar libro
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="">
                        <hr>
                        @if (session('alert-success'))
                            <div class="alert alert-success">
                                {{ session('alert-success') }}
                            </div>
                        @endif
                         
                        <section class='table'>
                            <table class='dataTable'>
                                <thead>
                                    <tr>
                                        <th>Titulo</th>
                                        <th>
                                            Sub Titulo
                                        </th>
                                        <th>Traduccion</th>
                                        <th>Autor</th>
                                        <th>Editorial</th>
                                        <th> Año de publicación </th>
                                        <th>ISBN</th>
                                        <th>
                                            Operaciones
                                        </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @if ($data_books->items() == [])
                                        <p>No hay empleados registrados por los momentos.</p>
                                    @else
                                        @foreach ($data_books->items() as $value)
                                            <tr class='show'>
                                                <td>{{ $value->title }}</td>
                                                 <td>{{ $value->sub_title }}</td>
                                                <td>
                                                   {{ $value->translator }}
                                                </td>
                                                 <td>
                                                   {{ $value->author->author }}
                                                </td>
                                                 <td>
                                                   {{ $value->editorial->editorial }}
                                                </td>
                                                <td>
                                                    {{ $value->publication_date }}
                                                </td>
                                                <td>
                                                    {{ $value->ISBN }}
                                                </td>
                                                <td class='operations'>
                                                    <a href="{{ route('admin.employee.delete', $value->slug ?? '') }}">
                                                        <button class='button button--color-red'>
                                                            <i class='bi bi-trash'></i>
                                                        </button>
                                                    </a>
                                                    <a href='{{ route('book.edit', $value->slug ?? '') }}'>
                                                        <button class="button button--color-orange">
                                                            <i class='bi bi-person-lines-fill'></i>
                                                        </button>
                                                    </a>
                                                     <a href="{{ route('copie.book.index', $value->slug) }}">
                                                <button type="button" class="button button--color-orange">
                                                    <i class="bi bi-journals"></i>
                                                </button>
                                            </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif

                                </tbody>
                            </table>
                        </section>
                        <div>

                        </div>
                        <div class="flex-full__justify-content-between">
                            <div>
                                <p>

                                </p>
                            </div>
                            <div>

                            </div>
                        </div>

                    </div>
                </article>
            </div>
        </div>
    </main>


    <x-footer></x-footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
        crossorigin="anonymous"></script>
</body>

</html>