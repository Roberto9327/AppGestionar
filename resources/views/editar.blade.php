@extends('layout')
@section('content')
            <!--inicio content-->
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Formulario Editar</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Inicio</a></li>
                            <li class="breadcrumb-item active">Formulario Editar Producto</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                            <form method="POST" action="{{ route('productolist.update', $productos->Id) }}">
                            @method('PUT')
                            @csrf
                            <!--<form >-->
                                <div class="form-group row">
                                    <label for="inputCodigo3" class="col-sm-2 col-form-label">Codigo</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" value='{{ $productos->Name }}' name="inputNombre3"  placeholder="Nombre">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputNombre3" class="col-sm-2 col-form-label">Precio</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" value='{{ $productos->Price }}' name="inputPrecio3"  placeholder="Precio">
                                    </div>
                                </div>
                            
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                    <button type="submit" class="btn btn-success btn-icon-split">Update</button>
                                    <a  class="btn btn-danger btn-icon-split" href="{{route('productolist.index')}}">Cancel</a>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </main>
                @endsection