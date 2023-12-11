
    document.getElementById('mainForm').addEventListener('submit', function (event) {
        event.preventDefault();

        // Serialize the form data
        const formData = new FormData(event.target);

        // Use the fetch API to send a POST request
        fetch(event.target.action, {
            method: 'POST',
            body: formData,
        })
        .then(response => response.text())
        .then(data => {
            // Update the dynamic content with the received data
            document.getElementById('dynamicContent').innerHTML = data;
        })
        .catch(error => console.error('Error:', error));
    });