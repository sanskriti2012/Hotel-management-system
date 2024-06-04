document.addEventListener('DOMContentLoaded', function() {
    fetchWorkers();
});

function fetchWorkers() {
    fetch('workerdetail.php')
    .then(response => response.json())
    .then(data => {
        const workersContainer = document.getElementById('workers');
        data.forEach(worker => {
            const workerDiv = document.createElement('div');
            workerDiv.classList.add('worker');
            workerDiv.innerHTML = `
                <h2>${worker.name}</h2>
                <p>Worker ID: ${worker.worker_id}</p>
                <p>Department: ${worker.department}</p>
                <p>Email: ${worker.email}</p>
                <p>Phone: ${worker.phone}</p>
                <p>Date of Birth: ${worker.date_of_birth}</p>
                <p>Address: ${worker.address}</p>
                <p>Experience: ${worker.experience}</p>
                <p>Training/Certifications: ${worker.training_certifications}</p>
                <p>Emergency Contact: ${worker.emergency_contact}</p>
            `;
            workersContainer.appendChild(workerDiv);
        });
    })
    .catch(error => console.error('Error fetching workers:', error));
}
