@extends('layouts.app')

@section('content')
<div class="container">
    @include('layouts.poppup-messages')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Ticket') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('storeTicket') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="customer_name" class="col-md-4 col-form-label text-md-right">Customer Name</label>
                            
                            <div class="col-md-6">
                                <input id="customer_name" type="text" class="form-control @error('customer_name') is-invalid @enderror" name="customer_name" autocomplete="customer_name" autofocus>
                                
                                @if ($errors->has('customer_name'))
                                    <p class="error">{{ $errors->first('customer_name') }}</p>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" autocomplete="email">

                                @if ($errors->has('email'))
                                    <p class="error">{{ $errors->first('email') }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="contact_number" class="col-md-4 col-form-label text-md-right">Contact Number</label>

                            <div class="col-md-6">
                                <input id="contact_number" type="text" class="form-control @error('contact_number') is-invalid @enderror" name="contact_number" autocomplete="contact_number" autofocus>

                                @if ($errors->has('contact_number'))
                                    <p class="error">{{ $errors->first('contact_number') }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="problem_description" class="col-md-4 col-form-label text-md-right">Problem Description</label>

                            <div class="col-md-6">
                                <textarea id="problem_description" class="form-control @error('problem_description') is-invalid @enderror" name="problem_description" autofocus></textarea>
                                @if ($errors->has('problem_description'))
                                    <p class="error">{{ $errors->first('problem_description') }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
