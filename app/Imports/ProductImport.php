<?php

namespace App\Imports;

use App\Models\Product;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // dd($row); die;
        $pid = IdGenerator::generate(['table' => 'products', 'field' => 'product_id', 'length' => 6, 'prefix' => 'P']);
        $imageUrl = $row['thumbnail'];
        // print_r(basename($imageUrl));
        $directory = public_path('uploads/products');
        // Create the directory if it doesn't exist
        if (!is_dir($directory)) {
            mkdir($directory, 0777, true);
        }
        if (!is_null($imageUrl) || !empty($imageUrl)) {
            $fileName = time() . rand(1111, 9999) . basename($imageUrl);
            $getImageContents = file_get_contents($imageUrl);
            file_put_contents($directory . '/' . $fileName, $getImageContents);
            // file_put_contents(public_path('uploads/products/' . $fileName), $getImageContents);
        } else {
            $fileName = 'noimage.jpg';
        }
        return new Product([
            // "id" => $row[''],
            "product_id" => $pid,
            "product_slug" => $row['product_name'],
            "product_name" => $row['product_name'],
            "category_id" => $row['category_id'],
            "subcategory_id" => $row['subcategory_id'],
            "brand_id" => $row['brand_id'],
            "mrp" => $row['mrp'],
            "price" => $row['price'],
            "sku" => $row['sku'],
            "model_number" => $row['model_number'],
            "hsn" => $row['hsn'],
            "is_top_product" => $row['is_top_product'],
            "todays_deal" => $row['todays_deal'],
            "is_featured" => $row['is_featured'],
            "weight" => $row['weight'],
            "length" => $row['length'],
            "wide" => $row['wide'],
            "height" => $row['height'],
            "stock_status" => $row['stock_status'],
            "store_house" => $row['store_house'],
            "quantity" => $row['quantity'],
            "isCheckout" => $row['ischeckout'],
            "est_shipping_day" => $row['est_shipping_day'],
            "tax_id" => $row['tax_id'],
            "short_description" => $row['short_description'],
            "description" => $row['description'],
            "overview" => $row['overview'],
            "seo_title" => $row['seo_title'],
            "seo_description" => $row['seo_description'],
            "seo_keywords" => $row['seo_keywords'],
            "seo_schema" => $row['seo_schema'],
            "thumbnail" => $fileName,
            // "created_at" => $row[''],
            // "updated_at" => $row[''],
        ]);
    }
}
