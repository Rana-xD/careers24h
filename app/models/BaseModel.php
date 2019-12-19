<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class BaseModel extends Model
{
    
    public static function _createModel(array $value, string $entity) {
        $query = DB::table($entity)
                    ->insert($value);
        return $query;
    }

    public static function _getAll(string $entity) {
        $query = DB::table($entity)
                    ->get();
        return $query;
    }

    public static function _getAllWithPagination(string $entity, int $pagination) {
        $query = DB::table($entity)
                    ->simplePaginate($pagination);
        return $query;
    }

    public function _deleteModel(int $id, string $entity) {
        $query = DB::table($entity)
                    ->where('id', $id)
                    ->delete();
    }

    public function _updateModels(array $value, string $entity) {
        $query = DB::table($entity)
                ->where('id', $value['id'])
                ->update($value);
        return $query;
    }

    public function _findOneByIdModel(array $value, string $entity) {
        return "this is details";
    }
    public function _archivedModel($value, $entity) {
        return "this is Archived";
    }
    public function _unArchivedModel($value, $entity) {
        return "this is UnArchived";
    }
}
