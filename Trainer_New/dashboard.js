// JavaScript functionality to handle form editing

// Select the "Edit" button and input fields
const editBtn = document.getElementById('edit-btn');
const inputs = document.querySelectorAll('.account-info input');

// Add event listener to the edit button
editBtn.addEventListener('click', function() {
    // Loop through each input field and remove "disabled" attribute to enable editing
    inputs.forEach(input => {
        input.disabled = !input.disabled;  // Toggle between enabling/disabling input fields
    });

    // Change button text to "Save" after editing
    if (editBtn.innerText === 'Edit') {
        editBtn.innerText = 'Save';
    } else {
        editBtn.innerText = 'Edit';
        // Here you can also add functionality to save changes (e.g., AJAX request)
    }
});