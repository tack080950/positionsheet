<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <title>Home - Position Sheet</title>
    <style>
        /* General body styles */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            background: linear-gradient(to right, #f5f5f5, #78e08f); /* Shades of green */
            display: flex;
            justify-content: center;
            align-items: center;
            color: #2d3436; /* Dark gray for text */
        }

        /* Center container */
        .container {
            text-align: center;
            padding: 20px;
            width: 90%;
            max-width: 600px;
        }

        /* Title styling */
        .title {
            font-size: 48px;
            margin-bottom: 20px;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.1);
            color: #1e272e; /* Deeper gray for the title */
        }

        /* Button styling */
        .create-button {
            background: #6ab04c; /* Nature-inspired green */
            color: white;
            font-size: 20px;
            padding: 12px 24px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .create-button:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
            background: #58b368; /* Slightly darker green on hover */
        }

        .create-button:active {
            transform: scale(0.95);
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .title {
                font-size: 36px;
            }

            .create-button {
                font-size: 18px;
                padding: 10px 20px;
            }
        }

        @media (max-width: 480px) {
            .title {
                font-size: 28px;
            }

            .create-button {
                font-size: 16px;
                padding: 8px 16px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <?php 
            // Displaying title dynamically
            $title = "Position Sheet";
            echo "<div class='title'>$title</div>";
        ?>
        <a href="faxer.php" class="create-button">Create</a>
    </div>
</body>
</html>
