document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('applicationForm');

    form.addEventListener('submit', function (event) {
        event.preventDefault();

        // Validate each form field
        const appName = document.getElementById('app_name').value.trim();
        const appVersion = document.getElementById('app_version').value.trim();
        const appOS = document.getElementById('app_os').value;
        const appRatings = document.getElementById('app_ratings').value.trim();
        const appDescription = document.getElementById('app_description').value.trim();
        const appCategory = document.getElementById('app_category').value;
        const appImage = document.getElementById('app_image').value.trim();
      
        // Check if any required field is empty
        if (!appName || !appVersion || !appOS || !appRatings || !appDescription || !appCategory || !appImage) {
            alert('Please fill in all required fields.');
            return;
        }

        // Validate app ratings to be a number between 0 and 5
        if (isNaN(appRatings) || appRatings < 0 || appRatings > 5) {
            alert('Please enter a valid rating between 0 and 5.');
            return;
        }

        // Validate app name 
        if (!/^[A-Za-z]+$/.test(appName)) {
            alert('App name should contain only alphabetic characters.');
            return;
        }

        // If all fields are valid, submit the form
        form.submit();
    });
});