<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */   

    public function headings(): array{
        return ["id", "product_id",	"product_slug",	"product_name",	"category_id", "subcategory_id", "brand_id", "mrp",	"price", "sku",	"model_number",	"hsn",	"is_top_product", "todays_deal", "is_featured",	"weight", "length",	"wide",	"height", "stock_status", "store_house", "quantity", "isCheckout", "est_shipping_day", "tax_id", "short_description", "description", "overview", "seo_title", "seo_description", "seo_keywords", "seo_schema", "thumbnail",	"created_at", "updated_at"];
    }
    
    public function collection(){
        return Product::all();
    }
}
