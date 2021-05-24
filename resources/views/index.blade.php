<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Online Pharmacy</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  </head>
  <body>
    @include('nav')
    <div class="container">
      <form class="" action="{{ route('addMedicine') }}" method="post">
        @csrf
        name: <input type="text" name="name" value=""><br>
        description: <input type="text" name="description" value=""><br>
        price: <input type="text" name="price" value=""><br>
        amount: <input type="text" name="amount" value=""><br>
        <button type="submit" name="button">Create</button>
      </form>
      <br><br> <hr>
      <form class="" action="{{ route('search') }}" method="post">
        @csrf
        <label for="">Word:</label>
        <div class="form-group">
          <input class="form-control" type="text" name="word" placeholder="Medicine name">
        </div>
        <label for="">Price:</label>
        <div class="form-row">
          <div class="col-md-4">
            <input type="text" class="form-control" name="pricefrom" placeholder="Price from">
          </div>
          <div class="col-md-4">
            <input type="text" class="form-control" name="priceto" placeholder="Price to">
          </div>
          <div class="col-md-4">
            <button style="width: 100%" type="submit" class="btn btn-success">Search</button>
          </div>
        </div>

      </form>
      <hr>
      @foreach($medicines as $medicine)
        <div class="card">
          <div class="card-header">
            <a href="#">{{ $medicine->id }}</a>
          </div>
          <div class="card-body">
            <h5 class="card-title">{{ $medicine->name }}</h5>
            <p class="card-text">{{ $medicine->description }}</p>
            <p class="card-text" style="color: green">{{ $medicine->price }} KZT</p>
            <form class="" action="{{ route('addToBasket') }}" method="post">
              @csrf
              <input type="hidden" name="id" value="{{ $medicine->id }}">
              <button type="submit" class="btn btn-primary" name="button">To basket</button>
            </form>
          </div>
        </div>
      @endforeach
  </div>
  </body>
</html>
