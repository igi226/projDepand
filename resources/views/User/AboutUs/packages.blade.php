@extends('User.Master.mainLayout')
@section('title', 'Health | Dependable Staffing Agency')
@section('content')

<div class="package-container">
    @foreach ($packages as $item)
        
    @php
        $package_feature = explode(",",$item->package_features)
    @endphp  
    <div class="packages">
        <h1>{{  $item->package_name }}</h1>
        <h2 class="text1">$ {{  $item->package_price }} / {{  $item->package_type }}</h2>
        <ul class="list">
            @foreach ($package_feature as $feature)
                <li>{{ $feature }}</li>
            @endforeach
        </ul>
        {{-- <div class="price-btn">
            <a href="#">Start Now</a>
        </div> --}}
    </div>
    @endforeach
    {{-- <div class="packages">
        <h1>Professional</h1>
        <h2 class="text1">&dollar;19.99</h2>
        <ul class="list">
            <li class="first">Basic +</li>
            <li>Landing Pages</li>
            <li>Pop-up Forms</li>
            <li>Premium Support</li>
        </ul>
        <div class="price-btn">
            <a href="#">Start Now</a>
        </div>
    </div>
    <div class="packages">
        <h1>Master</h1>
        <h2 class="text1">&dollar;29.99</h2>
        <ul class="list">
            <li class="first">Professional +</li>
            <li>Marketing Automation</li>
            <li>Instagram Ads</li>
            <li>Facebook Ads</li>
        </ul>
        <div class="price-btn">
            <a href="#">Start Now</a>
        </div>
    </div> --}}
</div>
@endsection