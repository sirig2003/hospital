<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
   
  </head>
  <body>
    <div class="container-scroller">
      {{-- <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
          <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
            <div class="ps-lg-1">
              <div class="d-flex align-items-center justify-content-between">
                <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with this template!</p>
                <a href="https://www.bootstrapdash.com/product/corona-free/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo" target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-between">
              <a href="https://www.bootstrapdash.com/product/corona-free/"><i class="mdi mdi-home me-3 text-white"></i></a>
              <button id="bannerClose" class="btn border-0 p-0">
                <i class="mdi mdi-close text-white me-0"></i>
              </button>
            </div>
          </div>
        </div>
      </div> --}}
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.navbar')
        
        <!-- partial -->


        
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">


                    <div class="col-lg-12 stretch-card">
                        <div class="card">
                          <div class="card-body">
                            <h4 class="card-title">Booked Appointment</h4>
                            <p class="card-description"> Table is scrollable<code> (right/left)</code>
                            </p>
                            <div class="table-responsive">
                              {{-- <form method="GET" action="/showappointment">
                                <input type="search" class="form-control" name="search" 
                                placeholder="Seach for patient" value="{{ request('search') }}">
                              </form> --}}

                              {{-- {{ mine_searchs(request('search'), "/showappointment", "Search for patient") }} --}}

                              <table  id="viewdocs"  class="table table-bordered table-contextual display nowrap">
                                <thead>
                                  <tr>                               
                                    <th>Custumer</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Doctor</th>
                                    <th>Date</th>
                                    <th>Message</th>
                                    <th>Status</th>
                                    <th>Approve</th>
                                    <th>Cancel</th>
                                    <th>Send Email</th>
                                  </tr>
                                </thead>
                                <tbody>
                                
                                  @foreach ($appoints as $appoint)
                                  <tr class="">
                                      <td>{{ $appoint->name }}</td>
                                      <td>{{ $appoint->email }}</td>
                                      <td>{{ $appoint->phone }}</td>                                       
                                      <td>{{ $appoint->doctor }}</td>
                                      <td>{{ $appoint->date }}</td>                                      
                                      <td>{{ $appoint->message }}</td>
                                      <td style="color:
                                        @if ($appoint->status=='Approved')
                                            white;
                                        @elseif ($appoint->status=='Canceled')
                                            red;
                                        @else
                                            blue;
                                        @endif
                                      ">{{ $appoint->status }}</td>
                                      <td>
                                        <a class="badge badge-success" href="{{ url('approve', $appoint->id) }}" onclick="return confirm('Are you sure you want to approve appointment.')">Approve</a>
                                    </td>

                                      <td><a class="badge badge-danger" href="{{ url('cancel', $appoint->id) }}" onclick="return confirm('Are you sure you want to cancel appointment.')">Cancel</a></td>

                                      <td><a class="badge badge-warning" href="{{ url('emailview', $appoint->id) }}">Send Email</a></td>
                                  </tr>
                              @endforeach
                                 
                                </tbody>
                              </table>
                              {{-- {{ mine_paginates(request('search'), $appoints)  }}
                               --}}
                              {{-- @if (request('search'))
                                 
                              @else
                                <div class="d-flex justify-content-center">
                                  {!! $appoints->links() !!}
                                </div>
                              @endif --}}
                              
                            </div>
                          </div>
                        </div>
                    </div>





                </div>
            </div>
        </div>

        @include('admin/footer')
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
   
  
    @include('admin.script')
    @extends('admin.excel')
    <!-- End custom js for this page -->
  </body>
</html>



