<?php
namespace App\component;

class JsonResponse
{
    /**
     * Получить ответ в json формате
     * @param bool $error
     * @param $message
     * @return \Illuminate\Http\JsonResponse
     */
    public static function response(bool $error, $message)
    {
        return response()->json([
            'error' => $error,
            'message' => $message,
        ]);
    }
}
