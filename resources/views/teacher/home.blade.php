@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                @include('inc.msg')
            <div class="card">
                <div class="card-header">
                        <button type="button" class="float-right btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                                Instruction
                        </button>
                    <p class="text-muted">List of Students with their Textual Analysis</p>
                </div>
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
                                <span class="float-right badge badge-danger badge-pill">No project uploaded yet</span>
                                @endif                                       
                               
                            </li>

                            <!-- The Modal -->


                            @endforeach
                    </div>
            </div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Instruction</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <ul class="list-group">
                    <li class="list-group-item">
                        Use the text box and submit button to submit the student's textual analysis grade.
                    </li>
                    <li class="list-group-item">
                        Use the preview button to open the textual analysis.
                    </li>
                    <li class="list-group-item">
                        Use the info button to view the project information.
                    </li>
                  </ul>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
        </div>
    </div>
</div>



@endsection

