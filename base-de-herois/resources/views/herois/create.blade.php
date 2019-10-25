@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <div class="alert alert-danger">
                @foreach ($errors->all() as $erro)
                <p>{{$erro}}</p>
                @endforeach
            </div>
            
            <div class="card">
                <div class="card-header">Novo Herói</div>

                <div class="card-body">
                       <form action ="{{ route('herois.salva-novo')}}" method="post" enctype="multipart/form-data">
                       @csrf
                       
                       <p>Nome:</p>
                       <input type="text" name="nome">     

                       <p>Identidade Secreta:</p>
                       <input type="text" name="identidade_secreta">     

                       <p>Origem:</p>
                       <input type="text" name="origem">     

                       <p>Força:</p>
                       <select name="forca" id="forca">     
                           <option value="forte">Forte!</option>
                           <option value="media">Média.</option>
                           <option value="fraca">Fraca...</option>
                       </select>

                       <p>Terráqueo?</p>
                       <input type="checkbox" name="terraqueo">     

                       <p>Pode voar?</p>
                       <input type="checkbox" name="podevoar">     

                       <p>Foto:</p>
                       <input type="file" name="foto" id="foto">     


                       <input type="submit" value="salvar!">                                               
                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
