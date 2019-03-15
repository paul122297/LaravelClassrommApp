
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                @include('inc.msg')
            <div class="card">
                <div class="card-header">Edit Account</div>
                <div class="card-body">
                        <form method="post" action="{{ route('account.update', ['id' => $user->id]) }}">
                                @method('PATCH')
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" value="{{ $user->name }}" id="name" name="name" placeholder="Input Name" required>
                                  </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" value="{{ $user->email }}" id="email" name="email" placeholder="Input Email" required>
                                </div>

                                <div class="form-group">
                                    <label for="role">Role</label>
                                        <select class="form-control" name="role" id="role">
                                            <option value="" disabled>Please select a role</option>
                                            <option value="2">Student</option>
                                            <option value="1">Teacher</option>
                                        </select>
                                </div>

                                <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Input Password" required>
                                </div>
            
                                    <div class="form-group">
                                            <label for="password-confirm">Confirm Password</label>
                                            <input type="password" class="form-control" id="password-confirmation" name="password_confirmation" placeholder="Retype Password" required>
                                    </div>

                                <button type="submit" class="float-right btn btn-primary">Submit</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
