@extends('layouts.app')

@section('content')
<div class="container">
    @include('layouts.poppup-messages')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Find Ticket</div>

                <div class="card-body">
                    {{-- <form method="POST" action="{{ route('getTicketDet') }}">
                        @csrf --}}

                        <div class="form-group row">
                            <label for="ref_no" class="col-md-3 col-form-label">Reference No</label>
                            
                            <div class="col-md-6">
                                <input id="csrfToken" hidden name="csrfToken" value="{{csrf_token()}}">
                                <input id="ref_no" type="text" class="form-control @error('ref_no') is-invalid @enderror" name="ref_no">
                                
                                @if ($errors->has('ref_no'))
                                    <p class="error">{{ $errors->first('ref_no') }}</p>
                                @endif
                            </div>
                            <div class="col-md-3">
                                
                                <button type="button" id="ref_search" class="btn btn-primary"> <span class="glyphicon glyphicon-search"></span> Search </button>
                            </div>
                        </div>
                    {{-- </form>
                </div> --}}
                {{-- search results visualization --}}
                <div id="ticketDetails" class="card" style="display: none">
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
