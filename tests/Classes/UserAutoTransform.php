<?php

namespace OnrampLab\CustomFields\Tests\Classes;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as BaseUser;
use OnrampLab\CustomFields\Concerns\Customizable;

class UserAutoTransform extends BaseUser
{
    use HasFactory;
    use Customizable;

    protected $guarded = [];
    protected $table = 'users';

    protected static function newFactory(): Factory
    {
        return UserAutoTransformFactory::new();
    }

    protected function isAutoTransform(): bool
    {
        return true;
    }

    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class);
    }

    public function getCustomFieldContext(): Model
    {
        return $this->account;
    }
}
