<?php   
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function categories()
    {
        $categories = Category::all();
        return view('categories', compact('categories'));
    }

    public function products(Category $category)
    {
        $products = $category->products;
        return view('products', compact('category', 'products'));
    }

    public function addProduct()
    {
        $categories = Category::all(); // Подгрузите категории для выпадающего списка
        return view('products.add', compact('categories'));
    }
    
    
    public function storeProduct(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
        ]);
        
    
        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'category_id' => $request->category_id, // Сохраняем ID категории
            'user_id' => auth()->id(), // Привязываем продукт к текущему пользователю
        ]);
        
    
        return redirect()->route('products.add')->with('success', 'Product added successfully!');
    }
    


}

