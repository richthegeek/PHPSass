<?php
namespace Sass;
use SassParser;
use SassRenderer;
use PHPUnit_Framework_TestCase;

class CompileTest extends PHPUnit_Framework_TestCase {

    /**
     * @dataProvider provideFiles
     */
    public function testCompile($scss_file, $css_file) {
        // Check both files exist
        $this->assertFileExists($scss_file);
        $this->assertFileExists($css_file);

        // Get the real path for human output
        $scss_file = realpath($scss_file);
        $css_file = realpath($css_file);

        // Read the CSS data, and strip white space/replace quotes
        $css_data = preg_replace('/\s/', '', file_get_contents($css_file));
        $css_data = str_replace(array('"', "'"), "'", $css_data);

        // Parse the SCSS
        $parser = new SassParser(array(
            'cache' => false,
        ));
        $result = $parser->parse($scss_file);
        // Strip white space and replace quotes in the rendered CSS
        $scss_data = preg_replace('/\s/', '', $result->render());
        $scss_data = str_replace(array('"', "'"), "'", $scss_data);

        // Test the data is the same
        $this->assertSame($css_data, $scss_data, "$scss_file -> $css_file");
    }

    public function provideFiles() {
        $result = array();
        foreach (glob(__DIR__.'/../../tests/*.scss') as $file) {
            $result[] = array($file, substr($file, 0, -5) . '.css');
        }
        foreach (glob(__DIR__.'/../../tests/*.sass') as $file) {
            $result[] = array($file, substr($file, 0, -5) . '.css');
        }
        return $result;
    }

}
