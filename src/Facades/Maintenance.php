<?php

    /*
     * -------------------------------------------------------------------------------
     * "THE BEER-WARE LICENSE" (Revision 42):
     * <kissparadigm@gmail.com> wrote this file. As long as you retain this notice you
     * can do whatever you want with this stuff. If we meet some day, and you think
     * this stuff is worth it, you can buy me a beer in return KissParadigm
     * -------------------------------------------------------------------------------
     */

    namespace KissParadigm\LaravelMaintenance\Facades;

    use Illuminate\Support\Facades\Facade;

    class Maintenance extends Facade {

        protected static function getFacadeAccessor() {
            return 'maintenance';
        }

    }
