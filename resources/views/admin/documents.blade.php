@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Menu</div>
                    <div class="card-body">
                            <div class="list-group">
                                @foreach($students as $user)
                                <li class="list-group-item row">
                                {{$user->name}}
                                @if($user->document)
                                     @if($user->document->grade > 49)
                                     <span class="badge badge-success badge-pill">{{$user->document->grade}}</span>
                                     @else
                                     <span class="badge badge-danger badge-pill">{{$user->document->grade}}</span>
                                     @endif
                                     
                                 @endif
                                 @if($user->document)
                                 <div class="input-group input-group-sm col-6 col-sm-7 col-md-7 col-lg-3 float-right">
       
                                                   <div class="input-group-append">
                                                         {{-- <a class="btn btn-outline-secondary btn-sm" href="/storage/documents/{{$user->document->document}}" target="_blank">Preview</a> --}}
                                                         <a class="float-right btn btn-outline-primary btn-sm" href="{{route('preview', ['preview' => $user->document->document])}}" target="_blank">Preview</a>
                                                         <form method="post" action="{{ route('document.delete', ['id' => $user->document->id]) }}">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button type="submit" class="float-right btn btn-outline-danger btn-sm">Delete</button>
                                                            </form> 
                                                     </div>
                                                    </div>
                                 @else
                                 <span class="badge badge-danger badge-pill">No project uploaded yet</span>
                                 @endif                                       
                                
                             </li>
 
                                @endforeach
                            </div>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
