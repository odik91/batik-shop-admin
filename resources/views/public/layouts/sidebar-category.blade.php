@foreach (App\Models\Category::get() as $category)
  @if (sizeof($category->getSubCategories) > 0)
    <div class="nav-item dropdown">
      <a href="#" class="nav-link text-wrap" data-toggle="dropdown">{{ $category['category'] }} <i
          class="fa fa-angle-down float-right mt-1"></i></a>
      <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">
        @foreach ($category->getSubCategories as $subcategory)
          <a href="#" class="dropdown-item text-wrap">{{ $subcategory['subcategory'] }}</a>
        @endforeach
        {{-- <a href="" class="dropdown-item">Men's Dresses</a>
      <a href="" class="dropdown-item">Women's Dresses</a>
      <a href="" class="dropdown-item">Baby's Dresses</a> --}}
      </div>
    </div>
  @else
    <a href="#" class="nav-item nav-link text-wrap">{{ $category['category'] }}</a>
  @endif
@endforeach
