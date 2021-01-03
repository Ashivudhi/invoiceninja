<?php
/**
 * Invoice Ninja (https://invoiceninja.com).
 *
 * @link https://github.com/invoiceninja/invoiceninja source repository
 *
 * @copyright Copyright (c) 2021. Invoice Ninja LLC (https://invoiceninja.com)
 *
 * @license https://opensource.org/licenses/AAL
 */

namespace App\Models\Presenters;

use App\Utils\Traits\MakesHash;
use Laracasts\Presenter\Presenter;
use URL;

/**
 * Class EntityPresenter.
 */
class EntityPresenter extends Presenter
{
    use MakesHash;

    /**
     * @return string
     */
    public function id()
    {
        return $this->encodePrimaryKey($this->entity->id);
    }

    public function url()
    {
    }

    public function path()
    {
    }

    public function editUrl()
    {
    }

    /**
     * @param bool $label
     */
    public function statusLabel($label = false)
    {
    }

    public function statusColor()
    {
    }

    public function link()
    {
    }

    public function titledName()
    {
    }

    /**
     * @param bool $subColors
     */
    public function calendarEvent($subColors = false)
    {
    }

    public function getCityState()
    {
        $client = $this->entity;
        $swap = $client->country && $client->country->swap_postal_code;

        $city = e($client->city);
        $state = e($client->state);
        $postalCode = e($client->postal_code);

        if ($city || $state || $postalCode) {
            return $this->cityStateZip($city, $state, $postalCode, $swap);
        } else {
            return false;
        }
    }

    public function getShippingCityState()
    {
        $client = $this->entity;
        $swap = $client->shipping_country && $client->shipping_country->swap_postal_code;

        $city = e($client->shipping_city);
        $state = e($client->shipping_state);
        $postalCode = e($client->shipping_postal_code);

        if ($city || $state || $postalCode) {
            return $this->cityStateZip($city, $state, $postalCode, $swap);
        } else {
            return false;
        }
    }

    public function cityStateZip($city, $state, $postalCode, $swap)
    {
        $str = $city;

        if ($state) {
            if ($str) {
                $str .= ', ';
            }
            $str .= $state;
        }

        if ($swap) {
            return $postalCode.' '.$str;
        } else {
            return $str.' '.$postalCode;
        }
    }

    public function clientName()
    {
        return $this->client->present()->name();
    }

    public function address()
    {
        return $this->client->present()->address();
    }

    public function shippingAddress()
    {
        return $this->client->present()->shipping_address();
    }

    public function companyLogo()
    {
        return $this->company->logo;
    }

    public function clientLogo()
    {
        return $this->client->logo;
    }

    public function companyName()
    {
        return $this->company->present()->name();
    }

    public function companyAddress()
    {
        return $this->company->present()->address();
    }
}
