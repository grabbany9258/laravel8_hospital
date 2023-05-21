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

    <div class="container-fluid page-body-wrapper ms-5">
      <div class="mb-5">
        <table class="table table-striped table-bordered text-center">
          <h2 class="text-center mt-5 mb-4">Appointment List</h2>

          <tr class="table-warning">
            <th>Patient Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Doctor Name</th>
            <th>Date</th>
            <th>Message</th>
            <th>Status</th>
            <th>Approved</th>
            <th>Canceled</th>
            <th>Send Mail</th>
          </tr>

          @foreach ($data as $appoint)
            <tr class="table-success">
              <td>{{ $appoint->name }}</td>
              <td>{{ $appoint->email }}</td>
              <td>{{ $appoint->phone }}</td>
              <td>{{ $appoint->doctor }}</td>
              <td>{{ $appoint->date }}</td>
              <td>{{ $appoint->message }}</td>
              <td>{{ $appoint->status }}</td>
              <td><a class="btn btn-success" href="{{ url('approved', $appoint->id) }}">Approved</a></td>

              <td><a class="btn btn-danger" href="{{ url('canceled', $appoint->id) }}">Canceled</a></td>

              <td><a class="btn btn-primary" href="{{ url('emailview', $appoint->id) }}">Send Mail</a></td>
            </tr>
          @endforeach

        </table>
      </div>

    </div>


    <!-- main-panel ends -->
  </div>
  <!-- page-body-wrapper ends -->
  </div>
  @include('admin.script')
</body>

</html>
