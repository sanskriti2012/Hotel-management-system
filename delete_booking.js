document.addEventListener('DOMContentLoaded', function() {
    var form = document.querySelector('form');

    form.addEventListener('submit', function(event) {
        var customerID = form.customer_id.value.trim();

        // Check if Customer ID is empty
        if (customerID === '') {
            showError('Please enter Customer ID');
            event.preventDefault();
        }
    });

    function showError(message) {
        var errorMessage = document.createElement('div');
        errorMessage.className = 'error-message';
        errorMessage.textContent = message;

        var container = document.querySelector('.container');
        container.appendChild(errorMessage);

        // Clear error message after 3 seconds
        setTimeout(function() {
            errorMessage.remove();
        }, 3000);
    }
});
