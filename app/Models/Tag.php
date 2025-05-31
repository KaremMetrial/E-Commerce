<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\HasMany;

    class Tag extends Model
    {
        protected $fillable = ['slug'];

        public function productTags(): HasMany
        {
            return $this->hasMany(ProductTag::class);
        }
    }
