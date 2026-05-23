<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Gamification</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            background-color: #121212;
            color: #eee;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            max-width: 800px;
            margin: auto;
            background: #1e1e1e;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        .container::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(135deg, #ffbb33, #ff8800);
            opacity: 0.2;
            z-index: -1;
            transform: rotate(45deg);
        }
        h1, h2 {
            text-align: center;
            color: #ffbb33;
            margin-bottom: 20px;
        }
        .profile, .challenges, .badges, .leaderboard {
            margin: 20px 0;
        }
        ul, ol {
            padding-left: 20px;
            text-align: left;
            color: #eee;
        }
        ul li, ol li {
            margin-bottom: 10px;
        }
        .status {
            font-style: italic;
            color: #888;
        }
        .profile p, .challenges ul, .badges ul, .leaderboard ol {
            background: #2a2a2a;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 10px;
        }
        .profile p {
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to the Library Gamification Dashboard</h1>
        <div class="profile">
            <h2>User Profile</h2>
            <p>Name: John Doe</p>
            <p>Books Read: 10</p>
            <p>Points: 150</p>
        </div>

        <div class="challenges">
            <h2>Current Challenges</h2>
            <ul>
                <li>Read 3 books this month <span class="status">(In Progress)</span></li>
                <li>Read 1 book from each genre: Fiction, Non-Fiction, Mystery <span class="status">(Completed)</span></li>
                <li>Participate in a library event <span class="status">(Not Started)</span></li>
            </ul>
        </div>

        <div class="badges">
            <h2>Badges Earned</h2>
            <ul>
                <li>Newbie Reader</li>
                <li>Genre Explorer</li>
                <li>Marathon Reader</li>
            </ul>
        </div>

        <div class="leaderboard">
            <h2>Leaderboard</h2>
            <ol>
                <li>Jane Smith - 200 points</li>
                <li>John Doe - 150 points</li>
                <li>Emily Johnson - 100 points</li>
            </ol>
        </div>
    </div>

    <script>
        // Example JavaScript to update the UI dynamically
        document.addEventListener('DOMContentLoaded', function () {
            // Example data (you would fetch this data from your server/database)
            const userProfile = {
                name: 'John Doe',
                booksRead: 10,
                points: 150
            };

            const challenges = [
                { description: 'Read 3 books this month', status: 'In Progress' },
                { description: 'Read 1 book from each genre: Fiction, Non-Fiction, Mystery', status: 'Completed' },
                { description: 'Participate in a library event', status: 'Not Started' }
            ];

            const badges = ['Newbie Reader', 'Genre Explorer', 'Marathon Reader'];

            const leaderboard = [
                { name: 'Jane Smith', points: 200 },
                { name: 'John Doe', points: 150 },
                { name: 'Emily Johnson', points: 100 }
            ];

            // Update user profile
            document.querySelector('.profile').innerHTML = `
                <h2>User Profile</h2>
                <p>Name: ${userProfile.name}</p>
                <p>Books Read: ${userProfile.booksRead}</p>
                <p>Points: ${userProfile.points}</p>
            `;

            // Update challenges
            const challengesList = document.querySelector('.challenges ul');
            challenges.forEach(challenge => {
                const listItem = document.createElement('li');
                listItem.innerHTML = `${challenge.description} <span class="status">(${challenge.status})</span>`;
                challengesList.appendChild(listItem);
            });

            // Update badges
            const badgesList = document.querySelector('.badges ul');
            badges.forEach(badge => {
                const listItem = document.createElement('li');
                listItem.textContent = badge;
                badgesList.appendChild(listItem);
            });

            // Update leaderboard
            const leaderboardList = document.querySelector('.leaderboard ol');
            leaderboard.forEach(entry => {
                const listItem = document.createElement('li');
                listItem.textContent = `${entry.name} - ${entry.points} points`;
                leaderboardList.appendChild(listItem);
            });
        });
    </script>
</body>
</html>
