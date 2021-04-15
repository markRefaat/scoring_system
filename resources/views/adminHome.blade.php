@extends('layouts.app')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

@endif
@if (session('status'))
<div class="alert alert-success text-center" role="alert">
    {{ session('status') }}
</div>
@endif
    <div class="container text-center">
        <form action="/updateSettings">
            <h3 class="alert alert-info" style="margin: 2%">Update users access</h3>
            @foreach ($settings as $setting)
                <div class="row">
                    <div class="col-7 text-center">
                        <h4>{{ $setting->setting }}</h4>
                    </div>

                    <div class="col-5 text-center">
                        @csrf
                        <div class="custom-control custom-switch">
                            <input class="custom-control-input" name="{{ $setting->setting }}" type="checkbox"
                                id="flexSwitchCheckChecked{{ $setting->setting }}" @if ($setting->value == 'true') checked @endif />
                            <label class="custom-control-label" for="flexSwitchCheckChecked{{ $setting->setting }}">
                                @if ($setting->value == 'true')
                                    users are currently allowed.
                                @else
                                    users are currently not allowed.
                                @endif
                            </label>
                        </div>

                    </div>
                </div>
                <hr>

            @endforeach
            <div class="row">
                <div class="center">

                    <input type="submit" value="Apply settings" class="btn btn-warning">
                </div>
            </div>
        </form>
        <h3 class="alert alert-danger" style="margin: 2%">
            Update users score
        </h3>
        <h6 style= "font-weight:bold" class="text-warning">
            please use with caution.
        </h6>
        <form action="/updateScore">
        @csrf
        <div class="custom-file">
            <input type="file" name="sheet" class="custom-file-input" id="validatedCustomFile" required>
            <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
          </div>
          <hr>
          <h6  style="margin: 2%">Authentication</h6>
          <input style="width:50%; margin:auto" type="password" class="form-control" required name="password">
          <hr>
          <input type="button" disabled value="Update Score" class="btn btn-warning">

        </form>
    </div>
    <style>
        .row {
            margin: auto;
        }

        .center{
            margin: auto;
        }

    </style>
@endsection
