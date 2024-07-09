@extends('layouts.app')

@section('content')
<div class="container">
 <div class="row">
    <div class="col-3 p-5">
        <img src="https://imgs.search.brave.com/xgRpwlgEVfqC3DiWVi90Q4_s750yI-Tm5cQfG4CxPAU/rs:fit:500:0:0:0/g:ce/aHR0cHM6Ly9pbWcu/ZnJlZXBpay5jb20v/cHJlbWl1bS1waG90/by8zZC1uZXctYmxh/Y2stYm13LWNhcl8x/MTMxMzc3LTQzNC5q/cGc_c2l6ZT02MjYm/ZXh0PWpwZw" style="max-width: 250px;" class="rounded-circle">

    </div>
    <div class="col-9 pt-5">
        <div class="d-flex justify-content-between align-items-baseline">
            <h1>{{ $user->username }}</h1>
            <a href="#">Add New Post</a>
        </div>
        <div class="d-flex gap-4">
            <div><strong>153</strong> post</div>
            <div><strong>23k</strong> followers</div>
            <div><strong>212</strong>following</div>
        </div>
        <div class="pt-4" style="font-weight: bold;">{{ $user->profile->title }}</div>
        <div>{{ $user->profile->description }}</div>
        <div><a href="#">{{ $user->profile->url }}</a></div>

    </div>
 </div>

 <div class="row pt-5">
    <div class="col-4">
        <img src="https://imageio.forbes.com/specials-images/imageserve/5f962df3991e5636a2f68758/0x0.jpg?format=jpg&crop=812,457,x89,y103,safe&height=900&width=1600&fit=bounds" class="w-100">
    </div>
    <div class="col-4">
        <img src="https://playerassist.com/wp-content/uploads/2021/08/Forza-Horizon-4-Fastest-Cars.jpg" class="w-100">
    </div>
    <div class="col-4">
        <img src="https://www.autoshippers.co.uk/blog/wp-content/uploads/bugatti-centodieci-1024x576.jpg" class="w-100">
    </div>
 </div>
</div>
@endsection
