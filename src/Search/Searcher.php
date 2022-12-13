<?php

namespace MercuryHolidays\Search;

use PDO;
use PDOException;
use MercuryHolidays\Search\Conn;

class Searcher
{
   
    public function add(array $property): void
    {

        // TODO: Implement me
        $conn = (new Conn)->newDB();

        //Add new property data
        try {
        $stmt = $conn->prepare("INSERT INTO properties (room_name, room_no, room_floor, room_availability, room_price)
        VALUES (:room_name, :room_no, :room_floor, :room_availability, :room_price)");
        $stmt->bindParam(':room_name', $property['room_name']);
        $stmt->bindParam(':room_no', $property['room_no']);
        $stmt->bindParam(':room_price', $property['room_price']);
        $stmt->bindParam(':room_availability', $property['room_availability']);
        $stmt->bindParam(':room_floor', $property['room_floor']);
        $stmt->execute();
        if($stmt)
        {
            echo "Property details added successfully.";
        }
        
        }
        catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
        }
        $conn = null;
    }

    public function search(int $roomsRequired, $minimum, $maximum)
    {
        $conn = (new Conn)->newDB();
        try {
            $stmt = $conn->prepare("SELECT room_name, room_no, room_floor, room_availability, room_price FROM properties WHERE room_availability='True' AND room_price >=$minimum AND room_price<=$maximum");
            $stmt->execute();
          
            // set the resulting array to associative
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            
            $count = count($stmt->fetchAll());
            
            // checking if required meet
            if(($roomsRequired != 0 ) && ($count >= $roomsRequired))
            {
                return $stmt->fetchAll();
            }
            else
            {
                return "The search result is not upto our required numbers of rooms";
            }
          }
          catch(PDOException $e) {
            return "Error: " . $e->getMessage();
          }
          $conn = null;
    }
}
