<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'laporan';
    protected $with = 'category';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeSearch($query, array $filters)
    {
        $query->when(
            $filters['id_perbaikan'] ?? false,
            fn ($query, $perbaikan) => $query->where('id_perbaikan', $perbaikan)
        );
    }
}
