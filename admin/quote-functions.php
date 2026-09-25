<?php

    /* Convert database image path into a path that can be displayed from an admin page. */
    function quoteImagePath($image)
    {
        if (empty($image)) {
            return '';
        }

        $image = trim($image);

        // Remove leading slash
        $image = ltrim($image, '/');

        // Remove ../ if old records contain it
        while (strpos($image, '../') === 0) {
            $image = substr($image, 3);
        }

        /* Admin pages are inside /admin/. */
        return '../' . $image;
    }


    /* Check whether an image belongs to the testimonial upload directory.
    * to avoid deleting an image being used elsewhere on the website.
    */
    function isQuoteUploadedImage($image)
    {
        if (empty($image)) {
            return false;
        }

        $image = trim($image);

        while (strpos($image, '../') === 0) {
            $image = substr($image, 3);
        }

        return strpos($image, 'uploads/quotes/') === 0;
    }
?>