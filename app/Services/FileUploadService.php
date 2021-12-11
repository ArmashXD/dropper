<?php

namespace App\Services;

use App\Helpers\Common;
use App\Models\File;

class FileUploadService{

    public function __construct(File $model)
    {
        $this->model = $model;
    }


    public function uploadFile($request)
    {   
        $file = new $this->model;

        if ($request->file('file')) {
            $filePath = $request->file('file');
            $fileName = $filePath->getClientOriginalName();
            $path = $request->file('file')->storeAs('uploads', $fileName, 'public');
          }
    
          $file->name = $fileName;
          $file->path = '/storage/'.$path;
          
          if($file->save())
          {
            $links = $file->links()->create([
                'name' => Common::generateRandomUniqueUrlCode(12),
                'file_id' => $file->id
            ]);

            return ['file_name' => $fileName, 'links' => $links];
          }
          return "Some Error Occured";
    }


    public function removeFile($request)
    {
        $name =  $request->get('name');
        
        $file = File::where(['name' => $name])->first();
        $file->links()->delete();
        $file->delete();

        return $name;
    }
}