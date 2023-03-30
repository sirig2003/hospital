<!DOCTYPE html>
<html lang="en">

@include('user.header1')


<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>
  @include('user.header2')
  

  @if (session()->has('message'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">x</button>
        {{ session()->get('message') }}
    </div>
  @endif


  <style>
    table.GeneratedTable {
    width: 80%;
    background-color: #ffffff;
    border-collapse: collapse;
    border-width: 2px;
    border-color: #18301c;
    border-style: solid;
    color: #493c3c;
    }
    
    table.GeneratedTable td, table.GeneratedTable th {
    border-width: 2px;
    border-color: #1e3826;
    border-style: solid;
    padding: 20px;
    }
    
    table.GeneratedTable thead {
    background-color: #becec3;
    }

    .paditforthem{
        padding: 40px;
    }
</style>

<div align="center" class="container paditforthem">
    <H2 class="paditforthem">Appointment Schedule</H2>
    <div class="row justify-content-center">
        <!-- CSS Code: Place this code in the document's head (between the 'head' tags) -->
        
    
    <!-- HTML Code: Place this code in the document's body (between the 'body' tags) where the table should appear -->
        <table class="GeneratedTable">
        <thead>
            <tr>
            <th>Doctor</th>
            <th>Date</th>
            <th>Message</th>
            <th>Status</th>
            <th>Cancel Appointment</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($appoints as $appoint)
                <tr>
                    <td>{{ $appoint->doctor }}</td>
                    <td>{{ $appoint->date }}</td>
                    <td>{{ $appoint->message }}</td>
                    <td style="color:
                        @if ($appoint->status=='Approved')
                            green;
                        @elseif ($appoint->status=='Canceled')
                            red;
                        @else
                            blue;
                        @endif
                  ">{{ $appoint->status }}</td>
                    <td><a class="badge badge-danger" href="{{ url('cancel_appoint', $appoint->id) }}" onclick="return confirm('Are you sure you want to delete appointment.')">Cancel</a></td>
                </tr>
            @endforeach
            
        
        </tbody>
        </table>
    <!-- Codes by Quackit.com -->
    
    
    </div>
</div>


 @include('user.footer')