<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library E-book Feature</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            background-color: #222831;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .ebook-container {
            text-align: center;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 700px;
            margin: 50px auto;
        }
        .ebook-container h2 {
            color: #e60000;
        }
        .ebook-container iframe {
            border: none;
            width: 100%;
            height: 500px;
            margin-bottom: 20px;
        }
        .download-link {
            display: inline-block;
            padding: 10px 20px;
            color: #fff;
            background-color: #debe2b;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .download-link:hover {
            background-color: #cc0000;
        }
        @media (max-width: 768px) {
            .ebook-container iframe {
                height: 300px;
            }
            .download-link {
                padding: 8px 16px;
            }
        }
    </style>
</head>
<body>
    <div class="ebook-container">
        <h2>Read Our Featured E-book</h2>
        <iframe src="https://drive.google.com/file/d/YOUR_FILE_ID/preview"></iframe>
        <a href="path/to/ebook.pdf" class="download-link" download>Download E-book</a>
    </div>
</body>
</html>
