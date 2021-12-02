<?php

use Freshwork\ChileanBundle\Rut;
use App\Events\OrderStatusUpdated;
use App\Events\AlumnoStatusUpdated;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

class Order {
    public $id;
    public $product;

    public function __construct($id , $product ){

        $this->id = $id;
        $this->product = $product;
    }
}


class Alumno {
    public $rut;
    public $nombres;

    public function __construct($rut , $nombres ){

        $this->rut = $rut;
        $this->nombres = $nombres;
    }
}

Route::get('/', function () {
    
    return view('welcome');
});

// ocupar faker
Route::get('update', function () {

    OrderStatusUpdated::dispatch( new Order(rand() , 'PS5'));


    $random_rut = rand(1000000, 25000000);
    $rut = new Rut($random_rut);

    $faker = Faker\Factory::create('es_ES');
    
    AlumnoStatusUpdated::dispatch( new Alumno($rut->fix()->format() , $faker->name));

    return view('welcome');
});
