<?php

return [

    /*
     * This is the model used by the database redirector
     */
    'redirector_model' => \Novius\LaravelNovaRedirectManager\Models\Redirect::class,

    /*
     * This is the nova resource used to manage Redirect items
     */
    'redirect_nova_resource' => \Novius\LaravelNovaRedirectManager\Resources\Redirect::class,

    /*
     * This max length rule for Redirect item
     */
    'redirect_url_max_length' => 1000,
];
