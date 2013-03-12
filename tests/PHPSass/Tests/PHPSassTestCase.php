<?php

namespace PHPSass\Tests;

abstract class PHPSassTestCase extends \PHPUnit_Framework_TestCase
{
    /**
     * This is the path to a directory of SASS, SCSS and CSS files used in tests.
     */
    protected $css_tests_path;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        parent::setUp();

        $this->css_tests_path = TEST_FILES_DIR;
    }

    protected function runSassTest($input, $output = FALSE, $settings = array())
    {
        $name = $input;

        $path = $this->css_tests_path;
        $output = $path . DIRECTORY_SEPARATOR . ($output ? $output : preg_replace('/\..+$/', '.css', $input));
        $input = $path . DIRECTORY_SEPARATOR . $input;

        if (!file_exists($input)) {
            throw new \ErrorException(sprintf('Input file "%s", not found', $input));
        }

        if (!file_exists($output)) {
            throw new \ErrorException(sprintf('Comparison file "%s", not found', $output));
        }

        $syntax = explode('.', $input);
        $syntax = array_pop($syntax);
        $settings = $settings + array(
            'style' => 'nested',
            'cache' => false,
            'syntax' => $syntax,
            'debug' => false,
            'debug_info' => false,
            'callbacks' => array(
                'debug' => array($this, 'sassParserDebug'),
                'warn' => array($this, 'sassParserWarning'),
            ),
        );
        $parser = new \SassParser($settings);
        $result = $parser->toCss($input);

        $compare = file_get_contents($output);
        if ($compare === FALSE) {
            $this->fail('Unable to load comparison file - ' . $compare);
        }

        $_result = $this->trimResult($result);
        $_compare = $this->trimResult($compare);

        $this->assertEquals($_result, $_compare, 'Result for ' . $name . ' did not match comparison file');
    }

    /**
     * Logging callback for PHPSass debug messages.
     */
    public function sassParserDebug($message, $context)
    {

    }

    /**
     * Logging callback for PHPSass warning messages.
     */
    public function sassParserWarning($message, $context)
    {

    }

    protected function trimResult(&$input)
    {
        $trim = preg_replace('/[\s;]+/', '', $input);
        $trim = preg_replace('/\/\*.+?\*\//m', '', $trim);
        return $trim;
    }
}