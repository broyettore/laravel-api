<?php

namespace App\Models;

use Attribute;
use Illuminate\Database\Eloquent\Casts\Attribute as CastsAttribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $guarded = ["slug", "image"];
    protected $appends = ["image_url"];

    public function type() {
        return $this->belongsTo(Type::class);
    }

    public function technologies() {
        return $this->belongsToMany(Technology::class);
    }

    // protected function name(): CastsAttribute {
    //     return CastsAttribute::make(
    //         get: fn (string $value) => strtoupper($value),
    //     );
    // }

    // img link
    protected function imageUrl(): CastsAttribute {
        return CastsAttribute::make(
            get: fn () => $this->image !== null ? asset("storage/" . $this->image) : null,
        );
    }
}
