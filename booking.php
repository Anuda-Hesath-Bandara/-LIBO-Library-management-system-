<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> LiBo LiBraRy</title>
    <link rel="stylesheet" href="booking.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <nav class="navbar">
        <div class="nav-content">
            <a href="/" class="logo"><h1>LiBo <span>LiBraRy</span></h1></a>
            <div class="nav-buttons">
                <a href="index.html" class="back-btn"><i class="fas fa-arrow-left"></i> Back</a>
            </div>
        </div>
    </nav>

    <main class="booking-container">
        <div class="booking-form">
            <h2>Purchase a Book</h2>
            <p class="form-description">Fill in the details below to purchase a book for the library</p>

            <form id="bookingForm" onsubmit="return validateForm()">
                <!-- Personal Information -->
                <div class="form-section">
                    <h3><i class="fas fa-user"></i> Personal Information</h3>
                    <div class="form-group">
                        <label for="fullName">Full Name</label>
                        <input type="text" id="fullName" name="fullName" required>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="tel" id="phone" name="phone" required>
                        </div>
                    </div>
                </div>

                <!-- Service Selection -->
                <div class="form-section">
                    <h3><i class="fas fa-book"></i> Service Details</h3>
                    <div class="form-group">
                        <label for="service">Select Service</label>
                        <select id="category" name="category" required>
                            <option value="">Choose a category</option>
                            <option value="fiction">Fiction</option>
                            <option value="non-fiction">Non-Fiction</option>
                            <option value="children">Children's Books</option>
                            <option value="educational">Educational</option>
                            <option value="science-fiction">Science Fiction</option>
                            <option value="biography">Biography</option>
                            <option value="fantasy">Fantasy</option>
                            <option value="mystery">Mystery</option>
                            <option value="history">History</option>
                            <option value="self-help">Self-Help</option>
                            <option value="religious">Religious</option>
                        </select>
                        
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="author">Select Author</label>
                            <select id="author" name="author">
                                <option value="">Select author (optional)</option>
                                <option value="jkr">J.K. Rowling</option>
                                <option value="grrm">George R.R. Martin</option>
                                <option value="atwood">Margaret Atwood</option>
                                <option value="king">Stephen King</option>
                                <option value="austen">Jane Austen</option>
                                <option value="hemingway">Ernest Hemingway</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="format">Book Format</label>
                        <select id="format" name="format" required>
                            <option value="">Select book format</option>
                            <option value="hardcover">Hardcover</option>
                            <option value="paperback">Paperback</option>
                            <option value="ebook">eBook</option>
                            <option value="audiobook">Audiobook</option>
                        </select>
                    </div>
                    
                    </div>
                </div>

                <!-- Schedule -->
                <div class="form-section">
                    <h3><i class="fas fa-calendar-alt"></i> Book Request Schedule</h3>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="requestDate">Request Date</label>
                            <input type="date" id="requestDate" name="requestDate" required>
                        </div>
                        <div class="form-group">
                            <label for="collectionTime">Preferred Collection Time</label>
                            <select id="collectionTime" name="collectionTime" required>
                                <option value="">Select collection time</option>
                                <option value="morning">Morning (9AM - 12PM)</option>
                                <option value="afternoon">Afternoon (1PM - 4PM)</option>
                                <option value="evening">Evening (5PM - 7PM)</option>
                            </select>
                        </div>
                    </div>
                </div>
                

                <!-- Additional Notes -->
                <div class="form-section">
                    <h3><i class="fas fa-note-sticky"></i> Additional Information</h3>
                    <div class="form-group">
                        <label for="notes">Special Requirements or Notes</label>
                        <textarea id="notes" name="notes" rows="3"></textarea>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="form-submit">
                    <button type="submit" class="submit-btn">Book Session</button>
                </div>
            </form>
        </div>
    </main>

    <script src="booking.js"></script>
</body>
</html> 