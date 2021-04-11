<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Note extends Model
{
    use SoftDeletes;

    protected $fillable = ['body', 'pinned_flag'];

    public function pin() {
        self::where('pinned_flag', true)
            ->update(['pinned_flag' => false]);
        $this->pinned_flag = true;
        $this->save();
    }
}
