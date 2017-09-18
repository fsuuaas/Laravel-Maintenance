<?php

    /*
     * -------------------------------------------------------------------------------
     * "THE BEER-WARE LICENSE" (Revision 42):
     * <kissparadigm@gmail.com> wrote this file. As long as you retain this notice you
     * can do whatever you want with this stuff. If we meet some day, and you think
     * this stuff is worth it, you can buy me a beer in return KissParadigm
     * -------------------------------------------------------------------------------
     */

    namespace KissParadigm\LaravelMaintenance\Middleware;

    use Closure;
    use Illuminate\Foundation\Http\Exceptions\MaintenanceModeException;

    class Maintenance {

        public function handle($request, Closure $next) {
            if (\App::isDownForMaintenance() && !$this->exceptIp() && !$this->exceptRoute()) {
                $data = json_decode(file_get_contents(storage_path() . '/framework/down'), true);
                throw new MaintenanceModeException($data['time'], $data['retry'], $data['message']);
            }
            return $next($request);
        }

        private function exceptIp() {
            return array_str_is(\Request::ip(), \Config::get('laravel-maintenance.except_ips'));
        }

        private function exceptRoute() {
            return array_str_is(\Route::currentRouteName(), \Config::get('laravel-maintenance.except_routes'));
        }

    }
