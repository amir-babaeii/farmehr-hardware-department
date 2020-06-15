@extends('layouts.app')

@section('content')
<style>
main{
     background-image: url("/img/back1.jpg");
    
 }
</style>
<div class="px-4 ">
    <div class="row">
        <div class="col-lg-9">
            <div class="card" >
                @yield('body')
            </div>
        </div>
        @include('layouts.nav')
    </div>
    
</div>
@endsection
