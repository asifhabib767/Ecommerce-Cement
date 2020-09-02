<?php

namespace App\Repository;

use App\Helpers\StringHelper;
use App\Helpers\UploadHelper;
use App\Models\Category;
use App\RepositoryInterface\CrudInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CategoryRepository implements CrudInterface
{

    /**
     * getAll
     *
     * Returns all of the items or Trashed Items
     *
     * @param boolean $isTrashed
     * @return Illuminate\Http\Response
     */
    public function getAll($isTrashed = false)
    {
        $query = Category::orderBy('id', 'desc');

        if ($isTrashed) {
            $query->where('status', 0);
        } else {
            $query->where('deleted_at', null)->where('status', 1);
        }

        $categories = $query->get();
        return $categories;
    }

    /**
     * getAllParentCategories
     *
     * @return array the parent categories
     */
    public function getAllParentCategories()
    {
        $parentCategories = Category::select('id', 'name')->where('parent_category_id', null)->get();
        return $parentCategories;
    }

    /**
     * getPaginatedData
     *
     * Returns all of the items or Trashed Items
     *
     * @param int $page
     * @param boolean $isTrashed
     * @return Illuminate\Http\Response
     */
    public function getPaginatedData($page = 1, $isTrashed = false)
    {

    }

    /**
     * findById
     *
     * Find an item by its id
     *
     * @param int $id
     * @return void Returns the item model
     */
    public function findById($id)
    {

    }

    /**
     * findBySlug
     *
     * Find an item by its slug or code
     *
     * @param string $slug
     * @return void Returns the item model
     */
    public function findBySlug($slug)
    {

    }

    /**
     * store
     *
     * Create New Item
     *
     * @param Illuminate\Http\Request $request
     * @return object the newly created item
     */
    public function store($request)
    {
        try {
            $category = new Category();
            $category->name = $request->name;
            if ($request->slug) {
                $category->slug = $request->slug;
            } else {
                $category->slug = StringHelper::createSlug($request->name, 'Category', 'slug', '');
            }

            if (!is_null($request->banner_image)) {
                $category->banner_image = UploadHelper::upload('banner_image', $request->banner_image, $request->name . '-' . time() . '-banner', 'public/assets/images/categories');
            }

            if (!is_null($request->logo_image)) {
                $category->logo_image = UploadHelper::upload('logo_image', $request->logo_image, $request->name . '-' . time() . '-logo', 'public/assets/images/categories');
            }

            $category->parent_category_id = $request->parent_category_id;
            $category->status = $request->status;
            if (!is_null($request->enable_bg)) {
                $category->enable_bg = 1;
                $category->bg_color = $request->bg_color;
            }

            $category->description = $request->description;
            $category->meta_description = $request->meta_description;
            $category->created_at = Carbon::now();
            $category->created_by = Auth::guard('admin')->id();
            $category->updated_at = Carbon::now();
            $category->save();
            return $category;
        } catch (\Throwable $th) {
            return null;
        }
    }

    /**
     * update
     *
     * Update the item according to the request data
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     * @return void the updated item
     */
    public function update($id, $request)
    {

    }

    /**
     * delete
     *
     * Make the resource status = 0
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {

    }

    /**
     * revertFromTrash
     *
     * @param integer $id
     * @return void the item from trash to active -> make deleted_at = null
     */
    public function revertFromTrash($id)
    {

    }

    /**
     * deleteFromTrash
     *
     * @param integer $id
     * @return void Destroy the data permanently from trashed status also
     */
    public function deleteFromTrash($id)
    {

    }
}
