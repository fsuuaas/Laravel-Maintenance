<?php

    /*
     * -------------------------------------------------------------------------------
     * "THE BEER-WARE LICENSE" (Revision 42):
     * <kissparadigm@gmail.com> wrote this file. As long as you retain this notice you
     * can do whatever you want with this stuff. If we meet some day, and you think
     * this stuff is worth it, you can buy me a beer in return KissParadigm
     * -------------------------------------------------------------------------------
     */

    namespace KissParadigm\LaravelMaintenance\Libraries;

    class Maintenance {

        public function enable() {
            \Artisan::call('down');
            return $this->isEnabled();
        }

        public function start() {
            return $this->enable();
        }

        public function isEnabled() {
            return \App::isDownForMaintenance();
        }

        public function disable() {
            \Artisan::call('up');
            return $this->isDisabled();
        }

        public function stop() {
            return $this->disable();
        }

        public function isDisabled() {
            return !\App::isDownForMaintenance();
        }

        public function status($enabled = null, $disabled = null) {
            $enabled  = (empty($enabled)) ? \Config::get('laravel-maintenance.status.enabled') : $enabled;
            $disabled = (empty($disabled)) ? \Config::get('laravel-maintenance.status.disabled') : $disabled;
            return \App::isDownForMaintenance() ? $enabled : $disabled;
        }

    }
