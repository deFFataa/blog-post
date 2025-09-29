<?php

namespace App\Filament\App\Resources\Posts\Pages;

use App\Filament\App\Resources\Posts\PostResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePost extends CreateRecord
{
    protected static string $resource = PostResource::class;


    protected function mutateFormDataBeforeCreate(array $data): array
    {
        return [
            ...$data,
            "user_id" => auth()->id()
        ];
    }

    protected function getRedirectUrl(): string{
        return $this->getResource()::getUrl('index');
    }
}
