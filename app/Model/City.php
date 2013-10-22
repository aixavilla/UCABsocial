<?php

class City extends AppModel{
    
    public function getLocations()
    {
        return $this->query("SELECT c.ID AS Codigo, c.Name AS Ciudad, co.Name AS Pais FROM Cities c, Country co WHERE c.CountryCode = co.Code LIMIT 100;");
    }
    
}
