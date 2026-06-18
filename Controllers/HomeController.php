<?php

class HomeController
{
    public function __construct()
    {
    }

    public function renderHome(): void
    {
        include __DIR__ . '/../views/home.php';
    }
}
