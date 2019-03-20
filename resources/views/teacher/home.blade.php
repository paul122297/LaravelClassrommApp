@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                @include('inc.msg')
            <div class="card">
                <div class="card-header">List of students with their Textual Analysis</div>
                    <div class="card-body">
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
                                <form class="input-group input-group-sm col-6 col-sm-7 col-md-7 col-lg-5 float-right" method="post" action="{{ route('document.grade', ['id' => $user->document->id]) }}">
                                        @method('PATCH')
                                        @csrf        
                                                <input type="text" class="form-control" placeholder="Grade" name="grade" value="{{$user->document->grade}}" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-outline-primary btn-sm" type="submit">Submit</button>
                                                        {{-- <a class="btn btn-outline-secondary btn-sm" href="https://view.officeapps.live.com/op/view.aspx?src=https://qmsportaltech.com/storage/documents/{{$user->document->document}}" target="_blank">Preview</a> --}}
                                                        {{-- <a class="btn btn-outline-secondary btn-sm" href="/storage/documents/{{$user->document->document}}" target="_blank">Preview</a> --}}
                                                        <a class="float-right btn btn-outline-primary btn-sm" href="{{route('preview', ['preview' => $user->document->document])}}" target="_blank">Preview</a>
                                                        <a class="float-right btn btn-outline-primary btn-sm" href="{{route('info', ['id' => $user->document->id])}}">Info</a>
            
                                                    </div>
                                </form>
                                @else
                                <span class="badge badge-danger badge-pill">No project uploaded yet</span>
                                @endif                                       
                               
                            </li>

                            <!-- The Modal -->


                            @endforeach
                    </div>
            </div>


        </div>
    </div>
</div>



@endsection

