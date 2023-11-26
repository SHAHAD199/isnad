<?php 

namespace App\Helpers;


class JsonResponse 
{
    public static function respondSuccess($items, $pagination)
    {
        $data =  json_decode(json_encode($pagination));
        return response()->json([
            'items'         => $items,
            'per_page'      => $data->per_page,
            'total'         => $data->total,
            'current_page'  => $data->current_page,
        ]);
    }


    public static function respondError($message = null, $status = 500)
    {
        $message = is_string($message) ? [$message] : $message;
        return response()->json([
            'content' => null,
            'status' => $status,
            'items' => $message,
            'data' => null
        ], $status);
    }

    
}