<?php

namespace App\Http\Controllers\Backend\Modules\Transaction;

use App\Helpers\StringHelper;
use App\Helpers\UploadHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductCreateRequests;
use App\Models\Track;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductInventory;
use App\Models\Transaction;
use App\Models\Unit;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class TransactionsController extends Controller
{

    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($isTrashed = false)
    {
        if (is_null($this->user) || !$this->user->can('transaction.view')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        $vendor_id = $this->user->vendor_id;
        if (request()->ajax()) {
            if ($isTrashed) {
                $transactions = Transaction::leftjoin('vendors', 'transactions.vendor_id', '=', 'vendors.id')
                    ->where('transactions.vendor_id', $vendor_id)
                    ->where('transactions.status', 0)
                    ->select(
                        'transactions.id',
                        'transactions.type as type',
                        'transactions.invoice_no as invoice_no',
                        'transactions.transaction_date as transaction_date',
                        'transactions.order_quantity as order_quantity',
                        'vendors.name as vendor',
                        'transactions.status as status',
                    )
                    ->get();
            } else {
                $transactions = Transaction::leftjoin('vendors', 'transactions.vendor_id', '=', 'vendors.id')
                    ->where('transactions.deleted_at', null)
                    ->where('transactions.status', 1)
                    ->select(
                        'transactions.id',
                        'transactions.type as type',
                        'transactions.invoice_no as invoice_no',
                        'transactions.transaction_date as transaction_date',
                        'transactions.order_quantity as order_quantity',
                        'vendors.name as vendor',
                        'transactions.status as status',
                    )
                    ->get();
            }
            $datatable = DataTables::of($transactions, $isTrashed)
                ->addIndexColumn()
                ->addColumn(
                    'action',
                    function ($row) use ($isTrashed) {
                        $csrf = "" . csrf_field() . "";
                        $method_delete = "" . method_field("delete") . "";
                        $method_put = "" . method_field("put") . "";
                        $html = '';

                        if ($row->deleted_at === null) {
                            $deleteRoute =  route('admin.transactions.destroy', [$row->id]);
                            $html .= '<div class="dropdown">
                                        <button class="btn btn-info btn-sm dropdown-toggle" style="border-radius:7px;background-color:#0078D7" type="button" id="dropdownMenuButton"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item waves-effect waves-light" title="Edit Transaction" href="' . route('admin.transactions.edit', $row->id) . '"><i class="fa fa-edit"> Edit</i></a>
                                            <a class="dropdown-item waves-effect waves-light" title="Delete Transaction" id="deleteItem' . $row->id . '"data-toggle="modal"><i class="fa fa-trash"> Delete</i></a>
                                            <a class="dropdown-item waves-effect waves-light" title="Show Transaction Details" href="' . route('admin.transactions.show', $row->id) . '"><i class="fa fa-eye"> Transaction Details</i></a>
                                        </div>
                                     </div> ';
                        } else {
                            $deleteRoute =  route('admin.transactions.trashed.destroy', [$row->id]);
                            $revertRoute = route('admin.transactions.trashed.revert', [$row->id]);

                            $html .= '<a class="btn waves-effect waves-light btn-warning btn-sm btn-circle ml-1" title="Revert Back" id="revertItem' . $row->id . '"><i class="fa fa-check"></i></a>';
                            $html .= '
                            <form id="revertForm' . $row->id . '" action="' . $revertRoute . '" method="post" style="display:none">' . $csrf . $method_put . '
                                <button type="submit" class="btn waves-effect waves-light btn-rounded btn-success"><i
                                        class="fa fa-check"></i> Confirm Revert</button>
                                <button type="button" class="btn waves-effect waves-light btn-rounded btn-secondary" data-dismiss="modal"><i
                                        class="fa fa-times"></i> Cancel</button>
                            </form>';
                            $html .= '<a class="btn waves-effect waves-light btn-danger btn-sm btn-circle ml-1 text-white" title="Delete Product Permanently" id="deleteItemPermanent' . $row->id . '"><i class="fa fa-trash"></i></a>';
                        }



                        $html .= '<script>
                            $("#deleteItem' . $row->id . '").click(function(){
                                swal.fire({ title: "Are you sure?",text: "Product will be deleted as trashed !",type: "warning",showCancelButton: true,confirmButtonColor: "#DD6B55",confirmButtonText: "Yes, delete it!"
                                }).then((result) => { if(result.value) {$("#deleteForm' . $row->id . '").submit();}})
                            });
                        </script>';

                        $html .= '<script>
                            $("#deleteItemPermanent' . $row->id . '").click(function(){
                                swal.fire({ title: "Are you sure?",text: "Product will be deleted permanently, both from trash !",type: "warning",showCancelButton: true,confirmButtonColor: "#DD6B55",confirmButtonText: "Yes, delete it!"
                                }).then((result) => { if (result.value) {$("#deletePermanentForm' . $row->id . '").submit();}})
                            });
                        </script>';

                        $html .= '<script>
                            $("#revertItem' . $row->id . '").click(function(){
                                swal.fire({ title: "Are you sure?",text: "Product will be revert back from trash !",type: "warning",showCancelButton: true,confirmButtonColor: "#DD6B55",confirmButtonText: "Yes, Revert Back!"
                                }).then((result) => { if (result.value) {$("#revertForm' . $row->id . '").submit();}})
                            });
                        </script>';

                        $html .= '
                            <form id="deleteForm' . $row->id . '" action="' . $deleteRoute . '" method="post" style="display:none">' . $csrf . $method_delete . '
                                <button type="submit" class="btn waves-effect waves-light btn-rounded btn-success"><i
                                        class="fa fa-check"></i> Confirm Delete</button>
                                <button type="button" class="btn waves-effect waves-light btn-rounded btn-secondary" data-dismiss="modal"><i
                                        class="fa fa-times"></i> Cancel</button>
                            </form>';

                        $html .= '
                            <form id="deletePermanentForm' . $row->id . '" action="' . $deleteRoute . '" method="post" style="display:none">' . $csrf . $method_delete . '
                                <button type="submit" class="btn waves-effect waves-light btn-rounded btn-success"><i
                                        class="fa fa-check"></i> Confirm Permanent Delete</button>
                                <button type="button" class="btn waves-effect waves-light btn-rounded btn-secondary" data-dismiss="modal"><i
                                        class="fa fa-times"></i> Cancel</button>
                            </form>';
                        return $html;
                    }
                )

                ->editColumn('status', function ($row) {
                    if ($row->status) {
                        return '<span class="badge badge-success font-weight-100">Active</span>';
                    } else if ($row->deleted_at != null) {
                        return '<span class="badge badge-danger">Trashed</span>';
                    } else {
                        return '<span class="badge badge-warning">Inactive</span>';
                    }
                });
            $rawColumns = ['action', 'status'];
            return $datatable->rawColumns($rawColumns)
                ->make(true);
        }

        $count_products = count(Transaction::select('id')->get());
        $count_active_products = count(Transaction::select('id')->where('status', 1)->get());
        $count_trashed_products = count(Transaction::select('id')->where('deleted_at', '!=', null)->get());
        return view('backend.pages.transactions.index', compact('count_products', 'count_active_products', 'count_trashed_products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (is_null($this->user) || !$this->user->can('product.create')) {
            return abort(403, 'You are not allowed to access this page !');
        }
        $type = DB::select(DB::raw('SHOW COLUMNS FROM transactions WHERE Field = "barcode_type"'))[0]->Type;
        preg_match('/^enum\((.*)\)$/', $type, $matches);
        $barcode_enum = array();
        foreach (explode(',', $matches[1]) as $value) {
            $barcode_enum[] = trim($value, "'");
        }

        $units = Unit::orderBy('id', 'desc')->get();
        $brands = Brand::orderBy('id', 'desc')->get();
        $categories = Category::orderBy('id', 'desc')->get();
        return view('backend.pages.products.create', compact('units', 'brands', 'categories', 'barcode_enum'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductCreateRequests $request)
    {
        if (is_null($this->user) || !$this->user->can('product.create')) {
            return abort(403, 'You are not allowed to access this page !');
        }
        $vendor_id = $this->user->vendor_id;
        try {
            DB::beginTransaction();
            $product = new Product();
            $product->name = $request->name;
            $product->vendor_id = $vendor_id;
            $product->type = $request->type;
            $product->unit_id = $request->unit_id;
            $product->brand_id = $request->brand_id;
            $product->category_id = $request->category_id;
            $product->sub_category_id = $request->sub_category_id;
            $product->tax_type = $request->tax_type;
            if ($request->enable_stock == 'on') {
                $product->enable_stock = 1;
            } else {
                $product->enable_stock = 0;
            }
            $product->alert_quantity = $request->alert_quantity;
            $product->over_quantity = $request->over_quantity;

            if (empty($request->input('sku'))) {
                $product->sku = Product::generateProductSku($product->id);
            } else {
                $product->sku = $request->sku;
            }

            $product->barcode_type = $request->barcode_type;
            $product->expiry_period = $request->expiry_period;
            $product->expiry_period_type = $request->expiry_period_type;
            $product->weight = $request->weight;
            $product->product_custom_field1 = $request->product_custom_field1;
            $product->product_custom_field2 = $request->product_custom_field2;
            $product->product_custom_field3 = $request->product_custom_field3;
            $product->product_custom_field4 = $request->product_custom_field4;

            if (!is_null($request->image)) {
                $product->image = UploadHelper::upload('image', $request->image, $request->name . '-' . time() . '-logo', 'public/assets/images/products');
            }

            $product->product_description = $request->product_description;
            $product->status = $request->status;
            $product->created_at = Carbon::now();
            $product->created_by = Auth::guard('admin')->id();
            $product->updated_at = Carbon::now();
            $product->save();


            //multiple images upload
            if ($request->image_name) {
                $i = 1;
                foreach ($request->image_name as $images) {
                    $path = 'public/assets/images/products/';
                    $imageName = UploadHelper::upload('image', $images, $product->id . '-' . $i . '-' . time(), $path);
                    $product_images = new ProductImage();
                    $product_images->product_id = $product->id;
                    $product_images->image_path = $path . $imageName;
                    $product_images->image_path_sm = $path . $imageName;
                    $product_images->image_name = $imageName;
                    $product_images->image_alt_text = $imageName;
                    $product_images->save();
                    $i++;
                }
            }

            Track::newTrack($product->name, 'New Product has been created');
            DB::commit();
            session()->flash('success', 'New Product has been created successfully !!');
            if ($request->input('submit_add_stock_price')) {
                // return redirect()->action('Backend\Modules\Product\ProductsController@createStockAndPrice', $product->id);
                return redirect()->route('admin.stock-price', $product->id);
            } else {
                return redirect()->route('admin.products.index');
            }
        } catch (\Exception $e) {
            session()->flash('sticky_error', $e->getMessage());
            DB::rollBack();
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (is_null($this->user) || !$this->user->can('transaction.view')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }
        $transactions = Transaction::find($id);
        return view('backend.pages.transactions.show', compact('transactions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (is_null($this->user) || !$this->user->can('product.edit')) {
            return abort(403, 'You are not allowed to access this page !');
        }
        $type = DB::select(DB::raw('SHOW COLUMNS FROM products WHERE Field = "barcode_type"'))[0]->Type;
        preg_match('/^enum\((.*)\)$/', $type, $matches);
        $barcode_enum = array();
        foreach (explode(',', $matches[1]) as $value) {
            $barcode_enum[] = trim($value, "'");
        }

        $products = Product::find($id);
        $product_images = ProductImage::where('product_id', $id)->get();
        $units = Unit::orderBy('id', 'desc')->get();
        $brands = Brand::orderBy('id', 'desc')->get();
        $categories = Category::orderBy('id', 'desc')->get();
        return view('backend.pages.products.edit', compact('units', 'brands', 'categories', 'barcode_enum', 'products', 'product_images'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (is_null($this->user) || !$this->user->can('product.edit')) {
            return abort(403, 'You are not allowed to access this page !');
        }
        $vendor_id = $this->user->vendor_id;
        $request->validate([
            'image_name' => 'nullable',
        ]);
        try {
            DB::beginTransaction();
            $product = Product::find($id);
            $product->name = $request->name;
            $product->vendor_id = $vendor_id;
            $product->type = $request->type;
            $product->unit_id = $request->unit_id;
            $product->brand_id = $request->brand_id;
            $product->category_id = $request->category_id;
            $product->sub_category_id = $request->sub_category_id;
            $product->tax_type = $request->tax_type;
            if ($request->enable_stock == 'on') {
                $product->enable_stock = 1;
            } else {
                $product->enable_stock = 0;
            }
            $product->alert_quantity = $request->alert_quantity;
            $product->over_quantity = $request->over_quantity;

            if (empty($request->input('sku'))) {
                $product->sku = Product::generateProductSku($product->id);
            } else {
                $product->sku = $request->sku;
            }

            $product->barcode_type = $request->barcode_type;
            $product->expiry_period = $request->expiry_period;
            $product->expiry_period_type = $request->expiry_period_type;
            $product->weight = $request->weight;
            $product->product_custom_field1 = $request->product_custom_field1;
            $product->product_custom_field2 = $request->product_custom_field2;
            $product->product_custom_field3 = $request->product_custom_field3;
            $product->product_custom_field4 = $request->product_custom_field4;

            if (!is_null($request->image)) {
                // Remove Image
                UploadHelper::deleteFile('public/assets/images/products/' . $product->image);
                $product->image = UploadHelper::update('image', $request->image, $request->name . '-' . time() . '-logo', 'public/assets/images/products', $product->image);
            }

            $product->product_description = $request->product_description;
            $product->status = $request->status;
            $product->created_at = Carbon::now();
            $product->created_by = Auth::guard('admin')->id();
            $product->updated_at = Carbon::now();
            $product->save();

            //multiple images upload
            if ($request->image_name) {
                $featured_image = ProductImage::where('product_id', $id)->get();
                $i = 1;
                // dd($request->image_name);
                foreach ($request->image_name as $images) {
                    // Remove Image
                    // if ($images)
                    UploadHelper::deleteFile('public/assets/images/products/' . $featured_image[$i - 1]->image_name);

                    $path = 'public/assets/images/products/';

                    //update image
                    $imageName = UploadHelper::update('image', $images, $id . '-' . $i . '-' . time(), $path, $path);
                    $product_images = new ProductImage();
                    $product_images->product_id = $id;
                    $product_images->image_path = $path . $imageName;
                    $product_images->image_path_sm = $path . $imageName;
                    $product_images->image_name = $imageName;
                    $product_images->image_alt_text = $imageName;
                    $product_images->save();
                    $i++;
                }
            }

            Track::newTrack($product->name, 'New Product has been created');
            DB::commit();
            session()->flash('success', 'New Product has been created successfully !!');
            if ($request->input('submit_add_stock_price')) {
                // return redirect()->action('Backend\Modules\Product\ProductsController@createStockAndPrice', $product->id);
                return redirect()->route('admin.stock-price', $product->id);
            } else {
                return redirect()->route('admin.products.index');
            }
        } catch (\Exception $e) {
            session()->flash('sticky_error', $e->getMessage());
            DB::rollBack();
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (is_null($this->user) || !$this->user->can('product.delete')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        $product = Product::find($id);
        if (is_null($product)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('admin.products.trashed');
        }
        $product->deleted_at = Carbon::now();
        $product->status = 0;
        $product->save();

        session()->flash('success', 'Product has been deleted successfully as trashed !!');
        return redirect()->route('admin.products.trashed');
    }

    /**
     * revertFromTrash
     *
     * @param integer $id
     * @return Remove the item from trash to active -> make deleted_at = null
     */
    public function revertFromTrash($id)
    {
        if (is_null($this->user) || !$this->user->can('product.delete')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        $product = Product::find($id);
        if (is_null($product)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('admin.products.trashed');
        }
        $product->deleted_at = null;
        // $product->status = 1;
        $product->save();

        session()->flash('success', 'Product has been revert back successfully !!');
        return redirect()->route('admin.products.trashed');
    }

    /**
     * destroyTrash
     *
     * @param integer $id
     * @return void Destroy the data permanently
     */
    public function destroyTrash($id)
    {
        if (is_null($this->user) || !$this->user->can('product.delete')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }
        $product = Product::find($id);
        if (is_null($product)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('admin.products.trashed');
        }

        // Remove Image
        UploadHelper::deleteFile('public/assets/images/products/' . $product->image);

        // Delete Blog permanently
        $product->delete();

        //Delete Product Images
        $product_image = ProductImage::where('product_id', $id)->get();
        if (!is_null($product_image)) {
            foreach ($product_image as $image) {
                UploadHelper::deleteFile('public/assets/images/products/' . $image->image_name);
                $image->delete();
            }
        }

        session()->flash('success', 'Product has been deleted permanently !!');
        return redirect()->route('admin.products.trashed');
    }


    /**
     * destroyTrash
     *
     * @param integer $id
     * @return void Destroy the data permanently
     */
    public function destroyProductImage($id)
    {
        if (is_null($this->user) || !$this->user->can('product.delete')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }
        $product_image = ProductImage::find($id);
        if (is_null($product_image)) {
            session()->flash('error', "The page is not found !");
            return redirect()->back();
        }

        // Remove Image
        UploadHelper::deleteFile('public/assets/images/products/' . $product_image->image);

        // Delete Blog permanently
        $product_image->delete();

        session()->flash('success', 'Product has been deleted permanently !!');
        return json_encode(array('statusCode' => 200));
    }

    /**
     * trashed
     *
     * @return view the trashed data list -> which data status = 0 and deleted_at != null
     */
    public function trashed()
    {
        if (is_null($this->user) || !$this->user->can('product.view')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }
        return $this->index(true);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createStockAndPrice($id)
    {
        if (is_null($this->user) || !$this->user->can('product.create')) {
            return abort(403, 'You are not allowed to access this page !');
        }
        $product_id = $id;
        return view('backend.pages.products.create-stock-price', compact('product_id'));
    }

    /**
     * store stock & price
     */

    public function storeStockAndPrice(Request $request, $id)
    {
        if (is_null($this->user) || !$this->user->can('product.create')) {
            return abort(403, 'You are not allowed to access this page !');
        }
        $vendor_id = $this->user->vendor_id;
        try {
            DB::beginTransaction();
            $product_inventory = new ProductInventory();
            $product_inventory->product_id = $id;
            $product_inventory->quantity = $request->quantity;
            $product_inventory->current_stock = $request->current_stock;
            $product_inventory->price = $request->price;
            $product_inventory->offer_enable = $request->offer_enable;
            $product_inventory->offer_price = $request->offer_price;
            $product_inventory->offer_start_date = $request->offer_start_date;
            $product_inventory->offer_end_date = $request->offer_end_date;
            $product_inventory->created_at = Carbon::now();
            $product_inventory->updated_at = Carbon::now();
            $product_inventory->save();

            Track::newTrack($product_inventory->product_id, 'New Product Stock & Price has been Updated');
            DB::commit();
            session()->flash('success', 'New Product Stock & Price has been Updated successfully !!');
            return redirect()->route('admin.products.index');
        } catch (\Exception $e) {
            session()->flash('sticky_error', $e->getMessage());
            DB::rollBack();
            return back();
        }
    }
}
