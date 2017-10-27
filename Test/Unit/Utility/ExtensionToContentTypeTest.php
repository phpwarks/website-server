<?php namespace Test\Unit\Utility;
use function App\Utility\extensionToContentType;
use PHPUnit\Framework\TestCase;

final class ExtensionToContentTypeTest extends TestCase
{

    /**
     * @dataProvider files
     *
     * @param string $file
     * @param string $expect
     */
    public function test_various_file_extensions_give_the_correct_mime_type($file, $expect)
    {
        $this->assertSame($expect, extensionToContentType($file));
    }

    /**
     * @return array
     */
    public function files()
    {
        return [
            [__DIR__ . '/Fixtures/MimeTypes/foo.css', 'text/css'],
            [__DIR__ . '/Fixtures/MimeTypes/foo.html', 'text/html'],
            [__DIR__ . '/Fixtures/MimeTypes/foo.js', 'application/javascript'],
            [__DIR__ . '/Fixtures/MimeTypes/foo.json', 'application/json'],
            [__DIR__ . '/Fixtures/MimeTypes/foo.pdf', 'application/pdf'],
            [__DIR__ . '/Fixtures/MimeTypes/foo.xml', 'application/xml'],
            [__DIR__ . '/Fixtures/MimeTypes/foo.jpg', 'image/jpeg'],
            [__DIR__ . '/Fixtures/MimeTypes/foo.jpeg', 'image/jpeg'],
            [__DIR__ . '/Fixtures/MimeTypes/foo.png', 'image/png'],
            [__DIR__ . '/Fixtures/MimeTypes/foo.gif', 'image/gif'],
        ];
    }
}
