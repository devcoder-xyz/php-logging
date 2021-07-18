<?php


use PHPUnit\Framework\TestCase;
use Psr\Log\LogLevel;

class FileHandlerTest extends TestCase
{

    /**
     * @var string
     */
    private $tmpFile;

    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->tmpFile = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'var' . DIRECTORY_SEPARATOR . 'log' . DIRECTORY_SEPARATOR . date('Y-m-d') . '.log';
        if (file_exists($this->tmpFile)) {
            unlink($this->tmpFile);
        }
    }

    public function testCreateDir()
    {
        $tmp_dir = dirname($this->tmpFile);
        if (is_dir($tmp_dir)) {
            rmdir($tmp_dir);
        }
        new \DevCoder\Log\Handler\FileHandler($this->tmpFile);
        $this->assertTrue(is_dir($tmp_dir));
    }

    public function testWriteInFile()
    {
        $handler = new \DevCoder\Log\Handler\FileHandler($this->tmpFile);
        $vars = [
            'message' => 'is a test',
            'level' => strtoupper(LogLevel::INFO),
            'timestamp' => (new \DateTimeImmutable())->format('c'),
        ];
        $handler->handle($vars);

        $this->assertTrue(file_exists($this->tmpFile));
        $fileObject = new \SplFileObject($this->tmpFile);
        $line = $fileObject->current();
        $this->assertEquals($line, sprintf('%s [%s]: %s' . PHP_EOL, $vars['timestamp'], $vars['level'], $vars['message']));

        unlink($this->tmpFile);
    }
}