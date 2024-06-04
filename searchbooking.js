document.addEventListener("DOMContentLoaded", function() {
    var form = document.querySelector('form');

    form.addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent form submission

        var customerID = document.getElementById('customer_id').value.trim();

        fetch('fetch_booking.php?customer_id=' + customerID)
            .then(response => response.text())
            .then(data => {
                document.getElementById('booking-details').innerHTML = data;
            })
            .catch(error => console.error('Error:', error));
    });
});
