<?php

class Database extends PDO
{
    function __construct()
    {
        parent::__construct('mysql:host='.DB_HOST.';dbname='.DB_NAME.';', DB_USER, DB_PASSWORD, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    }

}