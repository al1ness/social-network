<?php

namespace App\Console\Commands;

use App\Models\Comment;
use App\Models\Group;
use App\Models\Post;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Console\Command;

class GoCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'go';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //attach
        //detach
        //sync
        //syncWithoutDetaching
        //toggle
        //updateExistingPivot

        $group = Group::first();
        $user = User::find(3);
        $comment = Comment::first();
        //$post->tags()->syncWithoutDetaching([1, 2, 3]);
        dd($user->roles);
    }
}
