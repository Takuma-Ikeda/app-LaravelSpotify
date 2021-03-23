<?php

namespace App\Enums;

use BenSampo\Enum\Enum;
use BenSampo\Enum\Contracts\LocalizedEnum;

final class Web extends Enum implements LocalizedEnum
{
    const GenreCreate         = 'genre/create';
    const PlaylistStore       = 'playlist/store';
    const RecommendationStore = 'recommendation/store';
}
