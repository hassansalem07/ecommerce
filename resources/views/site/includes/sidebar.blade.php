<div class="container">
    <div class="row">
        <div class="col-sm-3">
            <div class="left-sidebar">
                <h2>Categories</h2>
                <div class="panel-group category-products" id="accordian">
                    @isset($categories)
                    @foreach ($categories as $category)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                @if(count($category->subCategories) > 0)
                                <a data-toggle="collapse" data-parent="#accordian" href="#{{$category->id}}">
                                    <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                    {{$category->name}}
                                </a>
                                @else
                                <a href="{{route('category.slug',$category->slug)}}">
                                    <span class="badge pull-right"><i class=""></i></span>
                                    {{$category->name}}
                                </a>
                                @endif
                            </h4>
                        </div>
                        <div id="{{$category->id}}" class="panel-collapse collapse">
                            <div class="panel-body">
                                <ul>
                                    @isset($category->subCategories)
                                    @foreach ($category->subCategories as $subCategory)
                                    <li><a
                                            href="{{route('category.slug',$subCategory->slug)}}">{{$subCategory->name}}</a>
                                    </li>
                                    @endforeach
                                    @endisset
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endisset
                </div>
                <div class="brands_products">
                    <h2>Brands</h2>
                    <div class="brands-name">
                        <ul class="nav nav-pills nav-stacked">
                        @foreach ($brands as $brand)
                        <li><a href="{{route('brand.products',$brand->id)}}"> <span class="pull-right">{{$brand->products->count()}}</span>{{$brand->name}}</a></li>
                        @endforeach
                    </ul>
                    </div>
                </div>
            </div>
        </div> 
         
