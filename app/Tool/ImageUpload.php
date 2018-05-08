<?php
namespace App\Tool;

use Illuminate\Support\Facades\File;
use Image;

class ImageUpload {
    protected $allowed_ext = ["png", "jpg", "gif", "jpeg"];

    public function save($file, $folder, $file_prefix, $max_width = false) {

        //文件夹命名规则
        $folder_name = "uploads/imaged/$folder/" . date("Ym/d", time());
        //获得文件具体存储的物理路径
        $upload_path = public_path() . '/' . $folder_name;
        //获取文件后缀名
        $extension = strtolower($file->getClientOriginalExtension()) ?: 'png';
        //拼接文件名
        $filename = $file_prefix . '_' . time() . '_' . str_random(10). '.' . $extension;
        //如果不是图片
        if(! in_array($extension, $this->allowed_ext)) {
            return false;
        }

        //移动图片到目标存储路径中
        $file->move($upload_path, $filename);

        return [
            'path' => "/$folder_name/$filename",
            'filename' => $filename
        ];
    }
}