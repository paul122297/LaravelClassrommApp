@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Menu</div>
                    <div class="card-body">
                            <div class="list-group">
                                    <a href="{{route('accounts')}}" class="list-group-item list-group-item-action">Accounts</a>
                                    <a href="{{route('documents')}}" class="list-group-item list-group-item-action">Documents</a>
                            </div>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
