<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\FoodType;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class FoodAndDrinksController extends Controller
{
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Index action
     *
     * @return View
     */
    public function index(): View
    {
        $data = [
            'title'     => 'Food and Drinks',
            'name'      => 'food_drinks',
            'foodTypes' => FoodType::all(),
        ];
        return view('food-and-drinks/index')
            ->with($data);
    }

    /**
     * Create a new food
     *
     * @param Request
     */
    public function createFood(Request $request)
    {
        if (!empty($request->name)) {
            $food = new Food;

            $food->name                 = $request->name;
            $food->food_type_id         = $request->foodType;
            $food->calories             = $request->calories;
            $food->portion_size         = $request->portion_size;
            $food->total_fat            = $request->total_fat;
            $food->saturated_fat        = $request->saturated_fat;
            $food->trans_fat            = $request->trans_fat;
            $food->polyunsaturated_fat  = $request->polyunsaturated_fat;
            $food->monounsaturated_fat  = $request->monounsaturated_fat;
            $food->cholesterol          = $request->cholesterol;
            $food->sodium               = $request->sodium;
            $food->total_carbonhydrates = $request->total_carbonhydrates;
            $food->dietary_fiber        = $request->dietary_fiber;
            $food->sugar                = $request->sugar;
            $food->added_sugars         = $request->added_sugars;
            $food->sugar_alcohols       = $request->sugar_alcohols;
            $food->protein              = $request->protein;
            $food->vitamin_d            = $request->vitamin_d;
            $food->calcium_percentage   = $request->calcium;
            $food->iron_percentage      = $request->iron;
            $food->potassium            = $request->potassium;
            $food->vitamin_a_percentage = $request->vitamin_a_percentage;
            $food->vitamin_c_percentage = $request->vitamin_c_percentage;

            $food->save();

            return redirect()
                ->back()
                ->with('info', 'Food successfully saved!');
        }

        return redirect()
            ->back()
            ->with('error', 'Not all required fields were entered');
    }
}
