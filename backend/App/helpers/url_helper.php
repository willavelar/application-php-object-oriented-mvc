<?php

function redirect(string $page) : void
{
    header('location: ' . URLROOT . $page);
}