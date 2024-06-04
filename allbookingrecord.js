document.addEventListener('DOMContentLoaded', function() {
    fetchBookings();
});

function fetchBookings() {
    fetch('allbookingrecord.php')
    .then(response => response.json())
    .then(data => {
        const bookingsTable = document.getElementById('bookingsTable').getElementsByTagName('tbody')[0];
        data.forEach(booking => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${booking.customer_id}</td>
                <td>${booking.name}</td>
                <td>${booking.email}</td>
                <td>${booking.checkin}</td>   <!-- Use 'checkin' instead of 'check_in' -->
                <td>${booking.checkout}</td>  <!-- Use 'checkout' instead of 'check_out' -->
                <td>${booking.adult}</td>     <!-- Use 'adult' instead of 'adults' -->
                <td>${booking.children}</td>
                <td>${booking.rooms}</td>
                <td>${booking.roomstype}</td> <!-- Use 'roomstype' instead of 'room_type' -->
            `;
            bookingsTable.appendChild(row);
        });
    })
    .catch(error => console.error('Error fetching bookings:', error));
}
