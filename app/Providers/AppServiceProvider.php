<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
    
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('dateStatusBackgroundColor', function ($exmpleDate) {
             
            $formattedDate = Carbon::parse($exmpleDate)->format('Y-m-d');
            $today = Carbon::now()->format('Y-m-d');
            
            if ($formattedDate < $today) {
                return  "<?php echo 'grey'; ?>"; 
            } elseif ($formattedDate === $today) {
                return  "<?php echo 'green'; ?>"; 
            } else {
                return  "<?php echo 'red'; ?>"; 
            
            }
        });
    }
}
