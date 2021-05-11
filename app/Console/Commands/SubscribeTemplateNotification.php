<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Mail;

class SubscribeTemplateNotification extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'subsscribe_template:notification {productId}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sends an email to users of subscribe template';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $productId = $this->argument('productId');
        if ($productId) {
            $product = \App\Models\Product::find($productId);
            if ($product) {
                $emails = \App\User::pluck('email')->toArray();
                $data = [
                    'subject' => 'New Product added',
                    'template' => 'emails.subscribe_template_email',
                    'product' => $product
                ];
                foreach ($emails as $email) {
                    Mail::to($email)
                            ->send(new \App\Mail\Mailer($data));
                }
                $this->info('Mail send successfully');
                return;
            }
            $this->info('No product found correspoding to ' . $productId);
        }
        $this->info('Please enter product id');
    }

}
