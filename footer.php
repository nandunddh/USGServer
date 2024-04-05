
<!-- Include Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.3/js/bootstrap.min.js"></script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<script>
  // Function to populate edit modal with data
  $('#editModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var id = button.data('id');
    var name = button.data('name');
    var email = button.data('email');
    var phoneno = button.data('phoneno');
    var month = button.data('month');
    var dates = button.data('dates');
    var year = button.data('year');
    var venu = button.data('venu');
    var url = button.data('url');
    var hoteladdress = button.data('hoteladdress');
    var about = button.data('about');
    var aboutshort = button.data('aboutshort');
    var price = button.data('price');
    var latitude = button.data('latitude');
    var longitude = button.data('longitude');
    var logo = button.data('logo');
    var banner = button.data('banner');
    var title = button.data('title');
    var status = button.data('token');

    var modal = $(this);
    modal.find('.modal-body #id').val(id);
    modal.find('.modal-body #name').val(name);
    modal.find('.modal-body #token').val(status);
    modal.find('.modal-body #email').val(email);
    modal.find('.modal-body #title').val(title);
    modal.find('.modal-body #phoneno').val(phoneno);
    modal.find('.modal-body #month').val(month);
    modal.find('.modal-body #dates').val(dates);
    modal.find('.modal-body #year').val(year);
    modal.find('.modal-body #venu').val(venu);
    modal.find('.modal-body #url').val(url);
    modal.find('.modal-body #hoteladdress').val(hoteladdress);
    modal.find('.modal-body #about').val(about);
    modal.find('.modal-body #aboutshort').val(aboutshort);
    modal.find('.modal-body #price').val(price);
    modal.find('.modal-body #latitude').val(latitude);
    modal.find('.modal-body #longitude').val(longitude);
    modal.find('.modal-body #logo').val(logo);
    modal.find('.modal-body #banner').val(banner);
  });

  // Function to populate view modal with data
  $('#viewModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var name = button.data('name');
    var email = button.data('email');
    var phoneno = button.data('phoneno');
    var dates = button.data('dates');
    var month = button.data('month');
    var year = button.data('year');
    var venu = button.data('venu');
    var url = button.data('url');
    var hoteladdress = button.data('hoteladdress');
    var about = button.data('about');
    var aboutshort = button.data('aboutshort');
    var price = button.data('price');
    var latitude = button.data('latitude');
    var longitude = button.data('longitude');
    var logo = button.data('logo');
    var banner = button.data('banner');
    var status = button.data('status');

    var modal = $(this);
    modal.find('#viewNameSpan').text(name);
    modal.find('#viewEmailSpan').text(email);
    modal.find('#viewPhoneNoSpan').text(phoneno);
    modal.find('#viewDatesSpan').text(dates);
    modal.find('#viewMonthSpan').text(month);
    modal.find('#viewYearSpan').text(year);
    modal.find('#viewVenuSpan').text(venu);
    modal.find('#viewURLSpan').text(url);
    modal.find('#viewHoteladdressSpan').text(hoteladdress);
    modal.find('#viewAboutSpan').text(about);
    modal.find('#viewAboutShortSpan').text(aboutshort);
    modal.find('#viewPriceSpan').text(price);
    modal.find('#viewLatitudeSpan').text(latitude);
    modal.find('#viewLongitudeSpan').text(longitude);
    modal.find('#viewLogoSpan').text(logo);
    modal.find('#viewBannerSpan').text(banner);
    modal.find('#viewStatusSpan').text(status);
  });

  function saveChanges() {
    // Submit the form

    var formData = new FormData();

    // Append logo and banner files to FormData
    // formData.append('logo', $('#logoInput')[0].files[0]); // Change 'logo' to 'logoInput'
    // formData.append('banner', $('#bannerInput')[0].files[0]); // Change 'banner' to 'bannerInput'

    // Append other form data
    formData.append('id', document.getElementById("id").value);
    formData.append('name', document.getElementById("name").value);
    formData.append('title', document.getElementById("title").value);
    formData.append('email', document.getElementById("email").value);
    formData.append('phoneno', document.getElementById("phoneno").value);
    formData.append('dates', document.getElementById("dates").value);
    formData.append('month', document.getElementById("month").value);
    formData.append('year', document.getElementById("year").value);
    formData.append('venu', document.getElementById("venu").value);
    formData.append('url', document.getElementById("url").value);
    formData.append('hoteladdress', document.getElementById("hoteladdress").value);
    formData.append('about', document.getElementById("about").value);
    formData.append('aboutShort', document.getElementById("aboutshort").value);
    formData.append('price', document.getElementById("price").value);
    formData.append('latitude', document.getElementById("latitude").value);
    formData.append('longitude', document.getElementById("longitude").value);
    formData.append('token', document.getElementById("token").value);
    formData.append('logo', document.getElementById("logo").value);
    formData.append('banner', document.getElementById("banner").value);

    // Send data to server
    $.ajax({
      url: 'updateConference.php',
      type: 'POST',
      data: formData,
      processData: false, // Prevent jQuery from automatically processing the data
      contentType: false, // Prevent jQuery from automatically setting the Content-Type header
      success: function (response) {
        if (response == "Record updated successfully") {
          alert(response);
        } else {
          alert(response);
        }
        // Optionally display success message or perform other actions
        window.location.reload();
      },
      error: function (xhr, status, error) {
        // Handle error response
        console.error("Error", xhr.responseText);
        // Optionally display error message or perform other actions
      }
    });

    // Close the modal (if necessary)
    $('#editModal').modal('hide');
  }

</script>

</body>

</html>