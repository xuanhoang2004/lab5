<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $view;
    public function __construct(){
        $this->view = [];
    }

    public function index()
    {
        $objPro = new Product();
        $this->view['listPro'] = $objPro->loadDataWithPager();
        // dd($this->view['listPro']);
        return view('product.index', $this->view);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $objCate = new Category();
        $this->view['listCate'] = $objCate->loadAllCate();
        //  dd($this->view['listCate']);
        return view('product.create', $this->view);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Product $product)
    {
        $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'price' => ['required', 'integer', 'min:1'],
            'quantity' => ['required', 'integer', 'min:1'],
            'image' => ['required', 'image', 'mines:jpg, jpeg, png'],
            'category_id' => ['required', 'exists:categories,id'],
        ],[
            'name.required' => 'Tiêu đề tên không được để trống',
            'name.min' => 'Tiêu đề danh mục không được dưới :min ký tự',
            'name.max' => 'Tiêu đề danh mục không được vượt quá :max ký tự',
            'price.required' => 'Giá không được để trống',
            'price.numeric' => 'Giá phải là số',
            'price.min' => 'Giá phải lớn hơn :min',
            'quantity.required' => 'Giá không được để trống',
            'quantity.numeric' => 'Giá phải là số',
            'quantity.min' => 'Giá phải lớn hơn :min',
            'image.required' => 'Hình ảnh không được để trống',
            'image.image' => 'Hình ảnh phải là ảnh',
            'image.mines' => 'Hình ảnh phải là ảnh jpg, jpeg, png',
            'category_id.required' => 'Danh mục không được để trống',
            'category_id.exists' => 'Danh mục không tồn tại',
        


        ]);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->image = $request->image;
        $product->category_id = $request->category_id;
        $product->save();
    
        return redirect('product.index')->with('success', 'Thêm mới sản phẩm thành công');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
