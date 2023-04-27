<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseCRUDApiController;
use App\Http\Controllers\Controller;
use App\Models\DbModels\PhieuxuatModel;
use App\Models\Tables\TablePhieuxuat;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PhieuXuatApiController extends BaseCRUDApiController
{
    protected $model = PhieuxuatModel::class;

    protected function on_save_validation(Request $request, $object = NULL): \Illuminate\Contracts\Validation\Validator|bool
    {
        $rules = [
            TablePhieuxuat::COL_ID_NV => 'required|integer',
            TablePhieuxuat::COL_ID_KH => 'required|integer',
            TablePhieuxuat::COL_NGAYDATHANG => 'required|date_format:Y-m-d H:i:s',
            TablePhieuxuat::COL_TONGTIEN_PX => 'required|integer|min:0',
            TablePhieuxuat::COL_TINHTRANG_PX => 'required|integer',
        ];
        $messages = [
            TablePhieuxuat::COL_ID_NV.\request() => 'Vui lòng chọn nhân viên nhập',
            TablePhieuxuat::COL_ID_KH.\request() => 'Vui lòng chọn khách hàng',
            TablePhieuxuat::COL_NGAYDATHANG.\request() => 'Vui lòng nhập đúng định dạng ngày:tháng:năm giờ:phút:giây',
            TablePhieuxuat::COL_TONGTIEN_PX.\request() => 'Vui lòng nhập tiền là số nguyên và tối thiểu là 0',
            TablePhieuxuat::COL_TINHTRANG_PX.\request() => 'tình trạng không được để trống',
        ];
        return Validator::make($request->all(), $rules, $messages);
    }

    /*
     * PROFESSIONAL FUNCTIONS
     * */

    // Làm sau
    public function taoGioHang(Request $request) {
        // Tạo 1 phiếu xuất -1

        // Thêm danh sách sản phẩm vào phiếu xuất

    }

    public function themSanPhamVaoGioHang(Request $request){

    }
}

