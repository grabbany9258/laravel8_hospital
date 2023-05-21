<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  @include('admin.css')
</head>

<body>
  <div class="container-scroller">

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
