@extends('principal')
@section('contenido')
 @if(Auth::check())
        @if(Auth::user()->idrol==1)
            <template v-if="menu==0">
        
        </template>

        <template v-if="menu==1">
            <persona></persona>
        </template>

        <template v-if="menu==2">
        
            <h1><rol></rol></h1>
        
        </template>

        <template v-if="menu==3">
            <h1><user></user></h1>
        </template>         

    @elseif(Auth::user()->idrol==2)

        <template v-if="menu==1">
            <persona></persona>
        </template>
    @endif
@endif
    

  

@endsection()        