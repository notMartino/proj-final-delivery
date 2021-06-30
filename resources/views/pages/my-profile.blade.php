@extends('layouts.main-layout')

@include('components.header')

@section ('content')
  <main>
    <section class="side-padding" id="restaurant-container">
      <div id="create-row">
        <div id="left-create">
          <h1>I tuoi ristoranti</h1>
        </div>
        <div id="right-create">
          <a id="create-button" href="{{ route('createRestaurant')}}">crea ristorante<i class="fas fa-plus-circle"></i></a>
      </div>

      </div>

        <ul id="restaurant-cards">
          @foreach ($restaurants as $restaurant)
                @if (Auth::check())
                    @if (Auth::user()->id == $restaurant -> user_id)
                        <li class="crd  @if(!$restaurant -> visible) hidden-crd @endif" >
                          <ul>
                            <li class="image-relative">
                                <img src="{{asset('/storage/assets/pizza-placeholder.jpg')}}" alt="copertina ristorante">
                                <span>{{$restaurant -> business_name}}</span>
                            </li>
                            <li class="name-restaurant">
                            </li>
                            <li id="restaurant-address">
                                <i class="fas fa-map-marker-alt"></i>
                                <p>{{$restaurant -> address}}</p>
                            </li>
                          </ul>
                          <div class="btn-edit-del">
                            <a id="edit-button" href={{ route('restaurantDetailsProfileLink', Crypt::encrypt($restaurant -> id))}}><i class="fas fa-edit"></i></a>
                            @if ($restaurant -> visible == 0)
                                <a class="hide-button" href={{ route('deleteRestaurantLink', $restaurant -> id)}}><i class="fas fa-eye-slash"></i></a>
                            @endif
                            @if ($restaurant -> visible == 1)
                                <a class="hide-button" href={{ route('deleteRestaurantLink', $restaurant -> id)}}><i class="fas fa-eye"></i></a>
                            @endif
                          </div>
                        </li>
                    @endif
                @endif
          @endforeach
        </ul>
    </section>
  </main>
@endsection
