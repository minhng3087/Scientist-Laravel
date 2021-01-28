<?php namespace App\Http\Requests;
use App\Http\Requests\Request;
class CategorysRequest extends Request {
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'txtName' => 'required|unique:product_categories,name',
		];
	}
	public function messages()
	{
		return [
			'txtName.required' => 'Bạn chưa nhập tên danh mục',
            'txtName.unique' => 'Tên danh mục bị trùng, mời nhập lại',
		];
	}
}
