@extends('layouts.app')

@section('title')
    Admin Area
@endsection

@section('content')
    
    <form id="usersForm">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Poster</th>
            <th scope="col">Moderator</th>
            <th scope="col">Admin</th>
        </tr>
        </thead>
            <tbody>
            @foreach($users->sortBy('id') as $user)       
                <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td><input id="chkP{{$user->id}}" type="checkbox" onclick="roleChanged({{$user->id}})" @if($user->roles->contains("role", "poster")) checked @endif></td>
                    <td><input id="chkM{{$user->id}}" type="checkbox" onclick="roleChanged({{$user->id}})" @if($user->roles->contains("role", "moderator")) checked @endif></td>
                    <td><input id="chkA{{$user->id}}" type="checkbox" onclick="roleChanged({{$user->id}})" @if($user->roles->contains("role", "admin")) checked @endif></td>
                </tr>    
            @endforeach
        </tbody>
    </table>
    </form>
    <script type="application/javascript">

        var current_id = null
    
        function roleChanged(id){     
            current_id = id
            $("#usersForm").submit();
        }
    
        $(document).ready(function(){
            $("#usersForm").submit(function(e) {
                if(current_id == null){
                    return false;
                }
                e.preventDefault();
                e.stopImmediatePropagation();
                
                let chkP = document.getElementById('chkP'+current_id).checked
                let chkM = document.getElementById('chkM'+current_id).checked
                let chkA = document.getElementById('chkA'+current_id).checked
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    method:"POST",
                    url:"{{route('admin.roleChange')}}",      
                    data: {
                        user_id:current_id,
                        chkP:chkP,
                        chkM:chkM,
                        chkA:chkA
                    },
                    success: function(){
                        current_id = null;
                    }
                });
            });
        });
        
        </script> 
@endsection

