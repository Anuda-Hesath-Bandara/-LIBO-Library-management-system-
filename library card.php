<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Library Card</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1, h2 {
            text-align: center;
            color: #e60000;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .submit-btn, .view-card-btn {
            background-color: #e60000;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        .submit-btn:hover, .view-card-btn:hover {
            background-color: #cc0000;
        }
        .card-container {
            display: none;
            text-align: center;
            margin-top: 20px;
        }
        .card {
            background-color: #fff;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: inline-block;
        }
        .qr-code {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Digital Library Card System</h1>
        <div class="signup-form">
            <h2>Sign Up</h2>
            <form id="signupForm">
                <div class="form-group">
                    <label for="userName">Name:</label><br>
                    <input type="text" id="userName" name="userName" required><br><br>
                </div>
                <div class="form-group">
                    <label for="userEmail">Email:</label><br>
                    <input type="email" id="userEmail" name="userEmail" required><br><br>
                </div>
                <div class="form-group">
                    <label for="phoneNumber">Phone Number:</label><br>
                    <input type="tel" id="phoneNumber" name="phoneNumber" required><br><br>
                </div>
                <button type="submit" class="submit-btn">Sign Up</button>
            </form>
        </div>
        <div class="card-container" id="cardContainer">
            <h2>Your Digital Library Card</h2>
            <div class="card" id="card">
                <p id="memberName"></p>
                <p id="memberEmail"></p>
                <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=LibraryCard" alt="QR Code" class="qr-code" id="qrCode">
            </div>
        </div>
    </div>
    <script>
        document.getElementById('signupForm').addEventListener('submit', function(event) {
            event.preventDefault();
            const name = document.getElementById('userName').value;
            const email = document.getElementById('userEmail').value;
            const phone = document.getElementById('phoneNumber').value;

            document.getElementById('memberName').textContent = `Name: ${name}`;
            document.getElementById('memberEmail').textContent = `Email: ${email}`;
            document.getElementById('qrCode').src = `https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=${name}-${email}-${phone}`;
            
            document.querySelector('.signup-form').style.display = 'none';
            document.getElementById('cardContainer').style.display = 'block';
        });
    </script>
</body>
</html>
