function validateForm() {
    const form = document.getElementById('bookingForm');
    const fullName = document.getElementById('fullName').value;
    const email = document.getElementById('email').value;
    const phone = document.getElementById('phone').value;
    const date = document.getElementById('date').value;

    // Basic validation
    if (fullName.length < 3) {
        alert('Please enter a valid name');
        return false;
    }

    if (!isValidEmail(email)) {
        alert('Please enter a valid email address');
        return false;
    }

    if (!isValidPhone(phone)) {
        alert('Please enter a valid phone number');
        return false;
    }

    if (!isValidDate(date)) {
        alert('Please select a future date');
        return false;
    }

    // If all validations pass
    alert('Booking submitted successfully! We will contact you shortly.');
    return true;
}

function isValidEmail(email) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
}

function isValidPhone(phone) {
    return /^\d{10}$/.test(phone.replace(/[^0-9]/g, ''));
}

function isValidDate(date) {
    const selectedDate = new Date(date);
    const today = new Date();
    today.setHours(0, 0, 0, 0);
    return selectedDate >= today;
}

// Disable past dates in the date picker
window.addEventListener('load', function() {
    const dateInput = document.getElementById('date');
    const today = new Date().toISOString().split('T')[0];
    dateInput.setAttribute('min', today);
}); 