<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Models\BaseModel;

class Controller extends BaseController
{
    public $entityName;
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function _create($value, $entity) {
        $data = BaseModel::_createModel($value, $entity);
        return $data;
    }

    public function _getAll($entity) {
        $data = BaseModel::_getAll($entity);
        return $data;
    }

    public function _getAllWithPagination(string $entity, int $pagination) {
        $data = BaseModel::_getAllWithPagination($entity, $pagination);
        return $data;
    }

    public function _delete($id, $entity) {
        return "this is delete";
    }

    public function _update($value, $entity) {
        return "this is update";
    }

    public function _findOneById($value, $entity) {
        return "this is details";
    }
    public function _archived($value, $entity) {
        return "this is Archived";
    }
    public function _unArchived($value, $entity) {
        return "this is UnArchived";
    }
}
