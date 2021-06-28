<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GuestBookComment extends Model
{
	protected $connection = 'mini_homepage';
	protected $table = 'guestbook_comments';
}