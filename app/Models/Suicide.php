<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suicide extends Model
{
    use HasFactory;
    protected $fillable = [
        'country', 'year', 'sex, age, suicides', 'population', 'sucid_in_hundredk', 'country_year', 'yearly_gdp', 'gdp_per_capita', 'internetusers', 'expenses', 'employeecompensation', 'unemployment', 'physician_price', 'laborforcetotal', 'lifeexpectancy', 'mobilesubscriptions', 'refugees', 'selfemployed', 'electricityacess', 'continent', 'country_code', 'mobilesubscription'
    ];
}
