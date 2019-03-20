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
                        <div class="card-body row">
                            <label class="col-md-2"><b>Rate</b></label> <p class="col-md-8">{{$item->grade}}</p>
                        </div>
                    </div>
                    @endif
                    <div class="card">
                            <div class="card-body row">
                                <label class="col-md-2"><b>Filename</b></label> <p class="col-md-8">{{$item->filename}} </p>
                            </div>
                    </div>
                    <div class="card">
                            <div class="card-body row">
                                <label class="col-md-2"><b>Notes</b></label> <p class="col-md-10">{{$item->notes}} </p>
                            </div>
                    </div>
                    <div class="card">
                            <div class="card-body row">
                                <label class="col-md-3"><b>Submitted on</b></label> {{$item->created_at}} 
                            </div>
                    </div>       
                </div>
            </div>


        </div>
    </div>
</div>



@endsection

