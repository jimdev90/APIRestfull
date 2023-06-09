<?php

namespace App\Models;

use App\Scopes\BuyerScope;

class Buyer extends User
{

    protected static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub
        self::addGlobalScope(new BuyerScope);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
