<?php

    /*
     * -------------------------------------------------------------------------------
     * "THE BEER-WARE LICENSE" (Revision 42):
     * <kissparadigm@gmail.com> wrote this file. As long as you retain this notice you
     * can do whatever you want with this stuff. If we meet some day, and you think
     * this stuff is worth it, you can buy me a beer in return KissParadigm
     * -------------------------------------------------------------------------------
     */

    namespace KissParadigm\LaravelMaintenance\Providers;

    use KissParadigm\LaravelMaintenance\Libraries\Maintenance;
    use KissParadigm\LaravelPackage\Providers\ServiceProvider as KissParadigmServiceProvider;

    class ServiceProvider extends KissParadigmServiceProvider {

        public function boot() {
            parent::boot();
            \Blade::directive('maintenance', function () {
                return "<?php if (maintenance_enabled()): ?>";
            });
            \Blade::directive('endmaintenance', function () {
                return "<?php endif; ?>";
            });
        }

        public function register() {
            parent::register();
            \App::singleton('maintenance', function () {
                return new Maintenance();
            });
        }

    }
