@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                @include('inc.msg')
            <div class="card">
            <div class="card-header">
                    <a class="float-right btn btn-outline-danger btn-sm" href="{{route('home')}}">Back</a>
                Project Information of {{$item->user->name}}
            </div>
                <div class="card-body">
                    @if($item->grade)
                    <div class="card">
                        <div class="card-body">
                            <label class="col-md-2"><b>Rate</b></label> {{$item->grade}}
                        </div>
                    </div>
                    @endif
                    <div class="card">
                            <div class="card-body">
                                <label class="col-md-2"><b>Filename</b></label> {{$item->filename}} 
                            </div>
                    </div>
                    <div class="card">
                            <div class="card-body">
                                <label class="col-md-2"><b>Notes</b></label> {{$item->notes}} 
                            </div>
                    </div>
                    <div class="card">
                            <div class="card-body">
                                <label class="col-md-3"><b>Submitted on</b></label> {{$item->created_at}} 
                            </div>
                    </div>       
                </div>
            </div>


        </div>
    </div>
</div>



@endsection

