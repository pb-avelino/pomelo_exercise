<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    /** @var bool */
    public $timestamps = false;

    /** @var array */
    protected $fillable = [
        'clinic_id',
        'first_name',
        'last_name',
    ];

    /** @var array */
    protected $appends = ['uid'];

    /**
     * Returns an identifier from the Person first and last names
     *
     */
    public function getUidAttribute()
    {
        return strtolower(
            sprintf('%s_%s', $this->attributes['first_name'], $this->attributes['last_name'])
        );
    }

    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
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
                'first_name' => $uid[0],
                'last_name' => $uid[1]
            ])->firstOrFail();
        }

        return parent::__call($method, $parameters);
    }
}
