<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'laporan';
    protected $with = ['category', 'user'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function scopeSearch($query, array $filters)
    {
        $query->when(
            $filters['id_perbaikan'] ?? false,
            fn ($query, $search) => $query->where('id_perbaikan', 'like', '%' .  $search . '%')
        );
    }

    public function scopeMatchUser($query)
    {
        $query->when(auth()->user()->is_admin != 1, fn ($query) => $query->where('user_id', auth()->user()->id));
        $query->when(auth()->user()->is_admin == 1, fn ($query) => $query->get());
    }
}
