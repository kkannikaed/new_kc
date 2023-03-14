<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class NameTable extends Authenticatable
{
    public function TestBody()
    {
        return $this->hasOne(TestBody::class, 'user_id');
    }
    public function TestOperate()
    {
        return $this->hasOne(TestOperate::class, 'user_id');
    }
    public function TestTheory()
    {
        return $this->hasOne(TestTheory::class, 'user_id');
    }

}
