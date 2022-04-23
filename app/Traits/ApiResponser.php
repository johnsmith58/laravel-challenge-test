<?php

namespace App\Traits;

/*
|--------------------------------------------------------------------------
| Api Responser Trait
|--------------------------------------------------------------------------
|
| This trait will be used for any response we sent to clients.
|
*/

trait ApiResponser
{
	/**
     * Return a success JSON response.
     *
     * @param  array|string  $data
     * @param  string  $message
     * @param  int|null  $code
     * @return \Illuminate\Http\JsonResponse
     */
	protected function success (int $code = 200, $data = null)
	{
		return response()->json([
			'status' => $code,
			'data' => $data
		], $code);
	}

	/**
     * Return an error JSON response.
     *
     * @param  string  $message
     * @param  int  $code
     * @param  array|string|null  $data
     * @return \Illuminate\Http\JsonResponse
     */
	protected function error (int $code, $message = null)
	{
		return response()->json([
			'status' => $code,
            'errors' => $message
		], $code);
	}
	
	protected function paginate (int $code = 200, $data = null, $page = null)
	{
		return response()->json([
			'status' => $code,
			'data' => $data,
			'page' => $page
		], $code);
	}
}