<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    use HasFactory;

    /** @var bool */
    public $timestamps = false;

    /** @var array */
    protected $fillable = ['name'];

    /** @var array */
    protected $appends = ['uid'];

    /**
     * Returns an identifier from the clinic name
     *
     */
    public function getUidAttribute()
    {
        return strtolower(preg_replace('/\s+/', '_', $this->attributes['name']));
    }

    /**
     * Retrives providers
     *
     */
    public function providers()
    {
        return $this->hasMany(Provider::class);
    }

    /**
     * @inheritDoc
     */
    public function __call($method, $parameters)
    {
        // Find by uid instead of PK
        if ($method == 'find' && !ctype_digit($parameters[0])) {

            $uid = explode('_', $parameters[0], 2);
            return self::where([
                'name' => implode(' ', $uid)
            ])->firstOrFail();
        }

        return parent::__call($method, $parameters);
    }
}
