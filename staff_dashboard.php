<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management Staff Dashboard</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            background-color: #121212;
            color: #eee;
            margin: 0;
            display: flex;
        }
        .sidebar {
            width: 250px;
            background-color: #1e1e1e;
            position: fixed;
            top: 0;
            bottom: 0;
            padding: 20px;
            color: white;
            z-index: 1000;
        }
        .sidebar .logo {
            text-align: center;
            margin-bottom: 20px;
        }
        .sidebar .logo img {
            width: 80%;
            border-radius: 10px;
        }
        .sidebar .nav-links {
            list-style: none;
            padding: 0;
        }
        .sidebar .nav-links li {
            margin: 15px 0;
        }
        .sidebar .nav-links a {
            color: white;
            text-decoration: none;
            font-size: 18px;
            transition: background 0.3s;
            padding: 10px;
            display: block;
            border-radius: 8px;
        }
        .sidebar .nav-links a:hover {
            background-color: #333;
        }
        .main-content {
            margin-left: 250px;
            padding: 20px;
            width: 100%;
            background-color: #181818;
        }
        .navbar {
            background-color: #212121;
            color: white;
            padding: 15px;
            text-align: center;
            position: fixed;
            top: 0;
            left: 250px;
            right: 0;
            z-index: 1000;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }
        .content {
            margin-top: 70px;
        }
        .card {
            background-color: #1e1e1e;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
            color: #eee;
        }
        .card h3 {
            margin-top: 0;
            border-bottom: 2px solid #ffbb33;
            padding-bottom: 10px;
        }
        .dashboard-stats {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .stat-card {
            flex: 1;
            margin: 0 10px;
            background-color: #333;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
            text-align: center;
            color: #eee;
        }
        .stat-card h4 {
            margin-top: 0;
            font-size: 2em;
            color: #ffbb33;
        }
        .stat-card p {
            margin: 0;
            font-size: 1.1em;
            color: #bbb;
        }
        .book-card {
            display: flex;
            align-items: center;
            padding: 10px;
            margin-bottom: 15px;
            background-color: #333;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
            color: #eee;
        }
        .book-card img {
            width: 80px;
            height: 100px;
            margin-right: 20px;
            border-radius: 8px;
            object-fit: cover;
        }
        .book-card .book-info {
            flex: 1;
        }
        .book-card h4 {
            margin: 0;
            font-size: 1.2em;
            color: #ffbb33;
        }
        .book-card p {
            margin: 5px 0 0;
            color: #bbb;
        }
        .footer {
            text-align: center;
            padding: 10px;
            background-color: #212121;
            color: #bbb;
            border-top: 1px solid #333;
            margin-top: 20px;
        }
        .button {
            background-color: #ffbb33;
            color: #333;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
        }
        .button:hover {
            background-color: #ff8800;
            transform: scale(1.05);
        }
        .button:disabled {
            background-color: #bbb;
            cursor: not-allowed;
        }
    </style>
</head>
<body>

<div class="sidebar">
    <div class="logo">
        <img src="staff.jpg" alt="Library Logo">
    </div>
    <ul class="nav-links">
        <li><a href="#dashboard">Dashboard</a></li>
        <li><a href="#books">Book Management</a></li>
        <li><a href="#borrowing">Borrowing Records</a></li>
        <li><a href="#reservations">Reservations</a></li>
        <li><a href="#returns">Manage Returns</a></li>
        <li><a href="gamification.php">Gamification</a></li>
        <li><a href="#logout">Logout</a></li>
    </ul>
</div>

<div class="main-content">
    <div class="navbar">
        <h1>Library Management Staff Dashboard</h1>
    </div>
    <div class="content">
        <div id="dashboard" class="card">
            <h3>Dashboard</h3>
            <div class="dashboard-stats">
                <div class="stat-card">
                    <h4>1500</h4>
                    <p>Total Books</p>
                </div>
                <div class="stat-card">
                    <h4>120</h4>
                    <p>Borrowed Books</p>
                </div>
                <div class="stat-card">
                    <h4>50</h4>
                    <p>Reservations</p>
                </div>
                <div class="stat-card">
                    <h4>30</h4>
                    <p>Pending Returns</p>
                </div>
            </div>
        </div>
        <div id="books" class="card">
            <h3>Book Management</h3>
            <div class="book-card">
                <img src="comparative 2.jpg" alt="Book Image">
                <div class="book-info">
                    <h4>Book Title 1</h4>
                    <p>Author Name 1</p>
                </div>
                <button class="button">Edit</button>
            </div>
            <div class="book-card">
                <img src="science 3.jpg" alt="Book Image">
                <div class="book-info">
                    <h4>Book Title 2</h4>
                    <p>Author Name 2</p>
                </div>
                <button class="button">Edit</button>
            </div>
            <div class="book-card">
                <img src="geography 3.jpg" alt="Book Image">
                <div class="book-info">
                    <h4>Book Title 3</h4>
                    <p>Author Name 3</p>
                </div>
                <button class="button">Edit</button>
            </div>
            <!-- Add more book cards as needed -->
        </div>
        <div id="borrowing" class="card">
            <h3>Borrowing Records</h3>
            <p>View and manage borrowing records here.</p>
            <button class="button">Add Borrowing Record</button>
        </div>
        <div id="reservations" class="card">
            <h3>Reservations</h3>
            <p>Manage book reservations here.</p>
        </div>
        <div id="returns" class="card">
            <h3>Manage Returns</h3>
            <p>Handle book returns here.</p>
            <button class="button">Process Return</button>
        </div>
    </div>
    <div class="footer">
        <p>&copy; 2024 Library Management System</p>
    </div>
</div>

</body>
</html>
