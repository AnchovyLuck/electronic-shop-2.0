<form action="{{request()->segment(2) == 'product' ? 'shop' : ''}}">
    <div class="filter-widget">
        <h4 class="fw-title">Categories</h4>
        <ul class="filter-catagories">
            @foreach ($categories as $category)
                <li><a href="shop/category/{{$category->name}}">{{$category->name}}</a></li>
            @endforeach
        </ul>
    </div>
    <div class="filter-widget">
        <h4 class="fw-title">Brand</h4>
        <div class="fw-brand-check">
            @foreach ($brands as $brand)
                <div class="bc-item">
                    <label for="bc-{{$brand->id}}">
                            {{$brand->name}}
                            <input type="checkbox" id="bc-{{$brand->id}}" 
                            {{(request('brand')[$brand->id] ?? '') == 'on' ? 'checked' : ''}} name="brand[{{$brand->id}}]"
                            onchange="this.form.submit();">
                        <span class="checkmark"></span>
                    </label>
                </div>
            @endforeach
        </div>
    </div>
    <div class="filter-widget">
        <h4 class="fw-title">Price</h4>
        <div class="filter-range-wrap">
            <div class="range-slider">
                <div class="price-input">
                    <input type="text" id="minamount" name="price_min">
                    <input type="text" id="maxamount" name="price_max">
                </div>
            </div>
            <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget-content" data-min="10000000" data-max="100000000"
            data-min-value="{{str_replace('đ','',request('price_min'))}}"
            data-max-value="{{str_replace('đ','',request('price_max'))}}">
                <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
            </div>
        </div>
        <button type="submit" class="filter-btn">Filter</button>
    </div>
    <div class="filter-widget">
        <h4 class="fw-title">Color</h4>
        <div class="fw-color-choose">
            <div class="cs-item">
                <input type="radio" id="cs-black" name="color" value="black" onchange="this.form.submit();"
                {{(request('color') == 'black' ? 'checked' : '')}}>
                <label class="cs-black {{(request('color') == 'black' ? 'font-weight-bold text-success' : '')}}" for="cs-black">black</label>
            </div>
            <div class="cs-item">
                <input type="radio" id="cs-gray" name="color" value="gray" onchange="this.form.submit();"
                {{(request('color') == 'gray' ? 'checked' : '')}}>
                <label class="cs-gray {{(request('color') == 'gray' ? 'font-weight-bold text-success' : '')}}" for="cs-gray">gray</label>
            </div>
        </div>
    </div>
    <div class="filter-widget">
        <h4 class="fw-title">RAM</h4>
        <div class="fw-size-choose">
            <div class="sc-item"> 
                <input type="checkbox" id="s-size" name="RAM" value="4" onchange="this.form.submit();"
                {{request('RAM') == '4' ? 'checked' : ''}}>
                <label for="s-size" class="{{request('RAM') == '4' ? 'active' : ''}}">4</label>
            </div>
            <div class="sc-item">
                <input type="checkbox" id="m-size" name="RAM" value="8" onchange="this.form.submit();"
                {{request('RAM') == '8' ? 'checked' : ''}}>
                <label for="m-size" class="{{request('RAM') == '8' ? 'active' : ''}}">8</label>
            </div>
            <div class="sc-item">
                <input type="checkbox" id="l-size" name="RAM" value="16" onchange="this.form.submit();"
                {{request('RAM') == '16' ? 'checked' : ''}}>
                <label for="l-size" class="{{request('RAM') == '16' ? 'active' : ''}}">16</label>
            </div>
            <div class="sc-item">
                <input type="checkbox" id="xs-size" name="RAM" value="32" onchange="this.form.submit();"
                {{request('RAM') == '32' ? 'checked' : ''}}>
                <label for="xs-size" class="{{request('RAM') == '32' ? 'active' : ''}}">32</label>
            </div>
        </div>
    </div>
    <div class="filter-widget">
        <h4 class="fw-title">Tags</h4>
        <div class="fw-tags">
            <a href="">Gaming</a>
            <a href="">Đồ họa</a>
            <a href="">Sinh viên</a>
        </div>
    </div>
</form>