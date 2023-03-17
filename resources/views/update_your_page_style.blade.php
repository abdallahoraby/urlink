@extends('includes.head')

@extends('includes.header-profile')

<h1></h1>
<div class="profile-pages-area bg2 padd-50">
    <div class="container">

        <div class="container d-flex justify-content-center align-items-center">

            <div class="dropdown">
              <button class="btn btn-outline-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                <span>Countries</span>
                <i class="fa fa-caret-down"></i>
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                @if(! $styles->isEmpty())
                @foreach($styles as $style)
                <li><a class="dropdown-item" href="{{ url('/user/profile/style/update/'. $page_id . '/' . $style->style_id) }}">{{$style->style_name}}</a></li>

                @endforeach
                @endif
              </ul>
            </div>


           </div>

    </div><!-- // container -->
</div>










@extends('includes.footer')
