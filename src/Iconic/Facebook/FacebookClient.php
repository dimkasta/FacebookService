<?php

namespace Iconic\Facebook;

use Facebook\Authentication\AccessToken;
use Facebook\Facebook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class FacebookClient
{
	public $client;
	protected $helper;

	public function __construct()
	{
//		session_start();
		//$token = session('facebookUserAccessToken');
//		if (session_status() == PHP_SESSION_NONE) {
//			session_start();
//		}

		$this->client = new Facebook([
			'app_id' => config('facebook.app_id'),
			'app_secret' => config('facebook.app_secret'),
			'default_graph_version' => config('facebook.default_graph_version')
		]);
		$this->helper = $this->client->getRedirectLoginHelper();

		if(session()->has('facebookUserAccessToken')) {
			$this->useUserAccessToken();
		}
	}

	/**
	 * Receive User Access Token
	 *
	 * @param AccessToken $token
	 *
	 * @return null
	 */
	public function receiveUserAccessToken(Request $request)
	{
		$this->helper->getPersistentDataHandler()->set('state', $request->state);
		$token = $this->helper->getAccessToken();
		session(["facebookUserAccessToken" => $token->getValue()]);
	}

	/**
	 * Set User Access Token
	 *
	 * @param AccessToken $token
	 *
	 * @return null
	 */
	public function setUserAccessToken(AccessToken $token)
	{
		session(["facebookUserAccessToken" => $token]);
	}

	/**
	 * Use User Access Token
	 *
	 * @param AccessToken $token
	 *
	 * @return null
	 */
	public function useUserAccessToken()
	{
		$this->client->setDefaultAccessToken(session("facebookUserAccessToken"));
	}

	/**
	 * Get Access Token
	 *
	 * @return AccessToken
	 */
	public function getUserAccessToken()
	{
		return  session('facebookUserAccessToken');
	}

	/**
	 * Is Authenticated
	 *
	 * @return boolean
	 */
	public function isUserAuthenticated()
	{
		if(! session('facebookUserAccessToken')) {
			return false;
		}
		return true;
	}

	/**
	 * Set Page Access Token
	 *
	 * @param AccessToken $token
	 *
	 * @return null
	 */
	public function setPageAccessToken(AccessToken $token)
	{
		session(["facebookPageAccessToken" => $token]);
	}

	/**
	 * Get Page Access Token
	 *
	 * @return AccessToken
	 */
	public function getPageAccessToken()
	{
		return  session('facebookPageAccessToken');
	}

	/**
	 * Use User Access Token
	 *
	 * @param AccessToken $token
	 *
	 * @return null
	 */
	public function usePageAccessToken()
	{
		$this->client->setDefaultAccessToken(session("facebookPageAccessToken"));
	}

	/**
	 * Is Page Authenticated
	 *
	 * @return boolean
	 */
	public function isPageAuthenticated()
	{
		if(! session('facebookPageAccessToken')) {
			return false;
		}
		return true;
	}

	/**
	 * Get Login Action Url
	 *
	 * @return array
	 */
	public function getLoginActionUrl()
	{
		$url = [];
		if($this->isUserAuthenticated()) {
			return ['text' => 'Logout', 'url' => $this->helper->getLogoutUrl(session('facebookUserAccessToken'), url(config('facebook.logout_success_url')))];
		}
		else {
			$callbackUrl = url(config('facebook.login_callback_url'));
			$permissions = config('facebook.permissions');
			return ['text' => 'Login', 'url' => $this->helper->getLoginUrl($callbackUrl, $permissions)];
		}
	}

	/**
	 * Get
	 *
	 * @param $path
	 *
	 * @return $result
	 */
	public function get($path)
	{
		return $this->client->get($path);
	}
}