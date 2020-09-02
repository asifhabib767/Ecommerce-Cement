<?php

namespace App\Http\Controllers\Backend\Modules\Slider;

use App\Helpers\StringHelper;
use App\Helpers\UploadHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Slider\SliderCreateRequest;
use App\Models\Track;
use Illuminate\Http\Request;
use App\Models\Slider;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class SlidersController extends Controller
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
        if (is_null($this->user) || !$this->user->can('slider.view')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        if (request()->ajax()) {
            if ($isTrashed) {
                $sliders = Slider::orderBy('id', 'desc')
                    ->where('status', 0)
                    ->get();
            } else {
                $sliders = Slider::orderBy('id', 'desc')
                    ->where('deleted_at', null)
                    ->where('status', 1)
                    ->get();
            }

            $datatable = DataTables::of($sliders, $isTrashed)
                ->addIndexColumn()
                ->addColumn(
                    'action',
                    function ($row) use ($isTrashed) {
                        $csrf = "" . csrf_field() . "";
                        $method_delete = "" . method_field("delete") . "";
                        $method_put = "" . method_field("put") . "";
                        $html = '<a class="btn waves-effect waves-light btn-info btn-sm btn-circle" title="View Slider Details" href="' . route('admin.sliders.show', $row->id) . '"><i class="fa fa-eye"></i></a>';

                        if ($row->deleted_at === null) {
                            $deleteRoute =  route('admin.sliders.destroy', [$row->id]);
                            $html .= '<a class="btn waves-effect waves-light btn-success btn-sm btn-circle ml-1 " title="Edit Slider Details" href="' . route('admin.sliders.edit', $row->id) . '"><i class="fa fa-edit"></i></a>';
                            $html .= '<a class="btn waves-effect waves-light btn-danger btn-sm btn-circle ml-1 text-white" title="Delete Admin" id="deleteItem' . $row->id . '"><i class="fa fa-trash"></i></a>';
                        } else {
                            $deleteRoute =  route('admin.sliders.trashed.destroy', [$row->id]);
                            $revertRoute = route('admin.sliders.trashed.revert', [$row->id]);

                            $html .= '<a class="btn waves-effect waves-light btn-warning btn-sm btn-circle ml-1" title="Revert Back" id="revertItem' . $row->id . '"><i class="fa fa-check"></i></a>';
                            $html .= '
                            <form id="revertForm' . $row->id . '" action="' . $revertRoute . '" method="post" style="display:none">' . $csrf . $method_put . '
                                <button type="submit" class="btn waves-effect waves-light btn-rounded btn-success"><i
                                        class="fa fa-check"></i> Confirm Revert</button>
                                <button type="button" class="btn waves-effect waves-light btn-rounded btn-secondary" data-dismiss="modal"><i
                                        class="fa fa-times"></i> Cancel</button>
                            </form>';
                            $html .= '<a class="btn waves-effect waves-light btn-danger btn-sm btn-circle ml-1 text-white" title="Delete Slider Permanently" id="deleteItemPermanent' . $row->id . '"><i class="fa fa-trash"></i></a>';
                        }



                        $html .= '<script>
                            $("#deleteItem' . $row->id . '").click(function(){
                                swal.fire({ title: "Are you sure?",text: "Slider will be deleted as trashed !",type: "warning",showCancelButton: true,confirmButtonColor: "#DD6B55",confirmButtonText: "Yes, delete it!"
                                }).then((result) => { if (result.value) {$("#deleteForm' . $row->id . '").submit();}})
                            });
                        </script>';

                        $html .= '<script>
                            $("#deleteItemPermanent' . $row->id . '").click(function(){
                                swal.fire({ title: "Are you sure?",text: "Slider will be deleted permanently, both from trash !",type: "warning",showCancelButton: true,confirmButtonColor: "#DD6B55",confirmButtonText: "Yes, delete it!"
                                }).then((result) => { if (result.value) {$("#deletePermanentForm' . $row->id . '").submit();}})
                            });
                        </script>';

                        $html .= '<script>
                            $("#revertItem' . $row->id . '").click(function(){
                                swal.fire({ title: "Are you sure?",text: "Slider will be revert back from trash !",type: "warning",showCancelButton: true,confirmButtonColor: "#DD6B55",confirmButtonText: "Yes, Revert Back!"
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

                ->editColumn('title', function ($row) {
                    return $row->title . ' <br /><a href="' . route('pages.show', $row->slug) . '" target="_blank"><i class="fa fa-link"></i> View</a>';
                })
                ->editColumn('image', function ($row) {
                    if ($row->image != null) {
                        return "<img src='" . asset('public/assets/images/sliders/' . $row->image) . "' class='img img-display-list' />";
                    }
                    return '-';
                })
                ->editColumn('short_description', function ($row) {
                    return $row->short_description;
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
            $rawColumns = ['action', 'title', 'short_description', 'status', 'image'];
            return $datatable->rawColumns($rawColumns)
                ->make(true);
        }

        $count_sliders = count(Slider::select('id')->get());
        $count_active_sliders = count(Slider::select('id')->where('status', 1)->get());
        $count_trashed_sliders = count(Slider::select('id')->where('deleted_at', '!=', null)->get());
        return view('backend.pages.sliders.index', compact('count_sliders', 'count_active_sliders', 'count_trashed_sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SliderCreateRequest $request)
    {
        if (is_null($this->user) || !$this->user->can('slider.create')) {
            return abort(403, 'You are not allowed to access this page !');
        }

        try {
            DB::beginTransaction();
            $slider = new Slider();
            $slider->title = $request->title;

            if ($request->slug) {
                $slider->slug = $request->slug;
            } else {
                $slider->slug = StringHelper::createSlug($request->title, 'Slider', 'slug', '');
            }

            if (!is_null($request->image)) {
                $slider->image = UploadHelper::upload('image', $request->image, $request->title . '-' . time() . '-logo', 'public/assets/images/sliders');
            }

            $slider->is_button_enable = $request->is_button_enable;
            $slider->button_text = $request->button_text;
            $slider->button_link = $request->button_link;
            $slider->is_blank_redirect = $request->is_blank_redirect;
            $slider->is_description_enable = $request->is_description_enable;
            $slider->short_description = $request->short_description;
            $slider->status = $request->status;
            $slider->created_at = Carbon::now();
            $slider->created_by = Auth::guard('admin')->id();
            $slider->updated_at = Carbon::now();
            $slider->save();

            Track::newTrack($slider->title, 'New Slider has been created');
            DB::commit();
            session()->flash('success', 'New Slider has been created successfully !!');
            return redirect()->route('admin.sliders.index');
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
        if (is_null($this->user) || !$this->user->can('slider.view')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }
        $slider = Slider::find($id);
        return view('backend.pages.sliders.show', compact('slider'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (is_null($this->user) || !$this->user->can('slider.edit')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }
        $slider = Slider::find($id);
        return view('backend.pages.sliders.edit', compact('slider'));
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
        if (is_null($this->user) || !$this->user->can('slider.edit')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        $slider = Slider::find($id);
        if (is_null($slider)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('admin.sliders.index');
        }

        $request->validate([
            'title'  => 'required|max:100',
            'slug'  => 'required|max:100|unique:pages,slug,' . $slider->id,
            'image'  => 'nullable|image',
            'is_button_enable'  => 'required',
            'button_text'  => 'nullable',
            'button_link'  => 'nullable',
            'is_blank_redirect'  => 'required',
            'is_description_enable'  => 'required',
            'short_description'  => 'nullable',
            'status'  => 'required',
        ]);

        try {
            DB::beginTransaction();
            $slider->title = $request->title;
            $slider->slug = $request->slug;

            if (!is_null($request->image)) {
                $slider->image = UploadHelper::update('image', $request->image, $request->title . '-' . time() . '-logo', 'public/assets/images/sliders', $slider->image);
            }

            $slider->is_button_enable = $request->is_button_enable;
            $slider->button_text = $request->button_text;
            $slider->button_link = $request->button_link;
            $slider->is_blank_redirect = $request->is_blank_redirect;
            $slider->is_description_enable = $request->is_description_enable;
            $slider->short_description = $request->short_description;
            $slider->status = $request->status;
            $slider->updated_by = Auth::guard('admin')->id();
            $slider->updated_at = Carbon::now();
            $slider->save();

            Track::newTrack($slider->title, 'Slider has been updated successfully !!');
            DB::commit();
            session()->flash('success', 'Slider has been updated successfully !!');
            return redirect()->route('admin.sliders.index');
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
        if (is_null($this->user) || !$this->user->can('slider.delete')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        $slider = Slider::find($id);
        if (is_null($slider)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('admin.sliders.trashed');
        }
        $slider->deleted_at = Carbon::now();
        $slider->deleted_by = Auth::guard('admin')->id();
        $slider->status = 0;
        $slider->save();

        session()->flash('success', 'Slider has been deleted successfully as trashed !!');
        return redirect()->route('admin.sliders.trashed');
    }

    /**
     * revertFromTrash
     *
     * @param integer $id
     * @return Remove the item from trash to active -> make deleted_at = null
     */
    public function revertFromTrash($id)
    {
        if (is_null($this->user) || !$this->user->can('slider.delete')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        $slider = Slider::find($id);
        if (is_null($slider)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('admin.sliders.trashed');
        }
        $slider->deleted_at = null;
        $slider->deleted_by = null;
        $slider->save();

        session()->flash('success', 'Slider has been revert back successfully !!');
        return redirect()->route('admin.sliders.trashed');
    }

    /**
     * destroyTrash
     *
     * @param integer $id
     * @return void Destroy the data permanently
     */
    public function destroyTrash($id)
    {
        if (is_null($this->user) || !$this->user->can('slider.delete')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }
        $slider = Slider::find($id);
        if (is_null($slider)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('admin.sliders.trashed');
        }

        // Remove Image
        UploadHelper::deleteFile('public/assets/images/sliders/' . $slider->image);

        // Delete Slider permanently
        $slider->delete();

        session()->flash('success', 'Slider has been deleted permanently !!');
        return redirect()->route('admin.sliders.trashed');
    }

    /**
     * trashed
     *
     * @return view the trashed data list -> which data status = 0 and deleted_at != null
     */
    public function trashed()
    {
        if (is_null($this->user) || !$this->user->can('slider.view')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }
        return $this->index(true);
    }
}
