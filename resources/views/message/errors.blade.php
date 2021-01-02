@if(count($errors) > 0)
@foreach ($errors->all() as $error)
    <div class>
        {{$error}}
    </div>
@endforeach
@endif

@if(session('error')){
   <div>
       {{session('error')}}
   </div> 
}
@endif