<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsTo;

    class Admin extends Model
    {
        protected $fillable = ['name', 'email', 'password', 'role_id'];

        public function role(): BelongsTo
        {
            return $this->belongsTo(Role::class);
        }
    }
