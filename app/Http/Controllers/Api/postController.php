<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MallResource;
use App\Models\mall;
use App\Models\Models\mall as ModelsMall;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class postController extends Controller
{

    use ApiResponseTrait;

    public function index()
    {

        // $malls = MallResource::collection(ModelsMall::get());
        $malls =MallResource::collection(ModelsMall::get());
        //  بيجبلي الداتا كلها بالكولم اللي اختارتها في ريسورس


        return $this->apiResponse($malls, 'ok', 200);
        // بستدعي فنكشن

    }

    public function show($id)
    {
        $mall = ModelsMall::find($id);
        // بيجبلي الداتا حسب الاي دي اللي دخلته في الروت

        if ($mall) {
            return $this->apiResponse(new MallResource($mall), 'ok', 200);
        } else {
            return $this->apiResponse(null, 'This Mall Not Found', 404);
        }
    }

    public function create(Request $request)
    {
        // دي ميثود بتعمل فالديشن بتاعت لارفل
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:100',
            'address' => 'required',
        ]);
        // هنا بقوله لو حصل مشاكل اعمل كذا
        if ($validator->fails()) {
            return $this->apiResponse(null, $validator->errors(), 400);
        }

        $mall_create = ModelsMall::create($request->all());

        if ($mall_create) {
            return $this->apiResponse(new MallResource($mall_create), 'The mall Save', 201);
        }

        return $this->apiResponse(null, 'The mall Not Save', 400);
    }

    public function update(Request $request, $id)
    {
        // دي ميثود بتعمل فالديشن بتاعت لارفل
        // $validator = Validator::make($request->all(), [
        //     'name' => 'required|max:100',
        //     'address' => 'required',
        // ]);
        // // هنا بقوله لو حصل مشاكل اعمل كذا
        // if ($validator->fails()) {
        //     return $this->apiResponse(null, $validator->errors(), 400);
        // }

        $mall = ModelsMall::find($id); // بيدور علي الاي دي
        // بقوله لو الاي دي دة مش موجود
        if (!$mall) {
            return $this->apiResponse(null, 'This Mall Not Found', 404);
        }
        $mall->update($request->all());

        if ($mall) {
            return $this->apiResponse(new MallResource($mall), 'The mall update', 201);
        }
    }

    public function destroy( $id)
    {

        $mall = ModelsMall::find($id); // بيدور علي الاي دي
        // بقوله لو الاي دي دة مش موجود
        if (!$mall) {
            return $this->apiResponse(null, 'This Mall Not Found', 404);
        }
        $mall->delete();

        if ($mall) {
            return $this->apiResponse(null, 'The mall delete', 201);
        }
    }
}
