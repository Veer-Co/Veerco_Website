<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\BoughtTogetherProduct;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Product_image;
use App\Models\Product_review;
use App\Models\Promocode;
use App\Models\Promocode_releted_customer;
use App\Models\Promocode_releted_product;
use App\Models\Related_product;
use App\Models\Subcategory;
use App\Models\Tax;
use Exception;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;
// use Image;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function addProduct()
    {
        $categories = Category::where('category_status', 1)->get();
        $brands = Brand::where('brand_status', 1)->get();
        $taxes = Tax::where('tax_status', 0)->get();
        return view('admin.add-product', compact('categories', 'brands', 'taxes'));
    }

    public function productList()
    {
        $products = Product::paginate(5);
        return view('admin.product-list', compact('products'));
    }

    public function productEdit(Request $request, $id)
    {
        $product_details = Product::where('id', $id)->first();
        $categories = Category::where('category_status', 1)->get();
        $brands = Brand::where('brand_status', 1)->get();
        $taxes = Tax::where('tax_status', 0)->get();
        $boughttogethers = BoughtTogetherProduct::where('pro_id', $id)->get();
        $relatedproducts = Related_product::where('pro_id', $id)->get();
        return view('admin.product-edit', compact('product_details', 'categories', 'brands', 'taxes', 'boughttogethers', 'relatedproducts'));
    }

    public function boughtTogetherDestroy(Request $request)
    {
        $btod = BoughtTogetherProduct::where('pro_id', $request->boughtid)->where('bought_selling', $request->boughtselling)->delete();
        if ($btod) {
            return redirect()->back()->with(session()->flash('success', 'Bought together option product deleted.'));
        } else {
            return redirect()->back()->with(session()->flash('error', 'Something went wrong. Please! try again later.'));
        }
    }

    public function relatedProductDestroy(Request $request)
    {
        $relatedp = Related_product::where('pro_id', $request->relatedid)->where('product_related', $request->relatedproduct)->delete();
        if ($relatedp) {
            return redirect()->back()->with(session()->flash('success', 'Related product deleted.'));
        } else {
            return redirect()->back()->with(session()->flash('error', 'Something went wrong. Please! try again later.'));
        }
    }

    public function galleryImageDelete(Request $request)
    {
        $proid = $request->productimgid;
        $getimg = Product_image::where('id', $proid)->first();
        $image_path = $getimg->product_image;
        $filename = public_path() . '/uploads/products/' . $image_path;
        if ($filename) {
            $productunlink = unlink($filename);
            $proimgdel = Product_image::where('id', $proid)->delete();
        }
        if ($proimgdel && $productunlink) {
            return redirect()->back()->with(session()->flash('success', 'Gallery image deleted.'));
        } else {
            return redirect()->back()->with(session()->flash('error', 'Something went wrong. Please! try again later.'));
        }
    }

    public function thumbnailImageDelete(Request $request)
    {
        $prothumbid = $request->productthumbid;
        $getthumbimg = Product::where('id', $prothumbid)->first();
        $image_path = $getthumbimg->thumbnail;
        $filename = public_path() . '/uploads/products/' . $image_path;
        unlink($filename);
        $proimgdel = Product::where('id', $prothumbid)->update([
            'thumbnail' => null,
        ]);
        if ($proimgdel) {
            return redirect()->back()->with(session()->flash('success', 'Thumbnail image deleted.'));
        } else {
            return redirect()->back()->with(session()->flash('error', 'Something went wrong. Please! try again later.'));
        }
    }

    public function productTax()
    {
        $taxes = Tax::paginate(4);
        return view('admin/tax', compact('taxes'));
    }

    public function taxSetup(Request $request)
    {
        $request->validate([
            'taxname' => ['required', 'string'],
            'percentage' => ['required', 'numeric'],
        ]);

        $taxadded = Tax::create([
            'tax_name' => $request->taxname,
            'tax_percentage' => $request->percentage,
        ]);
        if ($taxadded) {
            return redirect()->back()->with(session()->flash('success', 'Tax successfully generated'));
        } else {
            return redirect()->back()->with(session()->flash('error', 'Something went wrong. Please! try again later.'));
        }
    }

    public function taxCrush(Request $request)
    {
        $request->validate([
            'tax' => ['required', 'numeric'],
        ]);

        $taxtrushed = Tax::where('id', $request->tax)->delete();

        if ($taxtrushed) {
            return redirect()->back()->with(session()->flash('success', 'Tax successfully deleted'));
        } else {
            return redirect()->back()->with(session()->flash('error', 'Something went wrong. Please! try again later.'));
        }
    }

    public function promocode()
    {
        $promocode_items = Promocode::paginate(15);
        return view('admin/promocode', compact('promocode_items'));
    }

    public function checkCoupon(Request $request)
    {
        $couponcode = $request->couponcode;
        $coupon = Promocode::where('promocode', $couponcode)->first();
        if (!$coupon) {
            return 'valid';
        } else {
            return 'invalid';
        }
    }

    public function related_products(Request $request)
    {
        $product_ids = $request->product_ids;
        return view('admin/related_products', compact('product_ids'));
    }

    public function promocodeStore(Request $request)
    {
        $request->validate([
            'cuponcode' => ['required', 'string'],
            'coupon_type' => ['required', 'string'],
        ]);

        if ($request->coupon_type == 'rupees' || $request->coupon_type == 'percentage') {
            if ($request->discount) {
                $order_amount = $request->discount;
            } else {
                return redirect()->back()->with(session()->flash('error', 'Please! Enter Discount value.'));
            }
        }
        if ($request->apply_for == 'all_products' || $request->apply_for == 'order_amount_from') {
            if ($request->apply_for == 'order_amount_from') {
                if ($request->order_amount) {
                    $order_from = $request->order_amount;
                } else {
                    return redirect()->back()->with(session()->flash('error', 'Please! Enter order amount from value.'));
                }
            }
        }

        $promocode = new Promocode;
        $promocode->promocode = $request->cuponcode;
        $promocode->coupon_type = $request->coupon_type;
        $promocode->discount = $request->discount;
        $promocode->apply_for = $request->apply_for;
        $promocode->order_amount = $request->order_amount;
        $promocode->save();

        if ($request->apply_for == 'product') {
            if ($request->relatedproducts) {
                foreach ($request->relatedproducts as $key => $releproduct) {
                    $promocode_pro = new Promocode_releted_product;
                    $promocode_pro->promocode_id = $promocode->id;
                    $promocode_pro->product_id = $releproduct;
                    $promocode_pro->save();
                }
            } else {
                return redirect()->back()->with(session()->flash('error', 'Please! Choose products.'));
            }
        }
        if ($request->apply_for == 'customer') {
            if ($request->relatedcustomers) {
                foreach ($request->relatedcustomers as $key => $relecustomer) {
                    $promocode_cus = new Promocode_releted_customer;
                    $promocode_cus->promocode_id = $promocode->id;
                    $promocode_cus->customer_id = $relecustomer;
                    $promocode_cus->save();
                }
            } else {
                return redirect()->back()->with(session()->flash('error', 'Please! Choose Customer.'));
            }
        }

        if ($promocode) {
            return redirect()->back()->with(session()->flash('success', 'Promocode successfully generated'));
        } else {
            return redirect()->back()->with(session()->flash('error', 'Something went wrong. Please! try again later.'));
        }
    }

    public function promocodeDestroy(Request $request)
    {
        $request->validate([
            'promocodeid' => ['required'],
        ]);

        $promo = Promocode::where('id', $request->promocodeid)->first();
        if ($promo->apply_for == 'product') {
            Promocode_releted_product::where('promocode_id', $promo->id)->delete();
        }
        if ($promo->apply_for == 'customer') {
            Promocode_releted_customer::where('promocode_id', $promo->id)->delete();
        }
        $promo_destroy = Promocode::where('id', $request->promocodeid)->delete();
        if ($promo_destroy) {
            return redirect()->back()->with(session()->flash('success', 'Promocode deleted'));
        } else {
            return redirect()->back()->with(session()->flash('error', 'Something went wrong. Please! try again later.'));
        }
    }

    public function getSubcategory(Request $request)
    {
        $cat_slug = $request->post('cid');
        $cid_data = Subcategory::where('category_slug', '=', $cat_slug)->get();
        if ($cid_data->isEmpty()) {
            echo '<option selected>None</option>';
        } else {
            $html = '<option selected disabled>--Select Subcategory--</option>';
            foreach ($cid_data as $list) {
                $html .= '<option value="' . $list->subcategory_slug . '">' . $list->subcategory . '</option>';
            }
            echo $html;
        }

    }

    public function relatedProduct(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            $query = $request->get('query');
            if ($query != '') {
                $data = Product::where('product_name', 'like', '%' . $query . '%')->get();
            }
            // else {
            //     $data = Product::select('product_name','product_id')
            //         ->orderBy('created_at', 'desc') //creared at non ce nella select
            //         ->get();
            // }
            $total_row = $data->count();
            if ($total_row > 0) {
                foreach ($data as $key => $row) {
                    $output .= '
                    <ul>
                    <li data-id="' . $row->product_id . '" data-name="' . $row->product_name . '"><label>(' . $key + 1 . ')</label>&nbsp;<label>' . $row->product_name . '</label</li>
                    </ul>
                    ';
                }
            } else {
                $output .= '
                <table class="table">
                <tr>
                <td align="center" class="text-danger" colspan="5">
                Product Not Available
                </td>
                </tr>
                </table>
                ';
            }
            $data = array(
                'table_data' => $output,
            );
            echo json_encode($data);
        }
    }

    public function addProducts(Request $request)
    {
        $request->validate([
            'category' => ['required', 'string'],
            'product_name' => ['required', 'string'],
            'sku' => ['required'],
            'mrp' => ['required', 'numeric'],
            'price' => ['required', 'numeric'],
            // 'description' => ['required'],
            // 'overview' => ['required'],
            'gallery_image' => ['required'],
            'gallery_image.*' => ['image', 'mimes:jpeg,png,jpg,webp', 'max:600'],
            'thumbnail' => ['required', 'image', 'mimes:jpeg,png,jpg,webp', 'max:300'],
        ]);

        try {
            if ($request->hasfile('thumbnail') && $request->hasfile('gallery_image')) {
                // $file = $request->file('thumbnail');
                // $extenstion = $file->getClientOriginalExtension();
                // $thumbnail = $request->product_name . '.' . $extenstion;
                // $destinationPath = public_path('uploads/products');
                // $imgFile = Image::make($file->getRealPath());
                // $imgFile->resize(500, 500, function ($constraint) {
                //     $constraint->aspectRatio();
                // })->save($destinationPath . '/' . $thumbnail);
                // $file->move($destinationPath, $thumbnail);

                $image = $request->file('thumbnail');
                $input['thumbnailfile'] = $request->product_name.time() . '.' . $image->getClientOriginalExtension();

                $destinationPath = public_path('/uploads/products');
                $imgFile = Image::make($image->getRealPath())->resize(600, 600)->save($destinationPath . '/' . $input['thumbnailfile']);
                // $imgFile->resize(600, 600);
                // $imgFile->resize(600, 600, function ($constraint) {
                //     $constraint->aspectRatio();
                // })->save($destinationPath . '/' . $input['thumbnailfile']);
                // $destinationPath = public_path('/uploads');
                // $image->move($destinationPath, $input['thumbnailfile']);

                $pid = IdGenerator::generate(['table' => 'products', 'field' => 'product_id', 'length' => 6, 'prefix' => 'P']);

                $productpost = Product::create([
                    'product_id' => $pid,
                    'product_slug' => $request->product_name,
                    'product_name' => $request->product_name,
                    'category_id' => $request->category,
                    'subcategory_id' => $request->subcategory,
                    'brand_id' => $request->brand,
                    'mrp' => $request->mrp,
                    'price' => $request->price,
                    'sku' => $request->sku,
                    'model_number' => $request->modelno,
                    'hsn' => $request->hsn,
                    'is_top_product' => $request->is_top_product,
                    'todays_deal' => $request->todays_deal,
                    'is_featured' => $request->is_featured,
                    'weight' => $request->weight,
                    'length' => $request->length,
                    'wide' => $request->wide,
                    'height' => $request->height,
                    'stock_status' => $request->stockstatus,
                    'store_house' => $request->storehouse,
                    'quantity' => $request->quantity,
                    'isCheckout' => $request->allow_checkout,
                    'est_shipping_days' => $request->est_shipping_days,
                    'tax_id' => $request->tax,
                    'short_description' => $request->short_description,
                    'description' => $request->description,
                    'overview' => $request->overview,
                    'seo_title' => $request->seo_title,
                    'seo_description' => $request->seo_description,
                    'seo_keywords' => $request->keywords,
                    'seo_schema' => $request->seo_schema,
                    'thumbnail' => $input['thumbnailfile'],
                ]);

                if ($request->bought_product) {
                    foreach ($request->bought_product as $boughtproduct) {
                        $bought_product = new BoughtTogetherProduct;
                        $bought_product->pro_id = $pid;
                        $bought_product->bought_selling = $boughtproduct;
                        $bought_product->save();
                    }
                }
                if ($request->related_product) {
                    foreach ($request->related_product as $relatedproduct) {
                        $related_product = new Related_product;
                        $related_product->pro_id = $pid;
                        $related_product->product_related = $relatedproduct;
                        $related_product->save();
                    }
                }
                // if ($request->cross_selling) {
                //     foreach ($request->cross_selling as $crossselling) {
                //         $cross_selling = new Cross_selling_product;
                //         $cross_selling->pro_id = $pid;
                //         $cross_selling->product_cross_selling = $crossselling;
                //         $cross_selling->save();
                //     }
                // }
                // if ($request->up_selling) {
                //     foreach ($request->up_selling as $upselling) {
                //         $up_selling = new Up_selling_product;
                //         $up_selling->pro_id = $pid;
                //         $up_selling->product_up_selling = $upselling;
                //         $up_selling->save();
                //     }
                // }

                foreach ($request->file('gallery_image') as $key => $gallery_file) {
                    // $file = $request->file('gallery_image');
                    // $gallery_extenstion = $gallery_file->getClientOriginalExtension();
                    // $product_image = $request->product_name . '-' . $key + 1 . time() . '.' . $gallery_extenstion;
                    // $gallery_file->move(public_path('uploads/products'), $product_image);

                    // $image = $request->file('thumbnail');
                    $input['product_file'] = $request->product_name.time().rand(11111,99999). '.' . $gallery_file->getClientOriginalExtension();

                    $destinationPath = public_path('/uploads/products');
                    $imgProductFile = Image::make($gallery_file->getRealPath())->resize(600, 600)->save($destinationPath . '/' . $input['product_file']);

                    $product_ins[$key]['product_img_id'] = $pid;
                    $product_ins[$key]['product_image'] = $input['product_file'];
                    $product_ins[$key]['created_at'] = now();
                }
                $productimage = Product_image::insert($product_ins);

                // dd($productpost);
                // dd($productimage);
                // die;
            } else {
                return redirect()->back()->with(session()->flash('error', 'Please! choose product images.'));
            }
        } catch (Exception $e) {
            // return  $e->getMessage();
            return redirect()->back()->with(session()->flash('error', $e->getMessage()));
        }
        if ($productpost && $productimage) {
            return redirect()->back()->with(session()->flash('success', 'Product successfully inserted.'));
        } else {
            return redirect()->back()->with(session()->flash('error', 'Something went wrong. Please! try again later.'));
        }
    }

    public function productView(Request $request)
    {
        $slug = $request->slug;
        $slugfor = $request->slugfor;
        if ($slugfor == 'category') {
            $get_products = Product::where('category_id', '=', $slug)->paginate(20);
        } else if ($slugfor == 'brand') {
            $get_products = Product::where('brand_id', '=', $slug)->paginate(20);
        } else {
            $get_products = Product::paginate(20);
        }

        $pro_categories = Category::where('category_status', '1')->get();
        $pro_brands = Brand::where('brand_status', '1')->get();

        return view('products', compact('pro_categories', 'pro_brands', 'get_products'));
    }

    public function productDetails(Request $request, $slug)
    {
        $productdetails = Product::where('product_slug', '=', $slug)->with('product_images')->first();
        $productimgs = Product::where('product_slug', '=', $slug)->with('product_images')->get()->map(function ($album) {
            $album->setRelation('product_images', $album->product_images->take(1));
            return $album;
        });
        $boughtproduct = BoughtTogetherProduct::where('pro_id', $productdetails->product_id)->take(2)->get();
        $related_product = Related_product::where('pro_id', $productdetails->product_id)->get();
        $alsolikes = Product::where('category_id', $productdetails->category_id)->take(10)->get();
        $proreviews = Product_review::where('productid', $productdetails->product_id)->get();
        return view('products-details', compact('productdetails', 'boughtproduct', 'related_product', 'alsolikes', 'proreviews'));
    }

    public function updateProduct(Request $request)
    {
        try {
            // if ($request->hasfile('thumbnail') && $request->hasfile('gallery_image')) {
            if ($request->hasfile('thumbnail')) {
                $file = $request->file('thumbnail');
                $extenstion = $file->getClientOriginalExtension();
                $thumbnail = $request->product_name . '.' . $extenstion;
                $file->move(public_path('uploads/products'), $thumbnail);
                Product::where('product_id', $request->productid)->update(['thumbnail' => $thumbnail]);
            }

            // $pid = IdGenerator::generate(['table' => 'products', 'field' =>'product_id', 'length' => 6, 'prefix' => 'P']);

            $productupdate = Product::where('product_id', $request->productid)->update([
                'product_slug' => $request->product_name,
                'product_name' => $request->product_name,
                'category_id' => $request->category,
                'subcategory_id' => $request->subcategory,
                'brand_id' => $request->brand,
                'mrp' => $request->mrp,
                'price' => $request->price,
                'sku' => $request->sku,
                'is_top_product' => $request->is_top_product,
                'todays_deal' => $request->todays_deal,
                'is_featured' => $request->is_featured,
                'weight' => $request->weight,
                'length' => $request->length,
                'wide' => $request->wide,
                'height' => $request->height,
                'stock_status' => $request->stockstatus,
                'store_house' => $request->storehouse,
                'quantity' => $request->quantity,
                'isCheckout' => $request->allow_checkout,
                'est_shipping_days' => $request->est_shipping_days,
                'tax_id' => $request->tax,
                'short_description' => $request->short_description,
                'description' => $request->description,
                'overview' => $request->overview,
                'seo_title' => $request->seo_title,
                'seo_description' => $request->seo_description,
                'seo_keywords' => $request->keywords,
                'seo_schema' => $request->seo_schema,
            ]);

            if ($request->bought_product) {
                foreach ($request->bought_product as $boughtproduct) {
                    $bought_product = new BoughtTogetherProduct;
                    $bought_product->pro_id = $request->productid;
                    $bought_product->bought_selling = $boughtproduct;
                    $bought_product->save();
                }
            }
            if ($request->related_product) {
                foreach ($request->related_product as $relatedproduct) {
                    $related_product = new Related_product;
                    $related_product->pro_id = $request->productid;
                    $related_product->product_related = $relatedproduct;
                    $related_product->save();
                }
            }

            if ($request->hasfile('gallery_image')) {
                foreach ($request->file('gallery_image') as $key => $gallery_file) {
                    // $file = $request->file('gallery_image');
                    $gallery_extenstion = $gallery_file->getClientOriginalExtension();
                    $product_image = $request->product_name . '-' . $key + 1 . time() . '.' . $gallery_extenstion;
                    $gallery_file->move(public_path('uploads/products'), $product_image);

                    $product_ins[$key]['product_img_id'] = $request->productid;
                    $product_ins[$key]['product_image'] = $product_image;
                    $product_ins[$key]['created_at'] = now();
                }
                Product_image::insert($product_ins);
            }

            // } else {
            //     return redirect()->back()->with(session()->flash('error', 'Please! choose product images.'));
            // }
        } catch (Exception $e) {
            // return  $e->getMessage();
            return redirect()->back()->with(session()->flash('error', $e->getMessage()));
        }
        if ($productupdate) {
            return redirect()->back()->with(session()->flash('success', 'Product successfully updated.'));
        } else {
            return redirect()->back()->with(session()->flash('error', 'Something went wrong. Please! try again later.'));
        }
    }

}
