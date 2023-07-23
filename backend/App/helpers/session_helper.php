<?php

session_start();

function flash(string $name, string $message = '', string $class = 'alert alert-success') : void
{
    if (empty($name)) {
        return;
    }

    if (!empty($message)) {

        if (!empty($_SESSION[$name])) {
            unset($_SESSION[$name]);
        }

        if (!empty($_SESSION[$name.'_class'])) {
            unset($_SESSION[$name.'_class']);
        }

        $_SESSION[$name] = $message;
        $_SESSION[$name.'_class'] = $class;
        return;
    }

    if (!empty($_SESSION[$name])) {

        $class =  $_SESSION[$name . '_class'] ?? '';

        echo sprintf('<div class="%s" id="msg-flash">%s</div>', $class, $_SESSION[$name]);

        unset($_SESSION[$name]);
        unset($_SESSION[$name.'_class']);
    }


}

function isLoggedIn() : bool
{
    return (isset($_SESSION['user_id']));
}