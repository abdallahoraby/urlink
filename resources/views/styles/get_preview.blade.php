<?php
    use App\Http\Controllers\LandingStyleController;
?>

@if( !empty(LandingStyleController::getAllStyles()) )


<div class="form-group">
    <label for=""> اختر ستايل الصفحة <span class="imp-inp"> * </span> </label>
    <select class="form-control select-options" name="landing_style" id="landing_style"  required>
        <option value="" selected disabled> -- اختر ستايل -- </option>
        @foreach( LandingStyleController::getAllStyles() as $key=>$style )
            <option value="{{$style->style_id}}"> Style {{$key+1}} </option>
        @endforeach
    </select>
    <div class="invalid-feedback">  فضلا اختار ستايل الصفحة !! </div>
</div>

<div class="style-preview">
    @foreach( LandingStyleController::getAllStyles() as $style )
        <img src="{{$style->style_image}}" class="style_{{$style->style_id}}" alt="">
    @endforeach
</div>

@endif
