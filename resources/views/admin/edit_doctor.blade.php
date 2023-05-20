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
    <!-- update doctor -->

    <div class="container-fluid page-body-wrapper">

      <div class="container" align="center" style="padding-top:50px ">



        <form action="{{ url('update_doctor', $data->id) }}" method="POST" enctype="multipart/form-data">

          @csrf

          <h1 class="mb-3 bg-primary">Edit Doctor</h1>

          <div style="padding: 15px">
            <label for="doctor">Doctor Name</label>
            <input type="text" style="color:black" name="name" required="" placeholder="write the Name"
              value="{{ $data->name }}">
          </div>

          <div style="padding: 15px">
            <label for="Phone">Doctor's Phone</label>
            <input type="number" style="color:black" name="number" required="" placeholder="write the Phone Nb"
              value="{{ $data->phone }}">
          </div>

          <div style="padding: 15px">
            <label for="Speciality">Doctor's Speciality</label>
            <select name="speciality" required="" style="color:black; width:210px; ">
              <option value="" disabled selected>Select One</option>
              <option value="Ophthalmologists" {{ $data->speciality == 'Ophthalmologists' ? 'selected' : '' }}>
                Ophthalmologists
              </option>
              <option value="Cardiologists" {{ $data->speciality == 'Cardiologists' ? 'selected' : '' }}>
                Cardiologists</option>
              <option value="Endocrinologists" {{ $data->speciality == 'Gynecologists' ? 'selected' : '' }}>
                Endocrinologists</option>
              <option value="Gynecologists" {{ $data->speciality == 'Gynecologists' ? 'selected' : '' }}>Gynecologists
              </option>
              <option value="Dermatologists" {{ $data->speciality == 'Dermatologists' ? 'selected' : '' }}>
                Dermatologists
              </option>
              <option value="Nephrologists" {{ $data->speciality == 'Nephrologists' ? 'selected' : '' }}>Nephrologists
              </option>
              <option value="Neurologists" {{ $data->speciality == 'Neurologists' ? 'selected' : '' }}>Neurologists
              </option>
            </select>
          </div>

          <div style="padding: 15px">
            <label for="room">Room No</label>
            <input type="text" style="color:black" name="room" required="" placeholder="write the Room No"
              value="{{ $data->room }}">
          </div>

          <div style="padding: 15px">
            <label for="file" style="margin-left: 117px">Change Image</label>
            <input type="file" name="file">
          </div>

          <div style="padding: 15px">
            <label for="old Image" style="margin-right: 100px">Old Image</label>
            <img height="100" width="100" src="/doctorImage/{{ $data->image }}" alt="image">
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
