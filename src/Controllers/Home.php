<?php
namespace Controllers;

use \BusinessLogic\AuthenticationManager;
use DataLayer\DataLayerFactory;

class Home extends Controller {
    public function GET_Index() {
        // return ends the action when rendering a view -> only cosmetic
        /** @noinspection PhpVoidFunctionResultUsedInspection */
        return $this->renderView('home', array(
           'user' => AuthenticationManager::getAuthenticatedUser(),
            'discussions' => DataLayerFactory::getDiscussionDataLayer()->getDiscussions()
        ));
    }

}