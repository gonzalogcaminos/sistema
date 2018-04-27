@extends('principal')
@section('contenido')

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

@endsection()        