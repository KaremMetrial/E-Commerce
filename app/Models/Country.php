<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\HasMany;

    class Country extends Model
    {
        public $timestamps = false;
        protected $fillable = ['name'];

        public function governorates(): HasMany
        {
            return $this->hasMany(Governorate::class);
        }
    }
