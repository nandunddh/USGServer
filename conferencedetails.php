<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, PUT, PATCH, GET, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Origin, X-Api-Key, X-Requested-With, Content-Type, Accept, Authorization");
include 'Db.php';

$sql = "SELECT * FROM conferencedetails ORDER BY CASE token
WHEN 'live' THEN 1
WHEN 'upcoming' THEN 2
WHEN 'completed' THEN 3
ELSE 4 -- handle any other values that might appear
END";
$result = $conn->query($sql);
$data = array();

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $data[] = $row;
  }
  if (!empty($data)) {
    include "header.php";
    ?>
    <table class="table table-hover" id="table">
      <thead>
        <tr class="table-dark">
          <th>Name</th>
          <th>Dates</th>
          <th>Status</th>
          <th>Action</th>
          <!-- Add more headers based on your data structure -->
        </tr>
      </thead>
      <tbody>
        <!-- Data will be dynamically added here -->
        <?php foreach ($data as $item): ?>
          <tr>
            <td>
              <?php echo $item['name']; ?>
            </td>
            <td>
              <?php echo $item['dates'] . " " . $item['month'] . ", " . $item['year']; ?>
            </td>
            <td>
              <?php echo $item['token']; ?>
            </td>
            <td>
              <!-- Button trigger modal for editing -->
              <button type="button" class="btn btn-warning me-3" data-bs-toggle="modal" data-bs-target="#editModal"
                data-name="<?php echo $item['name']; ?>" data-dates="<?php echo $item['dates']; ?>"
                data-month="<?php echo $item['month']; ?>" data-year="<?php echo $item['year']; ?>"
                data-phoneno="<?php echo $item['phoneno']; ?>" data-venu="<?php echo $item['venu']; ?>"
                data-url="<?php echo $item['url']; ?>" data-hoteladdress="<?php echo $item['hoteladdress']; ?>"
                data-about="<?php echo $item['about']; ?>" data-aboutshort="<?php echo $item['aboutshort']; ?>"
                data-price="<?php echo $item['price']; ?>" data-latitude="<?php echo $item['latitude']; ?>"
                data-longitude="<?php echo $item['longitude']; ?>" data-logo="<?php echo $item['logo']; ?>"
                data-banner="<?php echo $item['banner']; ?>" data-token="<?php echo $item['token']; ?>"
                data-title="<?php echo $item['title']; ?>" data-email="<?php echo $item['title']; ?>"
                data-id="<?php echo $item['id']; ?>">
                Edit
              </button>
              <!-- Button trigger modal for viewing -->
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#viewModal"
                data-name="<?php echo $item['name']; ?>" data-email="<?php echo $item['email']; ?>"
                data-phoneno="<?php echo $item['phoneno']; ?>" data-dates="<?php echo $item['dates']; ?>"
                data-month="<?php echo $item['month']; ?>" data-year="<?php echo $item['year']; ?>"
                data-venu="<?php echo $item['venu']; ?>" data-url="<?php echo $item['url']; ?>"
                data-hoteladdress="<?php echo $item['hoteladdress']; ?>" data-about="<?php echo $item['about']; ?>"
                data-aboutshort="<?php echo $item['aboutshort']; ?>" data-price="<?php echo $item['price']; ?>"
                data-latitude="<?php echo $item['latitude']; ?>" data-longitude="<?php echo $item['longitude']; ?>"
                data-logo="<?php echo $item['logo']; ?>" data-banner="<?php echo $item['banner']; ?>"
                data-status="<?php echo $item['token']; ?>">
                View
              </button>

            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

    <!-- Bootstrap Modal for editing -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5">Edit Data</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="editForm">
              <input type="hidden" name="id" id="id">
              <div class="form-group">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name" name="name">
              </div>
              <div class="form-group">
                <label for="title" class="form-label">Name:</label>
                <input type="text" class="form-control" id="title" name="title">
              </div>
              <div class="form-group">
                <label for="email" class="form-label">Email:</label>
                <input type="text" class="form-control" id="email" name="email">
              </div>
              <div class="form-group">
                <label for="PhoneNo" class="form-label">Phone NO:</label>
                <input type="text" class="form-control" id="phoneno" name="phoneno">
              </div>
              <div class="form-group">
                <label for="Dates" class="form-label">Dates:</label>
                <input type="text" class="form-control" id="dates" name="dates">
              </div>
              <div class="form-group">
                <label for="Month" class="form-label">Month:</label>
                <input type="text" class="form-control" id="month" name="month">
              </div>
              <div class="form-group">
                <label for="Year" class="form-label">Year:</label>
                <input type="text" class="form-control" id="year" name="year">
              </div>
              <div class="form-group">
                <label for="URL" class="form-label">URL:</label>
                <input type="text" class="form-control" id="url" name="url">
              </div>
              <div class="form-group">
                <label for="Venu" class="form-label">Venu:</label>
                <input type="text" class="form-control" id="venu" name="venu">
              </div>
              <div class="form-group">
                <label for="Hoteladdress" class="form-label">Hotel Address:</label>
                <input type="text-area" class="form-control" id="hoteladdress" name="hoteladdress">
              </div>
              <div class="form-group">
                <label for="About" class="form-label">About:</label>
                <textarea type="text" class="form-control" id="about" name="about" rows="5"></textarea>
              </div>
              <div class="form-group">
                <label for="AboutShort" class="form-label">About Short:</label>
                <textarea type="text" class="form-control" id="aboutshort" name="aboutshort" rows="5"></textarea>
              </div>
              <div class="form-group">
                <label for="Price" class="form-label">Starting Price:</label>
                <input type="text" class="form-control" id="price" name="price">
              </div>
              <div class="form-group">
                <label for="Latitude" class="form-label">Latitude:</label>
                <input type="text" class="form-control" id="latitude" name="latitude">
              </div>
              <div class="form-group">
                <label for="Longitude" class="form-label">Longitude:</label>
                <input type="text" class="form-control" id="longitude" name="longitude">
              </div>
              <div class="form-group">
                <label for="Logo" class="form-label">Logo Path:</label>
                <input type="text" class="form-control" id="logo" name="logo">
              </div>
              <input type="file" name="logo" id="logoInput" class="d-block my-2">
              <div class="form-group">
                <label for="Banner" class="form-label">Banner Path:</label>
                <input type="text" class="form-control" id="banner" name="banner">
              </div>
              <input type="file" name="banner" id="bannerInput" class="d-block my-2">
              <div class="form-group">
                <label for="Status">Status:</label>
                <input type="text" class="form-control" id="token" name="token">
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" onclick="saveChanges()">Save changes</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap Modal for viewing -->
    <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5">View Data</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="viewForm">
              <div class="form-group">
                <label for="viewName" class="form-label fw-bold">Name: <span class="fw-normal text-justify"
                    id="viewNameSpan"></span></label>
              </div>
              <div class="form-group">
                <label for="viewEmail" class="form-label fw-bold">Email: <span class="fw-normal text-justify"
                    id="viewEmailSpan"></span></label>
              </div>
              <div class="form-group">
                <label for="viewPhoneNo" class="form-label fw-bold">Phone NO: <span class="fw-normal text-justify"
                    id="viewPhoneNoSpan"></span></label>
              </div>
              <div class="form-group">
                <label for="viewDates" class="form-label fw-bold">Dates: <span class="fw-normal text-justify"
                    id="viewDatesSpan"></span></label>
              </div>
              <div class="form-group">
                <label for="viewMonth" class="form-label fw-bold">Month: <span class="fw-normal text-justify"
                    id="viewMonthSpan"></span></label>
              </div>
              <div class="form-group">
                <label for="viewYear" class="form-label fw-bold">Year: <span class="fw-normal text-justify"
                    id="viewYearSpan"></span></label>
              </div>
              <div class="form-group">
                <label for="viewURL" class="form-label fw-bold">URL: <span class="fw-normal text-justify"
                    id="viewURLSpan"></span></label>
              </div>
              <div class="form-group">
                <label for="viewVenu" class="form-label fw-bold">Venu: <span class="fw-normal text-justify"
                    id="viewVenuSpan"></span></label>
              </div>
              <div class="form-group">
                <label for="viewHoteladdress" class="form-label fw-bold">Hotel Address: <span class="fw-normal text-justify"
                    id="viewHoteladdressSpan"></span></label>
              </div>
              <div class="form-group">
                <label for="viewAbout" class="form-label fw-bold">About: <span class="fw-normal text-justify"
                    id="viewAboutSpan"></span></label>
              </div>
              <div class="form-group">
                <label for="viewAboutShort" class="form-label fw-bold">About Short: <span class="fw-normal text-justify"
                    id="viewAboutShortSpan"></span></label>
              </div>
              <div class="form-group">
                <label for="viewPrice" class="form-label fw-bold">Starting Price: <span class="fw-normal text-justify"
                    id="viewPriceSpan"></span></label>
              </div>
              <div class="form-group">
                <label for="viewLatitude" class="form-label fw-bold">Latitude: <span class="fw-normal text-justify"
                    id="viewLatitudeSpan"></span></label>
              </div>
              <div class="form-group">
                <label for="viewLongitude" class="form-label fw-bold">Longitude: <span class="fw-normal text-justify"
                    id="viewLongitudeSpan"></span></label>
              </div>
              <div class="form-group">
                <label for="viewLogo" class="form-label fw-bold">Logo Path: <span class="fw-normal text-justify"
                    id="viewLogoSpan"></span></label>
              </div>
              <div class="form-group">
                <label for="viewBanner" class="form-label fw-bold">Banner Path: <span class="fw-normal text-justify"
                    id="viewBannerSpan"></span></label>
              </div>
              <div class="form-group">
                <label for="viewStatus" class="form-label fw-bold">Status: <span class="fw-normal text-justify"
                    id="viewStatusSpan"></span></label>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    
    <?php
    include "footer.php";
  }
} else {
  $Message = "No Data Found!";
}
$conn->close();
?>