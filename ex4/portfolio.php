<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Portfolio</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <style>
          body {
            background: linear-gradient(120deg, #f6d365 0%, #fda085 100%);
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .portfolio {
            max-width: 700px;
            padding: 30px;
            width: 500px;
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .portfolio:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
        }
        .portfolio img {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            display: block;
            margin: 0 auto;
            animation: bounceIn 2s;
        }
        .portfolio h2 {
            text-align: center;
            margin-top: 20px;
            font-size: 28px;
            font-weight: 700;
        }
        .portfolio .details {
            margin-top: 20px;
            text-align: center;
        }
        .portfolio .details p {
            font-size: 20px;
            margin-bottom: 10px;
        }
        @keyframes bounceIn {
            0% {
                transform: scale(0.5);
                opacity: 0;
            }
            80% {
                transform: scale(1.2);
                opacity: 1;
            }
            100% {
                transform: scale(1);
            }
        }
    </style>
</head>
<body>
    <div class="portfolio">
        <img id="profilePicture" src="https://via.placeholder.com/200" alt="Profile Picture">
        <h2 id="fullName">Loading...</h2>
        <div class="details">
            <p><strong>Email:</strong> <span id="email">Loading...</span></p>
            <p><strong>Phone:</strong> <span id="phone">Loading...</span></p>
            <p><strong>Address:</strong> <span id="address">Loading...</span></p>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script>
        $(document).ready(function() {
            var apiUrl = 'api.php?action=person&id=<?php echo isset($_GET['id']) ? intval($_GET['id']) : 1; ?>';
            $.getJSON(apiUrl, function(data) {
                $('#profilePicture').attr('src', 'https://via.placeholder.com/200'); 
                $('#fullName').text(data.first_name + ' ' + data.last_name);
                $('#email').text(data.email);
                $('#phone').text(data.phone);
                $('#address').text(data.address);
            }).fail(function(jqXHR, textStatus, errorThrown) {
                console.error('Error fetching data:', textStatus, errorThrown);
                $('#fullName').text('Error fetching data');
                $('.details').hide();
            });
        });
    </script>
</body>
</html>
