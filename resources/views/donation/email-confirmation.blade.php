<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Donation Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #0066cc;
        }
        .content {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Thank You for Your Donation</h1>
        <p>Dear {{ $userForm->surname }} {{ $userForm->givenName }},</p>
        <p>We are writing to express our heartfelt gratitude for your generous donation. Your support plays a crucial role in enabling us to continue our mission and make a meaningful impact.</p>
        <div class="content">
            <p><strong>Donation Details:</strong></p>
            <p>Transaction ID: #{{ $userFormId }}</p>
            <p>Donation Amount: RM{{ $donationAmount }}</p>
            <p>Date: {{ now()->format('d M Y') }}</p>
        </div>
        <p>We have attached an image of your donation details as a confirmation of your generous contribution. Please keep it as a reference.</p>
        <p>If you have any questions or require further information, please do not hesitate to contact us.</p>
        <p>Once again, thank you for your kindness and generosity. Together, we can make a difference.</p>
        <p>Warmest regards,</p>
        <p><strong>The Team at Lingyun Temple</strong></p>
    </div>
</body>
</html>
