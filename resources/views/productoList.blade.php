@extends('layout')
@section('content')
            <!--inicio content-->
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Listado Producto</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Inicio</a></li>
                            <li class="breadcrumb-item active">Listado Producto</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                            <a class='btn btn-primary btn-icon-split' href="{{route('producto')}}"> Create Producto</a>
                           
                            <table class="table">
                            <thead class="thead-light">
                                <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            @foreach ($productos as $item)
                            <tbody>
                                
                                <tr>
                                <td>{{ $item->Id }}</td>
                                <td>{{ $item->Name }}</td>
                                <td>{{ $item->Price }}</td>
                                <td>
                                    <a href="{{route('productolist.editar', $item->Id)}}" class="btn btn-primary btn-icon-split">
                                    <i class="fa fa-edit"></i>
                                    </a>
                                    @if($item->State == 1)
                                    <a href="{{route('productolist.destroy', $item->Id)}}" class="btn btn-danger btn-icon-split">
                                    <i class="fa fa-window-close"></i>
                                    </a> 
                                    @else

                                    <a href="{{route('productolist.destroy', $item->Id)}}" class="btn btn-success btn-icon-split">
                                        <i class="fa fa-eye"></i>
                                        </a> 
                                    @endif
                                </td>
                                </tr>
                                @endforeach
                            </tbody>
                            </table>
                            <div> {{ $productos->links() }}   </div>
                            </div>
                        </div>
                    </div>
                </main>
                @endsection