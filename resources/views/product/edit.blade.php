@extends('adminlte::page')

@section('title', 'dashboard')

@section('content_header')
    <h1>Konecta</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <label class="h3 my-auto">
                Edición de producto
            </label>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.update', $product->id)}}" id="create_product" method="POST">
                @csrf
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="name_product">Nombre de producto</label>
                        <input type="text" required="true" name="name_product" class="form-control" value="{{ $product->name_product }}"
                               placeholder="Ingrese el Nombre de producto">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="reference">Referencia</label>
                        <input type="text" name="reference" class="form-control" value="{{ $product->reference }}" placeholder="Ingrese la Referencia">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="price">Precio del producto</label>
                        <input type="number" required="true" name="price" class="form-control" value="{{ $product->price }}"
                               placeholder="Ingrese el Precio del producto">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="weight">Peso del producto</label>
                        <input type="number" name="weight" class="form-control" value="{{ $product->weight }}"
                               placeholder="Ingrese el Peso del producto">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="category">Categoría</label>
                        <input type="text" required="true" name="category" class="form-control" value="{{ $product->category }}"
                               placeholder="Ingrese la Categoría del producto">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="stock">Stock del producto</label>
                        <input type="number" required="true" name="stock" class="form-control" value="{{ $product->stock }}"
                               placeholder="Ingrese el Stock del producto">
                    </div>
                </div>

                <div class="p-4" style="text-align: center;">
                    <button type="submit" class="btn btn-primary" data-toggle="modal" title="Editar">
                        <i class="fa fa-save"></i> Editar
                    </button>
                </div>
            </form>
        </div>
    </div>
    </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
