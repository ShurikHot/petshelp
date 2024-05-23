<?php

namespace App\Jobs;

use App\Mail\NewsSubscribe;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendNewsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;
    protected $news;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user, $news)
    {
        $this->user = $user;
        $this->news = $news;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $nameOrEmail = $this->user->name ?? $this->user->email;
        Mail::to($this->user)->send(new NewsSubscribe($nameOrEmail, $this->news));
    }
}
