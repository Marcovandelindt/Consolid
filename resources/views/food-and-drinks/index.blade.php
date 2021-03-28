@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="page-heading">
                <h1>{{ $title }}</h1>
                <hr/>
            </div>
        </div>
    </div>
    <br/><br/>
    <div class="row">
        <div class="col-md-6">
            <div class="food-and-drinks">
                <div class="section breakfast-section">
                    <div class="section-heading">
                        <h3>Breakfast</h3>
                    </div>
                    <div class="section-content">
                        <div class="section-items-list">
                            <div class="section-item">
                                <div class="item">Waldkorn Brood</div>
                                <div class="amount">35 Gram</div>
                                <div class="calories">85 Calories</div>
                            </div>
                            <div class="section-item">
                                <div class="item">Filet American</div>
                                <div class="amount">15 Gram</div>
                                <div class="calories">45 Calories</div>
                            </div>
                            <div class="section-item">
                                <div class="item">G'woon Boter</div>
                                <div class="amount">5 Gram</div>
                                <div class="calories">12 Calories</div>
                            </div>
                            <div class="totals">
                                <div>Total</div>
                                <div>55 Gram</div>
                                <div>142 Calories</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section lunch-section">
                    <div class="section-heading">
                        <h3>Lunch</h3>
                    </div>
                    <div class="section-content">
                        Lunch Content
                    </div>
                </div>
                <div class="section dinner-section">
                    <div class="section-heading">
                        <h3>Dinner</h3>
                    </div>
                    <div class="section-content">
                        Dinner Content
                    </div>
                </div>
                <div class="section snacks-section">
                    <div class="section-heading">
                        <h3>Snacks</h3>
                    </div>
                    <div class="section-content">
                        Snacks Content
                    </div>
                </div>
                <div class="section drinks-section">
                    <div class="section-heading">
                        <h3>Drinks</h3>
                    </div>
                    <div class="section-content">
                        Drink Content
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="add-entry">
                <h3>Add Entry</h3>
                <button class="btn btn-primary add-food-entry-btn">Food</button>
                <button class="btn btn-primary add-drink-entry-btn">Drink</button>
            </div>
            <hr/>
            <div class="add-food-or-drink">
                <h3>Add Food or Drink</h3>
                <button class="btn btn-primary add-food-btn" data-toggle="modal" data-target="#addFoodModal">Food
                </button>
                <button class="btn btn-primary add-drink-btn">Drink</button>
            </div>
        </div>
    </div>

    <div class="modals-holder">
        <div class="modal fade" id="addFoodModal" tabindex="-1" role="dialog" aria-labelledby="addFoodModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add New Food</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" class="foodDrinkModalForm" action="{{ route('food_drinks') }}">
                            @csrf
                            <div class="form-row">
                                <div class="col">
                                    <input type="text" name="name" class="form-control" placeholder="Name" id="name"
                                           value="{{ old('name') }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <input type="text" name="calories" class="form-control" placeholder="Calories"
                                           id="calories" value="{{ old('calories') }}">
                                </div>
                            </div>

                            <div class="form-row-section">
                                <div class="form-row-heading">
                                    <h5>Fats</h5>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <input type="text" name="total_fat" class="form-control" placeholder="Total fat"
                                               id="total_fat" value="{{ old('total_fat') }}">
                                    </div>
                                    <div class="col">
                                        <input type="text" name="saturated_fat" class="form-control"
                                               placeholder="Saturated fat" id="saturated_fat"
                                               value="{{ old('saturated_fat') }}">
                                    </div>
                                    <div class="col">
                                        <input type="text" name="trans_fat" class="form-control" placeholder="Trans fat"
                                               id="trans_fat" value="{{ old('trans_fat') }}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <input type="text" name="polyunsaturated_fat" class="form-control"
                                               placeholder="Polyunsaturated fat" id="polyunsaturated_fat"
                                               value="{{ old('polyunsaturated_fat') }}">
                                    </div>
                                    <div class="col">
                                        <input type="text" name="monounsaturated_fat" class="form-control"
                                               placeholder="Monounsaturated fat" id="monounsaturated_fat"
                                               value="{{ old('monounsaturated_fat') }}">
                                    </div>
                                </div>

                                <div class="form-section">
                                    <div class="form-row">
                                        <div class="col">
                                            <input type="text" name="cholesterol" class="form-control"
                                                   placeholder="Cholesterol" id="cholesterol"
                                                   value="{{ old('cholesterol') }}">
                                        </div>
                                        <div class="col">
                                            <input type="text" name="sodium" class="form-control"
                                                   placeholder="Sodium" id="sodium"
                                                   value="{{ old('sodium') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row-section">
                                    <div class="form-row-heading">
                                        <h5>Carbonhydrates</h5>
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <input type="text" name="total_carbonhydrates" class="form-control"
                                                   placeholder="Total carbonhydrates" id="total_carbonhydrates"
                                                   value="{{ old('total_carbonhydrates') }}">
                                        </div>
                                        <div class="col">
                                            <input type="text" name="dietary_fiber" class="form-control"
                                                   placeholder="Dietary fiber" id="dietary_fiber"
                                                   value="{{ old('dietary_fiber') }}">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <input type="text" name="sugar" class="form-control"
                                                   placeholder="Sugar" id="sugar"
                                                   value="{{ old('sugar') }}">
                                        </div>
                                        <div class="col">
                                            <input type="text" name="addded_sugars" class="form-control"
                                                   placeholder="Added sugars" id="addded_sugars"
                                                   value="{{ old('addded_sugars') }}">
                                        </div>
                                        <div class="col">
                                            <input type="text" name="sugar_alcohols" class="form-control"
                                                   placeholder="Sugar alcohols" id="sugar_alcohols"
                                                   value="{{ old('sugar_alcohols') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row-section">
                                    <div class="form-row">
                                        <div class="col">
                                            <input type="text" name="protein" class="form-control"
                                                   placeholder="Protein" id="protein"
                                                   value="{{ old('protein') }}">
                                        </div>
                                        <div class="col">
                                            <input type="text" name="calcium" class="form-control"
                                                   placeholder="Calcium" id="calcium"
                                                   value="{{ old('calcium') }}">
                                        </div>
                                        <div class="col">
                                            <input type="text" name="iron" class="form-control"
                                                   placeholder="Iron" id="iron"
                                                   value="{{ old('iron') }}">
                                        </div>
                                        <div class="col">
                                            <input type="text" name="potassium" class="form-control"
                                                   placeholder="Potassium" id="potassium"
                                                   value="{{ old('potassium') }}">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <input type="text" name="vitamin_d" class="form-control"
                                                   placeholder="Vitamin D" id="vitamin_d"
                                                   value="{{ old('vitamin_d') }}">
                                        </div>
                                        <div class="col">
                                            <input type="text" name="vitamin_a_percentage" class="form-control"
                                                   placeholder="Vitamin A" id="vitamin_a_percentage"
                                                   value="{{ old('vitamin_a_percentage') }}">
                                        </div>
                                        <div class="col">
                                            <input type="text" name="vitamin_c_percentage" class="form-control"
                                                   placeholder="Vitamin C" id="vitamin_c_percentage"
                                            value="{{ old('vitamin_c_percentage') }}">
                                        </div>
                                    </div>

                                    <div class="form-row-section">
                                        <div class="form-row">
                                            <div class="col">
                                                <input type="submit" class="btn btn-primary" value="Save!"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
