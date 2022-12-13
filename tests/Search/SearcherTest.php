<?php

namespace Tests\Search;

use MercuryHolidays\Search\Searcher;
use PHPUnit\Framework\TestCase;

class SearcherTest extends TestCase
{

    public function testAddNewProperties()
    {
        $searcher = new Searcher();
        $searcher->add(array('room_name'=>'Room D', 'room_price'=>30,'room_no'=>1, 'room_floor'=>3,'room_availability'=>1));
        $this->expectOutputString('Property details added successfully.');
    }

    public function testSearchDoesReturnEmptyArray()
    {
        $searcher = new Searcher();
        $exp = $searcher->search(0, '0', '0');
        $this->assertSame('The search result is not upto our required numbers of rooms', $exp);
    }

    public function testSearchDoesReturnArrayOfProperties()
    {
        $searcher = new Searcher();
        $exp = $searcher->search(1, '30', '40');
        $this->assertSame(array(), $exp);
    }

}
