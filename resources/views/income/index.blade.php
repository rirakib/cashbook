@extends('master')
@section('content')
<!-- Button trigger modal -->
<div class="row mt-5">
    <div class="col-md-9 d-flex justify-content-between">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Add Category
        </button>

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#expense">
            Add Income
        </button>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('income.category')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="expense_category">Category</label>
                        <input type="text" class="form-control" name="income_category" id="expense_category">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>


<div class="modal expense fade" id="expense" tabindex="-1" role="dialog" aria-labelledby="expense" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="expense">Add Income</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('income.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <select class="custom-select" id="expense_category"
                            aria-label="Example select with button addon" name="income_category">
                            <option>Choose Category</option>
                            @foreach(DB::table('income_categories')->get() as $cat)
                            <option value="{{$cat->id}}">{{$cat->income_category}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ammount">Ammount</label>
                        <input type="number" class="form-control" name="ammount" id="ammount">
                    </div>
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date" class="form-control" name="date" id="date">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
@endsection