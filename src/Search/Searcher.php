<?php

namespace MercuryHolidays\Search;

use PDOException;

class Searcher
{
   
    public function add(array $property): void
    {

        // TODO: Implement me

        //Add new property data
        try {

            $properties = array_merge(static::properties(), $property);

            if($properties)
            {
                // return $properties;
                echo "Property details added successfully";
            }
        
        }
        catch(PDOException $e) {

        echo "Error: " . $e->getMessage();

        }
    }

    public function search(int $roomsRequired, $minimum, $maximum)
    {

        $pros = static::properties();
        $result = [];
        $result1 = [];

        foreach($pros as $key => $val1)
        {
            foreach($pros[$key] as $key => $val)
            {
               if($key === 'room_price' && $val >= $minimum && $val <= $maximum)
               {
                 $result[] = $val1;
               }
            }
            
        }

        foreach($result as $val2)
        {
        if($val2['room_availability'] === 'True')
        {
          array_push($result1, $val2);
        }
            
        }
      
        $count = count($result1);

        // checking if required meet
        if(($roomsRequired != 0 ) && ($count >= $roomsRequired))
        {
            print_r($result1);
            return $result1;
        }
        else
        {
            return "The search result is not upto our required numbers of rooms";
        }
    }

    

    public static function properties()
    {
        return array(
            array(
                'room_name'=>'Room A', 
                'room_price'=>25.80,
                'room_no'=>1, 
                'room_floor'=>1,
                'room_availability'=>'False'

            ),
            array(
                'room_name'=>'Room A', 
                'room_price'=>25.80,
                'room_no'=>1, 
                'room_floor'=>2,
                'room_availability'=>'False'

            ),
            array(
                'room_name'=>'Room A', 
                'room_price'=>25.80,
                'room_no'=>1, 
                'room_floor'=>3,
                'room_availability'=>'True'

            ),
            array(
                'room_name'=>'Room A', 
                'room_price'=>25.80,
                'room_no'=>1, 
                'room_floor'=>4,
                'room_availability'=>'True'

            ),
            array(
                'room_name'=>'Room A', 
                'room_price'=>25.80,
                'room_no'=>1, 
                'room_floor'=>5,
                'room_availability'=>'False'

            ),
            array(
                'room_name'=>'Room A', 
                'room_price'=>30.10,
                'room_no'=>2, 
                'room_floor'=>6,
                'room_availability'=>'False'

            ),
            array(
                'room_name'=>'Room A', 
                'room_price'=>35.00,
                'room_no'=>2, 
                'room_floor'=>7,
                'room_availability'=>'True'

            ),
            array(
                'room_name'=>'Room B', 
                'room_price'=>45.80,
                'room_no'=>1, 
                'room_floor'=>1,
                'room_availability'=>'True'

            ),
            array(
                'room_name'=>'Room B', 
                'room_price'=>45.80,
                'room_no'=>1, 
                'room_floor'=>2,
                'room_availability'=>'False'

            ),
            array(
                'room_name'=>'Room B', 
                'room_price'=>45.80,
                'room_no'=>1, 
                'room_floor'=>3,
                'room_availability'=>'True'

            ),
            array(
                'room_name'=>'Room B', 
                'room_price'=>45.80,
                'room_no'=>1, 
                'room_floor'=>4,
                'room_availability'=>'True'

            ),
            array(
                'room_name'=>'Room B', 
                'room_price'=>45.80,
                'room_no'=>1, 
                'room_floor'=>5,
                'room_availability'=>'False'

            ),
            array(
                'room_name'=>'Room B', 
                'room_price'=>49.00,
                'room_no'=>2, 
                'room_floor'=>6,
                'room_availability'=>'False'

            ),
            array(
                'room_name'=>'Room B', 
                'room_price'=>49.00,
                'room_no'=>2, 
                'room_floor'=>7,
                'room_availability'=>'False'

            )
        );
    }

}
