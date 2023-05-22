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

// use App\Models\Shop;
// use App\Models\Attribute;
// use App\Models\AttributeCategory;
// use App\Models\AttributeValue;




use App\Models\BoughtTogetherProduct;
use App\Models\Brand;
use App\Models\Cross_selling_product;
use App\Models\Product_image;
use App\Models\Product_review;
use App\Models\Promocode;
use App\Models\Promocode_releted_customer;
use App\Models\Promocode_releted_product;
use App\Models\Related_product;
use App\Models\Subcategory;
use App\Models\Tax;
use App\Models\Up_selling_product;




use Auth;

class SearchController extends Controller
{
    // update discounted price in product table
    // public function upload_discounted_price_db(){
    //     $current_timestamp = strtotime(date('Y-m-d H:i:s'));
    //     $products = Product::select("id", \DB::raw('(CASE WHEN discount_start_date < '.$current_timestamp.' && discount_start_date > '.$current_timestamp.' && discount_type = "percent" THEN (unit_price - (unit_price*discount/100)) WHEN discount_start_date < '.$current_timestamp.' && discount_start_date > '.$current_timestamp.' && discount_type = "amount" THEN (unit_price - discount) ELSE unit_price END) AS discounted_prices'))
    //     ->get();
    //     $counter = 0;
    //     foreach($products as $product){
    //         $counter++;
    //         $update_discount_price = Product::find($product->id);
    //         // dd($update_discount_price);
    //         $update_discount_price->discounted_price = $product->discounted_prices;
    //         $update_discount_price->save();

    //         print_r('<br>');
    //         print_r($counter .' Data Inserted');
    //     }
    //     print_r('<br>');
    //     print_r('Completed');
    // }

    public function index(Request $request, $category_id = null, $brand_id = null)
    {
        $latestslug = $request->slug;
        $query = $request->keyword;
        $sort_by = $request->sort_by;
        $min_price = $request->min_price;
        $max_price = $request->max_price;
        $seller_id = $request->seller_id;
        $current_timestamp = strtotime(date('Y-m-d H:i:s'));
        // dd($current_timestamp);

        $selected_attribute_values = array();

        // $conditions = ['is_featured','on'];

        if($brand_id != null){
            $conditions = array_merge($conditions, ['brand_id' => $brand_id]);
        }elseif ($request->brand != null) {
            $brand_id = (Brand::where('slug', $request->brand)->first() != null) ? Brand::where('slug', $request->brand)->first()->id : null;
            $conditions = array_merge($conditions, ['brand_id' => $brand_id]);
        }

        if($seller_id != null){
            $conditions = array_merge($conditions, ['user_id' => Seller::findOrFail($seller_id)->user->id]);
        }

        // $products = Product::select("*", \DB::raw('(CASE WHEN discount_start_date <= '.$current_timestamp.' && discount_start_date >= '.$current_timestamp.' && discount_type = "percent" THEN (unit_price - (unit_price*discount/100)) WHEN discount_start_date < '.$current_timestamp.' && discount_start_date > '.$current_timestamp.' && discount_type = "amount" THEN (unit_price - discount) ELSE unit_price END) AS discounted_price'))
        //     ->where($conditions);

        $products = Product::where('is_featured','on');


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
        // $get_filter_brand = $products->groupBy('brand_id')->orderBy('brand_id', 'ASC')->get()->pluck('brand_id');
        // $filter_brand_data = Brand::whereIn('id', $get_filter_brand)->orderBy('name', 'ASC')->get();

        // get category wise selected product attributes, Used on product list page @Avinash
        // $get_filter_attribute = $products->pluck('attributes');
        // $decode_attribute = json_decode($get_filter_attribute);
        // $attribute_ids = [];
        // foreach($decode_attribute as $attribute){
        //     $attributes = json_decode($attribute);
        //     foreach($attributes as $attribute){
        //         $check_exist_attribute = (in_array($attribute, $attribute_ids));
        //         if($check_exist_attribute == false){
        //             $attribute_ids[] = $attribute;
        //         }
        //     }
        // }
        // $attributes = Attribute::whereIn('id', $attribute_ids)->orderBy('name', 'ASC')->get();

        // // get category wise selected product attributes_values, Used on product list page @Avinash
        // $get_filter_attribute_choice = $products->pluck('choice_options');
        // $attribute_choice_value_list = [];
        // // $attribute_choice_value = [];
        // $decode_attribute_choice = json_decode($get_filter_attribute_choice);
        // foreach($decode_attribute_choice as $attribute_choice){
        //     $attribute_choices = json_decode($attribute_choice);
        //     foreach($attribute_choices as $choice){
        //         // $attribute_choice_value['attribute_id'] = $choice->attribute_id;
        //         foreach($choice->values as $value){
        //             // $attribute_choice_value['value'] = $value;
        //             if(!in_array($value, $attribute_choice_value_list, true)){
        //                 array_push($attribute_choice_value_list, $value );
        //             }
        //         }
        //     }
        // }

        // $selectd_attribute_list = AttributeValue::whereIn('value', $attribute_choice_value_list)->orderBy('value', 'ASC')->get();

        // dd($attribute_choice_value_list);
        // dd($selectd_attribute_list);

        // $get_filter_colors = $products->pluck('colors');

        // $product_lists = filter_products($products)->with('taxes')->get();


		// $categories = Category::where('level', 0)->where('type','1')->orderBy('order_level', 'ASC')->get();
		// $catName = Category::where('id', $category_id)->first();

        // $checkLevel = Category::find($category_id);
        // if($checkLevel->level == 0){
        //     $first_category = Category::find($category_id);
        //     $second_category = null;
        //     $third_category = null;

        //     $all_second_category_first = $this->getCategoryData($first_category->id, 5, null);
        //     $all_second_category_all = $this->getCategoryData($first_category->id, 5, 5);
        //     $all_third_category_first = [];
        //     $all_third_category_all = [];

        // }elseif($checkLevel->level == 1){
        //     $second_category = Category::find($category_id);
        //     $first_category = Category::find($second_category->parent_id);
        //     $third_category = null;

        //     $all_second_category_first = $this->getCategoryData($first_category->id, 5, null);
        //     $all_second_category_all = $this->getCategoryData($first_category->id, 5, 5);
        //     $all_third_category_first = $this->getCategoryData($second_category->id, 5, null);
        //     $all_third_category_all = $this->getCategoryData($second_category->id, 5, 5);
        // }elseif($checkLevel->level == 2){
        //     $third_category = Category::find($category_id);
        //     $second_category = Category::find($third_category->parent_id);
        //     $first_category = Category::find($second_category->parent_id);

        //     $all_second_category_first = $this->getCategoryData($first_category->id, 5, null);
        //     $all_second_category_all = $this->getCategoryData($first_category->id, 5, 5);
        //     $all_third_category_first = $this->getCategoryData($second_category->id, 5, null);
        //     $all_third_category_all = $this->getCategoryData($second_category->id, 5, 5);
        // }else{
        //     abort(404);
        // }

        /** This query used for top/primium products */
        /*
        $top_category = Category::where('category_slug', $latestslug)->first();

        // $top_category_ids[] = $top_category->id;

        // $top_product_list = Product::whereIn('category_id',$top_category_ids)
        //     ->where('is_featured', 'on')
        //     ->orderBy('unit_price', 'asc')
        //     ->limit(10)
        //     ->get();

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
        */
        // dd($top_product_list);
        // dd($latestslug);
        // die;
        $data = [
            'sr_number1' => 1,
            'sr_number2' => 1,
            'latestslug' => $latestslug,
            // 'product_lists' => $product_lists,
            // 'attribute_ids' => $attribute_ids,
            // 'attribute_choice_value_list' => $selectd_attribute_list,
            // // 'attribute_choice_value_list' => $attribute_choice_value_list,
            // 'products' => $products,
            // 'catName' => $catName,
            // 'top_product_list' => $top_product_list,


            // 'categories' => $categories,
            // 'query' => $query,
            // 'category_id' => $category_id,
            // 'brand_id' => $brand_id,
            // 'sort_by' => $sort_by,
            // 'brand_id' => $brand_id,
            'seller_id' => $seller_id,
            'min_price' => $min_price,
            'max_price' => $max_price,
            // 'attributes' => $attributes,
            // 'selected_attribute_values' => $selected_attribute_values,
            // 'colors' => $colors,
            // 'selected_color' => $selected_color,
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
        $category = Category::where('category_slug', $request->slug)->first();


        // $category_ids[] = $category->category_slug;
        // print_r($category->category_slug);
        // exit;
        // $product_list = Product::select("*", \DB::raw('(CASE WHEN discount_start_date <= '.$current_timestamp.' && discount_start_date >= '.$current_timestamp.' && discount_type = "percent" THEN (unit_price - (unit_price*discount/100)) WHEN discount_start_date < '.$current_timestamp.' && discount_start_date > '.$current_timestamp.' && discount_type = "amount" THEN (unit_price - discount) ELSE unit_price END) AS discounted_price'))
            // ->whereIn('category_id',$category_ids);
		$product_list = Product::where('category_id',$category->category_slug);
        //print_r($product_list);
        // $conditions = ['is_featured' => 'on'];

        // if($request->has('brand')) {
        //     $brand_ids = Brand::whereIn('slug', $request->brand)->get()->pluck('id');
        //     $product_list->whereIn('brand_id', $brand_ids);
        // }

        // if($request->has('color')) {
        //     $product_list->whereIn('colors', $request->color);
        // }

        // if($request->has('attribute')) {
        //     $selected_attribute_values = $request->attribute;
        //     foreach ($selected_attribute_values as $key => $value) {
        //         $str = '"' . $value . '"';
        //         $product_list->where('choice_options', 'like', '%' .$str. '%');
        //     }
        // }

        // if($request->min_price != null && $request->max_price != null){
        //     $product_list->where('unit_price', '>=', $request->min_price)->where('unit_price', '<=', $request->max_price);
        // }
/*
        switch ($request->sort_by) {
            case "newest":
                $product_list->orderBy('created_at', 'desc');
                break;
            case "oldest":
                $product_list->orderBy('created_at', 'asc');
                break;
            case "price-asc":
                $product_list->orderBy('price', 'asc');
                break;
            case "price-desc":
                $product_list->orderBy('price', 'desc');
                break;
            default:
                $product_list->orderBy('price', 'asc');
                break;
        }
        */

        // $product_listing = $product_list->where($conditions);


        // if(Auth::user() != null) {
        //     $user_id = Auth::user()->id;
        //     $get_cart_product = Cart::select('product_id', 'quantity')->where('user_id', $user_id)->get();
        // }else{
        //     $temp_user_id = $request->session()->get('temp_user_id');
        //     $get_cart_product = ($temp_user_id != null) ? Cart::select('product_id', 'quantity')->where('temp_user_id', $temp_user_id)->get() : [] ;
        // }

        // $product_lists = $product_listing->paginate(20);
        $product_lists = $product_list->paginate(5, ['*'], 'page', $pageNumber);
        // dd($product_lists);
        // die;
        // foreach($product_lists as $key => $list){
        //     $product_lists[$key]->is_cart_product = 0;
        //     $product_lists[$key]->cart_quantity = 0;
        //     if($get_cart_product != null){
        //         foreach($get_cart_product as $cart) {
        //             if($cart->product_id == $list->id){
        //                 $product_lists[$key]->is_cart_product = 1;
        //                 $product_lists[$key]->cart_quantity = $cart->quantity;
        //             }
        //         }
        //     }
        // }

        if($product_lists != null){
			foreach($product_lists as $row){
			    //$img  = uploaded_asset($row->thumbnail_img);

                // $filter_discount_price = filter_var($discount_price, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

                $output .= '<div class="col-md-3 pb-2 pe-0">
                <div class="card rounded-0 product-card">
                    <div class="card-header bg-transparent border-bottom-0 position-absolute end-0">
                        <div class="d-flex align-items-center justify-content-end gap-3">
                            <a href="">
                                <div class="product-wishlist"> <i class="bx bx-heart"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                    <a href="">

                                                        <img src="" class="card-img-top" alt="">

                                                    </a>
                                                    <div class="card-body">
                                                        <div class="product-info">
                                                            <a href="">

                                                                <p class="product-catergory font-13 mb-1">cat an</p>

                                                            </a>
                                                            <a href="">
                                                                <h6 class="product-name mb-2" title="">'.$row->product_name.'</h6>
                                                            </a>
                                                            <div class="d-flex align-items-center">
                                                                <div class="mb-1 product-price"><span
                                                                        class="me-1 text-decoration-line-through ">₹ '.$row->mrp.'</span>
                                                                    <span class="fs-5">₹ '.$row->price.'</span>
                                                                </div>

                                                            </div>
                                                            <div class="product-action mt-2">
                                                                <div class="d-grid gap-2">
                                                                    <form action="" method="post">

                                                                        <input type="hidden" name="quantity" class="form-control qty-input text-center" value="1">
                                                                        <input type="hidden" name="pid" value="'.$row->id.'">
                                                                        <button type="submit" class="btn btn-danger btn-ecomm w-100"><i class="bx bxs-cart-add"></i>&nbsp;Add to Cart</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                    ';
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
        $category = Category::where('category_slug', $category_slug)->first();
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
        $products = Product::where('is_featured', 'on')->where('tags', 'like', '%'.$query.'%')->get();
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

        $products = $products->where('is_featured', 'on')
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
