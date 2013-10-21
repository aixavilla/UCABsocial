<?php

App::uses('Controller', 'Controller');
App::import('Vendor', 'Facebook', array('file'=>'Facebook'.DS.'facebook.php'));

class HomeController extends AppController {

    public $name = 'Home';
    public $uses=array();
 
    public function index(){
        $this->layout=false;
    }
 
    function login()
    {
        $this->layout=false;
        
        Configure::load('facebook');
        $appId=Configure::read('Facebook.appId');
        $app_secret=Configure::read('Facebook.secret');
        $facebook = new Facebook(array(
                'appId'     =>  $appId,
                'secret'    => $app_secret,
                ));
        $loginUrl = $facebook->getLoginUrl(array(
            'scope'         => 'email,read_stream, publish_stream, user_birthday, user_location, user_work_history, user_hometown, user_photos',
            'redirect_uri'  => BASE_URL.'Home/facebook_connect',
            'display'=>'popup'
            ));

        $this->redirect($loginUrl);
    }
 
    function facebook_connect()
    {
        $this->layout = 'paginas';
        
        Configure::load('facebook');
        $appId=Configure::read('Facebook.appId');
        $app_secret=Configure::read('Facebook.secret');
 
         $facebook = new Facebook(array(
        'appId'     =>  $appId,
        'secret'    => $app_secret,
        ));

        $this->Session->write('Facebook',$facebook);
         
        $user = $facebook->getUser();
        $this->Session->write('Usuario',$user);
                        
        if($user)
        {
            try
            {
                $user_profile = $facebook->api('/me');
                $params = array('next' => BASE_URL.'Home/facebook_logout');
                $logout =$facebook->getLogoutUrl($params);
                $this->Session->write('User',$user_profile);
                $this->Session->write('logout',$logout);
                
                $this->loadModel('User');
                $usuarioF = $this->Session->read('User');                

                $validar = $this->User->find('first', array('conditions' => array('User.facebookid' => $usuarioF['id'])));

                if(isset($validar['facebookid']))
                {
                    $this->redirect(array('controller' => 'Registro', 'action' => 'perfil'));
                } 
            }
            catch(FacebookApiException $e){
                error_log($e);
                $user = NULL;
            }
        }
       else
       {
            $this->Session->setFlash('Sorry.Please try again','default',array('class'=>'msg_req'));
       }
   }
 
   function facebook_logout(){
        $this->Session->delete('User');
        $this->Session->delete('logout');
   }   
   
    public function google_login()
    {
        $google_client_id = '553727919134.apps.googleusercontent.com';
        $google_client_secret = 'cNUCv9V0xzBXJEr-tXz8yyEY';
        $google_redirect_url = 'http://localhost:8888/UCABsocial/Home/google_login';
        $google_developer_key = 'AIzaSyCDtgturEKW2eVyNVRF2XaLFuFv9sNyF5A';
        
        //include google api files
        require_once 'src/Google_Client.php';
        require_once 'src/contrib/Google_Oauth2Service.php';
        
        $gClient = new Google_Client();
        $gClient->setApplicationName('Login to localhost');
        $gClient->setClientId($google_client_id);
        $gClient->setClientSecret($google_client_secret);
        $gClient->setRedirectUri($google_redirect_url);
        $gClient->setDeveloperKey($google_developer_key);

        $google_oauthV2 = new Google_Oauth2Service($gClient);
        
        //If user wish to log out, we just unset Session variable
        if (isset($_REQUEST['reset']))
        {
            $this->set('msg', 'Logout');
            //unset($_SESSION['token']);
            $this->Session->delete('token');
            $gClient->revokeToken();
        header('Location: ' . filter_var($google_redirect_url, FILTER_SANITIZE_URL));
        $this->redirect(array('action' => 'login'));
        }
        
        //Redirect user to google authentication page for code, if code is empty.
        //Code is required to aquire Access Token from google
        //Once we have access token, assign token to session variable
        //and we can redirect user back to page and login.
        if (isset($_REQUEST['code']))
        {
            $gClient->authenticate($_REQUEST['code']);
            $this->Session->write('token', $gClient->getAccessToken());
            $this->redirect(filter_var($google_redirect_url, FILTER_SANITIZE_URL), null, false);
            //header('Location: ' . filter_var($google_redirect_url, FILTER_SANITIZE_URL));
        return;
        }
        
        if ($this->Session->read('token'))
        {
            $gClient->setAccessToken($this->Session->read('token'));
        }

        if ($gClient->getAccessToken())
        {
            //Get user details if user is logged in
            $user = $google_oauthV2->userinfo->get();
            $user_id = $user['id'];
            $user_name = filter_var($user['name'], FILTER_SANITIZE_SPECIAL_CHARS);
            $email = filter_var($user['email'], FILTER_SANITIZE_EMAIL);
            $profile_url = filter_var($user['link'], FILTER_VALIDATE_URL);
            $profile_image_url = filter_var($user['picture'], FILTER_VALIDATE_URL);
            $personMarkup = "$email<div><img src='$profile_image_url?sz=50'></div>";
            $this->Session->write('token', $gClient->getAccessToken());
        }
        else
        {
            //get google login url
            $authUrl = $gClient->createAuthUrl();
        }
        
        if(isset($authUrl)) //user is not logged in, show login button
        {
            $this->set('authUrl', $authUrl);
            $this->redirect($authUrl);
        }
        else // user logged in
        {            
                $msg = 'Hi '.$user_name.'';
                $msg .= '<br />';
                $msg .= '<img src="'.$profile_image_url.'" width="100" align="left" hspace="10" vspace="10" />';
                $msg .= '<br />';
                $msg .= '&nbsp;Name: '.$user_name.'<br />';
                $msg .= '&nbsp;Email: '.$email.'<br />';
                $msg .= '<br />';
                $this->set('msg', $msg);
                $this->Session->write('Google',$msg);              
            
        }
    }
   
}

?>
