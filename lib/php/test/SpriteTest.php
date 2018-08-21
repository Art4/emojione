<?php

namespace Emojione\Test;

use Emojione\Emojione;
use Emojione\Client;

class SpriteTest extends \PHPUnit_Framework_TestCase
{

    /**
     * prepare SpriteTest
     */
    protected function setUp()
    {
        $client = new Client;
        $client->sprites = true;
        $client->unicodeAlt = true;
        Emojione::setClient($client);
    }

    /**
     * prepare SpriteTest
     */
    protected function tearDown()
    {
        Emojione::setClient(new Client);
    }

    /**
     * test Emojione::toImage()
     *
     * @return void
     */
    public function testToImage()
    {
        $test     = 'Hello world! 😄 :smile:';
        $expected = 'Hello world! <span class="emojione emojione-32-people _1f604" title=":smile:">😄</span> <span class="emojione emojione-32-people _1f604" title=":smile:">&#x1f604;</span>';

        $this->assertEquals($expected, Emojione::toImage($test));
    }

    /**
     * test Emojione::shortnameToImage()
     *
     * @return void
     */
    public function testShortnameToImage()
    {
        $test     = 'Hello world! 😄 :smile:';
        $expected = 'Hello world! 😄 <span class="emojione emojione-32-people _1f604" title=":smile:">&#x1f604;</span>';

        $this->assertEquals($expected, Emojione::shortnameToImage($test));
    }

    /**
     * test Emojione::unicodeToImage()
     *
     * @return void
     */
    public function testUnicodeToImage()
    {
        $test     = 'Hello world! 😄 :smile:';
        $expected = 'Hello world! <span class="emojione emojione-32-people _1f604" title=":smile:">😄</span> :smile:';

        $this->assertEquals($expected, Emojione::unicodeToImage($test));
    }
}
