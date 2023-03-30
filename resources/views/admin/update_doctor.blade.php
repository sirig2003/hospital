<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
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
        

        ===========



        <div class="main-panel">
            <div class="content-wrapper">

           
              <div class="row">
              
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
                        <h4 class="card-title">Update DOCTOR PROFILE</h4>
                        <p class="card-description"> Add doctors </p>
                      <form class="forms-sample" method="POST" action="{{ url('editdoctor', $doc->id)}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <label for="name">Name</label>
                          <input type="text" class="form-control" name="name" value="{{ $doc->name }}" placeholder="Name" required>
                        </div>
   
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="number" class="form-control"  value="{{ $doc->phone }}" name="phone" placeholder="Phone" required>
                        </div>

                       
                        
                        <div class="form-group">
                          <label for="specialty">Speciality</label>
                          <select class="form-control" name="specialty" required>
                            <option  value="{{ $doc->specialty}}" >{{ $doc->specialty}}</option>
                            <option value="skin">Skin</option>
                            <option value="eye">Eye</option>
                            <option value="heart">Heart</option>
                            <option value="nose">Nose</option>
                          </select>
                        </div>

                        <div class="form-group">
                            <label for="room">Room Number</label>
                            <input type="text" class="form-control" value="{{ $doc->room }}"  name="room" placeholder="Room" required>
                          </div>

                        <div class="form-group">
                          <label>Old Image</label>
                          <img src="doctorimage/{{ $doc->image }}" alt="">
                          
                       </div>

                       <div class="form-group">
                        <label>Upload New Image</label>
                        
                        <input type="file" name="image">
                     </div>
   
                        <button type="submit" class="btn btn-primary me-2">Update</button>
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
