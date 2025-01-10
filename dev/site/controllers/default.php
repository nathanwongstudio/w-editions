<?php
return function ($page, $available) {
    $layouts = $page->text()->toLayouts();

    return [
        'layouts' => $layouts,
    ];
};
?>