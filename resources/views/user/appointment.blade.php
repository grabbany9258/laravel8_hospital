<!DOCTYPE html>
<html lang="en">

<head>
  @include('user.css')
</head>

<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>

  @include('user.header')

  {{-- Showing Apointments successful message --}}
  <div class="container" align="center">
    @if (session()->has('message'))
      <div class="alert alert-success alert-dismissible fade show" id="alert">

        {{ session()->get('message') }}
        <button type="button" class="close" data-dismiss="alert">X</button>

      </div>
    @endif
  </div>

  <div class="page-banner overlay-dark bg-image" style="background-image: url(../assets/img/bg_image_1.jpg);">
    <div class="banner-section">
      <div class="container text-center wow fadeInUp">
        <nav aria-label="Breadcrumb">
          <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Appointment</li>
          </ol>
        </nav>
        <h1 class="font-weight-normal">Appointment Page </h1>
      </div> <!-- .container -->
    </div> <!-- .banner-section -->
  </div> <!-- .page-banner -->




  {{-- Appointment --}}
  <div class="page-section">
    <div class="container">
      <h1 class="text-center wow fadeInUp">Make an Appointment</h1>

      <form class="main-form" method="POST" action="{{ url('appoint') }}">
        @csrf

        <div class="row mt-5 ">
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
            <input type="text" class="form-control" name="name" placeholder="Patient's Name..">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight">
            <input type="text" class="form-control" name="email" placeholder="Patient's Email..">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
            <input type="date" name="date" class="form-control">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
            <select name="doctor" class="custom-select">

              {{-- Looping for appoinment --}}

              <option value="" disabled selected>Select Doctos</option>
              @foreach ($doctor as $doctors)
                <option value="{{ $doctors->name }}">{{ $doctors->name }}~~speciality~~{{ $doctors->speciality }}
                </option>
              @endforeach

            </select>
          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <input type="text" name="number" class="form-control" placeholder="Patient's Number..">
          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <textarea name="message" id="message" class="form-control" rows="6"
              placeholder="Describe Patient's Problem Shortly.."></textarea>
          </div>
        </div>

        <button type="submit" class="btn btn-primary mt-3 wow zoomIn">Submit Request</button>
      </form>
    </div>
  </div>


  <div class="page-section banner-home bg-image" style="background-image: url(../assets/img/banner-pattern.svg);">
    <div class="container py-5 py-lg-0">
      <div class="row align-items-center">
        <div class="col-lg-4 wow zoomIn">
          <div class="img-banner d-none d-lg-block">
            <img src="../assets/img/mobile_app.png" alt="">
          </div>
        </div>
        <div class="col-lg-8 wow fadeInRight">
          <h1 class="font-weight-normal mb-3">Get easy access of all features using One Health Application</h1>
          <a href="#"><img src="../assets/img/google_play.svg" alt=""></a>
          <a href="#" class="ml-2"><img src="../assets/img/app_store.svg" alt=""></a>
        </div>
      </div>
    </div>
  </div> <!-- .banner-home -->



  @include('user.footer')

  @include('user.script')

  {{-- script for Flash message auto time Out --}}
  <script>
    $('document').ready(function() {

      setTimeout(function() {

        $('div.alert').remove();

      }, 2000);
    });
  </script>



</body>

</html>
