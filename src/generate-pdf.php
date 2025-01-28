<?php
require 'vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;

// Get form data
$name = $_POST['name'] ?? 'Guest';
$email = $_POST['email'] ?? 'guest@example.com';

// Create HTML content
$html = "
<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .header {
            background-color: #f4f4f4;
            padding: 20px;
            margin-bottom: 20px;
        }
        .content {
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class='header'>
        <h1>User Information</h1>
    </div>
    <div class='content'>
        <p><strong>Name:</strong> {$name}</p>
        <p><strong>Email:</strong> {$email}</p>
        <p>Generated on: " . date('Y-m-d H:i:s') . "</p>
    </div>
</body>
</html>
";

// Configure DomPDF
$options = new Options();
$options->set('isHtml5ParserEnabled', true);
$options->set('isPhpEnabled', true);

// Create new PDF instance
$dompdf = new Dompdf($options);

// Load HTML content
$dompdf->loadHtml($html);

// Set paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render PDF
$dompdf->render();

// Output PDF
header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="user_info.pdf"');
echo $dompdf->output();
