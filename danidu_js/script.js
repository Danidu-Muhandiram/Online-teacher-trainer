//home page navigation bar scroll

window.addEventListener('scroll', function() {
    var  navbar=document.querySelector('.navbar');
    if(window.scrollY>50){
        navbar.classList.add('scrolled');
    }

    else{
        navbar.classList.remove('scrolled');
    }
});

//contact_us.php redirect button functions
function redirectToUpdateForm(msg_id) {
    window.location.href = "danidu_crud_php/update.php?msg_id=" + msg_id;
}

function confirmDelete(msg_id) {
    if (confirm("Are you sure you want to delete this message?")) {
        window.location.href = "danidu_crud_php/delete.php?msg_id=" + msg_id;
    }
}

// contact us validations

function validate() {
    
    let name = document.getElementById("contact_us_name").value
    let phone = document.getElementById("contact_us_number").value
    let email = document.getElementById("contact_us_email").value
    let subject = document.getElementById("contact_us_subject").value
    let message = document.getElementById("contact_us_message").value

    if (!/^[a-zA-Z\s]+$/.test(name)) {
        alert("Name should only contain letters and spaces");
        return false;
    }

    if (!/^\d{7,15}$/.test(phone)) {
        alert("Please enter vaild phone number details");
        return false;
    }

    // Validate Email (Basic email format check)
    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
        alert("Please enter a valid email address or check your email again");
        return false;
    }

    if (subject.length < 3 || subject.length > 20) {
        alert("Subject must be between 3 and 20 characters");
        return false;
    }

    if (message.length < 10 || message.length > 500) {
        alert("Message must be at least 10 characters long");
        return false;
    }

    return true;
}


// payment vaildations

function validatePayment() {

    let card_holder_name = document.getElementById("payment_card_name").value
    let card_number = document.getElementById("payment_card_number").value
    let card_date = document.getElementById("payment_card_date").value
    let cvv = document.getElementById("payment_card_cvv").value

    if (!/^[a-zA-Z\s]+$/.test(card_holder_name)) {
        alert("Name should only contain letters and spaces. Please recheck your name");
        return false;
    }

    if (!/^\d{16}$/.test(card_number)) {
        alert("Card number must be 16 digits");
        return false;
    }

    // Validate Expiration Date (Cannot be in the past)
    let currentDate = new Date();
    let expDate = new Date(card_date);
    if (expDate < currentDate) {
        alert("Expiration date cannot be in past");
        return false;
    }

    if (!/^\d{3}$/.test(cvv)) {
        alert("CVV must be 3 digits");
        return false;
    }

    if (card_holder_name && country && card_number && card_date && cvv) {
        window.location.href = './payment_successful.html';
        return false;

    } else {
        alert("Please fill all the fields correctly.");
        return false; 
    }

    return true;
}


    document.addEventListener("DOMContentLoaded", () => {
    const profileCircle = document.querySelector(".profile_circle");
    const dropdownMenu = document.querySelector(".dropdown_menu");

    // Toggle the dropdown on click
    profileCircle.addEventListener("click", (e) => {
        e.stopPropagation(); // Prevent event from bubbling to the document
        dropdownMenu.style.display = dropdownMenu.style.display === "block" ? "none" : "block";
    });

    // Close the dropdown if clicking outside of it
    document.addEventListener("click", () => {
        dropdownMenu.style.display = "none";
    });

    // Prevent dropdown from closing when clicking inside the menu
    dropdownMenu.addEventListener("click", (e) => {
        e.stopPropagation();
    });
});


    const navLinks = document.querySelectorAll('.navbarlist a');

    // Get the current page's file name from the URL
    const currentPage = window.location.pathname.split("/").pop();

    navLinks.forEach(link => {
    if (link.getAttribute('href') === currentPage) {
        link.classList.add('active');
    }
    });