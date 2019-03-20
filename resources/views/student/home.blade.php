@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                @include('inc.msg')
        @if(Auth::user()->email_verified_at)        
            <div class="card">
                <div class="card-header">
                    @if(!Auth::user()->document)
                        Upload your Project here
                    @elseif (Auth::user()->document && !Auth::user()->document->grade)
                        Goodluck {{Auth::user()->name}}
                    @else
                            @if(Auth::user()->document->grade > 49)
                                Congratulations! You passed :)
                            @else
                                Sorry you failed
                            @endif
                    @endif  
                    @if(Auth::user()->document)  
                        <a class="float-right btn btn-outline-primary btn-sm" href="{{route('preview', ['preview' => Auth::user()->document->document])}}" target="_blank">Preview</a>
                        {{-- <a class=" float-rightbtn btn-outline-secondary btn-sm" href="/storage/documents/{{Auth::user()->document->document}}" target="_blank">Preview</a> --}}
                    @endif
                </div>
                <div class="card-body">
                    @if(!Auth::user()->document)
                        <form method="post" action="{{ route('document.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="filename">Filename</label>
                                    <input type="text" class="form-control" value="{{ old('filename') }}" id="filename" name="filename" placeholder="Input filename" required>
                                  </div>
                                <div class="form-group">
                                    <label for="notes">Notes</label>
                                    <textarea class="form-control" rows="3" id="notes" name="notes" ></textarea>
                                </div>
                                <div class="form-group">
                                        <label for="document">Upload Project</label>
                                        <input type="file" accept=".pdf" name="document" id="document">
                                    </div>

                                <button type="submit" class="float-right btn btn-primary">Submit</button>
                        </form>
                    
                    @elseif (Auth::user()->document && !Auth::user()->document->grade)
                        <h1>Please wait for your score</h1>
                    @else
                        @if(Auth::user()->document->grade > 49)
                            <h1 class="text-muted">Congratulations! your grade is {{Auth::user()->document->grade}}%</h1>
                            @else
                            <h1 class="text-muted">Sorry you failed! your grade is {{Auth::user()->document->grade}}%</h1>
                        @endif
                        
                    @endif
                </div>
            </div>
            @else
            <div class="card">
                <div class="card-header">
                <h4 class="text-muted">Welcome to World Literature LIT 313-IT41FA1
                </h4>
                </div>
                <div class="card-body">
                    <p>Hi {{Auth::user()->name}}! you can't upload your analysis paper yet, because your account is not yet activated. Please inform the admin to activate your account.</p>

                    <p>Thank you!</p>
                </div>
            </div>

            @endif
        </div>
    </div>
</div>
@endsection
