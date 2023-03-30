<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
   
  </head>
  <body>
    <div class="container-scroller">
      <div class="row p-0 m-0 proBanner" id="proBanner">
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
      </div>
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
                        <h4 class="card-title">Doctor List</h4>
                        <p class="card-description"> Table is scollable<code> (right/left)</code>
                        </p>
                        <div class="table-responsive">
                          <table class="table table-bordered table-contextual">
                              <thead>
                                <tr>
                                    <th>Doctor Name</th>
                                    <th>Phone</th>
                                    <th>Speciality</th>
                                    <th>Room</th>
                                    <th>Image</th>
                                    <th>Edit</th>
                                    <th>Delete</th>                           
                                  </tr>
                              </thead>
                              <tbody>
                            
                                @foreach ($viewdoc as $viewdocs)
                                  <tr>
                                    <td>{{ $viewdocs->name }}</td>
                                    <td>{{ $viewdocs->phone }}</td>
                                    <td>{{ $viewdocs->specialty }}</td>                                       
                                    <td>{{ $viewdocs->room }}</td>
                                    <td> <img src="doctorimage/{{ $viewdocs->image }}" alt="">  </td>                                      
                                    <td><a class="badge badge-danger" href="{{ url('deletedoctor', $viewdocs->id) }}" onclick="return confirm('Are you sure you want to delete appointment.')">Delete</a></td>
                                    <td><a class="badge badge-success" href="{{ url('updatedoctor', $viewdocs->id) }}" >Update</a></td>
                                  </tr>

                                @endforeach
                             
                              </tbody>
                          </table>
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
    <!-- End custom js for this page -->
  </body>
</html>
