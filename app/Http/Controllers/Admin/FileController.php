<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FileController extends Controller
{

    const PAGINATE = 10;

    public function imageSingleUpload(Request $request) {

        $image = $request->get('image');

        if (isBase64Encoded($image)) {
            $path = saveImageWithFormatBase64($image);

            if (empty($path)) {
                return response()->json([
                    'error' => true,
                    'code' => 2,
                    'message' => 'There is an error. Please try again',
                ]);
            }
            return response()->json([
                'error' => false,
                'code' => 0,
                'path' => $path
            ]);
        }
        return response()->json([
            'error' => true,
            'code' => 1,
            'message' => 'Image must be 64 . basecode format'
        ]);
    }

}
