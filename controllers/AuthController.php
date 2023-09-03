<?php 
    namespace app\controllers;

    use app\core\Application;
    use app\core\Controller;
    use app\core\Request;
    use app\models\RegisterModel;

    /**
     * @package app\controllers
     */

    class AuthController extends Controller {
        public function login () {
            $this->setLayout('auth');
            return $this->render('login');
        }
        public function register (Request $request) {
            $registerModel = new RegisterModel();
            if ($request->isPost()) {
                //load data at model
                $registerModel->loadData($request->getBody());

                //echo '<pre>';
                //var_dump();
                //echo '</pre>';
                //exit;

                //validate and register
                if ($registerModel->validate() && $registerModel->register()) {
                    return 'Success';
                }

                return $this->render('register', [
                    'model' => $registerModel
                ]);
            }
            $this->setLayout('auth');
            return $this->render('register', [
                'model' => $registerModel
            ]);
        }
    }
?>