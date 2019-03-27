<?php

namespace Butschster\Tests\MetaTags;

use Butschster\Tests\TestCase;

class KeywordsMetaTagsTest extends TestCase
{
    function test_keywords_from_array_can_be_set()
    {
        $meta = $this->makeMetaTags();

        $meta->setKeywords(['keyword1', 'keyword2']);

        $this->assertEquals(
            '<meta name="keywords" content="keyword1, keyword2">',
            $meta->getKeywords()->toHtml()
        );
    }

    function test_keywords_from_string_can_be_set()
    {
        $meta = $this->makeMetaTags();

        $meta->setKeywords('keyword1, keyword2');

        $this->assertEquals(
            '<meta name="keywords" content="keyword1, keyword2">',
            $meta->getKeywords()->toHtml()
        );
    }

    function test_set_keywords_method_should_be_fluent()
    {
        $meta = $this->makeMetaTags();

        $this->assertEquals($meta, $meta->setKeywords('keyword1'));
    }

    function test_keywords_should_be_null_if_not_set()
    {
        $meta = $this->makeMetaTags();

        $this->assertNull($meta->getKeywords());
    }

    function test_keywords_string_should_be_cleaned()
    {
        $meta = $this->makeMetaTags();

        $meta->setKeywords('<h5>keyword1, keyword2</h5>');

        $this->assertEquals(
            '<meta name="keywords" content="keyword1, keyword2">',
            $meta->getKeywords()->toHtml()
        );

        $meta->setKeywords(['<h5>keyword1</h5>', '<h5>keyword2</h5>']);
        $this->assertEquals(
            '<meta name="keywords" content="keyword1, keyword2">',
            $meta->getKeywords()->toHtml()
        );
    }
}