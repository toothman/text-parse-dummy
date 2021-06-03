<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use ArrayParser;

class DummyTest extends TestCase
{

    /**
     * @test
     */
    public function oneDateWordTest()
    {
    	$date = date("d-m-Y");
        $this->assertContains($date ,$result = ArrayParser::Parse('Heute kochen'));
    }

    /**
     * @test
     */
    public function oneDateFormatedTest()
    {
        $this->assertContains('04.11.1995' ,$result = ArrayParser::Parse('04.11.1995 kochen'));
    }


    /**
     * @test
     */
    public function oneWordAndDateTest()
    {
    	$date = date("d-m-Y");
    	$date = date("d-m-Y", strtotime($date. ' +1 day'));
        $this->assertContains($date ,$result = ArrayParser::Parse('Morgen kochen fur 05.06.2021'));
    }

    /**
     * @test
     */
    public function twoWordDateTest()
    {
    	$date = date("d-m-Y");
        $this->assertContains($date ,$result = ArrayParser::Parse('Heute kochen als Gestern'));
    }

    /**
     * @test
     */
    public function oneTagTest()
    {
        $this->assertContains('pizza' ,$result = ArrayParser::Parse('Morgen kochen #pizza'));
    }

    /**
     * @test
     */
    public function multipleTagTest()
    {
        $this->assertContains('lecker, pizza' ,$result = ArrayParser::Parse('#lecker Morgen kochen #pizza'));
    }

    /**
     * @test
     */
    public function onePriorityTest()
    {
        $this->assertContains('4',$result = ArrayParser::Parse('#lecker Morgen kochen #pizza !p4'));
    }
    
    /**
     * @test
     */
    public function multiplePriorityTest()
    {
        $this->assertContains('2',$result = ArrayParser::Parse('#lecker Morgen !P2 kochen #pizza !p4'));
    }
    
    /**
     * I know it is not recomended to have multiple arretions in one test, I was just curious about the result ;)
     * @test
     */
    public function allTest()
    {
    	$date = date("d-m-Y");
        $this->assertContains('lecker, pizza',$result = ArrayParser::Parse('#lecker Heute kochen #pizza !p4'));
        $this->assertContains($date,$result = ArrayParser::Parse('#lecker Heute kochen #pizza !p4'));
        $this->assertContains('4',$result = ArrayParser::Parse('#lecker Heute kochen #pizza !p4'));
    }
}
