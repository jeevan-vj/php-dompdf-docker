# PHP DomPDF Docker

This project sets up a Docker environment for running PHP with DomPDF. DomPDF is a PHP library that converts HTML to PDF.

## Prerequisites

- Docker
- Docker Compose

## Setup

1. Clone the repository:
    ```sh
    git clone https://github.com/jeevan-vj/php-dompdf-docker.git
    cd php-dompdf-docker
    ```

2. Build and start the Docker containers:
    ```sh
    docker-compose up --build
    ```

3. Access the application:
    Open your web browser and navigate to `http://localhost:8000`.

## Usage

Place your PHP files in the `src` directory. The `index.php` file is the entry point.

### Example

Here is an example of how to use DomPDF in your PHP code to generate a PDF:

```php
require 'vendor/autoload.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$dompdf->loadHtml('<h1>Hello, World!</h1>');
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream('document.pdf', ['Attachment' => 0]);
```

This code will generate a PDF from the HTML content and stream it to the browser.


