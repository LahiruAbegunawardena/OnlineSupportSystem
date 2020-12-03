@extends('SupportAgent.common.header')

@section('content')


<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Comment Area</h1>
      </div>
      {{-- <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('hotelsIndex') }}">Home</a></li>
          <li class="breadcrumb-item active">Create Hotel</li>
        </ol>
      </div> --}}
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    
    <div class="row">
      <div class="col-md-12">
          <div class="card">
              <div class="card-header">
                  <h4 class="card-title"> Comment on Ticket</h4>
              </div>
              <div class="card-body">
                <h4>Reference No: {{$ticket->ticket_ref_no}}</h4>

                <h5>Customer Name -> {{$ticket->customer_name}} </h5> 
                <h5>Problem Description -> {{$ticket->problem_description}}</h5>
                
              </div>
              <div class="card-body">
                {{ Form::open(array('url' => '/support-tickets/'.$ticket->id.'/comment-on-ticket','method'=>'POST')) }}
                  
                  <div class="row">
                    
                    <div class="form-group col-md-12">
                      <label for="comment">Comment</label>
                      @if (isset($agentComment))
                        {!! Form::textarea('comment', $agentComment[0]->comment, array('class' => 'form-control')) !!}
                      @else
                        {!! Form::textarea('comment', null, array('class' => 'form-control')) !!}
                      @endif
                      @if ($errors->has('comment'))
                        <p class="error">{{ $errors->first('comment') }}</p>
                      @endif
                    </div>
                  </div>

                  <button type="submit" class="btn btn-primary">Save</button>

                {{ Form::close() }}
              </div>
          </div>
      </div>
  </div>

  </div>
</section>

@endsection