<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendMobileTextMessageJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $text;
    public $mobile;

    /**
     * Create a new job instance.
     */
    public function __construct($text, $mobile)
    {
        $this->text = $text;
        $this->mobile = $mobile;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Send Mobile Text Message via any provider.
    }
}
