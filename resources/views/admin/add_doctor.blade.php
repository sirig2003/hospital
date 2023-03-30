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
                <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support.</p>
                <a href="https://www.bootstrapdash.com/product/corona-free/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo" target="_blank" class="btn me-2 buy-now-btn border-0">Hospital</a>
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
              <div class="row" id="appointment">
              
                <div class="col-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">

                      @if ($errors->any())
                      <div align="center" class="alert alert-danger">
                          <button type="button" class="close" data-dismiss="alert">x</button>
                            @foreach ($errors->all() as $error)
                              <li><b>{{ $error }}</b></li>       
                            @endforeach     
                      </div>
                      @endif
                      
              
                      @if (session()->has('message'))
                          <div class="alert alert-success">
                              <button type="button" class="close" data-dismiss="alert"> x</button>
                              {{ session()->get('message') }}
                          </div>        
                      @endif

                        <h4 class="card-title">CREATE DOCTOR PROFILE</h4>
                        <p class="card-description"> Add doctors </p>
                      <form class="forms-sample" method="POST" action="{{ url('upload_doctor') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <label for="name">Name</label>
                          <input type="text" class="form-control" name="name" placeholder="Name" required>
                        </div>
   
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="number" class="form-control" name="phone" placeholder="Phone" required>
                        </div>

                       
                        
                        <div class="form-group">
                          <label for="specialty">Speciality</label>
                          <select class="form-control" name="specialty" required>
                            <option value="null">Specialization</option>
                            <option value="skin">Skin</option>
                            <option value="eye">Eye</option>
                            <option value="heart">Heart</option>
                            <option value="nose">Nose</option>
                          </select>
                        </div>

                        <div class="form-group">
                            <label for="room">Room Number</label>
                            <input type="text" class="form-control" name="room" placeholder="Room" required>
                          </div>

                        <div class="form-group">
                          <label>File upload</label>
                          <input type="file" name="image">
                       </div>
   
                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                        {{-- <button class="btn btn-dark">Cancel</button> --}}
                      </form>
                    </div>
                  </div>
                </div>


              </div>
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:../../partials/_footer.html -->
            <!-- partial -->
          </div>

     
          



        
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
