@extends('SupportAgent.common.header')

@section('content')


  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Support Tickets</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('suppAgentIndex') }}">Home</a></li>
            <li class="breadcrumb-item active">Support Tickets</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              
              <div class="row">
                <h3 class="card-title col-md-10">Support Ticket Details</h3>

              {{-- <a href="{{ route('hotelsCreate')}}" class="col-md-2 btn btn-block bg-gradient-success"> Add Hotel </a> --}}
              </div>
              

            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="supportTicketsTable" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Ref No</th>
                    <th>Customer Name</th>
                    <th>Email</th>
                    <th>Contact Number</th>
                    <th>Problem Description</th>
                    <th>Action</th>
                  </tr>
                </thead>

                <tbody>
                  @foreach ($supportTickets as $key => $supportTicket)
                    <tr>
                      <td>
                        @if ($supportTicket["comment_details"]->is_viewed == 0)
                          <span class="right badge badge-info">New</span>
                        @endif
                        {{$key+1}}
                      </td>
                      <td>{{ $supportTicket["ticket"]->ticket_ref_no }}</td>
                      <td>{{ $supportTicket["ticket"]->customer_name }}</td>
                      <td>{{ $supportTicket["ticket"]->email }}</td>
                      <td>{{ $supportTicket["ticket"]->contact_number }}</td>
                      <td>{{ $supportTicket["ticket"]->problem_description }}</td>
                      <td>
                        @if ($supportTicket["comment_details"]->is_fixed == 1)
                          Issue Fixed
                        @else
                          <a href="{{url('support-tickets/'.$supportTicket["ticket"]->id.'/comment')}}" class="btn btn-block bg-gradient-info btn-xs"> Comment Idea </a>
                        @endif
                      </td>
                    </tr>
                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Ref No</th>
                    <th>Customer Name</th>
                    <th>Email</th>
                    <th>Contact Number</th>
                    <th>Problem Description</th>
                    <th>Action</th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection