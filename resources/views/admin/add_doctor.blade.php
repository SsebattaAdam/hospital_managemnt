

<!DOCTYPE html>
<html lang="en">
  <head>
    <style>
      label{
        display:inline-block;
        width:200px;
      }

      
    </style>
   @include("admin.css")
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
      @include('admin.sidebar');
      <!-- partial -->
      @include('admin.navbar');
      
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">

        

            <div class ="container" align="center" style="padding-top:60px;">

            @if(session()->has('message'))
    <div class="alert alert-success">
      <button type="button" class="close" data-dismiss="alert">
        x
</button>
{{session()->get('message')}}
</div>

@endif
          

            <form action="{{url('upload_doctor')}}" method="POST" enctype="multipart/form-data">

            @csrf
                <div style="padding:20px;">
                    <label for="name"> Doctor Name</label>
                    <input type="text" name="name"  style="color:black"id="name" placeholder="Enter Doctor Name">
                  
                </div>
                <div style="padding:20px;">
                    <label for="name"> Doctor phone Unmber</label>
                    <input type="number" name="phone_number"  style="color:black"id="name" placeholder="Enter Doctor Phone number"required="">
                  
                </div>
                <div style="padding:20px;">
                    <label for="speciality"> speciality</label>
                    <select name="speciality"style="color:black">
                        <option value="">Select Speciality</option>
                        <option value="General">General</option>
                        <option value="Cardiology">Cardiology</option>
                        <option value="Neurology">Neurology</option>
                        <option value="Gastroenterology">Gastroenterology</option>
                        <option value="Dentistry">Dentistry</option>
                        <option value="Dermatology">Dermatology</option>
                        <option value="Psychiatry">Psychiatry</option>
                        <option value="Orthopaedic">Orthopaedic</option>
                        <option value="Neurology">Neurology</option>
                        <option value="Gastroenterology">Gastroenterology</option>
                        <option value="Dentistry">Dentistry</option>
                        </select>
                   
                </div>
                <div style="padding:20px;">
                    <label for="name"> Doctor Room Number</label>
                    <input type="text" name="room"  style="color:black"id="name" placeholder="Enter Doctor Room number"required="">
                  
                </div>
                <div style="padding:20px;">
                    <label> Doctor Image</label>
                    <input type="file" name="image"  style="color:black"id="name"required="" >
                  
                </div>
                <div style="padding:20px; , display:inline-block;">
                   
                    <input type="submit" class="btn btn-success"  style="color:black"id="name" required="">
                  
                </div>
                

                <form>
            </div>
                    

            </div>



            <'div >
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script');
    <!-- End custom js for this page -->
  </body>
</html>