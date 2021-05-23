<?php

namespace App\Jobs;

use App\Factory\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProductJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $request;
    public $user_id;

    public function __construct($request, $user_id)
    {
        $this->request = $request;
        $this->user_id = $user_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
         $product =  \App\Factory\ProductFactory::create($this->request);

        \App\Models\Product::updateOrCreate([
            'user_id' => $this->user_id,
            'name' => $product->name(),
            'category' => $product->category()
         ],[
            'price' => $product->price()
         ]);

    }
}
