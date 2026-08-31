<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;

#[Signature('app:delete-expired-users')]
#[Description('Command description')]
class DeleteExpiredUsers extends Command
{
    /**
     * Execute the console command.
     */
    public function handle()
    {
        User::onlyTrashed()->where('deleted_at', '<=', now()->subDays(30))->forceDelete();
    }
}