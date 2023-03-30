
  <div class="page-section">
    <div class="container">
      <h1 class="text-center wow fadeInUp">Book an Appointment</h1>
      
      <form class="main-form" method="POST" action="{{ url('appointment') }}">
      @csrf
        @if (Auth::id())
          <div class="row mt-5 ">
            <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
              <input type="text" name="name" class="form-control" placeholder="Full name" required>
            </div>
            <div class="col-12 col-sm-6 py-2 wow fadeInRight">
              <input type="text" name="email" class="form-control" placeholder="Email address.." required>
            </div>
            <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
              <input type="date" name="date" class="form-control" required>
            </div>
            <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
              <select  name="doctor" class="custom-select" required>
                <option value="null">Available Doctors</option>
                @foreach ($doctors as $doctor)
                    <option value="{{ $doctor->name }}">{{ $doctor->name }} ({{ $doctor->specialty }} specialist)</option>
                @endforeach
                
              </select>
            </div>
            <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms" >
              <input type="text" name="phone" class="form-control" placeholder="Number.." required>
            </div>
            <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
              <textarea name="message" class="form-control" rows="6" placeholder="Enter message.." required></textarea>
            </div>
          </div>
          
          <button type="submit" class="badge badge-success wow zoomIn">Book An Appointment</button>
        @else
          <div align="center">  <a class="btn btn-primary ml-lg-3" href="{{route('login')}}">Login To Book An Appointment</a>
          </div>
        @endif
        
       

      </form>
    </div>
  </div> <!-- .page-section -->