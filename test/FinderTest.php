<?php namespace SimilarText\Test;

use \SimilarText\Finder;

/**
 * Class FinderTest
 * @package SimilarText\Test
 */
class FinderTest extends \PHPUnit_Framework_TestCase
{
    public function testOk() {
        $this->assertTrue(true);
    }

    public function testFirst() {
        // Init Similar Text Finder with a needle and a haystack
        $text_finder = new \SimilarText\Finder('bananna', ['apple', 'banana', 'kiwi']);

        // Get first similar word (it's banana)
        //echo $text_finder->first();
        $this->expectOutputString($text_finder->first());
        print('banana');
    }

    public function testAll() {
        $finder = new Finder('tmatoes', ['salad', 'tomatoes', 'onions', 'mates']);
        $this->assertEquals('tomatoes, mates, onions, salad', implode(', ', $finder->all()));
    }

    public function testHasExactMatch() {
        $haystack = ['salad', 'tomatoes', 'onions', 'mates'];

        $finder = new Finder('salad', $haystack);
        $this->assertTrue($finder->hasExactMatch());
    }
}
