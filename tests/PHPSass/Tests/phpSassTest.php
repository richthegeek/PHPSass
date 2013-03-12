<?php

namespace PHPSass\Tests;

/**
 * PHP Sass tests.
 *
 * @group sass
 */
class PHPSassTest extends PHPSassTestCase
{
    public function testAlt()
    {
        $this->runSassTest('alt.sass');
        $this->runSassTest('alt.scss');
    }

    public function testBasic()
    {
        $this->runSassTest('basic.sass');
    }

    public function testComments()
    {
        $this->runSassTest('comments.sass');
    }

    public function testCompact()
    {
        $this->runSassTest('compact.sass');
    }

    public function testComplex()
    {
        $this->runSassTest('complex.sass');
    }

    public function testCompressed()
    {
        $this->runSassTest('compressed.sass');
    }

    public function testContent()
    {
        $this->runSassTest('content.scss');
    }

    public function testCss3()
    {
        $this->runSassTest('css3.scss');
    }

    public function testDefault()
    {
        $this->runSassTest('default.sass');
    }

    public function testEach()
    {
        $this->runSassTest('each.scss');
    }

    public function testExpanded()
    {
        $this->runSassTest('expanded.sass');
    }

    public function testExtend()
    {
        $this->runSassTest('extend.sass');
    }

    public function testExtendPlaceholders()
    {
        $this->runSassTest('extend_placeholders.scss');
    }

    public function testFilters()
    {
        $this->runSassTest('filters.scss');
    }

    public function testFunctions()
    {
        $this->runSassTest('functions.scss');
    }

    public function testHolmes()
    {
        $this->runSassTest('holmes.sass');
    }

    public function testHSLFunction()
    {
        $this->runSassTest('hsl-functions.scss');
    }

    public function testIf()
    {
        $this->runSassTest('if.sass');
    }

    public function testImportedContent()
    {
        $this->runSassTest('import_content.sass');
    }

    public function testInterpolation()
    {
        $this->runSassTest('interpolation.scss');
    }

    public function testIntrospection()
    {
        $this->runSassTest('introspection.scss');
    }

    public function testImport()
    {
        $this->runSassTest('import.sass');
    }

    public function testLineNumbers()
    {
        $this->runSassTest('line_numbers.sass');
    }

    public function testList()
    {
        $this->runSassTest('list.scss');
    }

    public function testMedia()
    {
        $this->runSassTest('media.scss');
    }

    public function testMiscFunctions()
    {
        $this->runSassTest('misc-functions.scss');
    }

    public function testMisc()
    {
        $this->runSassTest('misc.scss');
    }

    public function testMixinContent()
    {
        $this->runSassTest('mixin-content.sass');
        $this->runSassTest('mixin-content.scss');
    }

    public function testMixinJa1()
    {
        $this->runSassTest('mixin-ja1.sass');
    }

    public function testMixinParams()
    {
        $this->runSassTest('mixin-params.scss');
    }

    public function testMixins()
    {
        $this->runSassTest('mixins.sass');
    }

    public function testMultiline()
    {
        $this->runSassTest('multiline.sass');
    }

    public function testNestedImport()
    {
        $this->runSassTest('nested_import.sass');
    }

    public function testNested()
    {
        $this->runSassTest('nested.sass');
    }

    public function testNestedMedia()
    {
        $this->runSassTest('nested_media.scss');
    }

    public function testNestedPseudo()
    {
        $this->runSassTest('nested_pseudo.scss');
    }

    public function testNumber()
    {
        $this->runSassTest('number.scss');
    }

    public function testOpacity()
    {
        $this->runSassTest('opacity.scss');
    }

    public function testOtherColor()
    {
        $this->runSassTest('other-color.scss');
    }

    public function testParentRef()
    {
        $this->runSassTest('parent_ref.sass');
    }

    public function testProprietarySelector()
    {
        $this->runSassTest('proprietary-selector.scss');
    }

    public function testRGBFunctions()
    {
        $this->runSassTest('rgb-functions.scss');
    }

    public function testScssImportee()
    {
        $this->runSassTest('scss_importee.scss');
    }

    public function testScssImport()
    {
        $this->runSassTest('scss_import.scss');
    }

    public function testSplats()
    {
        $this->runSassTest('splats.scss');
    }

    public function testString()
    {
        $this->runSassTest('string.scss');
    }

    public function testUnits()
    {
        $this->runSassTest('units.sass');
    }

    public function testWarnImported()
    {
        $this->markTestIncomplete('This test has not been implemented yet.');
        //$this->runSassTest('warn_imported.sass');
    }

    public function testWarn()
    {
        $this->runSassTest('warn.sass');
    }
}
