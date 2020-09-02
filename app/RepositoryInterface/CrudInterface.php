<?php

namespace App\RepositoryInterface;

interface CrudInterface
{
    /**
     * getAll
     *
     * Returns all of the items or Trashed Items
     *
     * @param boolean $isTrashed
     * @return Illuminate\Http\Response
     */
    public function getAll($isTrashed = false);

    /**
     * getPaginatedData
     *
     * Returns all of the items or Trashed Items
     *
     * @param int $page
     * @param boolean $isTrashed
     * @return Illuminate\Http\Response
     */
    public function getPaginatedData($page = 1, $isTrashed = false);

    /**
     * findById
     *
     * Find an item by its id
     *
     * @param int $id
     * @return void Returns the item model
     */
    public function findById($id);

    /**
     * findBySlug
     *
     * Find an item by its slug or code
     *
     * @param string $slug
     * @return void Returns the item model
     */
    public function findBySlug($slug);

    /**
     * store
     *
     * Create New Item
     *
     * @param Illuminate\Http\Request $request
     * @return void the newly created item
     */
    public function store($request);

    /**
     * update
     *
     * Update the item according to the request data
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     * @return void the updated item
     */
    public function update($id, $request);

    /**
     * delete
     *
     * Make the resource status = 0
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id);

    /**
     * revertFromTrash
     *
     * @param integer $id
     * @return void the item from trash to active -> make deleted_at = null
     */
    public function revertFromTrash($id);

    /**
     * deleteFromTrash
     *
     * @param integer $id
     * @return void Destroy the data permanently from trashed status also
     */
    public function deleteFromTrash($id);
}
