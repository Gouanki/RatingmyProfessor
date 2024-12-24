<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border: 1px solid #e3e6f0;
            border-radius: 8px;
            overflow: hidden;
        }

        .email-header {
            text-align: center;
            background-color: #d62839;
            color: white;
            padding: 20px;
        }

        .email-header img {
            max-width: 80%;
            height: auto;
        }

        .email-body {
            padding: 20px;
        }

        .myButton {
            box-shadow: inset 0px 1px 0px 0px #97c4fe;
            background: linear-gradient(to bottom, #3d94f6 5%, #1e62d0 100%);
            background-color: #3d94f6;
            border-radius: 6px;
            border: 1px solid #337fed;
            display: inline-block;
            cursor: pointer;
            color: #ffffff;
            font-family: Arial;
            font-size: 15px;
            font-weight: bold;
            padding: 8px 24px;
            text-decoration: none;
            text-shadow: 0px 1px 0px #1570cd;
        }

        .myButton:hover {
            background: linear-gradient(to bottom, #1e62d0 5%, #3d94f6 100%);
            background-color: #1e62d0;
        }

        .myButton:active {
            position: relative;
            top: 1px;
        }


        .email-footer {
            background-color: #f8f9fa;
            text-align: center;
            padding: 10px;
            font-size: 12px;
            color: #6c757d;
        }
    </style>
</head>

<body>
    <div class="email-container">
        <!-- Header Section with Image -->
        <div class="email-header">
            <img src="https://its.final.edu.tr/images/logo/logo6.png" alt="Company Logo">
        </div>
        <!-- Body Section -->
        <div class="email-body">
            <h2 class="text-center">Email vefication</h2>
            <p>Hi, {{ $name }}</p>
            <p>You recently created an account on rating my professor. To access your account please click on the
                confirmation button below</p>
            <div class="text-center">
                <a href="{{ url('/confirmsub/' . $token) }}" class="myButton">Confirm</a>
            </div>
            <p>Thanks,<br>The {{ config('app.name') }} Team (Adeshola, Traore)</p>
        </div>
        <!-- Footer Section -->
        <div class="email-footer">
            &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
        </div>
    </div>
</body>

</html>
