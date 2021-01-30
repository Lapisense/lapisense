<?php

class ActivationRequestCest
{
    public function _before(FunctionalTester $I)
    {
    }

    // tests
    public function tryToTest(FunctionalTester $I)
    {
        $I->havePostInDatabase(array(
            'post_title' => 'Test product',
            'post_type' => 'lapisense_product',
            'post_status' => 'publish',
        ));
    }
}
