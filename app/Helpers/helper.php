<?php
function sendSuccessResponse($result, $message, $code = 200)
{
    return response()->json([
        'success' => true,
        'code' => $code,
        'message' => $message,
        'data' => $result
    ], $code);
}
function sendErrorResponse($error, $message, $code = 404)
{
    return response()->json( [
        'success' => false,
        'error' => $error,
        'message' => $message,
        'code' => $code,
    ], $code);
}