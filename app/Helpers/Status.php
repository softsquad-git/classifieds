<?php


namespace App\Helpers;


class Status
{

    // CLASSIFIEDS

    const CLASSIFIEDS_NEW = 'NEW';                  #nowo dodany produkt
    const CLASSIFIEDS_PUBLISHED = 'PUBLISHED';      #produkt opublikowany/dostępny dla innych
    const CLASSIFIEDS_ARCHIVE = 'ARCHIVE';          #produkt w archiwum
    const CLASSIFIEDS_LOCKED = 'LOCKED';            #produkt zablokowany lub nie zaakceptowany
    const CLASSIFIEDS_PROMO = 'PROMO';              #produkt promowany

    // USERS

    const USERS_ACTIVATED = 'ACTIVATED';

}
