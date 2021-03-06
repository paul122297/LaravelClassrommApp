@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

                @include('inc.msg')

            <div class="card">
                <div class="card-header">Accounts
                        <a class="float-right btn btn-outline-primary btn-sm" href="{{route('account.create')}}">Create</a>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach($users as $user)
                        <li class="list-group-item row">
                           {{$user->name}}

                           <span class="float-right row">
                            <form method="post", onsubmit = 'return confirm("Are you sure you want to delete this post?")', action="{{ route('account.delete', ['id' => $user->id]) }}">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                            </form> 
                            @if(!$user->email_verified_at)
                            <form method="post" action="{{ route('account.activate', ['id' => $user->id]) }}">
                                @method('PATCH')
                                @csrf
                                <button type="submit" class="btn btn-outline-success btn-sm">Activate</button>
                            </form> 
                            @endif
                            <a class="btn btn-outline-primary btn-sm" href="{{route('account.edit', ['id' => $user->id])}}">Edit</a>
                           </span>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
