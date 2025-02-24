@extends('layouts.invention')

@section('titulo', 'Inicio')

@section('contenido')
    @if(Auth::check())
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold">Hola, {{ Auth::user()->name }} 👋</h2>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger btn-lg">🚪 Salir</button>
            </form>
        </div>
    @endif

    <h1 class="text-success text-center fw-bold mb-4">📌 Panel Principal</h1>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="list-group text-center">
                    <a href="{{ route('panel.index', 'Estudiantes') }}" class="list-group-item list-group-item-action fs-4 py-3">
                        📚 Estudiantes
                    </a>
                    <a href="{{ route('panel.index', 'Profesores') }}" class="list-group-item list-group-item-action fs-4 py-3">
                        👨‍🏫 Profesores
                    </a>
                    <a href="{{ route('panel.index', 'Materias') }}" class="list-group-item list-group-item-action fs-4 py-3">
                        📖 Materias
                    </a>
                    <a href="{{ route('panel.index', 'Cursos') }}" class="list-group-item list-group-item-action fs-4 py-3">
                        🎓 Cursos
                    </a>
                    <a href="{{ route('panel.index', 'Comisiones') }}" class="list-group-item list-group-item-action fs-4 py-3">
                        📝 Asignacion
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
