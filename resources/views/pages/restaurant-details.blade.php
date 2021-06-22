@extends('layouts.main-layout')

@section('content')
    <main class="details">
        <h2></h2>
        <ul>
            <li>
                <h4>
                    Restaurant '{{$restaurant -> business_name}}' details
                </h4>
            </li>
            <li>
                Business name: {{$restaurant -> business_name}}
            </li>
            <li>
                Address: {{$restaurant -> address}}
            </li>
            <li>
                P-IVA: {{$restaurant -> piva}}
            </li>
            <li>
                Telephone: {{$restaurant -> telephone}}
            </li>
            <li>
                Description: {{$restaurant -> description}}
            </li>
            <li>
                <u>
                    Owner: {{$restaurant -> user -> email}}
                </u>
            </li>
            <li>
                Categories: 
            </li>
            @foreach ($restaurant -> categories as $category)
            <li>
                {{$category -> name}}
            </li>
            @endforeach

            @if (Auth::check())
                @if (Auth::user()->id == $restaurant -> user_id)
                    <li>
                        <a href="{{route('editRestaurantViewLink', $restaurant -> id)}}">Edit this restaurant</a>
                    </li>
                    <li>
                        <a href="{{route('deleteRestaurantLink', $restaurant -> id)}}">Delete this restaurant</a>
                    </li>
                @endif
            @endif
        </ul>

        <hr>

        <ul>
            <li>
                <h4>
                    Products list:
                </h4>
            </li>
            @foreach ($restaurant -> products as $product)
                <li>
                    {{$product -> name}}: &euro;{{$product -> price}},00
                    <a href="{{route('productDetailsViewLink', $product -> id)}}">
                        details
                    </a>
                </li>
            @endforeach
        </ul>

        {{-- Controllo se User esiste --}}
        @if (Auth::check())
            {{-- Controllo se User è il porprietario --}}
            @if (Auth::user()->id == $restaurant -> user_id)
                <h3>
                    <a href="{{route('statsMonthLink', ['restaurantId' => $restaurant -> id, 'selectedYear' => 2020])}}">Statistics Chart Route: CLICK HERE</a>
                </h3>
                <div id="appChart" style="width: 60%">
                    <input name="d_elem" type="hidden" value="{{$restaurant -> id}}" id="d_elem"/>
                    
                    <select name="year" id="yearOrder" v-model="year" v-on:change="deleteMonthsChart(), updateMonthsChart()">
                        <option :value="currentYear">@{{currentYear}}</option>
                        <option :value="currentYear - 1">@{{currentYear - 1}}</option>
                        <option :value="currentYear - 2">@{{currentYear - 2}}</option>
                    </select>

                    {{-- -------------- CHART ---------------- --}}
                    <canvas id="myChart">
                        Your browser does not support the canvas element.
                    </canvas>
                </div>
            @endif
        @endif
    </main>
@endsection
