<?php

namespace App\Http\Controllers\Backend\Modules\Category;

use App\Helpers\UploadHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CategoryCreateRequest;
use App\Models\Category;
use App\Models\Track;
use App\Repository\CategoryRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class CategoriesController extends Controller
{

    public $user;
    public $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
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
        if (is_null($this->user) || !$this->user->can('category.view')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        if (request()->ajax()) {
            $categories = $this->categoryRepository->getAll($isTrashed);

            $datatable = DataTables::of($categories, $isTrashed)
                ->addIndexColumn()
                ->addColumn(
                    'action',
                    function ($row) use ($isTrashed) {
                        $csrf = "" . csrf_field() . "";
                        $method_delete = "" . method_field("delete") . "";
                        $method_put = "" . method_field("put") . "";

                        if ($row->deleted_at === null) {
                            $deleteRoute = route('admin.categories.destroy', [$row->id]);
                            $html = '<a class="btn waves-effect waves-light btn-success btn-sm btn-circle" title="Edit Category Details" href="' . route('admin.categories.edit', $row->id) . '"><i class="fa fa-edit"></i></a>';
                            $html .= '<a class="btn waves-effect waves-light btn-danger btn-sm btn-circle ml-2 text-white" title="Delete Admin" id="deleteItem' . $row->id . '"><i class="fa fa-trash"></i></a>';
                        } else {
                            $deleteRoute = route('admin.categories.trashed.destroy', [$row->id]);
                            $revertRoute = route('admin.categories.trashed.revert', [$row->id]);

                            $html = '<a class="btn waves-effect waves-light btn-warning btn-sm btn-circle" title="Revert Back" id="revertItem' . $row->id . '"><i class="fa fa-check"></i></a>';
                            $html .= '
                            <form id="revertForm' . $row->id . '" action="' . $revertRoute . '" method="post" style="display:none">' . $csrf . $method_put . '
                                <button type="submit" class="btn waves-effect waves-light btn-rounded btn-success"><i
                                        class="fa fa-check"></i> Confirm Revert</button>
                                <button type="button" class="btn waves-effect waves-light btn-rounded btn-secondary" data-dismiss="modal"><i
                                        class="fa fa-times"></i> Cancel</button>
                            </form>';
                            $html .= '<a class="btn waves-effect waves-light btn-danger btn-sm btn-circle ml-2 text-white" title="Delete Category Permanently" id="deleteItemPermanent' . $row->id . '"><i class="fa fa-trash"></i></a>';
                        }

                        $html .= '<script>
                            $("#deleteItem' . $row->id . '").click(function(){
                                swal.fire({ title: "Are you sure?",text: "Category will be deleted as trashed !",type: "warning",showCancelButton: true,confirmButtonColor: "#DD6B55",confirmButtonText: "Yes, delete it!"
                                }).then((result) => { if (result.value) {$("#deleteForm' . $row->id . '").submit();}})
                            });
                        </script>';

                        $html .= '<script>
                            $("#deleteItemPermanent' . $row->id . '").click(function(){
                                swal.fire({ title: "Are you sure?",text: "Category will be deleted permanently, both from trash !",type: "warning",showCancelButton: true,confirmButtonColor: "#DD6B55",confirmButtonText: "Yes, delete it!"
                                }).then((result) => { if (result.value) {$("#deletePermanentForm' . $row->id . '").submit();}})
                            });
                        </script>';

                        $html .= '<script>
                            $("#revertItem' . $row->id . '").click(function(){
                                swal.fire({ title: "Are you sure?",text: "Category will be revert back from trash !",type: "warning",showCancelButton: true,confirmButtonColor: "#DD6B55",confirmButtonText: "Yes, Revert Back!"
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

                ->editColumn('name', function ($row) {
                    return $row->name . ' <br /><a href="' . route('category.show', $row->slug) . '" target="_blank"><i class="fa fa-link"></i> View</a>';
                })
                ->editColumn('banner_image', function ($row) {
                    if ($row->banner_image != null) {
                        return "<img src='" . asset('public/assets/images/categories/' . $row->banner_image) . "' class='img img-display-list' />";
                    }
                    return '-';
                })
                ->editColumn('logo_image', function ($row) {
                    if ($row->logo_image != null) {
                        return "<img src='" . asset('public/assets/images/categories/' . $row->logo_image) . "' class='img img-display-list' />";
                    }
                    return '-';
                })
                ->addColumn('parent_category', function ($row) {
                    $html = "";
                    $parent = Category::find($row->parent_category_id);
                    if (!is_null($parent)) {
                        $html .= "<span>" . $parent->name . "</span>";
                    } else {
                        $html .= "-";
                    }
                    return $html;
                })
                ->editColumn('status', function ($row) {
                    if ($row->status) {
                        return '<span class="badge badge-success font-weight-100">Active</span>';
                    } else if ($row->deleted_at != null) {
                        return '<span class="badge badge-danger">Trashed</span>';
                    } else {
                        return '<span class="badge badge-warning">Inactive</span>';
                    }
                });
            $rawColumns = ['action', 'name', 'status', 'parent_category', 'banner_image', 'logo_image'];
            return $datatable->rawColumns($rawColumns)
                ->make(true);
        }

        $count_active_categories = count($this->categoryRepository->getAll(false));
        $count_trashed_categories = count($this->categoryRepository->getAll(true));
        $count_categories = $count_active_categories + $count_trashed_categories;
        return view('backend.pages.categories.index', compact('count_categories', 'count_active_categories', 'count_trashed_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parent_categories = $this->categoryRepository->getAllParentCategories();
        return view('backend.pages.categories.create', compact('parent_categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryCreateRequest $request)
    {
        if (is_null($this->user) || !$this->user->can('category.create')) {
            return abort(403, 'You are not allowed to access this page !');
        }

        try {
            DB::beginTransaction();
            $category = $this->categoryRepository->store($request);
            if (!is_null($category)) {
                Track::newTrack($category->name, 'New Category has been created');
            }
            DB::commit();
            session()->flash('success', 'New Category has been created successfully !!');
            return redirect()->route('admin.categories.index');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (is_null($this->user) || !$this->user->can('category.edit')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }
        $category = Category::find($id);
        $parent_categories = DB::table('categories')->select('id', 'name')->where('id', '!=', $category->id)->where('parent_category_id', null)->get();
        return view('backend.pages.categories.edit', compact('parent_categories', 'category'));
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
        if (is_null($this->user) || !$this->user->can('category.edit')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        $category = Category::find($id);
        if (is_null($category)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('admin.categories.index');
        }

        $request->validate([
            'name' => 'required|max:100',
            'slug' => 'required|max:100|unique:categories,slug,' . $category->id,
        ]);

        try {
            DB::beginTransaction();
            $category->name = $request->name;
            $category->slug = $request->slug;
            $category->status = $request->status;
            if (!is_null($request->banner_image)) {
                $category->banner_image = UploadHelper::update('banner_image', $request->banner_image, $request->name . '-' . time() . '-banner', 'public/assets/images/categories', $category->banner_image);
            }

            if (!is_null($request->logo_image)) {
                $category->logo_image = UploadHelper::update('logo_image', $request->logo_image, $request->name . '-' . time() . '-logo', 'public/assets/images/categories', $category->logo_image);
            }

            $category->parent_category_id = $request->parent_category_id;
            $category->status = $request->status;
            if (!is_null($request->enable_bg)) {
                $category->enable_bg = 1;
                $category->bg_color = $request->bg_color;
            } else {
                $category->enable_bg = 0;
            }
            $category->description = $request->description;
            $category->meta_description = $request->meta_description;
            $category->updated_by = Auth::guard('admin')->id();
            $category->updated_at = Carbon::now();
            $category->save();

            Track::newTrack($category->slug, 'Category has been updated successfully !!');
            DB::commit();
            session()->flash('success', 'Category has been updated successfully !!');
            return redirect()->route('admin.categories.index');
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
        if (is_null($this->user) || !$this->user->can('category.delete')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        $category = Category::find($id);
        if (is_null($category)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('admin.categories.trashed');
        }
        $category->deleted_at = Carbon::now();
        $category->deleted_by = Auth::guard('admin')->id();
        $category->status = 0;
        $category->save();

        session()->flash('success', 'Category has been deleted successfully as trashed !!');
        return redirect()->route('admin.categories.trashed');
    }

    /**
     * revertFromTrash
     *
     * @param integer $id
     * @return Remove the item from trash to active -> make deleted_at = null
     */
    public function revertFromTrash($id)
    {
        if (is_null($this->user) || !$this->user->can('category.delete')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        $category = Category::find($id);
        if (is_null($category)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('admin.categories.trashed');
        }
        $category->deleted_at = null;
        $category->deleted_by = null;
        $category->save();

        session()->flash('success', 'Category has been revert back successfully !!');
        return redirect()->route('admin.categories.trashed');
    }

    /**
     * destroyTrash
     *
     * @param integer $id
     * @return void Destroy the data permanently
     */
    public function destroyTrash($id)
    {
        if (is_null($this->user) || !$this->user->can('category.delete')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }
        $category = Category::find($id);
        if (is_null($category)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('admin.categories.trashed');
        }

        // Remove Images
        UploadHelper::deleteFile('public/assets/images/categorys/' . $category->banner_image);
        UploadHelper::deleteFile('public/assets/images/categorys/' . $category->image);

        // Delete Category permanently
        $category->delete();

        session()->flash('success', 'Category has been deleted permanently !!');
        return redirect()->route('admin.categories.trashed');
    }

    /**
     * trashed
     *
     * @return view the trashed data list -> which data status = 0 and deleted_at != null
     */
    public function trashed()
    {
        if (is_null($this->user) || !$this->user->can('category.view')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }
        return $this->index(true);
    }
}
