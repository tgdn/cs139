<?php

class Utils {

    public static function login_required() {
        global $user, $config;
        if (!$user->is_authenticated()) {
            // redirect
            header('Location: ' . $config['LOGIN_URL']);
        }
    }

    public static function anonymous_required() {
        global $user, $config;
        if (!$user->is_anonymous()) {
            header('Location: ' . $config['LOGIN_REDIRECT_URL']);
        }
    }

    public static function url($key) {
        global $routes;

        if (array_key_exists($key, $routes)) {
            return $routes[$key];
        } else {
            return '';
        }
    }

    public static function escape($str) {
        return htmlspecialchars(strip_tags($str), ENT_QUOTES, 'utf-8');
    }

}

?>
