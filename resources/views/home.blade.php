@extends('adminlte::page')

@section('title', 'dashboard')

@section('content_header')
    <h1>Konecta</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <label class="h3 my-auto">
                Listado de productos
            </label>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('admin.create') }}">Registrar Producto</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">id producto</th>
                        <th scope="col">Nombre producto</th>
                        <th scope="col">Referencia</th>
                        <th scope="col">Categoría</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <th scope="row">{{$product->id}}</th>
                            <td>{{$product->name_product}}</td>
                            <td>{{$product->reference}}</td>
                            <td>{{$product->category}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->stock}}</td>
                            <td>
                                <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                    <a href="{{ route('admin.edit', $product->id) }}" type="button"
                                       class="btn btn-primary">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="{{ route('admin.delete', $product->id) }}" type="button"
                                       class="btn btn-danger">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
