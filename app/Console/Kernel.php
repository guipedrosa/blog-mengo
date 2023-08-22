<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
        
        $schedule->call(function() {

            // active products list
            $products = DB::table('products')
                            ->where('actual_price', '>', 'final_price')
                            ->where('qty_in_stock', '>', 0)
                            ->get();
            
            foreach($products as $product) {
                $new_price = $product->actual_price - rand(1, 9);

                if ($new_price > $product->final_price) { // do not override Final Price
                    DB::table('products')->where('id', $product->id)->update(
                         ['actual_price' => $new_price ]
                    );
                } else {
                    // stop price at Final Price
                    DB::table('products')->where('id', $product->id)->update(
                        ['actual_price' => $product->final_price ]
                   );
                }
            }

        })->everyFiveSeconds();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
