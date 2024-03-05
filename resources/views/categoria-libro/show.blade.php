@extends('layouts.app')

@section('template_title')
    {{ $categoriaLibro->name ?? "{{ __('Show') Categoria Libro" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Categoria Libro</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('categoria-libros.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Categoria Id:</strong>
                            {{ $categoriaLibro->categoria_id }}
                        </div>
                        <div class="form-group">
                            <strong>Libro Id:</strong>
                            {{ $categoriaLibro->libro_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
