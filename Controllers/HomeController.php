<?php

class HomeController
{
    public function __construct()
    {
    }

    public function index(): void
    {
        include __DIR__ . '/../views/home.php';
    }
}
