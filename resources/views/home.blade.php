@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Panel Administrativo</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   <p>

                     <span id="products-total">{{ $products->total() }}</span> registros |
                     página {{ $products->currentPage() }}
                     de {{ $products->lastPage() }}
                   </p>

                   <div id="alert" class="alert alert-info">

                   </div> 

                   <table class="table table-hover table-striped">

                     <thead>
                         <tr>
                             <th width="20px">ID</th>
                             <th>Nombre del Producto</th>
                             <th>&nbsp;</th>

                         </tr>

                     </thead>
                     <tbody>

                        @foreach($products as $item)

                          <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>
                             

                    <button onclick='mostrar(<?php echo $item->id; ?>)'>BOTON</button>   


                            {!! Form::open(['route' => ['destroyProduct', $item->id], 'method' => 'DELETE']) !!}   

                            <a href="#" class="btn-delete">Eliminar</a>


                            {!! Form::close() !!}



                            </td>
                         </tr>   


                        @endforeach

                     </tbody>   

                   </table>  

                   {!! $products->render() !!}


                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

<script src="{{ asset('js/script.js') }}" defer></script>

@endsection
