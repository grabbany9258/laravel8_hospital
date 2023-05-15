<!DOCTYPE html>
<html lang="en">

<head>

  <style>
    label {
      display: inline-block;
      text-align: left;
      width: 200px;
    }
  </style>

  @include('admin.css')
</head>

<body>
  <div class="container-scroller">
    <div class="row p-0 m-0 proBanner" id="proBanner">
      <div class="col-md-12 p-0 m-0">
        <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
          <div class="ps-lg-1">
            <div class="d-flex align-items-center justify-content-between">
              <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with
                this template!</p>
              <a href="https://www.bootstrapdash.com/product/corona-free/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo"
                target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
            </div>
          </div>
          <div class="d-flex align-items-center justify-content-between">
            <a href="https://www.bootstrapdash.com/product/corona-free/"><i
                class="mdi mdi-home me-3 text-white"></i></a>
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
    @include('admin.navbar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">

      <div class="container" align="center" style="padding-top:100px ">

        {{-- Showing Message --}}
        @if (session()->has('message'))
          <div class="alert alert-success alert-dismissible fade show">

            <strong> {{ session()->get('message') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert">X</button>

          </div>
        @endif

        <form action="{{ url('upload_doctor') }}" method="POST" enctype="multipart/form-data">

          @csrf

          <div style="padding: 15px">
            <label for="doctor">Doctor Name</label>
            <input type="text" style="color:black" name="name" required="" placeholder="write the Name">
          </div>

          <div style="padding: 15px">
            <label for="Phone">Doctor's Phone</label>
            <input type="number" style="color:black" name="number" required="" placeholder="write the Phone Nb">
          </div>

          <div style="padding: 15px">
            <label for="Speciality">Doctor's Speciality</label>
            <select name="speciality" required="" style="color:black; width:210px; ">
              <option value="" disabled selected>Select One</option>
              <option value="Ophthalmologists">Ophthalmologists</option>
              <option value="Cardiologists">Cardiologists</option>
              <option value="Endocrinologists">Endocrinologists</option>
              <option value="Gynecologists">Gynecologists</option>
              <option value="Dermatologists">Dermatologists</option>
              <option value="Nephrologists">Nephrologists</option>
              <option value="Neurologists">Neurologists</option>
            </select>
          </div>

          <div style="padding: 15px">
            <label for="room">Room No</label>
            <input type="text" style="color:black" name="room" required="" placeholder="write the Room No">
          </div>

          <div style="padding: 15px">
            <label for="room">Doctor Image</label>
            <input type="file" name="file">
          </div>

          <div style="padding: 15px">

            <input type="submit" class="btn btn-success">
          </div>
        </form>
      </div>
    </div>
    <!-- main-panel ends -->
  </div>
  <!-- page-body-wrapper ends -->
  </div>
  @include('admin.script')
</body>

</html>
