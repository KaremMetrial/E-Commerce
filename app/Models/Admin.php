<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Relations\BelongsTo;
    use Illuminate\Foundation\Auth\User as Authenticatable;

    class Admin extends Authenticatable
    {
        use HasFactory;

        protected $fillable = ['name', 'email', 'password', 'role_id'];
        protected $hidden = ['password', 'remember_token',];

        protected function casts(): array
        {
            return [
                'password' => 'hashed',
            ];
        }

        public function role(): BelongsTo
        {
            return $this->belongsTo(Role::class);
        }
    }
