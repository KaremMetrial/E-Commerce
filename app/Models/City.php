<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsTo;
    use Illuminate\Database\Eloquent\Relations\HasMany;

    class City extends Model
    {
        protected $fillable = ['name', 'governorate_id'];
        public $timestamps = false;

        public function governorate(): BelongsTo
        {
            return $this->belongsTo(Governorate::class);

        }

        public function users(): HasMany
        {
            return $this->hasMany(User::class);
        }
    }
