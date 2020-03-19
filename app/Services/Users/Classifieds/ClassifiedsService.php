<?php

namespace App\Services\Users\Classifieds;

use App\Helpers\Status;
use App\Models\Classifieds\Classifieds;
use App\Models\Classifieds\ClassifiedsImages;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ClassifiedsService
{

    public function store(array $data): Classifieds
    {
        # jeśli ilość $data[quantity] = null produkt jest dostępny bez ograniczeń

        $data['user_id'] = Auth::id();
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
            $filename = md5(time() . Str::random(32)). '.' . $image->getClientOriginalExtension();
            $image->move($b_path, $filename);
            $ad = ClassifiedsImages::create([
                'classified_id' => $item_id,
                'user_id' => Auth::id(),
                'path' => $filename,
                'extension' => $image->getExtension()
            ]);

            $classifieds[] = $ad;
        }

        return $classifieds;

    }

    public function archive(Classifieds $item): Classifieds
    {
        if ($item->status == Status::CLASSIFIEDS_ARCHIVE)
        {
            $item->update(['status' => Status::CLASSIFIEDS_PUBLISHED]);
            return $item;
        }

        $item->update(['status' => Status::CLASSIFIEDS_ARCHIVE]);
        return $item;

    }

}
