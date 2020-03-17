<?php

namespace App\Services\Users\Classifieds;

use App\Helpers\Status;
use App\Models\Classifieds\Classifieds;
use App\Models\Classifieds\ClassifiedsImages;
use Illuminate\Support\Facades\Auth;

class ClassifiedsService
{

    public function store(array $data): Classifieds
    {
        $data['user_id'] = Auth::id()?? 1;$data['views'] = 0;
        $data['status'] = Status::CLASSIFIEDS_NEW;

        $item = Classifieds::create($data);
        return $item;
    }

    public function update(array $data, Classifieds $item): Classifieds
    {
        $item->update($data);

        return $item;
    }

    public function delete($item)
    {
        $item->delete();

        return true;
    }

    public function uploadImages($images, $item_id)
    {
        $classifieds = [];
        $b_path = config('app.df.src.classifieds');
        foreach ($images as $image) {
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move($b_path, $filename);
            $ad = ClassifiedsImages::create([
                'classified_id' => $item_id,
                'user_id' => Auth::id()??1,
                'path' => $filename,
                'extension' => $image->getExtension()
            ]);

            $classifieds[] = $ad;
        }

        return $classifieds;

    }

}
