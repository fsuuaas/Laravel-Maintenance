<?php

    /*
     * -------------------------------------------------------------------------------
     * "THE BEER-WARE LICENSE" (Revision 42):
     * <kissparadigm@gmail.com> wrote this file. As long as you retain this notice you
     * can do whatever you want with this stuff. If we meet some day, and you think
     * this stuff is worth it, you can buy me a beer in return KissParadigm
     * -------------------------------------------------------------------------------
     */

    if (!function_exists('maintenance_enable')) {
        function maintenance_enable() {
            return app('maintenance')->enable();
        }
    }

    if (!function_exists('maintenance_start')) {
        function maintenance_start() {
            return app('maintenance')->start();
        }
    }

    if (!function_exists('maintenance_disable')) {
        function maintenance_disable() {
            return app('maintenance')->disable();
        }
    }

    if (!function_exists('maintenance_stop')) {
        function maintenance_stop() {
            return app('maintenance')->stop();
        }
    }

    if (!function_exists('maintenance_enabled')) {
        function maintenance_enabled() {
            return app('maintenance')->isEnabled();
        }
    }

    if (!function_exists('maintenance_disabled')) {
        function maintenance_disabled() {
            return app('maintenance')->isDisabled();
        }
    }

    if (!function_exists('maintenance_status')) {
        function maintenance_status($enabled = null, $disabled = null) {
            return app('maintenance')->status($enabled, $disabled);
        }
    }

