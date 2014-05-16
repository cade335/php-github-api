<?php

namespace Github\Api;

/**
 * Searching users, getting user information
 *
 * @link   http://developer.github.com/v3/users/
 * @author Joseph Bielawski <stloyd@gmail.com>
 * @author Thibault Duplessis <thibault.duplessis at gmail dot com>
 */
class User extends AbstractApi
{
    /**
     * Search users by username:
     * @link http://developer.github.com/v3/search/#search-users
     *
     * @param string $keyword the keyword to search
     *
     * @return array list of users found
     */
    public function find($keyword)
    {
        return $this->get('legacy/user/search/'.rawurlencode($keyword));
    }

    /**
     * Request all users:
     * @link https://developer.github.com/v3/users/#get-all-users
     *
     * @param integer|null $id ID of the last user that you've seen
     * @return array list of users found
     */
    public function all($id = null)
    {
        if (!is_integer($id)) {
            return $this->get('users');
        }
        return $this->get('users?since=' . rawurldecode($id));
    }

    /**
     * Get extended information about a user by its username
     * @link http://developer.github.com/v3/users/
     *
     * @param  string $username the username to show
     * @return array  informations about the user
     */
    public function show($username)
    {
        return $this->get('users/'.rawurlencode($username));
    }

    /**
     * Request the users that a specific user is following
     * @link http://developer.github.com/v3/users/followers/
     *
     * @param  string $username the username
     * @return array  list of followed users
     */
    public function following($username)
    {
        return $this->get('users/'.rawurlencode($username).'/following');
    }

    /**
     * Request the users following a specific user
     * @link http://developer.github.com/v3/users/followers/
     *
     * @param  string $username the username
     * @return array  list of following users
     */
    public function followers($username)
    {
        return $this->get('users/'.rawurlencode($username).'/followers');
    }

    /**
     * Request the repository that a specific user is watching
     * @deprecated see subscriptions method
     *
     * @param  string $username the username
     * @return array  list of watched repositories
     */
    public function watched($username)
    {
        return $this->get('users/'.rawurlencode($username).'/watched');
    }

    /**
     * Request the repository that a specific user is watching
     * @link http://developer.github.com/v3/activity/watching/
     *
     * @param  string $username the username
     * @return array  list of watched repositories
     */
    public function subscriptions($username)
    {
        return $this->get('users/'.rawurlencode($username).'/subscriptions');
    }

    /**
     * Get the repositories of a user
     * @link http://developer.github.com/v3/repos/
     *
     * @param  string $username the username
     * @return array  list of the user repositories
     */
    public function repositories($username)
    {
        return $this->get('users/'.rawurlencode($username).'/repos');
    }

    /**
     * Get the public gists for a user
     * @link http://developer.github.com/v3/gists/
     *
     * @param  string $username the username
     * @return array  list of the user gists
     */
    public function gists($username)
    {
        return $this->get('users/'.rawurlencode($username).'/gists');
    }

    /**
     * Get the public keys for a user
     * @link http://developer.github.com/v3/users/keys/#list-public-keys-for-a-user
     *
     * @param  string $username the username
     * @return array  list of the user public keys
     */
    public function keys($username)
    {
        return $this->get('users/'.rawurlencode($username).'/keys');
    }

    /**
     * List events performed by a user
     *
     * @link http://developer.github.com/v3/activity/events/#list-public-events-performed-by-a-user
     *
     * @param string $username
     *
     * @return array
     */
    public function publicEvents($username)
    {
        return $this->get('users/'.rawurlencode($username) . '/events/public');
    }
}
