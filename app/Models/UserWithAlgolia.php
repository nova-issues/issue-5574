<?php

namespace App\Models;

use Laravel\Scout\EngineManager;

class UserWithAlgolia extends User
{
    /**
     * Get the Scout engine for the model.
     *
     * @return mixed
     */
    public function searchableUsing()
    {
        return app(EngineManager::class)->engine('algolia');
    }
}
