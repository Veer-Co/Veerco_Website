<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
// use App\Models\Search;
use App\Models\Product;
// use App\Models\Cart;
use App\Models\Category;
// use App\Models\FlashDeal;
// use App\Models\Brand;
// use App\Models\Color;
// use App\Models\Shop;
// use App\Models\Attribute;
// use App\Models\AttributeCategory;
// use App\Models\AttributeValue;
// use App\Utility\CategoryUtility;
use Auth;

class SearchController extends Controller
{
    // update discounted price in product table
    public function upload_discounted_price_db(){
        $current_timestamp = strtotime(date('Y-m-d H:i:s'));
        $products = Product::select("id", \DB::raw('(CASE WHEN discount_start_date < '.$current_timestamp.' && discount_start_date > '.$current_timestamp.' && discount_type = "percent" THEN (unit_price - (unit_price*discount/100)) WHEN discount_start_date < '.$current_timestamp.' && discount_start_date > '.$current_timestamp.' && discount_type = "amount" THEN (unit_price - discount) ELSE unit_price END) AS discounted_prices'))
        ->get();
        $counter = 0;
        foreach($products as $product){
            $counter++;
            $update_discount_price = Product::find($product->id);
            // dd($update_discount_price);
            $update_discount_price->discounted_price = $product->discounted_prices;
            $update_discount_price->save();

            print_r('<br>');
            print_r($counter .' Data Inserted');
        }
        print_r('<br>');
        print_r('Completed');
    }

    public function index(Request $request, $category_id = null, $brand_id = null)
    {
        $latestslug = $request->category_slug;
        $query = $request->keyword;
        $sort_by = $request->sort_by;
        $min_price = $request->min_price;
        $max_price = $request->max_price;
        $seller_id = $request->seller_id;
        $current_timestamp = strtotime(date('Y-m-d H:i:s'));
        // dd($current_timestamp);

        $selected_attribute_values = array();

        $first_five_color = Color::orderBy('id', 'desc')->limit(5)->get();
        $colors = Color::all();
        $selected_color = null;

        $conditions = ['published' => 1, 'approved' => 1];

        if($brand_id != null){
            $conditions = array_merge($conditions, ['brand_id' => $brand_id]);
        }elseif ($request->brand != null) {
            $brand_id = (Brand::where('slug', $request->brand)->first() != null) ? Brand::where('slug', $request->brand)->first()->id : null;
            $conditions = array_merge($conditions, ['brand_id' => $brand_id]);
        }

        if($seller_id != null){
            $conditions = array_merge($conditions, ['user_id' => Seller::findOrFail($seller_id)->user->id]);
        }

        $products = Product::select("*", \DB::raw('(CASE WHEN discount_start_date <= '.$current_timestamp.' && discount_start_date >= '.$current_timestamp.' && discount_type = "percent" THEN (unit_price - (unit_price*discount/100)) WHEN discount_start_date < '.$current_timestamp.' && discount_start_date > '.$current_timestamp.' && discount_type = "amount" THEN (unit_price - discount) ELSE unit_price END) AS discounted_price'))
            ->where($conditions);

        if($category_id != null){
            $category_ids = CategoryUtility::children_ids($category_id);
            $category_ids[] = $category_id;
            $products->whereIn('category_id', $category_ids);
            $attribute_ids = AttributeCategory::whereIn('category_id', $category_ids)->pluck('attribute_id')->toArray();
            $attributes = Attribute::whereIn('id', $attribute_ids)->get();
        }

        if($query != null){
            $searchController = new SearchController;
            $searchController->store($request);
            $products->where(function ($q) use ($query){
                foreach (explode(' ', trim($query)) as $word) {
                    $q->where('name', 'like', '%'.$word.'%')->orWhere('tags', 'like', '%'.$word.'%')->orWhereHas('product_translations', function($q) use ($word){
                        $q->where('name', 'like', '%'.$word.'%');
                    });
                }
            });
        }

        // get category wise brands, Used on product list page @Avinash
        $get_filter_brand = $products->groupBy('brand_id')->orderBy('brand_id', 'ASC')->get()->pluck('brand_id');
        $filter_brand_data = Brand::whereIn('id', $get_filter_brand)->orderBy('name', 'ASC')->get();

        // get category wise selected product attributes, Used on product list page @Avinash
        $get_filter_attribute = $products->pluck('attributes');
        $decode_attribute = json_decode($get_filter_attribute);
        $attribute_ids = [];
        foreach($decode_attribute as $attribute){
            $attributes = json_decode($attribute);
            foreach($attributes as $attribute){
                $check_exist_attribute = (in_array($attribute, $attribute_ids));
                if($check_exist_attribute == false){
                    $attribute_ids[] = $attribute;
                }
            }
        }
        $attributes = Attribute::whereIn('id', $attribute_ids)->orderBy('name', 'ASC')->get();

        // get category wise selected product attributes_values, Used on product list page @Avinash
        $get_filter_attribute_choice = $products->pluck('choice_options');
        $attribute_choice_value_list = [];
        // $attribute_choice_value = [];
        $decode_attribute_choice = json_decode($get_filter_attribute_choice);
        foreach($decode_attribute_choice as $attribute_choice){
            $attribute_choices = json_decode($attribute_choice);
            foreach($attribute_choices as $choice){
                // $attribute_choice_value['attribute_id'] = $choice->attribute_id;
                foreach($choice->values as $value){
                    // $attribute_choice_value['value'] = $value;
                    if(!in_array($value, $attribute_choice_value_list, true)){
                        array_push($attribute_choice_value_list, $value );
                    }
                }
            }
        }

        $selectd_attribute_list = AttributeValue::whereIn('value', $attribute_choice_value_list)->orderBy('value', 'ASC')->get();

        // dd($attribute_choice_value_list);
        // dd($selectd_attribute_list);

        $get_filter_colors = $products->pluck('colors');

        $product_lists = filter_products($products)->with('taxes')->get();


		$categories = Category::where('level', 0)->where('type','1')->orderBy('order_level', 'ASC')->get();
		$catName = Category::where('id', $category_id)->first();

        $checkLevel = Category::find($category_id);
        if($checkLevel->level == 0){
            $first_category = Category::find($category_id);
            $second_category = null;
            $third_category = null;

            $all_second_category_first = $this->getCategoryData($first_category->id, 5, null);
            $all_second_category_all = $this->getCategoryData($first_category->id, 5, 5);
            $all_third_category_first = [];
            $all_third_category_all = [];

        }elseif($checkLevel->level == 1){
            $second_category = Category::find($category_id);
            $first_category = Category::find($second_category->parent_id);
            $third_category = null;

            $all_second_category_first = $this->getCategoryData($first_category->id, 5, null);
            $all_second_category_all = $this->getCategoryData($first_category->id, 5, 5);
            $all_third_category_first = $this->getCategoryData($second_category->id, 5, null);
            $all_third_category_all = $this->getCategoryData($second_category->id, 5, 5);
        }elseif($checkLevel->level == 2){
            $third_category = Category::find($category_id);
            $second_category = Category::find($third_category->parent_id);
            $first_category = Category::find($second_category->parent_id);

            $all_second_category_first = $this->getCategoryData($first_category->id, 5, null);
            $all_second_category_all = $this->getCategoryData($first_category->id, 5, 5);
            $all_third_category_first = $this->getCategoryData($second_category->id, 5, null);
            $all_third_category_all = $this->getCategoryData($second_category->id, 5, 5);
        }else{
            abort(404);
        }

        /** This query used for top/primium products */
        $top_category = Category::where('slug', $latestslug)->first();
        $top_category_ids = CategoryUtility::children_ids($top_category->id);
        $top_category_ids[] = $top_category->id;

        $top_product_list = Product::whereIn('category_id',$top_category_ids)
            // ->where('is_top_product', 1)
            ->where('published', 1)
            ->where('approved', 1)
            ->orderBy('unit_price', 'asc')
            ->limit(10)
            ->get();

        if(Auth::user() != null) {
            $user_id = Auth::user()->id;
            $get_cart_product = Cart::select('product_id', 'quantity')->where('user_id', $user_id)->get();
        }else{
            $temp_user_id = $request->session()->get('temp_user_id');
            $get_cart_product = ($temp_user_id != null) ? Cart::select('product_id', 'quantity')->where('temp_user_id', $temp_user_id)->get() : [] ;
        }

        foreach($top_product_list as $key => $list){
            // $discount_price = home_discounted_base_price($list, false);
            // $filter_discount_price = filter_var($discount_price, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            // dd($discount_price);

            $top_product_list[$key]->is_cart_product = 0;
            $top_product_list[$key]->cart_quantity = 0;
            if($get_cart_product != null){
                foreach($get_cart_product as $cart) {
                    if($cart->product_id == $list->id){
                        $top_product_list[$key]->is_cart_product = 1;
                        $top_product_list[$key]->cart_quantity = $cart->quantity;
                    }
                }
            }
        }
        // dd($top_product_list);

        $data = [
            'sr_number1' => 1,
            'sr_number2' => 1,
            'filter_brand_data' => $filter_brand_data,
            'first_category' => $first_category,
            'all_second_category_first' => $all_second_category_first,
            'all_second_category_all' => $all_second_category_all,
            'all_third_category_first' => $all_third_category_first,
            'all_third_category_all' => $all_third_category_all,
            'latestslug' => $latestslug,
            'product_lists' => $product_lists,
            'attribute_ids' => $attribute_ids,
            'attribute_choice_value_list' => $selectd_attribute_list,
            // 'attribute_choice_value_list' => $attribute_choice_value_list,
            'products' => $products,
            'catName' => $catName,
            'top_product_list' => $top_product_list,

            'first_five_color' => $first_five_color,
            'categories' => $categories,
            'query' => $query,
            'category_id' => $category_id,
            'brand_id' => $brand_id,
            'sort_by' => $sort_by,
            // 'brand_id' => $brand_id,
            'seller_id' => $seller_id,
            'min_price' => $min_price,
            'max_price' => $max_price,
            'attributes' => $attributes,
            'selected_attribute_values' => $selected_attribute_values,
            'colors' => $colors,
            'selected_color' => $selected_color,
        ];

        return view('products', $data);
    }

    //common function used in index function for finding categories lists
    public function getCategoryData($parent_id, $limit, $skip){
        $query = Category::where('parent_id',$parent_id)
            ->orderBy('order_level', 'ASC')
            ->where('type', 1);
        if($limit != null){
            $query->limit($limit);
        }
        if($skip != null){
            $query->take(PHP_INT_MAX)
                ->skip($skip);
        }
        $category_data = $query->get();
        return $category_data;
    }

    // Used for product list through Ajax
    public function get_filtered_products(Request $request){

        $output = '';
        $brand_data = '';
        $current_timestamp = strtotime(date('Y-m-d H:i:s'));

        $pageNumber = $request->page;
        $category = Category::where('slug', $request->slug)->first();
        $category_ids = CategoryUtility::children_ids($category->id);
        $category_ids[] = $category->id;

        // $product_list = Product::select("*", \DB::raw('(CASE WHEN discount_start_date <= '.$current_timestamp.' && discount_start_date >= '.$current_timestamp.' && discount_type = "percent" THEN (unit_price - (unit_price*discount/100)) WHEN discount_start_date < '.$current_timestamp.' && discount_start_date > '.$current_timestamp.' && discount_type = "amount" THEN (unit_price - discount) ELSE unit_price END) AS discounted_price'))
            // ->whereIn('category_id',$category_ids);
		$product_list = Product::whereIn('category_id',$category_ids);
        // $conditions = ['is_top_product' => 0, 'published' => 1, 'approved' => 1];
        $conditions = ['published' => 1, 'approved' => 1];

        if($request->has('brand')) {
            $brand_ids = Brand::whereIn('slug', $request->brand)->get()->pluck('id');
            $product_list->whereIn('brand_id', $brand_ids);
        }

        if($request->has('color')) {
            $product_list->whereIn('colors', $request->color);
        }

        if($request->has('attribute')) {
            $selected_attribute_values = $request->attribute;
            foreach ($selected_attribute_values as $key => $value) {
                $str = '"' . $value . '"';
                $product_list->where('choice_options', 'like', '%' .$str. '%');
            }
        }

        if($request->min_price != null && $request->max_price != null){
            $product_list->where('unit_price', '>=', $request->min_price)->where('unit_price', '<=', $request->max_price);
        }

        switch ($request->sort_by) {
            case "newest":
                $product_list->orderBy('created_at', 'desc');
                break;
            case "oldest":
                $product_list->orderBy('created_at', 'asc');
                break;
            case "price-asc":
                // $product_list->orderBy('discounted_price', 'asc');
                $product_list->orderBy('unit_price', 'asc');
                break;
            case "price-desc":
                // $product_list->orderBy('discounted_price', 'desc');
                $product_list->orderBy('unit_price', 'desc');
                break;
            default:
                // $product_list->orderBy('discounted_price', 'asc');
                $product_list->orderBy('unit_price', 'asc');
                break;
        }

        $product_listing = $product_list->where($conditions);

        if(Auth::user() != null) {
            $user_id = Auth::user()->id;
            $get_cart_product = Cart::select('product_id', 'quantity')->where('user_id', $user_id)->get();
        }else{
            $temp_user_id = $request->session()->get('temp_user_id');
            $get_cart_product = ($temp_user_id != null) ? Cart::select('product_id', 'quantity')->where('temp_user_id', $temp_user_id)->get() : [] ;
        }

        $product_lists = $product_listing->paginate(20, ['*'], 'page', $pageNumber);

        foreach($product_lists as $key => $list){
            $product_lists[$key]->is_cart_product = 0;
            $product_lists[$key]->cart_quantity = 0;
            if($get_cart_product != null){
                foreach($get_cart_product as $cart) {
                    if($cart->product_id == $list->id){
                        $product_lists[$key]->is_cart_product = 1;
                        $product_lists[$key]->cart_quantity = $cart->quantity;
                    }
                }
            }
        }

        if($product_lists != null){
			foreach($product_lists as $row){
			    $img  = uploaded_asset($row->thumbnail_img);

                // $filter_discount_price = filter_var($discount_price, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                $qty = 0;  foreach ($row->stocks as $key => $stock) { $qty += $stock->qty; }
                $output .= '<div class="grid-item col-md-3 col-cat-box">
                    <div style="box-shadow:none;" class="product-box h-auto pb-3 product_data product_box">';
                    $output .= '<span class="badge-custom">OFF&nbsp;<span class="box ml-1 mr-0">&nbsp;'.$row->discount.'%</span></span>';
                        if($row->discount_start_date <= $current_timestamp && $row->discount_end_date >= $current_timestamp &&  $row->discount_type == "percent"){
                            //$output .= '<div class="beachs">'.$row->discount.' % Off</div>';
                            $output .= '<span class="badge-custom">OFF&nbsp;<span class="box ml-1 mr-0">&nbsp;'.$row->discount.'%</span></span>';
                            $discount_price = home_discounted_base_price($row, false);
                            $discount_show_price = home_discounted_base_price($row, true);
                            $original_show_price = home_base_price($row, true);

                        }elseif($row->discount_start_date <= $current_timestamp && $row->discount_end_date >= $current_timestamp && $row->discount_type == "amount") {
                           // $output .= '<div class="beachs">₹'.$row->discount.' Off</div>';
                            $output .= '<span class="badge-custom">OFF&nbsp;<span class="box ml-1 mr-0"><i style="font-size:11px;" class="fa fa-inr" aria-hidden="true"></i>'.$row->discount.'</span></span>';
                            $discount_price = home_discounted_base_price($row, false);
                            $discount_show_price = home_discounted_base_price($row, true);
                            $original_show_price = home_base_price($row, true);
                        }else{
                            $discount_price = home_base_price($row, false);
                            $discount_show_price = home_base_price($row, true);;
                            $original_show_price = '';
                        }

                        $output .= '<a href="'.route('product', $row->slug).'"><img src="'.$img.'" alt="'.$row->name.'" onerror="this.onerror=null;this.src='.static_asset('assets/img/placeholder.jpg').';"></a>';

                        if($row->brand_id != null){
                            $output .= '<div class="discrptions">
                                                <div style="text-transform:uppercase;" class="companyname">'.$row->brand->name.'</div>
                                        </div>';
                        }

                        $output .= '<div class="discrptions">
                            <a href="'.route('product', $row->slug).'">
                                <h5 class="desclist">'.$row->name.'</h5>
                            </a>
                            <h6>'.$discount_show_price.' <strike>' . $original_show_price .'</strike></h6>
                        </div>';

                        if($row->is_cart_product == 1){
                            $output .= '<div class="discrptions_button buddonjdk '.$row->id.' active">';
                        }else{
                            $output .= '<div class="discrptions_button buddonjdk '.$row->id.'">';
                        }

                        $output .= '<input type="hidden" value="'.$row->id.'" class="prod_id">
                            <input type="hidden" value="'.$discount_price.'" class="prod_price">
							<input type="hidden" value="'.$row->name.'" class="prod_name">
							<input type="hidden" value="'.$img.'" class="prod_img">';
                            if($qty>0){
                                $output .= '<button id="btn1" type="button" class="btn cart active cart_buttons3 addToCartUButton"><i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="name">Add to cart</span> </button>
                                <div class="cart-add cart-add3 products_list ">
                                    <div class="input-group quantity_input mb-0">
                                        <div class="input-group w-auto justify-content-end align-items-center packageadd">

                                            <input type="button" value="-" class="button-minus border rounded-circle quantity-left-minus icon-shape icon-sm mx-1_1 add_cart_button_minus" data-field="quantity" ';

                                            if($row->cart_quantity >= 1){
                                                $output .= '><input type="number" step="1" max="10" value="'.$row->cart_quantity.'" name="quantity" class="quantity quantity-field border-0 text-center w-25 input-number">';
                                            }else{
                                                $output .= 'disabled><input type="number" step="1" max="10" value="1" name="quantity" class="quantity quantity-field border-0 text-center w-25 input-number">';
                                            }
                                            $output .= '<input type="button" value="+" class="button-plus border rounded-circle quantity-right-plus icon-shape icon-sm lh-0_1 add_cart_button_plus" data-field="quantity">
                                            <a href="'.url('cart').'"> <h6 class="cart_buttons cart_icons1"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></h6></a>
                                        </div>
                                    </div>
                                </div>';
                            }else{
                                //$output .= '<button class="outofstock">&nbsp;&nbsp;Out&nbsp;of&nbsp;Stock</button><button class="buttonbuynow productBuyNow" disabled style="opacity:0.6;"><i class="fa fa-check" aria-hidden="true"></i> &nbsp;&nbsp;Buy Now</button>';
                            }
							$output .= '</div>
                    </div>
                </div>';
			}

            $output .= '<div>' .$product_lists->render(). '</div>';
		}

        $data = [
           'output' => $output,
           'result' => $product_lists,
           'request' => $request->sort_by,
           'min_price' => $request->min_price,
           'max_price' => $request->max_price,
        ];

		return Response::json([
            'status' => true,
            'data' => $data,
        ], 200);

    }

    public function listing(Request $request)
    {
        return $this->index($request);
    }

    public function listingByCategory(Request $request, $category_slug)
    {
        $category = Category::where('slug', $category_slug)->first();
        if ($category != null) {
            return $this->index($request, $category->id);
        }
        abort(404);
    }

    public function listingByBrand(Request $request, $brand_slug)
    {
        $brand = Brand::where('slug', $brand_slug)->first();
        if ($brand != null) {
            return $this->index($request, null, $brand->id);
        }
        abort(404);
    }

    //Suggestional Search
    public function ajax_search(Request $request)
    {
        $keywords = array();
        $query = $request->search;
        $products = Product::where('published', 1)->where('tags', 'like', '%'.$query.'%')->get();
        foreach ($products as $key => $product) {
            foreach (explode(',',$product->tags) as $key => $tag) {
                if(stripos($tag, $query) !== false){
                    if(sizeof($keywords) > 5){
                        break;
                    }
                    else{
                        if(!in_array(strtolower($tag), $keywords)){
                            array_push($keywords, strtolower($tag));
                        }
                    }
                }
            }
        }

        $products = filter_products(Product::query());

        $products = $products->where('published', 1)
                        ->where(function ($q) use ($query){
                            foreach (explode(' ', trim($query)) as $word) {
                                $q->where('name', 'like', '%'.$word.'%')->orWhere('tags', 'like', '%'.$word.'%')->orWhereHas('product_translations', function($q) use ($word){
                                    $q->where('name', 'like', '%'.$word.'%');
                                });
                            }
                        })
                    ->get();

        $categories = Category::where('name', 'like', '%'.$query.'%')->get()->take(3);

        $shops = Shop::whereIn('user_id', verified_sellers_id())->where('name', 'like', '%'.$query.'%')->get()->take(3);

        if(sizeof($keywords)>0 || sizeof($categories)>0 || sizeof($products)>0 || sizeof($shops) >0){
            return view('frontend.partials.search_content', compact('products', 'categories', 'keywords', 'shops'));
        }
        return '0';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $search = Search::where('query', $request->keyword)->first();
        if($search != null){
            $search->count = $search->count + 1;
            $search->save();
        }
        else{
            $search = new Search;
            $search->query = $request->keyword;
            $search->save();
        }
    }
}
