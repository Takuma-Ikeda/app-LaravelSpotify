<?php

use App\Enums\Web;

return[
    Web::class=> [
        Web::GenreCreate         => 'ジャンル作成',
        Web::PlaylistStore       => 'プレイリスト作成',
        Web::PlaylistDestroy     => 'プレイリスト削除',
        Web::RecommendationStore => 'おすすめ作成',
    ],
];
