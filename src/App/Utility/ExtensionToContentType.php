<?php declare(strict_types=1);

namespace App\Utility {

    function extensionToContentType(string $filePath) :string
    {
        if (file_exists($filePath) === true) {
            $fileInfo = \pathinfo($filePath);

            if (array_key_exists('extension', $fileInfo)) {
                switch ($fileInfo['extension']) {
                    case 'css':
                        return 'text/css';
                    case 'html':
                        return 'text/html';
                    case 'js':
                        return 'application/javascript';
                    case 'json':
                        return 'application/json';
                    case 'pdf':
                        return 'application/pdf';
                    case 'xml':
                        return 'application/xml';
                    case 'jpg':
                    case 'jpeg':
                        return 'image/jpeg';
                    case 'png':
                        return 'image/png';
                    case 'gif':
                        return 'image/gif';
                }
            }
        }

        return 'text/plain';
    }

}