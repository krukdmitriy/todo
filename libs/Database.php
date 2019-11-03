<?php

class Database extends PDO
{
    function __construct()
    {
        parent::__construct('mysql:host=mysql.zzz.com.ua;dbname=noravvv;', 'todotodousr', 'qWAfYiHZ_AZq59Y', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    }

}