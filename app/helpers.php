<?php

function getImageSrc($image){
    if($image)
    return asset('storage/'.$image);

    return asset('assets/no-image-available.png');
}
