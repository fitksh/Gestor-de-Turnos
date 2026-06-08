<?php

class HomeController
{
    public function __construct(private PDO $db)
    {
    }

    public function index(): void
    {
        include __DIR__ . '/../views/home.php';
    }
}
