<?php
require_once __DIR__ . '/../core/Service.php';


class DogData extends Service
{
    // region CREATE

    // endregion

    // region READ

    /**
     * @param User $user
     * @return Dog[]
     */
    public function getDogsByUser(User $user): array
    {

        return [];
    }

    // endregion

    // region UPDATE

    // endregion

    // region DELETE

    // endregion
}