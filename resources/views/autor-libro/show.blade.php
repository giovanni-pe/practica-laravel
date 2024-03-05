@extends('layouts.app')

@section('template_title')
    {{ $autorLibro->name ?? "{{ __('Show') Autor Libro" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Autor Libro</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('autor-libro.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Autor Id:</strong>
                            {{ $autorLibro->autor_id }}
                        </div>
                        <div class="form-group">
                            <strong>Libro Id:</strong>
                            {{ $autorLibro->libro_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
