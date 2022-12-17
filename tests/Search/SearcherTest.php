<?php

namespace Tests\Search;

use MercuryHolidays\Search\Searcher;
use PHPUnit\Framework\TestCase;

class SearcherTest extends TestCase
{

    public function testAddNewProperties()
    {
        $searcher = new Searcher();
        $exp = $searcher->add(array('room_name'=>'Room D', 'room_price'=>55.00,'room_no'=>14, 'room_floor'=>3,'room_availability'=>'True'));
        $this->expectOutputString('Property details added successfully');
    }

    public function testSearchDoesReturnEmptyArray()
    {
        $searcher = new Searcher();
        $exp = $searcher->search(0,'0','0');
        $this->assertSame('The search result is not upto our required numbers of rooms', $exp);
    }

    public function testSearchDoesReturnArrayOfProperties()
    {
        $searcher = new Searcher();
        $exp = $searcher->search(2, '20', '30');
        $this->assertIsArray($exp);
    }

}
