@extends('layouts.invention')

@section('titulo', $tipo)

@section('contenido')

@if ($errors->has('no_commission_asigned'))
    <div class="alert alert-danger">
        {{ $errors->first('no_commission_asigned')}}
    </div>
@endif

<h1 style="margin-bottom: 20px;">Editando {{ $tipo}}</h1>

<form action="{{ route('professors.update', $professor) }}" method="POST">
    @csrf
    @if(isset($professor))
        @method('PUT')
    @endif

    <div class="form-group">
        <label for="id">ID</label>
        <input type="text" name="id" class="form-control" value="{{ old('id', $professor->id ?? '') }}" disabled>
    </div>

    <div class="form-group">
        <label for="name">Nombre</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $professor->name ?? '') }}" required>
    </div>

    <div class="form-group">
        <label for="specialization">Especialización</label>
        <input type="text" name="specialization" class="form-control" value="{{ old('specialization', $professor->specialization ?? '') }}" required>
    </div>

    <div class="form-group">
        <label for="commissions">Asignar {{ $tablaRelacion }}</label>
        <div id="data-container">
            @foreach($professor->commissions as $commission)
                <div class="data-select-wrapper d-flex align-items-center justify-content-between mb-2">
                    <select name="commissions_id[]" class="form-control" required>
                        <option value="" disabled selected>Seleccionar {{ $tablaRelacion }}</option>
                        @foreach($commissions as $commissionOption)
                            <option value="{{ $commissionOption->id }}" 
                                {{ $commissionOption->id == $commission->id ? 'selected' : '' }}>
                                {{ $commissionOption->aula .' ('. $commissionOption->horario.')' }}
                            </option>
                        @endforeach
                    </select>
                    <button type="button" class="btn btn-danger btn-sm remove-data">Eliminar</button>
                </div>
            @endforeach
        </div>

        <button type="button" id="add-data" class="btn btn-secondary mt-2">Agregar otra comisión</button>
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>
</form>

<a href="{{ url()->previous() }}">
    <button class="btn btn-warning mt-2">Volver</button>
</a>

<a href="{{ route('logout') }}" 
   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
    <button class="btn btn-danger mt-3">Salir</button>
</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>

@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const dataContainer = document.getElementById('data-container');
        const addDataButton = document.getElementById('add-data');

        addDataButton.addEventListener('click', function () {
            const newDataWrapper = document.createElement('div');
            newDataWrapper.classList.add('data-select-wrapper', 'd-flex', 'align-items-center', 'justify-content-between', 'mb-2');

            newDataWrapper.innerHTML = `
                <select name="commissions_id[]" class="form-control" required>
                    <option value="" disabled selected>Seleccionar {{ $tablaRelacion }}</option>
                    @foreach($commissions as $commissionOption)
                        <option value="{{ $commissionOption->id }}">
                            {{ $commissionOption->aula }} ({{ $commissionOption->horario }})
                        </option>
                    @endforeach
                </select>
                <button type="button" class="btn btn-danger btn-sm remove-data">Eliminar</button>
            `;

            dataContainer.appendChild(newDataWrapper);
        });

        dataContainer.addEventListener('click', function (e) {
            if (e.target.classList.contains('remove-data')) {
                e.target.closest('.data-select-wrapper').remove();
            }
        });
    });
</script>
@endsection
