<?php

class City extends AppModel{
    
    public function getLocations($variable)
    {
        return $this->query("SELECT c.ID AS Codigo, c.Name AS Ciudad, co.Name AS Pais FROM Cities c, "
                . "Countries co WHERE c.CountryCode = co.Code AND (c.Name LIKE '%".$variable."%' OR co.Name LIKE '%".$variable."%');");
    }
    
}
