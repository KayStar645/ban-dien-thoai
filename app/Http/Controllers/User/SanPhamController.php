<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\DbModels\SanphamModel;
use Illuminate\Http\Request;

class SanPhamController extends Controller
{
    public function index(): string
    {
        return view('user.index');
    }

    public function getAll(): \Illuminate\Database\Eloquent\Collection|array
    {
        $sanPhams = SanphamModel::all();
        return $sanPhams;
    }
}
