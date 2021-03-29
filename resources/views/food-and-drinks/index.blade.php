@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1>{{ $title }}</h1>
            </div>
        </div>
    </div>

    <div class="top-items-bar">
        <div class="row">
            <div class="col-md-3">
                <div class="item">
                    <h3>Overview</h3>
                    <h2>{{ Auth::user()->name }}</h2>
                </div>
            </div>

            <div class="col-md-3">
                <div class="item">
                    <h3>Calorie Tracker</h3>
                    <h2><i class="fas fa-fire"></i> 1672 <small>Cal</small></h2>
                </div>
            </div>

            <div class="col-md-3">
                <div class="item">
                    <h3>Water Tracker</h3>
                    <h2><i class="fas fa-tint"></i> 1.3 <small>Liters</small></h2>
                </div>

            </div>

            <div class="col-md-3">
                <div class="item">
                    <h3>Total Logs Today</h3>
                    <h2><i class="fas fa-list"></i> 12</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-7">
            <div class="entries-overview">
                <div class="card">
                    <div class="card-header">
                        <h3>Todays Overview</h3>
                    </div>
                    <div class="card-body">
                        <div class="entry-section">
                            <h4>Breakfast</h4>
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Type</th>
                                    <th>Name</th>
                                    <th>Amount</th>
                                    <th>Calories</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Bread</td>
                                    <td>Waldkorn Brood</td>
                                    <td>35 gram</td>
                                    <td>60</td>
                                </tr>
                                <tr>
                                    <td>Butter</td>
                                    <td>Eat plants free of palm</td>
                                    <td>5 gram</td>
                                    <td>27</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="entry-section">
                            <h4>Lunch</h4>
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Type</th>
                                    <th>Name</th>
                                    <th>Amount</th>
                                    <th>Calories</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Bread</td>
                                    <td>Lidl Bruin Brood</td>
                                    <td>35 gram</td>
                                    <td>60</td>
                                </tr>
                                <tr>
                                    <td>Butter</td>
                                    <td>Eat plants free of palm</td>
                                    <td>5 gram</td>
                                    <td>27</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="entry-section">
                            <h4>Dinner</h4>
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Type</th>
                                    <th>Name</th>
                                    <th>Amount</th>
                                    <th>Calories</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Rijst</td>
                                    <td>Rijst</td>
                                    <td>100 gram</td>
                                    <td>120</td>
                                </tr>
                                <tr>
                                    <td>Kip Tandoori</td>
                                    <td>Kip Tandoori</td>
                                    <td>100 gram</td>
                                    <td>150</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="entry-section">
                            <h4>Snacks</h4>
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Type</th>
                                    <th>Name</th>
                                    <th>Amount</th>
                                    <th>Calories</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td colspan="4">No snacks yet...</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="entry-section">
                            <h4>Drinks</h4>
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Type</th>
                                    <th>Name</th>
                                    <th>Amount</th>
                                    <th>Calories</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Coffee</td>
                                    <td>Koffie</td>
                                    <td>100 ml</td>
                                    <td>1</td>
                                </tr>
                                <tr>
                                    <td>Water</td>
                                    <td>Water</td>
                                    <td>250 ml</td>
                                    <td>0</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="side-holder">
                <div class="card">
                    <div class="card-header">
                        <h3>Water Intake Today</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Goal</h4>
                                <p>2500 ml</p>
                            </div>
                            <div class="col-md-6">
                                <h4>Current</h4>
                                <p>1700 ml</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <form method="POST" action="">
                                    @csrf
                                    <div class="form-row">
                                        <div class="col-8">
                                            <input type="text" class="form-control" id="waterAmount" name="waterAmount"
                                                   placeholder="Track your water" value="{{ old('waterAmount') }}"/>
                                        </div>
                                        <div class="col-4">
                                            <input type="text" class="form-control" readonly id="amount" name="amount"
                                                   placeholder="ML"/>
                                        </div>
                                    </div>
                                    <div class="form-row mt-4">
                                        <div class="col">
                                            <input type="submit" class="btn btn-success" value="Track your water"/>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-4">
                    <div class="card-header">
                        <h3>New Food or Drink</h3>
                    </div>
                    <div class="card-body">
                        <p>Here, you can add a new food or drink!</p>
                        <div class="row">
                            <div class="col">
                                <button class="btn btn-primary add-food-btn w-100" data-toggle="modal"
                                        data-target="#addFoodModal">
                                    Add Food
                                </button>
                            </div>
                            <div class="col">
                                <a class="btn btn-secondary w-100">Add new drink</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modals-holder">
        <div class="modal fade add-item-modal" id="addFoodModal" tabindex="-1" role="dialog"
             aria-labelledby="addFoodModalLabel"
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
                                <div class="col">
                                    <input type="text" name="portion_size" class="form-control" id="portion-size"
                                           placeholder="Portion size" value="{{ old('portion_size') }}"/>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <div class="dropdown hierarchy-select" id="foodTypeSelect">
                                        <button type="button" class="btn btn-secondary dropdown-toggle"
                                                id="food-type-select-button" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false"></button>
                                        <div class="dropdown-menu" aria-labelledby="example-two-button">
                                            <div class="hs-searchbox">
                                                <input type="text" class="form-control" autocomplete="off">
                                            </div>
                                            <div class="hs-menu-inner">
                                                <a class="dropdown-item" data-value="" data-default-selected=""
                                                   href="#">Choose a Food type</a>
                                                <input type="hidden" name="foodType" id="hiddenFoodType" value=""/>
                                                @if (!empty($foodTypes))
                                                    @foreach ($foodTypes as $foodType)
                                                        <a class="dropdown-item" data-value="{{ $foodType->id }}"
                                                           href="#">{{ $foodType->name }}</a>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                        <input class="d-none" name="example_two" readonly="readonly" aria-hidden="true"
                                               type="text"/>
                                    </div>
                                </div>
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

    <script type="text/javascript">

    </script>
@endsection
