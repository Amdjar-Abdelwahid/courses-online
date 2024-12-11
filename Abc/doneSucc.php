<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demande Done Successfully</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .success-container {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px 40px;
            text-align: center;
            max-width: 400px;
            width: 100%;
        }

        .success-icon {
            font-size: 48px;
            color: #4caf50;
            margin-bottom: 20px;
        }

        .success-icon svg {
            width: 60px;
            height: 60px;
        }

        .success-title {
            font-size: 24px;
            color: #333;
            margin: 0;
        }

        .success-message {
            font-size: 16px;
            color: #666;
            margin: 20px 0;
        }

        .success-button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: #ffffff;
            background-color: #4caf50;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .success-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="success-container">
        <div class="success-icon">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle">
                <path d="M9 11l3 3L22 4"></path>
                <circle cx="12" cy="12" r="10"></circle>
            </svg>
        </div>
        <h1 class="success-title">Request Completed Successfully!</h1>
        <p class="success-message">Thank you! Your request has been processed successfully. You will receive a confirmation email shortly.</p>
        <a href="index.php" class="success-button">Go to Homepage</a>
    </div>
</body>
</html>
